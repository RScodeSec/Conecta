<?php
session_start();
$title = $_SESSION['empresa']['NomEmpresa'];
include_once 'layouts/head.php'; ?>
<link rel="stylesheet" type="text/css" href="../public/css/product_services.css">
<link rel="stylesheet" href="../public/css/form-product.css">
</head>

<body>

	<div class="page-container">

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
		<!-- end form for shoping -->

		<section id="t-principal">
			<div class="space-title"></div>
			<h4 id="categoria"><?php echo $_SESSION['empresa']['NomEmpresa']; ?></h4>
			<h3 hidden><?php echo $_SESSION['empresa']['RucEmpresa']; ?></h3>
		</section>

		<main>
			<figure class="img-container">
				<img src="<?php echo 'panel_usuario/logoemp/'. $_SESSION['empresa']['Logo']; ?>" alt="Logo de la empresa">
			</figure>
			<aside class="left-section">

				<article class="info-emp">
					<div class="container-sticky">
						<p class="description">
							<?php echo $_SESSION['empresa']['Descripcion']; ?>
						</p>
						<div class="social-section">
							<div class="social social-tlf">
								<a href=" <?php echo 'tel:+51'. $_SESSION['empresa']['Telefono']; ?> " target="_blank" ><i class="icon-phone" ></i></a>
								<?php echo $_SESSION['empresa']['Telefono']; ?>
							</div>
							<?php if ($_SESSION['empresa']['Facebook'] != "") {
								?>
							<div class="social social-fb">
								<a href="<?php echo $_SESSION['empresa']['Facebook']; ?>" target="_blank"><i class="icon-facebook"></i></a>
								
							</div>
							<?php }
							if ($_SESSION['empresa']['Facebook'] != "") { ?>
							<div class="social social-ig">
								<a href="<?php echo $_SESSION['empresa']['Instangram']; ?> " target="_blank"><i class="icon-instagram"></i></a>
								
							</div>
							<?php } ?>
							<div class="social social-local">
								<i class="icon-location"></i>
								<?php echo $_SESSION['empresa']['Direccion']; ?>
							</div>
						</div>
						<div class="recomendaciones">
							<h3 class="titulo">
								Tambien podría interesarte
								
							</h3>
							<div id="docker-imgs">
								<input type="text" value="<?php echo $_SESSION['categoria']['idCat']; ?>" hidden>
							</div>
						</div>
					</div>

				</article>

			</aside>
			<section class="right-section">

				<h3 class="title-products">
					Productos
				</h3>

				<div id="products-container">
					<!-- <article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/costureria.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Costurería
						</h4>
						<p class="product-desc">
							S/ 14.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>

					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/confección.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Confección
						</h4>
						<p class="product-desc">
							S/ 29.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>

					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/telas.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Venta de Telas
						</h4>
						<p class="product-desc">
							S/ 59.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>

					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/tintorería.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Tintorería
						</h4>
						<p class="product-desc">
							S/ 99.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>

					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/venta.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Venta de Ropa
						</h4>
						<p class="product-desc">
							S/ 29.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article> -->
				</div>

				<div class="button-container">
					<button>
						Ver más
					</button>
				</div>
			</section>
		</main>

		<?php include_once 'layouts/footer.php'; ?>

	</div>

	<?php include_once 'layouts/scripts.php'; ?>
	<script type="text/javascript" src="../public/js/form-product.js"></script>
	<script src="../public/js/empresa.js"></script>
</body>

</html>