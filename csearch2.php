<div>

<?php

  if ($subsearch == "jpg"){

    //Include API
    if ((file_exists("myfiles/api_images.php")) && ($api_switch == "ON")){
      echo "<div class='lists'>";
        include "myfiles/api_images.php"; $match++;
      echo "</div>";
    }

  }

$i = $_GET['i']; if(!$i){$i = 0;}

$dh = opendir("./myfiles");
while (($file = readdir($dh)) !== false){$count++;
  if (strpos(strtolower($file), strtolower($subsearch)) !== false) {

      if($count >= $i){

         if ($word_count > 1){
           if (strpos(strtolower($file), strtolower($NewKeyword)) !== false){
            if (strpos(strtolower($file), strtolower($NewKeyword2)) !== false){$match++;

               //Show URL  
               if ($subsearch == "jpg"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><a href='myfiles/".$file."' target='blank'><img class='images w3-border w3-round-xxlarge img_adjuster4' src='myfiles/".$file."' border='0'/><br>".$file."</a></div>\n";}
               if ($subsearch == "mp4"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><center><video class='txtinput' width='100%' controls/><source src='myfiles/".$file."' type='video/mp4'></video><br>".$file."</center></div>\n";}
               if ($subsearch == "mp3"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><center><audio class='txtinput' controls/><source src='myfiles/".$file."' type='audio/mp3'/></audio><br>".$file."</center></div>\n";}

               if ($match == 3){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 6){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 9){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 12){echo "<div class='w3-container w3-center'></div>"; }
               if ($match >= 15){$i = $count; $i++; break;}

            }

           }else{

             if (strpos($file, $keyword) !== false){$match++;

               //Show URL  
               if ($subsearch == "jpg"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><a href='myfiles/".$file."' target='blank'><img class='images w3-border w3-round-xxlarge img_adjuster4' src='myfiles/".$file."' border='0'/><br>".$file."</a></div>\n";}
               if ($subsearch == "mp4"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><center><video class='txtinput' width='100%' controls/><source src='myfiles/".$file."' type='video/mp4'></video><br>".$file."</center></div>\n";}
               if ($subsearch == "mp3"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><center><audio class='txtinput' controls/><source src='myfiles/".$file."' type='audio/mp3'/></audio><br>".$file."</center></div>\n";}
 
               if ($match == 3){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 6){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 9){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 12){echo "<div class='w3-container w3-center'></div>"; }
               if ($match >= 15){$i = $count; $i++; break;}

             }

           }

         }else{

           if (strpos(strtolower($file), strtolower($keyword)) !== false){$match++;

               //Show URL  
               if ($subsearch == "jpg"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><a href='myfiles/".$file."' target='blank'><img class='images w3-border w3-round-xxlarge img_adjuster4' src='myfiles/".$file."' border='0'/><br>".$file."</a></div>\n";}
               if ($subsearch == "mp4"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><center><video class='txtinput' width='100%' controls/><source src='myfiles/".$file."' type='video/mp4'></video><br>".$file."</center></div>\n";}
               if ($subsearch == "mp3"){echo "<div class='w3-margin w3-white w3-container w3-quarter'><center><audio class='txtinput' controls/><source src='myfiles/".$file."' type='audio/mp3'/></audio><br>".$file."</center></div>\n";}
                         
               if ($match == 3){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 6){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 9){echo "<div class='w3-container w3-center'></div>"; }
               if ($match == 12){echo "<div class='w3-container w3-center'></div>"; }
               if ($match >= 15){$i = $count; $i++; break;}

           }

         }
      


      }

  }

}

closedir($dh);

//SupremeSearch Feed
if ($search_feed == "ON"){$match++;
  echo '<script>var screentest = (screen.availHeight)-250; document.write(\'<iframe id="myIframe" onload="window.parent.parent.scrollTo(0,0)" src="https://www.supremesearch.net/Search.php?User_Input='.$keyword2.'&sk=on&m='.$m.'&txt='.$footercolor2.'&city='.$city.'&state='.$state.'" marginheight="8" marginwidth="8" frameborder="0" width="100%" height="\'+ screentest +\'px"></iframe>\');</script>';
}else{
  if ($mv_feed == "ON"){
    if(($subsearch == "mp4") || ($subsearch == "mp3")){
      $pagination = "OFF"; $match++;
      echo '<script>var screentest = (screen.availHeight)-250; document.write(\'<iframe id="myIframe" onload="window.parent.parent.scrollTo(0,0)" src="https://www.supremesearch.net/Search.php?User_Input='.$keyword2.'&sk=on&m='.$m.'&txt='.$footercolor2.'" marginheight="8" marginwidth="8" frameborder="0" width="100%" height="\'+ screentest +\'px"></iframe>\');</script>';
    }
  }
}

//If No Matches
if (($search_feed == "OFF") || ($search_feed == "Internal Pages")){
  if($match == 0){

    echo "<div class=\"row\"><div class=\"column column100\">\n"; 
    echo "<div class='lists'><center><b>The search \"$keyword\" did not match any documents</center></b></div>\n"; 
    echo "<br>\n";
    exit;

  }
}

$table = "SKY";

?>

</div>

<style>

  .img_adjuster4{height:185px;}

</style>