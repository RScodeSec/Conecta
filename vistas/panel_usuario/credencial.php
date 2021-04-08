<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/style.css" />  
</head>

<body class="body">
<?php include 'menu.html'; ?>
    <main class="main">
      <?php include 'superior.php'; ?>
    <div class="container col-md-4 my-2">
        <div class="card">
            <div class="card-header">
               <h4 class="text-center">Cambiar Contraseña</h4>
            </div>
            <div class="card-body">
                <form class="form-inline">
                <div class="form-group">
                    <label for="contraseñaAnterior">Contraseña</label>
                    <input type=password" class="form-control" id="contraseñaAnterior" placeholder="Contraseña">
                </div>
                <div class="form-group mb-2">
                    <label for="ContraseñaNueva">Nueva Contraseña</label>
                    <input type="password" class="form-control" id="ContraseñaNueva" placeholder="Nueva Contraseña">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cambiar</button>
                </form>
            </div>
            <div class="card-footer">
                <h6>Recuerda que con la nueva contraseña te podras Loguear</h6>
            </div>
        </div>
        
    </div>
  </main>
  <?php include 'footer.php'; ?>
</body>