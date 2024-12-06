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
    <h1>PC Parts List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Part Type</th>
                <th>Part Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pc_partss as $part)
                <tr>
                    <td>{{ $part->Part_type }}</td>
                    <td>{{ $part->Part_name }}</td>
                    <td>{{ $part->apraksts }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>