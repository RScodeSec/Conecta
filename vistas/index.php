<!DOCTYPE html>
<html>

<head>
	<title>Bienvenidos a Conecta Perú</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preload" href="../public/css/test-header.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link rel="preload" href="../public/css/slider.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<!--<link rel="stylesheet" type="text/css" href="../public/css/test-header.css">-->
	<!--<link rel="stylesheet" type="text/css" href="../public/css/index.css">-->
	<link rel="preload" href="../public/css/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<!--<link rel="stylesheet" type="text/css" href="../public/css/footer.css">-->
	<link rel="preload" href="../public/plugins/bootstrap/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link rel="preload" href="../public/css/footer.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<!--<link rel="preload" href="../public/css/footer.css" as="style" onload="this.onload=null;this.rel='stylesheet'">-->
	
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />-->
	

	<!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		rel="preload"
		as="style"
		href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap"
	/>
	<link
		rel="preload"
		as="style"
		href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap"
	/>-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />-->
	<!--<link rel="stylesheet" href="../public/css/formulario.css">-->
	<!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>-->
	
	
	<!--<link rel="stylesheet" href="../public/css/login.css">-->
	<link rel="preload" href="../public/css/login.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link rel="preload" href="../public/css/formulario.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<!--<link rel="preload" href="../public/plugins/fontawesome/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">-->

</head>

<body>

	
		<?php include_once 'layouts/header.php' ?>
		
		<?php include_once 'slider.php' ?>



      


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

	<script src="../public/plugins/jquery-3.5.1.min.js"></script>
	<script src="../public/js/index.js"></script>
	<script type="text/javascript" src="../public/plugins/bootstrap/js/bootstrap.min.js" defer></script>
	<script type="text/javascript" src="../public/js/menu.js" defer></script>
	<script src="../public/plugins/sweetalert2.all.min.js" defer></script>
	<script type="text/javascript" src="../public/js/form_registro.js" defer></script>
	<script type="text/javascript" src="../public/js/login.js" defer></script>
	<script src="../public/js/lazysizes.min.js" async></script>
	<script src="../public/js/slider.js" async></script>

	
</body>

</html>