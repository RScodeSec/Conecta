$(function () {
	let tablePed = $("#tablePedidos").DataTable({
		language: {
			url: "js/spanish.json",
		},
		scrollX: true,
		dom: "<f>t<ip>",
		lengthChange: false,
		pageLength: 5,
		ajax: {
			url:
				"../../index.php?controller=pedido&action=mostrarPedidosByRuc&ruc=" +
				$("#rucSuperior").val(),
			dataSrc: "",
		},
		columns: [
			{ data: "NomProducto" },
			{ data: "NombreCompleto" },
			{ data: "Cantidad" },
			{ data: "Fecha" },
			{ data: null, className: "btn-ver-cont" },
			{ data: null, className: "btn-ver-cont" },
		],
		columnDefs: [
			{
				defaultContent:
					'<button class="delete"><i class="fas fa-trash-alt"></i></button>',
				targets: -1,
			},
			{
				targets: -2,
				defaultContent:
					'<button class="check-order"><i class="far fa-eye"></i></button>',
			},
		],
	});
	$("#tablePedidos tbody").on("click", ".check-order", function () {
		ShowForm();
		let data = tablePed.row($(this).parents("tr")).data();
		$("#idPed").val(data["IdPedido"]);
		//$("#img-Product").val(data["Imagen"]);
		$("#img-Product").attr("src","imgproducts/"+data["Imagen"]);//add
		$("#telefono").val(data["Telefono"]);
		$("#direccion").val(data["Direccion"]);
		$("#comments").val(data["Comentarios"]);
	});
	$("#tablePedidos tbody").on("click", ".delete", function () {
		let idPed = tablePed.row($(this).parents("tr")).data()["IdPedido"];
		Swal.fire({
			icon: "question",
			title: "¿Está seguro que desea eliminar este pedido?",
			confirmButtonText: "Sí",
			showCancelButton: true,
			cancelButtonText: "No",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "../../index.php?controller=pedido&action=eliminarPedido",
					data: {
						idPed: idPed,
					},
					success: function (response) {
						let json = JSON.parse(response);
						Swal.fire({
							icon: json.icon,
							title: json.msg,
							confirmButtonText: json.btnText,
						}).then(() => {
							if (json.icon == "info") {
								$("#tablePedidos").DataTable().ajax.reload(null, false);
							}
						});
					},
				});
			}
		});
	});
});
const form = document.querySelector(".form-container");
const cancelButton = document.querySelector(".btn-cancelar");

// Desplegar Form
function ShowForm() {
	form.classList.add("is-active");
}
// Ocultar Form
function HideForm() {
	form.classList.remove("is-active");
}
$(".close-button").click(() => {
	HideForm();
});
$(".btn-confirmar").click(() => {
	let idPed = $("#idPed").val();
	$.ajax({
		type: "POST",
		url: "../../index.php?controller=venta&action=confirmarVenta",
		data: {
			idPed: idPed,
		},
		success: function (response) {
			let json = JSON.parse(response);
			Swal.fire({
				icon: json.icon,
				title: json.msg,
				confirmButtonText: json.btnText,
			}).then(() => {
				if (json.icon == "success") {
					HideForm();
					$("#tablePedidos").DataTable().ajax.reload(null, false);
				}
			});
		},
	});
});
