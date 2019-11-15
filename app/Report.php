<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = "reports";

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function locality()
    {
        return $this->belongsTo(Locality::class, 'locality_id');
    }
    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }
    public function town()
    {
        return $this->belongsTo(Town::class, 'town_id');
    }
    public function square()
    {
        return $this->belongsTo(Square::class, 'square_id');
    }
    public function status()
    {
        return $this->hasOne(ReportStatus::class, 'id', 'report_status');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'reporter_type');
    }

    /** @test */
    public function type()
    {
        return $this->belongsTo(ReportType::class, 'report_type');
    }

    /** @test */
    public function sub_type()
    {
        return $this->belongsTo(ReportSubType::class, 'report_sub_type');
    }

    /** @test */
    public function user()
    {
        return $this->belongsTo(User::class, 'createby');
    }

    /** @test */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location');
    }

    /** @test */
    public function sub_report_detail()
    {
        return $this->belongsTo(ReportSubDetail::class, 'report_detail');
    }
}
