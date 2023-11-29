<?php
$mysql = new mysqli("localhost","root","","adgamus");
    if($mysql->connect_error){
        die("Error de conexion");
    } else{
        // echo "Conexion exitosa a DB";
    }

