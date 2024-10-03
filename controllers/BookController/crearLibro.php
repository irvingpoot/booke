<?php
require_once __DIR__ . '/../../models/LibroModel.php';
require_once __DIR__ . "/../../includes/app.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $libro = new LibroModel($_POST);
    if (is_uploaded_file($_FILES["bookImage"]["tmp_name"])) {
        $nombreImg = $_FILES["bookImage"]["name"];
        $libro->setImagen($nombreImg);
    }

    $carpetaImg = $_SERVER["DOCUMENT_ROOT"] . "/tienda-libros-app-web/build/imagenes/";
    if(!is_dir($carpetaImg)){
        mkdir($carpetaImg);
    }
    //Guardar imagen en el servidor
    move_uploaded_file($_FILES["bookImage"]["tmp_name"], $carpetaImg . $nombreImg);

    //Guardar en la DB
    $resultado = $libro->guardar();
    if($resultado){
        $respuesta = [
            'respuesta' => [
                'title'   => 'Creación exitosa',
                'message' => 'Se ha creado el libro correctamente',
                'type'    => 'success',
            ]
        ];
    }else{
        $respuesta = [
            'respuesta' => [
                'title'   => 'Oops! Ha ocurrido un error.',
                'message' => 'Ha ocurrido un error al crear los datos del libro, por favor intente nuevamente.',
                'type'    => 'error',
            ]
        ];
    }
    header("Location: " . $GLOBALS["raiz_sitio"] . "librosAdmin.php?" . http_build_query($respuesta));
}