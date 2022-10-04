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

        <link rel="stylesheet" href="http://localhost/version1/css/formulario.css">
        <title>Clientes</title>
    </head>

    <body>
        <h1>Consultar clientes</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/cliente.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <h1>Consulta individual</h1>
            <form action="consultar_cliente.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Identificacion del cliente: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" class="input" placeholder="Digite aquí..." name="id_cli" require>
                    </div>
                </div>

                <div class="row">
                    <button name="consulta_cliente_" id="consultar_cliente"> <span>Consultar cliente</span></button>
                    <button name="consulta_general"><span>Consultar todos los clientes</span></button>
                    <button name="limpiar"><span>Limpiar pantalla</span></button>
                </div>
            </form>

        </div>
    </body>

    </html>
    <?php
    if(isset($_POST['limpiar'])){
        header("location: consultar_cliente.php");
    }



    if (isset($_POST['consulta_cliente_'])) {
        $id_cliente = $_POST['id_cli'];
        $validar = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
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
                            <th>Nombre del cliente</th>
                            <th>Identificacion del cliente</th>
                            <th>Celular del cliente</th>
                            <th>Dirección del cliente</th>
                        </tr>
                    </thead>
                    <?php
                    $id_cliente = $_POST['id_cli'];
                    $sql = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente' ";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id_cliente'] ?></td>
                            <td><?php echo $row['nombre_cliente'] ?></td>
                            <td><?php echo $row['celular_cliente'] ?></td>
                            <td><?php echo $row['direccion_cliente'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>


        <?php
        }
    }

    if (isset($_POST['consulta_general'])) {
        ?>
        <div id="main-container">
            <table>
                <thead>
                    <tr>
                        <th>Nombre del cliente</th>
                        <th>Identificacion del cliente</th>
                        <th>Celular del cliente</th>
                        <th>Dirección del cliente</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM clientes";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id_cliente'] ?></td>
                        <td><?php echo $row['nombre_cliente'] ?></td>
                        <td><?php echo $row['celular_cliente'] ?></td>
                        <td><?php echo $row['direccion_cliente'] ?></td>
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