$(document).ready(function() {     
    $("#registro-form").validate({
        rules: {
            usuario: {
                required: true,
                minlength: 3,
                maxlength: 20,
                alphanumeric: true,
                remote: {
                    url: urlBase + 'userExists',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        username: function() {
                          return $( "#usuario" ).val();
                        }
                      }                                           
                }               
            },
            password: {
                required: true,
                minlength: 8
            },
            confirm_password: {
                required: true,                
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true,
                maxlength: 50,
                remote: {
                    url: urlBase + 'emailExists',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        email: function() {
                          return $( "#email" ).val();
                        }
                    }    
                }                
            }            
        },
        messages: {            
            usuario: {
                required: "Usuario es requerido",
                minlength: "Usuario debe tener al menos 3 carácteres",
                maxlength: "Usuario debe tener máximo 20 carácteres",
                alphanumeric: "Solo letras, números y guion bajo(_)",
                remote: "Usuario ya existe"
            },
            password: {
                required: "Contraseña es requerida",
                minlength: "Contraseña debe tener al menos 8 carácteres"
            },
            confirm_password: {
                required: "Este campo es requerido",                
                equalTo: "Contraseñas no coinciden"
            },
            email: {
                required: "Por favor ingresa tu email",
                email: "Por favor ingresa un email válido",
                remote: $.validator.format("El correo {0} ya esta siendo utilizado.")
            }
            
        }        
    });   
});