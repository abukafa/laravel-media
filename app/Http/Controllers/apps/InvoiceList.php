<?php

namespace App\Http\Controllers\apps;

use App\Models\Saving;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceList extends Controller
{
  public function index()
  {
    $invoices = Payment::select('invoice')
        ->selectRaw('MIN(date) AS date')
        ->selectRaw('MIN(period) AS period')
        ->selectRaw('MAX(billing) AS billing')
        ->selectRaw('COUNT(*) AS items')
        ->selectRaw('SUM(amount) AS total')
        ->where('ids', Auth::user()->id)
        ->groupBy('invoice')
        ->orderByDesc('date')
        ->get();

    return view('content.apps.app-payment-list', [
      'payments' => $invoices
    ]);
  }
  public function saving()
  {
    $total = [
      'expenses' => 0,
      'credit' => 0,
      'debit' => 0,
      'balance' => 0
    ];
    $savings = Saving::where('ids', Auth::user()->id)->orderBy('date', 'Desc')->get();
    foreach ($savings as $item) {
      if ($item->debit) { $total['expenses']++; }
      $total['credit'] += $item->credit;
      $total['debit'] += $item->debit;
    }
    $total['balance'] = $total['credit'] - $total['debit'];
    return view('content.apps.app-saving-list', [
      'savings' => $savings,
      'total' => $total
    ]);
  }
}
