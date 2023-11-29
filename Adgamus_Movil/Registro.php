<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once 'Conexion.php';
    $correo = $_GET['CorreoUsuario'];

    // Usar consulta preparada para evitar inyección SQL
    $query = "SELECT * FROM usuario WHERE CorreoUsuario = ?";
    $stmt = $mysql->prepare($query);
    
    // Vincular parámetros a la consulta
    $stmt->bind_param("s", $correo); // "s" indica que el parámetro es un string

    // Ejecutar la consulta
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Si hay registros, se obtienen y se envían como respuesta
        $array = $resultado->fetch_assoc();
        echo json_encode($array);
        echo "Hay registros";
    } else {
        // No se encontraron registros
        echo "No hay registros";
    }

    // Cerrar el statement y la conexión
    $stmt->close();
    $mysql->close();
}
?>
