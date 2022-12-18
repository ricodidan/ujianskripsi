<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\RekomendasiDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
  
  // Dashboard - Analytics
  public function dashboardAnalytics()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
  }

  // Dashboard - Ecommerce
  public function dashboard()
  {
    $pageConfigs = ['pageHeader' => false];
    $jumlahBalita = Balita::count();
    return view('/content/dashboard/dashboard', ['pageConfigs' => $pageConfigs, 'jumlahBalita' => $jumlahBalita]);
  }
    
  public function getDataDashboard(Request $request)
  {
    $giziBaikArray = [];
    $giziBurukArray = [];

    for($i = 1; $i <= 12; $i++){
      $date = Carbon::createFromDate($request->year, $i, 5);
      $startDate = $date->copy()->firstOfMonth();
      $endDate = $date->copy()->lastOfMonth();

      $messages = RekomendasiDetail::whereBetween('created_at', [$startDate, $endDate])
              ->groupBy('id_balita')
              ->get();

      $giziBaik = $messages->filter(function ($item) {
        return $item->total_bobot >= 0;
      });

      $giziBuruk = $messages->filter(function ($item) {
        return $item->total_bobot < 0;
      });

      array_push($giziBaikArray, count($giziBaik));
      array_push($giziBurukArray, count($giziBuruk));
    }
    return array('giziBaik'=>$giziBaikArray, 'giziBuruk'=>$giziBurukArray);
  }
}
