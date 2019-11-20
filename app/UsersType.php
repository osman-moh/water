<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersType extends Model
{
    //table name
    protected $table = "user_types";

    protected $fillable = ['name'];
}
