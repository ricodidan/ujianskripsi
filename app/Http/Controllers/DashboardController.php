<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;
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
  public function dashboarddashboardAnalytics()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
  }

  // Dashboard - Ecommerce
  public function dashboard()
  {
    $pageConfigs = ['pageHeader' => false];
    $date = Carbon::createFromDate(date('Y'));
    $startDate = $date->copy()->firstOfYear();
    $endDate = $date->copy()->lastOfYear();
    $listPies = Sampah::leftJoin('status_sampah', 'status_sampah.id_statussampah', 'sampah.id_statussampah')
              ->whereBetween('sampah.date_created', [$startDate, $endDate])
              ->groupBy('sampah.id_statussampah')
              ->orderBy('status_sampah.id_statussampah','ASC')
              ->select(DB::raw("count(id_sampah) as value"), 'status_sampah.name as label', 'sampah.id_statussampah')
              ->get();
    return view('/content/dashboard/dashboard', ['pageConfigs' => $pageConfigs, 'listPies' => $listPies]);
  }

  public function getDataDashboard(Request $request)
  {
    $organikArray = [];
    $anorganikArray = [];
    $daurulangArray = [];

    for($i = 1; $i <= 12; $i++){
      $date = Carbon::createFromDate($request->year, $i, 5);
      $startDate = $date->copy()->firstOfMonth();
      $endDate = $date->copy()->lastOfMonth();

      $organik = Sampah::selectRaw('id_jenissampah, sum(berat_sampah) as berat_sampah')
            ->whereIdJenissampah(1)
            ->whereBetween('date_created', [$startDate, $endDate])
            ->groupBy('id_jenissampah')
            ->first();

      $anorganik = Sampah::selectRaw('id_jenissampah, sum(berat_sampah) as berat_sampah')
            ->whereIdJenissampah(2)
            ->whereBetween('date_created', [$startDate, $endDate])
            ->groupBy('id_jenissampah')
            ->first();

      $daurulang = Sampah::selectRaw('id_jenissampah, sum(berat_sampah) as berat_sampah')
            ->whereIdJenissampah(3)
            ->whereBetween('date_created', [$startDate, $endDate])
            ->groupBy('id_jenissampah')
            ->first();

      array_push($organikArray, round(@$organik->berat_sampah,1));
      array_push($anorganikArray, round(@$anorganik->berat_sampah,1));
      array_push($daurulangArray, round(@$daurulang->berat_sampah,1));
    }

    return array('organik'=>$organikArray, 'anorganik'=>$anorganikArray, 'daurulang'=>$daurulangArray);
  }

  public function getDataPieDashboard(Request $request)
  {
    $seriesPie = [];
    $date = Carbon::createFromDate($request->year);
    $startDate = $date->copy()->firstOfYear();
    $endDate = $date->copy()->lastOfYear();

    $messages = Sampah::leftJoin('status_sampah', 'status_sampah.id_statussampah', 'sampah.id_statussampah')
              ->whereBetween('sampah.date_created', [$startDate, $endDate])
              ->groupBy('sampah.id_statussampah')
              ->orderBy('status_sampah.id_statussampah','ASC')
              ->select(DB::raw("count(id_sampah) as value"), 'status_sampah.name as label')
              ->get()->toArray();

    return json_encode(['data'=>$messages]);
  }
}
