<?php
require_once __DIR__ . '/../../models/UsuarioModel.php';
require_once __DIR__ . "/../../includes/app.php";

function iniciarSesion()
{
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $usuario = new UsuarioModel($_POST);
        $errores = $usuario->validar();
    
        if (empty($errores)) {
            $existeUsuarioBD = $usuario->comprobarUsuario();
    
            if ($existeUsuarioBD) {
                $contraseñaCorrecta = $usuario->comprobarPassWord($existeUsuarioBD);
    
                if ($contraseñaCorrecta) {
                    $usuarioBD = $usuario->where("userEmail", $_POST["userEmail"]);
                    $usuario->sincronizar($usuarioBD);
                    $usuario->autenticar();
                } else {
                    $errores = UsuarioModel::getErrores();
                }
            } else {
                $errores = UsuarioModel::getErrores();
            }
        }
    
        return ['errors' => $errores, 'usuario' => $usuario];
    }else{
        return [];
    }
}