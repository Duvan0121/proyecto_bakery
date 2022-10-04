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
        <h1>Eliminar un cliente</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/cliente.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <p>Para poder eliminar un cliente se usara como referencia la identificación</p>
            <form action="eliminar_cliente.php" method="post">

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Documento de identidad: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" class="input" placeholder="Digite aquí..." name="id_cliente" require>
                    </div>
                </div>



                <div class="row">
                    <button name="borrar_cliente" id="borrar_cliente"> <span>Eliminar</span></button>
                </div>

            </form>

        </div>
    </body>

    </html>
    <?php

    if (isset($_POST['borrar_cliente'])) {
        $id_cli = $_POST['id_cliente'];


        $validar = "SELECT * FROM clientes WHERE id_cliente = '$id_cli'";
        $validando = $connection->query($validar);
        if (!$validando->num_rows > 0) {
    ?>
            <script>
                alert("no se puede borrar lo que no existe");
            </script>
            <?php
        } else {
            $instruccion_SQL = "DELETE FROM clientes where id_cliente= '$id_cli' ";
            $resultado = mysqli_query($connection, $instruccion_SQL);

            if (!$resultado || !$instruccion_SQL) {
            ?>
                <script>
                    alert("Problemas con la conexión");
                </script>
            <?php
            } else { ?>
                <script>
                    alert("Cliente borrado exitosamente");
                </script>
<?php
            }
        }
    }
} else {
    header:
    "Location: ../login.php";
}

?>