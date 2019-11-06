<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
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
                //return view('/add_facility');
                $facility = DB::table('facility')->paginate(15);
                return view('/add_facility',['facility'=>$facility]);
            } else if(Auth::user()->role === 'student'){
                return view('/rent_facility_application');
            } elseif (Auth::user()->role === 'staff') {
                return view('/staff_homepage');
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){

        $this->validate($request, [
            'user_id'=>'required',
            'program_name'=>'required',
            'facility'=>'required',
            'no_receipt'=>'required'
        ]);

        $id = $request->id;
        $facility = new facility;
        $facility->user_id = $user_id;
        $facility->program_name = $request->program_name;
        $facility->facility = $request->facility;
        $facility->no_receipt = $request->no_receipt;
        $facility->save(); 
        return redirect()->route('facility');
    }
    public function update(Request $request){

        $this->validate($request,[
            'user_id'=>'required',
            'program_name'=>'required',
            'facility'=>'required',
            'no_receipt'=>'required'
        ]);
        
        $facility = facility::find($request->id);
        $facility->user_id = $request->user_id;
        $facility->program_name = $request->program_name;
        $facility->facility = $request->facility;
        $facility->no_receipt = $request->no_receipt;
        $facility->update();

        return redirect()->route('facility');
    }
    public function delete($id){

        $parking = facility::find($id);   
        $parking->delete();
        return redirect()->route('facility');
        
    }


}

