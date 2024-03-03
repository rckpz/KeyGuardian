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
    <section class="contenido-consejos">
        <h2>Consejos de seguridad en línea</h2>
        <ul>
            <li><strong>Utiliza contraseñas seguras y únicas:</strong> Nunca utilices contraseñas fáciles de adivinar, como "123456" o "password". En su lugar, utiliza contraseñas largas, complejas y únicas para cada cuenta. Considera utilizar un administrador de contraseñas para generar y almacenar contraseñas de forma segura.</li>
            <li><strong>Habilita la autenticación de dos factores:</strong> La autenticación de dos factores añade una capa adicional de seguridad al requerir un segundo método de verificación, como un código enviado a tu teléfono móvil, además de tu contraseña. Activa esta función siempre que esté disponible en tus cuentas en línea.</li>
            <li><strong>Mantén tus dispositivos y software actualizados:</strong> Asegúrate de instalar las actualizaciones de seguridad y parches de software tan pronto como estén disponibles. Las actualizaciones suelen corregir vulnerabilidades y errores de seguridad que podrían ser explotados por los hackers.</li>
            <li><strong>Ten cuidado con los correos electrónicos y enlaces sospechosos:</strong> No hagas clic en enlaces sospechosos o descargues archivos adjuntos de correos electrónicos desconocidos. Los estafadores suelen utilizar correos electrónicos de phishing para engañar a los usuarios y robar información personal.</li>
            <li><strong>Protege tu información personal en las redes sociales:</strong> Revisa y ajusta la configuración de privacidad de tus perfiles en redes sociales para limitar quién puede ver tu información personal y publicaciones. Evita compartir información sensible como tu dirección, número de teléfono o detalles financieros en plataformas públicas.</li>
            <li><strong>Utiliza conexiones seguras en redes Wi-Fi públicas:</strong> Evita realizar transacciones financieras o acceder a cuentas sensibles mientras estás conectado a redes Wi-Fi públicas no seguras. Siempre utiliza una conexión VPN para cifrar tu tráfico y proteger tus datos cuando te conectes a redes Wi-Fi abiertas.</li>
        </ul>
        <p>
            Sigue estos consejos para mejorar tu seguridad en línea y proteger tu información personal y financiera contra amenazas cibernéticas. Recuerda que la seguridad en línea es un esfuerzo continuo y siempre debes estar atento a posibles riesgos.
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