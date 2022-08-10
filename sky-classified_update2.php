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
   if (strpos(strtolower($Ad[4]), strtolower("/")) !== false){$Ads[] = explode("/", $Ad[4], 2)[0];}else{$Ads[] = $Ad[4];}
 }

 //Find & Remove Duplicates
 $handle = fopen($tfile, 'w');
 for($c = 0; $c < count($Ads); next($Ads), $c++){$found = 0;
   for($d = 0; $d < count($lines); next($lines), $d++){ 
     if (strpos(strtolower($lines[$d]), strtolower($Ads[$c])) !== false){$found++;}
   }

   //Allow unlimited links from these sites
   if (strpos(strtolower($Ads[$c]), strtolower('youtu.be')) !== false){$found=0;}
   if (strpos(strtolower($Ads[$c]), strtolower('youtube.com')) !== false){$found=0;}
   if (strpos(strtolower($Ads[$c]), strtolower('facebook.com')) !== false){$found=0;}
   if (strpos(strtolower($Ads[$c]), strtolower('twitter.com')) !== false){$found=0;}
   if (strpos(strtolower($Ads[$c]), strtolower('google.com')) !== false){$found=0;}
   if (strpos(strtolower($Ads[$c]), strtolower('clickbank.')) !== false){$found=0;}
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