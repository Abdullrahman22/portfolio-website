<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('admin.projects' , compact('projects') );
    }

    public function store(Request $request)
    {
        // Request validation  
        $validator = Validator::make(  $request->all() ,
        [
            "title" => " required | min:4 | max:55 " ,
            "date"  => " required | min:4 | max:55 " ,
            "img"   => " required | mimes:jpeg,jpg,png " ,
            "link"  => " required | url | max:180 " ,
            "desc"  => " required | min:28 | max:4000 " ,
        ],
        [
            'desc.required' => 'description field is required' 
        ]);
        
        // Check Validator Fail
        if( $validator -> fails()) { 
            
            return response() -> json([
                "status" => "error",
                "msg"    => "validation error",
                "errors" => $validator->errors()  // return errors validator in array 
            ]);
            
        }else{
            
            // Upload Image 
            $file_extention = $request ->img ->getClientOriginalExtension();
            $file_name = time() . "." . $file_extention;
            $path = "images/sites-img" ;
            $request ->img -> move( $path , $file_name );


            // Save Project In DB
            $projectRequests = $request->input();  // get all requests in $projectData var
            try{

                $project = new Project;
                $project->title = $projectRequests['title'];
                $project->slug   =  str_replace( " " , "-" , $project->title );
                $project->date  = $projectRequests['date'];
                $project->img   = $file_name;
                $project->link  = $projectRequests['link'];
                $project->desc  = $projectRequests['desc'];
                $project->save();
                

                return response() -> json([
                    "status" => "success",
                    "msg"    => "project created successfully",
                ]);


            }catch( Exception $e ){
                return response() -> json([
                    "status" => "error",
                    "msg"    => "insert operation failed",
                ]);
            }
            
        }
        // $request->session()->flash('success', 'Project Created successfully!');

    }

    public function edit( $id ){
        $project = Project::find($id);
        return response() -> json(compact("project"));
    }

    public function update( Request $request , $id)
    {
        
        // Request validation  
        $validator = Validator::make(  $request->all() ,
        [
            "title" => " required | min:4 | max:55 " ,
            "date"  => " required | min:4 | max:55 " ,
            "change_img"   => " mimes:jpeg,jpg,png " ,
            "link"  => " required | url | max:180 " ,
            "desc"  => " required | min:28 | max:4000 " ,
        ],
        [
            'desc.required' => 'description field is required' 
        ]);
        
        // Check Validator Fails
        if( $validator -> fails()) { 
            
            return response() -> json([
                "status" => "error",
                "msg"    => "validation error",
                "errors" => $validator->errors()  // return errors validator in array 
            ]);
            
        }else{
            
            // check if project exist
            $project = Project::find($id);
            if( !$project ){
                return response() -> json([
                    'status' => "error",
                    'msg'    => "project not found",
                ]);
            }

            // check if new img uploaded
            if( $request->hasFile('change_img') ){
                // create new file_name & Upload Image 
                $file_extention = $request ->change_img ->getClientOriginalExtension();
                $file_name = time() . "." . $file_extention;
                $path = "images/sites-img" ;
                $request ->change_img -> move( $path , $file_name );
            }else{
                // get file_name from DB 
                $file_name = $project->img;
            }

            // slug var 
            $title = $request -> title;
            $slug = str_replace(" " , "-" , $title);


            // Update DB
            try{

                $project -> update([  
                    'title' => $request ->title ,  
                    'slug'  => $slug,  
                    'date'  => $request ->date, 
                    'img'   => $file_name, 
                    'desc'  => $request ->desc , 
                    'link'  => $request ->link , 
                ]);
                // response Status Updated
                return response() -> json([
                    "status" => "success"
                ]);

            }catch( Exception $e ){
                return response() -> json([
                    "status" => "error",
                    "msg"    => "updated operation failed",
                ]);
            }

        }
    }

    public function destroy($id)
    {
        // check if project exist
        $project = Project::find($id);
        if( !$project ){
            return response() -> json([
                'status' => "error",
                'msg'    => "project not found",
            ]);
        }
        $project->delete();
        return response() -> json([
            "status" => "deleted",
        ]);
    }
}
