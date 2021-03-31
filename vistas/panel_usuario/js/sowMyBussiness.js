function removeCookie(cookieName)
{
    cookieValue = "";
    cookieLifetime = -1;
    var date = new Date();
    date.setTime(date.getTime()+(cookieLifetime*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
    document.cookie = cookieName+"="+JSON.stringify(cookieValue)+expires+"; path=/";
}

$("#mybusiness").on('click', function(){
    //alert("hello");
    
    let url = "../../index.php?controller=empresa&action=showEmpresa&ruc="+$("#rucSuperior").val();
    //removeCookie("PHPSESSID");
    $.ajax({
        type: "GET",
        url: url,
        success: function () {
            location.href = "../empresa.php";

        },
        
    });
    
    
      
});