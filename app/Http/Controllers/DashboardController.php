<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\ClassLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;


class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user(); // Get the authenticated user

        $totalSaldoTabungan = DB::table('transactions')
            ->sum('tr_debt');

        $totalSiswa = DB::table('users')
            ->where('id_role', 3)
            ->count();

        $totalAdminSupervisor = DB::table('users')
            ->where('id_role', '!=', 3)
            ->count();
        // cahrt Bar logic
        $currentMonth = Transaction::orderBy('created_at', 'DESC')->first();
        $myDate = Carbon::parse($currentMonth->created_at);
        $endDate = strtotime($myDate);
        $month = date('m', $endDate);
        $minDate = Carbon::parse($myDate)->subMonths(5)->toDateString();
        $date1 = new Carbon($minDate);
        $date2 = new Carbon($myDate);
        $starDate1 = date($date1->startOfMonth());
        $endDate1 = date($date2->endOfMonth());
        $dataBar1 = Transaction::select(DB::raw("SUM(tr_debt) AS debt"))
            ->whereBetween('created_at', [$starDate1, $endDate1])
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();
        $resultArray = $dataBar1->toArray();
        $dataBr = Arr::flatten($resultArray);
        $newDateTime = Transaction::select("created_at")
            ->whereBetween('created_at', [$starDate1, $endDate1])
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();

        $resultArray2 = $newDateTime->toArray();
        $str = Arr::flatten($resultArray2);
        $count = $newDateTime->count();
        for ($i = 0; $i < $count; $i++) {

            $dataYAxis[$i] = Carbon::parse($str[$i])->translatedFormat('F');
        }
        // $dataYAxis = Arr::flatten($dataBulan);
        // end chart bar
        // dd($dataBulan);
        $currentWeek = Transaction::orderBy('created_at', 'DESC')->first();
        $myWeek = Carbon::parse($currentWeek->created_at);
        $endWeek = strtotime($myWeek);
        $startDay1 = date($myWeek->startOfWeek());
        $endDay1 = date($myWeek->endOfWeek());
        $dataChartLine = Transaction::select("tr_debt AS debt", "created_at")
            ->whereBetween('created_at', ["2023-09-18 18:53:11", "2023-09-24 18:53:11"])
            ->groupBy(DB::raw("DAY(created_at)"))
            ->get();
        $resultArray2 = $dataChartLine->toArray();
        $yAxis = Arr::flatten($resultArray2);
        // dd($yAxis);
        for ($i = 0; $i <= 5; $i++) {
            $newDateTime = Carbon::parse($startDay1)->addDays($i)->toDateString();
            $str = strtotime($newDateTime);

            $dayArray[$i] = Carbon::parse($str)->translatedFormat('l');
        }
        $xAxis = Arr::flatten($dayArray);
        // end chart bar
        // dd($dataYAxis);

        $formattedTotalSaldoTabungan = 'Rp ' . number_format($totalSaldoTabungan, 0, ',', '.');

        $totalTabungan = DB::table('transactions')
            ->sum('tr_debt');

        $formattedTotalTabungan = 'Rp ' . number_format($totalTabungan, 0, ',', '.');



        return view('dashboard.index', compact('user', 'formattedTotalSaldoTabungan', 'totalSiswa', 'formattedTotalTabungan', 'totalAdminSupervisor', 'dataBr', 'dataYAxis', 'xAxis', 'yAxis'));
    }
}
