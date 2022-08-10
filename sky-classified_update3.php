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

 //Get Ad URL
 for($c = 0; $c < count($lines); next($lines), $c++){
   $Ad = explode("|",$lines[$c]);
   $Ads[] = $Ad[3].$Ad[4];
 }

 //Remove Incomplete Ads
 $handle = fopen($tfile, 'w');
 for($c = 0; $c < count($Ads); next($Ads), $c++){;
   if ((strlen($Ads[$c]) > 10) && (strpos(strtolower($Ads[$c]), strtolower(" ")) == false)){fwrite($handle, $lines[$c]);}
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