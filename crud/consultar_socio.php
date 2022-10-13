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
        <title>Socios consultas</title>
    </head>

    <body>
        <h1>Consultar socios</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/socio.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <h1>Consulta individual</h1>
            <form action="consultar_socio.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="lname">ID del socio: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" class="input" placeholder="Digite aquí..." name="id_soc">
                    </div>
                </div>

                <div class="row">
                    <button name="consulta_socio_" id="consultar_proveedor"> <span>Consultar socio</span></button>
                    <button name="consulta_general_soc"><span>Consultar todos los Socios</span></button>
                    <button name="limpiare"><span>Limpiar pantalla</span></button>
                </div>
            </form>

        </div>
    </body>

    </html>
    <?php
    if (isset($_POST['limpiare'])) {
        header("location: consultar_socio.php");
    }



    if (isset($_POST['consulta_socio_'])) {
        $id_soc = $_POST['id_soc'];
        $validar = "SELECT * FROM roles WHERE id_socio = '$id_soc'";
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
                            <th>Id del socio</th>
                            <th>Rol del socio</th>
                            <th>Usuario del socio</th>
                            <th>Contraseña del socio</th>
                        </tr>
                    </thead>
                    <?php
                    $id_soc = $_POST['id_soc'];
                    $sql = "SELECT * FROM roles WHERE id_socio = '$id_soc' ";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id_socio'] ?></td>
                            <td><?php echo $row['rol'] ?></td>
                            <td><?php echo $row['usuario'] ?></td>
                            <td><?php echo $row['contraseña'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>


        <?php
        }
    }

    if (isset($_POST['consulta_general_soc'])) {
        ?>
        <div id="main-container">
            <table>
                <thead>
                    <tr>
                        <th>Id del socio</th>
                        <th>Rol del socio</th>
                        <th>Usuario del socio</th>
                        <th>Contraseña del socio</th>

                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM roles";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id_socio'] ?></td>
                        <td><?php echo $row['rol'] ?></td>
                        <td><?php echo $row['usuario'] ?></td>
                        <td><?php echo $row['contraseña'] ?></td>

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