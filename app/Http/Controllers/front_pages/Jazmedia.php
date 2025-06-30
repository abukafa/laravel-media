<?php

namespace App\Http\Controllers\front_pages;

use App\Models\Task;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class Jazmedia extends Controller
{
  public function index(Request $request)
  {
      if ($request->has('creator') && is_numeric($request->creator)) {
          $task = Task::whereNotNull('embed')->where('id', $request->creator)->get();
      } elseif ($request->has('creator') && !is_numeric($request->creator)) {
          $task = Task::whereNotNull('embed')->where('student_name', 'LIKE', '%' . $request->creator . '%')->orderBy('id', 'desc')->get();
      } elseif ($request->has('bookmarks')) {
          $participant = session('participant');
          if (!$participant) {
              return redirect()->route('jazmedia')->with('danger', 'You need to sign in first!');
          } else {
              $user = Participant::find($participant['id']);
              $task = $user->bookmarkedTasks()->get();
          }
      } else {
          $task = Task::whereNotNull('embed')->whereNotIn('media', ['Instagram', 'Tiktok'])->latest()->paginate(3);
      }

      $student = Student::whereNull('graduation')->inRandomOrder()->get();
      $activities = DB::table('students')
        ->join(
            DB::raw('(SELECT student_id, MAX(created_at) as latest_create FROM tasks GROUP BY student_id) as latest_tasks'),
            'students.id', '=', 'latest_tasks.student_id'
        )
        ->join('tasks', function($join) {
            $join->on('tasks.student_id', '=', 'latest_tasks.student_id')
                ->on('tasks.created_at', '=', 'latest_tasks.latest_create');
        })
        ->select('students.id', 'students.name', 'students.image','tasks.id as task_id', 'tasks.media', 'tasks.created_at', 'tasks.project_name', 'tasks.name as task')
        ->orderBy('tasks.created_at', 'DESC')
        ->get();

      if ($request->ajax()) {
          $view = view('content.front-pages.jazmedia-load', compact('task'))->render();
          return response()->json([
              'view' => $view,
              'nextPageUrl' => $task->nextPageUrl()
          ]);
      }

      return view('content.front-pages.jazmedia', [
          'teachers' => Teacher::all(),
          'student' => $student,
          'activities' => $activities,
          'task' => $task
      ]);
  }

  public function indexInstagram(Request $request)
  {
      if ($request->has('creator') && is_numeric($request->creator)) {
          $task = Task::whereNotNull('embed')->where('id', $request->creator)->get();
      } elseif ($request->has('creator') && !is_numeric($request->creator)) {
          $task = Task::whereNotNull('embed')->where('student_name', 'LIKE', '%' . $request->creator . '%')->orderBy('id', 'desc')->get();
      } else {
          $task = Task::whereNotNull('embed')->whereIn('media', ['Instagram', 'Tiktok'])->latest()->paginate(3);
      }

      $student = Student::whereNull('graduation')->orderBy('gender')->get();
      $activities = DB::table('students')
        ->join(
            DB::raw('(SELECT student_id, MAX(created_at) as latest_create FROM tasks GROUP BY student_id) as latest_tasks'),
            'students.id', '=', 'latest_tasks.student_id'
        )
        ->join('tasks', function($join) {
            $join->on('tasks.student_id', '=', 'latest_tasks.student_id')
                ->on('tasks.created_at', '=', 'latest_tasks.latest_create');
        })
        ->select('students.id', 'students.name', 'students.image','tasks.id as task_id', 'tasks.media', 'tasks.created_at', 'tasks.project_name', 'tasks.name as task')
        ->orderBy('tasks.created_at', 'DESC')
        ->get();

      if ($request->ajax()) {
          $view = view('content.front-pages.jazmedia-instagram', compact('task'))->render();
          return response()->json([
              'view' => $view,
              'nextPageUrl' => $task->nextPageUrl()
          ]);
      }

      return view('content.front-pages.jazmediaInstagram', [
          'teachers' => Teacher::all(),
          'student' => $student,
          'activities' => $activities,
          'task' => $task
      ]);
  }

  public function uploadProfilePicture(Request $request)
  {
      $request->validate([
          'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048' // Maksimal ukuran 2MB
      ]);

      if ($request->hasFile('profile_picture')) {

          $file = $request->file('profile_picture');

          $fileName = time() . '.' . $file->getClientOriginalExtension();

          $filePath = $file->storeAs('public/participant', $fileName);

          // Ambil participant dari sesi
          $participantData = session('participant');

          if ($participantData) {
              $participant = Participant::find($participantData['id']);

              if ($participant) {
                // Cek apakah ada gambar sebelumnya
                  if ($participant->image) {
                    // Hapus file gambar sebelumnya
                    Storage::delete('public/' . $participant->image);
                  }
                  // Update kolom 'image' pada participant dengan path gambar
                  $participant->image = 'participant/' . $fileName;
                  $participant->save();
                  // Update data session
                  $participantData['image'] = $participant->image;
                  session()->put('participant', $participantData);
              }
          }

          return response()->json(['success' => 'Profile picture uploaded successfully.', 'file_path' => asset('storage/participant/' . $fileName)]);
      }

      return response()->json(['error' => 'File upload failed.'], 500);
  }

  public function showRates($id)
  {
      $task = Task::find($id);
      if (!$task) {
          return response()->json(['error' => 'Task not found'], 404);
      }
      return response()->json($task);
  }

  public function taskRating(Request $request, $id)
  {
    $task = Task::find($id);
    $updated = $task->update($request->all());
    if($updated){
        return response()->json([
            'task' => $task,
            'success' => 'Data berhasil disimpan'
        ]);
    }else{
        return response()->json(['error' => 'Data gagal disimpan']);
    }
  }

}
