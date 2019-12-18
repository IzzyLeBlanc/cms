<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\RoomRental;
use App\Room;
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
                $room = DB::table('room')->where('currentOccupant','!==','maxOccupant')->distinct()->get();
                return view('/room_rental_record',['record'=>$record],['room'=>$room]);

            } else if(Auth::user()->role === 'student'){
                return view('/student_homepage');

            } elseif (Auth::user()->role === 'staff') {
                $record = DB::table('room_record')->paginate(15);
                $room = DB::table('room')->where('currentOccupant','!==', 'maxOccupant')->distinct()->get();
                return view('/room_rental_record',['record'=>$record],['room'=>$room]);
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

        $staffid = Auth::id();
        $record = new RoomRental();
        $record->user_id = $request->user_id;
        $record->block = $request->block;
        $record->floor = $request->floor;
        $record->room = $request->room;
        $record->sem = $request->sem;
        $record->staffid = $staffid;
        $update = Room::find($request->room);
        $update->currentOccupant +=1;
        $update->save();
        $record->save();
        
        Session::flash('status', 'New rental record created successfully.');
        return redirect()->route('room-rental');
    }

    public function update(Request $request){

        $this->validate($request,[
            'id'=>'required',
            'user_id'=>'required',
            'block'=>'required',
            'floor'=>'required',
            'room'=>'required',
            'sem'=>'required'
        ]);

        $staffid = Auth::id();
        $record = RoomRental::find($request->id);
        //$record->user_id = $request->user_id;
        $record->block = $request->block;
        $record->floor = $request->floor;
        $record->room = $request->room;
        $record->sem = $request->sem;
        $record->staffid = $staffid;
        $record->save();
        Session::flash('status', 'Updated successfully.');
        return redirect()->route('room-rental');
    }

    public function checkout($id){
        
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $record = RoomRental::find($id);
        $update = Room::find($record->room);
        $currentOccupant = $update->currentOccupant;
        if($record->checkout == NULL){
            $staffid = Auth::id();
            $record->checkout = date('Y-m-d H:i:s');
            $record->staffid = $staffid;
            $update->currentOccupant = $currentOccupant-1;
            $record->save();
            $update->save();
            Session::flash('status', 'Checkout successfully');
            return redirect()->route('room-rental');
        }
        else{
            Session::flash('statusfail', 'Checkout fail. Checkout time already exists.');
            return redirect()->route('room-rental');
        }
    }
}
