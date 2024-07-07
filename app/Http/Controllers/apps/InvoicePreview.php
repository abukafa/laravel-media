<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoicePreview extends Controller
{
  public function index()
  {
    return view('content.apps.app-invoice-preview');
  }

  public function print()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.apps.app-invoice-print', ['pageConfigs' => $pageConfigs]);
  }
}
