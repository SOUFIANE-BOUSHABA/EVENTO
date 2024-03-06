@extends('layout.appUser')
@section('content')


<section>
    <div class="container thissss mb-4">
        <div class="row">
            <div class="">
                <h1 class="fw-bold">Find the best events</h1>
                <p class="text">Discover and attend events that you love</p>
            </div>
            
          
        </div>
    </div>
</section>



<section class="container mt-4 margin-bottom ">
    <div class=" d-flex gap-4">
        <img src="{{asset('storage/'.$event->image)}}" class="img-fluid col-md-6 rounded" alt="Event Image">
        <div class="col-md-6">
            <h1 class="fw-bold">{{$event->title}}</h1>

            <div class="col-md-6">
                <div id="countdown" class="opacity-50"></div>
            </div>

            <p class="text">Date: {{$event->date}}</p>
            <p class="text">Location: {{$event->Location->name}}</p>
          
          
            <p>Available Seats: {{$event->tickets->count()}}</p>

            <div id="ticketDetails" class="mt-4">
                <div class="d-flex justify-content-between">
                    <span>Standard Ticket</span>
                    <div class="ticket-actions">
                        <button onclick="decrementTicket('standard')">-</button>
                        <span id="standardTicketCount">0</span>
                        <button onclick="incrementTicket('standard')">+</button>
                    </div>
                    <span id="standardTicketPrice">$50.00</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>VIP Ticket</span>
                    <div class="ticket-actions">
                        <button onclick="decrementTicket('vip')">-</button>
                        <span id="vipTicketCount">0</span>
                        <button onclick="incrementTicket('vip')">+</button>
                    </div>
                    <span id="vipTicketPrice">$100.00</span>
                </div>
            </div>
            
             <!-- Display Total -->
             <div id="totalticket" class="mt-4">
                <span>Total Ticket:</span>
                <span id="totalAmount">0</span>
            </div>
            <!-- Display Total -->
            <div id="total" class="mt-4">
                <span>Total Price:</span>
                <span id="totalAmount">$0.00</span>
            </div>



            <button class="btn btn-primary">Reserve Your Seat</button>
        </div>
       
    </div>

    <div class="container">
        <hr>
        <p class="mt-4">Description: {{$event->description}}</p>
    </div>
</section>

<script>

document.addEventListener('DOMContentLoaded', function() {
    var eventDate = new Date("{{ $event->date }}").getTime();

    var countdown = setInterval(function() {
        var now = new Date().getTime();
        var distance = eventDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('countdown').innerHTML =
            '<p>' + days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's </p>';

        if (distance < 0) {
            clearInterval(countdown);
            document.getElementById('countdown').innerHTML = '<p>The event has started!</p>';
        }
    }, 1000);
});


var standardTicketCount = 0;
    var vipTicketCount = 0;

    // Ticket Prices
    var standardTicketPrice = 50.00;
    var vipTicketPrice = 100.00;

    function incrementTicket(type) {
        if (type === 'standard') {
            standardTicketCount++;
        } else if (type === 'vip') {
            vipTicketCount++;
        }

        updateTicketDetails();
    }

    function decrementTicket(type) {
        if (type === 'standard' && standardTicketCount > 0) {
            standardTicketCount--;
        } else if (type === 'vip' && vipTicketCount > 0) {
            vipTicketCount--;
        }

        updateTicketDetails();
    }

    function updateTicketDetails() {
        document.getElementById('standardTicketCount').innerText = standardTicketCount;
        document.getElementById('vipTicketCount').innerText = vipTicketCount;

        var totalAmount = (standardTicketCount * standardTicketPrice) + (vipTicketCount * vipTicketPrice);
        document.getElementById('totalAmount').innerText = '$' + totalAmount.toFixed(2);
    }



</script>


@endsection

