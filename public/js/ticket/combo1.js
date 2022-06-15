// alert(pathLocal);

// var inputCantidad = '<div id="input-cantidad" class="derechaCompra">'+
//                     '<div class="form-group input-group">'+
//                     '<span class="input-group-text">'+
//                     '    <i class="fa fa-arrow-up"> cantidad</i>'+
//                     '</span>'+
//                     '<input type="number" value="1" name="cantidad" class="  form-control" min="1" max="50">'+
//                     '</div>'+
//                     '</div>';
// document.body.replaceChild(inputCantidad, document.getElementById('input-cantidad'));
var obj = new Object();

$(function () {
    $('#select-ubicaciones').on('change', onSelectProjectChange);
});

function onSelectProjectChange() {
    var ubicacion_id = $(this).val();
    let fechas = '<option value="">Seleccionar Fecha</option>';
    let sectores = '<option value="">Seleccionar Sector</option>';
    //    alert(ubicacion_id);     
    if (!ubicacion_id) { //tiene un valor
        $('#select-fechas').html(fechas);        
    } else {
        // cargar ubicaciones para dibujar el Mapa
        let path_ubicaciones = pathLocal + 'ubicaciones?filter[id]=' + ubicacion_id;
        $.get(path_ubicaciones, function (data) {
            data = data['data'];
            setMap(Number(data[0]['latitud']), Number(data[0]['longitud']));
        });        
        // cargar fechas
        let path_fechas = pathLocal + 'fechas-api?filter[id_ubicacion]=' + ubicacion_id;
        $.get(path_fechas, function (data) {
            data = data['data'];
            for (let i = 0; i < data.length; i++) {
                fechas += '<option value="' + data[i].id + '">' + data[i].fechaHora + '</option>'
            }
            $('#select-fechas').html(fechas);
        });
        // cargar Sectores
        let path_sectores = pathLocal + 'sectores-api?filter[id_ubicacion]=' + ubicacion_id;
        $.get(path_sectores, function (data) {
            data = data['data'];
            document.getElementById('id-espacios').setAttribute("hidden", "");
            document.getElementById('id-cantidad').setAttribute("hidden", "");            
            $('#select-espacios').html('<option value="">Seleccionar Espacio</option>');
            if (data.length == 0) {                
                document.getElementById('id-cantidad').removeAttribute("hidden");
                document.getElementById('id-sectores').setAttribute("hidden", ""); 
                document.getElementById('select-sectores').removeAttribute("required");                                 
            } else {
                document.getElementById('id-sectores').removeAttribute("hidden");
                document.getElementById('select-sectores').setAttribute("required", ""); 

                for (let i = 0; i < data.length; i++) {
                    sectores += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>'
                }
                $('#select-sectores').html(sectores);
            }
        });    
    }
}



$(function () {
    $('#select-sectores').on('change', SelectSector);
});

function SelectSector() {
    var sector_id = $(this).val();
    let espacios ;//= '<option value="">Seleccionar Espacio</option>';
    let id_select = '#select-espacios';
    // console.log('nise');
    // console.log(sector_id);
    //    alert(sector_id);     
    if (!sector_id) { //tiene un valor
        $(id_select).html(espacios);       
    } else {
          // cargar espacios
        let path_espacios = pathLocal + 'espacios-api?filter[id_sector]=' + sector_id;
        $.get(path_espacios, function (data) {
            data = data['data'];
            if (data.length == 0) { //no existe espacios
                document.getElementById('id-cantidad').removeAttribute("hidden");
                document.getElementById('id-espacios').setAttribute("hidden", "");
                document.getElementById('select-espacios').removeAttribute("required");
                console.log('entramos');
            } else {
                document.getElementById('id-cantidad').setAttribute("hidden", "");
                document.getElementById('id-espacios').removeAttribute("hidden");  
                document.getElementById('select-espacios').setAttribute("required", "");

                for (let i = 0; i < data.length; i++) {
                    espacios += '<option value="' + data[i].id + '">' + data[i].descripcion + ':  '+ data[i].numero+ '</option>'
                }
                $(id_select).html(espacios);
            }
        });       

    }
}

// function agregar() {
//     let ubicaciones =  document.getElementById('select-ubicaciones');
//     let fechas =  document.getElementById('select-fechas');
//     let sectores =  document.getElementById('select-sectores');
//     let espacios =  document.getElementById('select-espacios');
//     let cantidad =  document.getElementById('select-cantidad');
    
//     obj.ubicaciones = ubicaciones.options[ubicaciones.selectedIndex].text;
//     obj.fechas = fechas.options[fechas.selectedIndex].text;
//     obj.sectores = sectores.options[sectores.selectedIndex].text;
//     // obj.espacios = espacios.options[espacios.selectedIndex].text;
//     obj.cantidad = cantidad.value;
//     console.log(espacios.selectedOptions[0].text);
// }

