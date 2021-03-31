<?php
include 'header.php';
?>
</head>
<body class="body">
  <div class="page-container">
    <?php include 'menu.html'; ?>
    <main class="main">
      <?php include 'superior.php'; ?>
      <div class="container  datos-title  col-md-12 rounded-top">
      <h4 class="py-3 my-0"> <i class="fas fa-medal"></i> Destacados</h4>
      </div>
      
      <section class="container datos-v5 col-md-12 rounded-bottom">
         <br>
       <div>
          <table class="table table-hover table-Light table-responsive bg-light">
            <thead class="bg-info text-white">
              <!-- <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">
                  Descripcion
                </th>
                <th scope="col">Estado</th>
              </tr> -->
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td class="w-25"><img class="w-100" src="../panel_usuario/image/usuario.jpg" alt=""></td>
                <td class="w-50">
                  <div class="d-flex justify-content-between">
                    <p class="">Camisa Floreada</p>
                    <p>S/.45</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </td>
                <td>Vendido: 45</td>
              </tr>
              
            </tbody>
        </table>
        <p class="text-center p-4">Actualizado a las <?php
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        date_default_timezone_set('America/Lima');
        echo date('H:i:s').' ' . 'del '. date('d'). ' de '. $meses[date('n')-1]. ' del '. date('Y');
        ?></p>
      </section>
    </main>
  </div>
<?php include 'footer.php'; ?>
<script type="text/javascript" src="./js/bestSeller.js"></script>
  </body>
</html>