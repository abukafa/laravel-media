<?php

namespace App\Http\Controllers\pages;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountSettingsAccount extends Controller
{
  public function index()
  {
    return view('content.pages.pages-account-settings-account', [
      'student' => Student::find(Auth::user()->id)
    ]);
  }

  public function update(Request $request)
  {
    $student = Student::find(Auth::user()->id);
    $data = $request->all();
    $updated = $student->update($data);
    if($updated){
        return back()->with('success', 'Data berhasil diperbarui');
    }else{
        return back()->with('danger', 'Data gagal diperbarui');
    }
  }
}
