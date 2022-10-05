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
  <title>Proveedores</title>
</head>
<body>
  <h1>Registrar un proveedor</h1>
  <div class="container">
    <div class="row">
    <form action="../interfaz/proveedor.php">
            <button ><span>volver</span></button>
        </form>
    </div>
    <form action="registrar_proveedor.php" method="post">

      <div class="row">
        <div class="col-25">
          <label for="fname">Nombre del proveedor:</label>
        </div>
        <div class="col-75">
          <input type="text" class="input" placeholder="Digite aqui..." name="nom_pro" require>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Nit: </label>
        </div>
        <div class="col-75">
          <input type="number" class="input" placeholder="Digite aquí..." name="nit_pro" require>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Telefono del proveedor: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" placeholder="Digite aquí..." name="tel_pro" require>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Dirección del proveedor: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" placeholder="Digite aquí..." name="dir_pro" require>
        </div>
      </div>

      <div class="row">
        <button name="registrar_proveedor" id="registrar_proveedor" > <span>Registrar</span></button>
      </div>

    </form>
    
  </div>
</body>
</html>
<?php

if(isset($_POST['registrar_proveedor'])){
  $nit_pro = $_POST['nit_pro'];
  $nom_pro = $_POST['nom_pro'];
  $tel_pro = $_POST['tel_pro'];
  $dir_pro = $_POST['dir_pro'];

  $sql = "SELECT nit_proveedor FROM proveedores";
  $vuelta = mysqli_query($connection, $sql);
  while($row=mysqli_fetch_assoc($vuelta)){
    $nit = $row['nit_proveedor'];
    if($nit == $nit_pro){
    ?>
        <script> alert("Nit ya registrada"); </script>
    <?php 
    }
  }

    $sql1 = "INSERT INTO proveedores(nit_proveedor,nombre_proveedor, telefono_proveedor, direccion_proveedor)
      values ('$nit_pro', '$nom_pro', '$tel_pro', '$dir_pro')";
      error_reporting(0);
      $resultado = mysqli_query($connection, $sql1);
      if(!$connection || !$sql1){?> 
          <script> alert("error con la base de datos")</script>
      <?php
      }else{?>
      <script> alert("Proveedor registrado correctamente") </script>
      <?php
      } 
  }
}
else{
  header: "Location: ../login.php";
}

?>

