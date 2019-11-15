<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Datatables;

class LocationsController extends Controller
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
        $data = Location::all();

        if (request()->ajax()) {

            return Datatables::of($data)
                ->addColumn(
                    'action',
                    '<div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle btn-xs"
                        data-toggle="dropdown" aria-expanded="false">' .
                        "اجراء" .
                        '<span class="caret"></span><span class="sr-only">Toggle Dropdown
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">

                        <li><a href="{{route(\'locations.edit\',[$id])}}" >
                        <i class="fa fa-eye"></i>
                         تعديل
                         </li>

                        <li>
                        <form action="{{route(\'locations.destroy\',[$id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger" title="حذف  " >
                  <i class="fa fa-fw fa-remove"></i>
                </button>
            </form>
                    </ul>
                    </div>'
                )
                ->make(true);

        }
        return view('locations.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('locations.create');
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
        $save = new Location();
        $save->name = $request->location;
        $save->save();

        return redirect()->to(route('locations.index'));
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
        $data = Location::find($id);
        return view('locations.edit')->with('data', $data);
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
        $update = Location::find($id);
        $update->name = $request->location;
        $update->save();
        $request->session()->flash('status', 'تم التعديل بنجاح!');
        return redirect()->to(route('locations.index'));




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
          Location::destroy($id);
        return back();
    }
}
