<?php
include 'header.php';
?>
<link rel="stylesheet" href="css/form-pedido.css">
<link rel="stylesheet" href="css/pedidos.css" />

</head>

<body class="body">
<?php include 'menu.html'; ?>
  <!-- Formulario ver pedido -->
  <div class="form-container" style="z-index: 100;">
    <form action="" class="frm-product" onsubmit="return false" >
      <div class="close-container" >
        <span class="close-title">Ver pedido</span>
        <span class="close-button">x</span>
      </div>

      <div class="body-frm-container">
        <figure class="img-container">
          <img  id="img-Product" src="" alt="img-Product">
        </figure>
        <input type="text" id="idPed" hidden>
        <div class="comments-container">
          <div class="comments-title-container">
            <h3 class="comments-title">Teléfono:</h3>
          </div>
          <input type="text" id="telefono">
          <div class="comments-title-container">
            <h3 class="comments-title">Dirección:</h3>
          </div>
          <input type="text" id="direccion">
          <div class="comments-title-container">
            <h3 class="comments-title">Comentarios:</h3>
          </div>
          <textarea name="" id="comments" cols="30" rows="3"></textarea>
          <div class="buttons-container">
            <button class="btn-cancelar"><i class="fas fa-times"></i>Cancelar</button>
            <button class="btn-confirmar"><i class="fas fa-check"></i>Confirmar</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="page-container">
    
    <main class="main">
      <?php include 'superior.php'; ?>
      <section class="contenido-pedidos">
        <div class="space">
          <div class="titulo">
            <div class="cont-titulo">
              <h3>
                Pedidos
              </h3>
            </div>
          </div>
          <div class="table-container">
            <table id="tablePedidos">
              <!-- Cabecera de tabla -->
              <thead>
                <tr>
                  <th>Nombre del producto</th>
                  <th>Nombre completo del cliente</th>
                  <th>Cantidad</th>
                  <th>Fecha</th>
                  <th>Botón ver</th>
                  <th>Botón eliminar</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>

      </section>
    </main>
  </div>
  <?php include 'footer.php'; ?>
  <script type="text/javascript" src="./js/form-pedido.js"></script>
</body>

</html>