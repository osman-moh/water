<?php

namespace App\Http\Controllers;

use App\ReportType;
use Illuminate\Http\Request;

class ReportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $data = ReportType::all();
        //return $data ;
        return view('reportType.index')->with('data', $data);
        //  return view('usersType.index');
    }
    public function create()
    {

        //
        return view('reportType.create');
    }

    public function store(Request $request)
    {
        //
        //return $request->all();
        $data = new ReportType();
        $data->name = $request->user_type;
        $data->save();
        return redirect()->to(route('reportType.index'));
    }
    public function edit($id)
    {
        //
        $data = ReportType::find($id);
        //dd($data);
        return view('reportType.edit')->with('data', $data);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();

        $data = ReportType::find($id);
        $data->name = $request->type;
        $data->save();
        return redirect()->to(route('reportType.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        ReportType::destroy($id);
        
        return redirect()->to(route('reportType.index'));
    }

    /** @test */
    public function getReportSubType($id)
    {
        return ReportType::findOrFail($id)->report_sub_type ;
    }
}
