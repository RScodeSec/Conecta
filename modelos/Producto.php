<?php
require_once 'Conexion.php';

class Producto {
    private $cnx;
    public $idProducto;
    public $rucEmpresa;
    public $nomProducto;
    public $descripcion;
    public $precio;
    public $medida;
    public $stock;
    public $imagen;
    public $ImagenUrl;
    public $imagen1;
    public $imagen2;

    public function __construct($rucEmpresa=null,$nomProducto=null,$descripcion=null,$precio=null,$medida=null,$stock=null,$imagen=null,$ImagenUrl=null,$imagen1=null,$imagen2=null,$idProducto=0)
    {
        $this->idProducto = $idProducto;
        $this->rucEmpresa = $rucEmpresa;
        $this->nomProducto = $nomProducto;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->medida = $medida;
        $this->stock = $stock;
        $this->imagen = $imagen;
        $this->ImagenUrl = $ImagenUrl;
        $this->imagen1 = $imagen1;
        $this->imagen2 = $imagen2;
        $this->cnx = Conexion::conectar();
    }
   
    function productosByRuc(int $ruc){
        $sql = "CALL productsBy_Ruc($ruc);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($ruc));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //here function new product
    function agregarProducto(Producto $p){
        $sql = "INSERT INTO `productos`(`RucEmpresa`,`NomProducto`,`Descripcion`,`Precio`,`Medida`,`Stock`,`Imagen`,`ImagenUrl`,`Imagen1`,`Imagen2`)
                VALUES(?,?,?,?,?,?,?,?,?,?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(1,$p->rucEmpresa,PDO::PARAM_STR,11);
        $stmt->bindParam(2,$p->nomProducto,PDO::PARAM_STR);
        $stmt->bindParam(3,$p->descripcion,PDO::PARAM_STR);
        $stmt->bindParam(4,$p->precio);
        $stmt->bindParam(5,$p->medida,PDO::PARAM_STR);
        $stmt->bindParam(6,$p->stock,PDO::PARAM_INT);
        $stmt->bindParam(7,$p->imagen,PDO::PARAM_STR);
        $stmt->bindParam(8,$p->ImagenUrl,PDO::PARAM_STR);
        $stmt->bindParam(9,$p->imagen1,PDO::PARAM_STR);
        $stmt->bindParam(10,$p->imagen2,PDO::PARAM_STR);
        return $stmt->execute();
    }
    /////////////here update
    function editarProducto(Producto $p){
        $sql = "UPDATE `productos` SET `NomProducto` = ?,`Descripcion` = ?,`Precio` = ?,`Medida` = ?,`Stock` = ?,`Imagen` = ?,`ImagenUrl` = ?,`Imagen1` = ?,`Imagen2` = ?
                WHERE `IdProducto` = ?;";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(1,$p->nomProducto,PDO::PARAM_STR);
        $stmt->bindParam(2,$p->descripcion,PDO::PARAM_STR);
        $stmt->bindParam(3,$p->precio);
        $stmt->bindParam(4,$p->medida,PDO::PARAM_STR);
        $stmt->bindParam(5,$p->stock,PDO::PARAM_INT);
        $stmt->bindParam(6,$p->imagen);
        $stmt->bindParam(7,$p->ImagenUrl);
        $stmt->bindParam(8,$p->imagen1,PDO::PARAM_STR);
        $stmt->bindParam(9,$p->imagen2,PDO::PARAM_STR);

        $stmt->bindParam(10,$p->idProducto,PDO::PARAM_INT);
        return $stmt->execute();
    }



    function eliminarProducto(int $idProd){
        $sql = "UPDATE `productos` SET `Estado` = false WHERE `IdProducto` = {$idProd};";
        return $this->cnx->query($sql);
    }

    function productosByid(int $idmyprod){
        
        $sql = "SELECT * FROM `productos` WHERE `IdProducto` = {$idmyprod};";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($idmyprod));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    ///ad my code 
    function featuredProduct(){
        $sql = "call featured_Products()";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //HERE CODE FOR SEARCH:::::::::::::::::::::::::::::::::::::::::::::::::::::
    function searchedProduct($name)
    {
        $sql = "call searchBy_name('$name');";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);       
    }

    function productosByidSearch(int $idmyprod){
        
        $sql = "SELECT * FROM `productos` WHERE `IdProducto` = {$idmyprod};";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($idmyprod));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    function orderBestSeller(int $rucBest)
    {
        //$sql = "SELECT * FROM `productos` WHERE `IdProducto` = {$idmyprod};";
        $sql = "call OrderBestSeller($rucBest);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        
    }
    /*____________________________________________FILTER SELECT____________________________*/
    function productosByRucFilterDESC(int $ruc){
        $sql = "SELECT * FROM productos WHERE RucEmpresa = {$ruc} AND Estado = 1 ORDER BY Precio DESC";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($ruc));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function productosByRucFilterASC(int $ruc){
        $sql = "SELECT * FROM productos WHERE RucEmpresa = {$ruc} AND Estado = 1 ORDER BY Precio ASC";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($ruc));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function productosByRucFilterPopular(int $ruc){
        $sql = "SELECT pedidos.IdProducto,p.ImagenUrl,p.Imagen,p.NomProducto,p.Descripcion,p.Precio, SUM(pedidos.Vendido) AS MAS_Vendidos FROM pedidos 
        INNER JOIN productos as p 
        ON pedidos.IdProducto=p.IdProducto 
        WHERE p.RucEmpresa = {$ruc} AND p.Estado = 1 AND pedidos.Vendido =1 
        GROUP BY pedidos.IdProducto";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($ruc));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function productosByRucFilterRange(int $ruc, int $valone, int $valtwo){
        $sql = "SELECT * FROM productos WHERE RucEmpresa = {$ruc} AND Estado = 1 AND Precio BETWEEN {$valone} AND {$valtwo}";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($ruc));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
