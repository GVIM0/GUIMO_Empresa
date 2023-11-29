<?php
$mysql = new mysqli("localhost","root","1234","Adgamus");
    if($mysql->connect_error){
        echo ("Error de conexion");
    } else{
        echo "Conexion exitosa a DB";
    }
?>
