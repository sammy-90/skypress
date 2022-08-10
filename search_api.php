<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<?php if (file_exists("myfiles/settings-search.php")){include "myfiles/settings-search.php";}else{echo "Please 'Publish' Your Search Engine... Admin > Application Settings > Search > Publish"; exit; }  ?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<?php

//This Software is (C) Solomon R & Supreme Search Team

$time_start = microtime(true); 

//settings
$csv = "off";
$count = 0;
$match = 0;
$match2 = 0;
$marker = 0;
$Burn_Out = 0; 
$Total_DB = 1;
$ssitecount = 0;
$DB = $_GET['DB'];
$si = $_GET['si']; if(!$si){$si = 0;}
$Page = $_GET['p']; if(!$Page){$Page = 0;} $Page++; 
$keyword = $_GET['User_Input']; $keyword = preg_replace('/[^ \w]+/', '', $keyword); 
if (file_exists("Search2Rank.php")){$Rank = "on"; echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">';}else{$Rank = "off";}

//Get Mode
$m = $_GET['m']; if(!$m){$m = 'web';}

//Crawler
if ($m === "crawl"){

  $dh = opendir(".");

  while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".htm")) !== false){
      $title = str_replace('.html', '', $file); $title = str_replace('.htm', '', $title);
      $title = str_replace('_', ' ', $title); $title = str_replace('-', ' ', $title);
      echo $title."|".$file."<br>";
    }
  }exit;

}

//Crawler2
if ($m === "crawl2"){

  $dh = opendir(".");

  while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".htm")) !== false){
      $page = file_get_contents($file);
      $res = preg_match("/<title>(.*)<\/title>/siU", $page, $title_matches);
        if (!$res){
          $title = str_replace('.html', '', $file); $title = str_replace('.htm', '', $title);
          $title = str_replace('_', ' ', $title); $title = str_replace('-', ' ', $title);
        }else{
          $title = preg_replace('/\s+/', ' ', $title_matches[1]);
          $title = trim($title);
       }
      echo $title."|".$file."<br>";
    }
  }exit;

}

echo '<body class="w3-'.$pagecolor.'">';

?>

<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

/* The content */
.overlay-content {
  position: relative;
  top: 46%;
  width: 80%;
  text-align: center;
  margin-top: 30px;
  margin: auto;
}

/* Style the search field */
.overlay input[type=text] {
  padding: 15px;
  font-size: 17px;
  border: none;
  float: left;
  width: 90%;
  background: white;
}

/* Style the submit button */
.overlay button {
  float: left;
  width: 10%;
  padding: 15px;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.overlay button:hover {
  opacity: 0.5;
}

@media screen and (max-width: 800px) {
  .mytopbar{
    visibility: hidden;
    display: none;
  }
  .overlay input[type=text] {width: 80%;}
  .overlay button {width: 20%;}
}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; scrollbar-width: thin;}

</style>

<script>

function searchLinks1(){
User_Input = document.form.search.value;
top.location.href = "search.php?m=<?php echo $m; ?>&User_Input="+User_Input;
return false;
}

</script>

<a name="Top"></a>
<!-- header -->
<header class="w3-container w3-padding">

<div id="Center_Me" style="display: block; padding: 10px; color:black; width: 100%;">
<center><h1><span class="thin" onclick="location.href='<?php echo $template ?>'" style="cursor: pointer;" title="Go Home"><?php if (file_exists("myfiles/logo.jpg")){echo "<img src='myfiles/logo.jpg' width='150px' border='0'/>";}else{echo $title;} ?></span></h1>
 <div id="myOverlay" class="overlay">
  <div class="overlay-content">
    <form name="form" id="search-form" onSubmit="return searchLinks1()">
      <input class="w3-border" type="text" placeholder="Search.." name="search" value="<?php echo $_GET['User_Input']; ?> " list="passed-searches">
      <button class="w3-border w3-border-<?php echo $footercolor ?> <?php echo 'w3-'.$footercolor.'' ?>" name="Submit" type="submit"><i class="fa fa-search"></i></button>

 <?php
   $maxsize = 5000000;
   if ((file_exists("myfiles/widgets/User.txt")) && (filesize("myfiles/widgets/User.txt") < $maxsize)){
       echo '<datalist id="passed-searches">';
       $lines = array_unique(file("myfiles/widgets/User.txt"));
       for($i = 0; $i < count($lines); next($lines), $i++){
         if (strlen($lines[$i]) > 1){echo '<option value="'.$lines[$i].'">';}
       }
     echo "</datalist>";
   }
  ?>

    </form>
  </div>
