<?php
require_once __DIR__ . '/../../models/LibroModel.php';
require_once __DIR__ . "/../../includes/app.php";

function obtenerLibrosPorCategoria($categoria)
{

    if($categoria === "all"){
        $libros = LibroModel::all();
    }else{
        $libros = LibroModel::whereAll("bookCategory", $categoria);
    }
    return $libros;
}

function obtenerCategorias()
{
    $libros = LibroModel::all();
    $nombresCategorias = array_column($libros, 'bookCategory');

    // Eliminar las categorías duplicadas
    $categoriasUnicas = array_unique($nombresCategorias);

    return $categoriasUnicas;
}

function filtrarLibros()
{
    $libros = LibroModel::all();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        //Filtrar por titulo
        if($_POST['titulo'] !== ""){
            foreach ($libros as $key => $libro) {
                $titulo = $libro->bookTitle;
            
                if (stripos($titulo, $_POST['titulo']) === false) {
                    // Si el título contiene el string, agregar el libro al nuevo arreglo de libros filtrados
                    unset($libros[$key]);
                }
            }
        }

        //Filtrar por autor
        if($_POST['autor'] !== ""){
            foreach ($libros as $key => $libro) {
                $titulo = $libro->bookAuthor;
            
                if (stripos($titulo, $_POST['autor']) === false) {
                    // Si el título contiene el string, agregar el libro al nuevo arreglo de libros filtrados
                    unset($libros[$key]);
                }
            }
        }

        //Filtrar por categoría
        if(isset($_POST['categorias'])){
            foreach ($libros as $key => $libro) {
                $titulo = $libro->bookCategory;
            
                if (stripos($titulo, $_POST['categorias']) === false) {
                    // Si el título contiene el string, agregar el libro al nuevo arreglo de libros filtrados
                    unset($libros[$key]);
                }
            }
        }
    }    
    return $libros;

}