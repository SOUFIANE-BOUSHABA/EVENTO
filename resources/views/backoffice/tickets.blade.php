
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
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-4 mt-2 bg-white ">
            <thead class="bg-light">
            <tr>
                <th>Id</th>
                <th>type</th>
                <th>price</th>
                <th class="col-md-2 ">Action</th>
                                
            </tr>
        </thead>
        <tbody id="ticket">
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->type}}</td>
                <td>{{$ticket->price}}</td>
                <td class="d-flex gap-2">
                   <form action="{{route('delete.tickets', $ticket->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">delete</button>
                   </form>

                   <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$ticket->id}}">
                    edit
                  </button>

           {{-- edit --}}
                  <div class="modal fade" id="exampleModal{{$ticket->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">edit categories</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('update.ticket', $ticket->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                   
            
                                    <label class="form-label">Ticket Type</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="standard" value="standard" checked>
                                        <label class="form-check-label" for="standard">
                                            Standard
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="vip" value="vip">
                                        <label class="form-check-label" for="vip">
                                            VIP
                                        </label>
                                    </div>
                            
                                    <label for="price" class="form-label mt-3">Price</label>
                                    <input type="number" value="{{$ticket->price}}" class="form-control mb-4" id="price" name="price" aria-describedby="">
                            
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">add categories</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="{{route('store.tickets' , $event->id)}}" method="post">
                @csrf
                <div class="mb-3">
                   
            
                    <label class="form-label">Ticket Type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="standard" value="standard" checked>
                        <label class="form-check-label" for="standard">
                            Standard
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="vip" value="vip">
                        <label class="form-check-label" for="vip">
                            VIP
                        </label>
                    </div>
            
                    <label for="price" class="form-label mt-3">Price</label>
                    <input type="number" class="form-control mb-4" id="price" name="price" aria-describedby="">
            
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
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