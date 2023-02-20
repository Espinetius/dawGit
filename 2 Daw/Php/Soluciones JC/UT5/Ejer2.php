<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Consultas con PDO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel='stylesheet' type='text/css' href='css/estilos_2.css' />
</head>

<body>
    <a href="Ejer5-formProveedor.html" class='btn btn-primary'>Nuevo Proveedor</a><br/>
    <h3>Relación de Proveedores</h3>
    <table border=1>
        <tr>
            <th>Cif</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Población</th>
            <th colspan="2">Acciones</th>
        </tr>

        <?php
        try {
            $conn = new PDO('mysql:host=localhost;dbname=gesventa;charset=utf8', 'dwes', 'dwes');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //  echo "Conexión realizada con éxito !!! <br/>";

            $stmt = $conn->prepare('SELECT * FROM proveedores');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            while ($prove = $stmt->fetch()) {
                // print_r($prove); 
                $cif = $prove['cif']; 
                echo "<tr>";
                echo "<td>".$prove['cif']."</td><td>".$prove['nom_emp']."</td><td>".$prove['direccion'].
                         "</td><td>".$prove['poblacion']."</td>".
                         "<td><a href='Ejer5b.php?cif=". $cif . "' class='btn btn-primary'>Modificar</td>".
                         "<td><a href='Ejer4b.php?cif=". $cif . "' class='btn btn-danger'>Eliminar</td>"; 

                echo "</tr>";
            }
        } catch (PDOException $ex) {
            print "¡Error!: " . $ex->getMessage() . "<br/>";
            exit;
        }
        ?>

    </table>
</body>

</html>