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

}