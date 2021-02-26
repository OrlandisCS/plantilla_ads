function activar(estado) {
  const enviar = {
    id_activo: estado,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example").load(" #example");
    },
  });
}
function desactivar(estado) {
  const enviar = {
    id_inactivo: estado,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example").load(" #example");
    },
  });
}

function consejo(consejo) {
  const enviar = {
    consejo_inactivo: consejo,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example2").load(" #example2");
    },
  });
}
function desactivar_consejo(consejo) {
  const enviar = {
    consejo_activo: consejo,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example2").load(" #example2");
    },
  });
}

function ventajas(ventajas) {
  const enviar = {
    ventajas_inactivo: ventajas,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example1").load(" #example1");
    },
  });
}
function desactivar_ventajas(ventajas) {
  const enviar = {
    ventajas_activo: ventajas,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example1").load(" #example1");
    },
  });
}

function testimonios(testimonios) {
  const enviar = {
    testimonios_inactivo: testimonios,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example4").load(" #example4");
    },
  });
}
function desactivar_testimonios(testimonios) {
  const enviar = {
    testimonios_activo: testimonios,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example4").load(" #example4");
    },
  });
}

function footer(footer) {
  const enviar = {
    footer_inactivo: footer,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example5").load(" #example5");
    },
  });
}
function desactivar_footer(footer) {
  const enviar = {
    footer_activo: footer,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: enviar,
    success: function (response) {
      $("#example5").load(" #example5");
    },
  });
}

$("#btnGuardarHeader").on("click", () => {
  let formulario = $("#formularioHeader");
  const barra = $("#form1Example");
  const titulo = $("#form1Example1");
  const des = $("#form1Example2");
  const foto = $("#form1Example3");
  if (
    barra.val() === "" ||
    titulo.val() === "" ||
    des.val() === "" ||
    foto.val() === ""
  ) {
    $("#error").html("Todos los campos son requeridos").css("color", "red");
    return;
  }
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: formulario.serialize(),
    success: function (response) {
      if (response) {
        formulario[0].reset();
        $("#example").load(" #example");
        $("#error").html("Se añadio correctamente").css("color", "green");
      }
    },
  });
});

$("#btnGuardarConsejos").on("click", () => {
  let formulario = $("#formularioConsejos");
  const titulo = $("#consejo");
  const des = $("#consejo1");
  const foto = $("#consejo2");
  if (titulo.val() === "" || des.val() === "" || foto.val() === "") {
    $("#error1").html("Todos los campos son requeridos").css("color", "red");
    return;
  }
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: formulario.serialize(),
    success: function (response) {
      if (response) {
        formulario[0].reset();
        $("#example2").load(" #example2");
        $("#error1").html("Se añadio correctamente").css("color", "green");
      }
    },
  });
});

$("#btnGuardarVentaja").on("click", () => {
  let formulario = $("#formularioVentaja");
  const titulo = $("#ventaja");

  if (titulo.val() === "") {
    $("#error2").html("Todos los campos son requeridos").css("color", "red");
    return;
  }
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: formulario.serialize(),
    success: function (response) {
      if (response) {
        formulario[0].reset();
        $("#example1").load(" #example1");
        $("#error2").html("Se añadio correctamente").css("color", "green");
      }
    },
  });
});

$("#btnGuardarTestimonio").on("click", () => {
  let formulario = $("#formularioTestmonios");
  const titulo = $("#testimonio");
  const des = $("#testimonio1");
  const foto = $("#testimonio2");
  if (titulo.val() === "" || des.val() === "" || foto.val() === "") {
    $("#error3").html("Todos los campos son requeridos").css("color", "red");
    return;
  }
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: formulario.serialize(),
    success: function (response) {
      if (response) {
        formulario[0].reset();
        $("#example4").load(" #example4");
        $("#error3").html("Se añadio correctamente").css("color", "green");
      }
    },
  });
});
$("#btnGuardarFooter").on("click", () => {
  let formulario = $("#formularioFooter");
  const titulo = $("#footer");
  if (titulo.val() === "") {
    $("#error4").html("Todos los campos son requeridos").css("color", "red");
    return;
  }
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: formulario.serialize(),
    success: function (response) {
      if (response) {
        formulario[0].reset();
        $("#example5").load(" #example5");
        $("#error4").html("Se añadio correctamente").css("color", "green");
      }
    },
  });
});

