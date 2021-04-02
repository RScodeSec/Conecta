/*$("#mytest").on('click', function(){
    let ruc = $('#rucSuperior').val();
    alert(ruc);
    
})*/
document.addEventListener('DOMContentLoaded',()=>{
    listar()
    
  })

const listar= async()=>{
    await fetch('../../index.php?controller=producto&action=getBestSeller&ruc='+$("#rucSuperior").val())
    .then(response => response.json())
    .then(data=>{
        let template = ''
        let valor = 0
        data.forEach(e=> {
            valor++
            template+=`
            <tr>
                <th class="columna-id" scope="row">${valor}</th>
                <td class="columna-imagen"><img class="" src="imgproducts/${e.Imagen}" alt=""></td>
                <td class="columna-descripcion">
                  <div class="d-flex justify-content-between">
                    <p class="">${e.NomProducto}</p>
                    <p>S/.${e.Precio}</p>
                    </div>
                    <p style="text-transform: lowercase;">${e.Descripcion}</p>
                </td>
                <td class="columna-precio">Vendido: ${e.MAS_Vendidos}</td>
              </tr>
            `
        });
        $('#body').html(template)
    })
}

// $(function () {
// 	let tableProd = $("#ProductBestSeller").DataTable({
//         "paging":   false,
//         "info":     false,
//         "searching": false,
// 		ajax: {
// 			url:
// 				"../../index.php?controller=producto&action=getBestSeller&ruc=" +
// 				$("#rucSuperior").val(),
               
// 			dataSrc: "",
// 		},
// 		columns: [
//             { data: null },
// 			{ data: "Imagen" },
// 			//{ data: "NomProducto" },
// 			//{ data: "Descripcion" },
//             { data: null,
//                 render: function(data, type, row, meta) {
//                 return row.NomProducto + ' <br>(' + row.Descripcion + ')'
//             }},
// 			{ data: "Precio" },
//             { data: "MAS_Vendidos" },
            
// 		],
// 		columnDefs: [
// 			{
//                 "targets": 1,
//                 "data": 'Imagen',
//                 "render": function (data, type, row, meta) {
//                     return '<img src="imgproducts/'+ data + '" alt="' + data + '"height="80" width="80"/>';
//                 }
//             },
// 		],
//         initComplete: function() {
//             $('.thead').hide();
//         },
// 	});
//     tableProd.on( 'order.dt search.dt', function () {
//         tableProd.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
//             cell.innerHTML = i+1;
//         } );
//     } ).draw();   
    
// });