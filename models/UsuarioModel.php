<?php
require_once "ActiveRecord.php";

class UsuarioModel extends ActiveRecord{
    protected static $nombreTabla = "users";
    protected static $columnasDB = ["userId","userFirstName","userLastName", "userEmail", "userPassword", "isAdmin"];

    public $id;
    public $userFirstName;
    public $userLastName; 
    public $userEmail; 
    public $userPassword; 
    public $isAdmin; 

    public function __construct($args = [])
    {
        $this->id = $args["userId"] ?? null;
        $this->userFirstName = $args["userFirstName"] ?? "";
        $this->userLastName = $args["userLastName"] ?? "";
        $this->userEmail = $args["userEmail"] ?? "";
        $this->userPassword = $args["userPassword"] ?? "";
        $this->isAdmin = $args["isAdmin"] ?? 0;
    }

    public function validar(){
        if(!$this->userEmail) {
            self::$errores["userEmail"] = "El email es obligatorio";
        }

        if(!$this->userPassword) {
            self::$errores["userPassword"] = "El password es obligatorio";
        }

        return self::$errores;
    }

    public function comprobarUsuario(){
        $query = "SELECT * FROM " . self::$nombreTabla . " WHERE userEmail = '" . $this->userEmail . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows){
            self::$errores["userEmail"] = "El usuario no existe";
            return false;
        }
        return $resultado;
    }

    
    public function comprobarPassWord($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado = $this->userPassword === $usuario->userPassword;
        if(!$autenticado){
            self::$errores["userPassword"] = "La contraseña es incorrecto"; 
        }
        return $autenticado;
    }

    public function autenticar(){

        //Llenar el arreglo de session
        session_start();
        $_SESSION["email"] = $this->userEmail;
        $_SESSION["name"] = $this->userFirstName . " " . $this->userLastName;
        $_SESSION["isAdmin"] = $this->isAdmin;
        $_SESSION["login"] = true;

        if($this->isAdmin === "1"){
            header("Location: " . $GLOBALS["raiz_sitio"]. "admin.php");
            exit;
        }else{
            header("Location: " . $GLOBALS["raiz_sitio"]. "home.php");
            exit;
        }
    }
}