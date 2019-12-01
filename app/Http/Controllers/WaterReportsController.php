<?php

namespace App\Http\Controllers;

use App\Locality;
use App\Report;
use App\ReportStatus;
use App\ReportType;
use Illuminate\Http\Request;

class WaterReportsController extends Controller
{
    /** @test */
    public function index()
    {
        $localities = Locality::all();
        $reportTypes = ReportType::all();
        $reportStatuses = ReportStatus::all();


        return view('water-reports.index', compact(['localities', 'reportTypes', 'reportStatuses']));
    }

    /** 
     * Generate summary report for Localities or Offices
     * 
     * @param \Illuminate\Http\Request
     * 
     */
    public function generateSumReport(Request $request)
    {
        //return $request;
        //validate request
        $request->validate([
            'fDate' => 'required|date',
            'tDate'   => 'required|date',
            'summaryReport' => 'required|int',
        ]);

        if ($request->summaryReport == 2) {
            $arrayOFLocalities = $this->generateOfficesSum($request);
        } else {

            //get the reports based on the selection parameters
            $reports = Report::where([
                ['date', '>=', $request->fDate],
                ['date', '<=', $request->tDate],
            ])->with(['locality',  'status', 'type'])->get();

            $arrayOFLocalities = [];

            foreach ($reports as $key => $report) {
                if (!empty($arrayOFLocalities[$report->locality->name])) {

                    //get old total
                    $total = $arrayOFLocalities[$report->locality->name]['total'];

                    //increment locality reports no.
                    $arrayOFLocalities[$report->locality->name]['total'] =  ++$total;

                    //check for solved reports
                    if ($report->report_status_id == 2 && $report->report_type_id != 8) {

                        //check for report type
                        if (!empty($arrayOFLocalities[$report->locality->name]['fixed'][$report->type->name])) {
                            //get old total
                            $totalFixed = $arrayOFLocalities[$report->locality->name]['fixed'][$report->type->name];

                            //increment solved reports no.
                            $arrayOFLocalities[$report->locality->name]['fixed'][$report->type->name] =  ++$totalFixed;
                        } else {
                            //increment solved reports no.
                            $arrayOFLocalities[$report->locality->name]['fixed'][$report->type->name] =  1;
                        }
                    } elseif ($report->report_status_id != 2 && $report->report_type_id != 8) {
                        //check for report type
                        if (!empty($arrayOFLocalities[$report->locality->name]['unfixed'][$report->type->name])) {
                            //get old total
                            $totalUnFixed = $arrayOFLocalities[$report->locality->name]['unfixed'][$report->type->name];

                            //increment unsolved reports no.
                            $arrayOFLocalities[$report->locality->name]['unfixed'][$report->type->name] =  ++$totalUnFixed;
                        } else {
                            //increment unsolved reports no.
                            $arrayOFLocalities[$report->locality->name]['unfixed'][$report->type->name] =  1;
                        }
                    } else { }
                } else {
                    //set the localities array with a total of 1
                    $arrayOFLocalities[$report->locality->name]['total'] = 1;

                    if ($report->report_status_id == 2 && $report->type->name != 8) {
                        //increment fixed reports no.
                        $arrayOFLocalities[$report->locality->name]['fixed'][$report->type->name] =  1;
                    } elseif ($report->report_status_id != 2 && $report->type->name != 8) {
                        //increment unfixed reports no.
                        $arrayOFLocalities[$report->locality->name]['unfixed'][$report->type->name] =  1;
                    } else { }
                }
            }
        }
        if ($request->summaryReport == 1) {
            $reportTitle = ' المحليات';
        } else {
            $reportTitle = ' المكاتب';
        }
        //return $arrayOFLocalities;
        return view('water-reports.summary', [
            'reports' => $arrayOFLocalities,
            'reportTypes'   => ReportType::where('id', '!=', 8)->get(),
            'fromDate'     => $request->fDate,
            'toDate'       => $request->tDate,
            'title'     =>  $reportTitle,
        ]);
    }

