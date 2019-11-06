<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\RoomRental;

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
                $record = DB::table('facility_record')->paginate(15);
                return view('/facility_rental_record',['record'=>$record]);
            } else if(Auth::user()->role === 'student'){
                return view('/student_homepage');
            } elseif (Auth::user()->role === 'staff') {
                $record = DB::table('facility_record')->paginate(15);
                return view('/facility_rental_record',['record'=>$record]);
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'program_name'=>'required',
            'facility'=>'required',
            'no_receipt'=>'required',
        ]);

        $record = new FacilityRental();
        $record->user_id = $request->user_id;
        $record->program_name = $request->program_name;
        $record->facility = $request->facility;
        $record->no_receipt= $request->no_receipt;
        $record->save();

        return redirect()->route('facility-rental');
    }

    /* KIV
    public function update(Request $request){

        $this->validate($request,[
            'user_id'=>'required',
            'program_name'=>'required',
            'facility'=>'required',
            'no_receipt'=>'required',
        ]);
        $record = FacilityRecord::where([
            ['user_id','=',$request->user_id],
            ['program_name','=',$request->program_name],
            ['facility','=',$request->facility],
            ['no_receipt','=',$request->no_receipt],
        ]);
        $record->user_id = $request->user_id;
        $record->program_name = $request->program_name;
        $record->facility = $request->facility;
        $record->no_receipt = $request->no_receipt;
        $record->update();
    } */

    public function checkout($id){

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $record = FacilityRental::find($id);
        $record->checkout = date('Y-m-d H:i:s');
        $record->save();
        return redirect()->route('facility-rental');
    }
}