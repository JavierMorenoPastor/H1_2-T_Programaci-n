<?php
ini_set('display_errors', 1);
error_reporting(E_ALL); 

require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre'])) {
        $id_usuario = $_POST['nombre'];


        $conexion = new Conexion();
        $conn = $conexion->conexion;

        if ($conn) {
            $query = "DELETE FROM usuarios WHERE nombre = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $nombre);

            if ($stmt->execute()) {
                echo "Usuario eliminado correctamente. <a href='ListaUsuarios.php'>Ver lista de usuarios</a>";
            } else {
                echo "Error al eliminar el usuario: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Error al conectar con la base de datos.";
        }
    } else {
        echo "El ID del usuario no ha sido proporcionado.";
    }
}
?>

