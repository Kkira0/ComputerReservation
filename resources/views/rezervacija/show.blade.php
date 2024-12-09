<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Reservation Details</h1>

    <table class="table">
        <tr>
            <th>User</th>
            <td>{{ $rezervacija->pieteikums->user->first_name }} {{ $rezervacija->pieteikums->user->last_name }}</td>
        </tr>
        <tr>
            <th>Computer</th>
            <td>{{ $rezervacija->computer->PC_Name }}</td>
        </tr>
        <tr>
            <th>Start Time</th>
            <td>{{ $rezervacija->start_time }}</td>
        </tr>
        <tr>
            <th>End Time</th>
            <td>{{ $rezervacija->end_time }}</td>
        </tr>
    </table>

    <a href="{{ route('rezervacija.index') }}" class="btn btn-primary">Back to Reservations</a>
</div>
@endsection

</body>
</html>