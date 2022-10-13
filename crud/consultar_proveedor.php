<?php
include('../includes/conexion.php');
$connection = conectar();
session_start();
$user = $_SESSION['user'];

if (isset($_SESSION['user'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="http://localhost/proyecto_bakery/css/formulario.css">
        <title>Proveedores consultas</title>
    </head>

    <body>
        <h1>Consultar proveedores</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/proveedor.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <h1>Consulta individual</h1>
            <form action="consultar_cliente.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Nit del proveedor: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" class="input" placeholder="Digite aquí..." name="nit_pro" >
                    </div>
                </div>

                <div class="row">
                    <button name="consulta_proveedor_" id="consultar_proveedor"> <span>Consultar proveedor</span></button>
                    <button name="consulta_general_pro"><span>Consultar todos los proveedores</span></button>
                    <button name="limpiare"><span>Limpiar pantalla</span></button>
                </div>
            </form>

        </div>
    </body>

    </html>
    <?php
    if(isset($_POST['limpiare'])){
        header("location: consultar_proveedor.php");
    }



    if (isset($_POST['consulta_proveedor_'])) {
        $nit_proveedor = $_POST['nit_pro'];
        $validar = "SELECT * FROM proveedores WHERE nit_proveedor = '$nit_proveedor'";
        $validando = $connection->query($validar);
        if (!$validando->num_rows > 0) {
    ?>
            <script>
                alert("No se busca lo que no existe")
            </script>
        <?php
        } else {
        ?>
            <div id="main-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nit del proveedor</th>
                            <th>Nombre del proveedor</th>
                            <th>Celular del proveedor</th>
                            <th>Dirección del proveedor</th>
                        </tr>
                    </thead>
                    <?php
                    $nit_pro = $_POST['nit_pro'];
                    $sql = "SELECT * FROM proveedores WHERE nit_proveedor = '$nit_pro' ";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['nit_proveedor'] ?></td>
                            <td><?php echo $row['nombre_proveedor'] ?></td>
                            <td><?php echo $row['celular_proveedor'] ?></td>
                            <td><?php echo $row['direccion_proveedor'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>


        <?php
        }
    }

    if (isset($_POST['consulta_general_pro'])) {
        ?>
        <div id="main-container">
            <table>
                <thead>
                    <tr>
                        <th>Nit del proveedor</th>
                        <th>Nombre del proveedor</th>
                        <th>Celular del proveedor</th>
                        <th>Dirección del proveedor</th>    
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM proveedores";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['nit_proveedor'] ?></td>
                        <td><?php echo $row['nombre_proveedor'] ?></td>
                        <td><?php echo $row['celular_proveedor'] ?></td>
                        <td><?php echo $row['direccion_proveedor'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>


<?php
    }
} else {
    header:
    "Location: ../login.php";
}

?>