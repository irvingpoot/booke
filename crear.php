<?php
include __DIR__ . "/template/header-admin.php";
?>
<div class="dashboard__grid">
    <?php
    include_once __DIR__ . '/template/sidebar-admin.php';
    ?>

    <main class="dashboard__contenido">
        <section class="crear">

            <h1 class="crear__titulo">Crear Libro</h1>

            <div class="crear__contenedor">


                <form id="libro-crear-form" class="formulario-crear" method="POST" action="./controllers/BookController/crearLibro.php" enctype="multipart/form-data">

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookIsbn" type="text" value="">
                        <span></span>
                        <label class="formulario-crear__label">ISBN</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookTitle" type="text" value="">
                        <span></span>
                        <label class="formulario-crear__label">Título</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookAuthor" type="text" value="">
                        <span></span>
                        <label class="formulario-crear__label">Autor</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookEdition" type="text" value="">
                        <span></span>
                        <label class="formulario-crear__label">Edición</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookCategory" type="text" value="">
                        <span></span>
                        <label class="formulario-crear__label">Categoría</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookPrice" type="number" value="">
                        <span></span>
                        <label class="formulario-crear__label">Precio</label>
                    </div>

                    <div class="formulario-crear__campo">
                        <input class="formulario-crear__input" name="bookStock" type="number" value="">
                        <span></span>
                        <label class="formulario-crear__label">Stock</label>
                    </div>

                    <div class="formulario-crear__imagen">
                        <label class="formulario-crear__label--imagen">Imagen</label>
                        <br>
                        <input class="formulario-crear__input--imagen" type="file" name="bookImage" accept="image/*" alt="">
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