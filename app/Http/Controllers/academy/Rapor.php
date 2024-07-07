<?php

namespace App\Http\Controllers\academy;

use App\Models\Award;
use App\Models\Score;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

class Rapor extends Controller
{
    public function fetchData($semester)
    {
      $data = new \stdClass();
      $data->semester = $semester;
      $data->school = School::first();
      $data->scores = Score::where('student_id', Auth::user()->id)
        ->join('competences', 'competences.id', '=', 'scores.competence_id')
        ->join('subjects', 'subjects.id', '=', 'competences.subject_id')
        ->where('scores.semester', $semester)
        ->orderBy('subjects.number')
        ->get();
      return $data;
    }

    public function index(Request $request)
    {
      $current = Score::where('student_id', Auth::user()->id)->max('semester');
      $smt = $request->query('semester') ?: $current;
      $data = $this->fetchData($smt);
      // ddd($now);
      return view('content.academy.rapor-preview', [ 'data' => $data ]);
    }

    public function print(Request $request)
    {
      $current = Score::where('student_id', Auth::user()->id)->max('semester');
      $smt = $request->query('semester') ?: $current;
      $pageConfigs = ['myLayout' => 'blank'];
      $data = $this->fetchData($smt);
      return view('content.academy.rapor-print', [
        'pageConfigs' => $pageConfigs,
        'data' => $data
      ]);
    }

    public function awards()
    {
      $awards = Award::where('student_id', Auth::user()->id)->get();
      return view('content.academy.awards', [
        'awards' => $awards
      ]);
    }

    public function certificate($subject, $id)
    {
      $pageConfigs = ['myLayout' => 'blank'];
      $data = Award::find($id);

      return view('content.academy.certificate-' . $subject, [
        'pageConfigs' => $pageConfigs,
        'data' => $data
      ]);
    }
}
