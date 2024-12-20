<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Computers Config</title>
</head>
<style>
        table {
            border: 1px solid black;  
            border-collapse: collapse;  
        }
        th, td {
            padding: 8px;  
            text-align: left; 
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

