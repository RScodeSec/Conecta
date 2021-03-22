<?php
require_once 'modelos/Venta.php';

class VentaController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Venta();
    }
    function showVentasByRuc(){
        return $this->modelo->showVentasByRuc($_GET['ruc']);
    }
    function confirmarVenta(){
        return ($this->modelo->confirmarVenta($_POST['idPed']) != false) ? 
                ['msg' => 'Venta confirmada', 'icon' => 'success', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo confirmar la venta', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }
}