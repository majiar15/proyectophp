<?php

require_once 'models/usuario.php';

class usuarioController extends AbstractController{

    public function index() {
        echo 'controlador Usuarios, Accion index';
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }
    
    public function save() {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : FALSE;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : FALSE;
            $email = isset($_POST['email']) ? $_POST['email'] : FALSE;
            $password = isset($_POST['password']) ? $_POST['password'] : FALSE;

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save = $usuario->save();
                if ($save) {
                    $_SESSION['register'] = "complete";
     echo "<script> location.href='http://localhost/master-php/aprendiendophp/usuario/registro'; </script>";
                }
            } else {
                $_SESSION['register'] = "failed";
     echo "<script> location.href='http://localhost/master-php/aprendiendophp/usuario/registro'; </script>";
            }
        } else {
            $_SESSION['register'] = "failed";
     echo "<script> location.href='http://localhost/master-php/aprendiendophp/usuario/registro'; </script>";
        }
    }

    public function login() {
        if (isset($_POST)) {
            //identificar al usuario
            //consulta a la base de datos
            $usuario = new usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                if ($identity->tipo == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida!!';
            }


            //crear una session
        }

        echo "<script> location.href='http://localhost/master-php/aprendiendophp/productos/index'; </script>";
    }

    public function logout() {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        echo "<script> location.href='http://localhost/master-php/aprendiendophp/productos/index'; </script>";
    }

//fin clase
}
