<?php
session_start();
if (!isset($_SESSION['usuario_logueado'])) {
   header('location: index.php');
    
}
require_once 'conexion.php';
$header = mysqli_query($conexion, "SELECT * FROM `header` ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADS Plantilla Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jq-3.3.1/dt-1.10.23/datatables.min.css" />
    <script src="https://kit.fontawesome.com/92d62fee25.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <div class="container-fluid mt-2">
            <h2 class="text-center">Dashboard Publicidad</h2>
            <!-- eleccion de colore -->
            <div class=" container">
            <a href="salir.php" class="text-center">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-uppercase">Definir los colores</h5>
                    </div>
                    <div class="card-body">
                        <span id="respuesta_c"></span>
                        <div class="row" id="restart">
                            <?php
                            $colores = mysqli_query($conexion, "SELECT * FROM `colores` ORDER BY id DESC ");
                            while ($contenido_colores = mysqli_fetch_array($colores)) :
                            ?>
                                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                    <div class="d-flex align-items-center">
                                        <input required type="radio" class="mr-2" value="<?php echo $contenido_colores['id'] ?>" name="colores" id="<?php echo $contenido_colores['id'] ?>">
                                        <label for="<?php echo $contenido_colores['id'] ?>" style="margin:0 5px;width: 20px;height:20px;<?php echo $contenido_colores['fondo'] . ' '; ?>"></label> '
                                        <label for="<?php echo $contenido_colores['id'] ?>" style="margin:0 5px;width: 20px;height:20px;background:<?php echo $contenido_colores['barra'] . ' '; ?>"></label> '
                                        <label for="<?php echo $contenido_colores['id'] ?>" style="margin:0 5px;width: 20px;height:20px;background:<?php echo $contenido_colores['color'] . ' '; ?>"></label>
                                        <?php if ($contenido_colores['estado'] == 1) {
                                            echo '<span class="badge text-white bg-success">Activo</span>';
                                        }  ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" id="btnSeleccionarColor" class="btn btn-primary">Guardar</button>
                    </div>

                </div>
            </div>
            <!-- Parte 1 -->
            <div class="table-responsive">
                <h2 class="text-uppercase tex text-center text-danger mt-2">
                    parte superior de la web
                </h2>
                <table id="example" class="display" style="width:100%">
                    <center>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#header">
                            Nuevo
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="header" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">PARTE SUPERIOR DE LA WEB</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <span id="error"></span>
                                        <form method="POST" id="formularioHeader">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form1Example">Barra Superior</label>
                                                <input type="text" name="barra_header" id="form1Example" class="form-control" placeholder="Barra Superior" />
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form1Example1">Titulo En la foto</label>
                                                <input type="text" name="titulo" id="form1Example1" class="form-control" placeholder="Titulo En la foto" />
                                            </div>

                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form1Example2">Descripción Foto</label>
                                                <input type="text" name="descripcion" id="form1Example2" class="form-control" placeholder="Descripción Foto" />
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form1Example3">Foto</label>
                                                <input type="text" name="foto" id="form1Example3" class="form-control" placeholder="Foto" />
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary" id="btnGuardarHeader">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                    <thead>
                        <tr>
                            <th>Barra Superior</th>
                            <th>Titulo foto</th>
                            <th>Descripción foto</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($contenido_header = mysqli_fetch_array($header)) :
                        ?>
                            <tr>
                                <td><?php echo $contenido_header['barra_superior'] ?></td>
                                <td><?php echo $contenido_header['titulo'] ?></td>
                                <td><?php echo $contenido_header['descripcion'] ?></td>
                                <td><?php echo $contenido_header['foto'] ?></td>
                                <td>
                                    <?php if ($contenido_header['estado'] == 1) {
                                    ?>
                                        <button class="badge badge-success btn" id="estado_activo" onclick="activar(<?php echo $contenido_header['id'] ?>)">Activo</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="badge badge-danger btn" id="estado_inactivo" onclick="desactivar(<?php echo $contenido_header['id'] ?>)">Inactivo</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#editarHeader" onclick="editarHeader(<?php echo $contenido_header['id']; ?>)"><i class="fas fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="eliminarHeader(<?php echo $contenido_header['id']; ?>)"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="editarHeader" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Header WEB</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <span id="erroredit"></span>
                                <form method="POST" id="formulariEditaroHeader">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="editarHeader0">Barra Superior</label>
                                        <input type="text" name="editar_barra_header" id="editarHeader0" class="form-control" placeholder="Barra Superior" />
                                    </div>
                                    <input type="hidden" id="hiddenEditarHeader" name="hiddenEditarHeader">
                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="editarHeader1">Titulo En la foto</label>
                                        <input type="text" name="titulo" id="editarHeader1" class="form-control" placeholder="Titulo En la foto" />
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="editarHeader2">Descripción Foto</label>
                                        <input type="text" name="descripcion" id="editarHeader2" class="form-control" placeholder="Descripción Foto" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="editarHeader3">Foto</label>
                                        <input type="text" name="foto" id="editarHeader3" class="form-control" placeholder="Foto" />
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="btnEditarHeader">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parte 2 -->
            <?php
            $consejos = mysqli_query($conexion, "SELECT * FROM `consejos` ORDER BY id DESC");
            ?>

            <div class="table-responsive">

                <h2 class="text-uppercase text-center  text-danger">
                    parte consejos de la web
                </h2>
                <table id="example2" class="display" style="width:100%">
                    <center>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#consejos">
                            Nuevo
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="consejos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agregar Consejos</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <span id="error1"></span>
                                        <form method="POST" id="formularioConsejos">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="consejo">Titulo</label>
                                                <input type="text" name="formularioConsejos" id="consejo" class="form-control" placeholder="Titulo" />
                                            </div>

                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="consejo1">Descripción</label>
                                                <input type="text" name="descripcion" id="consejo1" class="form-control" placeholder="Descripción " />
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="consejo2">Foto</label>
                                                <input type="text" name="foto" id="consejo2" class="form-control" placeholder="Foto" />
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary" id="btnGuardarConsejos">Guardar</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
            </div>
            </center>

            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>foto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($contenido_consejos = mysqli_fetch_array($consejos)) :
                ?>
                    <tr>
                        <td><?php echo $contenido_consejos['titulo'] ?></td>
                        <td><?php echo substr($contenido_consejos['descripcion'], 0, 50) ?></td>
                        <td><?php echo substr($contenido_consejos['foto'], 0, 50) ?></td>
                        <td>
                            <?php if ($contenido_consejos['estado'] == 1) {
                            ?>
                                <button class="badge badge-success btn" id="estado_activo" onclick="consejo(<?php echo $contenido_consejos['id'] ?>)">Activo</button>
                            <?php
                            } else {
                            ?>
                                <button class="badge badge-danger btn" id="estado_inactivo" onclick="desactivar_consejo(<?php echo $contenido_consejos['id'] ?>)">Inactivo</button>
                            <?php } ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#editarConsejos" onclick="editarConsejos(<?php echo $contenido_consejos['id'] ?>)"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger" onclick="eliminarConsejos(<?php echo $contenido_consejos['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="editarConsejos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Consejos DE LA WEB</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="erroredit1"></span>
                            <form method="POST" id="formularioEditaroConsejos">
                                <input type="hidden" id="hiddenEditarConsejos" name="editar_consejo_response">
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="editarConsejos1">Titulo </label>
                                    <input type="text" name="titulo" id="editarConsejos1" class="form-control" placeholder="Titulo" />
                                </div>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="editarConsejos2">Descripción</label>
                                    <input type="text" name="descripcion" id="editarConsejos2" class="form-control" placeholder="Descripción" />
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="editarConsejos3">Foto</label>
                                    <input type="text" name="foto" id="editarConsejos3" class="form-control" placeholder="Foto" />
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" id="btnEditarConsejos">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Parte 3 -->
        <?php
        $ventajas = mysqli_query($conexion, "SELECT * FROM `ventajas` ORDER BY id DESC");
        ?>

        <div class="table-responsive">

            <h2 class="text-uppercase text-center  text-danger">
                parte Ventajas de la web
            </h2>
            <table id="example1" class="display" style="width:100%">
                <center>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ventajas">
                        Nuevo </button>
                    <!-- Modal -->
                    <div class="modal fade" id="ventajas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Ventajas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span id="error2"></span>
                                    <form method="POST" id="formularioVentaja">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="ventaja">Titulo</label>
                                            <input type="text" name="formularioVentaja" id="ventaja" class="form-control" placeholder="Titulo de la ventaja" />
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" id="btnGuardarVentaja">Guardar</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
        </div>
        </center>

        <thead>
            <tr>
                <th>Titulo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($contenido_ventajas = mysqli_fetch_array($ventajas)) :
            ?>
                <tr>
                    <td><?php echo $contenido_ventajas['titulo'] ?></td>
                    <td>
                        <?php if ($contenido_ventajas['estado'] == 1) {
                        ?>
                            <button class="badge badge-success btn" id="estado_activo" onclick="ventajas(<?php echo $contenido_ventajas['id'] ?>)">Activo</button>
                        <?php
                        } else {
                        ?>
                            <button class="badge badge-danger btn" id="estado_inactivo" onclick="desactivar_ventajas(<?php echo $contenido_ventajas['id'] ?>)">Inactivo</button>
                        <?php } ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#editarVentajas" onclick="editarVentaja(<?php echo $contenido_ventajas['id'] ?>)"><i class="fas fa-pencil-alt"></i></button>
                        <button type="button" class="btn btn-danger" onclick="eliminarVentaja(<?php echo $contenido_ventajas['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="editarVentajas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Ventajas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="errorventaja"></span>
                        <form method="POST" id="formularioEditarVentaja">
                            <div class="form-outline mb-4">
                                <input type="hidden" name="hiddenEditarVentajas" id="hiddenEditarVentajas">
                                <label class="form-label" for="editarVentaja">Titulo</label>
                                <input type="text" name="titulo" id="editarVentaja" class="form-control" placeholder="Titulo de la ventaja" />
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnEditarVentaja">Guardar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <!-- Parte 4 -->
        <?php
        $testimonios = mysqli_query($conexion, "SELECT * FROM `testimonios` ORDER BY id DESC");
        ?>

        <div class="table-responsive">
            <h2 class="text-uppercase text-center  text-danger">
                parte testimoniales de la web
            </h2>
            <table id="example4" class="display" style="width:100%">
                <center>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#testimoniales">
                        Nuevo </button>
                    <!-- Modal -->
                    <div class="modal fade" id="testimoniales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir Testimonios</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span id="error3"></span>
                                    <form method="POST" id="formularioTestmonios">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="testimonio">Nombre</label>
                                            <input type="text" name="formularioTestmonios" id="testimonio" class="form-control" placeholder="Nombre" />
                                        </div>

                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="testimonio1">Testimonio</label>
                                            <input type="text" name="descripcion" id="testimonio1" class="form-control" placeholder="Testimonio " />
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="testimonio2">Foto</label>
                                            <input type="text" name="foto" id="testimonio2" class="form-control" placeholder="Foto" />
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" id="btnGuardarTestimonio">Guardar</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </center>

                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Testimonio</th>
                        <th>Foto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($contenido_testimonios = mysqli_fetch_array($testimonios)) :
                    ?>
                        <tr>
                            <td><?php echo $contenido_testimonios['nombre'] ?></td>
                            <td><?php echo substr($contenido_testimonios['testimonio'], 0, 50)  ?></td>
                            <td><?php echo substr($contenido_testimonios['foto'], 0, 50) ?></td>
                            <td>
                                <?php if ($contenido_testimonios['estado'] == 1) {
                                ?>
                                    <button class="badge badge-success btn" id="estado_activo" onclick="testimonios(<?php echo $contenido_testimonios['id'] ?>)">Activo</button>
                                <?php
                                } else {
                                ?>
                                    <button class="badge badge-danger btn" id="estado_inactivo" onclick="desactivar_testimonios(<?php echo $contenido_testimonios['id'] ?>)">Inactivo</button>
                                <?php } ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#editarTestiminiosModal" onclick="editarTestimonio(<?php echo $contenido_testimonios['id'] ?>)"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger" onclick="eliminarTestimonio(<?php echo $contenido_testimonios['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="editarTestiminiosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Testimonios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="errortestmonios"></span>
                            <form method="POST" id="formularioEditarTestmonios">
                                <div class="form-outline mb-4">
                                    <input type="hidden" name="EditartestimonioHidden" id="EditartestimonioHidden">
                                    <label class="form-label" for="Editartestimonio">Nombre</label>
                                    <input type="text" name="nombreEditarTestimonio" id="Editartestimonio" class="form-control" placeholder="Nombre" />
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="Editartestimonio1">Testimonio</label>
                                    <input type="text" name="descripcion" id="Editartestimonio1" class="form-control" placeholder="EditarTestimonio " />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="Editartestimonio2">Foto</label>
                                    <input type="text" name="foto" id="Editartestimonio2" class="form-control" placeholder="Foto" />
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" id="btnEditarTestimonio">Guardar</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Parte 5 -->
        <?php
        $footer = mysqli_query($conexion, "SELECT * FROM `footer` ORDER BY id DESC");
        ?>

        <div class="table-responsive">

            <h2 class="text-uppercase text-center  text-danger">
                parte Foto inferior de la web
            </h2>
            <table id="example5" class="display" style="width:100%">
                <center>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#foto_header">
                        Nuevo </button>
                    <!-- Modal -->
                    <div class="modal fade" id="foto_header" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Foto inferior</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span id="error4"></span>
                                    <form method="POST" id="formularioFooter">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="footer">Foto</label>
                                            <input type="text" name="formularioFooter" id="footer" class="form-control" placeholder="Foto" />
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" id="btnGuardarFooter">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>

                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($contenido_footer = mysqli_fetch_array($footer)) :
                    ?>
                        <tr>
                            <td><?php echo substr($contenido_footer['foto'], 0, 50) ?></td>
                            <td><?php echo substr($contenido_footer['fecha'], 0, 50) ?></td>
                            <td>

                                <?php if ($contenido_footer['estado'] == 1) {
                                ?>
                                    <button class="badge badge-success btn" id="estado_activo" onclick="footer(<?php echo $contenido_footer['id'] ?>)">Activo</button>
                                <?php
                                } else {
                                ?>
                                    <button class="badge badge-danger btn" id="estado_inactivo" onclick="desactivar_footer(<?php echo $contenido_footer['id'] ?>)">Inactivo</button>
                                <?php } ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#editarFooter" onclick="editarFoto(<?php echo $contenido_footer['id'] ?>)"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger" onclick="eliminarFoto(<?php echo $contenido_footer['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="editarFooter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar foto inferior</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="errorFooter"></span>
                        <form method="POST" id="formularioEditarFooter">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="footer">Foto</label>
                                <input type="hidden" name="fotoEditarFooterHidden" id="fotoEditarFooterHidden">
                                <input type="text" name="foto" id="fotoEditarFooter" class="form-control" placeholder="Foto" />
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnEditarFooter">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <!--Footer-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jq-3.3.1/dt-1.10.23/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
            $('#example2').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
            $('#example1').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
            $('#example4').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
            $('#example5').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
    <script src="main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="peticiones/peticiones.js"></script>
</body>

</html>