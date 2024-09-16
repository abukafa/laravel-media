<?php

namespace App\Http\Controllers\jazmedia;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class Participants extends Controller
{
    public function signup(Request $request)
    {
      $request->validate([
        'username' => 'unique:participants,username',
      ]);

      $saved = Participant::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => Hash::make($request->password)
      ]);

      if($saved){
          return back()->with('success', 'You can Signin now!');
      }else{
          return back()->with('danger', 'Failed.. Try again..');
      }
    }

    public function signin(Request $request)
    {
      $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
      ]);

      $userData = Participant::where('username', $request->username)->first();

      if ($userData && Hash::check($request->password, $userData->password)) {

          $request->session()->put('participant', $userData);

          return back()->with('success', 'Welcome back, ' . $userData->name);
      }

      return back()->with('danger', 'Sign in Failed, Please try again!');
    }

    public function signout(Request $request)
    {
      $request->session()->forget('participant');
      return back()->with('success', 'Bye, See you next time!');
    }
}
