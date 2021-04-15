

// var sobremi = document.querySelector(".adminCorreo");
// var afectado = document.querySelector(".alerta");
// sobremi.addEventListener('onmouseover', () => {
//   afectado.className = "afectado2";
// })
// sobremi.addEventListener('onmouseout', () => {
//   afectado.className = "afectado1";
// })

document.querySelector(".adminCorreo").addEventListener("mouseover", mouseOver);
document.querySelector(".adminCorreo").addEventListener("mouseout", mouseOut);

function mouseOver() {
    document.querySelector(".alerta").style.display = "flex";
   
  }
  
  function mouseOut() {
    document.querySelector(".alerta").style.display = "none";
  }
// 
document.querySelector(".adminCorreo2").addEventListener("mouseover", mouseOver2);
document.querySelector(".adminCorreo2").addEventListener("mouseout", mouseOut2);

function mouseOver2() {
    document.querySelector(".alerta2").style.display = "flex";
   
  }
  
  function mouseOut2() {
    document.querySelector(".alerta2").style.display = "none";
  }
// 

document.querySelector(".adminCorreo3").addEventListener("mouseover", mouseOver3);
document.querySelector(".adminCorreo3").addEventListener("mouseout", mouseOut3);

function mouseOver3() {
    document.querySelector(".alerta3").style.display = "flex";
   
  }
  
  function mouseOut3() {
    document.querySelector(".alerta3").style.display = "none";
  }
// 

document.querySelector(".adminCorreo4").addEventListener("mouseover", mouseOver4);
document.querySelector(".adminCorreo4").addEventListener("mouseout", mouseOut4);

function mouseOver4() {
    document.querySelector(".alerta4").style.display = "flex";
   
  }
  
  function mouseOut4() {
    document.querySelector(".alerta4").style.display = "none";
  }
//   
document.querySelector(".adminCorreo5").addEventListener("mouseover", mouseOver5);
document.querySelector(".adminCorreo5").addEventListener("mouseout", mouseOut5);

function mouseOver5() {
    document.querySelector(".alerta5").style.display = "flex";
   
  }
  
  function mouseOut5() {
    document.querySelector(".alerta5").style.display = "none";
  }