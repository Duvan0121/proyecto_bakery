<?php
include 'conexion.php'; 
$connection = conectar();
session_start();
$user=$_SESSION['user'];
$pass=$_SESSION['pass'];
$guardar = mysqli_query($connection, "SELECT * FROM  roles WHERE usuario = '$user' AND contraseña = '$pass'" );
$fila = mysqli_fetch_array($guardar);


if ($fila['rol'] ==2){
    header("location:opcion_basic.php");
}

elseif($fila['rol'] == 0){
    header("location: ../login.php");
}



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" media="all" href="../css/opciones.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <title>Opciones</title>
    </head>

    <body>
        <div class="hero">
            <div class="padre animated fadeInUp">
                <h1>Opciones</h1>

                <div class="opciones">
                    <button onclick="location.href='../interfaz/venta.php'"><span>VENTAS</span><i></i> </button>
                    <button onclick="location.href='../interfaz/venta.php'"><span>COMPRAS</span><i></i> </button>
                    <button onclick="location.href='../interfaz/cliente.php'"><span>CLIENTES</span><i></i> </button>
                    <button onclick="location.href='../interfaz/proveedor.php'"><span>PROVEEDORES</span><i></i> </button>
                    <button onclick="location.href='../interfaz/venta.php'"><span>INVENTARIO</span><i></i> </button>

                    <button onclick="location.href='../includes/salir.php'"><span>Cerrar Sesión</span><i></i> </button>
                </div>
            </div>



            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>


        </div>

    </body>

    </html>



<?php


?>