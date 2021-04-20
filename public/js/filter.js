$("#filterOpt").on('change',function(event){
    event.preventDefault();
    ruc = $("#t-principal h3").text();
    let valor = $(this).val();
    //let link = 'productosByRuc&ruc=' + ruc +'&opt='+valor;
    //alert(link);
        let urlProds =
        "../index.php?controller=producto&action=productosByRucFilters&ruc=" + ruc +'&opt='+valor;
    $("#products-container").load(urlProds, { type: "article" }, function () {
        const productsButton = document.querySelectorAll(
            '#products-container .btn-product'
          );
    
          //console.log(productsButton);
          
          for (let i = 0; i < productsButton.length; i++) {
            // console.log(
            //   productsButton[i]
            //     .closest('.button-container')
            //     .querySelector('input[type="text"')
            // );
            productsButton[i].addEventListener('click', (e) => {
                console.log(productsButton);
              /*console.log(
                e.target
                  .closest('.button-container')
                  .querySelector('input[type="text"'),
                e.target.closest('.button-container').querySelector('input[type="text"')
                  .value
              );*/
                                
    
                var idmyprod = e.target.closest('.button-container').querySelector('input[type="text"').value
                $.ajax({				
                    url: "../index.php?controller=producto&action=productosByid&idmyprod=" + idmyprod,
                    
                    success: function (data){
                        var mydatos =JSON.parse(data);
                        ShowProduct()
                        console.log(mydatos)
                        var IdProducto = mydatos[0]['IdProducto'];
    
                        var nombre = mydatos[0]['NomProducto'];
                        var descripcion = mydatos[0]['Descripcion'];
                        var precio = mydatos[0]['Precio'];
                        var miimagen = mydatos[0]['Imagen'];
                        var miimagen2 = mydatos[0]['Imagen1'];
                        var miimagen3 = mydatos[0]['Imagen2'];
    
                        $(".minombre").prepend(nombre);
                        $(".midescripcion").prepend(descripcion);
                        $(".price-container").prepend('<strong>Precio S/. </strong>'+ precio);
                        $('.mimagen1').attr("src", '../vistas/panel_usuario/imgproducts/'+miimagen);
                        $('.mimagen2').attr("src", '../vistas/panel_usuario/imgproducts/'+miimagen2);
                        $('.mimagen3').attr("src", '../vistas/panel_usuario/imgproducts/'+miimagen3);
                        $('#IdProducto').val(IdProducto);
                                        
    
                    }
                    
    
                });
                          
    
             
            });
        }
        
    });
    

});
/*$('#formVenta').submit(function(e){
	
	//e.preventDefault();
	let idProduct = $('#IdProducto').val();
	let nombres = $('#nombres').val();
	let apellido = $('#apellido').val();
	let cantidad  = $('#Cantidad').val();
	let telefono = $('#teléfono').val();
	let direccion  = $('#dirección').val();
	let comentario = $('#comentarios').val();


	var data = {
		idProduct: idProduct,
		nombres: nombres,
		apellido: apellido,
		cantidad: cantidad,
		telefono: telefono,
		direccion: direccion,
		comentario: comentario
	}
	console.log(data);
	$.ajax({
		url: "../index.php?controller=pedido&action=realizarPedido",
		type: "post",
		data: data,
		success: function(response){
			console.log(response);
			let json = JSON.parse(response);
			Swal.fire({
				icon: json.icon,
				title: json.msg,
				confirmButtonText: json.btnText,
			}).then(() => {
				if (json.icon == "success") {
					$(".minombre").empty();
					$(".midescripcion").empty();
					$(".price-container").empty();
					$('.mimagen1').empty();
					$('#IdProducto').empty();
					$('.mimagen2').empty();
    				$('.mimagen3').empty();
					HideProduct();

					$("#formVenta").trigger('reset');
				}
			});

		},
	});
	return false;

});*/