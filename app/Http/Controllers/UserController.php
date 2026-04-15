<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginConfirm(LoginFormRequest $request)
    {
        $credentials = $request->validated();
        
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('tasks.index'));
        }


        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);    
    }

    public function register()
    {
        return view('register');
    }

    public function registerConfirm(RegisterFormRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        Auth::login($user);

        return redirect()->route('tasks.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
