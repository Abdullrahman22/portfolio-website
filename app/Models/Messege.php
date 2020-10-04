<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messege extends Model
{
    protected $fillable  = [ "body" , "name" , "email" ];
    protected $hidden = [ "created_at" , "updated_at" ] ;
}
