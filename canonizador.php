<?php

 
 /**
 * Remueve stopwords
 */
function quitar_comunes($cadena){
    $comunes = array('por','la',' a','el','de','las','que','y','o','ya','en','los','las','le','lo','un','una','se','es','no','si','con','del','al','su','sus','asi');
    return preg_replace('/\b('.implode('|',$comunes).')\b/','',$cadena);
}
 
 /**
 * Calcula relevancias en una cadena dada generando un indice.
 */
function relevancias($cadena){

	$cadena=preparar_texto($cadena);
	$palabrasConRepetidos = explode(" ", $cadena);
	$palabrasConRepetidos = array_diff($palabrasConRepetidos, array(""));
	$palabrasSinRepetidos=array_unique($palabrasConRepetidos);
	
	//inicializo puntajes	
	foreach ($palabrasSinRepetidos as $palabra){
		$palabrasConPuntajes[$palabra]=0;
	}

	//asigno puntajes a cada palabra
	foreach($palabrasSinRepetidos as $palabraSR){
		foreach($palabrasConRepetidos as $palabraCR){
			if ($palabraSR==$palabraCR){
				$palabrasConPuntajes[$palabraSR]++;
			}
		} 
	}
	echo "<hr/>";

	echo "<h1>Palabras extraidas y cantidad de ocurrencias</h1>";
	foreach($palabrasSinRepetidos as $palabraSR){
		echo "<b>".$palabraSR."</b> aparece <b>".$palabrasConPuntajes[$palabraSR]."</b> veces.<br/>";
	}
	echo "<hr/>";

        //Calculamos relevancia, utilizamos ((length-pos)/length)*apariciones   (se toma en cuenta solo primer aparicion)
	$cantPalabras=count($palabrasSinRepetidos);
	$posicion=0;
	foreach($palabrasSinRepetidos as $palabraSR){
		$palabrasConPuntajes[$palabraSR]=(($cantPalabras-$posicion)/$cantPalabras)*$palabrasConPuntajes[$palabraSR];

		//las lineas comentadas a continuación pertenecen al puntaje otorgado dando relevancia a las últimas palabras y no a la sprimeras.
		//$posicion=strrpos($cadena, $palabraSR)/10;//la diferencia de el algoritmo de puntajes por derecha es que da la posición según caracteres y no según palabras
		//$palabrasConPuntajes[$palabraSR]=((1+$posicion)/$cantPalabras)*$palabrasConPuntajes[$palabraSR];
		$posicion++;
	}


	//ordenamos segun puntajes de menor a mayor
	uasort($palabrasConPuntajes,'comparacion_puntajes');
	echo "<h1>Puntaje asignado por palabra (seg&uacute;n posici&oacute;n y cantidad de ocurrencias)</h1>";
	foreach($palabrasConPuntajes as $palabra=>$puntaje){
		echo "<br/>La palabra \"<b>".$palabra."</b>\" tiene <b>".$puntaje."</b>";
	}
	echo "<hr/>";


}

 /**
 * Se usa para poder realizar una comparacion por indices para el ordenado por relevancia con uasort.
 */
function comparacion_puntajes($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? 1 : -1;
}

 
function preparar_texto($cadena)
{
	$cadena=strtolower($cadena);
	$aCambiar = array('Ñ','ñ','á','à','â','ã','ª','Á',
			'À','Â','Ã', 'é','è','ê','É','È',
			'Ê','í','ì','î','Í','Ì','Î','ò',
			'ó','ô','õ','º','Ó','Ò','Ô','Õ',
			'ú','ù','û','Ú','Ù','Û','ç','Ç');

	$cambiarPor = array('N','n','a','a','a','a','a','A',
			'A','A','A','e','e','e','E','E',
			'E','i','i','i','I','I','I','o',
			'o','o','o','o','O','O','O','O',
			'u','u','u','U','U','U','c','C');
    $cadena = trim(str_replace($aCambiar, $cambiarPor, $cadena));
    $cadena = trim(str_replace('  ', ' ', $cadena));
    return ereg_replace('[^A-Za-z0-9\_\-]', ' ', $cadena);
}       
      
      
?>



