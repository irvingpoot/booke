
<?php
function validarSesion()
{
    session_start();
    if (!isset($_SESSION["login"]) || !$_SESSION["login"]) {
        header("Location: " . $GLOBALS["raiz_sitio"]);
        exit();
    }
}

function validarAdministrador()
{
    validarSesion();

    if (!isset($_SESSION["isAdmin"]) || !$_SESSION["isAdmin"]) {
        header("Location: " . $GLOBALS["raiz_sitio"] . "home.php");
        exit();
    }
}
