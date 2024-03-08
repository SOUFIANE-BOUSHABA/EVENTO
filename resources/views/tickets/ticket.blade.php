<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        .mt-4 {
            margin-top: 20px;
        }
        .mb-4 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Ticket Information</h2>
    <p><strong>Event:</strong> {{ $reservation->ticket->event->title }}</p>
    <p><strong>Type:</strong> {{ $reservation->ticket->type }}</p>
    <p><strong>Price:</strong> {{ $reservation->ticket->price }}$</p>
    <p><strong>Name:</strong> {{ $reservation->user->firstname}} {{ $reservation->user->lastname}}</p>
    <p class="mb-4"><strong>Location:</strong> {{ $reservation->ticket->event->Location->name }}</p>

   
    
    <div class="signature mt-4 opacity-50">
        Thank you for choosing our event!
    </div>
  
    
</body>
</html>
