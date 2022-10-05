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
        <h1>Modificar un proveedor</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/proveedor.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <p>Para poder modificar un proveedor se usara como referencia el NIT</p>
            <form action="modificar_proveedor.php" method="post">

                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nombre del proveedor:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="input" placeholder="Digite aqui..." name="nom_pro" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Nit: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" class="input" placeholder="Digite aquí..." name="nit_pro" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Telefono del proveedor: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="input" placeholder="Digite aquí..." name="tel_pro" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Dirección del proveedor </label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="input" placeholder="Digite aquí..." name="dir_pro" required>
                    </div>
                </div>

                <div class="row">
                    <button name="modificar_proveedor" id="modificar_proveedor"> <span>Modificar</span></button>
                </div>

            </form>

        </div>
    </body>

    </html>
    
    <?php

    if (isset($_POST['modificar_proveedor'])) {
        $nit_pro = $_POST['nit_pro'];
        $nom_pro = $_POST['nom_pro'];
        $cel_pro = $_POST['tel_pro'];
        $dir_pro = $_POST['dir_pro'];

        $validar = "SELECT * FROM proveedores WHERE nit_proveedor = '$nit_pro'";
        $validando = $connection->query($validar);
        if(!$validando-> num_rows >0){
            ?>
                <script>
                    alert("El nit no esta registrado");
                </script>
            <?php
        }else{
        $sql1 = "UPDATE proveedores SET nombre_proveedor = '$nom_pro', telefono_proveedor = '$cel_pro', direccion_proveedor = '$dir_pro' where nit_proveedor = '$nit_pro'";
        $resultado = mysqli_query($connection, $sql1);

        if (!$connection || !$sql1) {
    ?>
            <script>
                alert("Problemas con la conexion")
            </script>
        <?php

        } else {
        ?>
            <script>
                alert("Proveedor actualizado correctamente")
            </script>
<?php
        }
    }}
} else {
    header:
    "Location: ../login.php";
}

?>