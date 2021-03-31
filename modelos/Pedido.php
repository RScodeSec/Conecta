<?php
require_once 'Conexion.php';

class Pedido {
    private $cnx;
    public $idPed,$idCli,$fecha,$idProd,$nombre,$apellido,$cantidad,$telefono,$direccion,$comments;
            
    //$idCli = 0,$idProd = 0,$cantidad = 0,$comments = null,$nombre = null,$apellido = null,$telefono = null,$direccion = null)
    function __construct($idCli = 0,$idProd = 0,$nombre = null,$apellido = null,$cantidad = 0,$telefono = null,$direccion = null,$comments = null)
    {
        $this->idCli = $idCli;
        $this->fecha = date('Y-m-d H:i:s');
        $this->idProd = $idProd;

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cantidad = $cantidad;
        $this->telefono = $telefono;
        $this->direccion = $direccion;        
        $this->comments = $comments;

        $this->cnx = Conexion::conectar();
    }
    function mostrarPedidosByRuc($ruc) {
        $sql = "SELECT ped.IdPedido,prod.NomProducto,prod.Imagen,CONCAT(ped.nombre,' ',ped.apellido) AS NombreCompleto,ped.Cantidad,ped.Fecha,ped.Telefono,ped.Direccion,ped.Comentarios
                FROM pedidos ped 
                INNER JOIN productos prod 
                ON ped.IdProducto = prod.IdProducto
                WHERE prod.RucEmpresa = '{$ruc}' AND ped.Estado = true AND ped.Vendido = false;";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }

    /*function mostrarPedidosByRuc($ruc) {
        $sql = "SELECT ped.IdPedido,prod.NomProducto,CONCAT(c.Nombre,' ',c.Apellido) AS NombreCompleto,ped.Cantidad,ped.Fecha,c.Telefono,c.Direccion,ped.Comentarios
                FROM pedidos ped INNER JOIN productos prod ON ped.IdProducto = prod.IdProducto
                INNER JOIN clientes c ON ped.IdCliente = c.IdCliente
                WHERE prod.RucEmpresa = '{$ruc}' AND ped.Estado = true AND ped.Vendido = false;";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }*/
    function eliminarPedido(int $idPed) {
        $sql = "UPDATE `pedidos` SET `Estado` = false WHERE `IdPedido` = {$idPed};";
        return $this->cnx->query($sql);
    }

    //::::::::::::::::here new code for process order
    function realizarPedido(Pedido $p){
        $sql = "INSERT INTO `pedidos`(`Fecha`,`IdProducto`,`nombre`,`apellido`,`Cantidad`,`telefono`,`direccion`,`Comentarios`)
        VALUES(?,?,?,?,?,?,?,?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(1,$p->fecha);
        $stmt->bindParam(2,$p->idProd,PDO::PARAM_INT);
        $stmt->bindParam(3,$p->nombre,PDO::PARAM_STR);
        $stmt->bindParam(4,$p->apellido,PDO::PARAM_STR);
        $stmt->bindParam(5,$p->cantidad,PDO::PARAM_INT);        
        $stmt->bindParam(6,$p->telefono);
        $stmt->bindParam(7,$p->direccion,PDO::PARAM_STR);        
        $stmt->bindParam(8,$p->comments,PDO::PARAM_STR);
              
        return $stmt->execute();

    }
    
}
?>