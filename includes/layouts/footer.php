<?php
    $footer = mysqli_query($conexion, "SELECT * FROM `footer` WHERE estado = 1 ORDER BY id DESC");
   $filas_footer = mysqli_fetch_array($footer);
?>
<div class="p-5 text-center bg-image" style="
      background-image: url('<?php echo $filas_footer['foto']  ?>');
      height: 500px;
      background-position: center ;
     background-size: cover;
    ">
</div>
<footer class="text-center text-lg-left mt-3 text-light w-full p-3" style="background:<?php echo $contenido_colores['barra'] ?>!important">
  <div class="card" style="background: transparent; border:none">
    <!-- Copyright -->
    <div class="text-center" style="color: <?php echo $contenido_colores['color'];?>;">
      © <?php echo date('Y') ?> Copyright:
      <a style="color: <?php echo $contenido_colores['color'];?>;" target="blank" href="http://www.yumasoto.es/">yumasoto.es</a>
    </div>
    <div class="subir_arriba" id="subir_arriba">
      <i class="fas fa-angle-up ml-1"></i>
    </div>
</footer>
<!-- Footer -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/92d62fee25.js" crossorigin="anonymous"></script>
<script src="includes/js/main.js"></script>
  <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="113451833738460"
  logged_in_greeting="Hola, Quieres más información sobre el reto 21 días?"
  logged_out_greeting="Hola, Quieres más información sobre el reto 21 días?">
      </div>
</body>

</html>