<?php

require_once './Clases/funciones.php';
$objFunciones = new Funciones();
$accion = $_GET['accion'];

if ($accion == 'revisarPlaca') {
    $fecha = $_GET['fecha'];
    $horaAux = explode(' ', $fecha);
    $hora = $horaAux[1];
    $placa = $_GET['placa'];
    $ultimoDigito = $objFunciones->obtenerCaracterPlaca($placa, 6);
    $diaAux = explode('|', $objFunciones->obtenerDiaSemana($fecha));
    $diaNum = $diaAux[0];
    $diaNomb = $diaAux[1];
    $msg = '';

    if ($diaNum != 0 && $diaNum != 6) {
        $diasCirc = $objFunciones->obtenerDigitoCirculacion($diaNum);
        
        //reviso si esa placa puede circular el dia de la fecha seleccionada
        $circulaPlaca = 0;
        for ($i = 0; $i < count($diasCirc); $i++) {
            if ($ultimoDigito == $diasCirc[$i]) {
                $circulaPlaca = 1;
                $i = count($diasCirc);
            }
        }

        if ($circulaPlaca != 0) {
            $rangoHoras = $objFunciones->obtenerHorasCirc();
            $hora = strtotime($hora);
            for ($i = 0; $i < count($rangoHoras); $i++) {
                $horaInicio = strtotime($rangoHoras[$i][0]);
                $horaFin = strtotime($rangoHoras[$i][1]);   
                $hora1 = date("h:i",$hora);
                if ( $hora >=  $horaInicio && $hora <= $horaFin) {
                    $horaInicio = date("h:i",$horaInicio);
                    $horaFin = date("h:i",$horaFin);                      
                    $msg = 'Este día ' . $diaNomb . ' no puede circular el vehículo con placa ' . $placa .' entre las '.$horaInicio.' y '.$horaFin;
                    break;
                }else{
                    $msg = 'Este día ' . $diaNomb . ' puede circular libremente el vehículo con placa ' . $placa.' a esta hora '.$hora1;
                }
            }
        } else {
            $msg = 'Este día ' . $diaNomb . ' puede circular libremente el vehículo con placa ' . $placa;
        }

    } else {
        $msg = 'Este día ' . $diaNomb . ' puede circular libremente el vehículo con placa ' . $placa;
    }

    $_arreglo = array('msg' => $msg);
//    echo '<pre>';
//    print_r($_arreglo);
//    echo '</pre>';    
    echo json_encode($_arreglo);
}
?>