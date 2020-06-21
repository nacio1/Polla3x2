//############### ABONAR FORM VALIDATION ###############//
$('.datepicker').datetimepicker({
    timepicker: false,
    datepicker: true,
    format: 'd-m-Y',
    value:'d-m-Y'          
}); 

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
          maxlength: 20
      },
      fecha: {
          required: true,
          dateNL: true
      },
     monto: {
          required: true,
          digits: true               
      }
  },
  messages: {
    fecha: {
        dateNL: "Por favor, escribe una fecha válida"
    }
  }
});
//############### ABONAR FORM VALIDATION ###############//