<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>List of Rezervacija</h1>
    <ul>
        @foreach ($rezervacija as $item)
            <li>
                Computer ID: {{ $item->Computer_ID }}<br>
                Pieteikuma ID: {{ $item->Pieteikuma_id }}<br>
                Start Time: {{ $item->start_time }}<br>
                End Time: {{ $item->end_time }}
            </li>
        @endforeach
    </ul>
</body>

</html>