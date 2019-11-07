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
                $rental = DB::table('parking_record')->paginate(15);
                return view('/parking_application',['rental'=>$rental]);
            } elseif (Auth::user()->role === 'staff') {
                return view('/parkingrental');
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){
        $this->validate($request, [
            //'id'=>'required',
            'studentid'=>'required',
            'parkingid'=>'required',
            'receiptNo'=>'required',
            'plateNo'=>'required',
            'carModel'=>'required',
            'carColor'=>'required',
        ]);

        $id = $request->id;
        $rental = new ParkingRental();
        //$rental->id = $id;
        $rental->studentid = $request->studentid;
        $rental->parkingid = $request->parkingid;
        $rental->receiptNo = $request->receiptNo;
        $rental->plateNo = $request->plateNo;
        $rental->carModel = $request->carModel;
        $rental->carColor = $request->carColor;
        $rental->status = 'Pending';
        $rental->save(); 
        return redirect()->route('parkingapp');
    }

    public function update(Request $request){

        $this->validate($request,[
            'id'=>'required',
            'studentid'=>'required',
            'parkingid'=>'required',
            'receiptNo'=>'required',
            'plateNo'=>'required',
            'carModel'=>'required',
            'carColor'=>'required',
            'status'=>'required',
            'staffid'=>'required'
        ]);
        
        $parking = ParkingRental::find($request->id);
        $rental->id = $id;
        $rental->studentid = $request->studentid;
        $rental->parkingid = $request->parkingid;
        $rental->receiptNo = $request->receiptNo;
        $rental->plateNo = $request->plateNo;
        $rental->carModel = $request->carModel;
        $rental->carColor = $request->carColor;
        $rental->status = $request->status;
        $rental->update();

        return redirect()->route('parkingapp');
    }


}

