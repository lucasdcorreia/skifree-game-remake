var button = document.getElementById("botao");
var largura = document.getElementById("widthInput");
var sizes = document.getElementsByClassName("sizeInput");

botao.onclick = function(){
    bar1.style.width = largura.value + "px";
    bar1.style.height = sizes[0].value + "px";
    bar2.style.width = largura.value + "px";
    bar2.style.height = sizes[1].value + "px";
    bar3.style.width = largura.value + "px";
    bar3.style.height = sizes[2].value + "px";
    bar4.style.width = largura.value + "px";
    bar4.style.height = sizes[3].value + "px";
    bar5.style.width = largura.value + "px";
    bar5.style.height = sizes[4].value + "px";
}