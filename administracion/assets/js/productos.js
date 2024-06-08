// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "ready!" );
    
    // Para iniciar el sidebar después que la tabla ha cargado todos los registros y no genera espacio en blanco extra
    init_sidebar();
});

document.querySelector(".btn-save-producto").addEventListener("click", () => {
    img = $("#input_path_img").val();
    console.log('uno'+img)
    img = img.replace(/"/g, "");
    console.log('dos'+img)

    if (
        $("#producto").val().length == 0 ||
        $("#categoria").val() == 0 ||
        $("#marca").val() == 0 ||
        $("#descripcion").val().length == 0
    ) {
        alertError("Al parecer algunos campos estan vacios");
    } else if (img.length == 0) {
        alertError("Seleccione imagen");
    } else {

        // Create a FormData object
        var formData = new FormData();

        // Append elements inputs to the FormData object
        formData.append('nombre', $("#producto").val());
        formData.append('id_categoria', $("#categoria").val());
        formData.append('id_marca', $("#marca").val());
        formData.append('descripcion', $("#descripcion").val());
        formData.append('image', img);

        // Append the file input to the FormData object
        var fileInput = document.getElementById('catalogo');
        if (fileInput.files.length > 0) {
            formData.append('catalogo', fileInput.files[0]);
        }

        $.ajax({
            type: "post",
            url: baseURL + "insert/producto",
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the content type
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
                if (rsp == 'success') {
                    Swal.fire({
                        icon: "success",
                        title: "Enhorabuena",
                        text: "EL producto se registro correctamente",
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'productos'
                        }
                    })
                } else {
                    console.error(err);
                    Sentry.captureException(err);
                    alertError('Registro fallido. El producto no se pudo registrar.')
                }
            },
            error: function(err){
                console.error(err);
                Sentry.captureException(err);
                alertError('Registro fallido. El producto no se pudo registrar.');
            }
        });
    }
});

$(".btn-save-productos").attr("hidden", true);

var resizeProducto = $("#upload-demoProducto").croppie({
    enableExif: true,
    enableOrientation: true,
    viewport: {
        // Default { width: 100, height: 100, type: 'square' }
        width: 255,
        height: 260,
        type: "square", //square
    },
    boundary: {
        width: 350,
        height: 300,
    },
});
$("#image-productos").on("change", function() {
    var readerProducto = new FileReader();
    readerProducto.onload = function(e) {
        resizeProducto.croppie("bind", {
            url: e.target.result,
        }).then(function() {
            console.log("jQuery bind complete");
        });
    };
    readerProducto.readAsDataURL(this.files[0]);
    $(".btn-save-productos").attr("hidden", true);
    $(".btn-upload-image-producto").removeAttr("hidden");
});

$(".btn-upload-image-producto").on("click", function(ev) {

    var fileInput = document.getElementById('image-productos');
    if (fileInput.files.length <= 0) {
        new PNotify({
            title: 'Acción requerida',
            text: 'Seleccione una imagen primero antes de recortarla',
            styling: 'bootstrap3'
        });
        return;
    }

    resizeProducto.croppie("result", {
            type: "canvas",
            size: "viewport",
        }).then(function(img) {
            Swal.fire({
                title: "Espere...",
                html: "Recortando imagen...",
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
            $.ajax({
                url: baseURL + "recortar-img/producto",
                type: "POST",
                data: { image: img },
                success: function(rsp) {
                    var path = rsp.replace(/\\/g, "");
                    var image = baseURL + path;
                    image = image.replace(/"/g, "");
                    console.log(image+' dos');
                    $(".btn-upload-image-producto").attr("hidden", true);
                    $(".btn-save-productos").removeAttr("hidden");
                    $("#input_path_img").val(image);
                    $(".img-selection-upload").attr("src", image);
                    /* $(".container-image").html(rsp); */
                    swal.close();
                },
                error: function(err){
                    swal.close();
                    console.error(err);
                    Sentry.captureException(err);

                    new PNotify({
                        title: 'Acción fallida',
                        text: 'No se pudo recortar la imagen',
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }
            });
        });
});

function deleteProduct(id) {
    Swal.fire({
        title: '¿Está seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Espere...',
                html: 'Eliminando producto...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            $.ajax({
                type: "POST",
                url: baseURL + "deleteProduct",
                data: {
                    idproducto: id
                },
                dataType: "json",
                success: function(rsp) {
                    swal.close();
                    if (rsp == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto Eliminado',
                            text: 'Producto eliminado exitosamente',
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'productos'
                            }
                        })
                    } else {
                        alertError('Ocurrio un error al momento de eliminar un producto. Intente de nuevo')
                    }
                }
            });
        }
    })
}

function destacar(estado, id){
    let titulo = '';
    if (estado == 0) {
        titulo = '¿Está seguro que quieres quitar el destacado a este producto?'
    }else{
        titulo = '¿Está seguro que quieres destacar este producto?'
    }
    Swal.fire({
        title: titulo,
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, realizar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Espere...',
                html: 'Actualizando producto...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            $.ajax({
                type: "POST",
                url: baseURL + "destacarProducto",
                data: {
                    idproducto: id,
                    destacado: estado
                },
                dataType: "json",
                success: function(rsp) {
                    swal.close();
                    if (rsp == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto actualizado',
                            text: 'Producto actualizado exitosamente',
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'productos'
                            }
                        })
                    }else if(rsp == 'mx'){
                        alertError('El maximo de productos destacados es de 5')
                    } else {
                        alertError('Ocurrio un error al momento de actualizar un producto. Intente de nuevo')
                    }
                }
            });
        }
    })
}