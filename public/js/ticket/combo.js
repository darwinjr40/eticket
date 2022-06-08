// alert(pathLocal);
console.log(tickets);
$(function () {
    $('#select-ubicaciones').on('change', onSelectProjectChange);
});

function onSelectProjectChange() {
    var ubicacion_id = $(this).val();
    var xd = '<option value="">Seleccionar Fecha</option>';
    //    alert(ubicacion_id);     
    if (!ubicacion_id) { //tiene un valor
        $('#select-fechas').html(xd);        
    } else {
        $.get(pathLocal + 'fechas-api?filter[id_ubicacion]=' + ubicacion_id, function (data) {
            data = data['data'];
            //  console.log(data);
            for (var i = 0; i < data.length; i++) {
                xd += '<option value="' + data[i].id + '">' + data[i].fechaHora + '</option>'
            }
            $('#select-fechas').html(xd);
        });
    }
}