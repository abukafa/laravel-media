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
    $logo = ['social', 'react', 'vue', 'html', 'figma', 'xd'];
    return view('content.pages.pages-profile-projects', [
      'projects' => Project::all(),
      'tasks' => Task::all(),
    ]);
  }
}
