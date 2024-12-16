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

                    <a href="{{ route('computer.addExistingSoftwareForm', $computer->Computer_ID) }}" class="btn btn-primary btn-sm">Add Existing Software</a>

                    <!-- Modal for Adding Existing Software -->
                    <div class="modal fade" id="addSoftwareModal{{ $computer->Computer_ID }}" tabindex="-1" aria-labelledby="addSoftwareModalLabel{{ $computer->Computer_ID }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addSoftwareModalLabel{{ $computer->Computer_ID }}">Add Software to {{ $computer->PC_Name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('computer.addSoftware', $computer->Computer_ID) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="software" class="form-label">Choose Software</label>
                                            <select name="software_id" id="software" class="form-select" required>
                                                @foreach($computer->softwares as $software)
                                                    <option value="{{ $software->Software_ID }}">{{ $software->Software_Name }} (Version: {{ $software->Version }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Software</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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

                    <a href="{{ route('computer.addExistingHardwareForm', $computer->Computer_ID) }}" class="btn btn-primary btn-sm">Add Existing Hardware</a>
                    
                    
                    <br>


                    <!-- Edit Button for Each Computer -->
                    <a href="{{ route('computer.edit', $computer->Computer_ID) }}" class="btn btn-warning btn-sm">Edit Computer</a>
                    
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
