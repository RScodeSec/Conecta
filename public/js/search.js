$(document).ready(function(){
    $("#searchproduct").keyup(function(){
        let inputsearch = $(this).val();
        console.log(inputsearch);
        if(inputsearch!="" && inputsearch.length>=2 ){ 
            console.log(inputsearch);
            

            let urlProds =
                "../index.php?controller=producto&action=searchLiveProduct&inputsearch=" + inputsearch;
            $("#products-container-search").load(urlProds, { type: "article" }, function () {
                //console.log(article);

            });
            
           //window.location = 'search.php';

        }
        

    });

});
