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
        <h1>Modificar un socio</h1>
        <div class="container">
            <div class="row">
                <form action="../interfaz/socio.php">
                    <button><span>volver</span></button>
                </form>
            </div>

            <p>Para poder modificar un socio se usara como referencia la identificación</p>
            <form action="modificar_socio.php" method="post">
            <div class="row">
        <div class="col-25">
          <label for="fname">ID del socio:</label>
        </div>
        <div class="col-75">
          <input type="number" class="input" placeholder="Digite aqui..." name="id_soc" require>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Rol: </label>
        </div>
        <div class="col-75">
        <select name="rol_soc" id="rol_soc">
        <option value="1">administrador</option>
        <option value="2">socio normal</option>
      </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Usuario del socio: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" placeholder="Digite aquí..." name="use_soc" require>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Contraseña del socio: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" placeholder="Digite aquí..." name="con_soc" require>
        </div>
      </div>


      <div class="row">
        <button name="modificar_socio" id="modificar_socio" > <span>Modificar</span></button>
      </div>
            </form>

        </div>
    </body>

    </html>
    
    <?php

    if (isset($_POST['modificar_socio'])) {
        $id_soc = $_POST['id_soc'];
        $rol_soc = $_POST['rol_soc'];
        $use_soc = $_POST['use_soc'];
        $con_soc = $_POST['con_soc'];

        $validar = "SELECT id_socio FROM roles WHERE id_socio = '$id_soc'";
        $validando = $connection->query($validar);
        if(!$validando-> num_rows >0){
            ?>
                <script>
                    alert("La identificación no esta registrada");
                </script>
            <?php
        }else{
        $sql1 = "UPDATE roles SET rol = '$rol_soc', usuario = '$use_soc', contraseña = '$con_soc' where id_socio = '$id_soc'";
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
                alert("Socio actualizado correctamente")
            </script>
<?php
        }
    }}
} else {
    header:
    "Location: ../login.php";
}

?>