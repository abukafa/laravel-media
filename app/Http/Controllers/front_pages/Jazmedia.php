<?php

namespace App\Http\Controllers\front_pages;

use App\Models\Task;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Jazmedia extends Controller
{
  public function index()
  {
    return view('content.front-pages.jazmedia');
  }

}
