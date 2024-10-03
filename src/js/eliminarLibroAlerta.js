document.addEventListener('DOMContentLoaded', function() {
    const botonesEliminar = document.querySelectorAll('.eliminarBtn');
    if(botonesEliminar){
        botonesEliminar.forEach(function(boton) {
            boton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevenir la acción por defecto del botón
    
                if (confirm("¿Estás seguro de que deseas eliminar el libro?")) {
                    // Si el usuario confirma, enviar el formulario correspondiente
                    var form = boton.closest('form');
                    form.submit();
                } else {
                    // Si el usuario cancela, no hacer nada o realizar alguna otra acción
                    console.log("El usuario canceló la eliminación del libro.");
                }
            });
        });
    }
});
