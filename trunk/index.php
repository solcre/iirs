<?php include("canonizador.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES">
<html>
  <head>
    <title>Ing Info</title>
  </head>
  <body>
    <?php
	 //Probando eliminar stopwords
         
         $cadena="cortando las palabras porque son las palabras muchisimisimas palabrotas a cortar porque las palabras son asi";
         echo "<b>Cadena inicial: </b>".$cadena;
         echo "<br/>";
         echo "<br/>";
         $canonica=quitar_comunes($cadena);
         echo "<b>Cadena final: </b>".$canonica;
         echo "<br/>";

	 //probando generar relevancias en indice
	 relevancias($cadena);
         
    ?>  
  </body>
</html>
