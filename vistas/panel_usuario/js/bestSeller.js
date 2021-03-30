/*$("#mytest").on('click', function(){
    let ruc = $('#rucSuperior').val();
    alert(ruc);
    
})*/
$(function () {
	let tableProd = $("#ProductBestSeller").DataTable({
        "paging":   false,
        "info":     false,
        "searching": false,
		ajax: {
			url:
				"../../index.php?controller=producto&action=getBestSeller&ruc=" +
				$("#rucSuperior").val(),
			dataSrc: "",
		},
		columns: [
            { data: null },
			{ data: "Imagen" },
			{ data: "NomProducto" },
			{ data: "Descripcion" },
			{ data: "Precio" },
            { data: "MAS_Vendidos" },
            
		],
		columnDefs: [
			{
                "targets": 1,
                "data": 'Imagen',
                "render": function (data, type, row, meta) {
                    return '<img src="imgproducts/'+ data + '" alt="' + data + '"height="80" width="80"/>';
                }
            },
		],
	});
    tableProd.on( 'order.dt search.dt', function () {
        tableProd.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();   
    
});