</div>
</center>
</div>
 
<div class="w3-container">
<p>
<a href="search.php?m=web&User_Input=<?php echo $keyword?>" class="underthesea1 lists custom_color">Web</a>&emsp;&nbsp;
<a href="search.php?m=image&User_Input=<?php echo $keyword?>" class="underthesea2 lists custom_color">Images</a>&emsp;&nbsp;
<a href="search.php?m=music&User_Input=<?php echo $keyword?>" class="underthesea3 lists custom_color">Music</a>&emsp;&nbsp;
<a href="search.php?m=video&User_Input=<?php echo $keyword?>" class="underthesea4 lists custom_color">Video</a>
</p><hr>
</div>
</header>

<?php 

//No Keyword
if(!$keyword){exit;}

//Stop Errors
$keyword = preg_replace('!\s+!', ' ', $keyword);
if (substr($keyword, -1) === " "){$keyword = substr_replace($keyword, "", -1);}
if (substr($keyword, 0, 1) === " "){$keyword = substr($keyword, 1);}

//Clean Keyword
$keyword = str_replace(array('"', "'"), '', $keyword); 
$word_count = count(explode(" ",$keyword));

//No Results
if ($DB > 10){
  echo "<div class=\"row\"><div class=\"column column100\">\n"; 
  echo "<div class='lists'><center><b>The search \"$keyword\" did not match any documents</center></b></div>\n"; 
  echo "<br>\n";
  exit;
}

if($m == "web"){echo '<style>.underthesea1{text-decoration:underline;}</style>'; }
if($m == "image"){echo '<style>.underthesea2{text-decoration:underline;}</style>'; $subsearch = "jpg"; include "search2.php";}
if($m == "music"){echo '<style>.underthesea3{text-decoration:underline;}</style>'; $subsearch = "mp3"; include "search2.php";}
if($m == "video"){echo '<style>.underthesea4{text-decoration:underline;}</style>'; $subsearch = "mp4"; include "search2.php";}

?>

<div class="w3-container">

<!--Search-->
<div class="w3-container w3-padding w3-half w3-margin-left" style="width:75%">

<?php

  //SET DB
  if(!$DB){$DB = 1;}

  if ($word_count > 1){$SplitKeyword=explode(" ",$keyword); $NewKeyword = $SplitKeyword[$word_count - 1]; $NewKeyword2 = $SplitKeyword[$word_count - 2];}

