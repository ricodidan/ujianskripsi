<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;

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
      if($request->year == "2022"){
        $giziBaik = [100, 10, 28, 25, 10, 63, 16, 21, 72, 20, 31, 15];
        $giziBuruk = [14, 80, 60, 18, 10, 60, 85, 75, 10, 55, 75, 30];
      }
      else if($request->year == "2023"){
        $giziBaik = [30, 10, 28, 25, 10, 63, 16, 21, 72, 20, 31, 15];
        $giziBuruk = [44, 80, 60, 18, 10, 60, 85, 75, 10, 55, 75, 30];
      }
      return array('giziBaik'=>$giziBaik, 'giziBuruk'=>$giziBuruk);
  }
}
