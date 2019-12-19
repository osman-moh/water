<?php

namespace App\Http\Controllers;

use App\City ;
use App\Locality;
use App\Report;
use App\ReportStatus;
use App\ReportType;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class WaterReportsController extends Controller
{
    /** @test */
    public function index()
    {
        $cities = City::all();
        $reportTypes = ReportType::all();
        $reportStatuses = ReportStatus::all();


        return view('water-reports.index', compact(['cities', 'reportTypes', 'reportStatuses']));
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
        $request->validate([
            'fDate' => 'required|date',
            'tDate'   => 'required|date',
            'summaryReport' => 'required|int',
        ]);

        $object = 'locality' ;
        if ($request->summaryReport == 2) {
            $object = 'office' ;
        } 
        //get the reports based on the selection parameters
        $reports = Report::where([
            ['date', '>=', $request->fDate],
            ['date', '<=', $request->tDate],
        ])->with([$object,  'status', 'type'])->get();

        //generate reports
        $arrayOFReports = $this->generateSum($reports , $object); ;

        if ($request->summaryReport == 1) {
            $reportTitle = 'المحلية';
            $headerTitle = 'ملخص البلاغات حسب المحليات';
        } else {
            $reportTitle = ' المكتب';
            $headerTitle = 'ملخص البلاغات حسب المكاتب';
        }
        
        $data = [
            'reports' => $arrayOFReports,
            'reportTypes'   => ReportType:: all(),
            'fromDate'      => $request->fDate,
            'toDate'        => $request->tDate,
            'title'         =>  $reportTitle,
            'headerTitle'    => $headerTitle,
        ];

        $pdf = Pdf::loadView('pdf-templates.summary', compact('data'));
        return $pdf->stream('test.pdf');
       
    }

    /** 
     * Generate detailed reports
     * 
     * @param \Illuminate\Http\Request
     * @return Response
     */
    public function generateReport(Request $request)
    {
        //return $request ;
        //validate request parameters
        $request->validate([
            'fromDate' => 'required|date',
            'toDate'   => 'required|date',
            'locality_id' => 'nullable|int',
            'office_id'   => 'nullable|int',
            'town_id'   => 'nullable|int',
            'square_id'   => 'nullable|int',
            'city_id'   => 'required|int',
            'report_type' => 'nullable|int',
            'report_status' => 'nullable|int',
            'reportTotal'  => 'nullable|int',
        ]);

        $parameters          = [];
        $reportLocalityName  = '';
        $reportOfficeName    = '';
        $reportTypeName      = '';
        $reportStatusName    = '';
        $reportCityName      = '';
        $reportTownName      = '';
        $reportSquareName    = '';

        $relation = [] ;
        $object   = '' ;
        $reportTitle = '' ;


        $parameters[]          = ['date', '>=', $request->fromDate];
        $parameters[]          = ['date', '<=', $request->toDate];

        if ($request->city_id >= 0) {
            $reportTitle = 'المناطق' ;
            if($request->city_id > 0){
                $parameters[]       = ['city_id', $request->city_id];
                $reportCityName = City::findOrFail($request->city_id);
                
                $reportTitle = 'المنطقة' ;
            }
            
            $relation [] = 'city' ;
            $object   = 'city' ;
            
        }

        if ($request->locality_id != null) {
            $reportTitle = 'المحليات' ;
            if($request->locality_id > 0){
                $parameters[]       = ['locality_id', $request->locality_id];
                $reportLocalityName = Locality::findOrFail($request->locality_id);
                
                $reportTitle = 'المحلية' ;
            }
            
            $relation[] = 'locality' ;
            $object   = 'locality' ;

        }

        if ($request->office_id != null) {
            $reportTitle = 'المكاتب' ;
            if($request->office_id > 0){
                $parameters[]       = ['office_id', $request->office_id];
                $reportOfficeName   = \App\Office::findOrFail($request->office_id);
                $reportTitle = 'المكتب' ;
            }
            
            $relation [] = 'office' ;
            $object   = 'office' ;
        }

        if ($request->town_id  != null) {
            $reportTitle = 'المدن' ;
            if($request->town_id > 0){
                $parameters[]       = ['town_id', $request->town_id];
                $reportTownName   = \App\Town::findOrFail($request->town_id);
                $reportTitle = 'المدينة' ;
            }
            
            $relation[] = 'town' ;
            $object   = 'town' ;
        }

        if ($request->square_id != null) {
            $reportTitle = 'المربعات' ;
            if($request->square_id > 0){
                $parameters[]       = ['square_id', $request->square_id];
                $reportSquareName   = \App\Square::findOrFail($request->square_id);
                
                $reportTitle = 'المربع' ;
            }
            
            $relation[] = 'square' ;
            $object   = 'square' ;
        }

        if ($request->report_type != null) {
            $parameters[]       = ['report_type_id', $request->report_type];
            $reportTypeName     = ReportType::findOrFail($request->report_type);
        }
        if ($request->report_status > 0) {
            $parameters[]       = ['report_status_id', $request->report_status];
            $reportStatusName   = ReportStatus::findOrFail($request->report_status);
        }
        
        
        $relation[] = 'type' ;
        $relation[] = 'sub_type' ;
        $relation[] = 'status' ;
       
        //detailed reports  
        $reports = Report::where($parameters)->with($relation)->get();
        if($request->reportTotal == null){
            $reports  = $this->generateSum($reports , $object);
        }
        
        $data = [
                'reports'      => $reports,
                'localityName' => $reportLocalityName,
                'officeName'   => $reportOfficeName,
                'cityName'   => $reportCityName,
                'townName'   => $reportTownName,
                'squareName'   => $reportSquareName,
                'typeName'     => $reportTypeName,
                'statusName'   => $reportStatusName,
                'fromDate'     => $request->fromDate,
                'toDate'       => $request->toDate,
                'reportTotal'  =>  $request->reportTotal  ,
                'title'        => $reportTitle,
                'reportTypes'   => ReportType:: all(),
                'request'      => $request->all(),
            ];
        
        $pdf = Pdf::loadView('pdf-templates.detail', compact('data'));
        return $pdf->stream('البلاغات في الفترة من ' . $request->fromDate . ' إلى ' . $request->toDate . '.pdf');
        
    }

    /**
     * Generate dynamic reports
     * 
     * @param Array $reports
     * @param String $object
     * 
     * @return Array
     */

    private function generateSum($reports , $object){

        $arrayOfReports = [];

        for ($i = 0 ; $i < $reports->count() ; $i++) {

            if (!empty($arrayOfReports[$reports[$i][$object]->name])) {

                //get old total
                $total = $arrayOfReports[$reports[$i][$object]->name]['total'];

                //increment office reports no.
                $arrayOfReports[$reports[$i][$object]->name]['total'] =  ++$total;

                //check for solved reports
                if ($reports[$i]->report_status_id == 2  ) {

                    //check for report type
                    if (!empty($arrayOfReports[$reports[$i][$object]->name]['fixed'][$reports[$i]->type->name])) {
                        //get old total
                        $totalFixed = $arrayOfReports[$reports[$i][$object]->name]['fixed'][$reports[$i]->type->name];

                        //increment solved reports no.
                        $arrayOfReports[$reports[$i][$object]->name]['fixed'][$reports[$i]->type->name] =  ++$totalFixed;
                    } else {
                        //increment solved reports no.
                        $arrayOfReports[$reports[$i][$object]->name]['fixed'][$reports[$i]->type->name] =  1;
                    }
                } elseif ($reports[$i]->report_status_id != 2  ) {
                    //check for report type
                    if (!empty($arrayOfReports[$reports[$i][$object]->name]['unfixed'][$reports[$i]->type->name])) {
                        //get old total
                        $totalUnFixed = $arrayOfReports[$reports[$i][$object]->name]['unfixed'][$reports[$i]->type->name];

                        //increment unsolved reports no.
                        $arrayOfReports[$reports[$i][$object]->name]['unfixed'][$reports[$i]->type->name] =  ++$totalUnFixed;
                    } else {
                        //increment unsolved reports no.
                        $arrayOfReports[$reports[$i][$object]->name]['unfixed'][$reports[$i]->type->name] =  1;
                    }
                } else { }
            } else {
                //set the localities array with a total of 1
                $arrayOfReports[$reports[$i][$object]->name]['total'] = 1;

                if ($reports[$i]->report_status_id == 2    ) {
                    //increment fixed reports no.
                    $arrayOfReports[$reports[$i][$object]->name]['fixed'][$reports[$i]->type->name] =  1;
                } elseif ($reports[$i]->report_status_id != 2    ) {
                    //increment unfixed reports no.
                    $arrayOfReports[$reports[$i][$object]->name]['unfixed'][$reports[$i]->type->name] =  1;
                } else { }
            }
        }

        return  $arrayOfReports;

    }

}
