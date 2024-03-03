<?php
// Iniciar sesión
session_start();

// Incluir el archivo de conexión
include_once 'conexion.php';

try {
    // Crear una instancia de la clase de conexión
    $pdo = new Conexion();

    // Verificar si se recibieron datos del formulario de ingreso
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitizar y obtener los datos del formulario
        $username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
        $password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

        // Verificar si el usuario existe en la base de datos
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE BINARY nombre_usuario = :username AND BINARY contraseña = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Verificar si se encontraron resultados (es decir, si el usuario y la contraseña son válidos)
        if ($stmt->rowCount() > 0) {
            // Usuario y contraseña válidos
            // Obtener el ID de usuario correspondiente al usuario ingresado
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_usuario = $fila['id'];

            // Establecer variable de sesión para indicar que el usuario ha iniciado sesión correctamente
            $_SESSION['usuario'] = $username;
            $_SESSION['id_usuario'] = $id_usuario;

            // Devolver una respuesta JSON indicando el éxito del inicio de sesión
            echo json_encode(array("success" => "Inicio de sesión exitoso"));
        } else {
            // Usuario y/o contraseña inválidos
            echo json_encode(array("error" => "Nombre de usuario y/o contraseña incorrectos. (Recuerda que ambos campos son sensibles a mayúsculas y minúsculas.)"));
        }
    }
} catch (PDOException $e) {
    // Error en la conexión o ejecución de la consulta
    echo json_encode(array("error" => $e->getMessage()));
}
