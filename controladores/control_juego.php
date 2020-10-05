<?php
@session_start();
include_once("Juego.php");
include_once("Usuario.php");
                         
if(isset($_GET['accionjuego'])){
    switch($_GET['accionjuego']){
        case 1:
            $juego = new Juego();
            $juego = @unserialize($_SESSION['juego']);
            $usuario = new Usuario();
            $usuario = @unserialize($_SESSION['usuario']);
            if($usuario->id == $juego->id_creador){

            }else {
                
            }
        break;   
    }
}



?>