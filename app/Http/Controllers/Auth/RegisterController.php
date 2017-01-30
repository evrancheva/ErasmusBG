<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use Session;
use Image;

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
    protected $redirectTo = '/login';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'description' => 'required|min:6',
            'site' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'motivation' => 'required|min:10',
            'logo' => 'required |image',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
         $image = $data['logo'];
               $filename = time() . '.' . $image->getClientOriginalExtension();
               $location = public_path('images/' . $filename);
              Image::make($image)->resize(400, 400)->save($location);
     
             
               

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'description'=> $data['description'],
            'site'=> $data['site'],
            'phone'=> $data['phone'],
            'address'=> $data['address'],
            'logo'=> $filename,
            'motivation'=> $data['motivation'],
            'president'=> $data['president'],

        ]);
        $user->roles()->attach(Role::where('name','User')->first());
        return $user;
    }
}
