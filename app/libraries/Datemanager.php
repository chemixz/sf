<?php

class Datemanager {

	public static function date2db($date=null)
	{
		$fecha = explode("/", $date);
   		return $fecha[2]."-".$fecha[1]."-".$fecha[0];
	}
	
	public static function date2normal($date=null)
	{
		$fecha = explode("-", $date);
   		return $fecha[2]."/".$fecha[1]."/".$fecha[0];
	}

	public static function CalcularMeses($desde = 0, $hasta = 0)
	{

		if (!empty($desde) && !empty($hasta)) {
			$fechaD = explode("-", date('Y-m-d',strtotime($desde)));
			$fechaH = explode("-", date('Y-m-d',strtotime($hasta)));

	            $ano1 = $fechaD[0];
	            $mes1 = $fechaD[1];
	            $dia1 = $fechaD[2];

	            $ano2 = $fechaH[0];
	            $mes2 = $fechaH[1];
	            $dia2 = $fechaH[2];

	            $timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
	            $timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2);

	            $segundos_diferencia = $timestamp1 - $timestamp2;

	            $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
	            $dias_diferencia = abs($dias_diferencia);
	            
	            return round($dias_diferencia/30,2);

	            // return $dia1;

		}
		else
		{
	            return FALSE;
		}
	}

}