$(function () {
	let tableProd = $("#productosTabla").DataTable({
		language: {
			url: "js/spanish.json",
		},
		scrollX: true,
		dom: '<"header__main"<"search"f>>t<"header__main"ip>',
		lengthChange: false,
		pageLength: 5,
		ajax: {
			url:
				"../../index.php?controller=producto&action=productosByRuc&ruc=" +
				$("#rucSuperior").val(),
			dataSrc: "",
		},
		columns: [
			{ data: "NomProducto" },
			{ data: "Stock" },
			{ data: "Precio" },
			{ data: null },
			{ data: null },
		],
		columnDefs: [
			{
				defaultContent:
					'<button class="eliminar_b"><i class="fas fa-trash-alt eliminar"></i></button>',
				targets: -1,
			},
			{
				data: null,
				targets: -2,
				defaultContent:
					'<button class="editar_b"><i class="fas fa-edit editar"></i></button>',
			},
		],
		initComplete: function () {
			$("#productosTabla_wrapper .header__main:first-child").append(
				'<button class="producto__boton" id="nuevoProducto"> <i class="fas fa-list-alt"></i>&#160;Nuevo Producto</button>'
			);
			$("#nuevoProducto").click(() => {
				actionForm("abrir", "nuevo");
			});
		},
	});
	$("#cantidad").keydown(validateNumber);
	$("#precio").keydown((e) => {
		return (e.keyCode || e.which) == 190 || validateNumber(e);
	});
	$("#productosTabla tbody").on("click", ".editar_b", function () {
		actionForm("abrir", "editar");
		let data = tableProd.row($(this).parents("tr")).data();
		$("#idProd").val(data["IdProducto"]);
		$("#nombre").val(data["NomProducto"]);
		$("#cantidad").val(data["Stock"]);
		$("#medida").val(data["Medida"]);
		$("#precio").val(data["Precio"]);
		$("#descripcion").val(data["Descripcion"]);
		/*here add for update products*/
		//$("#nameimage").val(data["Imagen"]);
		//var mostarimage = $("#img1").attr("src","image2.jpg");
		//$("#nameimage").val(data["Imagen"]);s
		$("#nameimage").val(data["Imagen"]);
		$("#nameimage1").val(data["Imagen1"]);
		$("#nameimage2").val(data["Imagen2"]);
		
	});
	/* here add var imagen for elimante image*/
	$("#productosTabla tbody").on("click", ".eliminar_b", function () {
		let idProd = tableProd.row($(this).parents("tr")).data()["IdProducto"];
		let Imagen = tableProd.row($(this).parents("tr")).data()["Imagen"];
		let Imagen1 = tableProd.row($(this).parents("tr")).data()["Imagen1"];
		let Imagen2 = tableProd.row($(this).parents("tr")).data()["Imagen2"];
		Swal.fire({
			icon: "question",
			title: "¿Está seguro que desea eliminar este producto?",
			confirmButtonText: "Sí",
			showCancelButton: true,
			cancelButtonText: "No",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "../../index.php?controller=producto&action=eliminarProducto",
					data: {
						idProd: idProd,
						Imagen: Imagen,
						Imagen1: Imagen1,
						Imagen2: Imagen2,

					},
					success: function (response) {
						let json = JSON.parse(response);
						Swal.fire({
							icon: json.icon,
							title: json.msg,
							confirmButtonText: json.btnText,
						}).then(() => {
							if (json.icon == "info") {
								$("#productosTabla").DataTable().ajax.reload(null, false);
							}
						});
					},
				});
			}
		});
	});
});

$("#cancelar").click(() => {
	actionForm("cerrar");
});

function actionForm(action, type) {
	let bloque = document.getElementById("bloque");
	let h1 = bloque.getElementsByTagName("h1")[0];
	if (action == "abrir") {
		bloque.classList.add("display__nuevo");
	} else {
		bloque.classList.remove("display__nuevo");
		$("#formProducto")[0].reset();
	}
	if (type == "editar") {
		$(h1).css("background-color", "orange");
		h1.textContent = "Editar Producto";
	} else {
		$(h1).css("background-color", "rgb(0, 158, 251)");
		h1.textContent = "Nuevo Producto";
	}
}

/*here new product*/
$("#formProducto").submit(() => {
	const url =
			"../../index.php?controller=producto&action=" +
			($("#bloque h1").text() == "Nuevo Producto" ? "agregar" : "editar") +
			"Producto";

	

		var fdata = new FormData();
        let ruc = $('#rucSuperior').val();
        let id = $('#idProd').val();
        let nombre = $('#nombre').val();
		let cantidad = $('#cantidad').val();
        let medida = $('#medida').val();
        let precio = $('#precio').val();
		let descripcion = $('#descripcion').val();
		let nameimage = $('#nameimage').val();

		let nameimage1 = $('#nameimage1').val();
		let nameimage2 = $('#nameimage2').val();

        let file = $('#file')[0].files[0];
		//add code for two and three image
		let file1 = $('#file1')[0].files[0];
		let file2 = $('#file2')[0].files[0];

        fdata.append('ruc', ruc);
        fdata.append('id', id);
        fdata.append('nombre', nombre);
		fdata.append('cantidad', cantidad);
        fdata.append('medida', medida);
        fdata.append('precio', precio);
		fdata.append('descripcion', descripcion);
		fdata.append('nameimage', nameimage);
		fdata.append('nameimage1', nameimage1);
		fdata.append('nameimage2', nameimage2);


        fdata.append('file', file);
		fdata.append('file1', file1);
		fdata.append('file2', file2);

	

	$.ajax({
		type: "POST",
		url: url,
		data: fdata,
		processData: false,
		contentType: false,
		success: function (response) {
			let json = JSON.parse(response);
			Swal.fire({
				icon: json.icon,
				title: json.msg,
				confirmButtonText: json.btnText,
			}).then(() => {
				if (json.icon == "success") {
					actionForm("cerrar");
					$("#productosTabla").DataTable().ajax.reload(null, false);
				}
			});
		},
	});
	return false;
});


