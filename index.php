<?php
    require_once __DIR__ . '/controllers/LoginController/login.php';
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
        <title>Iniciar Sesión</title>
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
                <h1 class="login__titulo">Iniciar Sesión</h1>
                
                <?php 
                    $response = iniciarSesion();
                    $errors = $response['errors'] ?? [];
                    $usuario = $response['usuario'] ?? "";
                ?>
                <form class="formulario-login" method="post">
                    <div class="formulario-login__campo">
                        <input class="formulario-login__input" name="userEmail" type="text" value="<?= $usuario->userEmail ?? "" ?>" required>
                        <span></span>
                        <label class="formulario-login__label">Usuario</label>
                    </div>
                    <?php if (isset($errors['userEmail'])) : ?>
                        <div class="invalid-feedback">
                            <?= $errors['userEmail'] ?>
                        </div>
                    <?php endif ?>

                    <div class="formulario-login__campo">
                        <input class="formulario-login__input" name="userPassword" type="password" required>
                        <span></span>
                        <label class="formulario-login__label">Contraseña</label>
                    </div>
                    <?php if (isset($errors['userPassword'])) : ?>
                        <div class="invalid-feedback">
                            <?= $errors['userPassword'] ?>
                        </div>
                    <?php endif ?>

                    <a href="#" class="formulario-login__enlace">¿Olvidaste tu contraseña?</a>

                    <input type="submit" value="Ingresar" class="formulario-login__input--submit">

                    <div class="formulario-login__registrarse">
                        ¿No tienes una cuenta? <a href="#" class="formulario-login__registrarse-enlace">Regístrate</a>
                    </div>
                </form>
            </div>
        </main>
        <script src="./build/js/main.min.js"></script>
    </body>
</html>

