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
        $id = Auth::user()->id;
        $events = Event::where('organisateur_id', $id)->get();
        $categories = Category::all();
        $locations = Location::all();

        // ->join('categories', 'events.category_id', '=', 'categories.id')
        // ->join('locations', 'events.location_id', '=', 'locations.id')
        
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
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
        }

       
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'organisateur_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'image' => 'images/'.$imageName, 
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
    

    public function editEvent(Request $request, $id)
    {
        $event = Event::find($id);
    
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048|file',
            'accept_reservations' => 'required|boolean', 
        ]);
    
        if ($request->hasFile('image')) {             
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
    
            if ($event->image) {
                $previousImagePath = public_path($event->image);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
    
            $event->update([
                'image' => 'images/'.$imageName,
            ]);
        }
    
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'organisateur_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
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
