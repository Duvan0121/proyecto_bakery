<?php
include('includes/conexion.php');
$connection = conectar();

$user = $_POST['user'];
$pass = $_POST['pass'];
session_start();

if(isset($_POST['iniciar'])){
$_SESSION['user'] = $user;
$_SESSION['pass'] = $pass;
$guardar = mysqli_query($connection, "SELECT * FROM  roles WHERE usuario = '$user' AND contraseña = '$pass'" );
$rol=['rol']; 
$_SESSION['rol'] = $rol;
error_reporting(0);
$fila = mysqli_fetch_array($guardar);

if($fila['rol'] == 1 ){
    header("Location: http://localhost/Version1/includes/opcion_admin.php");
}


elseif($fila['rol'] == 2){
    header("Location: http://localhost/Version1/includes/opcion_basic.php");
}

else{
    ?>
    <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Login in</title>
    <link rel="stylesheet" media="all" href="css/inicio.css" />
    <link rel="stylesheet" href="http://localhost/version1/css/inicio.css">
</head>

<body>
    <div class="hero">
        <div class="login animated fadeInUp">
            <h2>The Bakery</h2>
            <div class="box-sign-in ">
                <img src="images/login.jpg" id="logo">
                <h1>Iniciar Sesion</h1>
                <form class="animated fadeInUp" action="validar.php" method="post" id="login">
                    <div>
                        <input type="text" name="user" class="user" id="user">
                        <label class="user-label">Digite su usuario: </label>
                        <input type="password" name="pass" class="user" id="pass">
                        <label class="user-label">Digite su contraseña: </label> <br><br>
                        <p class="aviso">USUARIO O CONTRASEÑA INCORRECTA</p>
                    </div>
                    <button name="iniciar" id="submit"> <span>Iniciar Sesion</span></button>
                </form>
            </div>
        </div>

        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>

    </div>
</body>
</html>



<?php
}
}
?>