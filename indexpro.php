<?php
// Iniciar sesión (si aún no está iniciada)
session_start();

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
  // Redirigir al usuario al index si no ha iniciado sesión
  header("Location: ingresar.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  // Incluir el archivo de conexión
  include_once 'meta.php';
  ?>
  <!-- Cada página del sitio tiene que ser diferente el título y la descripción -->
  <title>GENERADOR PRO</title>
  <!-- Scripts a cargar antes de la renderización -->
  <script src="js/generador.js"></script>
  <script src="preloader.js"></script>
  <script src="js/recordar.js"></script>

</head>

<body>
  <div id="container">
    <!-- *** ESTRUCTURA SEMÁNTICA *** -->
    <!-- Header (encabezado de la página, zona superior) -->
    <header>
      <h2 class="logo" onclick="window.location.href = 'index.php';">KEYGUARDIAN</h2>
      <!-- nav (el navegador de toda la web) -->
      <nav>
        <a href="info.php" class="info">INFORMACIÓN</a>
        <a href="consejos.php" class="consejos">CONSEJOS</a>
        <a class="usuario"><?php echo $_SESSION['usuario']; ?></a>
        <div class="opciones-usuario">
          <a href="historial.php">HISTORIAL</a>
          <a href="php/cerrar_sesion.php" class="cerrar">CERRAR SESIÓN</a>
        </div>
      </nav>

    </header>
    <!-- Main (centro de la página, zona central) -->
    <main>
      <section class="generadorpro">
        <h2>Genera contraseñas seguras:</h2>
        <div class="cuadro">
          <img class="anterior" src="svg/anterior.svg" alt="" />
          <div class="contrasena">
            <div class="contragen" id="contra"></div>
            <img class="refrescar" src="svg/refrescar.svg" alt="" />
          </div>
          <img class="siguiente" src="svg/siguiente.svg" alt="" />
        </div>
        <div class="longitud-output">
          <label for="longitud">Longitud:</label>
          <output for="longitud" id="longitudOutput">12</output>
        </div>
        <div class="longitud-value">
          <input class="longitud" type="range" id="longitud" name="longitud" min="6" max="16" value="10" />
          <a href="#" class="copiar" id="copiarBtn">COPIAR</a>
        </div>
        <div class="checkboxes">
          <input type="checkbox" id="minusculas" name="minusculas" checked />
          <label for="minusculas">MINÚSCULAS (abc)</label><br />

          <input type="checkbox" id="mayusculas" name="mayusculas" checked />
          <label for="mayusculas">MAYÚSCULAS (ABC)</label><br />

          <input type="checkbox" id="digitos" name="digitos" checked />
          <label for="digitos">DÍGITOS (123)</label><br />

          <input type="checkbox" id="simbolos" name="simbolos" checked />
          <label for="simbolos">SÍMBOLOS ($@?)</label><br />
        </div>

        <a href="#" class="recordar">RECORDAR CONTRASEÑA</a>
      </section>
    </main>
    <!-- Footer (final de la página, zona inferior) -->
    <footer>
      <h6>&copy;2024 KEYGUARDIAN Todos los derechos reservados.</h6>
      <nav class="botones-footer">
        <a href="index.php">INICIO</a> |
        <a href="registro.php">REGISTRARSE</a> |
        <a href="ingresar.php">INGRESAR</a> |
        <a href="historial.php">HISTORIAL</a> |
        <a href="info.php">INFORMACIÓN</a> |
        <a href="consejos.php">CONSEJOS</a>
      </nav>
      <!-- Cambio de idioma se incluirá en la versión 2.0 -->
      <div class="selecidioma">
        <a href="" class="espanol">ESPAÑOL</a><img class="idiomas" src="svg/idiomas.svg" alt="" />
      </div>
    </footer>
  </div>
</body>
<script>
  // Script para hacer que el submenu del usuario tenga el mismo width que el botón con su nombre
  window.onload = function() {
    var usuario = document.querySelector('.usuario');
    var opcionesUsuario = document.querySelector('.opciones-usuario');

    opcionesUsuario.style.width = usuario.offsetWidth + 'px';
  }
</script>

</html>