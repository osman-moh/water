<?php

namespace App\Http\Controllers;

use App\City;
use App\Report;
use App\Category;
use App\Location;
use App\ReportType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Locality;
use App\Office;
use App\Square;
use App\Town ;
use App\ReportSubType;
use App\ReportSubDetail;
use Yajra\DataTables\Facades\DataTables;

class ReportsController extends Controller
{
    //
    private $initial_report_status = 4 ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if not city manager:
        /*if (Auth::user()->type === 2) {
            $reports = Report::where('city_id', '=', Auth::user()->city_id)->get();
        } else {
            //$reports = Report::all();
            $reports = Report::orderBy('id' ,'desc')->get();
        }*/
        
        return view('reports.index');
    }

    /** @test */
    public function getReports()
    {
		if (Auth::user()->user_type_id === 2) {
            //$reports = Report::where('city_id', '=', Auth::user()->city_id)->get();
			return DataTables::of(Report::where('city_id', '=', Auth::user()->city_id)->with(['locality', 'office' , 'status']))->make(true);
        } else {
            //$reports = Report::all();
            return DataTables::of(Report::query()->with(['locality', 'office' , 'status']))->make(true);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locations  = Location::all();
        $towns      = Town::all();
        $types      = ReportType::all();

        $categories = Category::all();
        return view('reports.create')
            ->with('locations', $locations)
            ->with('towns', $towns)
            ->with('categories', $categories)
            
            ->with('types', $types);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = new Report();
        $save->location_id     = $request->location;
        $save->date         = $request->date;
        $save->name         = $request->name;
        $save->phone1       = $request->phone1;
        
        $save->report_action_description= $request->report_action_description;
        $save->category_id= $request->reporter_type;
        $save->manager_name = $request->manager_name;
        $save->manager_phone= $request->manager_phone;
        $save->city_id      = $request->city_id;
        $save->locality_id  = $request->locality_id;
        $save->office_id    = $request->office_id;
        $save->town_id      = $request->town_id;
        $save->square_id    = $request->square_id;
        $save->house_number = $request->house_number;
        $save->house_description    = $request->house_description;
        $save->report_type_id          = $request->report_type;
        $save->report_sub_type_id      = $request->report_sub_type ;
        $save->report_sub_detail_id  = $request->report_detail;
        $save->createby       = Auth::id();
        $save->report_status_id  = $this->initial_report_status ;
       
        $save->save();
        
        //send message to manager & reporter
        $reporterPhone = '249'.substr($request->phone1, 1, 9) ;
        $managerPhone  = '249'.substr($request->manager_phone, 1, 9) ;
        
        $signature     = trim('|| هيئة مياه ولاية الخرطوم') ;
        $bodyReporter  = trim('تم تدوين بلاغك بالرقم : '.$save->id.' '.$signature) ;
        $bodyManager   = trim('الرجاء معالجة البلاغ بالرقم : '.$save->id. ' ' .$signature) ;

        $this->sendMultipleMessages($reporterPhone, $bodyReporter, $managerPhone, $bodyManager) ;

        return redirect('/reports')->with('message', 'تم الحفظ بنجاح')->with('id', $save->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
        // $report = Report::findOrFail($id);
        
        if ($report->city_id != Auth::user()->city_id && Auth::user()->user_type_id != 1) {
            abort(403);
            
        }
        return view('reports.show', ['report'=>$report]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $report = Report::find($id);
    
        $locations  = Location::all();
        $categories = Category::all();
        $towns     = Town::all();
       
        ///$localities = Locality::where('city_id', $report->city_id)->get();
        //$offices    = Office::where('locality_id', $report->locality_id)->get();
        //$towns      =  Town::where('office_id', $report->office_id)->get() ;
        //$squares    = Square::where('town_id', $report->town_id)->get();
        $types      = ReportType::all();
        $sub_types  = ReportSubType::where('report_type_id', $report->report_type_id)->get();
        $sub_detail = ReportSubDetail::where('report_sub_type_id', $report->report_sub_type_id)->get();
        
        return view("reports.edit")
            ->with('report', $report)
            ->with('locations', $locations)
            ->with('categories', $categories)
            ->with('towns', $towns)
            ->with('types', $types)
            ->with('report_sub_types', $sub_types)
          //  ->with('report_action_description', $report_action_description)
            ->with('report_sub_details', $sub_detail);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $data               = Report::find($id);
       // return $data;
        $data->location_id     = isset($request->location) ? $request->location : $data->location;
        $data->date         = isset($request->date) ? $request->date : $data->date;
        $data->phone1       = isset($request->phone1) ? $request->phone1 : $data->phone1;
        $data->name         =isset($request->name)?$request->name:$data->name;
        $data->category_id  = isset($request->reporter_type) ? $request->reporter_type : $data->reporter_type;
        $data->manager_name = isset($request->manager_name) ? $request->manager_name : $data->manager_name;
        $data->manager_phone= isset($request->manager_phone) ? $request->manager_phone : $data->manager_phone;
        $data->city_id      = isset($request->city_id) ? $request->city_id : $data->city_id;
        $data->locality_id  = isset($request->locality_id) ? $request->locality_id : $data->locality_id;
        $data->office_id    = isset($request->office_id) ? $request->office_id : $data->office_id;
        $data->town_id      = isset($request->town_id) ? $request->town_id : $data->town_id;
        $data->square_id    = isset($request->square_id) ? $request->square_id : $data->square_id;
        $data->house_number         =isset($request->house_number)?$request->house_number:$data->house_number;
        $data->report_action_description         =isset($request->report_action_description)?$request->report_action_description:$data->report_action_description;

          // $data->house_number = isset($request->House_number) ? $request->House_number : $data->house_number;
        $data->house_description = isset($request->house_description) ? $request->house_description : $data->house_description;
        $data->report_type_id  = isset($request->report_type_id) ? $request->report_type_id : $data->report_type_id;
        $data->report_sub_detail_id= isset($request->report_detail) ? $request->report_detail : $data->report_detail;
        $data->report_sub_type_id	= isset($request->report_sub_type) ? $request->report_sub_type : $data->report_sub_type;
        $data->updateby = Auth::id();
        //$data->createby = Auth::id();
        $data->report_status_id = isset($request->report_status) ? $request->report_status : $data->report_status_id;

        $data->save();
        $request->session()->flash('status', 'تم التعديل بنجاح!');
        return redirect()->to(route('reports.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        Report::destroy($id);
        $request->session()->flash('status', 'تم التعديل بنجاح!');
        return redirect()->to(route('reports.index'));
    }

    /** @test */
    public function sendMssg($reporterPhone, $messageBody)
    {
        $message    =   trim($messageBody).' '.trim('|| هيئة مياه ولاية الخرطوم') ;

        $url = 'http://212.0.129.229/bulksms/webacc.aspx?user=watercorp&pwd=8778&smstext='.
                urlencode($message).'&Sender=3131&Nums='.trim($reporterPhone);
        
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        
        // Send the request & save response to $resp
        $response = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        
        return $response;
    }

    /** @test */
    public function updateStatus($id)
    {
        $report = Report::findOrFail($id) ;

        $report->report_status_id = request('report_status') ;
        $report->save();
        $message = 'تم تعديل حالة البلاغ بنجاح';
        $delivered = '';
        $phone   = '249'.substr($report->phone1, 1, 9) ;
        //check report status:
        if (request('report_status') == 2) {
            //solved reports -> send reporter a message
            $messageBody = 'لقد تمت معالجة بلاغك بالرقم : '.$report->id;
            $delivered   = $this->sendMssg($phone, $messageBody) ;
            if ($delivered) {
                $message .= ' تم إرسال الرسالة بنجاح !' ;
            } else {
                $message .= ' لم يتم إرسال الرسالة';
            }
        }

        return redirect('/reports')->with('message', $message);
    }

    /** Send two SMSs, 1 for the manager & the other to the reporter
     *
     * @param string
     * @return string
     */
    public function sendMultipleMessages($reporterPhone, $reporterBody, $managerPhone, $managerBody)
    {
        $url1 = 'http://212.0.129.229/bulksms/webacc.aspx?user=watercorp&pwd=8778&smstext='.
                urlencode($reporterBody).'&Sender=3131&Nums='.$reporterPhone;

        $url2 = 'http://212.0.129.229/bulksms/webacc.aspx?user=watercorp&pwd=8778&smstext='.
                urlencode($managerBody).'&Sender=3131&Nums='.$managerPhone;

        // create both cURL resources
        $ch1 = curl_init();
        $ch2 = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch1, CURLOPT_URL, $url1);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt($ch2, CURLOPT_URL, $url2);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

        //create the multiple cURL handle
        $mh = curl_multi_init();

        //add the two handles
        curl_multi_add_handle($mh, $ch1);
        curl_multi_add_handle($mh, $ch2);

        $running=null;
        //execute the handles
        do {
            $mch = curl_multi_exec($mh, $running);
        } while ($running > 0);

        //close all the handles
        curl_multi_remove_handle($mh, $ch1);
        curl_multi_remove_handle($mh, $ch2);
        curl_multi_close($mh);

        return $mch ;
    }

    /** @test */
    public function checkHouse()
    {
        $reports = Report::where([
                                ['house_number', '=' , request('house_id')],
                                ['office_id' , '=' , request('office_id') ],
                                ['town_id' , '=' , request('town_id')] ,
                                ['square_id' , '=' , request('square_id')] ,
                                ['report_status' , '!=' , 2]
                                ])->firstOrFail();
       
        if ($reports->count()) {
            return ['report_id'=>$reports->id , 'reporter_name'=>$reports->name , 'reporter_phone'=>$reports->phone1 , 'report_date'=>$reports->created_at];
        }
        return response()->json($reports);
        //return false ;
    }
}
