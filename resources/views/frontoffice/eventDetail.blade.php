@extends('layout.appUser')
@section('content')
<style>
    .ditttail{
        display: flex;
        justify-content: space-between;
    
    }
    @media (max-width: 768px) {
        .ditttail{
            flex-direction: column;
        }
    }
</style>

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
    <div class="ditttail gap-4">
        <img src="{{asset('/'.$event->image)}}" class="img-fluid col-md-6 rounded" alt="Event Image">
        <div class="col-md-6">
            <h1 class="fw-bold">{{$event->title}}</h1>

            <div class="col-md-6">
                <div id="countdown" class="opacity-50"></div>
            </div>

            <p class="text">Date: {{$event->date}}</p>
            <p class="text">Location: {{$event->Location->name}}</p>
        
          <div class="col-md-6">
            <p class="d-flex justify-content-between">
                Available Seats VIP: {{$event->tickets->where('type', 'vip')->sum('quantity')}}
                @if($event->tickets->where('type', 'vip')->isNotEmpty())
                    <span>{{$event->tickets->where('type', 'vip')->first()->price}}$</span>
                @else
                    <span>Not available</span>
                @endif
            </p>
            <p class="d-flex justify-content-between">
                Available Seats Standard: {{$event->tickets->where('type', 'standard')->sum('quantity')}}
                @if($event->tickets->where('type', 'standard')->isNotEmpty())
                    <span>{{$event->tickets->where('type', 'standard')->first()->price}}$</span>
                @else
                    <span>Not available</span>
                @endif
            </p>
          </div>
           
          <div class="d-flex gap-4">
            @if($event->tickets->where('type', 'standard')->isNotEmpty())
               <a href="{{ route('reserver', ['type' => 'standard', 'eventId' => $event->id]) }}" style="color: white; text-decoration: none;">
                    <button class="btn btn-primary">Reserve standard <span>{{$event->tickets->where('type', 'standard')->first()->price}}$</span></button>
               </a>
               @else
                    <button class="btn btn-primary" disabled>Reserve standard</button>
            @endif
                @if($event->tickets->where('type', 'vip')->isNotEmpty())
                <a href="{{ route('reserver', ['type' => 'vip', 'eventId' => $event->id]) }}" style="color: white; text-decoration: none;">
                    <button class="btn btn-primary">Reserve VIP <span>{{$event->tickets->where('type', 'vip')->first()->price}}$</span></button>
                </a>    
                @else
                    <button class="btn btn-primary" disabled>Reserve VIP</button>
                @endif

          </div>
        
          
        </div>
       
    </div>

    <div class="container">
        <hr>
        <p class="mt-4"><span class="fw-bold"> Description:</span> <br><br><br> {{$event->description}} <br><br></p>
    </div>
</section>


<section class="container my-4 ">
    <h3 class="fw-bold mb-4">Nos fonctionnalités</h3>
    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card p-4 category-card text-center d-flex flex-column h-100 align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 100px ; height:100px; opacity:.6; " viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M375.7 19.7c-1.5-8-6.9-14.7-14.4-17.8s-16.1-2.2-22.8 2.4L256 61.1 173.5 4.2c-6.7-4.6-15.3-5.5-22.8-2.4s-12.9 9.8-14.4 17.8l-18.1 98.5L19.7 136.3c-8 1.5-14.7 6.9-17.8 14.4s-2.2 16.1 2.4 22.8L61.1 256 4.2 338.5c-4.6 6.7-5.5 15.3-2.4 22.8s9.8 13 17.8 14.4l98.5 18.1 18.1 98.5c1.5 8 6.9 14.7 14.4 17.8s16.1 2.2 22.8-2.4L256 450.9l82.5 56.9c6.7 4.6 15.3 5.5 22.8 2.4s12.9-9.8 14.4-17.8l18.1-98.5 98.5-18.1c8-1.5 14.7-6.9 17.8-14.4s2.2-16.1-2.4-22.8L450.9 256l56.9-82.5c4.6-6.7 5.5-15.3 2.4-22.8s-9.8-12.9-17.8-14.4l-98.5-18.1L375.7 19.7zM269.6 110l65.6-45.2 14.4 78.3c1.8 9.8 9.5 17.5 19.3 19.3l78.3 14.4L402 242.4c-5.7 8.2-5.7 19 0 27.2l45.2 65.6-78.3 14.4c-9.8 1.8-17.5 9.5-19.3 19.3l-14.4 78.3L269.6 402c-8.2-5.7-19-5.7-27.2 0l-65.6 45.2-14.4-78.3c-1.8-9.8-9.5-17.5-19.3-19.3L64.8 335.2 110 269.6c5.7-8.2 5.7-19 0-27.2L64.8 176.8l78.3-14.4c9.8-1.8 17.5-9.5 19.3-19.3l14.4-78.3L242.4 110c8.2 5.7 19 5.7 27.2 0zM256 368a112 112 0 1 0 0-224 112 112 0 1 0 0 224zM192 256a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/></svg>
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title mx-auto">Nos engagements </h5>
                    <p>Billetterie officielle
                        Des tickets 100% authentiques</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card p-4 category-card text-center d-flex flex-column h-100 align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 100px ; height:100px; opacity:.6; "  viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title mx-auto">Event Tickets</h5>
                    <p> Enjoy a seamless booking experience with our official</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card p-4 category-card text-center d-flex flex-column h-100 align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 100px ; height:100px; opacity:.6; "  viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0H133.9c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0H487.4C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z"/></svg>
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title mx-auto">Assurance Qualité</h5>
                    <p>Paiement 100% sécurisé</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card p-4 category-card text-center d-flex flex-column h-100 align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 100px ; height:100px; opacity:.6; "  viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z"/></svg>
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title mx-auto"> Service Client</h5>
                    <p>Trouvez immédiatement des réponses à vos questions grâce à notre service de support 24h/7j</p>
                </div>
            </div>
        </div>
       
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



</script>


@endsection

