<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\RoomRental;

class RoomRentalController extends Controller
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
                $record = DB::table('room_record')->paginate(15);
                return view('/room_rental_record',['record'=>$record]);
            } else if(Auth::user()->role === 'student'){
                return view('/student_homepage');
            } elseif (Auth::user()->role === 'staff') {
                $record = DB::table('room_record')->paginate(15);
                return view('/room_rental_record',['record'=>$record]);
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'block'=>'required',
            'floor'=>'required',
            'room'=>'required',
            'sem'=>'required'
        ]);

        $record = new RoomRental();
        $record->user_id = $request->user_id;
        $record->block = $request->block;
        $record->floor = $request->floor;
        $record->room = $request->room;
        $record->sem = $request->sem;
        $record->save();
        Sessiom::flash('status', 'New rental record created successfully.');
        return redirect()->route('room-rental');
    }

    /* KIV
    public function update(Request $request){

        $this->validate($request,[
            'user_id'=>'required',
            'block'=>'required',
            'floor'=>'required',
            'room'=>'required',
            'sem'=>'required'
        ]);

        $record = RoomRecord::where([
            ['user_id','=',$request->user_id],
            ['block','=',$request->block],
            ['floor','=',$request->floor],
            ['room','=',$request->room],
            ['sem','=',$request->sem]
        ]);
        $record->user_id = $request->user_id;
        $record->block = $request->block;
        $record->floor = $request->floor;
        $record->room = $request->room;
        $record->sem = $request->sem;
        $record->update();
    } */

    public function checkout($id){

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $record = RoomRental::find($id);
        if($record->checkout == NULL){
            $record->checkout = date('Y-m-d H:i:s');
            $record->save();
            Session::flash('status', 'Checkout successfully');
            return redirect()->route('room-rental');
        }
        else{
            Session::flash('statusfail', 'Checkout fail. Checkout time already exists.');
            return redirect()->route('room-rental');
        }
    }
}
