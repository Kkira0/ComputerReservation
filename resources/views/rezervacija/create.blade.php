<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Create a Reservation</h1>
    
    <form action="{{ route('pieteikums.store') }}" method="POST">
    @csrf
    <div>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" required>
    </div>
    
    <div>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" required>
    </div>
    
    <div>
        <label for="phone">Phone</label>
        <input type="text" name="phone" required>
    </div>
    
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required>
    </div>
    
    <div>
        <label for="start_time">Start Time</label>
        <input type="datetime-local" name="start_time" required>
    </div>
    
    <div>
        <label for="end_time">End Time</label>
        <input type="datetime-local" name="end_time" required>
    </div>
    
    <div>
        <label for="computer_id">Select Computer</label>
        <select name="computer_id" required>
            @foreach ($computers as $computer)
                <option value="{{ $computer->Computer_ID }}">{{ $computer->PC_Name }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit">Submit Reservation</button>
</form>


</body>
</html>