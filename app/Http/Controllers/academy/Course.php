<?php

namespace App\Http\Controllers\academy;

use App\Http\Controllers\Controller;
use App\Models\Course as ModelCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Course extends Controller
{
  public function index(Request $request)
  {
    $subject = $request->get('subject'); // Ambil query string 'subject'
    $name = $request->get('name');

    // Mulai query dengan select dan agregasi
    $courses = ModelCourse::select(
      'name',
      'subject',
      'note',
      DB::raw('count(*) as count'),
      DB::raw('MIN(id) as first_id')
    )->groupBy('name', 'subject', 'note');

    // Jika subject ada di query string, tambahkan kondisi where
    if ($subject) {
      $courses->where('subject', $subject);
    }
    if ($name) {
      $courses->where('name', 'LIKE', '%' . $name . '%');
    }

    // Akhirnya, panggil get() untuk mengambil hasil
    $courses = $courses->get();

    return view('content.academy.course', [
      'courses' => $courses,
    ]);
  }

  public function detail($id)
  {
    $item = ModelCourse::find($id);
    $items = ModelCourse::where('name', $item->name)->get();
    return view('content.academy.course-detail', [
      'items' => $items,
      'item' => $item,
    ]);
  }
}
