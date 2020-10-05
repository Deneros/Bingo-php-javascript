<?php 
@session_start();
include_once("Juego.php");

if(isset($_GET['inicioaccion'])){
    switch($_GET['inicioaccion']){
        case 1:
            $juego = new Juego();
            $juego-> tipo_bingo=$_POST['tipo_juego'];
            $juego-> id_creador=@unserialize($_SESSION['usuario'])->id;
            $id = $juego->crearJuego();
            if(isset($_SESSION['balotas_juego'])){
                $_SESSION['balotas_juego'] =null;
                $_SESSION['balotas_sacadas']=null;
                $_SESSION['juego']=null;
            }
            header("location: ../bingo.php?idjuego=$id");
        break; 
        case 2:
            $juego = new Juego();
            $correo = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $lin = $juego->iniciarSesion($correo,$contrasena);
            if($lin != null){
                $_SESSION['usuario']=@serialize($lin);
                header("location: ../home.php");
            }else{
                header("location: ../index.html");
                echo '<script language="javascript">alert("Usuario o Contraseña incorrectas");</script>';
                
            }
        break;
    }
}