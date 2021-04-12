<?php
require_once 'modelos/Empresa.php';
require_once 'vendor/autoload.php';
use Verot\Upload\Upload;

class EmpresaController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Empresa();
    }
    function index()
    {
        if (isset($_GET['cerrarSesion'])) {
            session_start();
            session_unset();
            session_destroy();
        }
        header('Location: vistas/index.php');
    }
    function login(){
        $email = trim($_POST['email']);
        $clave = trim($_POST['clave']);
        return $this->modelo->loginEmpresa($email,$clave);
    }
    function registro(){
        $email = str_replace(" ","",$_POST['email']);
        $clave = trim($_POST['clave']);
        $ruc = $_POST['ruc'];
        $negocio = trim($_POST['empresa']);
        $id_categoria = (int)$_POST['categoria'];
        $direccion = trim($_POST['direccion']);
        $titular = trim($_POST['titular']);
        $celular = $_POST['telefono'];
        //empty($clave) || empty($negocio) || empty($direccion) || empty($titular) || ctype_digit($titular)
        //|| $id_categoria == 0 || strlen($ruc) != 11 || strlen($celular) != 9
        if (empty($clave) || empty($negocio) || empty($titular) || ctype_digit($titular)
            || $id_categoria == 0 || strlen($celular) != 9) {
            return ['bool' => false, 'error' => 'datosIncorrectos'];
        }
        if (empty($this->modelo->buscarByRuc($ruc))) {
            $empresa = new Empresa($email,$clave,$ruc,$negocio,$id_categoria,$direccion,$titular,$celular);
            return ($this->modelo->registrarEmpresa($empresa)) ?
                    $this->modelo->loginEmpresa($email,$clave) :
                    ['bool' => false, 'error' => 'problemaSQL'];
        } else {
            return ['bool' => false, 'error' => 'rucDuplicado'];
        }
    }
    function listarDepartamentos(){
        $departamentos = $this->modelo->listarDepartamentos();
        $options = '<option value="0">Seleccione un departamento...</option>';
        foreach ($departamentos as $dep) {
            $selected = ($_GET['phpDep'] == $dep['IdDepartamento']) ? ' selected' : '';
            $options.= '<option value="'.$dep['IdDepartamento'].'"'.$selected.'>'.$dep['Departamento'].'</option>';
        }
        return $options;
    }
    function listarProvincias(){
        $idDep = $_GET['idDep'];
        $provincias = $this->modelo->listarProvincias($idDep);
        $options = '';
        foreach ($provincias as $prov) {
            $selected = ($_GET['phpProv'] == $prov['IdProvincia']) ? ' selected' : '';
            $options.= '<option value="'.$prov['IdProvincia'].'"'.$selected.'>'.$prov['Provincia'].'</option>';
        }
        return $options;
    }
    function listarDistritos(){
        $idProv = $_GET['idProv'];
        $distritos = $this->modelo->listarDistritos($idProv);
        $options = '';
        foreach ($distritos as $dist) {
            $selected = ($_GET['phpDist'] == $dist['IdDistrito']) ? ' selected' : '';
            $options.= '<option value="'.$dist['IdDistrito'].'"'.$selected.'>'.$dist['Distrito'].'</option>';
        }
        return $options;
    }
    //here add code for add image of businnes ::::::::::::::::::::::::::::::::
    function actualizarDatos(){
        $e = new Empresa();
        
        $e->ruc = $_POST['ruc'];
        $e->numRucEmp = $_POST['numRucEmp'];
        $e->nomEmp = $_POST['nameBusiness'];

        if($_POST['nameimage'] ==""){

            $path = './vistas/panel_usuario/logoemp/';
            $file = $_FILES['file'];
            $foo  = new Upload($file);
            if (!$foo) {
                redirect('datos.php?error=no-uploaded');
            } 
            /* __________image 1___________*/
            $random = rand(0,99);
            $nameimg1 = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $size_x                  = 270;
            $renameimg1 = $foo->file_new_name_body = sprintf('%s_logo_%s', $nameimg1, time().$random);
            $foo->image_resize       = true;
            $foo->image_ratio_x      = true;
            $foo->image_y            = $size_x;
            $foo->image_convert = 'webp';
            $foo->process($path);
            if ($foo->processed) {
                $foo->clean();
            } else {
                echo sprintf('Error: %s<br>', $foo->error);
            }
        }else{
            

            $eliminarimage = "./vistas/panel_usuario/logoemp/" . $_POST['nameimage'];
            unlink($eliminarimage);

            $path = './vistas/panel_usuario/logoemp/';
            $file = $_FILES['file'];
            $foo  = new Upload($file);
            if (!$foo) {
                redirect('datos.php?error=no-uploaded');
            }
            $random = rand(0,99);
            $nameimg1 = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $size_x                  = 270;
            $renameimg1 = $foo->file_new_name_body = sprintf('%s_logo_%s', $nameimg1, time().$random);
            $foo->image_resize       = true;
            $foo->image_ratio_x      = true;
            $foo->image_y            = $size_x;
            $foo->image_convert = 'webp';
            $foo->process($path);
            if ($foo->processed) {
                $foo->clean();
            } else {
                echo sprintf('Error: %s<br>', $foo->error);
            }

        }
        //ad in controller 
        $e->logo = $renameimg1.'.webp';
        $e->logoUrl = $path.$renameimg1.'.webp';

        $e->emailEmp = str_replace(" ","",$_POST['email']);
        $e->id_categoria = $_POST['categoryemp'];
        $e->descripcion = trim($_POST['descripcion']);
        $e->direccion = trim($_POST['direccion']);
        $e->distrito = $_POST['distrito'];
        $e->telefono = $_POST['telefono'];
        $e->whatsapp = $_POST['whatsapp'];
        $e->facebook = trim($_POST['facebook']);
        $e->instagram = trim($_POST['instagram']);
        if (empty($e->descripcion) || empty($e->direccion) || $_POST['departamento'] == '0' || strlen($e->telefono) != 9 || strlen($e->whatsapp) > 9) {
            return ['bool' => false, 'msg' => 'datosIncorrectos'];
        }
        return ($this->modelo->actualizarEmpresa($e)) ?
                $this->modelo->buscarByRuc($e->ruc) :
                ['bool' => true, 'msg' => 'problemaSQL'];
    }
    //end here code::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    function DepProvByDistrito($distrito){
        return $this->modelo->DepProvByDistrito($distrito);
    }
    function showEmpresa() {
        return $this->modelo->showEmpresa($_GET['ruc']);
    }

    function listShowCategory(){
        $categoryBusiness = $this->modelo->showCategory();
        $options = '<option value="0">Seleccione una Categoria</option>';
        foreach ($categoryBusiness as $dep) {
            $selected = ($_GET['phpcategoria'] == $dep['IdCategoria']) ? ' selected' : '';
            $options.= '<option value="'.$dep['IdCategoria'].'"'.$selected.'>'.$dep['nombre'].'</option>';
        }
        return $options;
    }
    
}
?>