<?php require_once 'includes/layouts/header.php'; ?>
<form action='mail.php' method='post' class="mt-2 mb-3" id="contactar">
  <h3 class="text-center" style="color: <?php echo $contenido_colores['color']; ?>;">Recibe información personalizada para ti</h3>
  <div class="form-outline mb-4">
    <span class="span">
      <i class="fa fa-user" style="color: <?php echo $contenido_colores['color']; ?>;"></i>
    </span>
    <input type="text" name='nombre' class="form-control input-span" id="nombre" placeholder="Nombre" />
  </div>
  <div class="form-outline mb-4" ">
     <span class=" span"> <i class="fas fa-mobile" style="color: <?php echo $contenido_colores['color']; ?>;"></i> </span>
    <input type="tel" name='numero' class="form-control input-span" id="numero" placeholder="Número de telefono" />
  </div>
  <center>
<span class="mb-2" id="error"></span>
  </center>
  <button type="submit" id="btn-enviar" name='enviar_datos' class="btn btn-primary btn-block">
    Quiero más información
  </button>
</form>
<div class="redes" id="redes">
  <a href="https://www.facebook.com/yomariss2" target="_blank"><i class="facebook fab fa-facebook-square"></i></a>
  <a href="https://www.instagram.com/yumasoto76/" target="_blank"><i class="instagram fab fa-instagram"></i></a>
  <a href="https://api.whatsapp.com/send?phone=+34603014873&text=Hola estoy interesad@ en recibir información sobre el reto 21 días" target="_blank"><i class="whatsapp fab fa-whatsapp"></i></a>
  <a href="http://yumasoto.es" target="_blank"><i class="twitter fab fa-internet-explorer"></i></a>
</div>
<center>
  <div class="card p-3 mb-3">
    <?php
    $consejos = mysqli_query($conexion, "SELECT * FROM `consejos` WHERE estado = 1 ORDER BY id DESC");
    while ($filas = mysqli_fetch_array($consejos)) :
    ?>
      <div class="bg-image hover-overlay ripple" data-ripple-color="light">
        <img src="<?php echo $filas['foto'] ?>" class="profile" />
        <a href="#!">
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
        </a>
      </div>
      <div class="card-body">
        <h3 class="card-title font-weight-bold" style="
                  font-family: Oswald;
                  border-bottom: solid  <?php echo $contenido_colores['color'] ?> 3px;
                  display: inline-block;
                  color: <?php echo $contenido_colores['color'] ?>;
                ">
          <?php echo $filas['titulo'] ?>
        </h3>
        <p class="card-text text-justify">
          <?php echo $filas['descripcion'] ?>
        </p>
      </div>
    <?php endwhile; ?>
  </div>
</center>

<div class="list-group list-group-flush mb-2">
  <a href="#!" class="list-group-item list-group-item-action active text-center" aria-current="true" style="color: <?php echo $contenido_colores['color']; ?>;">
    Ventajas
  </a>
  <?php
  $ventajas = mysqli_query($conexion, "SELECT * FROM `ventajas` WHERE estado = 1 ORDER BY id DESC");
  while ($filas = mysqli_fetch_array($ventajas)) :
  ?>
    <a href="#" class="list-group-item list-group-item-action disabled">
      <i class="fas fa-check-square text-success mr-1"></i><?php echo $filas['titulo'] ?></a>
  <?php endwhile; ?>
</div>
<!-- testimonios -->
<div class="card mb-3">
  <div class="card-header text-uppercase text-center" style="color: <?php echo $contenido_colores['color']; ?>;">Testimonios</div>
  <?php
  $ventajas = mysqli_query($conexion, "SELECT * FROM `testimonios` WHERE estado = 1 ORDER BY id DESC");
  while ($filas = mysqli_fetch_array($ventajas)) :
  ?>
    <div class="card-body d-flex align-items-center">
      <img src="<?php echo $filas['foto'] ?>" class="profile p-0 m-0" style="width: 60px; height:60px;" />
      <div class=" ml-2">
        <h5 class="active"><?php echo $filas['nombre'] ?></h5>
        <p class="card-text">
          <?php echo $filas['testimonio'] ?>
        </p>
      </div>
    </div>
    <hr />
  <?php endwhile; ?>
  <div class="card-footer" style="color: <?php echo $contenido_colores['color']; ?>;">Ultimos Testimonios</div>
</div>
</div>
</main>
<?php require_once 'includes/layouts/footer.php'; ?>