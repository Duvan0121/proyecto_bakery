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
  <title>Socios</title>
</head>
<body>
  <h1>Registrar un socio</h1>
  <div class="container">
    <div class="row">
    <form action="../interfaz/socio.php">
            <button ><span>volver</span></button>
        </form>
    </div>
    <form action="registrar_socio.php" method="post">

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
        <button name="registrar_socio" id="registrar_socio" > <span>Registrar</span></button>
      </div>

    </form>
    
  </div>
</body>
</html>
<?php

if(isset($_POST['registrar_socio'])){
  $id_soc = $_POST['id_soc'];
  $rol_soc = $_POST['rol_soc'];
  $use_soc = $_POST['use_soc'];
  $con_soc = $_POST['con_soc'];

  $sql = "SELECT id_socio FROM roles";
  $vuelta = mysqli_query($connection, $sql);
  while($row=mysqli_fetch_assoc($vuelta)){
    $id = $row['id_socio'];
    if($id == $id_soc){
    ?>
        <script> alert("socio ya registrado"); </script>
    <?php 
    }
  }

    $sql1 = "INSERT INTO roles(id_socio, rol, usuario, contraseña)
      values ('$id_soc', '$rol_soc', '$use_soc', '$con_soc')";
      
      $resultado = mysqli_query($connection, $sql1);
      if(!$connection || !$sql1){?> 
          <script> alert("error con la base de datos")</script>
      <?php
      }else{?>
      <script> alert("Socio registrado correctamente") </script>
      <?php
      } 
  }
}
else{
  header: "Location: ../login.php";
}

?>

