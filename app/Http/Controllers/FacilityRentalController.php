<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\FacilityRental;

class FacilityRentalController extends Controller
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
                $facility_rent = DB::table('facility_record')->paginate(15);
                return view('/add_facility',['facility'=>$facilitys]);
            } else if(Auth::user()->role === 'student'){
                return view('/facility_rental_record');
            } elseif (Auth::user()->role === 'staff') {
                $facility_rent = DB::table('facility_record')->paginate(15);
                return view('/facilityrental',['record'=>$facility_rent]);
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){
        $this->validate($request,[
            'studentid'=>'required',
            'program_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'no_receipt'=>'required',
        ]);

        $facility_rent = new FacilityRental();
        $facility_rent->studentid = $request->studentid;
        $facility_rent->program_name = $request->program_name;
        $facility_rent->start_date = $request->start_date;
        $facility_rent->end_date = $request->end_date;
        $facility_rent->status = $request->status;
        $facility_rent->no_receipt= $request->no_receipt;
        $facility_rent->save();

        Sessiom::flash('status', 'New rental record created successfully.');
        return redirect()->route('facility-rental');
    }

    /* KIV
    public function update(Request $request){

        $this->validate($request,[
            'studentid'=>'required',
            'program_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required',
            'no_receipt'=>'required',
        ]);
        $facility_rent = FacilityRecord::where([
            ['studentid','=',$request->studentid],
            ['program_name','=',$request->program_name],
            ['start_date','=',$request->start_date],
            ['end_date','=',$request->end_date],
            ['status','=',$request->status],
            ['no_receipt','=',$request->no_receipt],
        ]);
        $facility_rent->studentid = $request->studentid;
        $facility_rent->program_name = $request->program_name;
        $facility_rent->start_date = $request->start_date;
        $facility_rent->end_date = $request->end_date;
        $facility_rent->no_receipt = $request->no_receipt;
        $facility_rent->update();
    } */

    public function checkout($id){

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $facility_rent = FacilityRental::find($id);
        $facility_rent->checkout = date('Y-m-d H:i:s');
        $facility_rent->save();
        return redirect()->route('facility-rental');
    }
    else{
        Session::flash('statusfail', 'Checkout fail. Checkout time already exists.');
        return redirect()->route('facility-rental');
    }
}