<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/datos.css">
<link rel="stylesheet" href="css/style.css" />  
</head>
<body class="body">
  <?php include 'menu.html'; ?>
  <main class="main">
    <?php include 'superior.php'; ?>
    <section class="formulario">
      <form class="datos" id="formDatos" enctype="multipart/form-data">
        <h1 class="datos__titulo">Mis datos</h1>
        <div class="datos-generales">
          <div class="group">
          <label for="" >Administrador <i class="fas fa-info-circle info  adminCorreo"></i><p class="alerta">Por seguridad este campo esta bloqueado</p></label>
          <input class="datos__form" type="text" placeholder="Nombre" name="nombre" value="<?php echo $_SESSION['empresa']['NomTitular'] ?>" readonly title="Verifique correctamente sus
datos, recuerde que este
espacio no permite cambios">
          </div>

          <div class="group">
          <label for="" >Tienda <i class="fas fa-info-circle info adminCorreo3"></i><p class="alerta3">Antes de modificar este campo verifica si se encuentra sujeto al cambio de categoria</p></label>
          <input class="datos__form" type="text" placeholder="Mi empresa" name="mi_empresa" name="nameBusiness" id="nameBusiness" value="<?php echo $_SESSION['empresa']['NomEmpresa'] ?>">
          </div>

          <div class="group">
          <label for="">Correo <i class="fas fa-info-circle info adminCorreo2"></i><p class="alerta2">Por seguridad este campo esta bloqueado</p></label>
          <input class="datos__form" type="email" placeholder="Correo electrónico" name="email" id="emailPers" value="<?php echo $_SESSION['empresa']['EmailPers'] ?>" readonly>
          </div>

          <div class="group">
          <label for="">Correo Corporativo </label>
          <input class="datos__form" type="email" placeholder="Correo Corporativo" name="email_corporativo" id="emailEmp" value="<?php echo $_SESSION['empresa']['EmailEmp'] ?>" required>
          </div>

          <div class="group">
            <label for="categoria">Categoria <i class="fas fa-info-circle info adminCorreo4"></i><p class="alerta4">Antes de modificar este campo verifica si se encuentra sujeto al cambio de categoria</p></label>
            <!--<input class="datos__form" type="password" placeholder="Contraseña" name="contrasena" value="</?php echo $_SESSION['empresa']['Contrasena'] ?>" readonly>-->
              <input type="text" id="phpcategoria" value="<?php echo $_SESSION['empresa']['IdCategoria'] ?>" hidden>
              <select class="datos__form  select-hidden" id="categoria" name="categoria"></select>
          </div>
          <input class="datos__form" type="text" placeholder="RUC" name="ruc" id="ruc" value="<?php echo $_SESSION['empresa']['RucEmpresa'] ?>" hidden>
          <div class="group">
            <label for="numruc">RUC</label>
            <input class="datos__form" type="text" placeholder="RUC" name="numruc" id="numruc" value="<?php echo $_SESSION['empresa']['NumRucEmp'] ?>" >
          </div>

          <div class="descripcion">
            <label for="descripcion">Descripción de tu tienda <i class="fas fa-info-circle info adminCorreo5"></i><p class="alerta5">Antes de modificar este campo verifica si se encuentra sujeto al cambio de categoria</p></label><br>
            <textarea class="datos__form text_area" rows="8" cols="50" id="descripcion" name="descripcion" required ><?php echo $_SESSION['empresa']['Descripcion'] ?></textarea>
          </div>
          <div class="selectores">
            <div class="departamento">
              <label for="departamento">Departamento:</label><br>
              <input type="text" id="phpDepartamento" value="<?php echo @$_SESSION['ubicacion']['IdDepartamento'] ?>" hidden>
              <select class="datos__form texto select-hidden" id="departamento" name="departamento"></select>
            </div>
            <div class="provincia">
              <label for="provincia">Provincia:</label><br>
              <input type="text" id="phpProvincia" value="<?php echo @$_SESSION['ubicacion']['IdProvincia'] ?>" hidden>
              <select class="datos__form texto" id="provincia" name="provincia" disabled>
                <option value="0">Seleccione una provincia...</option>
              </select>
            </div>
            <div class="distrito">
              <label for="distrito">Distrito:</label><br>
              <input type="text" id="phpDistrito" value="<?php echo @$_SESSION['ubicacion']['IdDistrito'] ?>" hidden>
              <select class="datos__form texto" id="distrito" name="distrito" disabled>
                <option value="0">Seleccione un distrito...</option>
              </select>
            </div>
          </div>
          <div class="group">
            <label for="">Direccion de Empresa</label>
            <input class="datos__form" type="text" placeholder="Direccion de empresa" name="direccion" id="direccion" value="<?php echo $_SESSION['empresa']['Direccion'] ?>" required>
          </div>

          <div class="group">
            <label for="">Telefono</label>
            <input class="datos__form" type="tel" placeholder="Teléfono" name="telefono" id="telefono" value="<?php echo $_SESSION['empresa']['Telefono'] ?>" onkeydown="return validateNumber(event)" required>
          </div>

          <div class="group">
            <label for="">WhatsApp</label>
            <input class="datos__form" type="tel" placeholder="Whatsapp" name="whatsapp" id="whatsapp" value="<?php echo $_SESSION['empresa']['Whatsapp'] ?>" onkeydown="return validateNumber(event)">
          </div>

          <div class="group">
            <label for="">URL Facebook</label>
            <input class="datos__form" type="url" placeholder="URL facebook" name="facebook" id="facebook" value="<?php echo $_SESSION['empresa']['Facebook'] ?>">
          </div>
          
         <div class="group">
           <label for="">Url Instagram</label>
           <input class="datos__form" type="url" placeholder="URL instagram" name="instagram" id="instagram" value="<?php echo $_SESSION['empresa']['Instangram'] ?>"> 
         </div>
          
          
        </div>
          <section class="imagen">
            <figure class="imagen__logo">
              <img style="width: 180px;margin:5%;display: block; height: 180px;" src="<?php  echo 'logoemp/' .  $_SESSION['empresa']['Logo'] ?>" alt="logo" class="imagen__img1">
            </figure>
            <div class="indicacion">
              <p class="indicacion__texto">Sube tu logo en JPG o PNG, peso máximo de 1Mb. Tamaño sugerido 180 x 180
                pixeles.<input   type="hidden" name="nameimage" id="nameimage" value="<?php echo $_SESSION['empresa']['Logo'] ?>"></p>
              <input class="indicacion__form datos__form" type="file" id="file" name="file" accept=".jpg , .png , .webp" required>
            </div>
          </section>
          <input class="imagen__submit" type="submit" id="btnGuardar" value="Guardar datos">
       
      </form> <!-- end form code :::::::::::::-->
    </section>
  </main>
  <?php include 'footer.php'; ?>
  <script type="text/javascript" src="./js/datos.js"></script>
  <script src="./js/alert.js"></script>
  </body>
</html>