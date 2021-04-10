<div class="form-container">
	<form action="../vistas/panel_usuario/index.php" onsubmit="return CheckRegistro()" class="form-registro" method="POST">
		<h4>Registro</h4>
		<span class="close-button">x</span>

		<input class="controles" type="email" name="correo" id="correo" placeholder="Correo electrónico" required>

		<input class="controles" type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>

		<div class="ruc">
			<input class="controles" type="text" name="ruc" id="ruc" placeholder="RUC del negocio" onkeydown="return validateNumber(event)" maxlength="11">
		</div>
		

		<div class="ruc">
			<input class="controles" type="text" name="negocio" id="negocio" placeholder="Nombre del negocio" required title="Verifique correctamente sus
			datos, recuerde que este
			espacio no permite cambios"><i>✱</i>
		</div>
		

		<select name="tip-categorias" required id="tip-categorias" class="tip-categorias"></select>

		<input class="controles" type="text" name="direccion" id="direccion" placeholder="Dirección o referencia" >

		<input class="controles" type="text" name="nombre" id="nombre" placeholder="Nombre del titular" required>

		<input class="controles" type="text" name="numero" id="numero" placeholder="Número de celular" onkeydown="return validateNumber(event)" maxlength="9" required>

		<div class="btn-container">
			<input class="boton" id="registrar" type="submit" value="REGISTRARSE">
		</div>
	</form>
</div>

<div class="login-container">
	<form action="../vistas/panel_usuario/index.php" onsubmit="return CheckLogin()" class="form-login" method="POST">
		<h4>Iniciar sesión</h4>
		<span class="close-button-login">x</span>

		<input class="controles" type="email" name="correologin" id="correologin" placeholder="Correo electrónico" required>
		<input class="controles" type="password" name="contrasenalogin" id="contrasenalogin" placeholder="Contraseña" required>

		<input class="boton" type="submit" value="INGRESAR">
	</form>
</div>

<header class="cabecera">
	<figure class="img-container" id="img-logo">
		<a href="./index.php">
			<img src="../public/imagenes/header/LOGO_FINAL.webp" alt="">
		</a>
		<i class="icon-menu burger-button"></i>
	</figure>
	<section class="right-sect">
		<section class="top">
			<div class="division first">
				<p>#OrgullososdeComprarleAlPerú</p>
			</div>
			<div class="division second">
				<p>¿Tienes un negocio? <br>
					Te ayudamos.</p>
			</div>
			<div class="division third">
				<button class="register">
					REGÍSTRATE <br>
					GRATIS
				</button>
			</div>
			<div class="division fourth">
				<figure class="img-container">
					<img id="img-login" src="../public/imagenes/header/home.gif" alt="">
				</figure>

				<button class="Login">
					Iniciar sesión
				</button>
			</div>
		</section>
		<!--here search live code-->
		<section class="middle">
			<div class="input-container">
				<form action="search.php" method="GET">
					<input type="text"  name="inputsearch" id="inputsearch" placeholder="¿Qué estás buscando?" autocomplete="off" required>
					<input type="submit" value="">

					<!-- <i class="icon-search"></i> -->
				</form>
			</div>
			<div class="col-md-5" style="position:absolute;top:160px;left:180px;">
				<div class="list-group" id="showProduct">
					<!--<a href="#" class="list-group-item list-group-item-action">
					List 1</a>-->	
				</div>	
			
			</div>
		</section>
		
		<section class="bottom">
			<nav class="menu">
				<ul>
					<a href="./index.php" class="first-nav">
						<li>Inicio</li>
					</a>
					<li class="first-nav parent">
						<a href="./categorias.php">Categorías</a>
						<ul>
							<div class="wrapper">
								<li class="lng-nav">
									<input type="text" value="1" hidden>
									Ropa y textil
								</li>
								<li class="lng-nav">
									<input type="text" value="2" hidden>
									Abarrotes
								</li>
								<li class="lng-nav">
									<input type="text" value="3" hidden>
									Restaurantes
								</li>
								<li class="lng-nav">
									<input type="text" value="4" hidden>
									Salud
								</li>
							</div>

							<div class="wrapper">
								<li class="lng-nav">
									<input type="text" value="5" hidden>
									Pastelería
								</li>
								<li class="lng-nav">
									<input type="text" value="6" hidden>
									Cuero y calzado
								</li>
								<li class="lng-nav">
									<input type="text" value="7" hidden>
									Ferretería
								</li>
								<li class="lng-nav">
									<input type="text" value="8" hidden>
									Frutas y verduras
								</li>
							</div>

							<div class="wrapper">
								<li>
									<input type="text" value="9" hidden>
									Útiles de oficina
								</li>
								<li>
									<input type="text" value="10" hidden>
									Mascota
								</li>
								<li>
									<input type="text" value="11" hidden>
									Iluminación
								</li>
								<li>
									<input type="text" value="12" hidden>
									Decoración
								</li>
								<li>
									<input type="text" value="13" hidden>
									Otros
								</li>
							</div>
						</ul>
					</li>
					<li class="first-nav">
						<a href="./nosotros.php">¿Quíenes somos?</a>
					</li>
					<li class="first-nav">
						<a href="./contactanos.php">Contáctanos</a>
					</li>
				</ul>
			</nav>
		</section>
	</section>
</header>