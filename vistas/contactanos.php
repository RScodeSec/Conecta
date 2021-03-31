<?php
$title = "Contáctanos";
include_once 'layouts/head.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/index.css">
<link rel="stylesheet" type="text/css" href="../public/css/contactanos.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
	<div class="page-container">

		<?php include_once 'layouts/header.php'; ?>

		<br>
		<section id="t-principal">
			<h4 id="categoria">Contáctanos</h4>
		</section>

		<main class="main__contacto col-md-8">
			<form action="../controladores/enviarcorreo.php" class="form" method="post">
				<input class="form__section sombra" type="text" name="nombre" id="nombre" placeholder="Nombres y Apellidos" pattern="[a-zA-Z ]{2,254}" title="Solo debe contener letras. e.g. john" required>
				<div class="form__section form__content">
					<input type="text" class="formSec__item margin" placeholder="DNI" name="dni" id="dni" pattern="[0-9]{8}" title="Debe poner 8 números" required>
					<input class="formSec__item" type="text" placeholder="Provincia/Distrito" name="provincia" id="provincia" required>
					<input type="email" class="formSec__item margin  " name="email" id="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="e.g. aso@gmail.com" required>
					<input class="formSec__item " type="text" name="telefono" id="telefono" placeholder="Teléfono"   pattern="[0-9]{9,12}" title="debe conter numeros" required>
				</div>
				<textarea class="form__section sombra" name="comentarios"  id="comentarios" cols="70" rows="10" style="height: 64px;" placeholder="Escribe tu comentario aquí" required></textarea>

				<!--<input class="form__section boton" type="submit" value="Enviar">-->
				<button class="form__section boton"  id="enviar" name="enviar" >Enviar</button>

			</form>
		</main>

		<?php include_once 'layouts/footer.php'; ?>

	</div>

	<?php include_once 'layouts/scripts.php'; ?>
	
</body>

</html>