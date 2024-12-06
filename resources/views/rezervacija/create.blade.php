<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Create a Reservation</h1>
    <form action="{{ route('rezervacija.store') }}" method="POST">
    @csrf
    <label for="computer_id">Computer ID:</label>
    <input type="number" name="computer_id" required><br>

    <label for="pieteikums_id">Pieteikums ID:</label>
    <input type="number" name="pieteikums_id" required><br>

    <label for="start_time">Start Time:</label>
    <input type="datetime-local" name="start_time" required><br>

    <label for="end_time">End Time:</label>
    <input type="datetime-local" name="end_time" required><br>

    <button type="submit">Create Reservation</button>
</form>



</body>
</html>