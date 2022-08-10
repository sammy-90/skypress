<?php

  session_start();
  include "sky-password.php";
  if ($_SESSION['password'] !== $your_password){echo "Page Not Found"; exit;}

  //Mode
  $m = $_GET['m'];
  if(!$m){$m=0;}

  //Index
  $i = $_GET['i'];
  if(!$i){$i=0;}

  //Set Variables
  $b=0; $SMy_Index=0; $Output = "na";
  $userAgent = "Sky Crawler 1.8";

  //Zip Table
  function zip_table(){

    global $url;
    global $title;
    global $Output;

     $maxsize = 5000000;  
     clearstatcache();

     //Set Deflaut
     $Output1 = "beta/betabase0.txt"; 
     $Output2 = "beta/betabase2.txt"; 
     $Output3 = "beta/betabase3.txt";

     if(filesize($Output1) <= $maxsize){$Output = $Output1;}else{$Output = $Output2;}
     if(!is_file("beta/database2.txt")){$create = fopen("beta/betabase2.txt", "w");fclose($create);}if(filesize("beta/betabase2.txt") >= $maxsize){$Output = "beta/betabase3.txt";}
     if(!is_file("beta/database3.txt")){$create = fopen("beta/betabase3.txt", "w");fclose($create);}if(filesize("beta/betabase3.txt") >= $maxsize){$Output = "beta/betabase4.txt";}

     echo "<br> Output To: $Output <br>";

  }

//Start Spidering - sky-crawler.php?m=0
if ($m == 0){

   //Delete Old Files
   if(file_exists("beta/Not_Found.txt")){unlink("beta/Not_Found.txt");}
   if(file_exists("beta/betabase1.txt")){unlink("beta/betabase1.txt");}
   if(file_exists("beta/betabase2.txt")){unlink("beta/betabase2.txt");}
   if(file_exists("beta/betabase3.txt")){unlink("beta/betabase3.txt");}

}


