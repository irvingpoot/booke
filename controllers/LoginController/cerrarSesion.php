<?php
include_once "../../config.inc.php";
//Es necesario activar o inicializar la sesión antes de destruirla
session_start();
//Elimina todas las variables de la sesión 
session_unset();
session_destroy();
header("Location: " . $GLOBALS["raiz_sitio"]);
exit();