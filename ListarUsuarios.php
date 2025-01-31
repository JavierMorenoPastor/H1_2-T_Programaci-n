<?php
ini_set('display_errors', 1);
error_reporting(E_ALL); 

require_once 'conexion.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function listarUsuarios() {
        $query = "SELECT * FROM usuarios";
        
        if ($this->conexion->conexion) {
            $resultado = $this->conexion->conexion->query($query);
            if ($resultado === false) {
                echo "Error en la consulta: " . $this->conexion->conexion->error;
                return;
            }

            if ($resultado->num_rows > 0) {
                echo "<table class='usuarios-table'>";
                echo "<thead><tr><th>Nombre</th><th>Correo</th><th>Edad</th><th>Plan</th><th>Paquetes</th><th>Duración</th><th>Costo</th></tr></thead>";
                echo "<tbody>";
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['correo']}</td>
                            <td>{$fila['edad']}</td>
                            <td>{$fila['plan_base']}</td>
                            <td>{$fila['paquetes']}</td>
                            <td>{$fila['duracion']}</td>
                            <td>{$fila['costo_total']}</td>
                          </tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No hay usuarios registrados.";
            }
        } else {
            echo "Error en la conexión con la base de datos.";
        }
    }
}

$usuario = new Usuario();
$usuario->listarUsuarios();
?>

<style>
    /* Estilos para la tabla de usuarios */
    .usuarios-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }

    .usuarios-table th, .usuarios-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .usuarios-table th {
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
    }

    .usuarios-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .usuarios-table tbody tr:hover {
        background-color: #ddd;
    }

    .usuarios-table td {
        color: #555;
    }

    /* Estilos adicionales */
    .usuarios-table {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .usuarios-table th {
        font-size: 14px;
    }

    .usuarios-table td {
        font-size: 13px;
    }
</style>
