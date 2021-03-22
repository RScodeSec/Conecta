<?php
require_once 'Conexion.php';

class Venta {
    private $cnx;

    function __construct()
    {
        $this->cnx = Conexion::conectar();
    }
    function showVentasByRuc($ruc) {
        $sql = "SELECT CONCAT(ped.nombre,' ',ped.apellido) AS NombreCompleto,prod.NomProducto,ped.Cantidad,prod.Precio,(prod.Precio*ped.Cantidad) AS Monto,ped.Fecha 
        FROM pedidos ped 
        INNER JOIN productos prod 
        ON ped.IdProducto = prod.IdProducto        
        WHERE prod.RucEmpresa = '{$ruc}' AND ped.Vendido = true;";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }
    function confirmarVenta($idPed) {
        $sql = "UPDATE `pedidos` SET `Vendido` = true WHERE `IdPedido` = {$idPed};";
        return $this->cnx->query($sql);
    }
}
?>