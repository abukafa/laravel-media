<?php

namespace App\Http\Controllers\data;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
public function project($id)
  {
      $project = Project::find($id);
      return response()->json([
          'project' => $project
      ]);
  }
}
