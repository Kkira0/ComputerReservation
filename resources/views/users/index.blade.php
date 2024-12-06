<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<tbody>
    @foreach ($pendingPieteikumi as $pieteikums)
    <tr>
        <td>
            @if ($pieteikums->user)
                {{ $pieteikums->user->first_name }} {{ $pieteikums->user->last_name }}
            @else
                N/A
            @endif
        </td>
        <td>{{ $pieteikums->computer->PC_Name }}</td>
        <td>{{ $pieteikums->start_time }}</td>
        <td>{{ $pieteikums->end_time }}</td>
        <td>
            <form action="{{ route('admin.pieteikums.approve', $pieteikums->pieteikuma_id) }}" method="POST" style="display: inline-block;">
                @csrf
                <button class="btn btn-success btn-sm">Approve</button>
            </form>
            <form action="{{ route('admin.pieteikums.deny', $pieteikums->pieteikuma_id) }}" method="POST" style="display: inline-block;">
                @csrf
                <button class="btn btn-danger btn-sm">Deny</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

</body>
</html>