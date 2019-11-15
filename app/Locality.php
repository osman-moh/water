<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\City;

class Locality extends Model
{
    //
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /** @test */
    public function offices()
    {
        return $this->hasMany(Office::class);
    }
}
