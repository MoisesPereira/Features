<?php
/**
 * @author Moisés Pereira moises@somarmeteorologia.com.br
 *
 * Classe que gera os dias da semana baseado na data que recebe por parâmetro. 
 *
 **/

namespace Weather;

class DiaSemana
{

	public function __construct($data)
	{
		$data_param = explode('/', $data);

		$dia = $data_param[0];
		$mes = $data_param[1];
		$ano = $data_param[2];

		$dSemana = $this->calcular($dia, $mes, $ano);

		echo $dSemana;
	}

	public function calcular($dia, $mes, $ano)
	{	
		$chave_mes = [
				"01" => 6, "02" => 2, "03" => 2, "04" => 5, "05" => 0, "06" => 3, 
				"07" => 5, "08" => 1, "09" => 4, "10" => 6, "11" => 2, "12" => 4
		];

		$ano = intval($ano + ($ano / 4));
		$calc = $ano + $dia + $chave_mes[$mes];
		$calcDia = $this->calcSete($calc);

		$dia_semana = [
				1 => "Segunda-Feira", 2 => "Terça-Feira", 3 => "Quarta-Feira",
				4 => "Quinta-Feira", 5 => "Sexta-Feira", 6 => "Sábado", 7 => "Domingo"
		];
		
		return $dia_semana[$calcDia];	
	}

	/**
	* Método calcSete: subtrai 7 do valor até o menor numero até 7
	*
	* @param string $valor Tem o calculo de $ano + $dia + $chave_mes[$mes];
	**/

	public function calcSete($valor)
	{

		while($valor > 7)
		{
			$valor = $valor - 7;
		}

		return $valor;
	}

}

