

const mapDiv = document.getElementById("map");
const cor = { lat: -17.783290, lng: -63.182073}
let map;
//------------------------------------------------------------------------------
function initMap() {
    var latitud = -17.783290;
    var longitud = -63.182073;
    coordenadas = {
        lat: latitud,
        lng: longitud
    }
    generarMapa(coordenadas);
    cargarInputs();
}
//------------------------------------------------------------------------------
function generarMapa(coordenadas) {
    var mapa = new google.maps.Map(mapDiv, {
        center: coordenadas,
        zoom: 12,
    });

    marcador = new google.maps.Marker({
        map: mapa,
        draggable: true,
        position: coordenadas
    })    
}
//------------------------------------------------------------------------------
function cargarInputs(){
    marcador.addListener('dragend', function (event) {
        document.getElementById("latitud").value = this.getPosition().lat();
        document.getElementById("longitud").value = this.getPosition().lng();
    })
}