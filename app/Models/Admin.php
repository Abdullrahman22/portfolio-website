<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable  // to use attepm func for auth
{
    protected $fillable  = [ "username" , "email" , "password" ];
    protected $hidden    = [ "created_at" , "updated_at" ] ;

}
