<?php

namespace App;

use App\City;
use App\Locality;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function locality()
    {
        return $this->belongsTo(Locality::class, 'locality_id');
    }
    /** @test */
    
    public function towns()
    {
        return $this->hasMany(Town::class);
    }
}
