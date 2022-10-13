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
        <title>Socios</title>
    </head>

    <body>
        <h1>Eliminar un socio</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/socio.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <p>Para poder eliminar un socio se usara como referencia la identificación</p>
            <form action="eliminar_socio.php" method="post">

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Id: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" class="input" placeholder="Digite aquí..." name="id_soc" require>
                    </div>
                </div>



                <div class="row">
                    <button name="borrar_socio" id="borrar_socio"> <span>Eliminar</span></button>
                </div>

            </form>

        </div>
    </body>

    </html>
    <?php

    if (isset($_POST['borrar_socio'])) {
        $id_soc = $_POST['id_soc'];


        $validar = "SELECT * FROM roles WHERE id_socio = '$id_soc'";
        $validando = $connection->query($validar);
        if (!$validando->num_rows > 0) {
    ?>
            <script>
                alert("no se puede borrar lo que no existe");
            </script>
            <?php
        } else {
            $instruccion_SQL = "DELETE FROM roles where id_socio= '$id_soc' ";
            $resultado = mysqli_query($connection, $instruccion_SQL);

            if (!$resultado || !$instruccion_SQL) {
            ?>
                <script>
                    alert("Problemas con la conexión");
                </script>
            <?php
            } else { ?>
                <script>
                    alert("Socio borrado exitosamente");
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