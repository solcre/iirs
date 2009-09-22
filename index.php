<?php include("canonizador.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES">
<html>
  <head>
    <title>Ing Info</title>
  </head>
  <body>
    <?php
	//pruebas
         
         $cadena="esto si contiene palabras comunes, tal vez una dos o tres, ya no se cuantas";
         echo "Cadena inicial: ".$cadena;
         echo "<br/>";
         echo "<br/>";
         $canonica=quitarComunes($cadena);
         echo "Cadena final: ".$canonica;
         echo "<br/>";
         
    ?>  
  </body>
</html>
