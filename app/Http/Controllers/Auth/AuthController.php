<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

     public function index(){
          return view("auth.login");
     }

     public function login(Request $request){

          $rules = [
               "username" =>  "required | min:4 | max:50 ",
               "password" =>  "required | min:8 | max:50 " ,
          ];

          $validator = Validator::make(  $request->all() , $rules  ); 

          if( $validator -> fails() ) {   // if validation Failed
               return redirect() -> back() ->withErrors($validator)->withInput();
          }

          if(        
               Auth::guard("admin") -> attempt([  // attempt ==> mean see it in tables
                    "username" => $request->username ,
                    "password" => $request->password
               ])  
          ){  
               return redirect() -> to("/admin");  // recodes the same with requests create session guard admin
          }else{
               // if validate success but no same in db recordes ==> return back login page with custom error
               return redirect() -> back() ->withErrors( $validator->getMessageBag()->add('username', " your admin data ins't correct ") )->withInput();
          }

     }


}