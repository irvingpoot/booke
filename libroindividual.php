<?php
    $page = 'libroIndividual';
    include __DIR__ ."/template/header.php";
?>
<?php
    $heroTitle = 'Datos Libro';
    include __DIR__ ."/template/hero.php";
?>
<main>
    <?php 
        require_once __DIR__ . '/controllers/BookController/buscarLibro.php';
        $libro = buscarLibro($_GET['id']);
    ?>
    <div class="formulario-carrito-compras">
        <div class="contenedor-info">
            <div class="contenedor-izquierda">
                <div class="contenedor-portada">
                    <picture>
                        <img loading="lazy" width="200" height="200" class="contenedor-portada_img bookImage" src="./build/imagenes/<?= $libro->imagen ?>" alt="portada">
                    </picture>
                </div>
                <div class="pie-de-foto">
                    <div class="pie-de-foto_envio">
                        <i class="fa-solid fa-truck fa-flip-horizontal"></i>
                        <span><p>ENV&Iacute;O GRATIS</p></span>
                    </div>
                </div>
            </div>
            <div class="cont-detalles">
                <div class="detalles-sup">
                    <p class="detalles-sup_negrita"><?= $libro->bookTitle?></p>
                    <label class="detalles-sup_negrita">Precio MXN $<?= $libro->bookPrice?></label><br><br>
                </div>
                <div class="detalles">
                    <span class="detalles__titulo"><p>Detalles del Libro</p></span>
                    <span class="detalles__info">
                        <p>ISBN: <?= $libro->bookIsbn?></p>
                        <p>Autor: <?= $libro->bookAuthor?></p>
                        <p>Disponibles: <?= $libro->bookEdition?></p>
                        <p>Edici&oacute;n: <?= $libro->bookEdition?></p>
                        <p>Categoría: <?= $libro->bookCategory?></p>
                    </span>
                </div>
                <div class="contenedor-carrito">
                    <img hidden class="bookImage" loading="lazy" src="./build/imagenes/<?php echo $libro->imagen ?>" alt="BookDefault">
                    <p hidden class="bookTitle"><?= $libro->bookTitle?></p>
                    <p hidden class="bookPrice">$<?= $libro->bookPrice?></p>
                    <p hidden class="bookdId"><?= $libro->id?></p>
                    <button class="btn-add-cart bookEnlace">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Añadir al carrito
                    </button>
                </div>
            </div>
        </div>
        <a class="boton_regresar" href="catalogo.php">Regresar</a>
    </div>
    
</main>
<?php
    include __DIR__ ."/template/footer.php";
?>