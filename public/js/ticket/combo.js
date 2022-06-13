// alert(pathLocal);
// console.log(tickets);


$(function () {
    $('#select-ubicaciones').on('change', onSelectProjectChange);
});

function onSelectProjectChange() {
    var ubicacion_id = $(this).val();
    document.getElementById("ubicacion").value = ubicacion_id;
    var xd = '<option value="">Seleccionar Fecha</option>';
    //    alert(ubicacion_id);     
    if (!ubicacion_id) { //tiene un valor
        $('#select-fechas').html(xd);        
    } else {
        // cargar ubicaciones
        let path_ubicaciones = pathLocal + 'ubicaciones?filter[id]=' + ubicacion_id;
        $.get(path_ubicaciones, function (data) {
            data = data['data'];
            // console.log(data[0]['latitud']);
            setMap(Number(data[0]['latitud']), Number(data[0]['longitud']));
        });
        // cargar fechas
        let path_fechas = pathLocal + 'fechas-api?filter[id_ubicacion]=' + ubicacion_id;
        $.get(path_fechas, function (data) {
            data = data['data'];
            //  console.log(data);
            for (var i = 0; i < data.length; i++) {
                xd += '<option value="' + data[i].id + '">' + data[i].fechaHora + '</option>'
            }
            $('#select-fechas').html(xd);
        });
    }
}