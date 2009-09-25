<?php include("canonizador.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES">
<html>
  <head>
    <title>Ing Info</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
  </head>
  <body>
    <?php



	
         
         $cadena="Por poema se entendía antiguamente a cualquier composición literaria, ya que la palabra viene del verbo griego poiesis, que significa creación con la palabra. El poema es así, cualquier lectura o trabajo escrito con intención artística. Por lo cual se hablaba de poesía épica (luego narrativa); lírica (o destinada al canto del arpa manual de cinco cuerdas conocida como lira); y poesía dramática o destinada a la representación escénica. Y por literario hay que entender el lenguaje sometido a un tratamiento de estilización para intensificar su belleza que lo convierte en objeto de arte. El poema es el lugar de encuentro entre la poesía y el hombre. Dicho por Octavio Paz, en su obra El arco y la lira no todo texto construido bajo las leyes del metro es poesía.";
         echo "<b>Cadena inicial: </b>".$cadena;
         echo "<br/>";
         echo "<br/>";


         $canonica=preparar_texto($cadena);
	 //eliminamos stopwords
	 $canonica=quitar_comunes($canonica);

	 $arreglos=explode('.',$canonica);
	 //probando generar relevancias en indice
	 
         echo "<br/>";
	 //echo "Oracion 1: ".$arreglos[0];
	 //print_r(relevancias($arreglos[0]));
	 //echo "Oracion 2: ".$arreglos[1];
	 //print_r(relevancias($arreglos[1]));
	 //echo "Oracion 3: ".$arreglos[2];
	 //print_r(relevancias($arreglos[2]));
	 //echo "Oracion 4: ".$arreglos[3];
	 //print_r(relevancias($arreglos[3]));
	 //echo "Oracion 5: ".$arreglos[4];
	 //print_r(relevancias($arreglos[4]));
	 //echo "Oracion 6: ".$arreglos[5];
	 //print_r(relevancias($arreglos[5]));

         $sumaParrafo  = array_sum_values( relevancias($arreglos[0]), relevancias($arreglos[1]),relevancias($arreglos[2]) ,relevancias($arreglos[3]),relevancias($arreglos[4]),relevancias($arreglos[5]) );
	echo "<h1>Puntajes seg&uacute;n posiciones y cantidad de ocurrencias de las palabras en todas las oraciones</h1>";
	//print_r($sumaParrafo);
	uasort($sumaParrafo,'comparacion_puntajes');
	foreach ($sumaParrafo as $palabra=>$puntaje){
		echo "La palabra <b>\"".$palabra."\"</b> tiene <b>".$puntaje."</b> puntos.<br/>";
	}



  	

    ?>  
  </body>
</html>
