<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportSubDetail extends Model
{
    //
    protected $fillable = ['name' , 'report_type_id' , 'report_sub_type_id'];
    /** @test */
    public function report_sub_types()
    {
        return $this->belongsTo(ReportSubType::class, 'report_sub_type_id');
    }
}
