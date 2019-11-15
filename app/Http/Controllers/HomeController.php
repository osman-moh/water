<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Communication;
use \Datetime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$data= Communication::all();



            $date_filters['this_fy'] = date('Y');




        //$date_filters['this_week']['end'] = date( 'Y-m-d', strtotime( 'sunday this week' ) );
		$date_filters['this_day']['start']  = date('Y-m-d 00:00:00');
		$date_filters['this_day']['end']	= date('Y-m-d 23:59:59');
		
        $date_filters['this_month']['start'] = date( 'Y-m-01' );
        $date_filters['this_month']['end'] = date( 'Y-m-t' );
        $date_filters['this_week']['start'] = date( 'Y-m-d', strtotime( 'saturday last week' ) );
        $date_filters['this_week']['end'] = date( 'Y-m-d', strtotime( 'friday this week' ) );
        $date_filters['fy']['start'] = date( 'Y-1-01' );
        $date_filters['fy']['end'] = date( 'Y-12-31' );







       // return $date_filters;$date_filters
        return view('home')->with('date_filters',$date_filters);
    }
}
