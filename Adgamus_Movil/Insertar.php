<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'Conexion.php';

    $correo = $_POST["CorreoUsuario"];
    $nombre_usu = $_POST["NombreUsuario"];
    $contra = $_POST["Contraseña"];

    // Usar consultas preparadas para insertar datos
    $query = "INSERT INTO usuario (CorreoUsuario, NombreUsuario, Contraseña) VALUES (?, ?, ?)";
    $stmt = $mysql->prepare($query);

    // Vincular los parámetros
    $stmt->bind_param("sss", $correo, $nombre_usu, $contra); // "sss" indica que todos los parámetros son strings

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error al insertar datos";
    }

    // Cerrar el statement
    $stmt->close();

    // Cerrar la conexión a la base de datos
    $mysql->close();
}
