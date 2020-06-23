<?php
use App\Models\JornadaModel;
use App\Models\RetiradosModel;

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
        default:
            # code...
            break;
    }
    return $message;
}

function ordernarJugadas(array $jugadas) {
    $i = 1;
    $fecha = $jugadas[0]['fecha_jugada'];
    foreach($jugadas as &$jugada) {			
        if($i > 1) {
            if($jugada['fecha_jugada'] === $fecha) {
                $jugada['fecha_jugada'] = null;					
            }else{
                $fecha = $jugada['fecha_jugada'];
            }
        }
        $i++;			
    }		
    return chequearRetirosJugadas($jugadas);
}

function chequearRetirosJugadas(array $jugadas) {
    $retiradosModel = new RetiradosModel();  
    $jornadaModel = new JornadaModel(); 
    foreach($jugadas as &$jugada) {		
        $retirados = $retiradosModel->where('jornada_id', $jugada['jornada_id'])->first();	
        $jornada = $jornadaModel->where('jornada_id', $jugada['jornada_id'])->first();
        if ( in_array($jugada['1va_ejemplar'], explode(',', $retirados['1va_retirados'])) ) {
            $nuevo_valor = nuevoValor($jugada['1va_ejemplar'], $retirados['1va_retirados'], $jornada['1va_ejemplares']);//Nuevo valor para las jugadas
            $jugada['1va_ejemplar'] = $jugada['1va_ejemplar'].'('.$nuevo_valor.')';
        }  
        if ( in_array($jugada['2va_ejemplar'], explode(',', $retirados['2va_retirados'])) ) {
            $nuevo_valor = nuevoValor($jugada['2va_ejemplar'], $retirados['2va_retirados'], $jornada['2va_ejemplares']);//Nuevo valor para las jugadas
            $jugada['2va_ejemplar'] = $jugada['2va_ejemplar'].'('.$nuevo_valor.')';
        }
        if ( in_array($jugada['3va_ejemplar'], explode(',', $retirados['3va_retirados'])) ) {
            $nuevo_valor = nuevoValor($jugada['3va_ejemplar'], $retirados['3va_retirados'], $jornada['3va_ejemplares']);//Nuevo valor para las jugadas
            $jugada['3va_ejemplar'] = $jugada['3va_ejemplar'].'('.$nuevo_valor.')';
        }
        if ( in_array($jugada['4va_ejemplar'], explode(',', $retirados['4va_retirados'])) ) {
            $nuevo_valor = nuevoValor($jugada['4va_ejemplar'], $retirados['4va_retirados'], $jornada['4va_ejemplares']);//Nuevo valor para las jugadas
            $jugada['4va_ejemplar'] = $jugada['4va_ejemplar'].'('.$nuevo_valor.')';
        }
        if ( in_array($jugada['5va_ejemplar'], explode(',', $retirados['5va_retirados'])) ) {
            $nuevo_valor = nuevoValor($jugada['5va_ejemplar'], $retirados['5va_retirados'], $jornada['5va_ejemplares']);//Nuevo valor para las jugadas
            $jugada['5va_ejemplar'] = $jugada['5va_ejemplar'].'('.$nuevo_valor.')';
        }
        if ( in_array($jugada['6va_ejemplar'], explode(',', $retirados['6va_retirados'])) ) {
            $nuevo_valor = nuevoValor($jugada['6va_ejemplar'], $retirados['6va_retirados'], $jornada['6va_ejemplares']);//Nuevo valor para las jugadas
            $jugada['6va_ejemplar'] = $jugada['6va_ejemplar'].'('.$nuevo_valor.')';
        }        			
    }	
    return $jugadas;
}

function nuevoValor($numero, $retirados, $num_ejemplares) {
    $nuevo_valor = $numero + 1;
    $esValido = false;

    do {
        //Si es mayor al numero de ejemplares de esa valida, vale 1     
        if($nuevo_valor > $num_ejemplares) {
            $nuevo_valor = 1;
        } 
        //chequear si el numero del nuevo valor ya esta retirado
        if( in_array($nuevo_valor, explode(',', $retirados)) ) {
            $nuevo_valor += 1;
        }else{
            $esValido = true;
        }

    } while ($esValido == false);

    return $nuevo_valor;
}   