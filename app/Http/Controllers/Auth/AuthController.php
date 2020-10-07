<?php

namespace App\Http\Controllers\Auth;

use App\Models\Messege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

     public function index(){
          return view("auth.login");
     }

     public function login(Request $request){

          $rules = [
               "username" =>  "required | min:8 | max:50 ",
               "password" =>  "required | min:8 | max:50 " ,
          ];

          $validator = Validator::make(  $request->all() , $rules  ); 

          if( $validator -> fails() ) { 
               return redirect() -> back() ->withErrors($validator)->withInput();
          }

          // if(   
          //      Auth::guard("admin") -> attempt([  // attempt ==> mean see it in tables
          //           "email" => $request->email ,
          //           "password" => $request->password
          //      ])  
          // ){  
          //      return redirect() -> to("/admin/overview");
          // }else{
          //      return redirect() -> back() ->withErrors( $validator->getMessageBag()->add('email', " your admin data ins't correct ") )->withInput();
          // }

     }

}