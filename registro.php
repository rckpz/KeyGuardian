<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  // Incluir el archivo de conexión
  include_once 'meta.php';
  ?>
  <!-- Cada página del sitio tiene que ser diferente el título y la descripción -->
  <title>REGISTRO</title>
  <!-- Scripts a cargar antes de la renderización -->
  <script src="js/validacion.js"></script>
  <script src="preloader.js"></script>
</head>

<body>
  <div id="container">
    <section class="registro">
      <form class="registroform" id="registroform" method="post" action="php/procesaregistro.php" novalidate>
        <h2>Crea tu cuenta gratis</h2>
        <div class="campo">
          <label for="username">Nombre de Usuario:</label>
          <input type="text" id="username" name="username" placeholder="Ingresa tu nombre de usuario" />
        </div>

        <div class="campo">
          <label for="email">Correo Electrónico:</label>
          <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" />
        </div>

        <div class="campo">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" />
        </div>

        <div class="campo">
          <label for="confirmPassword">Confirmar Contraseña:</label>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirma tu contraseña" />
        </div>

        <p>
          ¿Ya tienes una cuenta?
          <a href="ingresar.php" class="ingresa">Ingresa</a>.
        </p>
        <button class="registrarsesubmit" type="submit">Registrarse</button>
      </form>
    </section>
    <aside class="textoregistro">
      <h1 class="logoform">KEYGUARDIAN</h1>
      <img class="cerradura" src="svg/cerradura.svg" alt="" />
      <p>
        La seguridad comienza con contraseñas sólidas, y en KeyGuardian hemos
        elevado la protección a un nuevo nivel. Genera contraseñas robustas y
        personalizadas, podrás acceder a tus credenciales de forma segura y
        rápida.
      </p>
      <p>
        Regístrate ahora y descubre cómo hacer que tu experiencia en línea sea
        más segura y sin complicaciones.
      </p>
    </aside>
    <div id="mensajeError" style="display: none">
      <img id="mensajeImagen" src="" alt="" />
      <p id="mensajeTexto"></p>
      <button id="botonMensaje"></button>
    </div>
  </div>
</body>

</html>