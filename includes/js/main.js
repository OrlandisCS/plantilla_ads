const configuraciones = $("#configuraciones");

configuraciones.click(configurar);
const spinner = $("#spinner");

function configurar() {
    $("#contenedor-config").css("right", "0");
    $("#configuraciones").fadeOut('slow');
    $("#cerrar_menu").fadeIn('slow');
    $("#cerrar_menu").css("right", "150px");
}
const cerrar_menu = $("#cerrar_menu");
cerrar_menu.click(cerrar_menu_f);
const cerrar_icono = $("#cerrar_icono");
function cerrar_menu_f() {
  $("#contenedor-config").css("right", "-150px");
  $("#configuraciones").fadeIn('slow');
  $("#cerrar_menu").fadeOut('slow');

}
$(document).on("scroll", function () {
    const scroll = $(document).scrollTop();
    if (scroll >= 810) {
        $('#redes').css("left", "0");
        $('.subir_arriba').css("bottom", "50px");
    } else {
        $('#redes').css("left", "-150px");
        $('.subir_arriba').css("bottom", "-50px");
    };
});

$('#subir_arriba').on('click', ()=>{
    $(document).scrollTop(0);
})

const nombre = $('#nombre');
const numero = $('#numero');
const error = $('#error');
const btnEnviar = $('#btn-enviar');

btnEnviar.on('click', ()=>{
    if(nombre.val() === ''|| numero.val() === ''){
        nombre.addClass('errorForm')
        numero.addClass('errorForm')
        error.html('Por favor rellene todos los campos*').css('color', 'red');
        return;
    }
    error.html('')
})
