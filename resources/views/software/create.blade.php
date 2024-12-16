<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Software</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create New Software</h1>
        <form action="{{ route('software.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="software_name" class="form-label">Software Name</label>
                <input type="text" name="software_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="version" class="form-label">Version</label>
                <input type="text" name="version" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Software</button>
        </form>
    </div>
</body>
</html>
