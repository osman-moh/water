<?php

namespace App\Http\Controllers;

use App\City;
use App\Office;
use Illuminate\Http\Request;
use App\Locality;

class OfficesController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $offices = Office::with('city')->with('locality')->paginate(10);
        //return $offices;
        return view('offices.index', ['offices'=> $offices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::all();
        return view('offices.create')->with('cities', $cities);
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
        $data       = new Office();
        $data->name = $request->name;
        $data->manager_name  = $request->manager_name ;
        $data->manager_phone= $request->phone ;
        $data->city_id      = $request->city_id;
        $data->locality_id  = $request->locality_id;
        $data->save();

        return redirect('offices')->with('message', 'تم الحفظ بنجاح !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //
        $cities    = City::all();
        $offices   = Office::find($id);
        $localities = Locality::where('city_id', $offices->city_id)->get();
        return view('offices.edit')
            ->with('cities', $cities)
            ->with('offices', $offices)
            ->with('localities', $localities);
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
        $data                   = Office::find($id);
        $data->name             = $request->name;
        $data->manager_name     = $request->manager_name ;
        $data->manager_phone    = $request->phone ;
        $data->city_id          = $request->city_id;
        $data->locality_id      = $request->locality_id;
        $data->save();

        return redirect('offices')->with('message', 'تم التعديل بنجاح');
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
        Office::destroy($id) ;
        
        return redirect('offices')->with('status', 'تم الحذف بنجاح!');
    }

    /** @test */
    public function getTowns($id)
    {
        $office = Office::findOrFail($id) ;
        return [
                'towns' => $office->towns ,
                'manager_name'=> $office->manager_name ,
                'manager_phone'=>$office->manager_phone
            ];
    }
}
