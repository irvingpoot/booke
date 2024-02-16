<?php
    $page = 'catalogo';
    include __DIR__ ."/template/header.php";
?>
<?php
    $heroTitle = 'Catálogo de Productos';
    include __DIR__ ."/template/hero.php";
?>

<main class="catalogo">
    <div class="catalogo__contenedor">

        <?php 
            require_once __DIR__ . '/controllers/BookController/obtenerLibros.php';
            $libros = filtrarLibros();
            $categorias = obtenerCategorias();
        ?>

        <form class="formulario-filtro contenedor" method="POST">
            <div class="formulario-filtro__campo">
                <label for="titulo" class="formulario-filtro__label">Libro</label>
                <input type="text" class="formulario-filtro__input" name="titulo" id="titulo" placeholder="Busca por nombre">
            </div>
            <div class="formulario-filtro__campo">
                <label for="autor" class="formulario-filtro__label">Autor</label>
                <input type="text" class="formulario-filtro__input" name="autor" id="autor" placeholder="Busca por autor">
            </div>
            <div class="formulario-filtro__campo">
                <label for="huespedes " class="formulario-filtro__label">Categoría </label>
                <select class="formulario-filtro__input" name="categorias">
                    <option value="" disabled selected>Selecciona una categoría</option>
                    <?php foreach($categorias as $categoria){ ?>
                        <option value="<?= strtolower($categoria)?>"><?= $categoria?></option>
                    <?php } ?>
                    <!-- Puedes agregar más opciones aquí -->
                </select>
            </div>
            <div class="formulario-filtro__campo">
                <input type="submit" class="formulario-filtro__submit" value="Enviar">
            </div>
        </form>

        <!-- Mensaje de Confirmación -->
        <div id="mensaje-agregado-carrito" class="mensaje-agregado-carrito"></div>


        <div class="catalogo__grid contenedor">
            <?php if(!empty($libros)){ ?>
                <?php foreach($libros as $libro){ ?>
                    <?php if($libro->bookStock > 0){?>
                        <div class="libro">
                            <a href="libroIndividual.php?id=<?= $libro->id;?>">
                                <div class="libro__contenedor-imagen">
                                    <picture>
                                        <img class="libro__imagen bookImage" loading="lazy" src="./build/imagenes/<?php echo $libro->imagen ?>" alt="BookDefault">
                                    </picture>
                                </div>
                                <div class="libro__contenido">
                                    <h2 class="libro__titulo bookTitle"><?= $libro->bookTitle?></h2>
                                    <div class="libro__autor">
                                        <img src="./build/img/User_Square.svg" alt="Autor" class="libro__autor-imagen">
                                        <p  class="libro__autor-nombre"><?= $libro->bookAuthor?></p>
                                    </div>
                                    <p class="libro__categoria"><?= $libro->bookCategory?></p>
                                    <p class="libro__precio bookPrice">$<?= $libro->bookPrice?></p>
                                </div>
                                <p  class="bookdId" hidden><?= $libro->id?></p>
                            </a>
                            <button class="libro__enlace bookEnlace"><i class="fa-solid fa-cart-shopping"></i>Agregar al carrito</button>
                        </div><!--libro-->
                    <?php }; ?>
                <?php };?>
            <?php } else { ?>
                <h1 class="catalogo__titulo-no-registro">No se encontraron resultados que cumplan con los criterios de búsqueda especificados</h1>
            <?php } ?>
        </div>
    </div>
</main>
<?php
    include __DIR__ ."/template/footer.php";
?>