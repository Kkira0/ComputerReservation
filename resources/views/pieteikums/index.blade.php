<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pieteikums List</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">All Reservations (Pieteikums)</h1>

        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        
        <div class="mb-3">
            <a href="{{ route('pieteikums.create') }}" class="btn btn-primary">Create New Reservation</a>
        </div>

        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Computer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pieteikums as $reservation)
                        <tr>
                            <td>{{ $reservation->first_name }}</td>
                            <td>{{ $reservation->last_name }}</td>
                            <td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->start_time }}</td>
                            <td>{{ $reservation->end_time }}</td>
                            <td>{{ $reservation->created_at ? $reservation->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>

                            <td>{{ ucfirst($reservation->status) }}</td>
                            <td>{{ $reservation->Computers }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
