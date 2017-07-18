<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'avatar' => 'required|mimes:jpg,jpeg,png',
            'phone' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
            'is_merchant' => 'required|boolean',
            'area_id' => 'required|numeric',
            'description' => 'string|max:1000|nullable',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'area_id' => $data['area_id'],
            'password' => bcrypt($data['password']),
            'description' => $data['description'],
        ]);
        $this->userCreated($data, $user); // save the role + save the avatar
        return $user;
    }

    public function userCreated($data, $user)
    {
        $role = $data['is_merchant'] ? Role::where('name', 'merchant')->first() : Role::where('name', 'user')->first();
        $user->roles()->save($role);
        $this->saveMimes($user, request(), ['avatar'], ['400', '600'], true);
    }
}
