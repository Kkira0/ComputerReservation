<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Computer</h2>

      <a href="{{ route('admin.computer') }}" class="btn btn-warning btn-sm">Back</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('computer.update', $computer->Computer_ID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="PC_Name">PC Name</label>
            <input type="text" name="PC_Name" id="PC_Name" class="form-control" value="{{ old('PC_Name', $computer->PC_Name) }}" required>
        </div>

        <div class="form-group">
            <label for="Operating_System">Operating System</label>
            <input type="text" name="Operating_System" id="Operating_System" class="form-control" value="{{ old('Operating_System', $computer->Operating_System) }}" required>
        </div>

        <div class="form-group">
            <label for="Rinda">Rinda</label>
            <input type="number" name="Rinda" id="Rinda" class="form-control" value="{{ old('Rinda', $computer->Rinda) }}" required>
        </div>

        <div class="form-group">
            <label for="Colona">Colona</label>
            <input type="number" name="Colona" id="Colona" class="form-control" value="{{ old('Colona', $computer->Colona) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Computer</button>
    </form>
</div>
@endsection


</body>
</html>