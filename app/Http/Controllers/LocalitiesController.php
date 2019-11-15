<?php

namespace App\Http\Controllers;

use App\Locality;
use Illuminate\Http\Request;
use App\City;

class LocalitiesController extends Controller
{
    public function index()
    {
        //
        $data = Locality::with('city')->get();


        return view('localities.index')->with('data', $data);
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
        return view('localities.create')->with('cities', $cities);
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
        //  return $request->all();
        $data = new Locality();
        $data->name = $request->locality;
        $data->city_id = $request->city_id;
        $data->save();
        return redirect()->to(route('localities.index'));
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
        $cities     = City::all();
        $data       = Locality::find($id);
        return view('localities.edit')
            ->with('data', $data)
            ->with('cities', $cities);
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
        //
        //  return $request->all();
        $data = Locality::find($id);
        $data->name = $request->locality;
        $data->city_id = $request->city_id;
        $data->save();
        return redirect()->to(route('localities.index'));//view('');
    }

    /**
     * function to Locality of Selected Region
     */
    public function getLocality(Request $request)
    {
        // $region_id = $request->id ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Locality::destroy($id);
        return back();
    }

    /**
     * Get offices of a locality
     * @param int $id (locality ID)
     * @return
     */
    /** @test */
    public function getOffices($id)
    {
        return Locality::findOrFail($id)->offices ;
    }
}
