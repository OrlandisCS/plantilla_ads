const btnColor = $("#btnSeleccionarColor");
btnColor.on("click", seleccionarColores);
const respuesta = $("#respuesta_c");
function seleccionarColores(e) {
  e.preventDefault();
  const chechk = $("input[name=colores]:checked");
  if (chechk.val() === undefined) {
    respuesta.html("Se require un color").css("color", "red");
    return;
  }
  const datos = {
    cambiarColor: true,
    id: chechk.val(),
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    data: datos,
    dataType: 'json',
    success: function (response) {
      console.log(response);
      switch (response.estado) {
        case "satisfactorio":
          respuesta.html(response.mensaje).css("color", "green");
          setTimeout(() => {
            window.location.reload();
          }, 2000);
          break;

        default:
          break;
      }
    },
  });
}
