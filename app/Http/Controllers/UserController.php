<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use App\City;
use App\UsersType;
use App\Office;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('user.index' , compact('data'));
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
        $types  = UsersType::all();
        
        return view(
            'user.create',
                    ['cities'=>$cities,'types'=>$types]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone ,
            'city_id'   => $request->city_id ,
            'office_id' => $request->office_id ,
            'user_type_id'      => $request->user_type_id,
            'password'  => bcrypt($request->password)
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user   = User::find($id);
        $cities = City::all();
        $types = UsersType::all();
        $offices = Office::where('city_id', $user->city_id)->get();
        return view('user.edit', ['user'=> $user,'cities' => $cities , 'offices'=>$offices , 'types' => $types]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'user_type_id' => 'required'
        ]);
        
        $user->name     = $request->name;
        $user->email    =  $request->email;
        $user->password = bcrypt($request->password);
        $user->user_type_id     = $request->user_type_id;
        $user->phone  = empty($request->phone) ? '' : $request->phone ;
        
        $user->city_id  = empty($request->city_id) ? 0 : $request->city_id ;
        $user->office_id  = empty($request->office_id) ? 0 : $request->office_id ;

        $user->save();

        return redirect('user');
    }
    public function destroy($id, Request $request)
    {
        //return $id;
        if ($id ==1) {
            $request->session()->flash('status', 'لايمكن حذف الاساسي للنظام ');
            return redirect()->back();
        }
        // $data = User::find($id);
        User::destroy($id);
        return back();
    }


    public function postChangePassword(Request $request)
    {
        $validatedData = $request->validate([
            'oldpass' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ], [
            'oldpass.required' => 'كلمة السر القديمة مطلوبة',
            'password.required' => 'كلمة السر الجديدة مطلوبة',
            'password_confirmation.required' => 'كلمة السر الجديدة  والتاكيد غير متطبقنان',
            'password_confirmation.same:password' => 'كلمة السر الجديدة  والتاكيد غير متطبقنان'
        ]);

        $current_password = Auth::User()->password;
        if (\Hash::check($request->input('oldpass'), $current_password)) {
            $obj_user = User::find(Auth::id());
            $obj_user->password = Hash::make($request->password);
            $obj_user->save();
            $request->session()->flash('status', 'تم الحفظ بنجاح!');
            return redirect()->back();
        } else {
            $request->session()->flash('status', 'تم فشل تغير كلمة السر');
            return redirect()->back();
        }
    }

    /** @function getOffices
     *
     */
    public function getOffices($id)
    {
        return City::find($id)->offices;
    }
}
