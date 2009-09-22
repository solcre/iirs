<?php

 
 /**
 * Remueve palabras comunes
 */
function quitarComunes($cadena){
    $comunes = array('la','el','él','de','la','las','que','a','y','o','ya','en','los','las','le','lo','un','una','se','es','no','si','por','con','del','al','su','sus');
    return preg_replace('/\b('.implode('|',$comunes).')\b/','',$cadena);
 }
 


 
      
      
      
?>



