document.addEventListener('DOMContentLoaded', function () {
    // eslint-disable-next-line no-undef
    $('#books-table').DataTable({
      language: {
        info: 'Mostrando _START_ a _END_ de _TOTAL_ libros',
        infoEmpty: 'Mostrando 0 a 0 de 0 libros',
        infoFiltered: '(filtrado de _MAX_ libros totales)',
        lengthMenu: 'Mostrar _MENU_ libros',
      },
      responsive: true,
      columnDefs: [{ orderable: false, responsivePriority: 1, targets: -1 }],
    });
  });
  