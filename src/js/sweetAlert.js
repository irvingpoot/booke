(() => {
    const alertResponse = document.querySelector('#alertElement');

    if (alertResponse) {
      const responseData = JSON.parse(alertResponse.getAttribute('data-response'));
      console.log(responseData);
      Swal.fire({
          icon: responseData.type,
          title: responseData.title,
          text: responseData.message,
          confirmButtonColor: '#0174F6',
        });
    }
})();