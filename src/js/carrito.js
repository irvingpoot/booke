// Función para obtener el valor de una cookie
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

// Función para establecer el valor de una cookie
function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = `expires=${date.toUTCString()}`;
    document.cookie = `${name}=${value}; ${expires}; path=/`;
}

function addToCart(book) {
    const cart = getCookie('cart') ? JSON.parse(getCookie('cart')) : [];
    
    // Buscar si el libro ya está en el carrito
    const existingBook = cart.find(item => item.title === book.title);
    
    if (existingBook) {
        // Si el libro ya está en el carrito, incrementar la cantidad
        existingBook.cantidad += 1;
    } else {
        // Si el libro no está en el carrito, agregarlo con cantidad 1
        book.cantidad = 1;
        cart.push(book);
    }

    setCookie('cart', JSON.stringify(cart), 7);
}



// Lógica para mostrar los elementos del carrito en la página
function showCartItems() {
    const cartItems = getCookie('cart') ? JSON.parse(getCookie('cart')) : [];
    const carritoContenedor = document.querySelector('#articulos');
    const carritoVacio = document.getElementById('carrito-vacio');

    console.log('Número de elementos en el carrito:', cartItems.length);

    // Limpiar el contenido actual del carrito
    carritoContenedor.innerHTML = '';

    // Verificar si el carrito está vacío
    if (cartItems.length === 0) {
        carritoVacio.style.display = 'block';
        console.log('El carrito está vacío.');
        return;
    } else {
        carritoVacio.style.display = 'none';
    }

    // Iterar sobre los elementos del carrito y mostrarlos en la página
    cartItems.forEach((libro, index) => {
        const carritoArticulo = document.createElement('div');
        carritoArticulo.classList.add('carrito__articulo');

        carritoArticulo.innerHTML = `
            <input type="hidden" value="${libro.id}" name="bookID[]">
            <img src="build/imagenes/${libro.imagen}" alt="Portada" class="carrito__articulo-imagen">
            <p class="carrito__articulo-titulo">${libro.title}</p>

            <div class="cantidad__contenedor-incrementar-decrementar">
                <i class="fa-solid fa-minus cantidad__btncolor decrement" data-index="${index}"></i>
                <input id="cantidad-${index}" type="number" placeholder="1" value="${libro.cantidad}" min="1" class="cantidad__input" name="bookCant[]" readonly>
                <i class="fa-solid fa-plus cantidad__btncolor increment" data-index="${index}"></i>
            </div>
            
            <p class="carrito__articulo-precio">$${libro.price}</p>
            <button class="carrito__articulo-eliminar" data-index="${index}">Eliminar</button>
        `;

        carritoContenedor.appendChild(carritoArticulo);
    });

    // Actualizar los totales
    actualizarTotales(cartItems);
    console.log('Elementos del carrito mostrados correctamente.');
}


// Función para decrementar la cantidad de un libro por unidad
function decrementarCantidad(index) {
    const cartItems = getCookie('cart') ? JSON.parse(getCookie('cart')) : [];

    if (index >= 0 && index < cartItems.length) {
        // Decrementar la cantidad si es mayor que 1
        if (cartItems[index].cantidad > 1) {
            cartItems[index].cantidad--;
        }

        // Actualizar la cookie del carrito
        setCookie('cart', JSON.stringify(cartItems), 7);

        // Actualizar la vista del carrito
        showCartItems();
    }
}

// Función para incrementar la cantidad de un libro por unidad
function incrementarCantidad(index) {
    const cartItems = getCookie('cart') ? JSON.parse(getCookie('cart')) : [];

    if (index >= 0 && index < cartItems.length) {
        // Incrementar la cantidad
        cartItems[index].cantidad++;

        // Actualizar la cookie del carrito
        setCookie('cart', JSON.stringify(cartItems), 7);

        // Actualizar la vista del carrito
        showCartItems();
    }
}



// Manejar clic en el contenedor del carrito
document.addEventListener('DOMContentLoaded', function () {
    const carritoContenedor = document.querySelector('#articulos');
    if(carritoContenedor){
        carritoContenedor.addEventListener('click', function (event) {
            const index = event.target.dataset.index;
    
            if (event.target.classList.contains('decrement') && index !== undefined) {
                decrementarCantidad(parseInt(index));
            }
    
            if (event.target.classList.contains('increment') && index !== undefined) {
                incrementarCantidad(parseInt(index));
            }
        });
    }

    // ... (resto del código)
});


