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
                $record = DB::table('room_record')->get();
                $roomsRaw = DB::table('room')->whereRaw('currentOccupant != maxOccupant')->get();
                $rooms = $this->getRoomsArray($roomsRaw);
                return view('/room_rental_record', compact('record', 'rooms'));

            } else if(Auth::user()->role === 'student'){
                return view('/student_homepage');

            } elseif (Auth::user()->role === 'staff') {
                $record = DB::table('room_record')->get();
                $roomsRaw = DB::table('room')->whereRaw('currentOccupant != maxOccupant')->get();
                $rooms = $this->getRoomsArray($roomsRaw);
                return view('/room_rental_record', compact('record', 'rooms'));
            }
            
        } else {
            return view('/login');
        }
    }

    //get rooms in form of array
    private function getRoomsArray($roomsRaw){
        $result = array();
        $total = count($roomsRaw);
        $blocks = array();

        for($i = 0; $i < $total; $i++){
            array_push($blocks, $roomsRaw[$i]->block);
        }
        
        $blocks = array_unique($blocks);
        sort($blocks);
        $blocks = array_values($blocks);
        $blockTotal = count($blocks);

        for($i = 0; $i < $blockTotal; $i++){
            array_push($result, array($blocks[$i], array()));
        }

        for($i = 0; $i < $blockTotal; $i++){
            $temp = array();
            for($j = 0; $j < $total; $j++){
                if($roomsRaw[$j]->block == $blocks[$i]){
                    array_push($temp, $roomsRaw[$j]->floor);
                }
            }
            $temp = array_unique($temp);
            sort($temp);
            $temp = array_values($temp);
            $tempTotal = count($temp);

            for($j = 0; $j < $tempTotal; $j++){
                array_push($result[$i][1], array($temp[$j], array()));
            }
        }

        for($i = 0; $i < $blockTotal; $i++){
            for($j = 0; $j < $total; $j++){
                if($roomsRaw[$j]->block == $blocks[$i]){
                    $floorTotal = count($result[$i][1]);
                    for($k = 0; $k < $floorTotal; $k++){
                        if($roomsRaw[$j]->floor == $result[$i][1][$k][0]){
                            array_push($result[$i][1][$k][1], $roomsRaw[$j]->room);
                        }
                    }
                }
            }
        }

        return $result;
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
        $update = Room::where([['room', '=', $request->room], ['floor', '=', $request->floor], ['block', '=', $request->block]])->first();
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
        if($record->user_id == $request->user_id){
            
            if($record->block != $request->block || $record->floor != $request->floor || $record->room != $request->room){
                Session::flash('status', 'Updated successfully.');
                $update = Room::where([['room', '=', $record->room], ['floor', '=', $record->floor], ['block', '=', $record->block]])->first();
                $update->currentOccupant -=1;
                $update->save();
                $update = Room::where([['room', '=', $request->room], ['floor', '=', $request->floor], ['block', '=', $request->block]])->first();
                $update->currentOccupant +=1;
                $update->save();
            }
        } else{
            Session::flash('statusfail', 'Failed');
        }
        //$record->user_id = $request->user_id;
        $record->block = $request->block;
        $record->floor = $request->floor;
        $record->room = $request->room;
        $record->sem = $request->sem;
        $record->staffid = $staffid;
        
        $record->save();
        
        return redirect()->route('room-rental');
    }

    public function checkout($id){
        
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $record = RoomRental::find($id);
        $update = Room::where([['room', '=', $record->room], ['floor', '=', $record->floor], ['block', '=', $record->block]])->first();
        $currentOccupant = $update->currentOccupant;
        if($record->checkout == NULL){
            $staffid = Auth::id();
            $record->checkout = date('Y-m-d H:i:s');
            $record->staffid = $staffid;
            $update->currentOccupant -= $currentOccupant;
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
