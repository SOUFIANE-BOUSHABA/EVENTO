
@extends('layout.appAdmin')

@section('content')
    



<main>
  <div class="card shadow-sm">
    <div class="d-flexxx d-flex justify-content-between">
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + add
          </button>
        {{-- <div>
        <input type="text" id="searchInput" onkeyup="search()" placeholder="rechercher">
        </div> --}}
     
    </div>
  @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-4 mt-2 bg-white ">
            <thead class="bg-light">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Available_seats</th>
                <th class="col-md-2 ">Action</th>
                                
            </tr>
        </thead>
        <tbody id="category">
            @foreach ($events as $event)
            <tr>

                <td><img src="{{asset('storage/'.$event->image)}}" alt="" style="width: 50px; height: 50px"></td>
                
                <td>{{$event->title}}</td>
                <td>{{$event->description}}</td>
                <td>{{$event->date}}</td>
                <td>{{$event->tickets->count()}}</td>
                <td class="d-flex gap-2">

                    <a href="{{route('view.tickit' , $event->id)}}" class="btn btn-primary">Tickits</a>
                   <form action="{{route('delete.event' , $event->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">delete</button>
                   </form>



                   <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$event->id}}">
                    edit
                  </button>

           {{-- edit --}}
                  <div class="modal fade" id="exampleModal{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">edit categories</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('events.edit' ,$event->id) }}" method="post"   enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <input type="text" placeholder="Title" value="{{$event->title}}" class="form-control mb-4" id="title" name="title" aria-describedby="">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control mb-4"  placeholder="Description" id="description" name="description" rows="3">{{$event->description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" value="{{$event->date}}" class="form-control mb-4" id="date" name="date" aria-describedby="">
                                </div>
                                <div class="d-flex gap-4">
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <select class="form-select mb-4" id="location" name="location_id" aria-describedby="">
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select class="form-select mb-4" id="category" name="category_id" aria-describedby="">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  
                                </div>
                                <div class="mb-3">
                                    <input type="number" value="{{$event->available_seats}}" placeholder="Number of Seats" class="form-control mb-4" id="seats" name="available_seats" aria-describedby="">
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control mb-4" name="image" aria-describedby="">
                                </div>
                                <div class="mb-3">
                                    <label>Accept Reservations:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="accept_reservations" id="accept_yes" value="1" checked>
                                        <label class="form-check-label" for="accept_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="accept_reservations" id="accept_no" value="0">
                                        <label class="form-check-label" for="accept_no">No</label>
                                    </div>
                                </div>
                                
                                
                              
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                       
                      </div>
                    </div>
                  </div>


                </td>
            </tr>
            @endforeach

           
         
        </tbody>
      </table>

      <div style="display: flex;justify-content:space-between">
        <div style="color: rgb(74, 74, 248)">
           
        </div>
        <div style="display: flex">
         
        </div>
    </div>
    </div>
  </div>





  {{-- add --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('events.store') }}" method="post"   enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" placeholder="Title" class="form-control mb-4" id="title" name="title" aria-describedby="">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control mb-4" placeholder="Description" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control mb-4" id="date" name="date" aria-describedby="">
                    </div>
                    <div class="d-flex gap-4">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <select class="form-select mb-4" id="location" name="location_id" aria-describedby="">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select mb-4" id="category" name="category_id" aria-describedby="">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      
                    </div>
                   
                    <div class="mb-3">
                        <input type="file" class="form-control mb-4" name="image" aria-describedby="">
                    </div>
                    <div class="mb-3">
                        <label>Accept Reservations:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="accept_reservations" id="accept_yes" value="1" checked>
                            <label class="form-check-label" for="accept_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="accept_reservations" id="accept_no" value="0">
                            <label class="form-check-label" for="accept_no">No</label>
                        </div>
                    </div>
                    
                    
                  
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

</main>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
  function toggleAside() {
    var aside = document.getElementById("myAside");
    var righttt = document.getElementById("right");
    var rightttBtn = document.getElementById("rightBtn");
    var leftBtn = document.getElementById("leftBtn");
    var links = document.querySelectorAll(".link");

    if (aside.style.width === "5%") {
      aside.style.width = "17%";
      righttt.style.width="83%";
      leftBtn.style.display="block";
      rightttBtn.style.display="none";
      links.forEach(function (link) {
            link.style.display = "block";
        });
    
    } else {
      aside.style.width = "5%";
      righttt.style.width="95%";
      leftBtn.style.display="none";
      rightttBtn.style.display="block";
   
        links.forEach(function (link) {
            link.style.display = "none";
        });
    }
  }
  
 

</script>
</body>
</html>
@endsection