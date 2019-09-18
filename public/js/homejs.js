
var images = [ 
    '../image/chica1.png',
    '../image/chica2.png',
    '../image/chica3.png'
];
var cuenta = 0; // dice el número de cuenta de cambios de imagen

function cambiarImagen(){
  var imagen_actual = cuenta % images.length;
  document.querySelector('main').style.backgroundImage="url('"+images[imagen_actual]+"')";
  var new_image =images[imagen_actual];
  document.querySelector('main').setAttribute('src',new_image  );
  cuenta++; 
}
window.setInterval(cambiarImagen,3000);
$(document).ready(function(){
$("#slide_nav_button").click(function(){
$('#slide_menu').animate({width:'toggle'},300);
});
});
/*cambio color logo*/
/*
var imagen = document.getElementById("logo");
var new_image = 
console.log (imagen);
imagen.addEventListener("mouseover");

window.addEventListener('load', iniciar);

function iniciar() {
  var imagen = document.getElementById('logo');
  imagen.addEventListener('mouseover', changeimage);
}

function changeimage() {
  var imagen = document.getElementById('logo').setAttribute('src',"/image/logohome_hover.png");
}

window.addEventListener('load', mouseout);

function mouseout() {
  var imagen = document.getElementById('logo');
  imagen.addEventListener('mouseout', returnimage);
}

function returnimage() {
  var imagen = document.getElementById('logo').setAttribute('src',"/image/logohome.png");
}
*/