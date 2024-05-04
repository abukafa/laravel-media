<?php

namespace App\Http\Controllers\apps;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Calendar extends Controller
{
  public function index()
  {
    return view('content.apps.app-calendar', [
      'events' => Event::all()
    ]);
  }
}
