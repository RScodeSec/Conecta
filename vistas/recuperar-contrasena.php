<?php
$title = "Solicitar Nueva Credencial";
include_once 'layouts/head.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/categorias.css">
</head>

<body>

	<div class="page-container">

		<?php include_once 'layouts/header.php'; ?>

		<br>
		<div class="container col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Solicitar Restablecimiento de Mi Credencial</h5>
				</div>
				<div class="card-body">
				<form id="solicitar">
					<div class="form-group">
						<label for="Contraseña1">Correo</label>
						<input type="email" class="form-control" id="email" placeholder="Ingrese su Email Registrado" required>
					</div>
					<!--<div class="form-group">
						<label for="Contraseña2">Confirma Contraseña</label>
						<input type="text" class="form-control" id="Contraseña2" placeholder="Confirma Contraseña">
					</div>-->
					<button type="submit" class="btn btn-primary mb-2">Confirmar</button>
				</form>
				</div>
				<div class="card-footer text-muted">
					Recuerda Revisar Su  bandeja de Correo no Deseado!!
				</div>
				
			</div>
			<br>
		

		</div>
		<?php include_once 'layouts/footer.php'; ?>

	</div>
	<?php include_once 'layouts/scripts.php'; ?>
	<script src="../public/js/recover.js"></script>
	<!--<script src="../public/js/categorias.js"></script>-->
</body>

</html>