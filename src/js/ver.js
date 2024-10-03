let botones = document.querySelectorAll(".table__accion.table__accion--ver");

if(botones){
    botones.forEach(boton => {
        // Do something with each element
        boton.addEventListener('click', event=>{

            const row = event.target.closest('tr');

            const bookImage = row.querySelector('.table__td:nth-child(8)').querySelector('.table__imagen').src;
            console.log(bookImage);

            const bookIsbn = row.querySelector('.table__td:nth-child(1)').textContent;
            const bookTitle = row.querySelector('.table__td:nth-child(2)').textContent;
            const bookAuthor = row.querySelector('.table__td:nth-child(3)').textContent;
            const bookEdition = row.querySelector('.table__td:nth-child(4)').textContent;
            const bookCategory = row.querySelector('.table__td:nth-child(5)').textContent;
            const bookPrice = row.querySelector('.table__td:nth-child(6)').textContent;
            const bookStock = row.querySelector('.table__td:nth-child(7)').textContent;
            
            const ventana = window.open("", "vtnInformacion", "height=500, width=500 ");

            ventana.document.open();
            ventana.document.writeln("ISBN: " + bookIsbn + "<br>");
            ventana.document.writeln("Título: " + bookTitle + "<br>");
            ventana.document.writeln("Autor: " + bookAuthor + "<br>");
            ventana.document.writeln("Edición: " + bookEdition + "<br>");
            ventana.document.writeln("Categoría: " + bookCategory + "<br>");
            ventana.document.writeln("Precio: " + bookPrice + "<br>");
            ventana.document.writeln("Stock: " + bookStock+ "<br>");

            const imgElement = ventana.document.createElement("img");
            imgElement.src = bookImage;
            imgElement.alt = bookTitle;
            ventana.document.body.appendChild(imgElement);

            console.log(imgElement);

            ventana.document.close();
            ventana.focus();
            
        })
    });
}
