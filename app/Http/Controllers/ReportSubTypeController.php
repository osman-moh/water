<?php

namespace App\Http\Controllers;

use App\ReportSubType;
use Illuminate\Http\Request;
use App\ReportType;

class ReportSubTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $report_sub_types = ReportSubType::all();
        return view('report_sub_types.index', ['sub_types' => $report_sub_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $report_types = ReportType::all();
        return view('report_sub_types.create')->with('report_types', $report_types);
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
        $data = new ReportSubType();
        $data->name = $request->name;
        $data->report_type_id = $request->report_type_id;
        $data->save();
        return redirect()->to(route('report_sub_types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportSubType  $reportSubType
     * @return \Illuminate\Http\Response
     */
    public function show(ReportSubType $reportSubType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReportSubType  $reportSubType
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportSubType $report_sub_type)
    {
        //
        $report_types  = ReportType::all();
        //return $report_types ;
        return view('report_sub_types.edit')
            ->with('report_sub_type', $report_sub_type)
            ->with('report_types', $report_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReportSubType  $reportSubType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //  return $request->all();
        $data = ReportSubType::find($id);
        $data->name = $request->name;
        $data->report_type_id = $request->report_type_id;
        $data->save();
        return redirect()->to(route('report_sub_types.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReportSubType  $reportSubType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportSubType $reportSubType)
    {
        //
        $reportSubType->delete();
        return redirect('report_sub_types');
    }
}
