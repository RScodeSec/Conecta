<?php
$title = "Restablecer Credencial";
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
					<h5 class="card-title">Ingresa Nueva Contraseña</h5>
				</div>
				<div class="card-body">
				<form id="recoverPassword">
					<div class="form-group">
						<label for="Contraseña1">Contraseña</label>
                        <input type="text" class="form-control" id="urltoken" value="<?php echo $_GET['token'];?>" hidden>
                        <input type="text" class="form-control" id="idRuc" value="<?php echo $_GET['id'];?>" hidden>
						<input type="password" class="form-control" id="newpassword" placeholder=" Ingrese su Contraseña Nueva" required>
					</div>
					<!--<div class="form-group">
						<label for="Contraseña2">Confirma Contraseña</label>
						<input type="text" class="form-control" id="Contraseña2" placeholder="Confirma Contraseña">
					</div>-->
					<button type="submit" class="btn text-white" style="background-color: #FFA500;">Confirmar</button>
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
	<script src="../public/js/recover.js"></script>
</body>
</html>