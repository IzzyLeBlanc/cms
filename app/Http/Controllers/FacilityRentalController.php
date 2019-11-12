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
                $facility = DB::table('facility')->paginate(15);
                return view('/add_facility',['facility'=>$facility]);
            } else if(Auth::user()->role === 'student'){
                $facility_rental = DB::table('facility_record')->paginate(15);
                return view('/facility_rental_record',['facility_rental'=>$facility_rental]);
            } elseif (Auth::user()->role === 'staff') {
                $facility_rental = DB::table('facility_record')->paginate(15);
                return view('/facilityrental',['facility_rental'=>$facility_rental]);
            }
            
        } else {
            return view('/login');
        }
        //$facility = DB::table('facility_rental')->get();
        //return view('auth/register',['facility_rental'=>$facility]);
    }

    public function create(Request $request){
        $this->validate($request,[
            'studentid'=>'required',
            'program_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'no_receipt'=>'required',
        ]);
        
        $id = $request->id;
        $facility_rental = new FacilityRental();
        $facility_rental->studentid = $request->studentid;
        $facility_rental->program_name = $request->program_name;
        $facility_rental->start_date = $request->start_date;
        $facility_rental->end_date = $request->end_date;
        $facility_rental->status = 'pending';
        $facility_rental->no_receipt= $request->no_receipt;
        $facility_rental->save();

        Sessiom::flash('status', 'New rental record created successfully.');
        return redirect()->route('facility-rental');
    }

    public function update(Request $request){

        $this->validate($request,[
            'id'=>'required',
            'studentid'=>'required',
            'program_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'no_receipt'=>'required',
            'status'=>'required',
            'staffid'=>'required'
        ]);
        
        
        $facility = FacilityRental::find($request->id);
        $facility_rental->id = $id;
        $facility_rental->studentid = $request->studentid;
        $facility_rental->program_name = $request->program_name;
        $facility_rental->start_date = $request->start_date;
        $facility_rental->end_date = $request->end_date;
        $facility_rental->no_receipt = $request->no_receipt;
        $facility_rental->status = $request->status;
        $facility_rental->staffid = $request->staffid;
        $facility_rental->update();

        return redirect()->route('facility-rental');
    }

    public function postApprove($id) {
        $facility_rental = FacilityRental::find($id);
        if($facility_rental)
        {
            $staffid = Auth::id();
            $facility_rental->status = 'Approved';
            $facility_rental->staffid = $staffid;
            $facility_rental->save();
            
        }
        return redirect()->route('facility-rental');
        
    }

    public function postReject($id) {
        $facility_rental = FacilityRental::find($id);
        if($facility_rental)
        {
            $staffid = Auth::id();
            $facility_rental->status = 'Rejected';
            $facility_rental->staffid = $staffid;
            $facility_rental->save();
        }
        return redirect()->route('facility-rental');
    }

    public function delete($id){

        $facility_rental = FacilityRental::find($id);   
        $facility_rental->delete();
        return redirect()->route('facility-rental');
        
    }
}