function editarHeader(id) {
  const datos = {
    editarHeader: true,
    id: id,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: datos,
    success: function (response) {
      const barra = $("#editarHeader0");
      const titulo = $("#editarHeader1");
      const descripcion = $("#editarHeader2");
      const foto = $("#editarHeader3");
      const hidden = $("#hiddenEditarHeader");
      if (response) {
        barra.val(response.barra);
        titulo.val(response.titulo);
        descripcion.val(response.descripcion);
        foto.val(response.foto);
        hidden.val(response.id);

        $("#btnEditarHeader").on("click", () => {
          let formulario = $("#formulariEditaroHeader");
          if (
            barra.val() === "" ||
            titulo.val() === "" ||
            descripcion.val() === "" ||
            foto.val() === ""
          ) {
            $("#erroredit")
              .html("Todos los campos son requeridos")
              .css("color", "red");
            return;
          }
          $("#erroredit").html("");
          $.ajax({
            type: "POST",
            url: "functions/main.php",
            dataType: "json",
            data: formulario.serialize(),
            success: function (response) {
              if (response) {
                formulario[0].reset();
                $("#example").load(" #example");
                $("#erroredit")
                  .html("Se actualizo correctamente")
                  .css("color", "green");
              }
            },
          });
        });
      }
    },
  });

  return false;
}

function editarConsejos(id) {
  const datos = {
    editarConsejosConsulta: true,
    id: id,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: datos,
    success: function (response) {
      const titulo = $("#editarConsejos1");
      const descripcion = $("#editarConsejos2");
      const foto = $("#editarConsejos3");
      const hidden = $("#hiddenEditarConsejos");
      if (response) {
        titulo.val(response.titulo);
        descripcion.val(response.descripcion);
        foto.val(response.foto);
        hidden.val(response.id);
        $("#btnEditarConsejos").on("click", () => {
          let formulario = $("#formularioEditaroConsejos");
          if (
            titulo.val() === "" ||
            descripcion.val() === "" ||
            foto.val() === ""
          ) {
            $("#erroredit1")
              .html("Todos los campos son requeridos")
              .css("color", "red");
            return;
          }
          $("#erroredit1").html("");
          $.ajax({
            type: "POST",
            url: "functions/main.php",
            dataType: "json",
            data: formulario.serialize(),
            success: function (response) {
              if (response) {
                formulario[0].reset();
                $("#example2").load(" #example2");
                $("#erroredit1")
                  .html("Se actualizo correctamente")
                  .css("color", "green");
              }
            },
          });
        });
      }
    },
  });

  return false;
}

function editarVentaja(id) {
  const datos = {
    editarVentajaConsulta: true,
    id: id,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: datos,
    success: function (response) {
      const titulo = $("#editarVentaja");
      const hidden = $("#hiddenEditarVentajas");
      if (response) {
        titulo.val(response.titulo);
        hidden.val(response.id);
        $("#btnEditarVentaja").on("click", () => {
          if (titulo.val() === "") {
            $("#errorventaja")
              .html("Todos los campos son requeridos")
              .css("color", "red");
            return;
          }
          const formulario = $("#formularioEditarVentaja");
          const datos = {
            editar_ventaja_response: true,
            titulo: titulo.val(),
            id: hidden.val(),
          };
          console.log(datos);
          $("#errorventaja").html("");
          $.ajax({
            type: "POST",
            url: "functions/main.php",
            dataType: "json",
            data: datos,
            success: function (response) {
              console.log(response);
              if (response) {
                formulario[0].reset();
                $("#example1").load(" #example1");
                $("#errorventaja")
                  .html("Se actualizo correctamente")
                  .css("color", "green");
              }
            },
          });
        });
      }
    },
  });

  return false;
}

function editarTestimonio(id) {
  const datos = {
    editarTestimonioConsulta: true,
    id: id,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: datos,
    success: function (response) {
      const titulo = $("#Editartestimonio");
      const descripcion = $("#Editartestimonio1");
      const foto = $("#Editartestimonio2");
      const hidden = $("#EditartestimonioHidden");
      if (response) {
        titulo.val(response.nombre);
        descripcion.val(response.testimonio);
        foto.val(response.foto);
        hidden.val(response.id);

        $("#btnEditarTestimonio").on("click", () => {
          let formulario = $("#formularioEditarTestmonios");
          if (
            titulo.val() === "" ||
            descripcion.val() === "" ||
            foto.val() === ""
          ) {
            $("#errortestmonios")
              .html("Todos los campos son requeridos")
              .css("color", "red");
            return;
          }
          $("#errortestmonios").html("");
          $.ajax({
            type: "POST",
            url: "functions/main.php",
            dataType: "json",
            data: formulario.serialize(),
            success: function (response) {
              if (response) {
                formulario[0].reset();
                $("#example4").load(" #example4");
                $("#errortestmonios")
                  .html("Se actualizo correctamente")
                  .css("color", "green");
              }
            },
          });
        });
      }
    },
  });

  return false;
}

