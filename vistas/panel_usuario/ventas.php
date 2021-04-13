<?php
include 'header.php';
?>
<link rel="stylesheet" href="css/form-pedido.css">
<link rel="stylesheet" href="css/pedidos.css" />
</head>

<body class="body">
  <div class="page-container">
    <?php include 'menu.html'; ?>
    <main class="main">
      <?php include 'superior.php'; ?>

      <section class="contenido-pedidos ventas">
        <div class="space">
          <div class="titulo">
            <div class="cont-titulo">
              <h3>
                Ventas
              </h3>
            </div>
          </div>

          <div class="table-container">
            <table id="tableVentas">
              <!-- Cabecera de tabla -->
              <thead>
                <tr>
                  <th>Nombre completo del cliente</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Monto</th>
                  <th>Fecha</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </section>
    </main>
  </div>
  <?php include 'footer.php'; ?>
  <script type="text/javascript" src="./js/ventas.js"></script>
  </body>
</html>