<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

     protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**Checks the role */

    public function index(){
        /*if(Auth::check()){
            if(Auth::user()->role !== 'staff' && Auth::user()->role !== 'admin'){
                return redirect()->route('home');
            }
            else{
                return view('auth/register');
            }
        }
        else{
            return view('auth/login');
        }*/
        /**
         * For initialising a user purpose only.
         */
        $user = DB::table('users')->get();
        return view('auth/register',['user'=>$user]);
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => ['required', 'string', 'size:7'],
            'name' => ['required', 'string', 'max:255'],
            'icNo' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneNo' => ['required', 'string', 'min:10', 'max:11'],
            'address' => ['required', 'string'],
            'role' => ['required', 'string',
            function($attribute, $value, $fail){
                if ($value !== "student" && $value !== "staff" && $value !== "admin"){
                    $fail($attribute.' is invalid.');
                }
                /*
                else if($value === "staff" && Auth::User()->role !== 'admin'){
                    $fail($attribute.' is invalid.');
                }
                else if($value === "admin" && Auth::User()->role !== 'admin'){
                    $fail($attribute.' is invalid.');
                }*/
            }]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status', 'Register successful.');
        return User::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'icno' => $data['icNo'],
            'email' => $data['email'],
            'password' => Hash::make($data['icNo']),
            'phoneNo' => $data['phoneNo'],
            'address' => $data['address'],
            'role' => $data['role']
        ]);
    }

    public function updatePassword(Request $request){
        if(Auth::check()){
            $this->validate($request, [
                'oldpw' => 'required',
                'newpw' => 'required',
                'password-confirm' => 'required'
            ]);

            $oldpw = $request->input('oldpw');
            $newpw = $request->input('newpw');
            $passwordConfirm = $request->input('password-confirm');

            $id = Auth::id();

            $user = User::find(Auth::id());

            if(Hash::check($oldpw, $user->password)){
                if($newpw === $passwordConfirm){
                    $user->password = Hash::make($newpw);
                    $user->update();
                    Session::flash('status', 'Password succesfully changed.');
                    return redirect()->route('home');
                }
                else{
                    Session::flash('statusfail', 'New passwords do not match.');
                    return redirect()->route('change-password');
                }
            }
            else{
                Session::flash('statusfail', 'Incorrect old password');
                return redirect()->route('change-password');
            }
        }
        else{
            return redirect()->route('change-password');
        }
    }

    public function changePassword(){
        if(Auth::check()){
            return view('Auth/change_pw');
        }
        else{
            return route('home');
        }
    }

    public function updateUser(Request $request){
        if(Auth::check()){
            try{
                $emailSame = false;
                $user = User::find($request->input('id'));
                if($user){
                    if ($request->input('email') == $user->email){
                        $emailSame = true;
                    }
                }
            }catch(Exception $e){
                
            }
            if($emailSame){
                $this->validate($request, [
                    'id' => ['required', 'string', 'size:7'],
                    'name' => ['required', 'string', 'max:255'],
                    'icNo' => ['required', 'string'],
                    'phoneNo' => ['required', 'string', 'min:10', 'max:11'],
                    'address' => ['required', 'string'],
                    'role' => ['required', 'string',
                    function($attribute, $value, $fail){
                        if ($value !== "student" && $value !== "staff" && $value !== "admin"){
                            $fail($attribute.' is invalid.');
                            Session::flash('statusfail', $attribute.' is invalid.');
                        }
                    }]
                ]);
            } else{
                $this->validate($request, [
                    'id' => ['required', 'string', 'size:7'],
                    'name' => ['required', 'string', 'max:255'],
                    'icNo' => ['required', 'string'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'phoneNo' => ['required', 'string', 'min:10', 'max:11'],
                    'address' => ['required', 'string'],
                    'role' => ['required', 'string',
                    function($attribute, $value, $fail){
                        if ($value !== "student" && $value !== "staff" && $value !== "admin"){
                            $fail($attribute.' is invalid.');
                            Session::flash('statusfail', $attribute.' is invalid.');
                        }
                    }]
                ]);
            }
            
            if($user){
                $user->name = $request->input('name');
                $user->icno = $request->input('icNo');
                $user->email = $request->input('email');
                $user->phoneNo = $request->input('phoneNo');
                $user->address = $request->input('address');
                $user->role = $request->input('role');
                $user->update();
                Session::flash('status', 'Update Success');
            }
            else{
                Session::flash('statusfail', 'No such user found.');
            }
        }
        return redirect()->route('register');
    }
}
