$(function () {
    $('#tableVentas').DataTable({
        language: {
            url: 'js/spanish.json',
        },
        lengthChange: false,
        scrollX: true,
        dom: '<f>t<ip>',
        pageLength: 5,
        ajax: {
            url: '../../index.php?controller=venta&action=showVentasByRuc&ruc=' +
            $('#rucSuperior').val(),
            dataSrc: ""
        },
        columns: [
            {data:"NombreCompleto"},
            {data:"NomProducto"},
            {data:"Cantidad"},
            {data:"Precio"},
            {data:"Monto"},
            {data:"Fecha"}
        ],
    })  
});