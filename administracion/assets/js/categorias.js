$(document).ready(function() {
    $('#tbl_categorias').DataTable();
    APP_ENVIROMENT = "development";
    console.log('App ENVIROMENT:', APP_ENVIROMENT);
});

$('#nueva-categoria').on('click', () => {
    var categoria = $('#categoria_input').val();
    var descripcion = $('#descripcion_input').val();
    var estado = $('#estado_input').prop('checked') ? 1 : 0;
    
    // Create a FormData object
    var formData = new FormData();

    // Append elements inputs to the FormData object
    formData.append('categoria', categoria);
    formData.append('descripcion', descripcion);
    formData.append('estado', estado);

    // Append the file input to the FormData object
    var fileInput = document.getElementById('fotografia');
    if (fileInput.files.length > 0) {
        formData.append('fotografia', fileInput.files[0]);
    }

    if (categoria.length == 0) {
        alertError('Al parecer algunos campos estan vacios')
    } else {
        Swal.fire({
            title: 'Espere...',
            html: 'Insertando datos...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
        $.ajax({
            type: "POST",
            url: baseURL + "/nueva-categoria",
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the content type
            success: function(rsp) {
                swal.close();

                // Check the response
                if (rsp !== 'success') {
                    // Ensure rsp is a string
                rsp = String(rsp);

                // Remove leading and trailing quotes
                rsp = rsp.replace(/^"|"$/g, '');

                // Trim whitespace and convert to lowercase
                rsp = rsp.trim().toLowerCase();
                }

                if (rsp == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Categoria creada',
                        text: 'Categoria creada exitosamente',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'categorias'
                        }
                    })
                } else {
                    alertError('Ocurrio un error al momento de crea una nueva categoria. Intente de nuevo')
                    if(APP_ENVIROMENT === "development"){
                        console.debug(rsp);
                    }
                }
            }
        });
    }
})

function fillForm(name, descripcion, estado, id){
    $("#nombre_category").val(name);
    $("#descripcion_category").val(descripcion);

    // Check or uncheck the checkbox based on the variable value
    if (estado === 1) {
        $('#estado_category').prop('checked', true);
    } else {
        $('#estado_category').prop('checked', false);
    }

    $("#id_category").val(id);
    
}

$('#editar-category').on('click', () => {
    var categoria = $('#nombre_category').val();
    var descripcion = $('#descripcion_category').val();
    var estado = $('#estado_category').prop('checked') ? 1 : 0;
    var id = $('#id_category').val();
    
    // Create a FormData object
    var formData = new FormData();

    // Append elements inputs to the FormData object
    formData.append('categoria', categoria);
    formData.append('descripcion', descripcion);
    formData.append('estado', estado);
    formData.append('id', id);

    // Append the file input to the FormData object
    var fileInput = document.getElementById('fotografia_category');
    if (fileInput.files.length > 0) {
        formData.append('fotografia_category', fileInput.files[0]);
    }

    Swal.fire({
        title: 'Espere...',
        html: 'Insertando datos...',
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
        }
    });
    $.ajax({
        type: "POST",
        url: baseURL + "/editar-categoria",
        data: formData,
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from setting the content type
        success: function(rsp) {
            swal.close();

            // Check the response
            if (rsp !== 'success') {
                // Ensure rsp is a string
            rsp = String(rsp);

            // Remove leading and trailing quotes
            rsp = rsp.replace(/^"|"$/g, '');

            // Trim whitespace and convert to lowercase
            rsp = rsp.trim().toLowerCase();
            }

            if (rsp == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Categoria actualizada',
                    text: 'Categoria actualizada exitosamente',
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'categorias'
                    }
                })
            } else {
                alertError('Ocurrio un error al momento de crea una nueva categoria. Intente de nuevo')
                if(APP_ENVIROMENT === "development"){
                    console.debug(rsp);
                }
            }
        }
    });
})
