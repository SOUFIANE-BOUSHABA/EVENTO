
@extends('layout.appAdmin')

@section('content')
    



<main>
  <div class="card shadow-sm">
   
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-4 mt-2 bg-white ">
            <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>titre</th>
                <th>auteur</th>
                <th>role</th>
                <th>Action</th>
                                
            </tr>
        </thead>
        <tbody id="category">
          @foreach ($users as $user)
          <tr>
              <td>{{$user->firstname}}</td>
              <td>{{$user->lastname}}</td>
              <td>{{$user->email}}</td>
              <td>
                @foreach($user->roles as $role)
                    <span class="badge bg-warning">{{$role->name}}</span>
                @endforeach
            </td>
              <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                    Edit Role
                  </button>

                  <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('update.an.user', $user->id)}}" method="post">
                          @csrf
                          @method('put')
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Role</label>
                           <select name="role" class="form-control" id="">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                           </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                        </div>
                       
                      </div>
                    </div>
                  </div>
              <td>
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