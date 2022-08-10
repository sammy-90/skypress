<?php

 //Press Or Classified
 $type = $_GET['type']; if(!$type){$type = "class";}

 //Setup Files 
 if ($type === "class"){
    $file = "myfiles/widgets/classified.txt";
    $tfile = "myfiles/widgets/classified.tmp";
 }else{
    $file = "myfiles/widgets/press-release.txt";
    $tfile = "myfiles/widgets/press-release.tmp";
 }

 //Setup Arrays
 $lines = file($file); $Ads = array(); 

 //Get Ad Desc
 for($c = 0; $c < count($lines); next($lines), $c++){
   $Ad = explode("|",$lines[$c]);
   $Ads[] = $Ad[2];
 }

 //Find & Remove Duplicates
 $handle = fopen($tfile, 'w');
 for($c = 0; $c < count($Ads); next($Ads), $c++){$found = 0;
   for($d = 0; $d < count($lines); next($lines), $d++){ 
     if (strpos(strtolower($lines[$d]), strtolower($Ads[$c])) !== false){$found++;}
   }
   if ($found <= 1){fwrite($handle, $lines[$c]);}
 }
 fclose($handle);

 //Over-write Files 
 if ($type === "class"){
    rename('myfiles/widgets/classified.tmp', 'myfiles/widgets/classified.txt');
 }else{
    rename('myfiles/widgets/press-release.tmp', 'myfiles/widgets/press-release.txt');
 }

 header('Location: sky-classified.php');  

?>