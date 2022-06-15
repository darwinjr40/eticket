<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<body>
    <h1>Correo de prueba</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>email</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($details as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            @for ($i = 0; $i <5; $i++)
                
                <img src="https://es.qr-code-generator.com/wp-content/themes/qr/new_structure/markets/core_market/generator/dist/generator/assets/images/websiteQRCode_noFrame.png">
            @endfor
        </div>

    </div>
</body>
</html>