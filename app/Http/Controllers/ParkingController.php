<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\parking;

class ParkingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                //return view('/add_parking');
                $parking = DB::table('parking')->paginate(15);
                return view('/add_parking',['parking'=>$parking]);
            } else if(Auth::user()->role === 'student'){
                return view('/parking_application');
            } elseif (Auth::user()->role === 'staff') {
                return view('/staff_homepage');
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){

        $this->validate($request, [
            'id'=>'required',
            'block'=>'required'
        ]);
        $id = $request->id;
        $parking = new parking;
        $parking->id = $id;
        $parking->block = $request->block;
        $parking->save();
        Session::flash('status', 'Parking created successfully.');
        return redirect()->route('parking');
    }

    public function update(Request $request){

        $this->validate($request,[
            'id'=> 'required',
            'block'=> 'required'
        ]);
        
        if (parking::where('id', '=', $request->id)->exists()) {
            $parking =parking::find($request->id);
            $parking->id= $request->id;
            $parking->block = $request->block;
            $parking->update();
            Session::flash('status', 'Parking updated successfully.');
            return redirect()->route('parking');
         }
         else{
            Session::flash('statusfail', 'Parking update failed.');
            return redirect()->route('parking');
         }
    
    }
    public function delete($id){

        $parking = parking::find($id);   
        $parking->delete();
        Session::flash('status', 'Parking deleted successfully.');
        return redirect()->route('parking');
        
    }
}