<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Software</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Software for {{ $computer->PC_Name }}</h1>

        <form action="{{ route('computer.updateSoftware', $computer->Computer_ID) }}" method="POST">
            @csrf
            @method('PUT')

            <h4>Installed Software:</h4>
            @foreach ($softwares as $software)
                <div class="mb-3">
                    <label for="software_{{ $software->Software_ID }}" class="form-label">{{ $software->Software_Name }} (Version: {{ $software->Version }})</label>
                    <input type="text" name="software_{{ $software->Software_ID }}" id="software_{{ $software->Software_ID }}" class="form-control" value="{{ old('software_' . $software->Software_ID, $software->Software_Name) }}" required>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Update Software</button>
        </form>

        <!-- Back Button -->
        <a href="{{ route('admin.computer') }}" class="btn btn-secondary mt-3">Back to Computer List</a>
    </div>
</body>
</html>
