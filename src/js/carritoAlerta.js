document.addEventListener('DOMContentLoaded', function() {
    const formularioCarrito = document.getElementById('formulario-carrito');

    if(formularioCarrito){
        formularioCarrito.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío automático del formulario
    
            if (confirm("¿Estás seguro de que deseas realizar la siguiente compra?")) {
                // Si el usuario confirma, enviar el formulario
                formularioCarrito.submit();
            } else {
                // Si el usuario cancela, no hacer nada o realizar alguna otra acción
                console.log("El usuario canceló la compra.");
            }
        });
    }
});
