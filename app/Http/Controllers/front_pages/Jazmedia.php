<?php

namespace App\Http\Controllers\front_pages;

use App\Models\Task;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Jazmedia extends Controller
{
  public function index(Request $request)
  {
      // Jika tidak ada query atau hanya ada query 'instagram=true' atau 'bookmark=true'
      if ($request->has('creator') && is_numeric($request->creator)) {
          $task = Task::where('id', $request->creator)->get();
      } elseif ($request->has('creator') && !is_numeric($request->creator)) {
          // Jika ada query 'creator'
          $task = Task::where('student_name', 'LIKE', '%' . $request->creator . '%')->orderBy('date', 'DESC')->get();
      } elseif ($request->has('instagram') && is_numeric($request->instagram)) {
          // Jika ada query 'instagram' dengan nilai selain 'true'
          $task = Task::where('id', $request->instagram)->get();
      } elseif ($request->has('instagram') && $request->instagram != 'true') {
          // Jika ada query 'instagram' dengan nilai selain 'true'
          $task = Task::where('student_name', 'LIKE', '%' . $request->instagram . '%')->orderBy('date', 'DESC')->get();
      } else {
          $task = Task::orderBy('date', 'DESC')->get();
      }

      $student = Student::orderBy('gender')->get();

      return view('content.front-pages.jazmedia', [
          'student' => $student,
          'task' => $task
      ]);
  }


}
