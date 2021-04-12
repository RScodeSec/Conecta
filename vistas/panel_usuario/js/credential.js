$("#credential").submit(function (event){
    event.preventDefault();
    //console.log("hello");
    let oldpassword=$("#contraseñaAnterior").val();
    let newpassword=$("#ContraseñaNueva").val();
    let ruc = $('#rucSuperior').val();
    data = {
        ruc:ruc,
        oldpassword:oldpassword,
        newpassword:newpassword
    }
    //console.log(data); 
    $.ajax({
        url:"../../index.php?controller=empresa&action=updatePassword",
        type: "POST",
        data: data,
        success: function(response){
            //console.log(response);
            let result = JSON.parse(response);
            //console.log(result.text);
            Swal.fire({
				icon: result.icon,
                title: result.title,
                text: result.text
			}).then(() => {
                $("#credential").trigger('reset');
				
			});
                       
            
        },

    }); 
});