<?php

class Juego{
    var $db ="bingo";
    var $username="root";
    var $password= "";
    var $host="localhost";
    var $conexion;

    var $id_creador;
    var $balotas_sacadas;
    var $estado;
    var $ganador;
    var $tipo_bingo;

    function Juego(){
        $this->crearConexion();
    }

    function crearConexion(){
        $this->conexion = new mysqli($this->host, $this->username,$this->password, $this->db);
        mysqli_set_charset($this->conexion,'utf8');
        if($this->conexion->connect_error){
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function crearJuego(){
        $sql = "insert into bingo_juego(id_creador, balotas_sacadas,tipo_bingo,ganador,estado) values(";
        $sql.="'$this->id_creador',";
        $sql.="'$this->balotas_sacadas',";
        $sql.="'$this->tipo_bingo',";
        $sql.="'$this->ganador',";
        $sql.="'$this->estado')";

        if($this->conexion->query($sql)){
            $id = $this->conexion->insert_id;
            return $id;
        }
    }

    function listarJuegosActivos(){
        $sql = "select * from bingo_juego where estado =1";
        $res = $this->conexion->query($sql);
        $juegos=array();
        while($j=$res->fetch_object()){
            array_push($juegos,$j);
        }
        $this->conexion->close();
        return $juegos;
    }

    function consultarJuegoId($id){
        $sql = "select * from bingo_juego where estado =1 and id=$id";

        $res = $this->conexion->query($sql);
        $juego = null;
        if($j = $res->fecth_object()){
            $juego = $j;
        }
        $this->conexion->close();
        return $juego;
    }

    function guardarBalotaGenerada($id,$balota){
        $sql ="update bingo_juego set balotas_sacadas ='$balota' where id=$id";
        if($this->conexion->query($sql)){
            return true;
        }
    }

    function consultarBalotas($id_juego){
        $sql = "select balotas_sacadas from bingo_juego where id=$id_juego";
        $res = $this->conexion->query($sql);
        $balotas = null;
        if($j = $res->fetch_object()){
            $balotas = $j->balotas_sacadas;
        }

        $this->conexion->close();
        return $balotas;
    }
    
    function iniciarSesion($u,$pass){
        $sql = "select * from usuario where correo='$u' and clave='$pass'";

        $res = $this->conexion->query($sql);
        $usuaro = null;
        if($j=$res->fetch_object()){
            $usuario = $j;
        }
        $this->conexion->close();
        return $usuario;
    }

    function consultarUsuario($id){
        $sql = "select * from usuario where id=$id";
        $res = $this ->conexion->query($sql);
        $usuario = null;
        if($j=$res->fetch_object()){
            $usuario = $j;
        }

        $this->conexion->close();
        return $usuario;

    }

    function terminarJuego($id){
        $sql = "update bingo_juego set estado=0 where id=$id";

        if($this->conexion->query($sql)){
            return true;
        }
    }


}