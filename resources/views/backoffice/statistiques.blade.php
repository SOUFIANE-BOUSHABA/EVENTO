
@extends('layout.appAdmin')

@section('content')
    



<main>
  <div class="card shadow-sm">
   

    <div class="card-deck mt-4 d-flex  justify-content-between gap-4">

        @role('admin')
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">User Count</h5>
                <p class="card-text">{{ $countusers }}</p>
            </div>
        </div>
        @endrole

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

        <div class="card shadow-sm">
          <div class="card-body">
              <h5 class="card-title">Reservation Count</h5>
              <p class="card-text">{{ $reservationcount }}</p>
          </div>
      </div>


    </div>

    @role('admin')
    <div class=" shadow-sm d-flex">
      <div class="card-body col-md-6">
          <h5 class="card-title">Reservations per Day</h5>
          <canvas id="reservationsChart" width="400" height="200"></canvas>
      </div>

  </div>@endrole

 

  </div>

</main>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
 
 

   document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('reservationsChart').getContext('2d');

        var reservationsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Reservations per Day',
                    data: {!! json_encode($data) !!},
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

  
</script>
</body>
</html>
@endsection