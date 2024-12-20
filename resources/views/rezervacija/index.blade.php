<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacijas</title>
</head>
<body>
    <h1>List of Rezervacijas</h1>
    <ul>

    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rezervācijas</h1>
    <!-- <a href="{{ route('rezervacija.create') }}" class="btn btn-primary mb-3">Izveidot jaunu rezervāciju</a> -->
     
    <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-sm">Back</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dators</th>
                <th>Pieteikums</th>
                <th>Sākuma laiks</th>
                <th>Beigu laiks</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
    @foreach($rezervacijas as $rezervacija)
    <tr>
        <td>{{ $rezervacija->Rezervacijas_ID }}</td>
        <td>{{ $rezervacija->computer->PC_Name ?? 'N/A' }}</td>
        <td>{{ $rezervacija->pieteikums->pieteikuma_id ?? 'N/A' }}</td>
        <td>{{ $rezervacija->start_time }}</td>
        <td>{{ $rezervacija->end_time }}</td>
        <td>{{ $rezervacija->created_at ? $rezervacija->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
    </tr>
    @endforeach
</tbody>

    </table>
</div>
@endsection


    </ul>
</body>
<script>
    console.log("kawk")
</script>
</html>
