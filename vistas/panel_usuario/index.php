<?php
include 'header.php';
?>
</head>
<body class="body">
  <div class="page-container">
    <?php include 'menu.html'; ?>
    <main class="main">
      <?php include 'superior.php'; ?>
      <section class="container col-md-12">
        
          <table class="table table-hover table-Light table-responsive">
            <thead class="bg-info text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td class="w-25"><img class="w-100" src="../panel_usuario/image/usuario.jpg" alt=""></td>
                <td>Camisa Floreada<br>Estilo mancora 1kg</td>
                <td>S/45</td>
                <td>Vendido: 45</td>
              </tr>
              
            </tbody>
        </table>
       
      </section>
    </main>
  </div>
<?php include 'footer.php'; ?>
  </body>
</html>