    /** 
     * Return summary report for offices
     * 
     * @param Request $request
     * @return Response $response
     */
    private function generateOfficesSum(Request $request)
    {
        //get the reports based on the selection parameters
        $reports = Report::where([
            ['date', '>=', $request->fDate],
            ['date', '<=', $request->tDate],
        ])->with(['office', 'status', 'type'])->get();

        $arrayOfOffices = [];

        foreach ($reports as $key => $report) {

            if (!empty($arrayOfOffices[$report->office->name])) {

                //get old total
                $total = $arrayOfOffices[$report->office->name]['total'];

                //increment office reports no.
                $arrayOfOffices[$report->office->name]['total'] =  ++$total;

                //check for solved reports
                if ($report->report_status_id == 2 && $report->report_type_id != 8) {

                    //check for report type
                    if (!empty($arrayOfOffices[$report->office->name]['fixed'][$report->type->name])) {
                        //get old total
                        $totalFixed = $arrayOfOffices[$report->office->name]['fixed'][$report->type->name];

                        //increment solved reports no.
                        $arrayOfOffices[$report->office->name]['fixed'][$report->type->name] =  ++$totalFixed;
                    } else {
                        //increment solved reports no.
                        $arrayOfOffices[$report->office->name]['fixed'][$report->type->name] =  1;
                    }
                } elseif ($report->report_status_id != 2 && $report->report_type_id != 8) {
                    //check for report type
                    if (!empty($arrayOfOffices[$report->office->name]['unfixed'][$report->type->name])) {
                        //get old total
                        $totalUnFixed = $arrayOfOffices[$report->office->name]['unfixed'][$report->type->name];

                        //increment unsolved reports no.
                        $arrayOfOffices[$report->office->name]['unfixed'][$report->type->name] =  ++$totalUnFixed;
                    } else {
                        //increment unsolved reports no.
                        $arrayOfOffices[$report->office->name]['unfixed'][$report->type->name] =  1;
                    }
                } else { }
            } else {
                //set the localities array with a total of 1
                $arrayOfOffices[$report->office->name]['total'] = 1;

                if ($report->report_status_id == 2 && $report->type->name != 8) {
                    //increment fixed reports no.
                    $arrayOfOffices[$report->office->name]['fixed'][$report->type->name] =  1;
                } elseif ($report->report_status_id != 2 && $report->type->name != 8) {
                    //increment unfixed reports no.
                    $arrayOfOffices[$report->office->name]['unfixed'][$report->type->name] =  1;
                } else { }
            }
        }

        return  $arrayOfOffices;
    }

    /** 
     * Generate detailed reports
     * 
     * @param \Illuminate\Http\Request
     * @return Response
     */
    public function generateReport(Request $request)
    {
        //validate request parameters
        $request->validate([
            'fromDate' => 'required|date',
            'toDate'   => 'required|date',
            'locality_id' => 'required|int',
            'office_id'   => 'nullable|int',
            'report_type' => 'nullable|int',
            'report_status' => 'nullable|int',
        ]);

        $parameters          = [];
        $reportLocalityName  = '';
        $reportOfficeName    = '';
        $reportTypeName      = '';
        $reportStatusName    = '';

        $parameters[]          = ['date', '>=', $request->fromDate];
        $parameters[]          = ['date', '<=', $request->toDate];

        if ($request->locality_id > 0) {
            $parameters[]       = ['locality_id', $request->locality_id];
            $reportLocalityName = Locality::findOrFail($request->locality_id);
        }
        if ($request->office_id > 0) {
            $parameters[]       = ['office_id', $request->office_id];
            $reportOfficeName   = \App\Office::findOrFail($request->office_id);
        }
        if ($request->report_type > 0) {
            $parameters[]       = ['report_type_id', $request->report_type];
            $reportTypeName     = ReportType::findOrFail($request->report_type);
        }
        if ($request->report_status > 0) {
            $parameters[]       = ['report_status_id', $request->report_status];
            $reportStatusName   = ReportStatus::findOrFail($request->report_status);
        }

        $reports = Report::where($parameters)->with([
            'locality', 'office', 'town', 'square', 'type', 'sub_type', 'status'
        ])->get();

        //return $reports;

        return view('water-reports.show', [
            'reports'      => $reports,
            'localityName' => $reportLocalityName,
            'officeName'   => $reportOfficeName,
            'typeName'     => $reportTypeName,
            'statusName'   => $reportStatusName,
            'fromDate'     => $request->fromDate,
            'toDate'       => $request->toDate,
        ]);
    }
}
