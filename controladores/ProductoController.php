<?php
require_once 'modelos/Producto.php';
require_once 'vendor/autoload.php';
use Verot\Upload\Upload;

class ProductoController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Producto();
    }
    function productosByRuc(){
        $prods = $this->modelo->productosByRuc($_GET['ruc']);
        if (isset($_POST['type'])) {
            
            $articles = '';
            //AQUI HE AGREGADO BR PARA AGREGAR ESPACIO
            foreach ($prods as $p) {
                $iganes = $p['ImagenUrl'];
                $articles .= "<article class='product'>
                                <figure class='img-product'>
                                    <img src='.$iganes' alt='Imagen del Producto'>
                                </figure>
                               
                                <h4 class='subtitulo-product'>
                                    ".$p['NomProducto']."
                                </h4>
                                <p class='product-desc'>
                                    ".$p['Precio']."
                                </p>
                                <div class='button-container'>
                                    <input type='text' id='idproducto' value='".$p['IdProducto']."' hidden>
                                    <button class='btn-product' data-id='".$p['IdProducto']."'>
                                        Ver producto
                                    </button>
                                </div>
                            </article>";
            }
            return $articles;
        } else {
            return $prods;
        }
        
    }
    //here funtion for add new product and your image
    function agregarProducto(){
        $ruc = $_POST['ruc'];
       
        
        //-------- MODIFIED NAME --------------
        /* $imagenName = $_FILES['file']['name'];
        $extension = pathinfo($imagenName, PATHINFO_EXTENSION);
        $random = rand(0,99);
        $rename = $random.date('YmdH').$imagenName;
        $newname = $rename;
        $imageurl = "./vistas/panel_usuario/imgproducts/" . $newname;
        $imagenTemp = $_FILES['file']['tmp_name'];
        move_uploaded_file($imagenTemp, $imageurl);

        //:::::::::::code for add two and three image::::::::::::::::::::::
        $random1 = rand(0,99);
        $imagenName1 = $_FILES['file1']['name'];
        $rename1 = $random1.date('Ymdi').$imagenName1;
        $newname1 = $rename1;
        $imageurl1 = "./vistas/panel_usuario/imgproducts/" . $newname1;
        $imagenTemp1 = $_FILES['file1']['tmp_name'];
        move_uploaded_file($imagenTemp1, $imageurl1);

        $random2 = rand(0,99);
        $imagenName2 = $_FILES['file2']['name'];
        $rename2 = $random2.date('Ymds').$imagenName2;
        $newname2 = $rename2;
        $imageurl2 = "./vistas/panel_usuario/imgproducts/" . $newname2;
        $imagenTemp2= $_FILES['file2']['tmp_name'];
        move_uploaded_file($imagenTemp2, $imageurl2);*/

        
        $path = './vistas/panel_usuario/imgproducts/';
        $file = $_FILES['file'];
        $foo  = new Upload($file);
        if (!$foo) {
            redirect('Producto.php?error=no-uploaded');
        } 
        /* __________image 1___________*/
        $random = rand(0,99);
        $nameimg1 = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        $size_x                  = 300;
        $renameimg1 = $foo->file_new_name_body = sprintf('%s_producto_%s', $nameimg1, time().$random);
        $foo->image_resize       = true;
        $foo->image_ratio_x      = true;
        $foo->image_y            = $size_x;
        $foo->image_convert = 'webp';
        $foo->process($path);
        /* __________image 2___________*/
        $random1 = rand(0,99);
        $file1 = $_FILES['file1'];
        $foo  = new Upload($file1);
        $nameimg2 = pathinfo($_FILES['file1']['name'], PATHINFO_FILENAME);
        $size_x                  = 300;
        $renameimg2 = $foo->file_new_name_body = sprintf('%s_producto_%s', $nameimg2, time().$random1);
        $foo->image_resize       = true;
        $foo->image_ratio_x      = true;
        $foo->image_y            = $size_x;
        $foo->image_convert = 'webp';
        $foo->process($path);
        /* __________image 3___________*/
        $random2 = rand(0,99);
        $file2 = $_FILES['file2'];
        $foo  = new Upload($file2);
        $nameimg3 = pathinfo($_FILES['file1']['name'], PATHINFO_FILENAME);
        $size_x                  = 300;
        $renameimg3 = $foo->file_new_name_body = sprintf('%s_producto_%s', $nameimg3, time().$random2);
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


        $imagen = $renameimg1.'.webp';
        $ImagenUrl = $path.$renameimg1.'.webp';
        //end my code add
        $imagen1 = $renameimg2.'.webp';
        $imagen2 = $renameimg3.'.webp';


        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $precio = $_POST['precio'];
        $medida = $_POST['medida'];
        $stock = (int)$_POST['cantidad'];
        if (empty($nombre) || empty($descripcion) || $stock == 0) {
            return ['msg' => 'Datos incorrectos o incompletos','icon' => 'error', 'btnText' => 'Volver a intentar'];
        }
        $p = new Producto($ruc,$nombre,$descripcion,$precio,$medida,$stock,$imagen,$ImagenUrl,$imagen1,$imagen2);
        return ($this->modelo->agregarProducto($p)) ? 
                ['msg' => 'Nuevo producto agregado', 'icon' => 'success', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo agregar el nuevo producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }
    ///////////////////////////7edid productttttttttttttt//////////////7
    
    function editarProducto(){
        $idProducto = (int)$_POST['id'];

        $path = './vistas/panel_usuario/imgproducts/';
        $file = $_FILES['file'];
        $foo  = new Upload($file);
        if (!$foo) {
            redirect('Producto.php?error=no-uploaded');
        }

        /*____Image 1__________*/
        $random = rand(0,99);
        $eliminarimage = "./vistas/panel_usuario/imgproducts/" . $_POST['nameimage'];
        unlink($eliminarimage);

        $nameimg1 = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        $size_x                  = 300;
        $renameimg1 = $foo->file_new_name_body = sprintf('%s_producto_%s', $nameimg1, time().$random);
        $foo->image_resize       = true;
        $foo->image_ratio_x      = true;
        $foo->image_y            = $size_x;
        $foo->image_convert = 'webp';
        $foo->process($path);       
        
         /*____Image 2__________*/
         $random1 = rand(0,99);
        $eliminarimage1 = "./vistas/panel_usuario/imgproducts/" . $_POST['nameimage1'];
        unlink($eliminarimage1);

        $file1 = $_FILES['file1'];
        $foo  = new Upload($file1);
        $nameimg2 = pathinfo($_FILES['file1']['name'], PATHINFO_FILENAME);
        $size_x                  = 300;
        $renameimg2 = $foo->file_new_name_body = sprintf('%s_producto_%s', $nameimg2, time().$random1);
        $foo->image_resize       = true;
        $foo->image_ratio_x      = true;
        $foo->image_y            = $size_x;
        $foo->image_convert = 'webp';
        $foo->process($path);
        
         /*____Image 3__________*/
         $random2 = rand(0,99);
        $eliminarimage2 = "./vistas/panel_usuario/imgproducts/" . $_POST['nameimage2'];
        unlink($eliminarimage2);
        $file2 = $_FILES['file2'];
        $foo  = new Upload($file2);
        $nameimg3 = pathinfo($_FILES['file1']['name'], PATHINFO_FILENAME);
        $size_x                  = 300;
        $renameimg3 = $foo->file_new_name_body = sprintf('%s_producto_%s', $nameimg3, time().$random2);
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
        

        $imagen = $renameimg1.'.webp';
        $ImagenUrl = $path.$renameimg1.'.webp';
        //end my code add
        $imagen1 = $renameimg2.'.webp';
        $imagen2 = $renameimg3.'.webp';

        ////////////////////// END CODE FOR UPDATE IMAGE////////////////////////


        $ruc = $_POST['ruc'];
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $precio = $_POST['precio'];
        $medida = $_POST['medida'];
        $stock = (int)$_POST['cantidad'];

        if (empty($nombre) || empty($descripcion) || $stock == 0) {
            return ['msg' => 'Datos incorrectos o incompletos','icon' => 'error', 'btnText' => 'Volver a intentar'];
        }
        $p = new Producto($ruc,$nombre,$descripcion,$precio,$medida,$stock,$imagen,$ImagenUrl,$imagen1,$imagen2,$idProducto);
        return ($this->modelo->editarProducto($p)) ? 
                ['msg' => 'Información del producto actualizada', 'icon' => 'success', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo editar el producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }



    function eliminarProducto(){
        $id = (int)$_POST['idProd'];
        //here add function for eliminate image
        $eliminarimage = "./vistas/panel_usuario/imgproducts/" . $_POST['Imagen'];
        unlink($eliminarimage);
        $eliminarimage1 = "./vistas/panel_usuario/imgproducts/" . $_POST['Imagen1'];
        unlink($eliminarimage1);
        $eliminarimage2 = "./vistas/panel_usuario/imgproducts/" . $_POST['Imagen2'];
        unlink($eliminarimage2);

        return ($this->modelo->eliminarProducto($id) != false) ? 
                ['msg' => 'Producto eliminado', 'icon' => 'info', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo eliminar el producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];

    }
    ////here new code for modal products 

    function productosByid(){
        $prodsModal = $this->modelo->productosByid($_GET['idmyprod']);
        echo json_encode($prodsModal);



    }

    //ad product for show in index
    function featuredProduct()
    {
        $featuredproducts = $this->modelo->featuredProduct();
        //var_dump($featuredproducts);
        $articles = '';
        foreach ($featuredproducts as $p) {
            $iganes = $p['ImagenUrl'];
            $rucEmpresa = $p['RucEmpresa'];
            $articles .= "<article class='pasos-sig'>
                            <input type='text' class='urlEmp' value='{$rucEmpresa}' hidden>                            
                            <img src='.$iganes' alt='Imagen del Producto'>
                            <div class='subtitulo'>
                            <h4> ".$p['NomProducto']."</h4>
                            </div>
                            <span>
                                <p class='p'>
                                    ".'S/ '.$p['Precio']."
                                </p>
                            </span>
                            <div class='ver'>
                                <input type='text' id='idproducto' value='".$p['RucEmpresa']."' hidden>
                                <button class='btn-product' data-id='".$p['RucEmpresa']."'>
                                    VER TIENDA
                                </button>
                            </div>
                        </article>";
        }
        return $articles;

        
    }
    //HERE CODE FOR SEARCH:::::::::::::::::::::::::::::::::::::::::::::::::::::
    function searchLiveProduct()
    {
        $searchProduct = $this->modelo->searchedProduct($_GET["inputsearch"]);
            $articles = '';
            //AQUI HE AGREGADO BR PARA AGREGAR ESPACIO
            foreach ($searchProduct as $p) {
                $iganes = $p['ImagenUrl'];
                $articles .= "<article class='product'>
                                
                                    <img src='.$iganes' alt='Imagen del Producto'>
                               
                                <br>
                                <h4 class='subtitulo-product'>
                                    ".$p['NomProducto']."
                                </h4>
                                <p class='product-desc'>
                                    S/.".$p['Precio']."
                                </p>
                                <div class='button-container'>
                                    <input type='text' id='idproducto' value='".$p['IdProducto']."' hidden>
                                    <button class='btn-product' data-id='".$p['IdProducto']."'>
                                        Ver producto
                                    </button>
                                </div>
                            </article>";
            }
            return $articles;

    }

    function infoProductSearch(){
        $prodsModal = $this->modelo->productosByidSearch($_GET['idmyprod']);
        echo json_encode($prodsModal);
    }
    function getBestSeller()
    {
        $resultBestSeller = $this->modelo->orderBestSeller($_GET['ruc']);
        echo json_encode($resultBestSeller);
    }
    /*____________________________________________FILTER SELECT____________________________*/
    function productosByRucFilters(){
        //$prods = $this->modelo->productosByRucFilterDESC($_GET['ruc']);
        switch($_GET['opt']){
            case 1:
                $prods = $this->modelo->productosByRuc($_GET['ruc']);
            break;
            case 2:
                $prods = $this->modelo->productosByRucFilterPopular($_GET['ruc']);
            break;
            case 3:
                $prods = $this->modelo->productosByRucFilterASC($_GET['ruc']);                   
            break;
            case 4:
                $prods = $this->modelo->productosByRucFilterDESC($_GET['ruc']);  
            break;
            default:
                $prods = $this->modelo->productosByRuc($_GET['ruc']);

        }
        if (isset($_POST['type'])) {

            
            $articles = '';
            //AQUI HE AGREGADO BR PARA AGREGAR ESPACIO
            foreach ($prods as $p) {
                $iganes = $p['ImagenUrl'];
                $articles .= "<article class='product'>
                                <figure class='img-product'>
                                    <img src='.$iganes' alt='Imagen del Producto'>
                                </figure>
                               
                                <h4 class='subtitulo-product'>
                                    ".$p['NomProducto']."
                                </h4>
                                <p class='product-desc'>
                                    ".$p['Precio']."
                                </p>
                                <div class='button-container'>
                                    <input type='text' id='idproducto' value='".$p['IdProducto']."' hidden>
                                    <button class='btn-product' data-id='".$p['IdProducto']."'>
                                        Ver producto
                                    </button>
                                </div>
                            </article>";
            }
            return $articles;
        } else {
            return $prods;
        }
        
    }
    /*______________filter range ______________*/
    function filterInRange()
    {
        $prods = $this->modelo->productosByRucFilterRange($_GET['ruc'],$_GET['valone'],$_GET['valtwo']);
        if (isset($_POST['type'])) {

            
            $articles = '';
            //AQUI HE AGREGADO BR PARA AGREGAR ESPACIO
            foreach ($prods as $p) {
                $iganes = $p['ImagenUrl'];
                $articles .= "<article class='product'>
                                <figure class='img-product'>
                                    <img src='.$iganes' alt='Imagen del Producto'>
                                </figure>
                               
                                <h4 class='subtitulo-product'>
                                    ".$p['NomProducto']."
                                </h4>
                                <p class='product-desc'>
                                    ".$p['Precio']."
                                </p>
                                <div class='button-container'>
                                    <input type='text' id='idproducto' value='".$p['IdProducto']."' hidden>
                                    <button class='btn-product' data-id='".$p['IdProducto']."'>
                                        Ver producto
                                    </button>
                                </div>
                            </article>";
            }
            return $articles;
        } else {
            return $prods;
        }
        
    }

}