<?php

 
 /**
 * Remueve stopwords
 */
function quitar_comunes($cadena){
    $comunes = array('la','el','él','de','la','las','que','a','y','o','ya','en','los','las','le','lo','un','una','se','es','no','si','por','con','del','al','su','sus');
    return preg_replace('/\b('.implode('|',$comunes).')\b/','',$cadena);
}
 
 /**
 * Calcula relevancias en una cadena dada generando un indice.
 */
function relevancias($cadena){
	echo "<h1>Palabras extraidas</h1>";
	$palabrasConRepetidos = explode(" ", $cadena);
	foreach($palabrasConRepetidos as $palabra){
		echo $palabra."<br/>";
	} 
	
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

 
      
      
      
?>



