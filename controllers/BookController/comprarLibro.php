<?php
require_once __DIR__ . '/../../models/LibroModel.php';
require_once __DIR__ . "/../../includes/app.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if (isset($_POST['bookID']) && isset($_POST['bookCant'])) {
        $bookIDs = $_POST['bookID'];
        $bookCants = $_POST['bookCant'];

        // Verificar si los arreglos tienen la misma longitud
        if (count($bookIDs) === count($bookCants)) {
            $errores = array();
            // Recorrer los arreglos simultáneamente
            for ($i = 0; $i < count($bookIDs); $i++) {
                $id = $bookIDs[$i];
                $cantidad = $bookCants[$i];
                $libro = LibroModel::find($id);

                $nuevaCantidad = $libro->bookStock - $cantidad;
                //echo "bookID: " . $id . ", cantidad: " .  ($libro->bookStock - $cantidad) . "<br>";

                if ($nuevaCantidad < 0) {
                    $errores[] = "Existencias insuficientes para " . $libro->bookTitle . ". Stock : " . $libro->bookStock;
                } else {
                    $libro->bookStock = $nuevaCantidad;
                    $libro->guardar();
                }
            }

        }
    }

    if(empty($errores)){
        $respuesta = [
            'respuesta' => [
                'title'   => 'Pago realizado',
                'message' => 'Se ha realizado la transacción correctamente',
                'type'    => 'success',
            ]
        ];
    }else{
        $respuesta = [
            'respuesta' => [
                'title'   => 'Oops! Ha ocurrido un error.',
                'message' => array_shift($errores),
                'type'    => 'error',
            ]
        ];
    }
    header("Location: " . $GLOBALS["raiz_sitio"] . "home.php?" . http_build_query($respuesta));
    exit;
}