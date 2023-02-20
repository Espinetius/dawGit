<?php

include_once("config_BD.php");


class ConectarBD
{
    
    private $hostname = "localhost";
    private $database = "pelis";
    private $user = "dwes";
    private $password = "dwes";
    private $charset = "utf8";
    private $conexion;

    function getConexion()
    {
        try
        {
            $this->conexion = new PDO('mysql:host='.$this->hostname.';dbname='.$this->database . ';charset='.$this->charset,$this->user, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error)
        {
            print "¡ERROR: !".$error->getMessage() . "<br/>";
            exit;
        }

        return $this->conexion;
    }

    function cerrarConexion() 
    {
        $this->conexion = null;
    }
}


?>