<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print PDF</title>
</head>
<body>
    <h1> Test Export PDF </h1>
    <table class="center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Seq</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item -> id }}</td>
                    <td>{{ $item -> name }}</td>
                    <td>{{ $item -> description }}</td>
                    <td>{{ $item -> seq }}</td>
                    <td>{{ $item -> status }}</td>
                    <td>{{ $item -> created_at }}</td>
                    <td>{{ $item -> updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
        table, th, td{
            border: 1px solid black;
        }

        .center{
            margin-left: auto;
            margin-right: auto;
        }

        h1{
            text-align: center;
        }
    </style>
</body>
</html>