if($m == "web"){

  //Sponsor
  $stable = "myfiles/sdatabase1.txt";

  if (file_exists($stable)){
    $si = $_GET['si']; if(!$si){$si = 0;}

  $sfilename = fopen ($stable, "r");

    //(PRS) PRE Search System
    while (!feof ($sfilename)){$count++;
      $buffer = fgets($sfilename, 4096); 

      if($count >= $si){

         if ($word_count > 1){
           if (strpos(strtolower($buffer), strtolower($NewKeyword)) !== false){
            if (strpos(strtolower($buffer), strtolower($NewKeyword2)) !== false){$match2++;

                $site = explode("|", $buffer);
                $Cut_URL = substr($site[1], 0, 60);

                //Bold Contents & Cut URL
                $patterns = "$NewKeyword"; $replacements = "<b>$NewKeyword</b>";
                $patterns2 = "$NewKeyword2"; $replacements2 = "<b>$NewKeyword2</b>";
                $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                $site[0] = str_ireplace($patterns2, $replacements2, $site[0]);
                $Cut_URL = substr($site[1], 0, 60);

                //Show URL  
                if (strpos($site[1], ".") !== false){
                  echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                }else{
                  echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                }
 
                echo "</div><br>\n";  

                if ($match2 >= 2){$si = $count; $si++; break;}

            }

           }else{

             if (strpos($buffer, $keyword) !== false){$match2++;

                 $site = explode("|", $buffer); $dim = count($site);
                 $Cut_URL = substr($site[1], 0, 60);

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                 $Cut_URL = substr($site[1], 0, 60);

                 //Show URL  
                 if (strpos($site[1], ".") !== false){
                   echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                 }else{
                   echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                 }

                 echo "</div><br>\n";  

	         if ($match2 >= 2){$si = $count; $si++; break;}

             }

           }

         }else{

           if (strpos(strtolower($buffer), strtolower($keyword)) !== false){$match2++;

               $site = explode("|", $buffer);
               $Cut_URL = substr($site[1], 0, 60);

               //Bold Contents & Cut URL
               $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
               $site[0] = str_ireplace($patterns, $replacements, $site[0]);
               $Cut_URL = substr($site[1], 0, 60);

               //Show URL  
               if (strpos($site[1], ".") !== false){
                 echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
               }else{
                 echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
               }

               echo "</div><br>\n";  

              if ($match2 >= 2){$si = $count; $si++; break;}

           }

         }
      }


    }fclose ($sfilename);

  }


  //ppc search
  $stable = "myfiles/portal-members/ppc.txt";

  if (file_exists($stable)){
    $ti = $_GET['ti']; if(!$ti){$ti = 0;}

  $sfilename = fopen ($stable, "r");

    //(PRS) PRE Search System
    while (!feof ($sfilename)){$count++;
      $buffer = fgets($sfilename, 4096); 

      if($count >= $ti){

         if ($word_count > 1){
           if (strpos(strtolower($buffer), strtolower($NewKeyword)) !== false){
            if (strpos(strtolower($buffer), strtolower($NewKeyword2)) !== false){$match3++;

               //Show URL START
 	       $site = explode("|", $buffer);
               $adwords =  substr($site[4], 0, -7);
               if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}

               if ($balance > 0){$match3++;

                 //Bold Contents & Cut URL
                 $patterns = "$NewKeyword"; $replacements = "<b>$NewKeyword</b>";
                 $patterns2 = "$NewKeyword2"; $replacements2 = "<b>$NewKeyword2</b>";
                 $site[3] = str_ireplace($patterns, $replacements, $site[3]);
                 $site[3] = str_ireplace($patterns2, $replacements2, $site[3]);
                 $Cut_URL = substr($site[2], 0, 60);

                 //Print Results
                 echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
                 $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
                 $bypass = $adwords;
                 echo "</div><br>\n";
               }else{$bypass = $adwords;}
               //Show URL END

	       if ($match3 >= 2){$ti = $count; $ti++; break;}

            }

           }else{

             if (strpos($buffer, $keyword) !== false){$match3++;

               //Show URL START
 	       $site = explode("|", $buffer);
               $adwords =  substr($site[4], 0, -7);
               if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}

               if ($balance > 0){$match3++;

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[3] = str_ireplace($patterns, $replacements, $site[3]);
                 $Cut_URL = substr($site[2], 0, 60);

                 //Print Results
                 echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
                 $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
                 $bypass = $adwords;
                 echo "</div><br>\n";
               }else{$bypass = $adwords;}
               //Show URL END 

	       if ($match3 >= 2){$ti = $count; $ti++; break;}

             }

           }

         }else{

           if (strpos(strtolower($buffer), strtolower($keyword)) !== false){

               //Show URL START
 	       $site = explode("|", $buffer);
               $adwords =  substr($site[4], 0, -7);
               if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}

               if ($balance > 0){$match3++;

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[3] = str_ireplace($patterns, $replacements, $site[3]);
                 $Cut_URL = substr($site[2], 0, 60);

                 //Print Results
                 echo "<div class='lists w3-padding w3-round w3-card'"; if(!isMobile()){echo "style='width:50%'";}else{echo "style='width:100%'";} echo ">";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
                 $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
                 $bypass = $adwords;
                 echo "</div><br>\n";
               }else{$bypass = $adwords;}
               //Show URL END
  

             if ($match3 >= 2){$ti = $count; $ti++; break;}

           }

         }
      }


    }fclose ($sfilename);

  }

}

  //Internal Web Search
  if($m == "web"){if ($search_feed == "Internal Pages"){$m == "txt"; include "search3.php";}

    //SupremeSearch Feed
    if ($search_feed == "ON"){$match++; echo '<iframe id="myIframe" onmouseover="scrollit()" onmouseout="hideit()" src="https://www.supremesearch.net/Search_api.php?User_Input='.$keyword.'" marginheight="8" marginwidth="8" frameborder="0" width="100%" height="1000px"></iframe>';}

    //Include API
    if ((file_exists("myfiles/api.php")) && ($api_switch == "ON")){
      echo "<div class='lists'>";
        include "myfiles/api.php"; $match++;
      echo "</div>";
    }

  }

?>

