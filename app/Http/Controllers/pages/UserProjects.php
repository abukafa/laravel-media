<?php

namespace App\Http\Controllers\pages;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProjects extends Controller
{
  public function index()
  {
    return view('content.pages.pages-profile-projects', [
      'projects' => Project::where('status', 'In Progress')->get(),
      'tasks' => Task::all(),
    ]);
  }
}
