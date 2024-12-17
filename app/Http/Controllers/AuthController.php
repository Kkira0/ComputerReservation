<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = Users::where('email', $request->email)->first();
    
        if ($user && $user->password === $request->password) {
            session(['user' => $user]);
    
            if ($user->role->Role_name === 'admin') {
                return redirect()->route('admin.dashboard');
            }
    
            return redirect()->route('computer.index');
        }
    
        return back()->with('error', 'Invalid credentials.');
    }

    
    public function showRegisterForm()
    {
        $roles = Roles::all();

        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|min:8',
        ]);
    
        $role = Roles::where('Role_name', 'user')->first(); 
    
        if (!$role) {
            return redirect()->back()->with('error', 'Default user role not found.');
        }
    
        $user = new Users();
        $user->email = $request->email;
        $user->password = $request->password; 
        $user->idRoles = $role->idRoles;      
        $user->save();
    
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect()->route('login');  
    }
}

