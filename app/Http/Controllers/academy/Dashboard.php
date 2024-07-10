<?php

namespace App\Http\Controllers\academy;

use App\Models\Task;
use App\Models\Score;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
  public function index(Request $request)
  {
    $current = Score::where('student_id', Auth::user()->id)->max('semester');
    $smt = $request->query('semester') ?: $current;
    $id = Auth::user()->id;
    $student = Student::find($id);

    $data = [
      'bulan' => [],
      'adab' => [],
      'tahfidzh' => [],
      'sikap' => [],
      'ict' => ['subject' => [], 'value' => []],
      'arab' => ['subject' => [], 'value' => []],
      'quran' => ['subject' => [], 'month_5' => [], 'month_6' => []],
      'average' => ['adab' => 0, 'tahfidzh' => 0, 'tajwid' => 0, 'tahsin' => 0, 'sikap' => 0, 'paham' => 0]
    ];

    if ($smt % 2 == 0) {
      $data['bulan'] = ['Jan', 'Feb', 'Mar', 'Arp', 'May', 'Jun'];
    }else{
      $data['bulan'] = ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'];
    }

    $projects = Project::all();

    $tasks = Task::where('student_id', $id)->where('semester', $smt)->get();
    $scores = Score::where('student_id', $id)->where('semester', $smt)->get();

    foreach ($scores as $score) {
        if ($score->subject == 'Alquran - Adab') {
            $data['adab'] = [
                $score->month_1, $score->month_2, $score->month_3, $score->month_4, $score->month_5, $score->month_6
            ];
            $data['average']['adab'] = array_sum($data['adab']) / count($data['adab']);
        }
        if ($score->subject == 'Alquran - Tahfidzh') {
            $data['tahfidzh'] = [
                $score->month_1, $score->month_2, $score->month_3, $score->month_4, $score->month_5, $score->month_6
            ];
            $data['average']['tahfidzh'] = array_sum($data['tahfidzh']) / count($data['tahfidzh']);
        }
        if ($score->subject == 'Alquran - Tajwid') {
            $data['tajwid'] = [
                $score->month_1, $score->month_2, $score->month_3, $score->month_4, $score->month_5, $score->month_6
            ];
            $data['average']['tajwid'] = array_sum($data['tajwid']) / count($data['tajwid']);
        }
        if ($score->subject == 'Alquran - Tahsin') {
            $data['tahsin'] = [
                $score->month_1, $score->month_2, $score->month_3, $score->month_4, $score->month_5, $score->month_6
            ];
            $data['average']['tahsin'] = array_sum($data['tahsin']) / count($data['tahsin']);
        }
        if ($score->subject == 'Tsaqofah - Sikap') {
            $data['sikap'] = [
                $score->month_1, $score->month_2, $score->month_3, $score->month_4, $score->month_5, $score->month_6
            ];
            $data['average']['sikap'] = array_sum($data['sikap']) / count($data['sikap']);
        }
        if ($score->subject == 'Tsaqofah - Pemahaman') {
            $data['paham'] = [
                $score->month_1, $score->month_2, $score->month_3, $score->month_4, $score->month_5, $score->month_6
            ];
            $data['average']['paham'] = array_sum($data['paham']) / count($data['paham']);
        }
        if (strpos($score->subject, 'Multimedia') === 0 || strpos($score->subject, 'Informatika') === 0) {
            $data['ict']['subject'][] = substr($score->subject, strpos($score->subject, ' - ') + strlen(' - '));
            $data['ict']['value'][] = $score->month_6 === null ? 0 : $score->month_6;
        }
        if (strpos($score->subject, 'Bhs. Arab') === 0) {
            $data['dirosah']['subject'][] = $score->subject;
            $data['dirosah']['value'][] = $score->month_6 === null ? 0 : $score->month_6;
        }
        if (strpos($score->subject, 'Alquran') === 0) {
            $data['quran']['subject'][] = substr($score->subject, strpos($score->subject, ' - ') + strlen(' - '));
            $data['quran']['month_5'][] = $score->month_5 === null ? 0 : $score->month_5;
            $data['quran']['month_6'][] = $score->month_6 === null ? 0 : $score->month_6;
        }
    }

    return view('content.academy.dashboards', [
      'colors' => ['primary', 'success', 'info', 'warning', 'danger'],
      'projects' => $projects,
      'tasks' => $tasks,
      'data' => $data
    ]);
  }
}
