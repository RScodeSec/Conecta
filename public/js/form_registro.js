const register = document.querySelector('.form-container');
const registerButton = document.querySelector('.register');
const closeButton = document.querySelector('.close-button');
const suscribit = document.getElementById('suscri')
const correo = document.querySelector('.input-footer');

const registro = document.querySelector('#registrar');

suscribit.addEventListener('click',()=>{
	if(correo.value.length>1){
		$("#correo").val(correo.value)
		ShowRegister()	
	}else{
		Swal.fire({
			position: 'center',
			width: 400,
			padding: '6em',
			icon: 'error',
			title: 'Escribe tu Correo',
			showConfirmButton: false,
			timer: 500
		  })
	}
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

// registro.addEventListener('submit',(e)=>{
// 	e.preventDefault()
// 	CheckRegistro()
// })

$('#tip-categorias').load("../index.php?controller=categoria&action=listarCategorias");

