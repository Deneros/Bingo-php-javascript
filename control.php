<?php

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

    if($usuario == "camila" && $contrasena == '123Camila'){
        header("location: home.html"); 
    }else{
        header("location: index.html");
    }

?>