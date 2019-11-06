<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ParkingRental;

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
                $parkingapp = DB::table('parking_record')->paginate(15);
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
            'studentid'=>'required',
            'parkingid'=>'required',
            'receiptNo'=>'required',
            'plateNo'=>'required',
            'carModel'=>'required',
            'carColor'=>'required',
            'status'=>'required'
        ]);

        $id = $request->id;
        $parkingapp = new ParkingRental;
        $parkingapp->id = $id;
        $parkingapp->studentid = $request->studentid;
        $parkingapp->parkingid = $request->parkingid;
        $parkingapp->receiptNo = $request->receiptNo;
        $parkingapp->plateNo = $request->plateNo;
        $parkingapp->carModel = $request->carModel;
        $parkingapp->carColor = $request->carColor;
        $parkingapp->status = $request->status;
        $parkingapp->save(); 
        return redirect()->route('parkingapp');
    }

    public function update(Request $request){

        $this->validate($request,[
            'id'=> 'required',
            'block'=> 'required'
        ]);
        
        $parking = parking::find($request->id);
        $parking->id = $request->id;
        $parking->block = $request->block;
        $parking->update();

        return redirect()->route('parking');
    }


}

