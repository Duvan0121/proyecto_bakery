<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Login in</title>
    <link rel="stylesheet" media="all" href="css/inicio.css" />
    <link rel="stylesheet" href="../css/inicio.css">
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
                        <label class="user-label">Digite su contraseña: </label>
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