<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="<?= $GLOBALS["raiz_sitio"] . "admin.php" ?>" class="dashboard__enlace <?php echo pagina_actual("/tienda-libros-app-web/admin.php") ? "dashboard__enlace--actual" : ""; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu--texto">
                Inicio
            </span>
        </a>

        <a href="<?= $GLOBALS["raiz_sitio"] . "librosAdmin.php?categoria=all" ?>" class="dashboard__enlace <?php echo pagina_actual("/tienda-libros-app-web/librosAdmin.php") ? "dashboard__enlace--actual" : ""; ?>">
            <i class="fa-solid fa-book dashboard__icono"></i>
            <span class="dashboard__menu--texto">
                Libros
            </span>
        </a>

        <?php if(pagina_actual("/tienda-libros-app-web/librosAdmin.php")){ ?>
            <a href="#" class="dashboard__enlace dashboard__enlace--actual dashboard__enlace-categoria">
                <i class="fa-solid fa-list dashboard__icono"></i>
                <span class="dashboard__menu--texto">
                    Categorías
                </span>
            </a>
        <?php } ?>

        <?php 
            require_once './controllers/BookController/obtenerLibros.php';
            $categorias = obtenerCategorias();
        ?>

        <div class="dropwdown-sidebar">
            <ul class="dropwdown-sidebar__contenido">
                <?php foreach($categorias as $categoria){ ?>
                    <li class="dropwdown-sidebar__elemento">
                        <a href="<?= $GLOBALS["raiz_sitio"] . "librosAdmin.php?categoria=" . $categoria ?>"><?= $categoria?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</aside>