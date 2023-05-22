<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/added';

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
            'username' => 'required|string|min:4|max:12',
            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|alpha_num|min:4|max:255|confirmed',
        ],[
            'username.required' => '名前の入力は必須です',
            'mail.required' => 'メールの入力は必須です',
            'password.required' => 'パスワードの入力は必須です',
            'username.min' => '名前は4文字以上でお願いします',
            'username.max' => '名前は12文字以下でお願いします',
            'password.min' => 'パスワードは4文字以上でお願いします',
            'mail.unique' => 'このメールアドレスは既に登録されています',
            'password.confirmed' => 'パスワード一致しません'
        ])->validate();
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
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $this->validator($data);
            $this->create($data);
            session()->put('name', $data['username']);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
