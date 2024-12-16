<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Computer</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Create New Computer</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Form to Add New Computer -->
        <form action="{{ route('admin.computer.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="PC_Name" class="form-label">PC Name</label>
                <input type="text" class="form-control" name="PC_Name" id="PC_Name" required>
            </div>

            <div class="mb-3">
                <label for="Operating_System" class="form-label">Operating System</label>
                <input type="text" class="form-control" name="Operating_System" id="Operating_System" required>
            </div>

            <div class="mb-3">
                <label for="Rinda" class="form-label">Rinda</label>
                <input type="number" class="form-control" name="Rinda" id="Rinda" required>
            </div>

            <div class="mb-3">
                <label for="Colona" class="form-label">Colona</label>
                <input type="number" class="form-control" name="Colona" id="Colona" required>
            </div>

            <!-- Add other fields as needed -->

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Add Computer</button>
            </div>
        </form>

        <!-- Back Button -->
        <div class="mt-3 text-center">
            <a href="{{ route('admin.computer') }}" class="btn btn-secondary">Back to Computers List</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Popper.js (needed for some components like tooltips and popovers) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
