<?php
require_once '../conexion.php';
if (isset($_POST['cambiarColor'])) {
    $id  = $_POST['id'];
    $sql = mysqli_query($conexion, "UPDATE `colores` SET `estado`=0");
    if ($sql) {
        $update = mysqli_query($conexion, "UPDATE `colores` SET `estado`=1 WHERE id='$id'");
        if ($update) {
            $mensaje = [
                'estado' => 'satisfactorio',
                'mensaje' => 'Colores seleccionados correctamente',
            ];
        }
        echo json_encode($mensaje);
    }
}


if (isset($_POST['id_activo'])) {
    $id = $_POST['id_activo'];
    $sql = mysqli_query($conexion, "UPDATE `header` SET `estado`=0");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'estado desactivado'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['id_inactivo'])) {
    $id = $_POST['id_inactivo'];
    $q = mysqli_query($conexion, "UPDATE `header` SET `estado`=0");
    if ($q) {
        $sql = mysqli_query($conexion, "UPDATE `header` SET `estado`=1 WHERE id='$id'");
        if ($sql) {
            $mensaje = [
                'mensaje' => 'estado activado'
            ];
            echo json_encode($mensaje);
        }
    }
}

if (isset($_POST['consejo_activo'])) {
    $id = $_POST['consejo_activo'];
    $sql = mysqli_query($conexion, "UPDATE `consejos` SET `estado`=1 WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'estado desactivado'
        ];
        echo json_encode($mensaje);
    }
}

if (isset($_POST['consejo_inactivo'])) {
    $id = $_POST['consejo_inactivo'];
    $sql = mysqli_query($conexion, "UPDATE `consejos` SET `estado`= 0 WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'estado activado'
        ];
        echo json_encode($mensaje);
    }
}


if (isset($_POST['ventajas_activo'])) {
    $id = $_POST['ventajas_activo'];
    $sql = mysqli_query($conexion, "UPDATE `ventajas` SET `estado`=1 WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'estado desactivado'
        ];
        echo json_encode($mensaje);
    }
}

if (isset($_POST['ventajas_inactivo'])) {
    $id = $_POST['ventajas_inactivo'];
    $sql = mysqli_query($conexion, "UPDATE `ventajas` SET `estado`= 0 WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'estado activado'
        ];
        echo json_encode($mensaje);
    }
}

if (isset($_POST['testimonios_activo'])) {
    $id = $_POST['testimonios_activo'];
    $sql = mysqli_query($conexion, "UPDATE `testimonios` SET `estado`=1 WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'estado desactivado'
        ];
        echo json_encode($mensaje);
    }
}

if (isset($_POST['testimonios_inactivo'])) {
    $id = $_POST['testimonios_inactivo'];
    $sql = mysqli_query($conexion, "UPDATE `testimonios` SET `estado`= 0 WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'estado activado'
        ];
        echo json_encode($mensaje);
    }
}




if (isset($_POST['footer_inactivo'])) {
    $id = $_POST['footer_inactivo'];
    $sql = mysqli_query($conexion, "UPDATE `footer` SET `estado`=0");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'estado desactivado'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['footer_activo'])) {
    $id = $_POST['footer_activo'];
    $q = mysqli_query($conexion, "UPDATE `footer` SET `estado`=0");
    if ($q) {
        $sql = mysqli_query($conexion, "UPDATE `footer` SET `estado`=1 WHERE id='$id'");
        if ($sql) {
            $mensaje = [
                'mensaje' => 'estado activado'
            ];
            echo json_encode($mensaje);
        }
    }
}

