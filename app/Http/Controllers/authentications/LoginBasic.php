<?php

namespace App\Http\Controllers\authentications;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
  }

  public function login(Request $request)
{
    $credentials = $request->validate([
        'email-username' => 'required',
        'password' => 'required'
    ]);

    // Check if the input value is an email address
    if (filter_var($credentials['email-username'], FILTER_VALIDATE_EMAIL)) {
        // If it's an email address, set the 'email' key in $credentials
        $credentials['email'] = $credentials['email-username'];
        unset($credentials['email-username']); // Remove the 'email-username' key
    } else {
        // If it's not an email address, assume it's an Instagram username
        $credentials['instagram'] = $credentials['email-username'];
        unset($credentials['email-username']); // Remove the 'email-username' key
    }

    // Check if the user exists based on either email or Instagram username
    $findUser = Student::where(function($query) use ($credentials) {
        $query->where('email', $credentials['email'] ?? null)
              ->orWhere('instagram', $credentials['instagram'] ?? null);
    })->first();

    // Check if user exists
    if (!$findUser) {
        return back()->with('loginError', 'Anda belum terdaftar, daftar dulu ya!');
    }

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        // Authentication successful
        $user = Auth::user();
        session()->put('user', $user);
        return redirect()->intended('/pages/profile-user');
    }

    // Authentication failed
    return back()->with('loginError', 'Login Gagal, Coba lagi ya!');
}


  public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
