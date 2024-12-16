<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Existing Hardware</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Existing Hardware to Computer: {{ $computer->PC_Name }}</h1>

        <!-- Form to Add Existing Hardware -->
        <form action="{{ route('computer.addExistingHardware', $computer->Computer_ID) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="part_id" class="form-label">Hardware Part</label>
                <select name="part_id" id="part_id" class="form-select" required>
                    <option value="">Select Hardware</option>
                    @foreach ($hardwareList as $part)
                        <option value="{{ $part->Part_ID }}">{{ $part->Part_name }} (Type: {{ $part->Part_type }})</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Hardware</button>
        </form>

        <a href="{{ route('admin.computer') }}" class="btn btn-warning mt-3">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
