let dep = $("#departamento"),
	prov = $("#provincia"),
	dist = $("#distrito");
let category = $("#categoria");
category.load("../../index.php?controller=empresa&action=listShowCategory&phpcategoria=" +$("#phpcategoria").val());
function updateSelects() {
	if ($(this).val() == 0) {
		prov.html('<option value="0">Seleccione una provincia...</option>');
		dist.html('<option value="0">Seleccione un distrito...</option>');
		prov.attr("disabled", true);
		dist.attr("disabled", true);
	} else {
		prov.removeAttr("disabled");
		dist.removeAttr("disabled");
		prov.load(
			"../../index.php?controller=empresa&action=listarProvincias&idDep=" +
				$(this).val() +
				"&phpProv=" +
				$("#phpProvincia").val(),
			loadDistritos
		);
	}
}
function loadDistritos() {
	dist.load(
		"../../index.php?controller=empresa&action=listarDistritos&idProv=" +
			$(this).val() +
			"&phpDist=" +
			$("#phpDistrito").val()
	);
}

dep.load(
	"../../index.php?controller=empresa&action=listarDepartamentos&phpDep=" +
		$("#phpDepartamento").val(),
	updateSelects
);
dep.change(updateSelects);
prov.change(loadDistritos);

//here add code for update in controller :::::::::::::::: 

function CheckDatos() {
	const url = "../../index.php?controller=empresa&action=actualizarDatos";
		
		var fdata = new FormData();

        let ruc = $('#ruc').val();
		let numRucEmp = $("#numruc").val();
		let nameBusiness = $("#nameBusiness").val();

        let emailPers = $('#emailEmp').val();
		let email = $("#emailEmp").val();
		

        let clave = $('#clave').val();
		let categoryemp = $("#categoria").val();


		let descripcion = $('#descripcion').val();
        let distrito = $('#distrito').val();
        let departamento = $('#departamento').val();
		let telefono = $('#telefono').val();
		let direccion = $('#direccion').val();

		let whatsapp = $('#whatsapp').val();
		let facebook = $('#facebook').val();
		let instagram = $('#instagram').val();
		let nameimage = $('#nameimage').val();


        let file = $('#file')[0].files[0];

        fdata.append('ruc', ruc);
		fdata.append('numRucEmp', numRucEmp);
		fdata.append('nameBusiness', nameBusiness);

        fdata.append('emailPers', emailPers);

		fdata.append('email', email);

        fdata.append('clave', clave);
		fdata.append('categoryemp',categoryemp);

		fdata.append('descripcion', descripcion);
        fdata.append('distrito', distrito);
        fdata.append('departamento', departamento);
		fdata.append('telefono', telefono);
		fdata.append('direccion', direccion);

		fdata.append('whatsapp', whatsapp);
		fdata.append('facebook', facebook);
		fdata.append('instagram', instagram);
		fdata.append('nameimage', nameimage);


        fdata.append('file', file);

	$.ajax({
		data: fdata,
		url: url,
		type: "POST",
		async: false,
		processData: false,
		contentType: false,
		success: function (response) {
			//console.log(response);
			let msg,
				icon,
				json = JSON.parse(response);
			result = json.bool;
			switch (json.msg) {
				case "datosIncorrectos":
					msg = "Datos incorrectos o incompletos";
					icon = "error";
					break;
				case "problemaSQL":
					msg = "Hubo un problema en el registro";
					icon = "error";
					break;
				default:
					msg = "Información de empresa actualizada";
					icon = "success";
					result = true;
					break;
			}
			Swal.fire({
				icon: icon,
				title: msg,
				confirmButtonText: icon == "error" ? "Volver a intentar" : "Continuar",
			});
		},
	});
	return false;
}
$("#formDatos").submit(CheckDatos);
