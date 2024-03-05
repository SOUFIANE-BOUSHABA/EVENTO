<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class EventController extends Controller
{
    //
    public function showEvent(){
        $events = Event::all();
        $categories = Category::all();
        $locations = Location::all();
        
        return view('backoffice.events', compact('events', 'categories', 'locations'));
    }

    public function storeEvent(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'available_seats' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048|file',
            'acceptation' => 'nullable|boolean', 
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
            'available_seats' => $request->available_seats,
            'image' => $imagePath, 
            'accept_reservations' => $request->has('acceptation') ? 1 : 0,
        ]);
    
        return redirect()->back();
    }

    public function deleteEvent($id){
        $event = Event::find($id);
        $imagePath = $event->image;

        if ($imagePath) {
            Storage::delete($imagePath);
        }
        $event->delete();
        return redirect()->back();
    }
}
