<?php

namespace App\Http\Controllers;

use App\Models\Messege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessegeController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name"     => " required | min:4 | max:28 " ,
            "email"    => " required | email " ,
            "body"     => " required | min:4 | max:1000 " ,
        ];
        $validator = Validator::make(  $request->all() , $rules  ); 

        if( $validator -> fails()) { 
            
            return response() -> json([
                "status" => "error",
                "msg"    => "validation error",
                "errors" => $validator->errors()  // return errors validator in array 
            ]);
            
        }else{
               
            Messege::create([  
                'name'   => $request->name ,  
                'email'  => $request->email ,  
                'body'   => $request->body ,  
            ]);

            return response() -> json([
                "status" => "success",
                "msg"    => "messege sent successfully",
            ]);

        }
    }

}
