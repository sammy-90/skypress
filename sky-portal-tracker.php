<meta name="robots" content="noindex,nofollow">

<?php

   //Get User Info
   if(!$u){$u = $_GET['u'];}
   if(!$b){$b = $_GET['b'];}
   if(!$c){$c = $_GET['c'];}
   if(!$URL){$URL = $_GET['URL'];}
   if(!$ref){$ref = $_GET['ref'];}
   if(!$IP){$IP = $_SERVER['REMOTE_ADDR'];}

   if($ref == "imp"){
     $handle = fopen("myfiles/widgets/imp.txt", 'a+');
     fwrite($handle, $URL."-".$IP."\r\n");
     fclose($handle);
   }else{
     $match = 0;
     $stable = file('myfiles/portal-members/'.$u.'.php');
     for ($x = 0; $x <= count($stable); $x++) {
       if ((strpos($stable[$x], "$balance") !== false) && (strpos($stable[$x], $c) !== false)){$match++;}
       if ((strpos($stable[$x], "bid") !== false) && (strpos($stable[$x], $b) !== false)){$match++;}
     }

     //Subtract Bid From Balance
     if ($match > 1){
       $c = $c - $b;
       if($c < 0){$c = 0;}
       
       $handle = fopen('myfiles/portal-members/'.$u.'.tmp', 'w');
       foreach($stable as $line){$match2 = 0; 
         if (strpos($line, "balance=") !== false){$match2++; fwrite($handle,'$balance="'.$c.'";'."\r\n");}
         if ($match2 == 0){fwrite($handle, $line);}
       }fclose($handle);

       rename('myfiles/portal-members/'.$u.'.tmp', 'myfiles/portal-members/'.$u.'.php');

     }
     
     $handle = fopen("myfiles/widgets/clicks.txt", 'a+');
     fwrite($handle, $URL."-".$IP."\r\n");
     fclose($handle);
     echo "<script>top.location.href = '$URL';</script>";
   }

?>