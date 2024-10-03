(() => {
    const iconoCategoria = document.querySelector('.dashboard__enlace-categoria');
    if(iconoCategoria){
        iconoCategoria.addEventListener('click', () => {
            const dropwdown = document.querySelector('.dropwdown-sidebar');
            dropwdown.classList.toggle('dropwdown-show');
            console.log("ogl");
        });
    }
})();