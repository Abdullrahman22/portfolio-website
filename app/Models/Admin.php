<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable  = [ "username" , "email" , "password" ];
    protected $hidden    = [ "created_at" , "updated_at" ] ;

}
