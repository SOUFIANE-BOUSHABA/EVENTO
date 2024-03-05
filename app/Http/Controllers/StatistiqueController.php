<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    //
    public function state(){

        $countusers = DB::table('users')->count();
        $countevents = DB::table('events')->count();
        $counttickets = DB::table('tickets')->count();
        // $reservations = DB::table('reservations')->count();
        return view('backoffice.statistiques', compact('countusers', 'countevents', 'counttickets' ));
    }
}
