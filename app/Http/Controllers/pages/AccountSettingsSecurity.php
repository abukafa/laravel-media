<?php

namespace App\Http\Controllers\Pages;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountSettingsSecurity extends Controller
{
    public function index()
    {
        return view('content.pages.pages-account-settings-security', [
            'student' => Student::find(Auth::user()->id)
        ]);
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[\d\W]).+$/'],
        ], [
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least :min characters long.',
            'password.regex' => 'Password must contain at least one lowercase character and one number, symbol, or whitespace character.',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', 'Check your password again.');
        }

        $student = Student::find(Auth::user()->id);
        $student->password = Hash::make($request->password);
        $updated = $student->save();

        if ($updated) {
            return back()->with('success', 'Password successfully updated.');
        } else {
            return back()->with('danger', 'Failed to update password.');
        }
    }

    public function update_username(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:students,email,' . Auth::user()->id,
            'instagram' => 'required|unique:students,instagram,' . Auth::user()->id,
        ]);

        if ($validator->fails()) {
            return back()->with('danger', 'Use another email or username.');
        }

        $student = Student::find(Auth::user()->id);
        $data = $request->only('email', 'instagram');
        $updated = $student->update($data);

        if ($updated) {
            return back()->with('success', 'Username successfully updated.');
        } else {
            return back()->with('danger', 'Failed to update username.');
        }
    }
}
