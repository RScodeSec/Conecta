<?php
$title = "Categorías";
include_once 'layouts/head.php';
?>
<!--<link rel="stylesheet" type="text/css" href="../public/css/categorias.css">-->
<link rel="preload" href="../public/css/categorias.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
</head>

<body>

	<div class="page-container">

		<?php include_once 'layouts/header.php'; ?>

		<br>
		<section id="t-principal">
			<h4 id="categoria">Categorías</h4>
		</section>

		<section id="contendido">
			<section id="contenedor" class="contentCats"></section>
		</section>

		<?php include_once 'layouts/footer.php'; ?>

	</div>
	<?php include_once 'layouts/scripts.php'; ?>
	<script src="../public/js/categorias.js"></script>
</body>

</html>