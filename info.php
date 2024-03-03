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
            <h2 class="logo" onclick="window.location.href = 'index.php';">KEYGUARDIAN</h2>
            <!-- nav (el navegador de toda la web) -->
            <nav>
                <a href="info.php" class="info">INFORMACIÓN</a>
                <a href="consejos.php" class="consejos">CONSEJOS</a>
                <a href="ingresar.php" class="ingresar">INGRESAR</a>
            </nav>
        </header>
        <!-- Main (centro de la página, zona central) -->
        <main>
            <section class="contenido-info">
                <h2> KeyGuardian</h2>
                <p>
                    KeyGuardian es un servicio diseñado para ayudarte a gestionar de forma segura tus contraseñas y mejorar la seguridad en línea. Surgió de la necesidad de proporcionar una solución integral para el manejo de contraseñas en un mundo cada vez más digitalizado.
                </p>
                <h3>¿Qué problemas resuelve KeyGuardian?</h3>
                <p>
                    Uno de los principales problemas que resuelve KeyGuardian es la gestión de contraseñas. Con la cantidad creciente de servicios en línea que requieren autenticación, recordar todas las contraseñas de forma segura se ha vuelto cada vez más difícil para los usuarios. KeyGuardian ofrece una solución centralizada para almacenar, generar y gestionar contraseñas de manera segura.
                </p>
                <h3>Características principales</h3>
                <ul>
                    <li><strong>Generador de contraseñas seguras:</strong> KeyGuardian incluye un generador de contraseñas que te permite crear contraseñas sólidas y únicas para cada cuenta.</li>
                    <li><strong>Almacenamiento seguro:</strong> Todas tus contraseñas se almacenan de forma segura utilizando técnicas de cifrado avanzadas para proteger tu información.</li>
                    <li><strong>Acceso desde cualquier lugar:</strong> Puedes acceder a tus contraseñas desde cualquier dispositivo con conexión a Internet, lo que te permite gestionar tus cuentas de forma conveniente y segura.</li>
                    <li><strong>Funciones adicionales:</strong> Además de gestionar contraseñas, KeyGuardian puede ofrecer funciones adicionales como autenticación de dos factores, almacenamiento de notas seguras y más.</li>
                </ul>
                <h3>Cómo funciona KeyGuardian</h3>
                <p>
                    Para empezar a utilizar KeyGuardian basta con usar el generador de contraseñas seguras, para poder tener más opciones y guardar tus contraseñas simplemente regístrate en nuestra plataforma y crea una cuenta. Una vez registrado, podrás comenzar a agregar tus contraseñas y utilizar todas las funciones disponibles. KeyGuardian te proporcionará herramientas para mantener tu información segura y protegida en línea.
                </p>
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

</html>