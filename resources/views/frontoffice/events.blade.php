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
            <input type="text" class="form-control" id="titleFilter" placeholder="Enter title..." onkeyup="search()">
        </div>
        <div class="col-md-4">
            <label for="categoryFilter" class="form-label">Filter by Category:</label>
            <select class="form-select" id="categoryFilter" onchange="filter()" >
                <option value="all">All Categories</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
               
            </select>
        </div>
        <div class="col-md-4">
            <label for="dateFilter" class="form-label">Sort by Date:</label>
            <select class="form-select" id="dateFilter" onchange="sort()">
                <option value="latest">Latest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>
    </div>
</section>




<section class="container my-4">
    <h2 class="fw-bold mb-4"> Events</h2>
    <div class="row" id="eventsContainer">
        @foreach ($events as $event)
        <div class="col-md-3 mt-4">
            <div class="card upcoming-event-card h-100">
                <img  src="{{asset('storage/'.$event->image)}}" class="card-img-top" alt="Event 1">
                <div class="card-body">
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p>{{$event->date}}</p>
                    <p> {{ Illuminate\Support\Str::limit($event->description, 30) }}</p>
                    <a href="{{route('event.details' , $event->id)}}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>

   
</section>



<script>
function search() {
    var valueInput = document.getElementById('titleFilter').value;  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("eventsContainer").innerHTML = xhttp.responseText;
        }
    };
    if (valueInput == '') {
        var url = '/SearchEvent/AllEventSearch';
    } else {
        var url = '/SearchEvent/' + valueInput;
    }

    xhttp.open("GET", url, true);
    xhttp.send();
}

function filter() {
    var category = document.getElementById('categoryFilter').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("eventsContainer").innerHTML = xhttp.responseText;
        }
    };
    var url = '/FilterEvent/' + category ;
    xhttp.open("GET", url, true);
    xhttp.send();
}

function sort() {
    var date = document.getElementById('dateFilter').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("eventsContainer").innerHTML = xhttp.responseText;
        }
    };
    var url = '/SortEvent/' + date ;
    xhttp.open("GET", url, true);
    xhttp.send();
}


</script>


@endsection

