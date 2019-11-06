<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParkingappController extends Controller
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
                return view('/parkingrental');
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){

        $this->validate($request, [
            'resit'=>'required',
            'plat'=>'required',
            'jenis'=>'required',
            'warna'=>'required'
        ]);

        $id = $request->id;
        $parkingapp = new ParkingRental();
        $parkingapp->id = $id;
        $parkingapp->resit = $request->resit;
        $parkingapp->plat = $request->plat;
        $parkingapp->jenis = $request->jenis;
        $parkingapp->warna = $request->warna;
        $parkingapp->save(); 
        return redirect()->route('parking');
    }


}

