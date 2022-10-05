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
        <title>Clientes</title>
    </head>

    <body>
        <h1>Modificar un cliente</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/cliente.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <p>Para poder modificar un cliente se usara como referencia la identificación</p>
            <form action="modificar_cliente.php" method="post">

                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nombre del cliente:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="input" placeholder="Digite aqui..." name="nom_cli" require>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Documento de identidad: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" class="input" placeholder="Digite aquí..." name="id_cliente" require>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Telefono del cliente: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="input" placeholder="Digite aquí..." name="tel_cli" require>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Dirección del cliente: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="input" placeholder="Digite aquí..." name="dir_cli" require>
                    </div>
                </div>

                <div class="row">
                    <button name="modificar_cliente" id="modificar_cliente"> <span>Modificar</span></button>
                </div>

            </form>

        </div>
    </body>

    </html>
    
    <?php

    if (isset($_POST['modificar_cliente'])) {
        $id_cliente = $_POST['id_cliente'];
        $nom_cli = $_POST['nom_cli'];
        $cel_cli = $_POST['tel_cli'];
        $dir_cli = $_POST['dir_cli'];

        $validar = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
        $validando = $connection->query($validar);
        if(!$validando-> num_rows >0){
            ?>
                <script>
                    alert("La identificación no esta registrada");
                </script>
            <?php
        }else{
        $sql1 = "UPDATE clientes SET nombre_cliente = '$nom_cli', celular_cliente = '$cel_cli', direccion_cliente = '$dir_cli' where id_cliente = '$id_cliente'";
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
                alert("Cliente actualizado correctamente")
            </script>
<?php
        }
    }}
} else {
    header:
    "Location: ../login.php";
}

?>