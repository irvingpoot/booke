<?php
    require_once __DIR__ . '/controllers/LoginController/login.php';

    $servidor ="localhost" ;
    $usuario = "root";
    $clave= "";
    $base_datos="booke";

    $enlace = mysqli_connect ($servidor,$usuario,$clave,$base_datos);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&family=Righteous&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./build/css/app.css">
        <title>Recuperar contraseña</title>
    </head>

    <body>
        <main class="login">
            <div class="rectangle"></div>
            <div class="chandelier"></div>
            <div class="person"></div>

            <div class="login__contenedor">
                <div class="login__img">
                    <picture>
                        <source srcset="./build/img/logo.avif" type="image/avif">
                        <source srcset="./build/img/logo.webp" type="image/webp">
                        <img loading="lazy" width="200" height="200" src="./build/img/logo.png" alt="Logo">
                    </picture>
                </div>
                <h1 class="login__titulo">Recupera tu contraseña</h1>
                
                <form class="formulario-login" method="get">
                    <div class="formulario-login__campo">
                        <input class="formulario-login__input" name="email" type="text" required>
                        <span></span>
                        <label class="formulario-login__label">Correo</label>
                    </div>

                    <input type="submit" value="Recuperar Contraseña" class="formulario-login__input--submit" name="recuperar" href="index.php">

                    <div class="formulario-login__registrarse">
                        <a href="index.php" class="formulario-login__registrarse-enlace">Regresar</a>
                    </div>
                </form>
            </div>
        </main>
        <script src="./build/js/main.min.js"></script>
    </body>

    <?php

    if(isset($_GET['recuperar'])){

        $email =$_GET['email'];

        $consultardatos = "SELECT userPassword FROM users WHERE userEmail = '$email'";

        $resultado = mysqli_query($enlace,$consultardatos);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $contraseña = $fila['userPassword'];
            echo "<script>alert('Contraseña: $contraseña');</script>";
            
        } else {
            echo "<script>alert('No se encontró la contraseña asociado a su cuenta.');</script>";
        }
    }

    ?>



</html>
