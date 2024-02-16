<?php
    $page = "home";
    include __DIR__ ."/template/header.php";
?>
<main class="home contenedor">
    <div class="home__grid">
        <div class="home__contenedor">
            <div class="home__contenido">
                <p class="home__titulo">Compra libros por el mejor <span class="home__titulo-span">precio</span></p>
                <p class="home__subtitulo">¡Descubre los mejores precios para comprar libros!</p>
                <div class="home__buscador">
                    <a href="catalogo.php" class="home__buscador-enlace">
                        <picture>
                            <source srcset="./build/img/Boton-Buscar.avif" type="image/avif">
                            <source srcset="./build/img/Boton-Buscar.webp" type="image/webp">
                            <img class="home__boton-buscar" loading="lazy" src="./build/img/Boton-Buscar.png" alt="Buscar">
                    </picture>
                        <picture>
                            <source srcset="./build/img/flecha.avif" type="image/avif">
                            <source srcset="./build/img/flecha-Buscar.webp" type="image/webp">
                            <img class="home__boton-flecha" loading="lazy" src="./build/img/flecha.png" alt="Buscar">
                        </picture>
                    </a>
                </div>
            </div>
        </div>
        <div class="home__contenido-imagen">
            <picture>
                <source srcset="./build/img/homeIcon.avif" type="image/avif">
                <source srcset="./build/img/homeIcon-Buscar.webp" type="image/webp">
                <img class="home__imagen" loading="lazy" src="./build/img/homeIcon.png" alt="IconoHome">
            </picture>
        </div>
    </div>
</main>
<?php
    $respuesta = $_GET['respuesta'] ?? null;
    if ($respuesta) {
        ?>
    <div id="alertElement" data-response="<?= htmlspecialchars(json_encode($respuesta)) ?>"></div>
<?php } ?>
<?php
    include __DIR__ ."/template/footer.php";
?>
