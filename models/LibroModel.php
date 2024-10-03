<?php
require_once "ActiveRecord.php";

class LibroModel extends ActiveRecord{
    protected static $nombreTabla = "books";
    protected static $columnasDB = ['id', 'bookIsbn', 'bookTitle', 'bookAuthor', 'bookEdition', 'bookCategory', 'bookStock', 'imagen', 'bookPrice'];

    public $id;
    public $bookIsbn;
    public $bookTitle; 
    public $bookAuthor; 
    public $bookEdition; 
    public $bookCategory; 
    public $bookStock; 
    public $imagen;
    public $bookPrice;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->bookIsbn = $args["bookIsbn"] ?? "";
        $this->bookTitle = $args["bookTitle"] ?? "";
        $this->bookAuthor = $args["bookAuthor"] ?? "";
        $this->bookEdition = $args["bookEdition"] ?? "";
        $this->bookCategory = $args["bookCategory"] ?? "";
        $this->bookStock = $args["bookStock"] ?? 0;
        $this->imagen = $args["imagen"] ?? "";
        $this->bookPrice = $args["bookPrice"] ?? 0;
    }
}