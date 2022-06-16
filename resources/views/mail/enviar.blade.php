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
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nit</th>
                <th>Correo</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$nota->nombre}}</td>
                <td>{{$nota->nit}}</td>
                <td>{{$nota->correo}}</td>
                <td>{{$nota->total}}</td>

            </tr>
        </tbody>
    </table>
    <h1>Tickets Comprados</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Precio</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($ticket as $item)
                <tr>
                    <td>{{$item->fecha}}</td>
                    <td>{{$item->precio}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            @foreach ($ticket as $item)
                @foreach ($item->imagenesqr as $img)
                    <img src="{{$img->path}}" alt="" width="100px" height="100px">
                @endforeach
            @endforeach

        </div>

    </div>
</body>
</html>
