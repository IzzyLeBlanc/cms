<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                return view('/add_facility');
            } else if(Auth::user()->role === 'student'){
                return view('/rent_facility_application');
            } elseif (Auth::user()->role === 'staff') {
                return view('/staff_homepage');
            }
            
        } else {
            return view('/login');
        }
    }


}

