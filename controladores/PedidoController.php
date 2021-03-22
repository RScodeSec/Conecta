<?php
require_once 'modelos/Pedido.php';

class PedidoController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Pedido();
    }
    function mostrarPedidosByRuc() {
        return $this->modelo->mostrarPedidosByRuc($_GET['ruc']);
    }
    function eliminarPedido(){
        return ($this->modelo->eliminarPedido($_POST['idPed']) != false) ?
                ['msg' => 'Pedido eliminado', 'icon' => 'info', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo eliminar el pedido', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }

    //here ad code for administartor order:::::::::::::::::::::::::::::::::::::::::::
        function realizarPedido(){
            $fecha = date('Y-m-d H:i:s');
            $idProd = $_POST['idProduct'];
            $nombre = $_POST['nombres'];
            $apellido = $_POST['apellido'];
            $cantidad = $_POST['cantidad'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $comments = $_POST['comentario'];
           
            $p = new Pedido($fecha,$idProd,$nombre,$apellido,$cantidad,$telefono,$direccion,$comments);
            return ($this->modelo->realizarPedido($p)) ? 
                    ['msg' => 'Gracias!! Pedido Realizado Correctamente, en proceso de confirmacion!!', 'icon' => 'success', 'btnText' => 'Continuar'] :
                    ['msg' => 'No se pudo Realizar Pedido', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
        }

}
?>