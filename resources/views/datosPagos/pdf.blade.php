<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            border: 0;
            padding: 0;
        }
        .page-breack{
            page-break-after: always;
        }
        .img{
            width: 100px;
            height: 100px;
        }
        .titulo{
            border: 2px solid #701375;
            border-radius: 2px;
            
        }
        .titulo h1{
            text-align: center;
        }
        .table{
            width: 100%;
            border: 1px solid #701375;
            text-align: center;
        }

        .table tr, td{
            border: 1px solid #701375;
            height: 60px;

        }
    </style>
</head>
<body>

    <header class="titulo">
        <h1> Entrada de Evento {{$ticket->evento}}</h1>
    </header>
    <div class="page-brack">
        <table class="table">
            <tbody>
                <tr>
                    <td> <img src="https://website-available.com/images/logo/e-ticket-logo.png" width="100px" height="100px" ></td>
                    @if ($tipo==1)
                        <td>
                            <p>
                                <h4>Evento:     {{$ticket->evento}} </h4>
                                <br>
                                <h4>Ubicacion:  {{$descripcion->nombre}}</h4>
                                <br>
                                <h4>Direccion:  {{$descripcion->descripcion}}</h4>
                                <br>
                                <h4>Precio:     {{$descripcion->precio}}</h4>    
                            </p>
                        </td>
                    @endif
                    @if ($tipo==2)
                        <td>
                            <p>
                                <h4>Evento:  {{$ticket->evento}} </h4>
                                <br>
                                <h4>Sector:  {{$descripcion->nombre}}</h4>
                                <br>
                                <h4>Precio:   {{$descripcion->precio}}</h4>    
                            </p>
                        </td>
                    @endif
                    @if ($tipo==3)
                        <td>
                            <p>
                                <h4>Evento:     {{$ticket->evento}} </h4>
                                <br>
                                <h4>Espacio:    {{$descripcion->numero}}</h4>
                                <br>
                                <h4>Precio:     {{$descripcion->precio}}</h4>    
                                <br>
                                <h4>Referencia: {{$descripcion->descripcion}}</h4>
                            </p>
                        </td>
                    @endif

                    <td>
                        @foreach ($ticket->imagenesqr as $img)
                            <img src="{{$img->path}}" width="100px" height="100px">
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>