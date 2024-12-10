<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Create a Reservation</h1>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Izveidot jaunu rezervāciju</h1>
    <form action="{{ route('rezervacija.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
    <label for="Computer_ID">Dators</label>
    <select name="Computer_ID" id="Computer_ID" class="form-control" required>
        <option value="" selected disabled>Izvēlieties datoru</option>
        @foreach($computers as $computer)
        <option value="{{ $computer->Computer_ID }}">{{ $computer->PC_Name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group mb-3">
    <label for="pieteikuma_id">Pieteikums</label>
    <select name="pieteikuma_id" id="pieteikuma_id" class="form-control" required>
        <option value="" selected disabled>Izvēlieties pieteikumu</option>
        @foreach($pieteikumi as $pieteikums)
        <option value="{{ $pieteikums->pieteikuma_id }}">{{ $pieteikums->pieteikuma_id }}</option>
        @endforeach
    </select>
</div>

        <div class="form-group mb-3">
            <label for="start_time">Sākuma laiks</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="end_time">Beigu laiks</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Saglabāt</button>
    </form>
</div>
@endsection




</body>
</html>