</div>
<!--Search-->

 <?php

  //Next Database
  if ($match < 15){$i = 0; $DB++;}
  if (($match == 0) && ($match2 == 0)){echo "<h1><b>Searching Database $DB ...</b></h1>"; $i = 0; $DB++;}
 
 ?>


  <?php 

    if(!isMobile()){echo '<div class="w3-container w3-rest w3-padding">';}else{echo '<div class="w3-container w3-padding">';}

      if($m == "web"){

  $si = 0;
  $ti = 0;
  $match2 = 0;
  $match3 = 0;
  $word_count = count(explode(" ",$keyword));

  if ($word_count > 1){$SplitKeyword=explode(" ",$keyword); $NewKeyword = $SplitKeyword[$word_count - 1]; $NewKeyword2 = $SplitKeyword[$word_count - 2];}

  //Sponsor
  $stable = "myfiles/sdatabase1.txt";

  if (file_exists($stable)){
    $si = $_GET['si']; if(!$si){$si = 0;}

    $sfilename = fopen ($stable, "r");

    //(PRS) PRE Search System
    while (!feof ($sfilename)){$count++;
      $buffer = fgets($sfilename, 4096); 

      if($count >= $si){

         if ($word_count > 1){
           if (strpos(strtolower($buffer), strtolower($NewKeyword)) !== false){
            if (strpos(strtolower($buffer), strtolower($NewKeyword2)) !== false){$match2++;

                $site = explode("|", $buffer);
                $Cut_URL = substr($site[1], 0, 60);

                //Bold Contents & Cut URL
                $patterns = "$NewKeyword"; $replacements = "<b>$NewKeyword</b>";
                $patterns2 = "$NewKeyword2"; $replacements2 = "<b>$NewKeyword2</b>";
                $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                $site[0] = str_ireplace($patterns2, $replacements2, $site[0]);
                $Cut_URL = substr($site[1], 0, 60);

                //Show URL  
                if (strpos($site[1], ".") !== false){
                  echo "<div class='w3-border w3-padding'>Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                }else{
                  echo "<div class='w3-border w3-padding'>Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                }
 
                echo "</div>\n";  

                if ($match2 >= 6){$si = $count; $si++; break;}

            }

           }else{

             if (strpos($buffer, $keyword) !== false){$match2++;

                 $site = explode("|", $buffer); $dim = count($site);
                 $Cut_URL = substr($site[1], 0, 60);

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                 $Cut_URL = substr($site[1], 0, 60);

                 //Show URL  
                 if (strpos($site[1], ".") !== false){
                   echo "<div class='w3-border w3-padding'>Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                 }else{
                   echo "<div class='w3-border w3-padding'>Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                 }

                 echo "</div>\n";  

	         if ($match2 >= 6){$si = $count; $si++; break;}

             }

           }

         }else{

           if (strpos(strtolower($buffer), strtolower($keyword)) !== false){$match2++;

               $site = explode("|", $buffer);
               $Cut_URL = substr($site[1], 0, 60);

               //Bold Contents & Cut URL
               $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
               $site[0] = str_ireplace($patterns, $replacements, $site[0]);
               $Cut_URL = substr($site[1], 0, 60);

               //Show URL  
               if (strpos($site[1], ".") !== false){
                 echo "<div class='w3-border w3-padding'>Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
               }else{
                 echo "<div class='w3-border w3-padding'>Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
               }

               echo "</div>\n";  

              if ($match2 >= 6){$si = $count; $si++; break;}

           }

         }
      }


    }fclose ($sfilename);

  }


  //ppc search
  $stable = "myfiles/portal-members/ppc.txt";

  if (file_exists($stable)){
    $ti = $_GET['ti']; if(!$ti){$ti = 0;}

  $sfilename = fopen ($stable, "r");

    //(PRS) PRE Search System
    while (!feof ($sfilename)){$count++;
      $buffer = fgets($sfilename, 4096); 

      if($count >= $ti){

         if ($word_count > 1){
           if (strpos(strtolower($buffer), strtolower($NewKeyword)) !== false){
            if (strpos(strtolower($buffer), strtolower($NewKeyword2)) !== false){$match3++;

               //Show URL START
 	       $site = explode("|", $buffer);
               $adwords =  substr($site[4], 0, -7);
               if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}

               if ($balance > 5){$match3++;

                 //Bold Contents & Cut URL
                 $patterns = "$NewKeyword"; $replacements = "<b>$NewKeyword</b>";
                 $patterns2 = "$NewKeyword2"; $replacements2 = "<b>$NewKeyword2</b>";
                 $site[3] = str_ireplace($patterns, $replacements, $site[3]);
                 $site[3] = str_ireplace($patterns2, $replacements2, $site[3]);
                 $Cut_URL = substr($site[2], 0, 60);

                 //Print Results
                 echo "<div class='w3-border w3-padding'>";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
                 $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
                 $bypass = $adwords;
                 echo "</div>\n";
               }else{$bypass = $adwords;}
               //Show URL END

            }

           }else{

             if (strpos($buffer, $keyword) !== false){$match3++;

               //Show URL START
 	       $site = explode("|", $buffer);
               $adwords =  substr($site[4], 0, -7);
               if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}

               if ($balance > 0){$match3++;

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[3] = str_ireplace($patterns, $replacements, $site[3]);
                 $Cut_URL = substr($site[2], 0, 60);

                 //Print Results
                 echo "<div class='w3-border w3-padding'>";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
                 $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
                 $bypass = $adwords;
                 echo "</div>\n";
               }else{$bypass = $adwords;}
               //Show URL END 

	       if ($match3 >= 6){$ti = $count; $ti++; break;}

             }

           }

         }else{

           if (strpos(strtolower($buffer), strtolower($keyword)) !== false){

               //Show URL START
 	       $site = explode("|", $buffer);
               $adwords =  substr($site[4], 0, -7);
               if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}

               if ($balance > 0){$match3++;

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[3] = str_ireplace($patterns, $replacements, $site[3]);
                 $Cut_URL = substr($site[2], 0, 60);

                 //Print Results
                 echo "<div class='w3-border w3-padding'>";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
                 $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
                 $bypass = $adwords;
                 echo "</div>\n";
               }else{$bypass = $adwords;}
               //Show URL END
  
               if ($match3 >= 6){$ti = $count; $ti++; break;}  

           }

         }
      }


    }fclose ($sfilename);

  }

  //Zero Matches
  if (($match3 == 0) && ($match2 == 0) && ($advertisers=="Show")){
      echo "<div class='w3-border w3-padding'><a href='sky-portal2.php?openn=join_now'><big class='custom_color'>Advertisement</big></a><br><FONT COLOR='#008000' class='custom_tc'>Your Ad Here</FONT></a></div><br>";
  }  

