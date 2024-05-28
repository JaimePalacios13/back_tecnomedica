$(document).ready(function() {
    $('#submitBtn').on('click', function() {
        Swal.fire({
            title: '¿Quieres actualizar las secciones?',
            text: "¡Actualizarás todas las secciones de tú página!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, actualizar!'
        }).then((result) => {
            if (result.isConfirmed) {

                // Serialize form data into an array of objects
                var formData = $('#elementos_form').serializeArray();

                // Display the serialized form data
                // formData.forEach(function(field) {
                //     console.log(field.name + ': ' + field.value);
                // });

                $.ajax({
                    type: "POST",
                    url: baseURL + "pagina/secciones/update",
                    data: formData,
                    dataType: "json",
                    success: function(rsp) {
                        console.log('rsp: ' + rsp);
                        if (rsp == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Secciones actualizadas',
                                text: 'Seccioness actualizadas exitosamente',
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'OK',
                                allowEscapeKey: false,
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = (baseURL + "pagina/secciones/" + idPagina);
                                }
                            })
                        } else {
                            alertError('Al parecer ocurrio un error, intenta de nuevo')
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error('AJAX Error: ' + status + ': ' + error);
                    }
                });
            }
        })
    });
});