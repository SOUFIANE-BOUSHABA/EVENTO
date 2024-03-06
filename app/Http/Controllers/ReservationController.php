<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function reserve($type , $eventId){
        $event = Event::find($eventId);

        if (!$event || !$event->tickets->where('type', $type)->isNotEmpty()) {
            return redirect()->back()->with('error', 'Invalid event or ticket type.');
        }
        $availableSeats = $event->tickets->where('type', $type)->sum('quantity');
    
        if ($availableSeats <= 0) {
            return redirect()->back()->with('error', 'No available seats for the selected ticket type.');
        }

        $acceptacion= $event->accept_reservations;
        if($acceptacion==1){
            Reservation::create([
                'user_id' => auth()->user()->id,
                'ticket_id'=> $event->tickets->where('type', $type)->first()->id,
                'accept_organisateur'=>true,
            ]);
        }else{
            Reservation::create([
                'user_id' => auth()->user()->id,
                'ticket_id'=> $event->tickets->where('type', $type)->first()->id,
                'accept_organisateur'=>false,
            ]);
        }
       
       
    
        $event->tickets->where('type', $type)->first()->decrement('quantity');
        return redirect()->back()->with('success', 'Reservation successful!');
    }





    public function myResevation(){
        $reservations = Reservation::where('user_id', auth()->user()->id)->with('ticket.event')->get();
        return view('frontoffice.myReservations', compact('reservations'));
    }





    public function showReservations(){
        $reservations = Reservation::where('accept_organisateur', false)->with('ticket.event')->get();
        return view('backoffice.reservations', compact('reservations'));
    }

    public function accepterReservation($id){
        $reservation = Reservation::find($id);
        $reservation->accept_organisateur = true;
        $reservation->save();
        return redirect()->back();
    }
}
