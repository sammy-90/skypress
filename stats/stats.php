<?php

   //Supreme Analytics
   $IP = $_SERVER['REMOTE_ADDR'];
   $uri = $_GET['URI']; if(!$uri){$uri = $_SERVER['REQUEST_URI'];}
   $ref = $_GET['REFERER'];

   if ((strlen($_SERVER['HTTP_USER_AGENT']) > 6) && (strlen($_SERVER['REMOTE_ADDR']) > 6)){
  
     //Get Time & Date
     $month = date("M");
     $date = date("j");
     $Ante = date("a");
     $hour = date("g"); 
     $min = date("i"); if($min<0){$min="0";}

     if (strpos(strtolower($ref), strtolower($_SERVER['HTTP_HOST'])) === false){

       if(!$ref){

         //Record logs
         $handle = fopen("stats.txt", 'a+'); fwrite($handle, $month." ".$date." ".$hour.":".$min." ".$Ante."|".$IP."\r\n"); fclose($handle);

       }else{
      
         //Record logs
         $handle = fopen("stats.txt", 'a+'); fwrite($handle, $month." ".$date." ".$hour.":".$min." ".$Ante."|".$IP."|".$ref."|".$uri."\r\n"); fclose($handle);

       }

     }

   }

?>