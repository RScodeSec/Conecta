<?php
$title = "Bienvenidos a Conecta Perú";
include_once 'layouts/head.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/index.css">
</head>

<body>

	<div class="page-video">
		<?php include_once 'layouts/header.php' ?>
		<div id="video" class="video-src">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators rounded-circle">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
				<img src="../public/imagenes/sliders/img-01.webp" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="../public/imagenes/sliders/img-02.webp" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="../public/imagenes/sliders/img-03.webp" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="../public/imagenes/sliders/img-04.webp" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="../public/imagenes/sliders/img-05.webp" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="../public/imagenes/sliders/img-06.webp" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="../public/imagenes/sliders/img-07.webp" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="../public/imagenes/sliders/img-08.webp" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="../public/imagenes/sliders/img-09.webp" class="d-block w-100" alt="...">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Adelante</span>
			</a>
			</div>
       </div>
    </div>


		<br>
		<section id="contenido">

			<section class="titulo">
				<h2>Los más destacados</h2>
			</section>

			<section class="contenedor">


				<div id="destacado" class="destacados">
					
				</div>
				<button class="ver btn-product"><a href="../vistas/categorias.php">Todos los Productos</a></button>
			</section>
            
			<div class="img-click">
				<div class="img-title">
				<h2>Aprende cómo registrarte a Conecta</h2>
                </div>
				<div class="img-check">
					<div class="zoom">
						<a href="https://youtu.be/QP6A7u7mCCs" target="_blank">
						<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Renzo/Conecta.webp" alt="Conecta">
						</a>
					</div>
				</div>
				
			</div>

			<section id="tunegocio">
				<section id="cont">
					<section id="desarrollamos">
						<section class="cajas first-caja">

							<h3 id="txtcaja">
								<span><img src="../public/imagenes/index/idea.webp"></span>
								Diseño
							</h3>
						</section>
						<section class="cajas">
							<h3 id="txtcaja">
								<span><img src="../public/imagenes/index/ubi.webp"></span>
								Ubicación
							</h3>
						</section>
						<section class="cajas">
							<h3 id="txtcaja">
								<span><img src="../public/imagenes/index/group.webp"></span>
								Opinión
							</h3>
						</section>
						<section class="cajas">
							<h3 id="txtcaja">
								<span><img src="../public/imagenes/index/conf.webp"></span>
								Promoción y publicidad
							</h3>
						</section>
					</section>
				</section>
			</section>

			<section class="titulocoti">
				<h2>Solicitud de cotización</h2>
			</section>

			<section class="abastece">
				<h4 id="abastece">Abastece tu negocio</h4>
				<br id="abastece">
				<div class="abastececonte">
					<div class="items">
						<span id="subtitulo">1200 RC</span>
					</div>
					<div class="items">
						<span id="subtitulo">2 horas Respuesta Promedio de cotización</span>
					</div>
					<div class="items">
						<span id="subtitulo">500+ Provedores activos</span>
					</div>

					<div class="items">
						<span id="subtitulo">100+Industrias</span>
					</div>
				</div>
			</section>
		</section>
		<?php include_once 'layouts/footer.php'; ?>
	</div>

	<script src="../public/plugins/jquery-3.5.1.min.js"></script>
	<script src="../public/js/index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../public/js/menu.js"></script>
	<script src="../public/plugins/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../public/js/form_registro.js"></script>
	<script type="text/javascript" src="../public/js/login.js"></script>

	<!--<script src="https://kit.fontawesome.com/c702fce202.js" crossorigin="anonymous"></script>-->
	

</body>

</html>