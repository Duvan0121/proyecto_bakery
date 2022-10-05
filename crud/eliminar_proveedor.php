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
        <title>Proveedores</title>
    </head>

    <body>
        <h1>Eliminar un proveedor</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/proveedor.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <p>Para poder eliminar un proveedor se usara como referencia la identificación</p>
            <form action="eliminar_proveedor.php" method="post">

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Nit: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" class="input" placeholder="Digite aquí..." name="nit_pro" required>
                    </div>  
                </div>



                <div class="row">
                    <button name="borrar_proveedor" id="borrar_proveedor"> <span>Eliminar</span></button>
                </div>

            </form>

        </div>
    </body>

    </html>
    <?php

    if (isset($_POST['borrar_proveedor'])) {
        $nit_pro = $_POST['nit_pro'];


        $validar = "SELECT * FROM proveedores WHERE nit_proveedor = '$nit_pro'";
        $validando = $connection->query($validar);
        if (!$validando->num_rows > 0) {
    ?>
            <script>
                alert("no se puede borrar lo que no existe");
            </script>
            <?php
        } else {
            $instruccion_SQL = "DELETE FROM proveedores where nit_proveedor= '$nit_pro' ";
            $resultado = mysqli_query($connection, $instruccion_SQL);

            if (!$resultado || !$instruccion_SQL) {
            ?>
                <script>
                    alert("Problemas con la conexión");
                </script>
            <?php
            } else { ?>
                <script>
                    alert("Proveedor borrado exitosamente");
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