//Start Spidering - sky-crawler.php?m=0
if ($m == 1){

    //We found it
    $Find = 0; $kickout = 0;
    $numbers = array('','–','◊','Á','ú','·','È','Ì','Û','˙','‡','Ë','Ï','Ú','˘','‰','Î','Ô','ˆ','¸','ˇ','‚','Í','Ó','Ù','˚','Â','¯','Ê','∂','¿','¡','¬','√','ƒ','«','–','»','…',' ','À','Ã','Õ','Œ','œ','—','“','”','‘','’','÷','Ÿ','⁄','€','‹','›','ê');
   
    //Read URL's
    $sfilename = "beta/crawl_list.txt";

    //Read file into array
    $scontents = file($sfilename);

    //Set Counter
    $SMy_Index = count($scontents)+1;
    $scontents[$i] = str_replace(array("\r", "\r\n", "\n"), '', $scontents[$i]); $target_url = $scontents[$i];

    //Details
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $file = "beta/cookie.txt";
    $header = array(
      'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
      'Accept-Language: en-US,en;q=0.5',
      'Accept-Encoding: deflate, b, php, html, txt',
      'Connection: keep-alive',
      'Upgrade-Insecure-Requests: 1'
    );

    // make the cURL request to $target_url
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_URL,$target_url);
    curl_setopt ($ch, CURLOPT_COOKIEJAR, $file);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //Follow Redirects
    curl_setopt($ch, CURLOPT_VERBOSE, true);      
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, false);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $html= curl_exec($ch);
    curl_close ($ch);

    //If Not Found
    if (!$html) {
      echo "<br><center><big>Host not found</center></big>";
      $yummy = array("https://", "http://", "www.");
      $title = str_replace($yummy, "", $target_url);
      $title = ucfirst($title);
      $url = $target_url;
      zip_table(); $handle = fopen($Output, 'a+'); echo $title.'|'.$url."<br>"; fwrite($handle,$title.'|'.$url.''."\r\n");fclose($handle);
      $handle = fopen("beta/Not_Found.txt", 'a+');
      fwrite($handle,$target_url."\r\n");
      fclose($handle);
      $i++;
    }else{
      $Find++;
    }

  //We Find it!
 if ($Find > 0){

    // parse the html into a DOMDocument
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    // grab all the on the page
    $xpath = new DOMXPath($dom);
    $hrefs = $xpath->evaluate("/html/body//a");

    //Print Writing to file
    echo "<a href='sky-crawler.php?m=6' target='blank' title='Stop Page Loading 1st - Then Refresh After Compression'>Compress</a> - <a href='sky-crawler.php?m=0&i=".++$i."'>Next</a><Big><FONT COLOR='black'> $userAgent Spidering</Big><hr style='color:black'>";

    foreach ($dom->getElementsByTagName('a') as $node){
      $title = $node->nodeValue; $url = $node->getAttribute("href");

      //Upper Accent Blocker
      $kickout = 0;
      foreach($numbers as $key => $value){
        if(($pos = strpos($title,$value)) !== false){$kickout++;}
      }

      //Dirty Filter      
      foreach($Remove_Tags as $key2 => $value2){
        if(($pos2 = strpos(strtolower($title),strtolower($value2))) !== false){$kickout++;}
        if(($pos2 = strpos(strtolower($url),strtolower($value2))) !== false){$kickout++;}
      }

     //Add Extra Time
     set_time_limit(70);

     if ((strpos(strtolower($url), strtolower("#")) === false) && (strpos(strtolower($url), strtolower("@")) === false) && (strpos(strtolower($url), strtolower("javascript:")) === false)){
      if ($kickout == 0){
       if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=¨¬ÿ]/', $title)){
       $title = str_replace(array('<', '>', '|', '&nbsp;', '\\', '//', '/', "'", '"', "\t", "\r", "\r\n", "\n"), '', $title); 
       $title = preg_replace('!\s+!', ' ', $title);
        if (strlen($title) >= 8){$title = substr($title,0,60);
          if (strpos(strtolower($title), strtolower(" ")) !== false){
            if ((strpos(strtolower($url), strtolower("http")) !== false) && (strlen($url) > 3)){

              //Indexing...
              zip_table();
              $handle = fopen($Output, 'a+'); echo $title.'|'.$url."<br>"; fwrite($handle,$title.'|'.$url.''."\r\n");
              fclose($handle);

            }else{
  
              //Adjust For URL Type
              if (substr($url, 0, 2) === '//'){ 
                $url = "http:".$url;
              }else{
                $url = $target_url."/".$url;
                $url = str_replace('//', '/', $url); 
                $url = "http://".$url;
              }

              //Fix URL
              $url = str_replace('http://http:/', 'http://', $url); 
              $url = str_replace('http://http://', 'http://', $url);

              //Indexing...
              zip_table();
              $handle = fopen($Output, 'a+'); echo $title.'|'.$url."<br>"; fwrite($handle,$title.'|'.$url.''."\r\n");
              fclose($handle);

            }
          }
        }

       }
      }
     }
    }

    $i++; 

 }

 sleep(1);
 
}

//Duplicate Removal - sky-crawler.php?m=1
if ($m == 2){
  $lines = file_get_contents('beta/betabase0.txt');
  $lines = explode("\r\n", $lines);
  $unique = array_keys(array_flip($lines));
  $result = array_unique($unique);
  $result = implode("\r\n", $result);
  file_put_contents('beta/betabase0_copy.txt', $result);
  echo "Duplicate Data Removal Done!";
}


