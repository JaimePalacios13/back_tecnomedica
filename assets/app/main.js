function jsDelete(id, base_url) {

    url = base_url + "Categorias/EliminarCategoria";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id,
        },
        success: function() {
            document.location.href = base_url + "Categorias/categorias";
        }
    });
}



window.addEventListener("load", function() {

    // icono para mostrar contraseña
    showPassword1 = document.querySelector('.show-password1');
    if (showPassword1) {

        showPassword1.addEventListener('click', () => {

            // elementos input de tipo clave
            password1 = document.querySelector('.password1');

            if (password1.type === "text") {
                password1.type = "password"
                showPassword1.classList.remove('fa-eye-slash');
            } else {
                password1.type = "text"
                showPassword1.classList.toggle("fa-eye-slash");
            }

        })
    }

});



window.addEventListener("load", function() {

    // icono para mostrar contraseña
    showPassword2 = document.querySelector('.show-password2');
    if (showPassword2) {
        showPassword2.addEventListener('click', () => {

            // elementos input de tipo clave
            password2 = document.querySelector('.password2');


            if (password2.type === "text") {
                password2.type = "password"
                showPassword2.classList.remove('fa-eye-slash');
            } else {
                password2.type = "text"
                showPassword2.classList.toggle("fa-eye-slash");
            }

        })
    }

});



window.addEventListener("load", function() {

    // icono para mostrar contraseña
    showPassword = document.querySelector('.show-password');
    if (showPassword) {
        showPassword.addEventListener('click', () => {

            // elementos input de tipo clave
            password = document.querySelector('.password');


            if (password.type === "text") {
                password.type = "password"
                showPassword.classList.remove('fa-eye-slash');
            } else {
                password.type = "text"
                showPassword.classList.toggle("fa-eye-slash");
            }

        })
    }

});