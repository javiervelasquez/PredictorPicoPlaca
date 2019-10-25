<?php

class Funciones {

//    const restarHora = 5;
    const restarHora = 0;

    public function obtenerFechaLocal() {
        //Obtebcion de la fecha y hora del sistema
        $fecha = date('Y-m-j H:i:s'); //inicializo la fecha con la hora    
        $minutos = date('i');
        $segundos = date('s');

        $nuevafecha = strtotime('-' . Funciones::restarHora . ' hour', strtotime($fecha));
        $nuevafecha = strtotime('-' . $minutos . ' minute', $nuevafecha); // utilizo "nuevafecha"
        $nuevafecha = strtotime('-' . $segundos . ' second', $nuevafecha); // utilizo "nuevafecha"
        $nuevafecha = date('Y-m-j H:i:s', $nuevafecha);
        return $nuevafecha;
    }

    public function obtenerFechaHoraLocal() {
        //Obtebcion de la fecha y hora del sistema
        $fecha = date('Y-m-j H:i:s'); //inicializo la fecha con la hora
        $nuevafecha = strtotime('-' . Funciones::restarHora . ' hour', strtotime($fecha));
        $nuevafecha = date('Y-m-j H:i:s', $nuevafecha);
        return $nuevafecha;
    }

    public function obtenerFechaHoraLocal2() {
        //Obtebcion de la fecha y hora del sistema
        $fecha = date('Y-m-j H:i:s'); //inicializo la fecha con la hora
        $nuevafecha = strtotime('-' . Funciones::restarHora . ' hour', strtotime($fecha));
        $nuevafecha = date('YmjHis', $nuevafecha);
        return $nuevafecha;
    }

    public function obtenerRangoCincoMinutosAteriores() {
        $fecha = date('Y-m-j H:i:s'); //inicializo la fecha con la hora           
        $nuevafecha = strtotime('-' . Funciones::restarHora . ' hour', strtotime($fecha));
        $nuevafecha = date('Y-m-j H:i:s', $nuevafecha);
        $fechaHoraSeparar = explode(" ", $nuevafecha);
        $horaAux = explode(":", $fechaHoraSeparar[1]);

        $minutoAux = $horaAux[1];
        $minutoAux1 = $minutoAux[0];
        $minutoAux2 = $minutoAux[1];

        if ($minutoAux2 < 5)
            $minutoAux2 = 0;

        if ($minutoAux2 > 5)
            $minutoAux2 = 5;

        $fecha2_1 = $fechaHoraSeparar[0] . " " . $horaAux[0] . ":" . $minutoAux1 . $minutoAux2 . ":00";
        $fecha2 = $fechaHoraSeparar[0] . " " . $horaAux[0] . ":" . $minutoAux1 . $minutoAux2 . ":59";
        $fecha1 = strtotime('-4 minute', strtotime($fecha2_1)); // utilizo "nuevafecha"
        $fecha1 = date('Y-m-j H:i:s', $fecha1);
        return $fecha1 . '|' . $fecha2;
    }

    public function obtener30MinutosAteriores() {
        //inicializo la fecha y hora del servidor           
        $fecha = date('Y-m-j H:i:s');
        $nuevafecha = strtotime('-' . Funciones::restarHora . ' hour', strtotime($fecha));
        $fechaHoraActual = date('Y-m-j H:i:s', $nuevafecha);

        //Resto 5 minutos de la fecha y hora actual
        $fechaHoraAnt = strtotime('-30 minute', strtotime($fechaHoraActual));
        $fechaHoraAnt = date('Y-m-j H:i:s', $fechaHoraAnt);
        return $fechaHoraAnt . '|' . $fechaHoraActual;
    }

    public function obtener1HoraAteriorMinutoCero() {
        //inicializo la fecha y hora del servidor           
        $fecha = date('Y-m-j H:i:s');
        $nuevafecha = strtotime('-' . Funciones::restarHora . ' hour', strtotime($fecha));
        $fechaHoraActual = date('Y-m-j H:i:s', $nuevafecha);
        $fechaAux = strtotime('-1 hour', strtotime($fechaHoraActual));
        $fechaAux2 = date('Y-m-j H:i:s', $fechaAux);
        $fechaAux3 = explode(':', $fechaAux2);
        $fechaResultado = $fechaAux3[0] . ':50:00';
        return $fechaResultado;
    }

