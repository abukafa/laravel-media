<?php

namespace App\Http\Controllers\pages;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountSettingsTasks extends Controller
{
  public function index()
  {
    return view('content.pages.pages-account-settings-tasks', [
      'tasks' => Task::where('student_id', Auth::user()->id)
    ]);
  }

  public function store(Request $request)
  {
      $saved = Task::create([
          'project_id' => $request->project_id,
          'project_name' => $request->project_name,
          'student_id' => $request->student_id,
          'student_name' => $request->student_name,
          'semester' => $request->semester,
          'name' => $request->name,
          'description' => $request->description,
          'date' => $request->date,
          'deadline' => $request->deadline,
          'status' => $request->status,
          'link' => $request->link,
          'accepted' => $request->accepted,
          'review' => $request->review,
          'teacher_id' => $request->teacher_id,
          'teacher_name' => $request->teacher_name,
      ]);
      if($saved){
          return back()->with('success', 'Data berhasil disimpan');
      }else{
          return back()->with('danger', 'Data gagal disimpan');
      }
  }
}
