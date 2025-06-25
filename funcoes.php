<?php

function meses($data)
{
	$mes["01"] = "Janeiro";
	$mes["02"] = "Fevereiro";
	$mes["03"] = "Março";
	$mes["04"] = "Abril";
	$mes["05"] = "Maio";
	$mes["06"] = "Junho";
	$mes["07"] = "Julho";
	$mes["08"] = "Agosto";
	$mes["09"] = "Setembro";
	$mes["10"] = "Outubro";
	$mes["11"] = "Novembro";
	$mes["12"] = "Dezembro";

	return $mes[$data];
}


function dataAbreviada($data)
{
	//return meses(date('m', $data));
	return date("d", strtotime($data)).".".meses(date("m", strtotime($data)));
}

function limitarTexto($texto, $limite){
  $contador = strlen($texto);
  if ( $contador >= $limite ) {      
      $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' '));
      return $texto."...";
  }
  else{
    return $texto;
  }
}
?> 