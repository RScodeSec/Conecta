<section class="menuHo initial">
    <div class="menu-top">
    <img class="menuHo__img" src="image/usuario.jpg" alt="usuario" /> 
    <h2>BIENVENIDO A TU TIENDA VIRTUAL</h2>
    <a id="mybusiness"class="ver__tienda1" href="#"><i class="fas fa-list-alt"></i> Ver tienda</a>
    </div>
    <div class="menuHo__usuarioSection">
      <input type="text" id="rucSuperior" value="<?php echo $_SESSION['empresa']['RucEmpresa'] ?>" hidden>
      <figcaption class="menuHo__nombre"><?php echo $_SESSION['empresa']['NomTitular'] ?><br><br><a class="ver__tienda2" href="#"><i class="fas fa-list-alt"></i> Ver tienda</a> </figcaption>
    </div>
</section>