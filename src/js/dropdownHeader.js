(() => {
    const iconoUsuario = document.querySelector('.fa-solid.fa-circle-user');
    if(iconoUsuario){
        iconoUsuario.addEventListener('click', () => {
            const dropwdown = document.querySelector('.dropwdown');
            dropwdown.classList.toggle('dropwdown-show');

            const dropwdownStyle = window.getComputedStyle(dropwdown);
            const navegacion = document.querySelector('.navegacion');
            if(dropwdownStyle.getPropertyValue('display') === 'block'){
                navegacion.classList.add('navegacion-hide');
            }else{
                navegacion.classList.remove('navegacion-hide');
            }

        });
    }
})();