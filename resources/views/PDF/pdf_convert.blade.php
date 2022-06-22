<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Index PDF</title>
</head>

<body>

    <h1 class="text-center mt-5">Lista Usuarios</h1>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Nick</th>
                <th>Email</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->subname }}</td>
                    <td>{{ $user->nick }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img height="100px" width="150px" src="{{ public_path($user->image) }}" alt="">
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
