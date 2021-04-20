<?php
$title = "Buscar productos";
include_once 'layouts/head.php';
?>
    <!--<link rel="stylesheet" type="text/css" href="../public/css/index.css">-->
    <link rel="preload" href="../public/css/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<!--<link rel="stylesheet" href="../public/css/form-product.css">-->
    <link rel="preload" href="../public/css/form-product.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <!--<link rel="stylesheet" href="../public/css/search.css">-->
    <link rel="preload" href="../public/css/search.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
</head>

<body>
<?php include_once 'layouts/header.php'; ?>


    <div class="form-container-product">
        <section class="form-product">
            <!-- Barra left formulario -->
            <article class="header-form-product">
                <span class="close-button-product">x</span>
            </article>

            <article class="left">
                <div class="container-elements-left">
                    <h2 class="title-mobile">Formulario de compra</h2>

                    <div class="slider-container">
                        <section class="slider">
                            <div class="controls-container">
                                <button class="control-previous-slider">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="control-next-slider">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <div id="carouselControls" class="carousel_slide" data-ride="carousel">
                                <figure class="img-form-product">
                                    <img src="../public/imagenes/sliders/form-product/slider1.jpg" class="mimagen1" alt="Logo Producto">
                                </figure>
                                <figure class="img-form-product">
                                    <img src="../public/imagenes/sliders/form-product/slider2.jpg" class="mimagen2" alt="Logo Producto">
                                </figure>
                                <figure class="img-form-product">
                                    <img src="../public/imagenes/sliders/form-product/slider3.jpg" class="mimagen3"  alt="Logo Producto">
                                </figure>
                            </div>
                        </section>
                    </div>

                    <div class="description-form-product">
                        <div class="container-elements-product">
                            <h2 class="minombre"></h2>
                            <p class="midescripcion"> </p>
                            <p class="price-container"> </p>
                        </div>
                    </div>
                </div>
            </article>

            <article class="right">
                <h2>Formulario de compra</h2>
                <form id="formVenta">

                    <div class="big-container">
                        <input type="hidden" id="IdProducto" >

                        <div class="cont-item"> 
                            <input type="text" id="nombres" placeholder="Nombre" pattern="[a-zA-Z ]{2,254}" title="Solo debe contener letras. e.g. john" required>
                        </div>
                        <div class="cont-item">
                            <input type="text" id="apellido" placeholder="Apellido" pattern="[a-zA-Z ]{2,254}" title="Solo debe contener letras. e.g. Sala..." required>
                        </div>
                        <div class="cont-item">
                            <input type="text" id="Cantidad" placeholder="Cantidad" pattern="[0-9]{1,3}" title="debe conter numeros" required>
                        </div>
                        <div class="cont-item">
                            <input type="text" id="teléfono" placeholder="Teléfono" pattern="[0-9]{9}" title="debe conter numeros" required>
                        </div>
                        <div class="cont-item big">
                            <input type="text" id="dirección" placeholder="Dirección" required>
                        </div>
                        <div class="cont-item big">
                            <textarea name="comentarios" id="comentarios" cols="30" rows="4" placeholder="Escribe tu comentario aquí" textarea></textarea>
                        </div>
                    </div>
                    <div class="btn-container">
                        <!--<button class="enviar-venta">
                            Adquirir
                        </button>-->
                        <input type="submit"  class="enviar-venta" value="Adquirir">
                    </div>
                </form>
            </article>
        </section>
    </div>

    <main>    
        <div class="title-page-container">
            <h2>Mostrando Resultados de la búsqueda: <?php echo $_GET['inputsearch'];?> </h2>
            <input type="text"  id="id" value="<?php echo $_GET['inputsearch'];?>" hidden>
        </div>
    
        <section class="products-container">
            <div id="products-container-search">

            </div>
            

        </section>
    </main>
    <?php include_once 'layouts/footer.php'; ?>

     
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script type="text/javascript" src="../public/js/search_form-product.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js" defer></script>
<script type="text/javascript" src="../public/js/search.js" defer></script>
<script type="text/javascript" src="../public/js/menu.js" defer></script>
<script type="text/javascript" src="../public/js/form_registro.js" defer></script>
<script type="text/javascript" src="../public/js/login.js" defer></script>

</body>
</html>