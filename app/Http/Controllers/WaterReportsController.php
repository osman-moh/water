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
        //validate request
        //get the reports based on the selection parameters
        $reports = Report::where([['date', '>=', $request->from_date], ['date', '<=', $request->to_date]])->get();

        // $reportsByLocality = $reports->countBy(function ($report) {
        //     return $report->locality->name;
        // });

        $reportsByLocalities = $reports->groupBy(function ($report) {
            return $report->locality->name;
        });

        foreach ($reportsByLocalities as $key => $reportsByLocality) {
            $result[$key]['type']  = $reportsByLocality->countBy(function ($report) {
                return $report->type->name;
            });

            $result[$key]['fixed-reports']      = $reportsByLocality->filter(function ($report) {
                return $report->report_status_id == 2;
            })->countBy(function ($report) {
                return $report->type->name;
            });

            $result[$key]['pending-reports']      = $reportsByLocality->filter(function ($report) {
                return $report->report_status_id == 3;
            })->countBy(function ($report) {
                return $report->type->name;
            });

            $result[$key]['recieved-reports']      = $reportsByLocality->filter(function ($report) {
                return $report->report_status_id == 4;
            })->countBy(function ($report) {
                return $report->type->name;
            });

            $result[$key]['unfixed-reports']      = $reportsByLocality->filter(function ($report) {
                return $report->report_status_id == 1;
            })->countBy(function ($report) {
                return $report->type->name;
            });

            $result[$key]['status']  = $reportsByLocality->countBy(function ($report) {
                return $report->status->name;
            });
        }

        return $result;
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
