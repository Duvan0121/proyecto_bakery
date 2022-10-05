<?php
include ('../includes/conexion.php');
$connection = conectar();
session_start();
$user=$_SESSION['user'];

if(isset($_SESSION['user'])){
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
  <h1>Registrar un cliente</h1>
  <div class="container">
    <div class="row">
    <form action="../interfaz/cliente.php">
            <button ><span>volver</span></button>
        </form>
    </div>
    <form action="registrar_cliente.php" method="post">

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
        <button name="registrar_cliente" id="registrar_cliente" > <span>Registrar</span></button>
      </div>

    </form>
    
  </div>
</body>
</html>
<?php

if(isset($_POST['registrar_cliente'])){
  $id_cliente = $_POST['id_cliente'];
  $nom_cli = $_POST['nom_cli'];
  $cel_cli = $_POST['tel_cli'];
  $dir_cli = $_POST['dir_cli'];

  $sql = "SELECT id_cliente FROM clientes";
  $vuelta = mysqli_query($connection, $sql);
  while($row=mysqli_fetch_assoc($vuelta)){
    $id = $row['id_cliente'];
    if($id == $id_cliente){
    ?>
        <script> alert("Identificacion ya registrada"); </script>
    <?php 
    }
  }

    $sql1 = "INSERT INTO clientes(id_cliente, nombre_cliente, celular_cliente, direccion_cliente)
      values ('$id_cliente', '$nom_cli', '$cel_cli', '$dir_cli')";
      error_reporting(0);
      $resultado = mysqli_query($connection, $sql1);
      if(!$connection || !$sql1){?> 
          <script> alert("error con la base de datos")</script>
      <?php
      }else{?>
      <script> alert("Cliente registrado correctamente") </script>
      <?php
      } 
  }
}
else{
  header: "Location: ../login.php";
}

?>

