<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
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
                return view('/room_rental_record');
            } else if(Auth::user()->role === 'student'){
                return view('/student_homepage');
            } elseif (Auth::user()->role === 'staff') {
                return view('/room_rental_record');
            }
            
        } else {
            return view('/login');
        }
    }

    public function create(Request $request){
        $this->validate($request,[
            'matrix'=>'required',
            'name'=>'required',
            'block'=>'required',
            'floor'=>'required',
            'room'=>'required',
            'date-start'=>'required',
            'date-end'=>'required'
        ]);

        $record = new Record();
        $record->matrix = $request->matrix;
        $record->name = $request->name;
        $record->block = $request->block;
        $record->floor = $request->floor;
        $record->room = $request->room;
        $record->date_start = $request->date_start;
        $note->save();

        Session::flash('success','The new record have been created successfully.');

        return view('/room_rental_record');
    }

}
