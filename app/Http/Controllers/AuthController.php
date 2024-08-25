<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showConfirm()
    {
        return view('page.auth.confirm');
    }
    public function showLogin()
    {
        return view('page.auth.sign-in');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        if(auth()->attempt($data)){
            if(auth()->user()->role === 'admin'){
                return redirect()->intended(route('admin.main'));
            }
            return redirect()->intended(route('student.main'));
        }
        return back()->withErrors([
            'login' => 'Неверный логин или пароль.',
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Перенаправление на главную страницу или другую
    }
}
