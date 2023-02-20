<?php

/* En este script se trata de minimizar en la medida de lo posible la 
 * cantidad de código PHP embebido dentro de HTML.
*/

include_once 'claseConexionBD.php';

function obtener_Proveedores()
{
    $BD = new ConectarBD();
    $conn = $BD->getConexion();

    try {
        $stmt = $conn->prepare('SELECT * FROM proveedores');
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $proveedores = $stmt->fetchAll(); // Obtener todas las filas de la tabla
    } catch (PDOException $ex) {
        print "¡Error!: " . $ex->getMessage() . "<br/>";
        exit;
    }

    $BD->cerrarConexion();

    return $proveedores; // Array bidimensional con todos los 
                         // proveedores de la tabla   
}

$listado = obtener_Proveedores();

if ( count($listado) == 0 ) {
    echo "No hay datos";
    exit;
}

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Consulta de Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='css/estilos_2.css' />
</head>

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
                       aria-current="page active" href="Ejer2_lisProv.php">Listado</a>
                    <a class="nav-link" href="Ejer5_formAltaProv.html">Alta</a>
                    <a class="nav-link" href="Ejer2_lisProv.php">Eliminar</a>
                    <a class="nav-link" href="Ejer2_lisProv.php">Modificar</a>
                </div>
            </div>
        </div>
    </nav>
    <br/><br/>

    <table border="1">
        <tr>
            <th>Cif</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Población</th>
            <th>Acciones</th>
        </tr>

        <?php
        foreach ($listado as $proveedor) {
            $cif = $proveedor['cif']; 
        ?>
            <tr>
                <td><?php echo $proveedor['cif']; ?></td>
                <td><?php echo $proveedor['nom_emp']; ?></td>
                <td><?php echo $proveedor['direccion']; ?></td>
                <td><?php echo $proveedor['poblacion']; ?></td>
                <td><a href='Ejer3_formModifProv.php?cif=<?php echo $cif; ?>' 
                        class='btn btn-primary'>Modificar
                
                    <a href='Ejer4_elimProv.php?cif=<?php echo $cif; ?>' 
                        onclick="return confirm('Seguro que desea eliminar este proveedor')" 
                        class='btn btn-danger'>Eliminar
                </td> 
            </tr>
        <?php
        }
        ?>
    </table>

    <p style="text-align: center; font-size: 1.2em;">
    <?php echo 'Número de filas: <b>' . count($listado) . '</b>'; ?></p>

</body>

</html>