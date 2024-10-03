<?php
require_once __DIR__ . '/../../models/LibroModel.php';
require_once __DIR__ . "/../../includes/app.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $id = $_POST["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $respuesta = [
        'respuesta' => [
            'title'   => 'Oops! Ha ocurrido un error.',
            'message' => 'Ha ocurrido un error al eliminar los datos del libro, por favor intente nuevamente.',
            'type'    => 'error',
        ]
    ];

    if($id){
        $libro = LibroModel::find($id);
        $resultado = $libro->eliminar();
        if($resultado){
            $libro->borrarImagen();
            $respuesta = [
                'respuesta' => [
                    'title'   => 'Eliminación exitosa',
                    'message' => 'Se ha eliminado el libro correctamente',
                    'type'    => 'success',
                ]
            ];
        }
    }

    header("Location: " . $GLOBALS["raiz_sitio"] . "librosAdmin.php?" . http_build_query($respuesta));
    exit;
}