<?php
require_once 'Conexion.php';

class Empresa {
    private $cnx;
    public $emailPers,$clave,$ruc,$numRucEmp,$nomEmp,$direccion,$titular,$telefono,$descripcion,$logo,$emailEmp,$distrito,$whatsapp,$facebook,$instagram,$logoUrl,$estado,$id,$id_categoria;

    
    function __construct($emailPers = null,$clave = null,$ruc = null,$numRucEmp = null,$nomEmp = null,$id_categoria = 0,$direccion = null,$titular = null,$telefono = null,$logo = null,$logoUrl = null)
    {
        $this->emailPers = $emailPers;
        $this->clave = $clave;
        $this->ruc = $ruc;
        $this->numRucEmp = $numRucEmp;
        $this->nomEmp = $nomEmp;
        $this->id_categoria = $id_categoria;
        $this->direccion = $direccion;
        $this->titular = $titular;
        $this->telefono = $telefono;

        $this->logo = $logo;
        $this->logoUrl = $logoUrl;
        $this->cnx = Conexion::conectar();
    }
    function registrarEmpresa(Empresa $e){
        $sql = 'INSERT INTO empresas(`EmailPers`,`Contrasena`,`NumRucEmp`,`NomEmpresa`,`IdCategoria`,`Direccion`,`NomTitular`,`Telefono`)
                VALUES(?,?,?,?,?,?,?,?)';
        $stmt = $this->cnx->prepare($sql);

        $stmt->bindParam(1,$e->emailPers, PDO::PARAM_STR);
        $password = password_hash($e->clave,PASSWORD_DEFAULT);
        $stmt->bindParam(2,$password);
        $stmt->bindParam(3,$e->ruc, PDO::PARAM_STR, 11);
        $stmt->bindParam(4,$e->nomEmp, PDO::PARAM_STR);
        $stmt->bindParam(5,$e->id_categoria, PDO::PARAM_INT);
        $stmt->bindParam(6,$e->direccion, PDO::PARAM_STR);
        $stmt->bindParam(7,$e->titular, PDO::PARAM_STR);
        $stmt->bindParam(8,$e->telefono, PDO::PARAM_STR, 9);

        return $stmt->execute();
    }
    function loginEmpresa(string $email,string $clave){
        $sql = "SELECT * FROM empresas WHERE emailPers = '{$email}' AND Estado = true";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        $empresa =  $stmt->fetch(PDO::FETCH_ASSOC);
        if (is_array($empresa)) {
            return (password_verify($clave,$empresa['Contrasena'])) ? $empresa : ['bool' => false, 'error' => 'datosIncorrectos'];
        } else {
            return ['bool' => false, 'error' => 'datosIncorrectos'];
        }        
    }
    function buscarByRuc(string $ruc){
        $sql = "SELECT * FROM empresas WHERE RucEmpresa = '{$ruc}'";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(); 
        return $stmt->fetch(PDO::FETCH_ASSOC);       
    }
    function listarDepartamentos(){
        $sql = "SELECT * FROM departamentos";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarProvincias($idDep){
        $sql = "SELECT * FROM `provincias` WHERE `IdDepartamento` = ?;";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($idDep));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarDistritos($idProv){
        $sql = "SELECT * FROM `distritos` WHERE `IdProvincia` = ?;";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($idProv));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //here ad code for add image of the bussinness
    function actualizarEmpresa(Empresa $e){
        $sql = "UPDATE `empresas` SET `NumRucEmp` = ?,
                                    `NomEmpresa` = ?,
                                    `EmailEmp` = ?,
                                    `IdCategoria` = ?,
                                    `Descripcion` = ?,
                                    `Direccion` = ?,
                                    `Distrito` = ?,
                                    `Telefono` = ?,
                                    `Whatsapp` = ?,
                                    `Facebook` = ?,
                                    `Instangram` = ?,
                                    `Logo` = ?,
                                    `logoUrl` = ?
                WHERE empresas.RucEmpresa = ?;";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(1,$e->numRucEmp, PDO::PARAM_STR);
        $stmt->bindParam(2,$e->nomEmp, PDO::PARAM_STR);

        $stmt->bindParam(3,$e->emailEmp, PDO::PARAM_STR);
        $stmt->bindParam(4,$e->id_categoria, PDO::PARAM_STR);

        $stmt->bindParam(5,$e->descripcion, PDO::PARAM_STR);
        $stmt->bindParam(6,$e->direccion, PDO::PARAM_STR);
        $stmt->bindParam(7,$e->distrito, PDO::PARAM_STR);
        $stmt->bindParam(8,$e->telefono, PDO::PARAM_STR,9);
        $stmt->bindParam(9,$e->whatsapp, PDO::PARAM_STR,9);
        $stmt->bindParam(10,$e->facebook, PDO::PARAM_STR);
        $stmt->bindParam(11,$e->instagram, PDO::PARAM_STR);

        $stmt->bindParam(12,$e->logo, PDO::PARAM_STR);
        $stmt->bindParam(13,$e->logoUrl, PDO::PARAM_STR);

        $stmt->bindParam(14,$e->ruc, PDO::PARAM_STR);

        return $stmt->execute();
    }
    function DepProvByDistrito($distrito){
        $sql = "SELECT de.IdDepartamento,p.IdProvincia,di.IdDistrito FROM `distritos` di
                INNER JOIN `provincias` p ON p.IdProvincia = di.IdProvincia
                INNER JOIN `departamentos` de ON de.IdDepartamento = p.IdDepartamento
                WHERE di.IdDistrito = ?;";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($distrito));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function showEmpresa($ruc) {
        $sql = "SELECT `RucEmpresa`,`NomEmpresa`,`Logo`,`Descripcion`,`Telefono`,`Facebook`,`Instangram`,`Direccion` 
                FROM `empresas` WHERE `RucEmpresa` = '{$ruc}';";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetch();
    }

    function showCategory(){
        $sql = "SELECT IdCategoria,nombre FROM categorias";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function serchPassword(string $ruc){
        $sql = "SELECT Contrasena FROM empresas WHERE RucEmpresa = '{$ruc}'";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(); 
        return $stmt->fetch(PDO::FETCH_OBJ);       
    }

    function updatePassword(string $ruc,string $passwordHashed){
        $sql = "UPDATE empresas SET Contrasena ='{$passwordHashed}' WHERE RucEmpresa = '{$ruc}'";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(); 
        return $stmt->execute();    
    }

    function searchCredential(string $email){
        $sql = "SELECT EmailPers,RucEmpresa FROM empresas WHERE EmailPers = '{$email}'";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();        
        return $stmt->fetch(PDO::FETCH_OBJ);       
    }

    function insertToken(string $token,string $email){
        $sql = "UPDATE empresas SET token ='{$token}' WHERE EmailPers = '{$email}'";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(); 
        return $stmt->execute();    
    }

    function resetMyPassword(string $mytoken,string $mynewpass, int $idRuc)
    {
        $sql = "CALL resetPass_withToken('$mytoken','$mynewpass', $idRuc)";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(); 
        return $stmt->execute(); 
        
    }

    
}
