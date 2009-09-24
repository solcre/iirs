<?php include("canonizador.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES">
<html>
  <head>
    <title>Ing Info</title>
  </head>
  <body>
    <?php



	 //Probando eliminar stopwords
         
         $cadena="Por poema se entendía antiguamente a cualquier composición literaria, ya que la palabra viene del verbo griego poiesis, que significa creación con la palabra. El poema es así, cualquier lectura o trabajo escrito con intención artística. Por lo cual se hablaba de poesía épica (luego narrativa); lírica (o destinada al canto del arpa manual de cinco cuerdas conocida como lira); y poesía dramática o destinada a la representación escénica. Y por literario hay que entender el lenguaje sometido a un tratamiento de estilización para intensificar su belleza que lo convierte en objeto de arte. El poema es el lugar de encuentro entre la poesía y el hombre. Dicho por Octavio Paz, en su obra El arco y la lira no todo texto construido bajo las leyes del metro es poesía.";
         echo "<b>Cadena inicial: </b>".$cadena;
         echo "<br/>";
         echo "<br/>";


         $canonica=preparar_texto($cadena);
	 //eliminamos stopwords
	 $canonica=quitar_comunes($canonica);
         echo "<b>Se remueven stopwords, caracteres irrelevantes y se cambian caracteres: </b>".$canonica;
         echo "<br/>";


	 //probando generar relevancias en indice
	 relevancias($canonica);
         echo "<br/>";
         echo "<br/>";


         
    ?>  
  </body>
</html>
