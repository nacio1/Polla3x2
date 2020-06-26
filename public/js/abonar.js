$(document).ready(function(){
    $('.datepicker').datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'd-m-Y',
        value:'d-m-Y'          
    }); 
    
    jQuery.validator.addMethod("exactlength", function(value, element, param) {
        return this.optional(element) || value.length == param;
    }, $.validator.format("El numero de cuenta debe tener {0} caracteres."));
    
    jQuery.validator.addMethod("greaterThanOrEqual", function(value, element, param) {
        return this.optional(element) || value >= param;
    }, $.validator.format("El monto mínimo es de Bs.{0}"));
    
    $("#abonar-form").validate({
      rules: {
          banco_receptor: {
            required: true
          },
          banco_emisor: {
            required: true
          },
          num_ref: {
            required: true,
            digits: true,
            maxlength: 10
          },
          num_cuenta: {
            required: true,
            digits: true,
            exactlength: 20,
          },
          fecha: {
            required: true,
            dateNL: true
          },
         monto: {
            required: true,
            digits: true,
            greaterThanOrEqual: costeJugada,               
          }
      },
      messages: {
        fecha: {
            dateNL: "Por favor, escribe una fecha válida"
        }
      }
    });
});