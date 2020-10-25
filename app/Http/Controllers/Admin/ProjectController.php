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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
