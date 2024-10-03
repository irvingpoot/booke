<?php
require_once __DIR__ . "/../../includes/app.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $respuesta = [
        'respuesta' => [
            'title'   => 'Envio exitosa',
            'message' => 'Tu información ha sido recibida con éxito.',
            'type'    => 'success',
        ]
    ];
    header("Location: " . $GLOBALS["raiz_sitio"] . "contacto.php?" . http_build_query($respuesta));

}