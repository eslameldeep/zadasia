<?php

namespace App\Domain\Echocloud\Http\Controllers\Auth ;

use App\Domain\Core\Models\Country;
use App\Domain\Core\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Domain\Echocloud\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::ECHOCLOUD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $countries = Country::get();
        return view('echocloud.auth.register' , compact('countries'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {  
        $country_code = $data['country_code'] ;  
        $country_num_code = Country::where('iso' , $country_code)->firstOrFail() ;
        
         
        $data['phone'] = $country_num_code?->phonecode . $data['phone'] ; 

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'phone:mobile,'.$country_code ,'unique:users'],
            'country_code' => ['exists:countries,iso'] ,
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $country_code = $data['country_code'] ;  
        $country_num_code = Country::where('iso' , $country_code)->firstOrFail() ;

        $data['phone'] = $country_num_code?->phonecode . $data['phone'] ; 
         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));
        return $user ; 
    }
}
