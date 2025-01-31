<?php
require_once 'conexion.php';

class usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

public function ActualizarUsuario($id_usuario, $nombre, $correo, $edad, $plan_base, $duracion) {
    $query = "UPDATE usuarios SET nombre = ?, correo = ?, edad = ?, plan_base = ?, duracion = ? WHERE id_usuario = ?";
    $stmt = $this->conexion->conexion->prepare($query);
    $stmt->bind_param("ssissi", $nombre, $correo, $edad, $plan_base, $duracion, $id_usuario);

    if ($stmt->execute()) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar usuario: " . $stmt->error;
    }

    $stmt->close();
}
}
?>