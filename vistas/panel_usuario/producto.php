<?php
include 'header.php';
?>
<link rel="stylesheet" href="css/producto.css">
</head>
<body class="body">
  <?php include 'menu.html'; ?>
  <main class="main">
    <?php include 'superior.php'; ?>
    <!-- <a href="#" class="producto__boton" id="nuevoProducto"> <i class="fas fa-list-alt"></i>&#160;Nuevo Producto</a> -->
    <section class="producto">
      <h1 class="producto__titulo">Productos</h1>
      <div class="form__producto" id="bloque" style="overflow-y: scroll;">
        <div class="contenido" >
          <h1 class="formProducto">Nuevo producto</h1>
          
          <!-- New Product-->
          <form class="formProducto__form" id="formProducto" enctype="multipart/form-data">
            <input type="text" id="idProd" hidden>
            <label for="nombre">Nombre del producto:</label>
            <input style="border:1px solid gray" class="form__item t" type="text" id="nombre" name="nombre_producto" required>
            <div class="form__parte">
              <label for="cantidad">Cantidad:</label>
              <input style="border:1px solid gray" class="form__item t" type="text" id="cantidad" required>
              <div class="form__item">
                <label for="medida" class="text_label">Medida:</label><br>
                <select style="border:1px solid gray;background-color: white;" id="medida" name="medida" class="form__item t">
                  <option value="Kilo(s)">Kilo(s)</option>
                  <option value="Litro(s)">Litro(s)</option>
                  <option value="Unidad(es)">Unidad(es)</option>
                </select>
              </div>
              <label for="precio">Precio:</label>
              <input style="border:1px solid gray" class="form__item t" type="text" id="precio" required>
              <div class="form__item">
                <label for="descripcion" class="text_label t">Descripción del producto:</label><br>
                <textarea style="border:1px solid gray" class="form__text" id="descripcion" name="descripcion" required></textarea>
              </div>
              <div class="form__item">
                <!-- <input type="text" name="nameimage" id="nameimage" readonly> -->                 
                
                <label for="imagen"  class="text_label">imagen del poducto Principal:<input  style="border: 0; outline: none;" type="hidden" name="nameimage" id="nameimage" disabled> </label><br>
                <input style="border-radius:initial;" type="file" id="file" class="form__item" name="file" accept=".jpg , .png , .webp" required>
              </div>
              <div class="form__item">
                <!-- <input type="text" name="nameimage" id="nameimage" readonly> -->                 
                
                <label for="imagen"  class="text_label">imagen del poducto 1:<input  style="border: 0; outline: none;" type="hidden" name="nameimage1" id="nameimage1" disabled> </label><br>
                <input style="border-radius:initial;" type="file" id="file1" class="form__item" name="file" accept=".jpg , .png , .webp" required>
              </div>
              <div class="form__item">
                <!-- <input type="text" name="nameimage" id="nameimage" readonly> -->                 
                
                <label for="imagen"  class="text_label">imagen del poducto 2:<input  style="border: 0; outline: none;" type="hidden" name="nameimage2" id="nameimage2" disabled> </label><br>
                <input style="border-radius:initial;" type="file" id="file2" class="form__item" name="file" accept=".jpg , .png , .webp" required>
              </div>
            </div>
            <div class="botonesProducto">
              <a href="#" class="cancelar" id="cancelar"><i class="fas fa-times"></i> Cancelar</a>
              <button type="submit" class="form__submit guardar"><i class="fas fa-check"></i> Guardar</button>
            </div>

          </form>
          <!--here end new producto-->
        </div>
      </div>
      <div class="producto__tabla">
        <table class="tabla" id="productosTabla">
          <!-- <colgroup>
            <col style="width: 20%;">
            <col style="width: 20%;">
            <col style="width: 20%;">
            <col style="width: 20%;">
            <col style="width: 20%;"><thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
          </colgroup> -->
          <thead>
            <tr id="tabla__head">
              <th class="tabla__celda" style="color: white;">Nombre</th>
              <th class="tabla__celda" style="color: white;">Cantidad disponible</th>
              <th class="tabla__celda" style="color: white;">Precio</th>
              <th class="tabla__celda" style="color: white;">Editar</th>
              <th class="tabla__celda" style="color: white;">Eliminar</th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- <div class="items">
        <a href="#" class="items__1">Anterior</a>
        <a href="#" class="items__1">1</a>
        <a href="#" class="items__1">2</a>
        <a href="#" class="items__1">Siguiente</a>
      </div> -->
    </section>
  </main>
  <?php include 'footer.php'; ?>
  <script type="text/javascript" src="./js/producto.js"></script>
  </body>
</html>