@extends('layout.appUser')
@section('content')




<section>
    <div class="container thissss">
        <div class="row">
            <div class="">
                <h1 class="fw-bold">Find the best events</h1>
                <p class="text">Discover and attend events that you love</p>
            </div>
          
        </div>
    </div>
</section>


<section class="container my-4">
    <div class="row">
        <div class="col-md-4">
            <label for="titleFilter" class="form-label">Search by Title:</label>
            <input type="text" class="form-control" id="titleFilter" placeholder="Enter title...">
        </div>
        <div class="col-md-4">
            <label for="categoryFilter" class="form-label">Sort by Category:</label>
            <select class="form-select" id="categoryFilter">
                <option value="all">All Categories</option>
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="dateFilter" class="form-label">Sort by Date:</label>
            <select class="form-select" id="dateFilter">
                <option value="latest">Latest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>
    </div>
</section>




<section class="container my-4">
    <h2 class="fw-bold mb-4"> Events</h2>
    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-3 mt-4">
            <div class="card upcoming-event-card">
                <img  src="{{asset('storage/'.$event->image)}}" class="card-img-top" alt="Event 1">
                <div class="card-body">
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p>{{$event->date}}</p>
                    <p>{{$event->description}}</p>
                    <a href="{{route('event.details' , $event->id)}}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>

   
</section>




@endsection

