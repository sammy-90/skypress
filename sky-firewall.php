<?php 

  if($fire_mode == 1){$wall = "../firewall.txt";}else{$wall = "firewall.txt";} 

  if ($_SESSION['login_count'] >= 4){$handle_ip = fopen($wall, 'a+'); fwrite($handle_ip, $_SERVER['REMOTE_ADDR']."\r\n"); fclose($handle_ip);}else{$_SESSION['login_count'] ++;}

  if (file_exists($wall)){

    //Recycle Disc Space
    $maxsize = 1000000;
    if(filesize($wall) > $maxsize){
      $content = file($wall); 
      $hcount = count($content) / 2;
      $f=fopen($wall,'w');
      for($j = $hcount; $j < count($content); next($content), $j++){
        fwrite($f,$content[$j]);
      }fclose($f);
    }

    $fw = file($wall);
    for ($ip = 0; $ip <= count($fw); $ip++) {
      if ($fw[$ip] == $_SERVER['REMOTE_ADDR']."\r\n"){echo "Too many login attempts..."; exit;}
    }

  }

?>

