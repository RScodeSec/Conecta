<section class="menuHo initial">
  <figure class="menuHo__usuario">
    <div class="menuHo__usuarioSection">
      <img class="menuHo__img" src="image/usuario.jpg" alt="usuario" />
      <input type="text" id="rucSuperior" value="<?php echo $_SESSION['empresa']['RucEmpresa'] ?>" hidden>
      <figcaption class="menuHo__nombre"><?php echo $_SESSION['empresa']['NomTitular'] ?><br><br><a class="ver__tienda2" href="#"><i class="fas fa-list-alt"></i> Ver tienda</a> </figcaption>
    </div>
    <a class="ver__tienda1" href="#"><i class="fas fa-list-alt"></i> Ver tienda</a>

  </figure>
</section>