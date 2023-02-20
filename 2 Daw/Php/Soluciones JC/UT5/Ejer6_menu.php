<?php

 session_start();
 
 if ( !isset($_SESSION['usuario']) ) 
    header('location: Ejer6.php'); // Redirigir al Login
    
?>

<!DOCTYPE html>

<html>
    <head> 
        <meta charset="utf-8"/>
        <title>Ejercicio 6b Menú</title>
       <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
         crossorigin="anonymous">
        <link rel='stylesheet' type='text/css' href='css/estilos_flex.css' /> 
    </head> 
    <body> 
      
        <header>
            <?php include_once 'cabecera.php'; ?>
        </header>
        
        <?php include_once 'navegacion.php'; ?>
       
        <section>    
            <div id="menuopc">    
                <p>Conectado como usuario: <b><?php echo $_SESSION['usuario'] ?></b><p>    
                <div style="width: 300px; "> 
                    <ul class="opciones">    
                        <li><a href="Ejer7_alta.php">Alta de productos</a></li>
                        <li><a href="Ejer7_baja.php">Baja de productos</a></li>
                        <li><a href="Ejer7_baja.php">Modificación de productos</a></li>
                        <li><a href="Ejer7_consulta.php">Consulta de productos</a></li>
                    </ul>    
                    <hr/>
                    <ul>
                        <li style="list-style:none;  "><a href="Ejer6.php">Regresar</a></li>
                    </ul>
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