<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/style.css" />  
</head>

<body class="body">
<?php include 'menu.html'; ?>
    <main class="main">
      <?php include 'superior.php'; ?>
    <div class="container col-md-6 my-4" style="z-index: 0;">
        <div class="card">
            <div class="card-header">
               <h4 class="text-center">Cambiar Contraseña</h4>
            </div>
            <div class="card-body">
                <form class="form-inline" id="credential">
                    <div class="form-group mb-2">
                        <label for="contraseñaAnterior">Contraseña Actual</label>
                        <input type=password" class="form-control" id="contraseñaAnterior" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="ContraseñaNueva">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="ContraseñaNueva" placeholder="Nueva Contraseña" required>
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: #FFA500;">Cambiar</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                <h6>Recuerda que con la nueva contraseña te podras Iniciar Sesion</h6>
            </div>
        </div>
        
    </div>
  </main>
  <?php include 'footer.php'; ?>
  <script src="./js/credential.js"></script>
</body>