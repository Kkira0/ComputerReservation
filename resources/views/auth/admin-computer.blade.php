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
        <a href="{{ route('admin.computer.create') }}">
            <button>Add New Computer</button>
        </a>
        <a href="{{ route('software.create') }}">
            <button class="btn btn-success btn-sm">Create New Software</button>
        </a>
        <a href="{{ route('pc_parts.create') }}">
            <button class="btn btn-success btn-sm">Create New Hardware</button>
        </a>

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
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $software->Software_Name }} (Version: {{ $software->Version }})</span>
                                    
                                    <!-- Form to unlink the software from this computer -->
                                    <form action="{{ route('computer.software.destroy', ['computer_id' => $computer->Computer_ID, 'software_id' => $software->Software_ID]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this software from the computer?')">Remove</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('computer.addExistingSoftwareForm', $computer->Computer_ID) }}" class="btn btn-primary btn-sm">Add Existing Software</a>

                                    
                    <h4>Hardware Parts:</h4>
                    @if ($computer->pc_parts->isEmpty())
                        <p>No hardware parts installed.</p>
                    @else
                        <ul class="list-group mb-3">
                            @foreach ($computer->pc_parts as $part)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $part->Part_name }} - {{ $part->Part_type }} ({{ $part->apraksts }})</span>
                            
                                    <form action="{{ route('computer.pc_parts.destroy', ['computer_id' => $computer->Computer_ID, 'part_id' => $part->Part_ID]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this hardware from the computer?')">Remove</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('computer.addExistingHardwareForm', $computer->Computer_ID) }}" class="btn btn-primary btn-sm">Add Existing Hardware</a>
                    <br>
                    <br>

                    <a href="{{ route('computer.edit', $computer->Computer_ID) }}" class="btn btn-warning btn-sm">Edit Computer</a>
                    <br>
                    <br>
                    <form action="{{route('computer.destroy', $computer->Computer_ID)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete Computer</button>
                    </form>
                </div>
            </div>
        @endforeach

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
