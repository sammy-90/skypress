<?php

   //Anti Spam
   $spam = array("http","www");
   for($j = 0; $j < count($spam); next($spam), $j++){
     if ($spos1 = strpos(strtolower($message),strtolower($spam[$j])) !== false){echo "<a href='index.php'>Home</a>"; exit;}
   } 

?>
