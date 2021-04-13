<?php
require_once 'Conexion.php';

class Categoria {
    private $cnx;
    
    function __construct()
    {
        $this->cnx = Conexion::conectar();
    }
    function listarCategorias(){
        $sql = "call listAll_Category();";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function empresasByCategoria($idCat) {
        $sql = "CALL businessBy_Category($idCat);"; 
        if($this->cnx->query($sql,PDO::FETCH_ASSOC)){

            return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();

        }                
        

        
        
    }
}
?>