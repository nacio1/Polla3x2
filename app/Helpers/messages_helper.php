<?php
function setSwaMessage(string $title,  string $text, int $type = 1) {
    $message;
    switch ($type) {
        case 1:
            $message = "Swal.fire(
                '$title',
                '$text',
                'success'
                )";
            break;
        case 2:            
            $message = "Swal.fire(
                'Oops...',
                'Algo salio mal!',
                'error'
                )";
            break;
        case 3:
            $message = 
                "Swal.fire({
                    title: 'Oops! Saldo insuficiente',
                    text: 'Abona saldo a tu cuenta y registra tu jugada',
                    icon: 'warning',                    
                    showCloseButton: true,
                    confirmButtonColor: '#16a085',                    
                    confirmButtonText: 'Abonar'
                }).then((result) => {
                    if(result.value) {
                        document.location.href = \"".base_url('jugador/abonar')."\";
                    }                        
                })";  
            break;
        case 4:
            $message = "Swal.fire(
                '$title',
                '$text',
                'warning'
                )";
            break;
        default:
            # code...
            break;
    }
    return $message;
}