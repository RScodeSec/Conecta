<?php
session_start();
$title = $_SESSION['categoria']['nomCat'];
include_once 'layouts/head.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/ropa.css">
</head>

<body>

	<div class="page-container">

		<?php include_once 'layouts/header.php'; ?>

		<br>
		<section id="t-principal">
			<h4 id="categoria"><?php echo $title; ?></h4>
		</section>

		<section id="contendido">
			<section id="contenedor" class="contentEmps">
				<?php echo $_SESSION['cuadrosEmps']; ?>
			</section>
		</section>

		<?php include_once 'layouts/footer.php'; ?>

	</div>

	<?php include_once 'layouts/scripts.php'; ?>
	<script src="../public/js/categorias.js"></script>
</body>

</html>