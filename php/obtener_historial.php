<?php
// Incluir el archivo de conexión
include_once 'conexion.php';

try {
    // Crear una instancia de la clase de conexión
    $pdo = new Conexion();

    // Verificar si se recibió un ID de usuario
    session_start();
    if (!isset($_SESSION["id_usuario"])) {
        echo "Error: No se ha iniciado sesión.";
        exit;
    }

    // Obtener el ID de usuario de la sesión actual
    $idUsuario = $_SESSION["id_usuario"];

    // Obtener el historial de contraseñas del usuario actual
    $stmt = $pdo->prepare("SELECT * FROM contraseñas WHERE id_usuario = :idUsuario");
    $stmt->bindParam(':idUsuario', $idUsuario);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Construir el HTML para mostrar el historial de contraseñas en una tabla
        echo '<table border="1">
                <tr>
                    <th>Descripción</th>
                    <th>Contraseña generada</th>
                    <th>Fecha de generación</th>
                    <th>Acciones</th>
                </tr>';
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $fila['id'];
            $descripcion = $fila['nombre_contraseña'];
            $contrasena = $fila['contraseña_generada'];
            $fecha = $fila['fecha_generación'];
            echo "<tr>
                    <td>$descripcion</td>
                    <td>$contrasena</td>
                    <td>$fecha</td>
                    <td class='botoneshistorial'>
                        <button class='copiar' data-contrasena='$contrasena'>Copiar</button>
                        <button class='eliminar' data-id='$id'>Eliminar</button>
                    </td>
                </tr>";
        }
        echo '</table>';
    } else {
        echo "No hay contraseñas en el historial.";
    }
} catch (PDOException $e) {
    // Error en la conexión o ejecución de la consulta
    echo "Error: " . $e->getMessage();
}
