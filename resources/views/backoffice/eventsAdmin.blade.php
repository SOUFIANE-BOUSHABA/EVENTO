
@extends('layout.appAdmin')

@section('content')
    



<main>
  <div class="card shadow-sm">
   

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
                <td> {{ Illuminate\Support\Str::limit($event->description, 30) }}</td>
                <td>{{$event->date}}</td>
                <td>{{$event->tickets->sum('quantity')}}</td>
                <td class="d-flex gap-2">

                   <form action="{{route('accept.event.admin' , $event->id)}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-warning">accept</button>
                   </form>



        


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