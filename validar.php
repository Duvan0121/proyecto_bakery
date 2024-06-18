<?php
// Incluir archivo de conexión
include('includes/conexion.php');

// Iniciar la sesión
session_start();

// Verificar si se ha enviado el formulario
if(isset($_POST['iniciar'])) {
    // Obtener usuario y contraseña del formulario
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    // Conexión a la base de datos
    $connection = conectar();
    
    // Consulta SQL segura utilizando consulta preparada para evitar SQL injection
    $stmt = mysqli_prepare($connection, "SELECT * FROM roles WHERE usuario = ? AND contraseña = ?");
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Verificar si se encontraron resultados
    if(mysqli_num_rows($result) == 1) {
        $fila = mysqli_fetch_assoc($result);
        
        // Asignar el rol a la sesión
        $_SESSION['rol'] = $fila['rol'];
        
        // Redireccionar según el rol
        if($fila['rol'] == 1) {
            header("Location: http://localhost/proyecto_bakery/includes/opcion_admin.php");
            exit; // Asegurar salida después de redireccionamiento
        } elseif($fila['rol'] == 2) {
            header("Location: http://localhost/proyecto_bakery/includes/opcion_basic.php");
            exit; // Asegurar salida después de redireccionamiento
        }
    } else {
        $error = "Usuario o contraseña incorrecta";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/inicio.css">
</head>
<body>
    <div class="hero">
        <div class="login animated fadeInUp">
            <h2>The Bakery</h2>
            <div class="box-sign-in">
                <img src="images/login.jpg" id="logo">
                <h1>Iniciar Sesión</h1>
                <form class="animated fadeInUp" action="validar.php" method="post" id="login">
                    <div>
                        <input type="text" name="user" class="user" id="user" required>
                        <label class="user-label">Digite su usuario:</label>
                        <input type="password" name="pass" class="user" id="pass" required>
                        <label class="user-label">Digite su contraseña:</label>
                        <br><br>
                        <?php if(isset($error)): ?>
                            <p class="aviso"><?= $error ?></p>
                        <?php endif; ?>
                    </div>
                    <button name="iniciar" id="submit"> <span>Iniciar Sesión</span></button>
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
