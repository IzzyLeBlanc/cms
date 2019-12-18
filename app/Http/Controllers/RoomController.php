<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Room;

class RoomController extends Controller
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
                //return view('/add_room');
                $room = DB::table('room')->paginate(15);
                return view('/add_room',['room'=>$room]);
            } else if(Auth::user()->role === 'student'){
                return view('/student_homepage');
            } elseif (Auth::user()->role === 'staff') {
                return view('/staff_homepage');
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){

        $this->validate($request, [
            'room'=>'required',
            'floor'=>'required',
            'block'=>'required',
            'max'=>'required'
        ]);
        $staffid = Auth::id();
        $id = $request->room;
        $room = new Room;
        $room->id = $id;
        $room->floor = $request->floor;
        $room->block = $request->block;
        $room->maxOccupant = $request->max;
        $room->currentOccupant = 0;
        $room->staffid = $staffid;
        $room->save(); 
        Session::flash('status', 'Room created successfully.');
        return redirect()->route('room');
    }

    public function update(Request $request){

        $this->validate($request,[
            'room' => 'required',
            'floor' => 'required',
            'block'=> 'required'
        ]);
        
        if (Room::where('id', '=', $request->room)->exists()) {
            $room = Room::find($request->room);
            $room->floor = $request->floor;
            $room->block = $request->block;
            $room->maxOccupant = $request->max;
            $room->update();
            Session::flash('status', 'Room updated successfully.');
            return redirect()->route('room');
         }
         else{
            Session::flash('statusfail', 'Room update failed.');
            return redirect()->route('room');
         }
        
    }

    public function delete($id){

        $room = Room::find($id);   
        $room->delete();
        Session::flash('status', 'Room deleted successfully.');
        return redirect()->route('room');
        
    }
}