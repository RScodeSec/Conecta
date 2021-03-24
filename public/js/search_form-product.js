let inputsearch = $("#id").val();
console.log(inputsearch);
let urlProds =
                "../index.php?controller=producto&action=searchLiveProduct&inputsearch=" + inputsearch;
            $("#products-container-search").load(urlProds, { type: "article" }, function () {

});


const product = document.querySelector('.form-container-product');
const productButton = document.querySelector('.btn-see-shop');
const closeButtonProduct = document.querySelector('.close-button-product');

// Desplegar Product
function ShowProduct(){
    product.classList.add('is-activep')
}
//productButton.addEventListener('click', ShowProduct)

// Ocultar Product
function HideProduct(){
    product.classList.remove('is-activep')
}
closeButtonProduct.addEventListener('click', HideProduct)

//Variables movimiento de sliders
const sliderContainer = document.querySelector('.carousel_slide')
const previousButton = document.querySelector('.control-previous-slider');
const nextButton = document.querySelector('.control-next-slider');
var cont = 1;

function MoveNextSlide(){
    if(cont == 1){
        sliderContainer.classList.remove('frs-slide');
        sliderContainer.classList.add('snd-slide');
        cont = cont + 1;
    }
    else if(cont == 2){
        sliderContainer.classList.remove('snd-slide');
        sliderContainer.classList.add('trd-slide');
        cont = cont + 1;
    }
    else if(cont == 3){
        sliderContainer.classList.remove('trd-slide');
        sliderContainer.classList.add('frs-slide');
        cont = 1;
    }
}
nextButton.addEventListener('click', MoveNextSlide);

function MovePreviousSlide(){
    if(cont == 1){
        sliderContainer.classList.remove('frs-slide');
        sliderContainer.classList.add('trd-slide');
        cont = 3;
    }
    else if(cont == 2){
        sliderContainer.classList.remove('snd-slide');
        sliderContainer.classList.add('frs-slide');
        cont = cont - 1;
    }
    else if(cont == 3){
        sliderContainer.classList.remove('trd-slide');
        sliderContainer.classList.add('snd-slide');
        cont = cont - 1;
    }
}
previousButton.addEventListener('click', MovePreviousSlide);