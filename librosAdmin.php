<?php
    include __DIR__ ."/template/header-admin.php";
    require_once __DIR__ . '/includes/funciones.php';
?>
<div class="dashboard__grid">
    <?php
        include_once __DIR__ .'/template/sidebar-admin.php';  
    ?>

    <main class="dashboard__contenido">
        <h1>Tabla Libros</h1>

        <div class="dashboard__contenedor-boton">
            <a class="dashboard__boton" href="crear.php">
                <i class="fa-solid fa-circle-plus"></i>
                Añadir Libro
            </a>
        </div>
        <?php 
            require_once __DIR__ . '/controllers/BookController/obtenerLibros.php';
            $libros = obtenerLibrosPorCategoria($_GET['categoria'] ?? "all");
        ?>
        <table id="books-table" class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">ISBN</th>
                    <th scope="col" class="table__th">Título</th>
                    <th scope="col" class="table__th">Autor</th>
                    <th scope="col" class="table__th">Edición</th>
                    <th scope="col" class="table__th">Categoría</th>
                    <th scope="col" class="table__th">Precio</th>
                    <th scope="col" class="table__th">Stock</th>
                    <th scope="col" class="table__th">Imagen</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($libros as $libro){ ?>
                    
                    <tr class="table__tr">
                        <td class="table__td"><?= $libro->bookIsbn?></td>
                        <td class="table__td"><?= $libro->bookTitle?></td>
                        <td class="table__td"><?= $libro->bookAuthor?></td>
                        <td class="table__td"><?= $libro->bookEdition?></td>
                        <td class="table__td"><?= $libro->bookCategory?></td>
                        <td class="table__td">$<?= $libro->bookPrice?></td>
                        <td class="table__td"><?= $libro->bookStock?></td>
                        <td class="table__td"><img class="table__imagen" src="./build/imagenes/<?= $libro->imagen ?>" alt="<?= $libro->bookTitle?>"></td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="<?= $GLOBALS["raiz_sitio"] . "editar.php?id=" . $libro->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <button class="table__accion table__accion--ver">
                                <i class="fa-solid fa-eye"></i>
                                Ver
                            </button>

                            <form method="POST" action="./controllers/BookController/eliminarLibro.php" class="table__formulario">
                                <input type="hidden" name="id" value="<?=$libro->id?>">
                                <button class="table__accion table__accion--eliminar eliminarBtn" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php };?>
            </tbody>
            <tfoot class="table__thead">
                <tr>
                    <th scope="col" class="table__th">ISBN</th>
                    <th scope="col" class="table__th">Título</th>
                    <th scope="col" class="table__th">Autor</th>
                    <th scope="col" class="table__th">Edición</th>
                    <th scope="col" class="table__th">Categoría</th>
                    <th scope="col" class="table__th">Precio</th>
                    <th scope="col" class="table__th">Stock</th>
                    <th scope="col" class="table__th">Imagen</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </tfoot>
        </table>
        <!-- table -->
    </main>
</div>
<?php
    $respuesta = $_GET['respuesta'] ?? null;
    if ($respuesta) {
        ?>
    <div id="alertElement" data-response="<?= htmlspecialchars(json_encode($respuesta)) ?>"></div>
<?php } ?>
<?php
    include __DIR__ ."/template/footer-admin.php";
?>