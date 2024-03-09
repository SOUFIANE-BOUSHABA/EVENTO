
@extends('layout.appAdmin')

@section('content')
    



<main>
  <div class="card shadow-sm">
   
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-4 mt-2 bg-white ">
            <thead class="bg-light">
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Event</th>
                <th>Type</th>
                <th>Price</th>
                <th>Action</th>
                
                                
            </tr>
        </thead>
        <tbody id="reservations">

       
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{$reservation->id}}</td>
                <td>{{$reservation->user->firstname}} {{$reservation->user->lastname}}</td>
                <td>{{$reservation->ticket->event->title}}</td>
                <td>{{$reservation->ticket->type}}</td>
                <td>{{$reservation->ticket->price}}</td>
                <td>
                    <form action="{{route('accepter.reservation', $reservation->id)}}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-warning">accepter</button>
                   </form>

               
            </tr>
            @endforeach

           
         
        </tbody>
      </table>

    
    </div>
  </div>





</main>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
@endsection