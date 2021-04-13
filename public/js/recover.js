$("#solicitar").submit(function(event){
    event.preventDefault();
    //alert("hello estoy funcionando");
    let email = $("#email").val();
    var data = {
        email:email
    }
    $.ajax({
        url: "../index.php?controller=empresa&action=verifyCredential",
        type: "POST",
        data: data,
        success: function(response){
            let result = JSON.parse(response);
            Swal.fire({
				icon: result.icon,
                title: result.title,
                text: result.text
			}).then(() => {
                $("#solicitar").trigger('solicitar');
				
			});            
        },
    });

});

$("#recoverPassword").submit(function(event){
    event.preventDefault();
    //alert($("#urltoken").val());
    let urltoken = $("#urltoken").val();
    let newpassword = $("#newpassword").val();
    let idRuc = $("#idRuc").val();
    var data = {
        urltoken: urltoken,
        newpassword: newpassword,
        idRuc: idRuc
    }
    $.ajax({
        url: "../index.php?controller=empresa&action=resetNewCredential",
        type: "POST",
        data: data,
        success: function(response){
            let result = JSON.parse(response);
            Swal.fire({
				icon: result.icon,
                title: result.title,
                text: result.text
			}).then(() => {
                window.location.href = "index.php";
				
			});            
            
        },
    });    

});
