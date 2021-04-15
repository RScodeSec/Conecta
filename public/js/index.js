let urlFeauturedProduct = "../index.php?controller=producto&action=featuredProduct";
$("#destacado").load(urlFeauturedProduct, { type: "article" }, function(){

	const productsButton = document.querySelectorAll(
		'#destacado .btn-product'
	  );
	
	  for (let i = 0; i < productsButton.length; i++) {
		productsButton[i].addEventListener('click', (e) => {
			
			var idmyprod = e.target.closest('.ver').querySelector('input[type="text"').value
			let url = "../index.php?controller=empresa&action=showEmpresa&ruc="+idmyprod;
			//alert(idmyprod);
			$.ajax({
				type: "GET",
				url: url,
				success: function () {
					location.href = "empresa.php";
				},
			});
	
	
		});
	
	  }
	//here code

});