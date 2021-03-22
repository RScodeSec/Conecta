<?php
require_once 'controladores/EmpresaController.php';
require_once 'controladores/ProductoController.php';
require_once 'controladores/PedidoController.php';
require_once 'controladores/VentaController.php';
require_once 'controladores/CategoriaController.php';
$e = new EmpresaController();
$prod = new ProductoController();
$ped = new PedidoController();
$v = new VentaController();
$cat = new CategoriaController();
if (isset($_GET['controller'])) {
    $a = $_GET['action'];
    switch ($_GET['controller']) {
        case 'empresa':
            $result = $e->$a();
            if (is_array($result)) {
                if (count($result) > 2) {
                    session_start();
                    $_SESSION['empresa'] = $result;
                    if (ctype_digit(@$result['Distrito'])) {
                        $_SESSION['ubicacion'] = ($e->DepProvByDistrito($result['Distrito']));
                    }
                }
            }
            break;
        case 'producto':
            $result = $prod->$a();
            break;
        case 'pedido':
            $result = $ped->$a();
            break;
        case 'venta':
            $result = $v->$a();
            break;
        case 'categoria':
            $result = $cat->$a();
    }
    echo (is_array($result)) ? json_encode($result) : $result;
} else {
    $e->index();
}
