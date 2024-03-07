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
        $categories= Category::all();
        $events = Event::where('accept_admin', '=', '1')->get();
        return view('frontoffice.events', compact( 'events', 'categories'));
    }

    public function showEventById($id){
        $event = Event::find($id);
        return view('frontoffice.eventDetail', compact('event'));
    }



    public function searchEvent($search)
    {
        if ($search == "AllEventSearch") {
            $events = Event::where('accept_admin', '=', '1')->get();
        } else {
            $events = Event::where('accept_admin', '=', '1')
                        ->where('title', 'like', '%' . $search . '%')
                        ->get();
        }

        return view('frontoffice.search-results', compact('events'));
    }

    public function filterEvent($id){
        $events = Event::where('category_id', $id)->where('accept_admin', '=', '1')->get();
        return view('frontoffice.Filter-category', compact('events'));
    }

}
