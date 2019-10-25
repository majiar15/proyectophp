<?php

require_once 'models/ArmaPc.php';
require_once 'models/producto.php';

class ArmaPcController extends AbstractController{

    public function index() {


        require_once 'views/ArmaPc/index.php';
    }

    public function procesadores() {
        if (isset($_GET['marca'])) {
            $marca = $_GET['marca'];
            $producto = new ArmaPc;
            $producto->setMarca($marca);
            $productos = $producto->getAllProcesadores();


            require_once 'views/ArmaPc/procesadores.php';
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/index'; </script>";
        }
    }

    public function board() {
        if (isset($_GET['marca'])) {
            $marca = $_GET['marca'];
            $producto = new ArmaPc;
            $producto->setMarca($marca);
            $productos = $producto->getAllBoard();

            require_once 'views/ArmaPc/board.php';
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/index'; </script>";
        }
    }

    public function ram() {
        if (isset($_GET['socket'])) {
            $socket = $_GET['socket'];
            $producto = new ArmaPc;
            $producto->setSocket($socket);
            $productos = $producto->getAllRam();

            require_once 'views/ArmaPc/ram.php';
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/index'; </script>";
        }
    }

    public function discoDuroMecanico() {

        $producto = new ArmaPc;
        $productos = $producto->getAllDiscoDuro('disco duro mecanico');

        require_once 'views/ArmaPc/discoDuroMecanico.php';
    }

    public function discoDuroSolido() {

        $producto = new ArmaPc;
        $productos = $producto->getAllDiscoDuro('disco duro estado solido');

        require_once 'views/ArmaPc/discoDuroSolido.php';
    }

    public function tarjetaGrafica() {

        $producto = new ArmaPc;
        $productos = $producto->getAllTargetaGrafica();

        require_once 'views/ArmaPc/grafica.php';
    }
        public function chazis() {

        $producto = new ArmaPc;
        $productos = $producto->getAllchazis();

        require_once 'views/ArmaPc/chazis.php';
    }

    public function seleccionProcesador() {
        $marca = $_GET['marca'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/board&marca=" . $marca . "'; </script>";
    }

    public function seleccionBoard() {
        $socket = $_GET['socket'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/ram&socket=" . $socket . "'; </script>";
    }

    public function seleccionRam() {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/discoDuroMecanico'; </script>";
    }

    public function seleccionDDMecanico() {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/discoDuroSolido'; </script>";
    }

    public function seleccionDDSolido() {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/tarjetaGrafica'; </script>";
    }
    public function seleccionGrafica() {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/master-php/aprendiendophp/ArmaPc/chazis'; </script>";
    }

    public function save() {
        
    }

}
