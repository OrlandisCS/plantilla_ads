<?php
require_once 'config/conexion.php';
$header = mysqli_query($conexion, "SELECT * FROM `header` WHERE estado = 1 ORDER BY id DESC LIMIT 1");
$contenido_header = mysqli_fetch_array($header);

$colores = mysqli_query($conexion, "SELECT * FROM `colores` WHERE estado = 1 ORDER BY id DESC LIMIT 1");
$contenido_colores = mysqli_fetch_array($colores);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 	 <meta name=”msvalidate.01” content=”CODE” />
    <meta name="description" content="Reto 21 días, reto dietetico, reto de dietas,  herbalife, herbalife nutrición, bajar de peso, retos deportivos, retos para adelgazar">
  <title>Reto 21 Dias</title>
<link rel="stylesheet" href="includes/css/bootstrap.min.css" />
  <link rel="stylesheet" href="includes/css/main.css" />
  <link rel="shortcut icon" href="trebol.png" type="image/x-icon">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <style>
    body::-webkit-scrollbar-thumb {
      background: <?php echo $contenido_colores['color'] ?> !important;
    }
    .img-header{
      height: 450px;
      background-position: center;
      background-size: cover;
    }
    @media(max-width: 768px){
    .img-header{
      height: unset;
      }
    }
  </style>
</head>

<body style="<?php echo $contenido_colores['fondo'] ?>">
  <div class="p-3 text-center" style="background:<?php echo $contenido_colores['barra'] ?>">
    <h2 class="text-center mt-1" style="color: <?php echo $contenido_colores['color']; ?>;"><?php echo $contenido_header['barra_superior'] ?><a href="config/index.php" target="blank"><i class="fas fa-carrot ml-2" style="color: <?php echo $contenido_colores['color']; ?>;"></i></a></h2>
  </div>
  <main>
    <div class="mt-3 container">
      <header>
         <div class='mt-2 mx-auto'>
       <?php 
          $video = mysqli_query($conexion, "SELECT * FROM video");
                  if(mysqli_num_rows($video)){
                  $video_arr = mysqli_fetch_array($video);
                 echo $video_arr['embed'];   
                  }
          ?>
      </div>
        <!-- Background image -->
        <div class="img-header p-5 text-center bg-image" style="
              background-image: url('<?php echo $contenido_header['foto'] ?>');">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.8)">
            <div class="p-3 d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <h1 class="mb-3 text-white">
                  <?php echo $contenido_header['titulo'] ?></h1>
                <h2 class="mb-3 " style="color: <?php echo $contenido_colores['color']; ?>;">
                  <?php echo $contenido_header['descripcion'] ?>
                </h2>
                <a class="btn btn-outline-light" href="#contactar" role="button">Más información</a>
              </div>
            </div>
      
          </div>
        </div>
      </header>