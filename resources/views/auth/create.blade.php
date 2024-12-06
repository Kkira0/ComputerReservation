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
    <h1>Create Reservation</h1>

    <form action="{{ route('admin.rezervacija.store') }}" method="POST">
        @csrf
        <input type="hidden" name="pieteikuma_id" value="{{ $pieteikums->idPieteikums }}">

        <div class="mb-3">
            <label for="computer_id" class="form-label">Select Computer</label>
            <select name="computer_id" class="form-control" required>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->Computer_ID }}">{{ $computer->PC_Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Reservation</button>
    </form>
</div>
@endsection

</body>
</html>