<?php
$title = "Buscar productos";
include_once 'layouts/head.php';
?>
    <link rel="stylesheet" type="text/css" href="../public/css/index.css">
	<link rel="stylesheet" href="../public/css/form-product.css">
    <link rel="stylesheet" href="../public/css/search.css">
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
        <div class="btn-back-container">
            <button class="btn-back"><i class="fas fa-backward"></i>Regresar</button>
        </div>
    
        <div class="title-page-container">
            <h2>Resultados de la búsqueda</h2>
        </div>
    
        <section class="products-container">
            <article class="product-card">
                <figure class="img-card-container">
                    <img src="../public/imagenes/silla.jpg" alt="">
                </figure>
                <h4>Categoria</h4>
                <h2>Sillas gamer</h2>
                <p>Sillas gamer cómodas y alcochadas</p>
                <div class="btn-container">
                    <button class="btn-see-shop">Ver tienda</button>
                </div>
            </article>

            <article class="product-card">
                <figure class="img-card-container">
                    <img src="../public/imagenes/silla.jpg" alt="">
                </figure>
                <h4>Categoria</h4>
                <h2>Sillas gamer</h2>
                <p>Sillas gamer cómodas y alcochadas</p>
                <div class="btn-container">
                    <button class="btn-see-shop">Ver tienda</button>
                </div>
            </article>

            <article class="product-card">
                <figure class="img-card-container">
                    <img src="../public/imagenes/silla.jpg" alt="">
                </figure>
                <h4>Categoria</h4>
                <h2>Sillas gamer</h2>
                <p>Sillas gamer cómodas y alcochadas</p>
                <div class="btn-container">
                    <button class="btn-see-shop">Ver tienda</button>
                </div>
            </article>

            <article class="product-card">
                <figure class="img-card-container">
                    <img src="../public/imagenes/silla.jpg" alt="">
                </figure>
                <h4>Categoria</h4>
                <h2>Sillas gamer</h2>
                <p>Sillas gamer cómodas y alcochadas</p>
                <div class="btn-container">
                    <button class="btn-see-shop">Ver tienda</button>
                </div>
            </article>

            <article class="product-card">
                <figure class="img-card-container">
                    <img src="../public/imagenes/silla.jpg" alt="">
                </figure>
                <h4>Categoria</h4>
                <h2>Sillas gamer</h2>
                <p>Sillas gamer cómodas y alcochadas</p>
                <div class="btn-container">
                    <button class="btn-see-shop">Ver tienda</button>
                </div>
            </article>


        </section>
    </main>


<!-- Iconos -->
<script src="https://kit.fontawesome.com/c702fce202.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../public/js/search_form-product.js"></script>

</body>
</html>