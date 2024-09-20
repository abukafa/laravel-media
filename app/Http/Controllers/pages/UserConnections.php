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
    $students = Student::orderBy('registered')->get();
    $tasks = Task::all();

    // Hitung rata-rata rating untuk setiap student
    $studentRates = $students
      ->map(function ($student) use ($tasks) {
        $studentTasks = $tasks->where('student_id', $student->id);
        $total_tasks = $studentTasks->count();
        $total_done = $studentTasks->where('status', 'Completed')->count();
        $total_rate = $studentTasks->sum('rate');
        $average_rate = $total_done > 0 ? $total_rate / $total_done : 0;

        return [
          'student' => $student,
          'total_tasks' => $total_tasks,
          'total_done' => $total_done,
          'total_rate' => $total_rate,
          'average_rate' => $average_rate,
        ];
      })
      ->sortByDesc('average_rate');

    return view('content.pages.pages-profile-connections', [
      'studentRates' => $studentRates,
    ]);
  }
}
