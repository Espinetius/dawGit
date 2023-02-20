<?php

// Del listado llega el CIF desde el enlace 'Modificar'
$cif = $_GET['cif'];

include_once 'claseConexionBD.php';

$BD = new ConectarBD();
$conn = $BD->getConexion();

// Se obtienen de la BD los datos del proveedor para ese cif 
$stmt = $conn->prepare('SELECT * FROM proveedores WHERE cif=:cif');
$stmt->execute(array(':cif' => $cif));
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$prove = $stmt->fetch(); // Al consultar por la clave, solamente se retorna
                         // una única fila

// var_dump($prove);

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
                crossorigin="anonymous">
  <link rel='stylesheet' type='text/css' href='css/estilos2.css' />
  <title>Modificación proveedor</title>
</head>

<!-- Se pueden modificar todos los datos a excepción del cif 
     En consecuencia, para que el cif llegue también al script de 
     modificación Ejer3_modifProv.php, se le pasa como 'hidden' -->
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Proveedores</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
              <a class="nav-link" 
                    aria-current="page" href="Ejer2_lisProv.php">Listado</a>
              <a class="nav-link" href="Ejer5_formAltaProv.html">Alta</a>
              <a class="nav-link" href="Ejer2_lisProv.php">Eliminar</a>
              <a class="nav-link active" href="Ejer2_lisProv.php">Modificar</a>
          </div>
      </div>
    </div>
  </nav>
  <br/><br/>

  <form action="Ejer3_modifProv.php" class="form-horizontal" method="POST">
   
    <p style="text-align: center; font-size: 1.2em;">
         Modificación proveedor con Cif=<b><?php echo $cif; ?></b></p>
    <input type="text" name="cif" value="<?php echo $prove['cif']; ?>" hidden />
    
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" class="form-control" 
         value="<?php echo $prove['nom_emp']; ?>" required /><br/>
    <label for="dir">Dirección:</label>
    <input type="text" name="dir" class="form-control" 
          value="<?php echo $prove['direccion']; ?>" required /><br/>
    <label for="pobl">Población:</label>
    <input type="text" name="pobl" class="form-control" 
          value="<?php echo $prove['poblacion']; ?>" required /><br/>

    <input type="submit" class="form-control btn btn-success" 
                 name="enviar" value="Modificar" />
  </form>
</body>

</html>