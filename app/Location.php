<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    //protected $table = "locations" ;
    /** @test */
    public function offices()
    {
        return $this->hasMany(Office::class);
    }
}
