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
        return view('auth/register');
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

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }
}