if (strlen($ads_code)>3){
echo '<div class="w3-card-4 mytopbar">';
echo '<header class="w3-container w3-';if ($login == "on"){echo $user_color;}else{echo $footercolor;}echo '">';
echo '<big class="custom_tc">Advertisement</big>';
echo '</header>';
echo '<div class="w3-container w3-'.$panelcolor.'">';
echo '<center>'.$ads_code.'</center>';
echo '</div>';
echo '</div><br>';
}

      }           

?>

  </div>

</div>


<script language="JavaScript">
 var match = <?php echo $match ?>;
 var match2 = <?php echo $match2 ?>;
   if ((match == 0) && (match2 == 0)){Next();} //Auto Search Next Database
     function Next(){top.location.href='search_api.php?m=<?php echo $m ?>&User_Input=<?php echo $keyword?>&i=<?php echo $i?>&si=<?php echo $si?>&DB=<?php echo $DB?>&p=<?php echo $Page ?>';}

 function scrollit(){
   var elem = document.getElementById("myIframe");
   elem.frameBorder = "0";
   elem.scrolling = "yes";
   document.body.appendChild(iframe);
 }

 function hideit(){
   var elem = document.getElementById("myIframe");
   elem.frameBorder = "0";
   elem.scrolling = "no";
   document.body.appendChild(iframe);
 }

</script>

<div class="w3-container">

  <div class="w3-container w3-half">
   <p>
    <headtext2 class="lists custom_tc">
    <?php echo "Page ".$Page.") &#8195;".number_format(microtime(true) - $time_start, 2)." sec" ?>
    </headtext2>
   </p>
  </div>
  <div class="w3-container w3-half">
   <p class="w3-right">
    <FORM>
      <INPUT class="w3-button <?php echo 'w3-'.$footercolor ?>" TYPE="BUTTON" VALUE="< Back" ONCLICK="history.go(-1)">
      <INPUT class="w3-button <?php echo 'w3-'.$footercolor ?>" TYPE="BUTTON" VALUE="Top" ONCLICK="top.location.href='#Top';">
      <input class="w3-button <?php echo 'w3-'.$footercolor ?>" type="button" VALUE="Next >" OnClick="Next()"> 
    </FORM>
   </p>
  </div>

</div>

<!-- Footer -->
<footer class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-margin-top">
  <div class="w3-container w3-half">
    <?php include "sky-links.php"; ?>
 </div>
  <div class="w3-container w3-half mytopbar"><p class="w3-right lists">&#169; <?php echo date("Y"); echo " ".$footertext ?></p></div>
</footer>

<?php if ($search_feed == "ON"){echo '<script>hideit();</script>';} ?>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>