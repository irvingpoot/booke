<?php 
    require_once __DIR__ . '/../includes/funciones.php';
    require_once __DIR__ . '/../config.inc.php';
    include_once __DIR__ . '/../controllers/LoginController/validarSesion.php';
    validarSesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="./build/css/app.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="contenido-header">
            <div class="header__barra">
                <a href="home.php" class="logo">
                    <div class="logo__img">
                        <picture>
                            <source srcset="./build/img/logo.avif" type="image/avif">
                            <source srcset="./build/img/logo.webp" type="image/webp">
                            <img loading="lazy" width="200" height="200" src="./build/img/logo.png" alt="Logo">
                        </picture>
                    </div>
                    <div class="logo__texto">
                        <h1 class="logo__titulo">Booke</h1>
                        <h2 class="logo__subtitulo">Tienda de libros en linea</h2>
                    </div>
                </a>

                <nav class="navegacion">
                    <a href="catalogo.php" class="navegacion__enlace<?= ($page === 'catalogo' ) ? "--active" : ""?>">Libros</a>
                    <a href="contacto.php" class="navegacion__enlace<?= ($page === 'contacto' ) ? "--active" : ""?>">Contacto</a>
                </nav>

                <div class="header__iconos">
                    <a href="carrito.php" class="header__iconos-enlace"><i class="fa-solid fa-cart-shopping"></i></a>
                    <div class="header__usuario">
                        <i class="fa-solid fa-circle-user header__iconos-enlace"></i>
                        <div class="dropwdown">
                            <ul class="dropwdown__contenido">
                                <li class="dropwdown__elemento">
                                    <p class="dropwdown__usuario">Usuario: <?= $_SESSION["name"]?></p>
                                </li>
                                <li class="dropwdown__elemento">
                                    <a href="./controllers/LoginController/cerrarSesion.php" class="dropwdown__cerrar-sesion"><i class="fa-solid fa-door-open"></i> Cerrar Sesion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </header>