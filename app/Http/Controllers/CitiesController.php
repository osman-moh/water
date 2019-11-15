<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    //
    public function index()
    {
        //
        $data = City::all();

        return view('cities.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cities.create');
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
        $data = new City();
        $data->name = $request->name;
        $data->save();
        return redirect()->to(route('cities.index'));
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
        $data = City::find($id);
        return view('cities.edit')->with('data', $data);
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
        $data = City::find($id);
        $data->name = $request->name;
        $data->save();
        $request->session()->flash('status', 'تم التعديل بنجاح!');
        return redirect(route('cities.index'));
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
        City::destroy($id);
        return redirect('cities');
    }

    /**
     * Get localities of a city
     *
     * @param int $id
     * @return
     */
    /** @getLocalities */
    public function getLocalities($id)
    {
        return City::findOrFail($id)->localities;
    }
}
