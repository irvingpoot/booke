function mostrarModal(mensaje) {
    const modal = document.getElementById('modalAlerta');
    const modalMessage = document.getElementById('modal-message');

    modalMessage.textContent = mensaje;
    modal.style.display = 'block';

    document.getElementsByClassName('close')[0].addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
}

// Función para validar campo obligatorio
function validarCampoObligatorio(valor, mensaje) {
    if (valor.trim() === '') {
        mostrarModal(mensaje);
        return false;
    }
    return true;
}

// Función para validar número entero
function validarNumeroEntero(valor, mensaje) {
    if (!(/^\d+$/.test(valor))) {
        mostrarModal(mensaje);
        return false;
    }
    return true;
}

function validarNumeroDeDiezDigitos(valor, mensaje) {
    if (!/^\d{10}$/.test(valor)) {
        mostrarModal(mensaje);
        return false;
    }
    return true;
}

// Función para validar que un número no sea negativo
function validarNumeroNoNegativo(valor, mensaje) {
    if (parseInt(valor) < 0) {
        mostrarModal(mensaje);
        return false;
    }
    return true;
}

function validarCorreoElectronico(correo, mensaje) {
    const regexCorreo = /\S+@\S+\.\S+/;
    if (!regexCorreo.test(correo)) {
        mostrarModal(mensaje);
        return false;
    }
    return true;
}

function validarNoNumeros(valor, mensaje) {
    const contieneNumeros = /\d/.test(valor);
    if (contieneNumeros) {
        mostrarModal(mensaje);
        return false;
    }
    return true;
}




function validarFormularioCrear() {
    // Obtener valores de los campos
    const isbn = document.getElementsByName('bookIsbn')[0].value;
    const titulo = document.getElementsByName('bookTitle')[0].value;
    const autor = document.getElementsByName('bookAuthor')[0].value;
    const edicion = document.getElementsByName('bookEdition')[0].value;
    const categoria = document.getElementsByName('bookCategory')[0].value;
    const precio = document.getElementsByName('bookPrice')[0].value;
    const stock = document.getElementsByName('bookStock')[0].value;
    const imagen = document.getElementsByName('bookImage')[0].value;

    if (
        !validarCampoObligatorio(isbn, 'Por favor, ingresa el ISBN.') ||
        !validarCampoObligatorio(titulo, 'Por favor, ingresa un título.') ||
        !validarCampoObligatorio(autor, 'Por favor, ingresa el autor.') ||
        !validarCampoObligatorio(edicion, 'Por favor, ingresa la edición.') ||
        !validarCampoObligatorio(categoria, 'Por favor, ingresa la categoría.') ||
        !validarCampoObligatorio(precio, 'Por favor, ingresa el precio.') ||
        !validarNumeroNoNegativo(precio, 'El precio debe ser un número positivo.') ||
        !validarCampoObligatorio(stock, 'Por favor, ingresa el stock.') ||
        !validarNumeroEntero(stock, 'El stock debe ser un número entero.') ||
        !validarNumeroNoNegativo(stock, 'El stock debe ser un número positivo.') ||
        !validarCampoObligatorio(imagen, 'Por favor, selecciona una imagen.')
    ) {
        return false;
    }
    return true;
}

function validarFormularioEditar() {
    // Obtener valores de los campos
    const isbn = document.getElementsByName('bookIsbn')[0].value;
    const titulo = document.getElementsByName('bookTitle')[0].value;
    const autor = document.getElementsByName('bookAuthor')[0].value;
    const edicion = document.getElementsByName('bookEdition')[0].value;
    const categoria = document.getElementsByName('bookCategory')[0].value;
    const precio = document.getElementsByName('bookPrice')[0].value;
    const stock = document.getElementsByName('bookStock')[0].value;

    if (
        !validarCampoObligatorio(isbn, 'Por favor, ingresa el ISBN.') ||
        !validarCampoObligatorio(titulo, 'Por favor, ingresa un título.') ||
        !validarCampoObligatorio(autor, 'Por favor, ingresa el autor.') ||
        !validarCampoObligatorio(edicion, 'Por favor, ingresa la edición.') ||
        !validarCampoObligatorio(categoria, 'Por favor, ingresa la categoría.') ||
        !validarCampoObligatorio(precio, 'Por favor, ingresa el precio.') ||
        !validarNumeroNoNegativo(precio, 'El precio debe ser un número positivo.') ||
        !validarCampoObligatorio(stock, 'Por favor, ingresa el stock.') ||
        !validarNumeroEntero(stock, 'El stock debe ser un número entero.') ||
        !validarNumeroNoNegativo(stock, 'El stock debe ser un número positivo.')
    ) {
        return false;
    }
    return true;
}

function validarFormularioContacto() {
    // Obtener valores de los campos
    const cnombre = document.getElementsByName('texto-nombre')[0].value;
    const capellido = document.getElementsByName('texto-apellido')[0].value;
    const ccorreo = document.getElementsByName('texto-correo')[0].value;
    const cnumero = document.getElementsByName('numero')[0].value;
    const cmensaje = document.getElementsByName('mensaje')[0].value;

    if (
        !validarCampoObligatorio(cnombre, 'Por favor, ingresa tu nombre.') ||
        !validarNoNumeros(cnombre, 'Por favor, ingresa un nombre válido.') ||
        !validarCampoObligatorio(capellido, 'Por favor, ingresa tu apellido.') ||
        !validarNoNumeros(capellido, 'Por favor, ingresa un apellido válido.') ||
        !validarCampoObligatorio(ccorreo, 'Por favor, ingresa tu correo.') ||
        !validarCorreoElectronico(ccorreo, 'Por favor, ingresa un correo válido.') ||
        !validarCampoObligatorio(cnumero, 'Por favor, ingresa tu número de teléfono.') ||
        !validarNumeroDeDiezDigitos(cnumero, 'Por favor, un número de teléfono de 10 dígitos.') ||
        !validarCampoObligatorio(cmensaje, 'Por favor, ingresa un tu mensaje.')
    ) {
        return false;
    }
    return true;
}

const formularioCrear = document.querySelector('#libro-crear-form');
if (formularioCrear) {
    formularioCrear.addEventListener('submit', function (event) {

        event.preventDefault(); 
    
        if (confirm("¿Estás seguro de que deseas crear el libro?")) {
            if (!validarFormularioCrear()) {
                event.preventDefault();
            }else{
                formularioCrear.submit();
            }
        } else {
            // Si el usuario cancela, no hacer nada o realizar alguna otra acción
            console.log("El usuario canceló la creación del libro.");
        }
    });
}

const formularioEditar = document.querySelector('#libro-editar-form');
if (formularioEditar) {
    formularioEditar.addEventListener('submit', function (event) {

        event.preventDefault(); 
    
        if (confirm("¿Estás seguro de que deseas editar el libro?")) {
            if (!validarFormularioEditar()) {
                event.preventDefault();
            }else{
                formularioEditar.submit();
            }
        } else {
            // Si el usuario cancela, no hacer nada o realizar alguna otra acción
            console.log("El usuario canceló la edición del libro.");
        }
    });
}

const formularioContacto = document.querySelector('.formulario-contacto');
if (formularioContacto) {
    formularioContacto.addEventListener('submit', function (event) {
        event.preventDefault(); 
    
        if (confirm("¿Estás seguro de que deseas enviar la información?")) {
            if (!validarFormularioContacto()) {
                event.preventDefault();
            }else{
                formularioContacto.submit();
            }
        } else {
            // Si el usuario cancela, no hacer nada o realizar alguna otra acción
            console.log("El usuario canceló el envio de la información");
        }
    });
}