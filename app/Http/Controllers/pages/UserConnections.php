<?php

namespace App\Http\Controllers\pages;

use App\Models\Task;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserConnections extends Controller
{
  public function index()
{
    return view('content.pages.pages-profile-connections', [
        'students' => Student::all(),
        'tasks' => Task::all(),
    ]);
}

}
