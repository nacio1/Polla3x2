$(document).ready(function(){
    $("#login-form").validate({
      
    rules: {
      usuario: {
        required: true,
      },
  
      password: {
        required: true,        
      },      
    },
    messages: {
        
      usuario: {
        required: "Este campo es requerido",
      },
      password: {
        required: "Este campo es requerido",
        
        },              
    }, 
  })
}); 