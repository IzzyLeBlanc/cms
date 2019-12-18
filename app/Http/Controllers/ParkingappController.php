<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ParkingRental;
use Session;
use Carbon\Carbon;

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
                $rental = DB::table('parking_record')->paginate(15);
                return view('/parkingrental',['rental'=>$rental]);
            } else if(Auth::user()->role === 'student'){
                $rental = DB::table('parking_record')->paginate(15);
                return view('/parking_application',['rental'=>$rental]);
            } elseif (Auth::user()->role === 'staff'); {
                $rental = DB::table('parking_record')->paginate(15);
                return view('/parkingrental',['rental'=>$rental]);
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){
        $this->validate($request, [
            //'id'=>'required',
            'parkingid'=>'required',
            'receiptNo'=>'required',
            'plateNo'=>'required',
            'carModel'=>'required',
            'carColor'=>'required',
        ]);

        $studentid = Auth::id();
        $id = $request->id;
        $rental = new ParkingRental();
        //$rental->id = $id;
        $rental->studentid = $studentid;
        $rental->parkingid = $request->parkingid;
        $rental->receiptNo = $request->receiptNo;
        $rental->plateNo = $request->plateNo;
        $rental->carModel = $request->carModel;
        $rental->carColor = $request->carColor;
        $rental->status = 'Pending';
        $rental->save();
        Session::flash('status', 'Parking application created successfully.');
        return redirect()->route('parkingapp');
    }

    public function update(Request $request, $id){
        $rental = ParkingRental::find($id);
        $rental->parkingid = $request->parkingid;
        $rental->receiptNo = $request->receiptNo;
        $rental->plateNo = $request->plateNo;
        $rental->carModel = $request->carModel;
        $rental->carColor = $request->carColor;
        $rental->status = 'Pending';
        $rental->rejectReason = $request->rejectReason;
        $rental->update();
        Session::flash('status', 'Parking application updated successfully.');
        return redirect()->route('parkingapp');
    }

    public function postApprove($id) {
        $rental = ParkingRental::find($id);
        if($rental)
        {
            $staffid = Auth::id();
            $rental->status = 'Approved';
            $rental->rejectReason = 'Sila Ambil Kad di Pejabat';
            $rental->staffid = $staffid;
            $rental->end =Carbon::now()->addMonth(3);
            $rental->save();
            
        }
        return redirect()->route('parkingapp');
        
    }

    public function postReject($id) {
        $rental = ParkingRental::find($id);
        if($rental)
        {
            $staffid = Auth::id();
            $rental->status = 'Rejected';
            $rental->staffid = $staffid;
            $rental->end =Carbon::now();
            $rental->save();
        }
        return redirect()->route('parkingapp');
    }
    
}

