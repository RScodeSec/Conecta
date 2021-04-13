<?php
require_once 'modelos/Empresa.php';
//php mailer
require 'public/mailer/PHPMailerAutoload.php';
require 'public/mailer/class.phpmailer.php';
require 'public/mailer/class.smtp.php';
// end phpmailer
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
    
    function updatePassword()
    {
        $e = new Empresa();
        $e->ruc = $_POST['ruc'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $passHased = password_hash($newpassword,PASSWORD_DEFAULT);
        $checkCredential =  $this->modelo->serchPassword($e->ruc);
        if(password_verify($oldpassword,$checkCredential->Contrasena)){
            $changed= $this->modelo->updatePassword($e->ruc,$passHased);
            echo $changed ? json_encode(['title' => 'Perfecto!', 'text' => 'Credencial Actualizado Correctamente','icon' => 'success']):
            json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Actualizar Credencial','icon' => 'error']);
        }
        else{
            echo json_encode(['title' => 'Noo!', 'text' => 'No Coincide Tu Credencial Actual','icon' => 'error']);
        }
        //return $checkCredential->Contrasena; 
        
    }

    function verifyCredential()
    {
        $e = new Empresa();
        $e->emailPers = $_POST['email'];
        $resultCredential = $this->modelo->searchCredential($e->emailPers); 
        if(empty($resultCredential)){
            //echo "Email no registrado";
            echo json_encode(['title' => 'Noo!', 'text' => 'Email no registrado','icon' => 'error']);
        }
        else{
            $token = uniqid();
            $this->modelo->insertToken($token, $resultCredential->EmailPers);
            //__________________________________________________
                                
                $mail = new PHPMailer();
                $mail->setFrom('20conectaperu@gmail.com','Restablecimiento de Contraseña');
                $mail->addAddress($resultCredential->EmailPers); //correo a la que le llegaran los correos 
                $mail->addReplyTo('20conectaperu@gmail.com','Restablecimiento de Contraseña');
            
                // Aqu¨ª van los datos que apareceran en el correo que reciba  
                $mail->WordWrap = 50; 
                $mail->IsHTML(true);      
                $mail->Subject='Recupera su Contraseña';
                $mail->Body='Para Restablecer su Contraseña as CLICK en el enlace <a href="http://localhost/Conecta/vistas/recover.php?token='.$token.'&id='.$resultCredential->RucEmpresa.'">Click Aqui</a>';

                // Datos del servidor SMTP
                $mail->IsSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "mail.conecta-peru.com"; //servidor smtp, esto lo puedes dejar igual
                $mail->Port = 465; //puerto smtp de gmail, tambien lo puedes dejar igual
                $mail->Username = 'informes@conecta-peru.com';  // en local, tu correo gmail // en servidor, nombre usuario
                $mail->Password = ';iv(K79yN.R^'; // en local, tu contrasena gmail //en servidor, contraseña de usuario
                
                if ($mail->Send()){
                    echo json_encode(['title' => 'Perfecto!', 'text' => 'En Breve Recibira Un Correo para restablecer su Contraseña','icon' => 'success']);
                }
                else{
                    echo json_encode(['title' => 'Noo!', 'text' => 'Hubo Problemas en realizar la Peticion','icon' => 'error']);
                }

            //______________________________________________

            //echo $resultCredential->EmailPers;
            // echo $resultCredential->RucEmpresa;
        }
        //echo $resultCredential->EmailPers;
        //echo "gaa";
    }

    function resetNewCredential()
    {
        $mytoken = $_POST['urltoken'];
        $newPass = password_hash($_POST['newpassword'],PASSWORD_DEFAULT);
        $idRuc = $_POST['idRuc'];
        $newpassword = $this->modelo->resetMyPassword($mytoken,$newPass,$idRuc); 
        echo $newpassword ? json_encode(['title' => 'Perfecto!', 'text' => 'Contraseña Actualizado Correctamente','icon' => 'success']):
        json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Actualizar Contraseña','icon' => 'error']);
        
    }
    
    
}
?>