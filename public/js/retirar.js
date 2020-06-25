$(document).ready(function(){    
    jQuery.validator.addMethod("greaterThanOrEqual", function(value, element, param) {
        return this.optional(element) || value >= param;
    }, $.validator.format("El monto mínimo es de Bs.{0}"));

    jQuery.validator.addMethod("lessThanOrEqual", function(value, element, param) {
        return this.optional(element) || value <= param;
    }, $.validator.format("Monto debe ser menor a Bs.{0}"));
    $('#retirar-form').validate({        
        rules:{
            banco:{
                required:true
            },
            monto:{
                required: true,
                digits: true,
                greaterThanOrEqual: costeJugada,
                lessThanOrEqual: $('#saldo').text()
            }
        }            
    })     
})