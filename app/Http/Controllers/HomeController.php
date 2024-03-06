<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $categories = Category::take(4)->get();

        $events = Event::where('accept_admin', '=', '1')->get();
        return view('frontoffice.home', compact('categories' , 'events'));


    }

    public function eventShow(){
        $events = Event::where('accept_admin', '=', '1')->get();
        return view('frontoffice.events', compact( 'events'));
    }

    public function showEventById($id){
        $event = Event::find($id);
        return view('frontoffice.eventDetail', compact('event'));
    }
}
