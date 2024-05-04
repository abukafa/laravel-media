<?php

namespace App\Http\Controllers\pages;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountSettingsTasks extends Controller
{
  public function index(Request $request)
  {
    $task = [];
    if ($request->input('id')) {
      $task = Task::find($request->input('id'));
    }

    return view('content.pages.pages-account-settings-tasks', [
      'tasks' => Task::where('student_id', Auth::user()->id)->get(),
      'projects' => Project::all(),
      'task' => $task
    ]);
  }

  public function store(Request $request)
  {
    $saved = Task::create([
        'project_id' => $request->project_id,
        'project_name' => $request->project_name,
        'student_id' => Auth::user()->id,
        'student_name' => Auth::user()->name,
        'semester' => $request->semester,
        'name' => $request->name,
        'description' => $request->description,
        'date' => $request->date,
        'deadline' => $request->deadline,
        'status' => $request->status,
        'link' => $request->link
    ]);

    if($saved){
        return back()->with('success', 'Data berhasil disimpan');
    }else{
        return back()->with('danger', 'Data gagal disimpan');
    }
  }

  public function update(Request $request, $id)
  {
    $task = Task::find($id);
    $saved = $task->update([
        'project_id' => $request->project_id,
        'project_name' => $request->project_name,
        'student_id' => Auth::user()->id,
        'student_name' => Auth::user()->name,
        'semester' => $request->semester,
        'name' => $request->name,
        'description' => $request->description,
        'date' => $request->date,
        'deadline' => $request->deadline,
        'status' => $request->status,
        'link' => $request->link
    ]);

    if($saved){
        return redirect()->route('pages-account-settings-tasks-store')->with('success', 'Data berhasil diperbarui');
    }else{
        return back()->with('danger', 'Data gagal diperbarui');
    }
  }
}
