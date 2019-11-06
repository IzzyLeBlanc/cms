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
                return view('/facility_rental_record');
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
            'name'=>'required',
            'description'=>'required',
            'rates'=>'required'
        ]);

        $id = $request->id;
        $facility = new facility;
        $facility->id = $id;
        $facility->name = $request->name;
        $facility->description = $request->description;
        $facility->rates = $request->rates;
        $facility->save(); 
        return redirect()->route('facility');
    }
    public function update(Request $request){

        $this->validate($request,[
            'id'=>'required',
            'name'=>'required',
            'description'=>'required',
            'rates'=>'required'
        ]);
        
        $facility = facility::find($request->id);
        $facility->id = $request->user_id;
        $facility->name = $request->program_name;
        $facility->description = $request->description;
        $facility->rates = $request->rates;
        $facility->update();

        return redirect()->route('facility');
    }
    public function delete($id){

        $parking = facility::find($id);   
        $parking->delete();
        return redirect()->route('facility');
        
    }


}

