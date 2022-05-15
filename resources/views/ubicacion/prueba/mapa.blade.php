<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maps</title>
    <style>
        #map{
            height:25em;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Marcadores</h1>
    <section id="map"></section>
    <script type="text/javascript" src="{{ asset('js/map/main.js') }}"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUexPfr0cJLlaF08zCb1X3aggukbaIAI">
    </script>
</body>
</html>