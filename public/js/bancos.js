jQuery.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
   }, $.validator.format("El numero de cuenta debe tener {0} caracteres."));

$("#cuentas-form").validate({
    rules: {        
        banco: {
            required: true,            
            remote: {
                url: urlBase +'jugador/bancos/checkBancoUse',
                type: 'post',
                dataType: 'json',
                data: {
                    banco: function() {
                      return $( "#banco" ).val();
                    }
                  }                                           
            }            
        },       
        numero_cuenta: {
            required: true,
            digits: true,
            exactlength: 20,
            remote: {
                url: urlBase +'jugador/bancos/checkNumCuentaUse',
                type: 'post',
                dataType: 'json',
                data: {
                    numero_cuenta: function() {
                      return $( "#numero_cuenta" ).val();
                    }
                  }    
            }
        }            
    },
    messages: {
        banco: {
            remote: "Ya estas utilizando este banco"
        },
        numero_cuenta: {
            remote: "Número de cuenta ya esta siendo utilizado"           
        }        
    }
});   
$("#edit-cuentas-form").validate({
    rules: {        
        'banco2': {
            required: true,            
            remote: {
                url: urlBase +'jugador/bancos/checkBancoUse',
                type: 'post',
                dataType: 'json',
                data: {                    
                    cuenta_id: function() {
                        return $( "#cuenta_id" ).val();
                    }                     
                }                                           
            }         
        },       
        numero_cuenta2: {
            required: true,
            digits: true,
            exactlength: 20,
            remote: {
                url: urlBase +'jugador/bancos/checkNumCuentaUse',
                type: 'post',
                dataType: 'json',
                data: {
                    cuenta_id: function() {
                        return $( "#cuenta_id" ).val();
                    }                       
                }    
            }
        }            
    },
    messages: {
        banco2: {
            remote: "Ya estas utilizando este banco"
        },
        numero_cuenta2: {
            remote: "Número de cuenta ya esta siendo utilizado"           
        }        
    }
});   
//Click en edit modal button
$('.edit-button').on('click', function() {
    //Seleccionar padre tr de la jugada seleccionada
    $tr = $(this).closest('tr');

    //Almacenar los hijos de tr(td) en un array
    var data = $tr.children('td').map(function(){
        return $(this).text();
    }).get();

    //Asignar valores a editar-modal   
    $('#cuenta_id').val(data[0]);
    $('#banco2').val(data[1]);    
    $('#numero_cuenta2').val(data[3]);    
});