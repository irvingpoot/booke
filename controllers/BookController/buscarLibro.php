<?php
require_once __DIR__ . '/../../models/LibroModel.php';
require_once __DIR__ . "/../../includes/app.php";

function buscarLibro($id)
{
    $libros = LibroModel::find($id);
    return $libros;
}