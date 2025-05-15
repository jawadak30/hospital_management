<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Hello {{ $appointment->patient->user->name }},</h2>

<p>
    Your appointment with Dr. {{ $appointment->doctor->user->name }}
    on <strong>{{ $appointment->appointment_date->format('l, F j, Y \a\t h:i A') }}</strong>
    has been affected because the doctor is no longer available.
</p>

<p>
    The appointment status has been updated to <strong>needs rescheduling</strong>.
</p>

<p>
    Please log in to your account to choose another suitable time.
</p>

<p>Thank you for your understanding.</p>


</body>
</html>
