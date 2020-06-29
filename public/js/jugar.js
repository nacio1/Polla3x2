$(document).ready(function(){
    //################# JUGAR INPUT TOGGLE #################//
    $('.input-check-wrapper').click(function(){
        var checkbox = $(this).find('input[type=radio]');                
        checkbox.prop("checked", !checkbox.prop("checked")); 

        $(this).closest(".valida-wrapper").find("*").removeClass('input-checked');

        $(this).addClass("input-checked");                        
        
        //Si input no esta chequeado, remover clase
        if($(this).find('input[type=radio]').prop("checked") == false){//
            $(this).removeClass('input-checked');
        }     
    });

    $('input[type=radio]').click(function (e){
        e.stopPropagation();
        return true;
    });
    
    $(".form-check-input").click(function() {  
        $(this).closest(".valida-wrapper").find("*").removeClass('input-checked');            
        if($(this).prop("checked") == true){
            $(this).parent('div').addClass("input-checked");
        }
        else if($(this).prop("checked") == false){
            $(this).parent('div').removeClass("input-checked");
        }        
    });
        
    //################# JUGAR FROM VALIDATE ################//
    $('#jugar-form').validate({
        submitHandler: function(form) {
            var data_1va_ejemplar = $('input[name="1va_ejemplar"]:checked').val();
            var data_2va_ejemplar = $('input[name="2va_ejemplar"]:checked').val();
            var data_3va_ejemplar = $('input[name="3va_ejemplar"]:checked').val();
            var data_4va_ejemplar = $('input[name="4va_ejemplar"]:checked').val();
            var data_5va_ejemplar = $('input[name="5va_ejemplar"]:checked').val();
            var data_6va_ejemplar = $('input[name="6va_ejemplar"]:checked').val();                
            Swal.fire({
                title: 'Tu jugada',
                html: '<b>1va) '+ data_1va_ejemplar + '<br>' +
                    '2va) '+ data_2va_ejemplar + '<br>' +
                    '3va) '+ data_3va_ejemplar + '<br>' +
                    '4va) '+ data_4va_ejemplar + '<br>' +
                    '5va) '+ data_5va_ejemplar + '<br>' +
                    '6va) '+ data_6va_ejemplar + '</b>',
                showCloseButton: true,                    
                confirmButtonColor: '#3085d6',                    
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if(result.value) {                        
                    form.submit();                      
                }
            })
        },
        onclick: false,
        rules: {
            '1va_ejemplar': "required",
            '2va_ejemplar': "required",
            '3va_ejemplar': "required",
            '4va_ejemplar': "required",
            '5va_ejemplar': "required",
            '6va_ejemplar': "required",                                
        },
        showErrors: function(errorMap, errorList) {
            // Do nothing here
        },
        invalidHandler: function(event, validator) {
            Swal.fire('Completa todos los campos');
        },              
    });
});

 