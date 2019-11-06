<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                return view('/admin_homepage');
            }
        }
        else{
            return view('/login');
        }
    }
}
