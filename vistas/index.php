<!DOCTYPE html>
<html>

<head>
	<title>Bienvenidos a Conecta Perú</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../public/css/test-header.css">
	<!--<link rel="stylesheet" type="text/css" href="../public/css/index.css">-->
	<link rel="preload" href="../public/css/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<!--<link rel="stylesheet" type="text/css" href="../public/css/footer.css">-->
	<link rel="preload" href="../public/css/footer.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />


	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		rel="preload"
		as="style"
		href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap"
	/>
	<link
		rel="preload"
		as="style"
		href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap"
	/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--<link rel="stylesheet" href="../public/css/formulario.css">-->
	<link rel="preload" href="../public/css/formulario.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<!--<link rel="stylesheet" href="../public/css/login.css">-->
	<link rel="preload" href="../public/css/login.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

	<!--<link rel="stylesheet" href="../public/css/sweetalert2.min.css">-->
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
								<span><img src="../public/imagenes/index/idea.webp" width="16" height="16"></span>
								Diseño
							</h3>
						</section>
						<section class="cajas">
							<h3 id="txtcaja">
								<span><img src="../public/imagenes/index/ubi.webp" width="16" height="16"></span>
								Ubicación
							</h3>
						</section>
						<section class="cajas">
							<h3 id="txtcaja">
								<span><img src="../public/imagenes/index/group.webp" width="16" height="16"></span>
								Opinión
							</h3>
						</section>
						<section class="cajas">
							<h3 id="txtcaja">
								<span><img src="../public/imagenes/index/conf.webp" width="16" height="16"></span>
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

	<!--<script src="../public/plugins/jquery-3.5.1.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script src="../public/js/index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" defer></script>
	<script type="text/javascript" src="../public/js/menu.js" defer></script>
	<!--<script src="../public/plugins/sweetalert2.all.min.js"></script>-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js" defer></script>
	<script type="text/javascript" src="../public/js/form_registro.js" defer></script>
	<script type="text/javascript" src="../public/js/login.js" defer></script>

	<!--<script src="https://kit.fontawesome.com/c702fce202.js" crossorigin="anonymous"></script>-->
	

</body>

</html>