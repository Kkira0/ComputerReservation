<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Existing Software</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Existing Software to Computer: {{ $computer->PC_Name }}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @elseif (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

        <form action="{{ route('computer.addExistingSoftware', $computer->Computer_ID) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="software_id" class="form-label">Select Software</label>
                <select name="software_id" id="software_id" class="form-control" required>
                    <option value="">-- Select Software --</option>
                    @foreach($softwareList as $software)
                        <option value="{{ $software->Software_ID }}">{{ $software->Software_Name }} (Version: {{ $software->Version }})</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Software</button>
        </form>

        <a href="{{ route('admin.computer') }}" class="btn btn-secondary mt-3">Back to Computers</a>
    </div>
</body>
</html>
