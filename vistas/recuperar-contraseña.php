<?php
$title = "Categorías";
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
					<h5 class="card-title">Recuperar la Contraseña</h5>
				</div>
				<div class="card-body">
				<form>
					<div class="form-group">
						<label for="Contraseña1">Contraseña</label>
						<input type="password" class="form-control" id="Contraseña1" placeholder="Contraseña">
					</div>
					<div class="form-group">
						<label for="Contraseña2">Confirma Contraseña</label>
						<input type="password" class="form-control" id="Contraseña2" placeholder="Confirma Contraseña">
					</div>
					<button type="submit" class="btn mb-2 text-light" style="background-color: #FF9E00;">Confirmar</button>
				</form>
				</div>
				<div class="card-footer text-muted">
					Recuerda memorizar tu contraseña
				</div>
			</div>
			<br>
		

		</div>
		<?php include_once 'layouts/footer.php'; ?>

	</div>
	<?php include_once 'layouts/scripts.php'; ?>
	<script src="../public/js/categorias.js"></script>
</body>

</html>