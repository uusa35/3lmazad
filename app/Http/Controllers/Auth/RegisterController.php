<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

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
            'avatar' => 'mimes:jpg,jpeg,png|nullable',
            'mobile' => 'required|numeric',
            'phone' => 'numeric|nullable',
            'timing' => 'string|max:255|nullable',
            'address' => 'string|max:255|nullable',
            'password' => 'required|string|min:6|confirmed',
            'is_merchant' => 'boolean|nullable',
            'area_id' => 'numeric|nullable',
//            'group_id' => ['nullable', Rule::in(Group::all()->pluck('id')->toArray())],
            'group_id' => 'nullable',
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
            'phone' => $data['phone'],
            'timing' => $data['timing'],
            'address' => $data['address'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'area_id' => $data['area_id'],
            'group_id' => $data['group_id'],
            'password' => bcrypt($data['password']),
            'description' => $data['description'],
        ]);
        $this->userCreated($data, $user); // save the role + save the avatar
        return $user;
    }

    public function userCreated($data, $user)
    {
        $role = isset($data['is_merchant']) && $data['is_merchant'] ? Role::where('name', 'merchant')->first() : Role::where('name', 'user')->first();
        $user->roles()->save($role);
        $user->gallery()->save(Gallery::create(['galleryable_id' => $user->id, 'galleryable_type' => User::class]));
        $this->saveMimes($user, request(), ['avatar'], ['400', '600'], true);
    }
}
