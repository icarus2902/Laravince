<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function showRegisterForm(){
        $roles = [
            1 => 'Admin',
            2 => 'User',
            3 => 'Guest',
        ];
        return view('auth.register', compact('roles'));
    }
    public function login(Request $request){
        $credentials = $request->only ('email', 'password');
        if (Auth::attempt($credentials)){
            request ()->session()->regenerate();
            return redirect()->intended('products');
        }
        return back ()->withErrors([
            'email' => 'Invalid login credentials.',
        ]);

    }
    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        Auth::login($user);
        return redirect()->route('products.index')->with('success', 'Registration successful. You are now logged in.');
    }
    public function logout(Request $request){
        Auth::logout();
        $request ->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

}
