<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    require_once 'Conexion.php';
    $correo = $_GET['CorreoUsuario'];
    $contra = $_GET['Contraseña'];

    // Usar consultas preparadas
    $stmt = $mysql->prepare("SELECT * FROM Usuario WHERE CorreoUsuario = ? AND Contraseña = ?");
    $stmt->bind_param("ss", $correo, $contra);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        $array = $resultado->fetch_assoc();
        echo json_encode($array);
        echo "Hay registros";
    } else{
        echo "No hay registros";
    }

    $stmt->close();
    $mysql->close();
}
?>
