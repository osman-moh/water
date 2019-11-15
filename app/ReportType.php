<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    //
    protected $fillable = ['name'];

    /** @test */
    public function report_sub_type()
    {
        return $this->hasMany(ReportSubType::class);
    }
}
