const login = document.querySelector('.login-container');
const loginButton = document.querySelector('.Login');
const closeButtonLogin = document.querySelector('.close-button-login');

// Desplegar Login
function ShowLogin(){
    login.classList.add('is-activel')
}
loginButton.addEventListener('click', ShowLogin);

// Ocultar Login
function HideLogin(){
    login.classList.remove('is-activel')
}
closeButtonLogin.addEventListener('click', HideLogin);

function CheckLogin() {
	const email = $("#correologin").val(),
		clave = $("#contrasenalogin").val(),
		url = "../index.php?controller=empresa&action=login",
		parametros = {
			email: email,
			clave: clave,
		};
	return getFormResponse(url, parametros);
}
