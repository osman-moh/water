<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Square extends Model
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
    public function town()
    {
        return $this->belongsTo(Town::class, 'town_id');
    }
}
