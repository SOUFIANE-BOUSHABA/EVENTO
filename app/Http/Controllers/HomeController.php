<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $events = Event::where('accept_admin', '=', '1')->paginate(4);
        return view('frontoffice.home', compact(  'events'));


    }

    public function eventShow(){
        $categories= Category::all();
        $events = Event::where('accept_admin', '=', '1')->paginate(8);
        return view('frontoffice.events', compact( 'events', 'categories'));
    }

    public function showEventById($id){
        $event = Event::find($id);
        return view('frontoffice.eventDetail', compact('event'));
    }



    public function searchEvent($search , $category , $date)
    {
        if ($search == "AllEventSearch") {
            $events = Event::where('accept_admin', '=', '1')->get();
        } else {
            $events = Event::where('accept_admin', '=', '1')
                        ->where('title', 'like', '%' . $search . '%')
                        ->where('category_id', $category)
                        ->where('created_at', $date)->orderBy('created_at', $date)

                        ->get();
        }

        return view('frontoffice.search-results', compact('events'));
    }

    public function filterEvent($id){
        $events = Event::where('category_id', $id)->where('accept_admin', '=', '1')->get();
        return view('frontoffice.Filter-category', compact('events'));
    }

    public function SortEvent($date){
        if($date == "latest"){
            $events = Event::where('accept_admin', '=', '1')->orderBy('created_at', 'desc')->get();
        }else{
            $events = Event::where('accept_admin', '=', '1')->orderBy('created_at', 'asc')->get();
        }
        return view('frontoffice.Sort-date', compact('events'));
    }

}
