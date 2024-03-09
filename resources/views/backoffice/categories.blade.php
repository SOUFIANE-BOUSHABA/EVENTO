
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
                <th>Name</th>
                <th class="col-md-2 ">Action</th>
                                
            </tr>
        </thead>
        <tbody id="category">
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td class="d-flex gap-2">
                   <form action="{{route('delet.category' , $category->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">delete</button>
                   </form>

                   <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}">
                    edit
                  </button>

           {{-- edit --}}
                  <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">edit categories</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('update.category', $category->id )}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                <label for="" class="form-label">Name</label> 
                                <input type="text" class="form-control mb-4" id="category" value="{{$category->name}}" name="name" aria-describedby="">
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
            <form action="{{route('store.category')}}" method="post">
                @csrf
                <div class="mb-3">
                <label for="" class="form-label">Name</label> 
                <input type="text" class="form-control mb-4" id="category" name="name" aria-describedby="">
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
 
 

</script>
</body>
</html>
@endsection