<?php
    session_start();

    if (!isset( $_SESSION['usuario'])) {
        header('Location: login.php');
    }

    echo "Conectado como <b>" . $_SESSION['usuario'] . "</b><br/><br/>";

    $datos = obtener_datos(); 
    if ( count($datos) > 0 ) {
    ?>    
        <table border="1">
        <?php
            if ($_SESSION['rol'] == 0 )       
                echo"<tr><th>Usuario</th><th>Email</th><th>Nombre</th><th>Apellidos</th></tr>";
            else
                echo"<tr><th>Usuario</th><th>Email</th><th>Nombre</th><th>Apellidos</th><th colspan='2'>Acciones</th></tr>";
            
            foreach ( $datos as $d ) {
                echo '<tr>';
        
                echo "<td>".$d['usuario']."</td><td>".$d['email'].
                            "</td><td>".$d['nombre'].
                            "</td><td>".$d['apellidos']."</td>";
            
                if ( $_SESSION['rol'] != 0 ) {
                    echo '<td><a href="modificar.php?usu='.$d['usuario'].'">Modificar</a></td>';
		//si quieres mandar mas elementos en con la url se mete con un &
		//ejemplo: echo '<td><a href="modificar.php?usu='.$d['usuario'].'&nom='.$d['nombre'].'">Modificar</a></td>';
                    echo '<td><a href="eliminar.php?usu='.$d['usuario'].'">Eliminar</a></td>';
                }             

                echo "</tr>";
            }
        ?>      
        </table>          
        <br/>
    <?php    
    }
    else {
        echo "No hay datos";
    }

 function obtener_datos() {
    
    include_once 'claseConexionBD.php';
    
    $BD = new ConectarBD();   
    $conn = $BD->getConexion();
       
    $stmt = $conn->prepare('SELECT * FROM usuarios');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);   
    $stmt->execute();
    $datos = $stmt->fetchAll();
        
    $BD->cerrarConexion();
        
    return $datos;   
}
    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <a href="aplicacion.php">Regresar a página anterior</a><br/>
    <a href="index.php">Ir a Inicio</a><br/>
</body>
</html>