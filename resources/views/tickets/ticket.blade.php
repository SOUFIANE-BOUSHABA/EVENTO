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
            background-color: #f7f7f7;
            padding: 20px;
            border: 1px solid #ccc;
            width: 300px; /* Adjust the width as needed */
        }

        h2 {
            color: #333;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        .ticket-info {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .ticket-type {
            font-size: 16px;
            color: #555;
        }

        .price {
            font-size: 14px;
            color: #777;
        }

        .user-info {
            margin-top: 20px;
        }

        .location {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="ticket-info">
        <h2>Ticket Information</h2>
        <p class="event-title"><strong>Event:</strong> {{ $reservation->ticket->event->title }}</p>
        <p class="ticket-type"><strong>Type:</strong> {{ $reservation->ticket->type }}</p>
        <p class="price"><strong>Price:</strong> {{ $reservation->ticket->price }}$</p>
        <div class="user-info">
            <p><strong>Name:</strong> {{ $reservation->user->firstname}} {{ $reservation->user->lastname}}</p>
        </div>
        <div class="location">
            <p><strong>Location:</strong> {{ $reservation->ticket->event->Location->name }}</p>
        </div>
    </div>
</body>

</html>
