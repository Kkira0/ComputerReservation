<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Computers Config</title>
</head>
<style>
        table {
            border: 1px solid black;  /* Adds a black border around the table */
            border-collapse: collapse;  /* Optional: Makes the table borders collapse into a single border */
        }
        th, td {
            padding: 8px;  /* Optional: Adds padding inside table cells */
            text-align: left;  /* Optional: Aligns text to the left */
        }
    </style>
</head>
<body>
    <h1>List of Computers Config</h1>
    <table>
        <thead>
            <tr>
                <th>Computer ID</th>
                <th>Config ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($computer_configs as $item)
                <tr>
                    <td>{{ $item->Computer_ID }}</td>
                    <td>{{ $item->Config_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

