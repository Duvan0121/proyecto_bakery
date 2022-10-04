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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" media="all" href="../css/opciones.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <title>Opciones</title>
    </head>

    <body>
        <div class="hero">
            <div class="padre animated fadeInUp">
                <h1>Proveedores</h1>

                <div class="opciones">
                    <button onclick="location.href='../crud/registrar_proveedor.php'"><span>Registrar un proveedor</span><i></i> </button>
                    <button onclick="location.href='../crud/modificar_proveedor.php'"><span>Modificar un proveedor</span><i></i> </button>
                    <button onclick="location.href='../crud/eliminar_proveedor.php'"><span>Eliminar un proveedor</span><i></i> </button>
                    <button onclick="location.href='../crud/consultar_proveedor.php'"><span>Consultar los proveedores</span><i></i> </button>
                    <button onclick="location.href='../includes/opcion_admin.php'"><span>Volver atras</span><i></i> </button>
                </div>
            </div>

        </div>

    </body>

    </html>
<?php
}
else{
    header ("location: ../login.php");
}

?>