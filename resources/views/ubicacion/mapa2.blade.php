
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style> --}}
</head>

<body>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="latitud">Latitud</label>
                <input type="text" id="latitud" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="longitud">longitud</label>
                <input type="text" id="longitud" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="map" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
    
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUexPfr0cJLlaF08zCb1X3aggukbaIAI&callback=initMap">
    </script>
    {{-- <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script> --}}
    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}"></script>
</body>

</html>
