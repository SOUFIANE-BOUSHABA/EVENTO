@foreach ($events as $event)
<div class="col-md-3 mt-4">
    <div class="card upcoming-event-card h-100">
        <img  src="{{asset('/'.$event->image)}}" class="card-img-top" alt="Event 1">
        <div class="card-body">
            <h5 class="card-title">{{$event->title}}</h5>
            <p>{{$event->date}}</p>
            <p> {{ Illuminate\Support\Str::limit($event->description, 30) }}</p>
            <a href="{{route('event.details' , $event->id)}}" class="btn btn-primary">Learn More</a>
        </div>
    </div>
</div>
@endforeach