<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportSubType extends Model
{
    //
    /** @test */
    public function report_type()
    {
        return $this->belongsTo(ReportType::class) ;
    }
    /** @test */
    public function report_sub_details()
    {
        return $this->hasMany(ReportSubDetail::class);
    }
}
