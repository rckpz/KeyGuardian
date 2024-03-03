<?php
// Incluir el archivo de conexión
include_once 'conexion.php';

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["descripcion"]) && isset($_POST["contrasena"])) {
    // Obtener los datos enviados por el cliente
    $descripcion = $_POST["descripcion"];
    $contrasena = $_POST["contrasena"];

    try {
        // Crear una instancia de la clase de conexión
        $pdo = new Conexion();

        // Obtener el ID de usuario de la sesión actual
        session_start();
        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];

            // Insertar los datos en la tabla contraseñas
            $stmt = $pdo->prepare("INSERT INTO contraseñas (id_usuario, contraseña_generada, nombre_contraseña, fecha_generación) VALUES (:id_usuario, :contrasena, :descripcion, CURRENT_TIMESTAMP)");
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->execute();

            // Éxito al insertar los datos
            echo "Contraseña recordada exitosamente.";
        } else {
            echo "Error: No se pudo obtener el ID de usuario.";
        }
    } catch (PDOException $e) {
        // Error en la conexión o ejecución de la consulta
        echo "Error: " . $e->getMessage();
    }
}
