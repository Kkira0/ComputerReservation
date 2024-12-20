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
    <h1>Admin Dashboard</h1>

    <h3>Pending Reservation Requests</h3>
    <a href="{{ route('admin.computer') }}" class="btn btn-warning btn-sm">Edit Computer</a>
    <a href="{{ route('rezervacija.index') }}" class="btn btn-warning btn-sm">Visas rezervācijas</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pieteikuma_id</th>
                <th>Requested Computer</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingPieteikumi as $pieteikums)
                <tr>
                    <td>{{ $pieteikums->pieteikuma_id }}</td>
                    <td>{{ $pieteikums->computer->Computer_ID }}</td>
                    <td>{{ $pieteikums->start_time }}</td>
                    <td>{{ $pieteikums->end_time }}</td>
                    <td>{{ $pieteikums->created_at ? $pieteikums->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>

                    <td>
                        <form action="{{ route('admin.pieteikums.approve', $pieteikums->pieteikuma_id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button class="btn btn-success btn-sm">Approve</button>
                        </form>

                        <form action="{{ route('admin.pieteikums.deny', $pieteikums->pieteikuma_id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button class="btn btn-danger btn-sm">Deny</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
</div>
@endsection



</body>
</html>