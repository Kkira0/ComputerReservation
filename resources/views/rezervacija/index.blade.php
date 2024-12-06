<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacijas</title>
</head>
<body>
    <h1>List of Rezervacijas</h1>
    <ul>
        @foreach ($rezervacijas as $rezervacija)
            <li>
                Computer ID: {{ $rezervacija->Computer_ID }}<br>
                Pieteikuma ID: {{ $rezervacija->Pieteikuma_id ?? 'N/A' }}<br>
                Start Time: {{ $rezervacija->start_time }}<br>
                End Time: {{ $rezervacija->end_time }}
            </li>
        @endforeach
    </ul>
</body>
</html>
