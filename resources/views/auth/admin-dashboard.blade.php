<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Admin Dashboard</h1>

    <h3>Pending Reservation Requests</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Requested Computer</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingPieteikumi as $pieteikums)
            <tr>
            <td>
        @if ($pieteikums->user)
            {{ $pieteikums->user->first_name }} {{ $pieteikums->user->last_name }}
        @else
            User not found
        @endif
    </td>
    <td>
        @if ($pieteikums->computer)
            {{ $pieteikums->computer->PC_Name }}
        @else
            Computer not found
        @endif
    </td>
                <td>{{ $pieteikums->start_time }}</td>
                <td>{{ $pieteikums->end_time }}</td>
                <td>
                    <!-- Approve Button -->
                    <form action="{{ route('admin.pieteikums.approve', $pieteikums->pieteikuma_id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button class="btn btn-success btn-sm">Approve</button>
                    </form>

                    <!-- Deny Button -->
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
