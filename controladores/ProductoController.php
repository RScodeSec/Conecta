<?php
require_once 'modelos/Producto.php';

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
                                    ´<img src='.$iganes' alt='Imagen del Producto'>´
                                </figure>
                                <br>
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
        $imagenName = $_FILES['file']['name'];
        
        //-------- MODIFIED NAME --------------
        $extension = pathinfo($imagenName, PATHINFO_EXTENSION);
        $random = rand(0,99);
        $rename = $random.date('YmdH').$imagenName;
        $newname = $rename;
        //for obtain extension of image .'.'.$extension
        $imageurl = "./vistas/panel_usuario/imgproducts/" . $newname;

        $imagenTemp = $_FILES['file']['tmp_name'];
        move_uploaded_file($imagenTemp, $imageurl);
        //copy($imagenTemp,$imagenUrl);
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
        move_uploaded_file($imagenTemp2, $imageurl2);

        $imagen = $newname;
        $ImagenUrl = $imageurl;
        //end my code add
        $imagen1 = $newname1;
        $imagen2 = $newname2;


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
        //////////////////77////////// AD CODE FOR UPDATE IMAGE ////////////////
        $eliminarimage = "./vistas/panel_usuario/imgproducts/" . $_POST['nameimage'];
        unlink($eliminarimage);
        //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        $imagenName = $_FILES['file']['name'];
        
        //-------- MODIFIED NAME --------------
        $extension = pathinfo($imagenName, PATHINFO_EXTENSION);
        $random = rand(0,99);
        $rename = $random.date('YmdH').$imagenName;
        $newname = $rename;
        //for obtain extension of image .'.'.$extension
        $imageurl = "./vistas/panel_usuario/imgproducts/" . $newname;

        $imagenTemp = $_FILES['file']['tmp_name'];
        move_uploaded_file($imagenTemp, $imageurl);
        
        //image two and three:::::::::::::::::::::
        $eliminarimage1 = "./vistas/panel_usuario/imgproducts/" . $_POST['nameimage1'];
        unlink($eliminarimage1);
        $random1 = rand(0,99);
        $imagenName1 = $_FILES['file1']['name'];
        $rename1 = $random1.date('Ymdi').$imagenName1;
        $newname1 = $rename1;
        $imageurl1 = "./vistas/panel_usuario/imgproducts/" . $newname1;
        $imagenTemp1 = $_FILES['file1']['tmp_name'];
        move_uploaded_file($imagenTemp1, $imageurl1);

        $eliminarimage2 = "./vistas/panel_usuario/imgproducts/" . $_POST['nameimage2'];
        unlink($eliminarimage2);
        $random2 = rand(0,99);
        $imagenName2 = $_FILES['file2']['name'];
        $rename2 = $random2.date('Ymds').$imagenName2;
        $newname2 = $rename2;
        $imageurl2 = "./vistas/panel_usuario/imgproducts/" . $newname2;
        $imagenTemp2= $_FILES['file2']['tmp_name'];
        move_uploaded_file($imagenTemp2, $imageurl2);


        $imagen = $newname;
        $ImagenUrl = $imageurl;

        $imagen1 = $newname1;
        $imagen2 = $newname2;
        //end my code add

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
                                    ".$p['Descripcion']."
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
                                
                                    ´<img src='.$iganes' alt='Imagen del Producto'>´
                               
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
}