<?php

namespace App\Http\Controllers\Admin;

use App\Models\Messege;
use App\Http\Controllers\Controller;

class MessegeController extends Controller
{

     public function index(){

          $messeges = Messege::get();
          return view("admin.messeges" , compact('messeges') );
          
     }

}