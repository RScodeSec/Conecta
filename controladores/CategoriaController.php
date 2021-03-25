<?php

require_once 'modelos/Categoria.php';

class CategoriaController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Categoria();
    }
    function listarCategorias($type = 'option'){
        if ($_POST) {
            $type = $_POST['type'];
        }
        $categorias = $this->modelo->listarCategorias();
        $options = ($type == 'option') ? '<option value="0">Seleccione una categoría...</option>' : '';
        foreach ($categorias as $cat) {
            if ($type == 'option') {
                $options.= '<option value='.$cat['IdCategoria'].'>'.$cat['nombre'].'</option>';
            } else {
                $nomCat = $cat['nombre'];
                $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
                $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","__");
                $nomImg = str_replace($no_permitidas,$permitidas,$nomCat);
                $urlImg = "../public/imagenes/categorias/".$nomImg.'.png';
                $idCat = $cat['IdCategoria'];
                $options .= "<div class='cuadros'>
                                <input type='text' value='{$idCat}' hidden>
                                <img id='img' src='{$urlImg}'>
                                <div class='hover-galeria'>
                                    <p>{$nomCat}</p>
                                </div>
                            </div>";
            }
        }
        return $options;
    }
    function empresasByCategoria($type = 'cuadros'){
        if(isset($_POST['idCat'])){

            $empresas = $this->modelo->empresasByCategoria($_POST['idCat']);

        }
        
        if (isset($_POST['type'])) {
            $type = $_POST['type'];
        }
        $cuadros = '';
        //add this code for fixed fechall
        if($empresas){

            foreach ($empresas as $emp) {
                $numFigures = 4;
                if ($type == 'cuadros') {
                    $rucEmpresa = $emp['RucEmpresa'];
                    $nomEmp = $emp['NomEmpresa'];
                    $logo = $emp['Logo'];
                    $cuadros .= "<div class='cuadros'>
                                    <input type='text' class='urlEmp' value='{$rucEmpresa}' hidden>
                                    <img id='img' src='../vistas/panel_usuario/logoemp/{$logo}' >
                                    <div class='hover-galeria'>
                                        <p>{$nomEmp}</p>
                                    </div>
                                </div>";
                } else {
                    if ($numFigures > 0) {
                        if ($_POST['ruc'] != $emp['RucEmpresa']) {
                            $ruc = $emp['RucEmpresa'];
                            $cuadros .= "<figure class='dck-img-container'>
                                            <input type='text' value='{$ruc}' hidden>
                                            <img src='' alt='Otro logo'>
                                        </figure>";
                            $numFigures;
                        }
                    } 
                }
            }



        }
        
            

        
                
        if ($type == 'imgs') {
            return $cuadros;
        } else {
            session_start();
            $_SESSION['cuadrosEmps'] = $cuadros;
            $_SESSION['categoria'] = $_POST;
        }
    }
}
?>