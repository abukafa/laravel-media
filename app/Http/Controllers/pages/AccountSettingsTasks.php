<?php

namespace App\Http\Controllers\pages;

use App\Models\Task;
use App\Models\Project;
use App\Models\Participant;
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
      'projects' => Project::where('status', 'In Progress')->get(),
      'task' => $task,
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
      'media' => $request->media,
      'embed' => $request->embed,
      'link' => $request->link,
    ]);

    if ($saved) {
      return back()->with('success', 'Data berhasil disimpan');
    } else {
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
      'media' => $request->media,
      'embed' => $request->embed,
      'link' => $request->link,
    ]);

    if ($saved) {
      return redirect()
        ->route('pages-account-settings-tasks-store')
        ->with('success', 'Data berhasil diperbarui');
    } else {
      return back()->with('danger', 'Data gagal diperbarui');
    }
  }

  public function likeTask(Request $request, $id)
  {
    $task = Task::findOrFail($id);
    $participant = session('participant');

    if (!$participant) {
      return response()->json(['message' => 'Participant not found.'], 404);
    }

    $user = Participant::find($participant['id']);

    if (!$user) {
      return response()->json(['message' => 'Invalid participant.'], 404);
    }

    if (
      $user
        ->likes()
        ->where('task_id', $id)
        ->exists()
    ) {
      $user
        ->likes()
        ->where('task_id', $id)
        ->delete();
      $message = 'Task unliked successfully!';
    } else {
      $user->likes()->create([
        'task_id' => $id,
      ]);
      $message = 'Task liked successfully!';
    }

    // Ambil data like pertama dan hitung jumlah total likes
    $firstLike = $task
      ->likes()
      ->with('participant')
      ->first();
    $likesCount = $task->likes()->count();

    return response()->json([
      'message' => $message,
      'likes_count' => $likesCount > 1 ? 'and ' . ($likesCount - 1) . ' others' : '',
      'first_like' => $firstLike ? $firstLike->participant->name : 'No one yet',
    ]);
  }

  public function bookmarkTask(Request $request, $id)
  {
    $task = Task::findOrFail($id);
    $participant = session('participant');

    if (!$participant) {
      return response()->json(['message' => 'Participant not found.'], 404);
    }

    $user = Participant::find($participant['id']);

    if (!$user) {
      return response()->json(['message' => 'Invalid participant.'], 404);
    }

    if (
      $user
        ->bookmarks()
        ->where('task_id', $id)
        ->exists()
    ) {
      $user
        ->bookmarks()
        ->where('task_id', $id)
        ->delete();
      $message = 'Task unmarked successfully!';
    } else {
      $user->bookmarks()->create([
        'task_id' => $id,
      ]);
      $message = 'Task marked successfully!';
    }

    // Ambil data bookmarked pertama dan hitung jumlah total bookmarks
    $firstLike = $task
      ->bookmarks()
      ->with('participant')
      ->first();
    $bookmarksCount = $task->bookmarks()->count();

    return response()->json([
      'message' => $message,
      'bookmarks_count' => $bookmarksCount > 1 ? 'and ' . ($bookmarksCount - 1) . ' others' : '',
      'first_like' => $firstLike ? $firstLike->participant->name : 'No one yet',
    ]);
  }
}
