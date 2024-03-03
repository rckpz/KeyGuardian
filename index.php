<?php
// Iniciar sesión (si aún no está iniciada)
session_start();

// Verificar si el usuario ya ha iniciado sesión previamente
if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
  // Redirigir al usuario al indexpro.php si ya ha iniciado sesión
  header("Location: indexpro.php");
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
  <title>GENERADOR</title>
  <!-- Scripts a cargar antes de la renderización -->
  <script src="js/generador.js"></script>
  <script src="preloader.js"></script>
</head>

<body>
  <div id="container">
    <!-- *** ESTRUCTURA SEMÁNTICA *** -->
    <!-- Header (encabezado de la página, zona superior) -->
    <header>
      <h2 class="logo">KEYGUARDIAN</h2>
      <!-- nav (el navegador de toda la web) -->
      <nav>
        <a href="info.php" class="info">INFORMACIÓN</a>
        <a href="consejos.php" class="consejos">CONSEJOS</a>
        <a href="ingresar.php" class="ingresar">INGRESAR</a>
      </nav>
    </header>
    <!-- Main (centro de la página, zona central) -->
    <main>
      <section class="generador">
        <h2>Genera contraseñas seguras:</h2>
        <div class="cuadro">
          <img class="anterior" src="svg/anterior.svg" alt="" />
          <div class="contrasena">
            <div class="contragen" id="contra"></div>
            <img class="refrescar" src="svg/refrescar.svg" alt="" />
          </div>
          <img class="siguiente" src="svg/siguiente.svg" alt="" />
        </div>
        <a href="#" class="copiar" id="copiarBtn">COPIAR</a>
      </section>

      <article class="eslogan">
        <h2>Genera contraseñas complejas registrándote en KeyGuardian</h2>
        <p>
          Prueba gratis el generador de contraseñas personalizadas
          registrándote en Keyguardian y mantén organizadas tus contraseñas
          además de desbloquear increíbles opciones.
        </p>
        <a href="registro.php" class="registrarse">REGISTRARSE</a>
      </article>
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

</html>