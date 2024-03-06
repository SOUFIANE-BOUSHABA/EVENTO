<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class TicketController extends Controller
{
    //

    public function showTickets($id){
        $tickets = Event::find($id)->tickets;
        $event = Event::find($id);
        return view('backoffice.tickets', compact('tickets' , 'event'));
    }

    public function storeTickets(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
    
        $ticket = new Ticket();
        $ticket->type = $request->type;
        $ticket->price = $request->price;
        $ticket->quantity = $request->quantity;
        $ticket->event_id = $id;
        $ticket->save();
    
        return redirect()->back();
    }
    

    public function deleteTicket($id){
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->back();
    }

    public function editTicket(Request $request ,  $id){
        $request->validate([
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $ticket = Ticket::find($id);
        $ticket->type = $request->type;
        $ticket->price = $request->price;
        $ticket->quantity = $request->quantity;
        $ticket->save();

        return redirect()->back();
    }


 
    public function exportTicket(Request $request)
    {
        $reservationId = $request->get('reservation_id');
        $reservation = Reservation::find($reservationId);

        if (!$reservation) {
            abort(404);
        }

        $pdf = $this->generateTicketPDF($reservation);

        return $pdf->stream('ticket.pdf');
    }

    private function generateTicketPDF($reservation)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $html = view('tickets.ticket', compact('reservation'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf;
    
}

}
