$(document).on('click', '#botonCrear',() =>{
    let rut = $('#rut_Tutor').val();
    let rutValidador = new rutValidador($('#rut').val());

    if (rutValidador.esValido) 
    {
        $('#resultado').text('Rut válido');
        return;
    }

    $('#resultado').text('Rut inválido');

})