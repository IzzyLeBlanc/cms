<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            if(checkPermission(['student'])){
                return view('/student_homepage');
            }
            else if(checkPermission(['staff'])){
                return view('/staff_homepage');
            }
            else if(checkPermission(['admin'])){
                $space = $this->getSpace();
                $totalParkingLot = DB::table('parking')->count();
                $occupiedParkingLot = $this->getOccupiedParkingLot();
                $facilityUsePastMonth = $this->getFacilityUsePastMonth();
                return view('/admin_homepage', compact('space', 'totalParkingLot', 'occupiedParkingLot', 'facilityUsePastMonth'));
            }
        }
        else{
            return view('/login');
        }
    }

    private function getSpace(){
        $totalSpace = 0;
        $occupiedSpace = 0; 
        
        $rooms = DB::table('room')->get();
        foreach($rooms as $room){
            $totalSpace += $room->maxOccupant;
            $occupiedSpace += $room->currentOccupant;
        }

        return array($totalSpace, $occupiedSpace);
    }

    private function getOccupiedParkingLot(){
        $occupiedParkingLot = 0;
        $date = new Carbon;

        $parkings = DB::table('parking')->get();
        foreach($parkings as $parking){
            if($date >= $parking->end){
                $occupiedParkingLot++;
            }
        }

        return $occupiedParkingLot;
    }

    private function getFacilityUsePastMonth(){
        $facilityUsePastMonth = 0;
        $date = new Carbon;
        $date = $date->subMonth();

        $facilities = DB::table('facility_record')->get();
        foreach($facilities as $facility){
            if($date >= $facility->start){
                $facilityUsePastMonth++;
            }
        }
        
        return $facilityUsePastMonth;
    }
}
