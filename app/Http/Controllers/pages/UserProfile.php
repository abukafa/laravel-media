<?php

namespace App\Http\Controllers\pages;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Controller
{
  public function index()
  {
    $tasks = Task::where('student_id', Auth::user()->id)->orderBy('date', 'desc')->get();
    return view('content.pages.pages-profile-user', [
      'tasks' => $tasks
    ]);
  }
}
