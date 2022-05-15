// alert('nise xd12');
 formulario = document.getElementById('frmEventos');
 inputs = document.querySelectorAll('#frmEventos input');
// console.log(inputs);
 


inputs.forEach((input)=>{
    input.addEventListener('keyup', validarFormulario);//comprobacion cuando soltamos una tecla
    input.addEventListener('blur', validarFormulario); //comprobacion cuando hacemos click 

});

formulario.addEventListener('submit', (e)=>{
    if (campos.titulo ) {
        formulario.onsubmit = true;
    } else {
        e.preventDefault();
        document.getElementById('mensajeEvento').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
            document.getElementById('mensajeEvento').classList.remove('formulario__mensaje-activo');            
        }, 5000);
    }
    
});


