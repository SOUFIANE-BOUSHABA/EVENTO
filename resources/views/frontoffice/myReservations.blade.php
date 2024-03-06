@extends('layout.appUser')
@section('content')




<section>
    <div class="container thissss">
        <div class="row">
            <div class="">
                <h1 class="fw-bold">My Reservations</h1>
                <p class="text">Discover and attend events that you love</p>
            </div>
          
        </div>
    </div>
</section>



<section class="container my-4">
    <h3 class="fw-bold mb-4"></h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->ticket->event->title }}</td>
                        <td>{{ $reservation->ticket->type }}</td>
                        <td>{{ $reservation->ticket->price }}$</td>
                        <td>
                            @if($reservation->paid == '0')
                               @if($reservation->accept_organisateur == '1')
                               
                               <form action="/session" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type='hidden' name="total" value="{{$reservation->ticket->price }}">
                                <input type='hidden' name="reservation_id" value="{{$reservation->id }}">
                                <input type='hidden' name="eventname" value="{{$reservation->ticket->event->title }}">
                                <button class="btn btn-primary" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> pay</button>
                                </form>

                                @else
                                <span class="text-danger">Not accepted by the organizer</span>
                                @endif
                            @else
                            <a href="{{ route('export.ticket', ['reservation_id' => $reservation->id]) }}" class="btn btn-secondary" target="_blank">Export Ticket</a>
                            @endif
                           
                          


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>










@endsection

