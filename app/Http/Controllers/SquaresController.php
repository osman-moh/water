<?php

namespace App\Http\Controllers;

use App\City;
use App\Square;
use Illuminate\Http\Request;
use App\Locality;
use App\Office;
use App\Town;

class SquaresController extends Controller
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
        $data = Square::with('city')
            ->with('locality')
            ->with('office')
            ->with('town')
            ->paginate(10);
        return view('squares.index')->with('data', $data);
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
        return view("squares.create")
            ->with('cities', $cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Square();

        $data->name = $request->name;
        $data->city_id = $request->city_id;
        $data->locality_id = $request->locality_id;
        $data->office_id = $request->office_id;
        $data->town_id = $request->town_id;
        $data->save();
        return redirect()->to(route('squares.index'));

        //return
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
       
        $square   = Square::find($id);

        $cities     = City::all();
     
        $localities = Locality::where('city_id', $square->city_id)->get();
        $offices    = Office::where('locality_id', $square->locality_id)->get();
        $towns      =  Town::where('office_id', $square->office_id)->get() ;

        return view("squares.edit")
            ->with('cities', $cities)
            ->with('localities', $localities)
            ->with('offices', $offices)
            ->with('towns', $towns)
            ->with('square', $square);
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
        //return $request->all();
        $data = Square::find($id);
        $data->name = isset($request->name) ? $request->name : $data->name;
        $data->city_id = isset($request->city_id) ? $request->city_id : $data->city_id;
        $data->locality_id = isset($request->locality_id) ? $request->locality_id : $data->locality_id;
        $data->office_id = isset($request->office_id) ? $request->office_id : $data->office_id;
        $data->town_id = isset($request->town_id) ? $request->town_id : $data->town_id;
        $data->save();
        return redirect('/squares')->with('message', 'تم التعديل بنجاح !');
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
        Square::destroy($id);
        return redirect('squares');
    }
}
