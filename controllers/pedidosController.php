<?php

require_once 'models/pedidos.php';

class pedidosController extends AbstractController {

    public function hacer() {
        require_once 'views/pedido/hacer.php';
    }

    public function add() {
        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $metodo = isset($_SESSION['metodo']) ? $_SESSION['metodo'] : false;
            $stats = Utils::statsCarrito();
            Utils::deleteSession('tarjet');
            $costo = $stats['total'];


            if ($departamento && $ciudad && $direccion && $metodo) {
                //guardar datos en la DB
                $_SESSION['metodo'] = $metodo;
                $pedido = new pedido;
                $pedido->setDepartamento($departamento);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setUsuario_id($usuario_id);
                $pedido->setCosto($costo);
                $pedido->setMetodoPago($metodo);
                $pedido->setEstado('confirmado');

                $save = $pedido->save();

                //guardar ProductoPedido
                $productoPedido = $pedido->saveProductosPedidos();

                if ($save && $productoPedido) {

                    $_SESSION['pedido'] = 'complete';
                    unset($_SESSION['carrito']);
                } else {
                    $_SESSION['pedido'] = 'failed';
                }
            } else {
                $_SESSION['pedido'] = 'failed';
            }

            echo "<script> location.href='http://localhost/master-php/aprendiendophp/pedidos/confirmado'; </script>";
        } else {
            //redirigir al index
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/producto/index'; </script>";
        }
    }

    public function confirmado() {
        if ($_SESSION['identity']) {
            $identity = $_SESSION['identity'];
            $pedido = new pedido;
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOneUser();


            $pedido_productos = new pedido;
            $productos = $pedido_productos->getProdictosByPedidos($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function metodo() {
        require_once 'views/pedido/metodo.php';
    }

    public function metodoPago() {
        if (isset($_POST)) {
            if (isset($_POST['metodo']) && $_POST['metodo'] == 'pago online') {

                require_once 'views/pedido/pagoOnline.php';
            } else if (isset($_POST['metodo']) && $_POST['metodo'] == 'contra ') {
                $_SESSION['metodo'] = 'contra entrega';
                require_once 'views/pedido/hacer.php';
            } else if (isset($_SESSION['tarjet']) && $_SESSION['tarjet'] == 'failed'){
                require_once 'views/pedido/pagoOnline.php';
            }


            if (isset($_POST['tarjeta']) && isset($_POST['mes']) && isset($_POST['año']) && isset($_POST['CVV'])) {


                $tarjeta = isset($_POST['tarjeta']) ? $_POST['tarjeta'] : false;
                $mes = isset($_POST['mes']) ? $_POST['mes'] : false;
                $año = isset($_POST['año']) ? $_POST['año'] : false;
                $cvv = isset($_POST['CVV']) ? $_POST['CVV'] : false;

                $nombreTitular = isset($_POST['nombreTitular']) ? $_POST['nombreTitular'] : false;

                if ($tarjeta && $mes && $año && $cvv && $nombreTitular) {
                    if (($tarjeta[0] == '4' || $tarjeta[0] == '5' || $tarjeta[0] == '3') && is_numeric($tarjeta)) {

                        if (is_numeric($mes) && is_numeric($año) && is_numeric($cvv)) {
                            $_SESSION['metodo'] = 'pago online';
                            require_once 'views/pedido/hacer.php';
                        } else {
                            $_SESSION['tarjet'] = 'failed';
                            require_once 'views/pedido/pagoOnline.php';
                        }
                    } else {
                        $_SESSION['tarjet'] = 'failed';
                        require_once 'views/pedido/pagoOnline.php';
                    }
                } else {
                    $_SESSION['tarjet'] = 'failed';
                    require_once 'views/pedido/pagoOnline.php';
                }
            }
        }
    }

    public function misPedidos() {
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new pedido;
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllOneByUser();

        require_once 'views/pedido/misPedidos.php';
    }

    public function detalle() {
        Utils::isIdentity();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $pedido = new pedido;
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            $pedido_productos = new pedido;
            $productos = $pedido_productos->getProdictosByPedidos($id);
            require_once 'views/pedido/detalle.php';
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/pedidos/misPedidos'; </script>";
        }
    }

    public function gestion() {
        Utils::isAdmin();
        $gestion = true;

        $pedido = new pedido();
        $pedidos = $pedido->getAll();


        require_once 'views/pedido/misPedidos.php';
    }

    public function estado() {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {

            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            $pedido = new pedido;
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            echo "<script> location.href='http://localhost/master-php/aprendiendophp/pedidos/detalle&id={$id}'; </script>";
        } else {
            echo "<script> location.href='http://localhost/master-php/aprendiendophp/productos/index'; </script>";
        }
    }

    public function index() {
        
    }

    public function save() {
        
    }

}
