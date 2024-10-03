// Función para ocultar todos los elementos con la clase "invalid-feedback" después de 5 segundos
(() => {
    setTimeout(function () {
        var elementosInvalidos = document.querySelectorAll(".invalid-feedback");
    
        elementosInvalidos.forEach(function(elemento) {
            elemento.style.display = "none"; // Oculta cada elemento con la clase "invalid-feedback"
        });
    }, 7000);
})();
