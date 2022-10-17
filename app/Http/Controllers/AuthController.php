<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

        return view('register.index', [

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'min:2|required',
            'lastname' => 'min:2|required',
            'email' => 'min:2|required',
            'password' => 'min:2|required',
            'password_verify' => 'min:2|required',

        ]);

        $user = new User;

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->avatar = "https://ui-avatars.com/api/?rounded=true&name=". $request->firstname . '+'. $request->lastname;
        $user->save();
        return redirect()->route('home');
    }

    public function loginIndex()
    {
        return view('login.index', []);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'min:2|required',
            'password' => 'min:2|required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