function eliminarHeader(id) {
  console.log(id);
  Swal.fire({
    title: "Está seguro?",
    text: "Una vez eliminado no se podrá revertir el cambio",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const datos = {
        eliminarHeader: true,
        id: id,
      };
      $.ajax({
        type: "POST",
        url: "functions/main.php",
        dataType: "json",
        data: datos,
        success: function (response) {
          if (response) {
            Swal.fire("Eliminado!", "Se eliminó el contenido.", "success");
            $("#example").load(" #example");
          }
        },
      });
    }
  });
}

function eliminarConsejos(id) {
  console.log(id);
  Swal.fire({
    title: "Está seguro?",
    text: "Una vez eliminado no se podrá revertir el cambio",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const datos = {
        eliminarConsejos: true,
        id: id,
      };
      $.ajax({
        type: "POST",
        url: "functions/main.php",
        dataType: "json",
        data: datos,
        success: function (response) {
          if (response) {
            Swal.fire("Eliminado!", "Se eliminó el contenido.", "success");
            $("#example2").load(" #example2");
          }
        },
      });
    }
  });
}

function eliminarVentaja(id) {
  console.log(id);
  Swal.fire({
    title: "Está seguro?",
    text: "Una vez eliminado no se podrá revertir el cambio",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const datos = {
        eliminarVentaja: true,
        id: id,
      };
      $.ajax({
        type: "POST",
        url: "functions/main.php",
        dataType: "json",
        data: datos,
        success: function (response) {
          if (response) {
            Swal.fire("Eliminado!", "Se eliminó el contenido.", "success");
            $("#example1").load(" #example1");
          }
        },
      });
    }
  });
}
function eliminarTestimonio(id) {
  console.log(id);
  Swal.fire({
    title: "Está seguro?",
    text: "Una vez eliminado no se podrá revertir el cambio",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const datos = {
        eliminarTestimonio: true,
        id: id,
      };
      $.ajax({
        type: "POST",
        url: "functions/main.php",
        dataType: "json",
        data: datos,
        success: function (response) {
          if (response) {
            Swal.fire("Eliminado!", "Se eliminó el contenido.", "success");
            $("#example4").load(" #example4");
          }
        },
      });
    }
  });
}

function eliminarFoto(id) {
  console.log(id);
  Swal.fire({
    title: "Está seguro?",
    text: "Una vez eliminado no se podrá revertir el cambio",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const datos = {
        eliminarFotoFooter: true,
        id: id,
      };
      $.ajax({
        type: "POST",
        url: "functions/main.php",
        dataType: "json",
        data: datos,
        success: function (response) {
          if (response) {
            Swal.fire("Eliminado!", "Se eliminó el contenido.", "success");
            $("#example5").load(" #example5");
          }
        },
      });
    }
  });
}
function editarFoto(id) {
  const datos = {
    editarFooterConsulta: true,
    id: id,
  };
  $.ajax({
    type: "POST",
    url: "functions/main.php",
    dataType: "json",
    data: datos,
    success: function (response) {
      const foto = $("#fotoEditarFooter");
      const hidden = $("#fotoEditarFooterHidden");
      if (response) {
        foto.val(response.foto);
        hidden.val(response.id);

        $("#btnEditarFooter").on("click", () => {
          let formulario = $("#formularioEditarFooter");
          if (foto.val() === "") {
            $("#errorFooter")
              .html("Todos los campos son requeridos")
              .css("color", "red");
            return;
          }
          $("#errorFooter").html("");
          $.ajax({
            type: "POST",
            url: "functions/main.php",
            dataType: "json",
            data: formulario.serialize(),
            success: function (response) {
              if (response) {
                formulario[0].reset();
                $("#example5").load(" #example5");
                $("#errorFooter")
                  .html("Se actualizo correctamente")
                  .css("color", "green");
              }
            },
          });
        });
      }
    },
  });
  return false;
}
