<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class EventController extends Controller
{
    //
    public function showEvent(){
        $id = Auth::user()->id;
        $events = Event::where('organisateur_id', $id)->get();
        $categories = Category::all();
        $locations = Location::all();
        
        return view('backoffice.events', compact('events', 'categories', 'locations'));
    }

    public function storeEvent(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|after:now',
            'category_id' => 'required',
            'location_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048|file',
            'accept_reservations' => 'required|boolean', 
        ]);
       
        if ($request->hasFile('image')) {             
                $imagePath = $request->file('image')->store('images', 'public');       
        }

       
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'organisateur_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'image' => $imagePath, 
            'accept_reservations' => $request->accept_reservations,
        ]);
    
        return redirect()->back();
    }

    public function deleteEvent($id){
        $event = Event::find($id);
        $imagePath = $event->image;
    
        if ($imagePath && Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
    
        $event->delete();
        return redirect()->back();
    }
    

    public function editEvent(Request $request, $id){
        $event = Event::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'available_seats' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048|file',
            'accept_reservations' => 'required|boolean', 
        ]);
       
        if ($request->hasFile('image')) {             
                $imagePath = $request->file('image')->store('images', 'public');       
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'organisateur_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'available_seats' => $request->available_seats,
            'image' => $imagePath, 
            'accept_reservations' => $request->accept_reservations,
        ]);
    
        return redirect()->back();
    }



    public function showEventAdmin(){
        $events = Event::where('accept_admin', '=', '0')->get();

        return view('backoffice.eventsAdmin', compact('events'));
    }

    
    public function acceptEvent($id){
        $event = Event::find($id);
        $event->accept_admin = 1;
        $event->save();
        return redirect()->back();
    }
}
