<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $eventname = $request->get('eventname');
        $totalprice = $request->get('total');
        $totalInCents = intval($totalprice * 100);
        $reservationId = $request->reservation_id;
        $session=  $this->paye($eventname , $totalInCents ,$reservationId);

      
   
      
       


        $reservation = Reservation::find($reservationId);

        $this->sendTicketEmail($reservation);

        return redirect()->away($session->url);
    }

    private function sendTicketEmail($reservation)
    {
        $ticketView = view('tickets.ticket', ['reservation' => $reservation])->render();
        Mail::raw('Your Ticket Information', function ($message) use ($reservation, $ticketView) {
            $message->to($reservation->user->email)->subject('Your Ticket Information');
            $message->setBody($ticketView, 'text/html');
        });
    }

    public function paye($eventname , $totalInCents ,$reservationId){

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $eventname,
                        ],
                        'unit_amount'  => $totalInCents,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',

            'success_url' =>  route('success', ['id' => $reservationId]),
            'cancel_url'  => route('cancel'),
        ]);

        return $session;
    }

    public function success($id)
    {
       

        if($id){
            Reservation::where('id', $id)->update(['paid' => 1]);
        }
        return redirect('/myResevations');
      
    }

    public function cancel()
    {
        dd('cancel');
    }
}
