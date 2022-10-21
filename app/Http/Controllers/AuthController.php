<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function rand_color() {
        return str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

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

        $user = User::where('email', '=', $request->email)->first();
        if ($user === null) {
            $user = new User;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->avatar = 'https://ui-avatars.com/api/?rounded=true&bold=true&background='. $this->rand_color(). '&name='. $request->firstname . '+'. $request->lastname;
            $user->save();
            return redirect()->route('home');
        }
        else {
            redirect()->route('register')->with('errors', 'Ce compte existe déjà !');
        }
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
