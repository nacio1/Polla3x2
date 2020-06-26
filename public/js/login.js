$(document).ready(function(){
    // toggle password visibility
    $("#password-wrapper span").on('click', function(event) {
            if($('#password-wrapper input').attr("type") == "text"){
          $('#password-wrapper input').attr('type', 'password');
          $('#password-wrapper i').addClass( "fa-eye-slash" );
          $('#password-wrapper i').removeClass( "fa-eye" );
      }else if($('#password-wrapper input').attr("type") == "password"){
          $('#password-wrapper input').attr('type', 'text');
          $('#password-wrapper i').removeClass( "fa-eye-slash" );
          $('#password-wrapper i').addClass( "fa-eye" );
      }
    });
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
    errorPlacement: function(error, element) {
      if(element.parent().hasClass('input-group')){
        error.insertAfter( element.parent() );
      }else{
        error.insertAfter( element );
      }
    }
  })
}); 