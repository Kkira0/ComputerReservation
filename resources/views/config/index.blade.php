<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Computers</title>
</head>
<body>
<h1>List of Config</h1>
<ul>
    @foreach ($config as $item)
        <li>
            Platform: {{ $item->Platform ?? 'N/A' }} <br>
            userName: {{ $item->userName ?? 'N/A' }} <br>
            userPassword: {{ $item->userPassword ?? 'N/A' }} <br>
            extra_config: {{ $item->extra_config ?? 'N/A' }} <br>
        </li>
    @endforeach
</ul>
</body>
</html>