//Filter Missing Pages
if ($m == 3){$b = $_GET['b']; if(!$b){$b = -1;};

 //Spider Settings - sky-crawler.php?m=4
 $sfilename = "beta/betabase0_copy.txt";	//Flat File Database
 $Output = "beta/betabase00_copy.txt";	//New Datebase Name

 //Read file into array
 $scontents = file($sfilename); $SMy_Index = count($scontents);

 //Remove Pages With
 $Remove_Tags = array("301", "401", "403", "404", "500", "503", "forbidden", "not found", "cannot be found", "redirect", "de pagina is niet gevonden", "denied", "page does not", "bad request", "account suspended", "oops", "page has moved", "moved permanently", "terms of", "policy", "ê",  "", "–", "◊", "Á","ú","·","È","Ì","Û","˙","‡","Ë","Ï","Ú","˘","‰","Î","Ô","ˆ","¸","ˇ","‚","Í","Ó","Ù","˚","Â","¯","  ","	");
     
 //Clean Database
 $handle = fopen($Output, 'a+');
 for($i = 0; $i <= 10000; $i++){$pass = 0;$b++;
   if($b <= $SMy_Index){
     for($c = 0; $c < count($Remove_Tags); next($Remove_Tags), $c++){
       if  (strlen($scontents[$b]) >= 5){
         if (strpos(strtolower($scontents[$b]), strtolower($Remove_Tags[$c])) === false){$pass++;}  
       }
     }
     if ($pass == count($Remove_Tags)){
       $scontents[$b] = str_replace(array('&nbsp;', "\t", "\r", "\r\n", "\n"), '', $scontents[$b]); 
       fwrite($handle,$scontents[$b]."\r\n");
     }
   }else{break;}
 }

 fclose($handle);
 
 echo "Level 1: Database Cleaning";

}


if ($m == 4){

    $dir_array = array("betabase0","betabase2","betabase3");

      for($i = 0; $i < count($dir_array); next($dir_array), $i++){

        //Add Extra Time
        set_time_limit(230); 

        $DB_Select = "beta/".$dir_array[$i].".txt";
        $lines = file_get_contents($DB_Select);
        $lines = explode("\r\n", $lines);
        $unique = array_keys(array_flip($lines));
        $result = array_unique($unique);
        unlink($DB_Select);

        $handle = fopen($DB_Select, 'a+');
        for($z = 0; $z < count($result); next($result), $z++){
          if ((strpos(strtolower($result[$z]), strtolower("|")) !== false) && (strpos(strtolower($result[$z]), strtolower("http")) !== false)){
            $result[$z] = str_replace(array('&nbsp;', "\t", "\r", "\r\n", "\n"), '', $result[$z]); 
            fwrite($handle,$result[$z]."\r\n");
          }  
        }fclose($handle); echo $DB_Select.": Completed!<br>";

      }set_time_limit(100);

  unlink("beta/betabase0.txt");
  unlink("beta/betabase0_copy.txt");
  rename("beta/betabase00_copy.txt", "beta/betabase1.txt");
  echo "Database Compression & Spidering Done!<br>";
}


//Data compressor - sky-crawler.php?m=6
if ($m == 6){

    $dir_array = array("betabase0","betabase2","betabase3");

      for($i = 0; $i < count($dir_array); next($dir_array), $i++){

        //Add Extra Time
        set_time_limit(230); 

        $DB_Select = "beta/".$dir_array[$i].".txt";
        $lines = file_get_contents($DB_Select);
        $lines = explode("\r\n", $lines);
        $unique = array_keys(array_flip($lines));
        $result = array_unique($unique);
        unlink($DB_Select);

        $handle = fopen($DB_Select, 'a+');
        for($z = 0; $z < count($result); next($result), $z++){
          if ((strpos(strtolower($result[$z]), strtolower("|")) !== false) && (strpos(strtolower($result[$z]), strtolower("http")) !== false)){
            $result[$z] = str_replace(array('&nbsp;', "\t", "\r", "\r\n", "\n"), '', $result[$z]); 
            fwrite($handle,$result[$z]."\r\n");
          }  
        }fclose($handle); echo $DB_Select.": Completed!<br>";

      }

  echo "Duplicate Data Removal Done!";

}

//if ($m == 1){exit;} //debug

?>

<script language="JavaScript">

  var i = <?php echo $i ?>; 
  var b = <?php echo $b ?>; 
  var m = <?php echo $m ?>; 
  var ssitecount = <?php echo $SMy_Index ?>;

  if (m == 0){top.location.href='sky-crawler.php?m=1';}
  if (m == 1){
    if (i <= ssitecount){top.location.href='sky-crawler.php?i=<?php echo $i ?>&m=1';}
      else{top.location.href='sky-crawler.php?m=2'};
  }
  if (m == 2){top.location.href='sky-crawler.php?m=3';}
  if (m == 3){if (b <= ssitecount){top.location.href='sky-crawler.php?m=<?php echo $m ?>&b=<?php echo $b ?>';}else{top.location.href='sky-crawler.php?m=4';}}

</script>