    public function obtener5diasAteriores($fechaInicio) {
        //Resto 5 minutos de la fecha y hora actual
        $fechaHoraAnt = strtotime('-5 day', strtotime($fechaInicio));
        $fechaHoraAnt = date('Y-m-j H:i:s', $fechaHoraAnt);
        $fechaHoraAct = $fechaInicio;
        return $fechaHoraAnt . '|' . $fechaHoraAct;
    }

    public function sumarRestarHoras($fechaInicio, $unidades, $tipoUnidades) {
        $fechaHoraResultado = strtotime($unidades . ' ' . $tipoUnidades, strtotime($fechaInicio));
        $fechaHoraResultado = date('Y-m-j H:i:s', $fechaHoraResultado);
        return $fechaHoraResultado;
    }

    public function redondear_a_horaPosterior($fechaHora) {
        $fechaAux = explode(' ', $fechaHora);
        $horaAux = explode(':', $fechaAux[1]);
        $hora = $horaAux[0];
        $nuevaFecha = $fechaAux[0] . ' ' . $hora . ':00:00';
        $nuevaFecha = $this->sumarRestarHoras($nuevaFecha, +0, 'hour');
        return $nuevaFecha;
    }

    function eliminarRepetidorDeArray($array, $camposArray, $campo_a_comparar) {
        $arraySinRepetidos = null;
        $numCamposArray = count($camposArray);

        //copio los peimeros elementos del array
        for ($i = 0; $i < $numCamposArray; $i++) {
            $arraySinRepetidos[$camposArray[$i]][0] = $array[$camposArray[$i]][0];
        }
        $contArraySinRepetidos = count($arraySinRepetidos[$campo_a_comparar]);

        for ($i = 0; $i < $array['num_rows']; $i++) {
            if ($array[$campo_a_comparar][$i] != $arraySinRepetidos[$campo_a_comparar][$contArraySinRepetidos - 1]) {
                for ($k = 0; $k < $numCamposArray; $k++) {
                    $arraySinRepetidos[$camposArray[$k]][$contArraySinRepetidos] = $array[$camposArray[$k]][$i];
                }
                $contArraySinRepetidos++;
            }
        }
        $arraySinRepetidos['num_rows'] = count($arraySinRepetidos[$campo_a_comparar]);
        return $arraySinRepetidos;
    }

    function obtenerCaracterPlaca($placa, $posicion) {
        $caracterPlaca = $placa[$posicion];
        return $caracterPlaca;
    }

    function obtenerDiaSemana($fecha) {
        $dia = null;
        $fechats = strtotime($fecha); //pasamos a timestamp
        //el parametro w en la funcion date indica que queremos el dia de la semana
        //lo devuelve en numero 0 domingo, 1 lunes,....
        switch (date('w', $fechats)) {
            case 0: $dia = "0|Domingo";
                break;
            case 1: $dia = "1|Lunes";
                break;
            case 2: $dia = "2|Martes";
                break;
            case 3: $dia = "3|Miercoles";
                break;
            case 4: $dia = "4|Jueves";
                break;
            case 5: $dia = "5|Viernes";
                break;
            case 6: $dia = "6|Sabado";
                break;
        }
        return $dia;
    }

    function obtenerHorasCirc() {
        $rangoHoras[0] = array('07:00', '09:30');
        $rangoHoras[1] = array('16:00', '19:30');
        return $rangoHoras;
    }

    function obtenerArrayConf() {
        $diasCirc = NULL;
        $diasCirc[1]['digito'] = array(1, 2);
        $diasCirc[2]['digito'] = array(3, 4);
        $diasCirc[3]['digito'] = array(5, 6);
        $diasCirc[4]['digito'] = array(7, 8);
        $diasCirc[5]['digito'] = array(9, 0);
        return $diasCirc;
    }

    function obtenerDigitoCirculacion($dia) {
        $diasCirc = $this->obtenerArrayConf();
        return $diasCirc[$dia]['digito'];
    }

}

?>