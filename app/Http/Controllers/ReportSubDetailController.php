<?php

namespace App\Http\Controllers;

use App\ReportSubDetail;
use Illuminate\Http\Request;
use App\ReportSubType;

class ReportSubDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $report_sub_details = ReportSubDetail::all();
        //return $report_sub_details ;
        return view('report_sub_details.index', compact('report_sub_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $report_sub_types = ReportSubType::all();
        return view('report_sub_details.create', compact('report_sub_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $report_sub_detail = new ReportSubDetail() ;

        $report_sub_detail->name = request('name') ;
        $report_sub_detail->report_sub_type_id = request('report_sub_type_id') ;

        $report_sub_detail->save();
        return redirect('report_sub_details');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportSubDetail  $reportSubDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ReportSubDetail $reportSubDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReportSubDetail  $reportSubDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportSubDetail $reportSubDetail)
    {
        //
        $report_sub_types = ReportSubType::all();
        return view('report_sub_details.edit', compact('report_sub_types', 'reportSubDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReportSubDetail  $reportSubDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportSubDetail $reportSubDetail)
    {
        //
        //return request()->all();
        $reportSubDetail->update([
                                'name' => request('name'),
                                'report_sub_type_id' => request('report_sub_type_id')
                                ]);

        return redirect('/report_sub_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReportSubDetail  $reportSubDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportSubDetail $reportSubDetail)
    {
        //
        $reportSubDetail->delete() ;
        return redirect('/report_sub_details');
    }

    /** @getReportSubDetail
     * get list of report sub details
     */
    public function getReportSubDetail($id)
    {
        $sub_types = ReportSubDetail::where('report_sub_type_id', $id)->get();
        return ($sub_types->count()) ? $sub_types : [] ;
    }
}