if (isset($_POST['barra_header'])) {
    $barra = $_POST['barra_header'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];
    $sql = mysqli_query($conexion, "INSERT INTO `header`(`barra_superior`, `titulo`, `descripcion`, `foto`) 
                    VALUES ('$barra', '$titulo','$descripcion','$foto')");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['formularioConsejos'])) {
    $titulo = $_POST['formularioConsejos'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];
    $sql = mysqli_query($conexion, "INSERT INTO `consejos`(`titulo`, `descripcion`, `foto`) 
                    VALUES ('$titulo','$descripcion','$foto')");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['formularioVentaja'])) {
    $titulo = $_POST['formularioVentaja'];

    $sql = mysqli_query($conexion, "INSERT INTO `ventajas`(`titulo`) 
                    VALUES ('$titulo')");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}

if (isset($_POST['formularioTestmonios'])) {
    $titulo = $_POST['formularioTestmonios'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];
    $sql = mysqli_query($conexion, "INSERT INTO `testimonios`(`nombre`, `testimonio`, `foto`) 
                    VALUES ('$titulo','$descripcion','$foto')");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['formularioFooter'])) {
    $titulo = $_POST['formularioFooter'];
    $fecha = date('D/M/Y');
    $sql = mysqli_query($conexion, "INSERT INTO `footer`(`foto`,`fecha`) 
                    VALUES ('$titulo', '$fecha')");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}


if (isset($_POST['editarHeader'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM header WHERE id='$id'");
    if ($sql) {
        $array = mysqli_fetch_array($sql);
        $mensaje = [
            'id' => $array['id'],
            'barra' => $array['barra_superior'],
            'titulo' => $array['titulo'],
            'descripcion' => $array['descripcion'],
            'foto' => $array['foto'],
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['editar_barra_header'])) {
    $barra = $_POST['editar_barra_header'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];
    $id = $_POST['hiddenEditarHeader'];
    $sql = mysqli_query($conexion, "UPDATE `header` SET `barra_superior`='$barra',`titulo`='$titulo',`descripcion`='$descripcion',`foto`='$foto' WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['eliminarHeader'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "DELETE FROM header WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['eliminarConsejos'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "DELETE FROM consejos WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['eliminarVentaja'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "DELETE FROM ventajas WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['eliminarTestimonio'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "DELETE FROM testimonios WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['eliminarFotoFooter'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "DELETE FROM footer WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}



if (isset($_POST['editarConsejosConsulta'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM consejos WHERE id='$id'");
    if ($sql) {
        $array = mysqli_fetch_array($sql);
        $mensaje = [
            'id' => $array['id'],
            'titulo' => $array['titulo'],
            'descripcion' => $array['descripcion'],
            'foto' => $array['foto'],
        ];
        echo json_encode($mensaje);
    }
}
if (isset($_POST['editar_consejo_response'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];
    $id = $_POST['editar_consejo_response'];
    $sql = mysqli_query($conexion, "UPDATE `consejos` SET `titulo`='$titulo',`descripcion`='$descripcion',`foto`='$foto' WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}


if (isset($_POST['editarVentajaConsulta'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM ventajas WHERE id='$id'");
    if ($sql) {
        $array = mysqli_fetch_array($sql);
        $mensaje = [
            'id' => $array['id'],
            'titulo' => $array['titulo'],
        ];
        echo json_encode($mensaje);
    }
}


if (isset($_POST['editar_ventaja_response'])) {
    $titulo = $_POST['titulo'];
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "UPDATE `ventajas` SET`titulo`='$titulo' WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}

if (isset($_POST['editarTestimonioConsulta'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM testimonios WHERE id='$id'");
    if ($sql) {
        $array = mysqli_fetch_array($sql);
        $mensaje = [
            'id' => $array['id'],
            'nombre' => $array['nombre'],
            'testimonio' => $array['testimonio'],
            'foto' => $array['foto'],
        ];
        echo json_encode($mensaje);
    }
}

if (isset($_POST['nombreEditarTestimonio'])) {
    $titulo = $_POST['nombreEditarTestimonio'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];
    $id = $_POST['EditartestimonioHidden'];
    $sql = mysqli_query($conexion, "UPDATE `testimonios` SET `nombre`='$titulo',`testimonio`='$descripcion',`foto`='$foto' WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}


if (isset($_POST['editarFooterConsulta'])) {
    $id = $_POST['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM footer WHERE id='$id'");
    if ($sql) {
        $array = mysqli_fetch_array($sql);
        $mensaje = [
            'id' => $array['id'],
            'foto' => $array['foto'],
        ];
        echo json_encode($mensaje);
    }
}

if (isset($_POST['fotoEditarFooterHidden'])) {
    $foto = $_POST['foto'];
    $id = $_POST['fotoEditarFooterHidden'];
    $sql = mysqli_query($conexion, "UPDATE `footer` SET `foto`='$foto' WHERE id='$id'");
    if ($sql) {
        $mensaje = [
            'mensaje' => 'Contenido añadido correctamente'
        ];
        echo json_encode($mensaje);
    }
}
