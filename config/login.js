const usuario = $("#email-address");
const pdw = $("#password");
const error = $("#error");
const btnEntrar = $("#btnEntrar");
btnEntrar.on("click", validacion);

function validacion() {
  if (usuario.val() === "" || pdw.val() === "") {
    error.html("Por Rellene todos los campos*");
    return;
  }

  const datos = {
    iniciarSesion: true,
    usuario: usuario.val(),
    pdw: pdw.val(),
  };
  console.log(datos);
  $.ajax({
    type: "POST",
    url: "login.php",
    dataType: "json",
    data: datos,
    success: function (response) {
        console.log(response)
      switch (response.mensaje) {
        case "Inicio no correcto":
          error.html("Usuario y/o contraseña incorrectos*");
          break;
        case "Inicio correcto":
          error
            .html("Inicio de sesion Correcto")
            .css("color", "green");
          setTimeout(() => {
            window.location.href = "dashboard.php";
          },1500);
        default:
          error.html("Usuario correcto");
          break;
      }
    },
  });
}
