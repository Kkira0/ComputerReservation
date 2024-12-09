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
    

@section('content')
<div class="container mt-5">
    <h1>All Reservations</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Computer</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rezervacijas as $rezervacija)
                <tr>
                    <td>{{ $rezervacija->pieteikums->user ? $rezervacija->pieteikums->user->first_name . ' ' . $rezervacija->pieteikums->user->last_name : 'User not found' }}</td>
                    <td>{{ $rezervacija->computer->PC_Name }}</td>
                    <td>{{ $rezervacija->start_time }}</td>
                    <td>{{ $rezervacija->end_time }}</td>
                    <td>
                        <form action="{{ route('rezervacija.deny', $rezervacija->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deny</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


    </ul>
</body>
</html>
