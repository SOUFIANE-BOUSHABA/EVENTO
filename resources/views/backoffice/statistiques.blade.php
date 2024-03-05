
@extends('layout.appAdmin')

@section('content')
    



<main>
  <div class="card shadow-sm">
   

    <div class="card-deck mt-4 d-flex gap-4">

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">User Count</h5>
                <p class="card-text">{{ $countusers }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Event Count</h5>
                <p class="card-text">{{ $countevents }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Ticket Count</h5>
                <p class="card-text">{{ $counttickets }}</p>
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