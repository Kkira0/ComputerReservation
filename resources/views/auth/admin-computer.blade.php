<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computers, Parts, and Software</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Computers, Parts, and Software</h1>

        <h2>Computers</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-sm">Back</a>

        <!-- Loop through the computers and display the details -->
        @foreach($computers as $computer)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2>{{ $computer->PC_Name }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Operating System:</strong> {{ $computer->Operating_System }}</p>

                    <h4>Installed Software:</h4>
                    @if ($computer->softwares->isEmpty())
                        <p>No software installed.</p>
                    @else
                        <ul class="list-group mb-3">
                            @foreach ($computer->softwares as $software)
                                <li class="list-group-item">{{ $software->Software_Name }} (Version: {{ $software->Version }})</li>
                            @endforeach
                        </ul>
                    @endif

                    <h4>Hardware Parts:</h4>
                    @if ($computer->pc_parts->isEmpty())
                        <p>No hardware parts installed.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($computer->pc_parts as $part)
                                <li class="list-group-item">{{ $part->Part_name }} - {{ $part->Part_type }} ({{ $part->apraksts }})</li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Edit Button for Each Computer -->
                    <a href="{{ route('computer.edit', $computer->Computer_ID) }}" class="btn btn-warning btn-sm">Edit</a>

                </div>
            </div>
        @endforeach

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
