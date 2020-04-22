<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        if ($data['role'] === 'company') {
            return $this->validateCompany($data);
        } elseif ($data['role'] === 'freelance') {
            return $this->validateFreelance($data);
        }

        return redirect()->back();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $role = $data['role'];

        $user = User::create([
            'firstname' => $role === 'freelance' ? $data['firstname'] : null,
            'lastname' => $role === 'freelance' ? $data['lastname'] : null,
            'cv' => null,
            
            'company_name' => $role === 'freelance' ? null : $data['company_name'],
            'identity' => $role === 'freelance' ? null : $data['identity'],
            'employes' => $role === 'freelance' ? null : $data['employes'],
            'image' => null,
            
            'role' => $role,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'working_hours' => $data['working_hours'],
            'message' => $data['message'],
            'password' => Hash::make($data['password']),
        ]);

        $folder = isset($data['cv']) ? 'cv' : 'company';
        $fileType = $folder === 'cv' ? 'cv' : 'image';  

        $file = Storage::disk('public')->put($folder, $data[$fileType]);
        $user->$fileType = $file;

        $user->save();

        return $user;
    }

    private function validateCompany(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required|string|max:255',
            'identity' => 'required|integer',
            'employes' => 'required|integer|min:0',
            'working_hours' => 'sometimes|regex:/^[0-9]{2}:00 - [0-9]{2}:00$/',
            'image' => 'required|image|max:2048',
            'message' => 'sometimes|string|nullable',
            'phone' => 'required|regex:/^(?:\?995)?5(?:[0-9]\s*){8}$/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted'
        ]);
    }
    
    private function validateFreelance(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'working_hours' => 'sometimes|regex:/^[0-9]{2}:00 - [0-9]{2}:00$/',
            'email' => 'required|string|email|max:255|unique:users',
            'cv' => 'required|file|max:2048',
            'message' => 'sometimes|string|nullable',
            'phone' => 'required|regex:/^(?:\?995)?5(?:[0-9]\s*){8}$/',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted'
        ]);
    }
}
