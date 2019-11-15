<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usersType;
use App\category;

class UsersTypeController extends Controller
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
       
       $data = UsersType::all();
        //return $data ; 
        return view('usersType.index')->with('data', $data);
      //  return view('usersType.index');
    }
  

 public function create()
    {

        //
        return view('usersType.create');
    }

   public function store(Request $request)
    {
        //
        //return $request->all();
        $data = new UsersType();
        $data->name = $request->user_type;
        $data->save();
        return redirect()->to(route('usersType.index'));
    }
    public function edit($id)
    {
        //
        $data = UsersType::find($id);
        //dd($data);
        return view('usersType.edit')->with('data', $data);
    }

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
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //return $request->all();

        $data = UsersType::find($id);
        $data->name = $request->user_type;
        $data->save();
        return redirect()->to(route('usersType.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy($id, Request $request)
    {
        //return $id;
        if ($id ==1) {
          
       $request->session()->flash('message', 'لايمكن حذف الاساسي للنظام ');
           return redirect()->to(route('usersType.index'));
        }
        // $data = User::find($id);
        UsersType::destroy($id);
        return back();
    }
  
}
