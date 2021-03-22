const menu = document.querySelector('.nav');
const Ho = document.querySelector('.menuHo');
const menuButton = document.querySelector('.burger-button');

function ShowHideMenu(){
  if (menu.classList.contains('is-active')){
    menu.classList.remove('is-active');
  }
  else{
    menu.classList.add('is-active');
  }
}
menuButton.addEventListener('click', ShowHideMenu)

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
