jQuery('document').ready(function ($) {
    var menuBtn = $('.menu-icon'),
            menu = $('.navigation ul');

    menuBtn.click(function () {

        if (menu.hasClass('show')) {
            menu.removeClass('show');
        } else {
            menu.addClass('show');
        }
    });
});

//post

document.addEventListener("DOMContentLoaded", function (e) {
    const parrafos = document.querySelectorAll(".descripcion");
    let alturas = [];
    let alturaMaxima = 0;
    const aplicarAlturas = (function aplicarAlturas() {
        parrafos.forEach(parrafo => {
            if (alturaMaxima === 0) {
                alturas.push(parrafo.clientHeight);
            }else{
                parrafo.style.height + "px";
            }
        });
        return aplicarAlturas;
    })();
    alturaMaxima = Math.max.apply(Math, alturas);
    aplicarAlturas();
});

