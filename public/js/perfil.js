$(document).ready(function() { 
    
    $("#perfil-form").validate({
        rules: {          
            nombre:{
                required: true,
                lettersonly: true,
                minlength: 2,
                maxlength: 20
            }, 
            apellido:{
                required: true,
                lettersonly: true,
                minlength: 2,
                maxlength: 20
            }, 
            cedula:{
                required: true,
                digits: true,
                minlength: 7,
                maxlength: 8,
                remote: {
                    url: urlBase + 'jugador/cedulaExists',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        cedula: function() {
                          return $( "#cedula" ).val();
                        }
                    }                                           
                }
            }, 
            password: {                
                minlength: 8                
            },
            checkbox: {
                required: true
            },                 
        },
        messages:{
            cedula: {
                remote: 'Ya existe un usuario con esta cédula'
            }
        }
    });   
});