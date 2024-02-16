<?php
    $page = 'contacto';
    include __DIR__ ."/template/header.php";
?>


<?php
    $heroTitle = 'Contacto';
    include __DIR__ ."/template/hero.php";

    
?>
<main class="contacto">


    <div class="contacto__contenedor">

        <form class= "formulario-contacto" action="./controllers/PageController/formularioContacto.php" method="POST">

            <div class="formulario-contacto__campo">
                <input class="formulario-contacto__input" name="texto-nombre" type="text" value="">
                <span></span>
                <label class="formulario-contacto__label">Nombre</label>
            </div>

            <div class="formulario-contacto__campo">
                <input class="formulario-contacto__input" name="texto-apellido" type="text" value="">
                <span></span>
                <label class="formulario-contacto__label">Apellido</label>
            </div>

            <div class="formulario-contacto__campo">
                <input class="formulario-contacto__input" name="texto-correo" type="text" value="">
                <span></span>
                <label class="formulario-contacto__label">Correo</label>
            </div>

            <div class="formulario-contacto__campo">
                <input class="formulario-contacto__input" name="numero" type="tel" value="">
                <span></span>
                <label class="formulario-contacto__label">Teléfono</label>
            </div>

            <div class="formulario-contacto__campo-textarea">
                <label class="formulario-contacto__label-textarea">Mensaje</label>
                <span></span>
                <textarea wrap="soft" class="formulario-contacto__textarea" name="mensaje" cols="35" rows="10"></textarea>
            </div>

            <input type="submit" value="Enviar" class="formulario-contacto__input--submit">
        
        </form>
    </div>
    <div id="modalAlerta" class="modalAlerta">
        <div class="modal-content">
            <span class="close">&times;</span>
            <i class="fa-solid fa-triangle-exclamation fa-lg"></i>
            <p id="modal-message"></p>
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