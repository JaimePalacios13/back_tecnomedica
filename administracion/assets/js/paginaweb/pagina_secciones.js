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

                var formData = new FormData();

                // Serialize form data excluding file inputs
                var formArray = $('#elementos_form').serializeArray();

                 // Append the serialized form data to the FormData object
                 $.each(formArray, function(index, field) {
                    formData.append(field.name, field.value);
                });

                // var fileInput = document.getElementById('userfile');
    
                // // var fileInput = $('input[name="userfile"]');
                // var file = fileInput.files[0];
                // formData.append('userfile', file);

                // Append files to the FormData object
                var fileInputs = $('input[type="file"]');
                $.each(fileInputs, function(index, fileInput) {
                    if (fileInput.files.length > 0) {
                        $.each(fileInput.files, function(i, file) {
                            formData.append(fileInput.name, file);
                        });
                    }
                });

                $.ajax({
                    url: baseURL + "pagina/secciones/update_v2",
                    type: "POST",
                    data: formData,
                    // dataType: "json",
                    processData: false, // Prevent jQuery from automatically transforming the data into a query string
                    contentType: false, // Prevent jQuery from setting Content-Type header
                    success: function(rsp) {

                         // Check the response
                        if (rsp !== 'success') {
                                // Ensure rsp is a string
                            rsp = String(rsp);

                            // Remove leading and trailing quotes
                            rsp = rsp.replace(/^"|"$/g, '');

                            // Trim whitespace and convert to lowercase
                            rsp = rsp.trim().toLowerCase();
                        }

                        if (rsp === 'success') {
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
                                }
                            })
                        } else {
                            alertError('Al parecer ocurrio un error, intenta de nuevo');
                            console.debug(rsp);
                        }
                    },
                    error: function(xhr, status, err) {
                        // Handle errors
                        swal.close();
                        console.debug("xhr", xhr);
                        console.debug("status", status);
                        console.error(err);
                        Sentry.captureException(err);

                        new PNotify({
                            title: 'Acción fallida',
                            text: 'No se puduieron actualizar las secciones',
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                    }
                });
            }
        })
    });
});