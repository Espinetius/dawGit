 <?php 

    session_start();  // Se van a utilizar sesiones
 
    // Inicializar variables que aparecen en el formulario
    $errUsuario = '';  $errClave = '';
    $error = '';
    $usuario = ''; $clave = '';
       
    include_once 'claseConexionBD.php';

    /* Tratamiento del formulario. 
     * 
     * Se comprueba que los datos se hayan introducido. Posteriormente, se comprueba
     * si existen en la BD. En caso afirmativo, se crea una sesión con el nombre del
     * usuario y se entra en la aplicación.
    */
    if ( isset($_POST['Enviar']) ) { 

        $usuario = $_POST['usuario'];
        $clave = $_POST['clave']; 
    
        if ( empty($usuario) ) {
            $errUsuario = 'Por favor, introduzca usuario';
        }
        if ( empty($clave) ) {
            $errClave = 'Por favor, introduzca contraseña';
        }

        // Se han introducido todos los campos => Limpiar errores previos y validar 
        // credenciales contra la tabla de usuarios.
        if ( !empty($usuario) &&  !empty($clave) ) {
    
            $error = validar_credenciales($usuario, $clave);
      
            // Todo OK. Crear variable de sesión e ir a la página de operaciones
            if ( empty($error) )  
            {   
                $_SESSION['usuario'] = $usuario;
                header('Location:Ejer6_menu.php');  // Ir a menú de operaciones
            }   
        }

    }  // Fin tratamiento principal

    // Accede a la BD para comprobar si los datos introducidos existen.
    // Devuelve blanco en caso de éxito. Mensaje de error, en caso contrario.
    function validar_credenciales($usuario, $clave) {

        $error = '';
    
        try { 
        
            $BD = new ConectarBD();   
            $conn = $BD->getConexion();
 
            $stmt = $conn->prepare("select * from usuarios WHERE usr = :usr AND pass = :pass");
            $stmt->execute(array(':usr' => $usuario, ':pass' => sha1($clave)));

            $rows = $stmt->fetchAll();    
            $stmt->closeCursor();

            if ( sizeof($rows) == 0 ) 
                $error = "El usuario o la contraseña no son válidos";
              
            $BD->cerrarConexion();
        
            return $error; 

        } catch(PDOException $e) {
            $BD->cerrarConexion();
            die ("¡Error!: " . $e->getMessage() . "<br/>");
        }
    
    }  // Fin función validar_credenciales
    
?>     

<!-- Parte cliente del script PHP.

     Presenta un formulario de entrada con el usuario y contraseña.
     En caso de errores de validación después de pulsar el botón Enviar, se 
     mantienen los datos introducidos.
     Presenta mensajes de error justo debajo de cada campo del formulario.
-->     

<!DOCTYPE html>
 
<html>
   <head> 
        <meta charset="utf-8"/>
        <title>Ejercicio 6 Login</title>
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
                <div><h4>Login</h4></div>
                <div id="login">
                    <form action="" method="post">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" 
                               value="<?php echo $usuario; ?>"
                               placeholder="Usuario" />  
                        
                        <p class='alert-danger'><?php echo $errUsuario; ?></p>
                                               
                        <label for="clave">Contraseña:</label>                  
                        <input type="password" class="form-control" name="clave" id="clave" 
                               value="<?php echo $clave; ?>"
                               placeholder="Contraseña" />
                        
                        <p class='alert-danger'><?php echo $errClave; ?>
                        
                        <div>    
                            <button type="submit" class="btn btn-primary" name="Enviar" 
                                    value="Enviar">Entrar</button>
                        </div>
                        
                        <!-- Mensaje de usuario/contraseña no válidos -->
                        <p class='alert-danger'><?php echo $error; ?></p>    
                    </form>
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