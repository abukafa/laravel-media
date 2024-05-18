<?php

namespace App\Http\Controllers\front_pages;

use App\Models\Task;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Landing extends Controller
{
  public function index(Request $request)
  {
    $recent_task = [];
    $recent_student = [];
    if ($request['tasks']){
      $task_id = $request['tasks'];
      $recent_task = Task::find($task_id);
      $recent_student = Student::find($recent_task->student_id);
    }

    $pageConfigs = ['myLayout' => 'front'];
    $statusCounts = Task::select([
      DB::raw('DISTINCT status'),
      DB::raw('COUNT(status) as count'),
      DB::raw('ROUND((COUNT(status) / (SELECT COUNT(*) FROM tasks) * 100)) as percentage')
    ])->groupBy('status')->take(7)->orderBy('status')->get();

    $dailyUpdates = Task::select(
      DB::raw("DATE_FORMAT(date, '%d/%m') as date"),
      DB::raw("SUM(CASE WHEN status = 'Not Started' THEN 1 ELSE 0 END) as notStarted"),
      DB::raw("SUM(CASE WHEN status = 'In Progress' THEN 1 ELSE 0 END) as inProgress"),
      DB::raw("SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) as completed")
    )
    ->groupBy('date')
    ->orderBy('date', 'desc') // Order by date in descending order
    ->take(7)
    ->get();

    $projectCounts = Task::select(
      DB::raw("SUBSTRING_INDEX(project_name, '-', 1) as project"),
      DB::raw("COUNT(*) as count")
    )
    ->groupBy('project')
    ->take(7)
    ->get();

    $personTrack = Task::select('date', 'student_name', 'status')
    ->orderBy('student_name')
    ->orderBy('date', 'desc')
    ->take(7)
    ->get();

    return view('content.front-pages.landing-page', [
      'tasks' => Task::orderBy('date', 'desc')->get(),
      'students' => Student::orderBy('registered')->get(),
      'pageConfigs' => $pageConfigs,
      'statusCount' => $statusCounts,
      'dailyUpdate' => $dailyUpdates,
      'projectCount' => $projectCounts,
      'personTrack' => $personTrack,
      'recentTask' => $recent_task,
      'recentStudent' => $recent_student
    ]);
  }
}
