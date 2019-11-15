<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //
    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }
    public function locality()
    {
        return $this->belongsTo('App\Locality', 'locality_id');
    }
    public function office()
    {
        return $this->belongsTo('App\Office', 'office_id');
    }

    /** @test */
    public function squares()
    {
        return $this->hasMany(Square::class);
    }
}
