<?php
include __DIR__ . "/template/header-admin.php";
?>
<div class="dashboard__grid">
    <?php
    include_once __DIR__ . '/template/sidebar-admin.php';
    ?>

    <main class="dashboard__contenido">
        <section class="crear">

            <h1 class="crear__titulo">Editar Libro</h1>

            <div class="crear__contenedor">

                <?php 
                    require_once __DIR__ . '/controllers/BookController/buscarLibro.php';
                    $libro = buscarLibro($_GET['id']);
                ?>

                <form id="libro-editar-form" class="formulario-crear" method="POST" action="./controllers/BookController/editarLibro.php" enctype="multipart/form-data">

                    <input name="id" type="hidden" value="<?= $libro->id?>">

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookIsbn" type="text" value="<?= $libro->bookIsbn?>">
                        <span></span>
                        <label class="formulario-crear__label">ISBN</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookTitle" type="text" value="<?= $libro->bookTitle?>">
                        <span></span>
                        <label class="formulario-crear__label">Título</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookAuthor" type="text" value="<?= $libro->bookAuthor?>">
                        <span></span>
                        <label class="formulario-crear__label">Autor</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookEdition" type="text" value="<?= $libro->bookEdition?>">
                        <span></span>
                        <label class="formulario-crear__label">Edición</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookCategory" type="text" value="<?= $libro->bookCategory?>">
                        <span></span>
                        <label class="formulario-crear__label">Categoría</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookPrice" type="number" value="<?= $libro->bookPrice?>">
                        <span></span>
                        <label class="formulario-crear__label">Precio</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookStock" type="number" value="<?= $libro->bookStock?>">
                        <span></span>
                        <label class="formulario-crear__label">Stock</label>
                    </div>

                    <div class="formulario-crear__imagen">
                        <label class="formulario-crear__label--imagen">Imagen</label>
                        <br>
                        <input class="formulario-crear__input--imagen" type="file" name="bookImage" accept="image/*"  alt="">
                        <?php if($libro->imagen){ ?>
                            <img class="img-small" src="./build/imagenes/<?php echo $libro->imagen ?>">
                        <?php } ?>  
                        <span></span>
                    </div>

                    <br>
                    <br>

                    <input type="submit" value="Enviar" class="formulario-crear__input--submit" id="submitLibro">


                </form>
            </div>

            <a class="crear__regresar" href="librosAdmin.php">Regresar</a>

        </section>

        <div id="modalAlerta" class="modalAlerta">
            <div class="modal-content">
                <span class="close">&times;</span>
                <i class="fa-solid fa-triangle-exclamation fa-lg"></i>
                <p id="modal-message"></p>
            </div>
        </div>

    </main>
</div>

<?php
include __DIR__ . "/template/footer-admin.php";
?>