<?php
// Incluir el archivo de conexión
include_once 'conexion.php';

try {
    // Crear una instancia de la clase de conexión
    $pdo = new Conexion();

    // Sanitizar y obtener los datos del formulario
    $username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
    $email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

    // Verificar si el nombre de usuario o el correo electrónico ya existen en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :username OR correo_electronico = :email");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Verificar si se encontraron resultados (es decir, si el usuario o el correo ya están registrados)
    if ($stmt->rowCount() > 0) {
        // Nombre de usuario o correo electrónico ya existen
        echo json_encode(array("error" => "El nombre de usuario o el correo electrónico ya están registrados."));
    } else {
        // Insertar los datos del nuevo usuario en la base de datos
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, correo_electronico, contraseña) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Registro exitoso
        echo json_encode(array("success" => "Registro exitoso. ¡Bienvenido!"));
    }
} catch (PDOException $e) {
    // Error en la conexión o ejecución de la consulta
    echo json_encode(array("error" => $e->getMessage()));
}