// Función para actualizar los totales en la página del carrito
function actualizarTotales(cartItems) {
    const cantidadElemento = document.getElementById('cantidad');
    const precioElemento = document.getElementById('precio');
    const precioIVAElemento = document.getElementById('precioIVA'); // Nuevo elemento para mostrar el precio con IVA

    // Calcular total de unidades y precio
    const totalUnidades = cartItems.reduce((total, libro) => total + libro.cantidad, 0);
    
    // Calcular total de precio considerando la cantidad de libros por unidad
    const totalPrecio = cartItems.reduce((total, libro) => total + (libro.cantidad * parseFloat(libro.price)), 0);

    // Calcular el precio con IVA (16%)
    const totalPrecioIVA = totalPrecio * 1.16;

    // Actualizar los elementos en la página
    cantidadElemento.textContent = totalUnidades;
    precioElemento.textContent = totalPrecio.toFixed(2);
    precioIVAElemento.textContent = totalPrecioIVA.toFixed(2); // Actualizar el precio con IVA
}

// Manejar clic en "Agregar al carrito" en la página del catálogo
document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.bookEnlace');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const libro = {
                title: button.parentElement.querySelector('.bookTitle').innerText,
                price: button.parentElement.querySelector('.bookPrice').innerText.replace('$', ''),
                imagen: button.parentElement.querySelector('.bookImage').getAttribute('src').replace('build/imagenes/', ''),
                id: button.parentElement.querySelector('.bookdId').innerText,
            };

            addToCart(libro);

            alert(`¡Se ha agregado "${libro.title}" al carrito!`);
        });
    });
});

// Lógica específica para la página del carrito
if (window.location.pathname.includes('carrito.php')) {
    document.addEventListener('DOMContentLoaded', function () {
        showCartItems();
        // Puedes agregar más lógica específica para la página del carrito aquí
    });
}


/* 
###############################################################################
###############################################################################
*/

// Manejar clic en el botón "Reiniciar" en la página del carrito
document.addEventListener('DOMContentLoaded', function () {
    const reiniciarButton = document.querySelector('.carrito__totales-reiniciar');

    if (reiniciarButton) {
        reiniciarButton.addEventListener('click', function () {
            reiniciarCarrito();
        });
    }
    
    // ... (resto del código)
});

function reiniciarCarrito() {
    // Eliminar la cookie del carrito
    document.cookie = 'cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    
    // Actualizar la vista del carrito
    showCartItems();
    
    // Reiniciar los totales en la interfaz
    const totalUnidadesElement = document.getElementById('cantidad');
    const totalPrecioElement = document.getElementById('precio');
    const totalPrecioElementIVA = document.getElementById('precioIVA');
    
    totalUnidadesElement.textContent = '0';
    totalPrecioElement.textContent = '0';
    totalPrecioElementIVA.textContent = '0';
    
    // Puedes agregar más lógica de reinicio aquí según sea necesario
}

// Manejar clic en "Eliminar" en la página del carrito
document.addEventListener('DOMContentLoaded', function () {
    const carritoContenedor = document.querySelector('#articulos');

    if(carritoContenedor){
        carritoContenedor.addEventListener('click', function (event) {
            // Verificar si el clic fue en un botón de eliminar
            if (event.target.classList.contains('carrito__articulo-eliminar')) {
                // Obtener el índice del libro asociado al botón
                const index = event.target.dataset.index;
    
                // Verificar si el índice es válido y luego eliminar el libro
                if (index !== undefined && index !== null) {
                    eliminarLibro(parseInt(index));
                }
            }
        });
    }

    // ... (resto del código)
});

function eliminarLibro(index) {
    const cartItems = getCookie('cart') ? JSON.parse(getCookie('cart')) : [];

    // Antes de eliminar
    console.log('Antes de eliminar:', cartItems);

    // Eliminar el libro del carrito por índice
    cartItems.splice(index, 1);

    // Después de eliminar
    console.log('Después de eliminar:', cartItems);

    // Actualizar la cookie del carrito
    setCookie('cart', JSON.stringify(cartItems), 7);

    // Actualizar la vista del carrito
    showCartItems();
}


/* 
###############################################################################
###############################################################################
*/







/* 
###############################################################################
###############################################################################
*/


const botonAtras= document.getElementById('botonAtras')
if(botonAtras){
    botonAtras.addEventListener('click', function () {
        window.history.back();
    });
}
