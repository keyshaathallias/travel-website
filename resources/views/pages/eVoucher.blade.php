<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket Trip PDF</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .ticket {
      border: 2px dashed #659D03;
      width: 600px;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .header {
      background-color: #659D03;
      color: white;
      padding: 15px;
      text-align: center;
    }

    .content {
      padding: 20px;
      color: #466445;
      line-height: 1.6;
    }

    .details {
      display: flex;
      flex-direction: column;
    }

    .details p {
      margin: 8px 0;
    }

    .highlight {
      font-weight: bold;
      color: #466445;
    }

    .total {
      font-size: 18px;
      font-weight: bold;
      color: #466445;
      margin-top: 15px;
    }

    .footer {
      text-align: center;
      padding: 15px;
      color: #466445;
    }

    hr {
      border: none;
      border-top: 2px dashed #466445;
    }
  </style>
</head>

<body>
  <div class="ticket">
    <div class="header">
      <h2>Trip Ticket</h2>
    </div>
    <div class="content">
      <div class="details">
        <p><span class="highlight">Name:</span> {{ $payment->user->name }}</p>
        <p><span class="highlight">Email:</span> {{ $payment->user->email }}</p>
        <p><span class="highlight">Destination:</span> {{ $payment->destination->name }}</p>
        <p><span class="highlight">Departure Date:</span> {{ $payment->cart->departure_date }}</p>
        <p><span class="highlight">Ticket Price:</span>
          {{ 'Rp ' . number_format($payment->destination->ticket_price, 2, ',', '.') }}</p>
        <p><span class="highlight">Quantity:</span> {{ $payment->cart->quantity }}</p>
        <p class="total">Total: {{ 'Rp ' . number_format($payment->cart->total(), 2, ',', '.') }}</p>
      </div>
    </div>
    <div class="footer">
      <hr>
      <h3>Have a Wonderful Trip!</h3>
      <h4>- mimitravel.</h4>
    </div>
  </div>
</body>

</html>
