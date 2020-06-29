<?php namespace App\Controllers\admin;

use  App\Controllers\Basecontroller;

use App\Models\JugadaModel;
use App\Models\RetiradosModel;
use App\Models\ResultadosModel;

class Resultados extends BaseController
{
	public function index()
	{
        $resultadosModel = new ResultadosModel();
        $data['resultados'] = $resultadosModel->getAll();
        $data['title'] = 'Resultados';
        return view('admin/resultados', $data);
    }

    public function actualizarPuntos() {
        helper('funciones');
        $data = $this->request->getPost();
        $this->actualizarResultados($data['valida_resultados'], $data['1ro'], $data['2do'], $data['3ro']);
        $valida = $data['valida'];//Ej: 1va_ejemplar, 2va_ejemplar...
        $valida_pts = $data['valida_pts'];//Ej: 1va_pts, 2va_pts...
        $num_ejemplares = $data['num_ejemplares'];//Ej: 1va_ejemplares

        $jugadaModel = new JugadaModel();
        $retiradosModel = new RetiradosModel();
        $jugadas = $jugadaModel->where('jornada_id', $GLOBALS['jornada_id'])->findAll();
        $retirados = $retiradosModel->where('jornada_id', $GLOBALS['jornada_id'])->findColumn($data['valida_retirados']);
        
        foreach ($jugadas as $jugada) {
            //Chequear si ejemplar esta retirado
            if (in_array($jugada[$valida], explode(',', $retirados[0]))) {
                $jugada[$valida] = nuevoValor($jugada[$valida], $retirados[0], $num_ejemplares);//Nuevo valor para las jugadas
            }   
            //Chequear si jugada coincide con los primeros puestos, sino vale 0
            if($jugada[$valida] == $data['1ro']){
                $jugada[$valida_pts] = $data['1ro_pts'];//5 pts
            }
            elseif($jugada[$valida] == $data['2do']){
                $jugada[$valida_pts] = $data['2do_pts'];//3 pts
            }
            elseif($jugada[$valida] == $data['3ro']){
                $jugada[$valida_pts] = $data['3ro_pts'];//1 pts
            }else{
                $jugada[$valida_pts] = 0;//0 pts
            }            

            //Calcular el total de puntos de la jugada
            $jugada['total_pts'] = $jugada['1va_pts'] + $jugada['2va_pts'] + $jugada['3va_pts'] +
                                    $jugada['4va_pts'] + $jugada['5va_pts'] + $jugada['6va_pts'];
                                    
            $newData = [
                $valida_pts => $jugada[$valida_pts],
                'total_pts' => $jugada['total_pts']
            ];

            $jugadaModel->update($jugada['jugada_id'], $newData);
        }
        
        return redirect()->to('resultados')->with('message', "Swal.fire('Listo','Puntuación actualizada','success')");
    }   

    protected function actualizarResultados(string $valida, int $primero, int $segundo, int $tercero) {
        $resultadosModel = new ResultadosModel();
        $resultados = $resultadosModel->where('jornada_id', $GLOBALS['jornada_id'])->first();
        $data = [ 
            'resultados_id' => $resultados['resultados_id'],
            $valida => $primero.' - '. $segundo. ' - '. $tercero
        ];
        $resultadosModel->save($data);
    }
}    