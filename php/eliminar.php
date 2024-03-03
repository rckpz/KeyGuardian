<?php
// Verificar si se recibió un ID de contraseña para eliminar
if (isset($_POST["id"])) {
    // Obtener el ID de contraseña a eliminar
    $idContraseña = $_POST["id"];

    // Incluir el archivo de conexión
    include_once 'conexion.php';

    try {
        // Crear una instancia de la clase de conexión
        $pdo = new Conexion();

        // Eliminar la contraseña de la base de datos
        $sql = "DELETE FROM contraseñas WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $idContraseña, PDO::PARAM_INT);
        if ($stmt->execute()) {
            // Éxito al eliminar la contraseña
            echo "Contraseña eliminada correctamente.";
        } else {
            // Error al eliminar la contraseña
            echo "Error al eliminar la contraseña.";
        }
    } catch (PDOException $e) {
        // Error en la conexión o ejecución de la consulta
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No se recibió el ID de la contraseña a eliminar.";
}
