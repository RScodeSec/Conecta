const menu = document.querySelector(".menu");
const menuButton = document.querySelector(".burger-button");

// Ocultar-Desplegar menu
function HideShowMenu() {
	if (menu.classList.contains("is-activem")) {
		menu.classList.remove("is-activem");
	} else {
		menu.classList.add("is-activem");
	}
}
menuButton.addEventListener("click", HideShowMenu);

function empresasByCategoria(li) {
	let urlEmps = "../index.php?controller=categoria&action=empresasByCategoria",
		data = {
			idCat: li.getElementsByTagName("input")[0].value,
			nomCat: li.textContent,
        };
	$.ajax({
		type: "POST",
		url: urlEmps,
		data: data,
		success: function () {
			location.href = "categoria.php";
		},
	});
}
$(".wrapper").on("click", "li", function () {
	empresasByCategoria($(this)[0]);
});
