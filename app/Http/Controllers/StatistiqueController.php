<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    //
    public function state()
    {
        $countusers = DB::table('users')->count();
        $countevents = DB::table('events')->count();
        $counttickets = DB::table('tickets')->count();
        $reservationcount = DB::table('reservations')->count();
        $reservationsPerDay = DB::table('reservations')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as reservations'))
            ->groupBy('date')
            ->get();

        $labels = $reservationsPerDay->pluck('date');
        $data = $reservationsPerDay->pluck('reservations');
        $radarLabels = ['LabelA', 'LabelB', 'LabelC'];
        $radarData = [50, 30, 70];

        return view('backoffice.statistiques', compact('countusers', 'countevents', 'reservationcount', 'counttickets', 'labels', 'data'));
    }
}
