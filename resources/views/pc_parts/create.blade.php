<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hardware</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create New Hardware</h1>
        <form action="{{ route('pc_parts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="part_type" class="form-label">Hardware Type</label>
                <input type="text" name="part_type" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="part_name" class="form-label">Hardware Name</label>
                <input type="text" name="part_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="apraksts" class="form-label">Apraksts</label>
                <input type="text" name="apraksts" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Hardware</button>
        </form>
    </div>
</body>
</html>
