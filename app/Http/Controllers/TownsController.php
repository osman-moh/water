<?php

namespace App\Http\Controllers;

use App\City;
use App\Town;
use Illuminate\Http\Request;
use App\Locality;
use App\Office;

class TownsController extends Controller
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
        $data = Town::with('city')
            ->with('locality')
            ->with('office')
            ->paginate(10);
        //return $data ;
        return view('towns.index')->with('data', $data);
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
        return view('towns.create')
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
        //

        $data = new Town();
        $data->name = $request->name;
        $data->city_id = $request->city_id;
        $data->locality_id = $request->locality_id;
        $data->office_id = $request->office_id;
        $data->save();
        return redirect()->to(route('towns.index'));



        //  return $request->all();
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
        $town = Town::find($id);

        $cities     = City::all();
     
        $localities = Locality::where('city_id', $town->city_id)->get();
        $offices    = Office::where('locality_id', $town->locality_id)->get();

        return view("towns.edit")
            ->with('cities', $cities)
            ->with('localities', $localities)
            ->with('offices', $offices)
            ->with('town', $town);
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
        $data = Town::find($id);
        //return $data ;
        $data->name = !isset($request->name) ? $data->name : $request->name;
        $data->city_id = !isset($request->city_id) ? $data->city_id : $request->city_id;
        $data->locality_id = !isset($request->locality_id) ? $data->locality_id : $request->locality_id;
        $data->office_id = !isset($request->office_id) ? $data->office_id : $request->office_id;
        $data->save();
        return redirect()->to(route('towns.index'));
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
        Town::destroy($id) ;
        return redirect('towns');
    }

    /** @test */
    public function getSquares($id)
    {
        $town = Town::findOrFail($id) ;
        
        return ['squares' => $town->squares ,
                'office' => $town->office ,
                'manager_name'=> $town->office->manager_name ,
                'manager_phone'=>$town->office->manager_phone ,
                'locality' => $town->locality ,
                'city' => $town->city];
    }
}
