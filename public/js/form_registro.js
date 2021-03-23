const register = document.querySelector('.form-container');
const registerButton = document.querySelector('.register');
const closeButton = document.querySelector('.close-button');
const suscribit = document.getElementById('suscri')

suscribit.addEventListener('click',()=>{
	ShowRegister()
})
// Desplegar registro
function ShowRegister() {
    register.classList.add('is-active');
}
registerButton.addEventListener('click', ShowRegister);


// Ocultar registro
function HideRegister() {
    register.classList.remove('is-active')
}
closeButton.addEventListener('click', HideRegister);

function validateNumber(event) {
	let unicode = event.keyCode || event.which;
	let correctKey =
		unicode == 8 ||
		unicode == 9 ||
		unicode == 116 ||
		(unicode >= 48 && unicode <= 57) || // Números
		(unicode >= 96 && unicode <= 105); // NumPad
	return correctKey;
}

function getFormResponse(url, parametros) {
	let result;
	$.ajax({
		data: parametros,
		url: url,
		type: "POST",
		async: false,
		success: function (response) {
			let json = JSON.parse(response);
			if (json.bool == false) {
				let msg;
				switch (json.error) {
					case "datosIncorrectos":
						msg = "Datos incorrectos o incompletos";
						break;
					case "problemaSQL":
						msg = "Hubo un problema en el registro";
						break;
					case "rucDuplicado":
						msg = "RUC inválido";
                        break;
				}
				Swal.fire({
					icon: "error",
					title: msg,
					confirmButtonText: "Volver a intentar",
				});
				result = json.bool;
			} else {
				result = json;
			}
		},
	});
	return result;
}
function CheckRegistro() {
	const url = "../index.php?controller=empresa&action=registro",
		parametros = {
			email: $("#correo").val(),
			clave: $("#contrasena").val(),
			ruc: $("#ruc").val(),
			empresa: $("#negocio").val(),
			categoria: $("#tip-categorias").val(),
			direccion: $("#direccion").val(),
			titular: $("#nombre").val(),
			telefono: $("#numero").val(),
		};
		return getFormResponse(url, parametros);
}

$('#tip-categorias').load("../index.php?controller=categoria&action=listarCategorias");

