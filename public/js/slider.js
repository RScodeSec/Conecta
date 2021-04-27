const slider = document.querySelector("#slider");
let sliderSeccion = document.querySelectorAll(".slider__section");
let sliderSeccionLast = sliderSeccion[sliderSeccion.length -1];
const btnLeft = document.querySelector("#btn--left");
const btnRight = document.querySelector("#btn--right");

slider.insertAdjacentElement('afterbegin',sliderSeccionLast);
function next(){
    let sliderSeccionFirst = document.querySelectorAll(".slider__section")[0];
    slider.style.marginLeft = "-200%";
    slider.style.transition = "all 0.5s";
    setTimeout(()=>{
        slider.style.transition = "none";
        slider.insertAdjacentElement('beforeend',sliderSeccionFirst);
        slider.style.marginLeft = "-100%";
    },500);
}
function prev(){
    let sliderSeccion = document.querySelectorAll(".slider__section");
    let sliderSeccionLast = sliderSeccion[sliderSeccion.length -1];
    slider.style.marginLeft = "0";
    slider.style.transition = "all 0.5s";
    setTimeout(()=>{
        slider.style.transition = "none";
        slider.insertAdjacentElement('afterbegin',sliderSeccionLast);
        slider.style.marginLeft = "-100%";
    },500);
}
btnRight.addEventListener('click',next);
btnLeft.addEventListener('click',prev);
setInterval(() => {
    next();
}, 5000);
