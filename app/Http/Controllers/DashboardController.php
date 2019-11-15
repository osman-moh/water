<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class DashboardController extends Controller
{
    //
    /** @test */
    public function getReports($start, $end)
    {
        $reports = Report::whereBetween('created_at', [$start.' 00:00:00' , $end.' 23:59:59'])->get();

        $total  = 0;
        $finished = 0 ;
        $unfinished = 0 ;

        if ($reports->count()) {
            $total = $reports->count() ;

            foreach ($reports as $key => $value) {
                if ($value->report_status == 2) {
                    $finished += 1 ;
                }
            }
        }
        
        return ['total'=> $total , 'finished'=> $finished , 'unfinished'=> $total - $finished];
    }
}
