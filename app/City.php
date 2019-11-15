<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    /** @test */
    public function localities()
    {
        return $this->hasMany(Locality::class);
    }

    /** @test */
    public function offices()
    {
        return $this->hasMany(Office::class);
    }
}
