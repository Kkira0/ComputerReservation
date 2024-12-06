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
    <h1>Software List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Platform</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($softwares as $software)
                <tr>
                    <td>{{ $software->name }}</td>
                    <td>{{ $software->platform }}</td>
                    <td>
                        <!-- Add actions like view/edit if necessary -->
                        <a href="{{ route('softwares.show', $software->Software_ID) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>