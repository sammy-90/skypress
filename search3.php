<?php

$i = $_GET['i']; if(!$i){$i = 0;}

if(!isMobile()){echo '<div class="w3-margin-left">';}else{echo '<div class="w3-container">';}

$dh = opendir("./myfiles");
while (($file = readdir($dh)) !== false){
  if ((strpos(strtolower($file), strtolower("txt")) !== false) && (strpos(strtolower($file), strtolower("database")) === false)){

      if($count >= $i){

         if ($word_count > 1){
           if (strpos(strtolower($file), strtolower($NewKeyword)) !== false){
            if (strpos(strtolower($file), strtolower($NewKeyword2)) !== false){$match++;

               //Bold Contents & Cut URL
               $file = str_replace(".txt", "", $file);
               $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
               $site[0] = str_ireplace($patterns, $replacements, $file);
               $Cut_URL = substr($file, 0, 60); 

               echo "<div class='lists'><a href='sky-blog1.php?post=".$file."&page=".$type."' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>"; 
               if ($match >= 15){$i = $count; $i++; echo "</div><br><br>\n"; break;}

               echo "</div><br>\n";  

            }

           }else{

             if (strpos($file, $keyword) !== false){$match++;

               //Bold Contents & Cut URL
               $file = str_replace(".txt", "", $file);
               $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
               $site[0] = str_ireplace($patterns, $replacements, $file);
               $Cut_URL = substr($file, 0, 60); 

               echo "<div class='lists'><a href='sky-blog1.php?post=".$file."&page=".$type."' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>"; 
               if ($match >= 15){$i = $count; $i++; echo "</div><br><br>\n"; break;}

               echo "</div><br>\n";  

             }

           }

         }else{

           if (strpos(strtolower($file), strtolower($keyword)) !== false){$match++;

               //Bold Contents & Cut URL
               $file = str_replace(".txt", "", $file);
               $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
               $site[0] = str_ireplace($patterns, $replacements, $file);
               $Cut_URL = substr($file, 0, 60); 

               echo "<div class='lists'><a href='sky-blog1.php?post=".$file."&page=".$type."' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>"; 
               if ($match >= 15){$i = $count; $i++; echo "</div><br><br>\n"; break;}

               echo "</div><br>\n";  

           }

         }
      


      }

  }

}

closedir($dh);

$table = "SKY";

?>

</div>
