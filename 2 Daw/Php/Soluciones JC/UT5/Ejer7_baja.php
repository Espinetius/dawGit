<?php

    session_start();
    
    if ( !isset($_SESSION['usuario']) ) 
       header('location: Ejer6.php'); 
    
    include_once 'claseConexionBD.php';
    
    // Conectar con la BD y abrir una conexión
    $BD = new ConectarBD();
    $conexion = $BD->getConexion();   
    
    // Consultar BD para obtener todos los productos
    $listadoProductos = obtener_Productos($conexion);
   
    // Cerrar la conexión con la BD
    $BD->cerrarConexion();     
    
    
    function obtener_Productos($conn)
    {            
        $stmt = $conn->prepare('SELECT * FROM productos');
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);   

        $productos = $stmt->fetchAll();

        return $productos;   
    }
    
      
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Baja de productos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel='stylesheet' type='text/css' href='css/estilos_flex.css' />   
    </head>
    <body>
        
        <header>
            <?php include_once 'cabecera.php'; ?>
        </header>
       
        <?php include_once 'navegacion.php'; ?>
       
        <section> 
            <div id="caja1">
                <p>Conectado como usuario: <b><?php echo $_SESSION['usuario'] ?></b><p> 
                <h3>Relación de Productos</h3>       

                <div id="caja_img"> 
                    <?php                       
                        foreach ( $listadoProductos as $prod ) {
                    ?>
                            <div id="productos">     
                                <strong><?php echo $prod['nom_prod']; ?></strong>                               
                                <figure>
                                    <img class="imagen" src="imgProd/<?php echo $prod['imagen']; ?>">
                                    
                                    <figcaption style="color: blue;">
                                       Pvp: <?php echo $prod['pvp']; ?>€
                                       <br/><a href="Ejer7_modificar.php?p=<?php echo $prod['cod']; ?>">Modificar</a>     
                                       <br/><a href="Ejer7_elim.php?p=<?php echo $prod['cod']; ?>">Eliminar</a>                                   
                                    </figcaption>
                                </figure>
                            </div>    
                    <?php                         
                        }                            
                    ?>    
                </div>

                <div>
                    <?php echo 'Número de filas: ' . count($listadoProductos); ?>
                    <hr/>
                    <a href="Ejer6_menu.php">Regresar</a>
                </div>
            </div>
            
            <aside>
                <?php include_once 'aside.php'; ?>
            </aside>
                        
        </section>
 
        <footer>
            <?php include_once 'pie.php'; ?>
        </footer>
     
    </body>
</html>

