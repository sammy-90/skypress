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
$mode = $_GET['mode'];
$si = $_GET['si']; if(!$si){$si = 0;}
$Page = $_GET['p']; if(!$Page){$Page = 0;} $Page++; 
$keyword2 = str_replace(array('$', '"'), ' ', $_GET['User_Input']);
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
  border-top-left-radius: 25px; 
  border-bottom-left-radius: 25px;
}

.overlay input[type=text]:focus {
        outline: none;
    }

/* Style the submit button */
.overlay button {
  float: left;
  width: 10%;
  padding: 15px;
  font-size: 17px;
  border: none;
  cursor: pointer;
  border-top-right-radius: 25px; 
  border-bottom-right-radius: 25px;
}

.overlay button:hover {
  opacity: 0.5;
}

.mydown{display: inline;}

@media screen and (max-width: 800px) {
  .mytopbar, .mysidebar{
    visibility: hidden;
    display: none;
  }
  .overlay input[type=text] {width: 80%;}
  .overlay button {width: 20%;}
}

div.scroll {
  width: 100%;
  overflow: auto;
  white-space: nowrap;
}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; scrollbar-width: thin;}

/* Style the search field */
.classcity{
  width: 100px;
  background: white; 
  border-radius: 5px;
}

/* Style the search field */
.classstate {
  width: 100px;
  background: white; 
  border-radius: 5px;
}

.dropdown-content{display:none;}

</style>

<script>

function searchLinks1(){
User_Input = document.form.search.value;
top.location.href = "search.php?m=<?php echo $m; ?>&User_Input="+User_Input+"&city="+document.form.mycity.value+"&state="+document.form.mystate.value;
return false;
}

</script>

<div class="w3-container" style="position: absolute;left:0">

  <?php
  if(!isMobile()){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button w3-'.$pagecolor.'"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
  }else{
    echo '<div class="w3-dropdown-click">';
    echo '<button class="w3-button w3-'.$pagecolor.'" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
  }
  ?>
    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border <?php echo 'w3-'.$footercolor ?> w3-animate-zoom">
      <?php include "sky-menu.php"; ?>
    </div>
  </div>
    
  <?php echo "<b>".$title."</b>"; ?>
 
</div>

<div class="w3-container mytopbar" style="position: absolute;right:0">

<?php
  include "myfiles/settings-menu.php"; 
  echo '<div class="w3-dropdown-hover"></div>';
  if($menut1){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut1.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$footercolor.'">';
    if($link1){echo '<a href="'.$link2.'" class="w3-bar-item w3-button">'.$link1.'</a>';}
    if($link4){echo '<a href="'.$link4.'" class="w3-bar-item w3-button">'.$link3.'</a>';}
    if($link6){echo '<a href="'.$link6.'" class="w3-bar-item w3-button">'.$link5.'</a>';}
    if($link8){echo '<a href="'.$link8.'" class="w3-bar-item w3-button">'.$link7.'</a>';}
    if($link10){echo '<a href="'.$link10.'" class="w3-bar-item w3-button">'.$link9.'</a>';}
    echo '</div>';
    echo '</div>';
  }
  if($menut2){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut2.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$footercolor.'">';
    if($link12){echo '<a href="'.$link12.'" class="w3-bar-item w3-button">'.$link11.'</a>';}
    if($link14){echo '<a href="'.$link14.'" class="w3-bar-item w3-button">'.$link13.'</a>';}
    if($link16){echo '<a href="'.$link16.'" class="w3-bar-item w3-button">'.$link15.'</a>';}
    if($link18){echo '<a href="'.$link18.'" class="w3-bar-item w3-button">'.$link17.'</a>';}
    if($link20){echo '<a href="'.$link20.'" class="w3-bar-item w3-button">'.$link19.'</a>';}
    echo '</div>';
    echo '</div>';
  }
  if($menut3){
    echo '<div class="w3-dropdown-hover" style="width:100px">';
    echo '<button class="w3-button">'.$menut3.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$footercolor.'">';
    if($link22){echo '<a href="'.$link22.'" class="w3-bar-item w3-button">'.$link21.'</a>';}
    if($link24){echo '<a href="'.$link24.'" class="w3-bar-item w3-button">'.$link23.'</a>';}
    if($link26){echo '<a href="'.$link26.'" class="w3-bar-item w3-button">'.$link25.'</a>';}
    if($link28){echo '<a href="'.$link28.'" class="w3-bar-item w3-button">'.$link27.'</a>';}
    if($link30){echo '<a href="'.$link30.'" class="w3-bar-item w3-button">'.$link29.'</a>';}
    echo '</div>';
    echo '</div>';
  }
?>

</div>
<script>
function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

<a name="Top"></a>
<!-- header -->
<header class="w3-container w3-padding">

<div id="Center_Me" style="display: block; padding:20px; color:black; width: 100%;"><br>

<div class="w3-container w3-padding mytopbar" style="z-index: -1;position: absolute;left:0px;top:40px">
<?php if (file_exists("myfiles/logo.jpg")){echo "<img src='myfiles/logo.jpg' width='125px' border='0'/>";} ?>
</div>

<div id="myOverlay" class="overlay">
  <div class="overlay-content">
    <form name="form" id="search-form" onSubmit="return searchLinks1()">
      <input class="w3-border" type="text" placeholder="Search.." name="search" value="<?php echo $_GET['User_Input']; ?> " list="passed-searches">
      <button class="w3-border w3-border-<?php echo $footercolor ?> <?php echo 'w3-'.$footercolor.'' ?>" name="Submit" type="submit"><i class="fa fa-search"></i></button>
  </div>
</div>
</center>
</div>
 
<div class="w3-container <?php if(isMobile()){echo 'w3-center';}?>">
<p>
<div class="scrollmenu">
<?php
include "GEO_Access.php";
if ($mode != "dir"){
  echo "<div class='scroll'>";
  echo '<a href="search.php?m=web&User_Input='.$keyword2.'&city='.$city.'&state='.$state.'" class="underthesea1 lists custom_color">Web</a>&emsp;&nbsp;';
  echo '<a href="search.php?m=image&User_Input='.$keyword2.'" class="underthesea2 lists custom_color">Images</a>&emsp;&nbsp;';
  echo '<a href="search.php?m=music&User_Input='.$keyword2.'" class="underthesea3 lists custom_color">Music</a>&emsp;&nbsp;';
  echo '<a href="search.php?m=video&User_Input='.$keyword2.'" class="underthesea4 lists custom_color">Video</a>&emsp;&nbsp;';
  echo '<a href="search.php?m=news&User_Input='.$keyword2.'" class="underthesea5 lists custom_color">News</a>&emsp;&nbsp;';
  echo '<a href="search.php?m=estate&User_Input='.$keyword2.'&city='.$city.'&state='.$state.'" class="underthesea6 lists custom_color">Real Estate</a>&emsp;&nbsp;';
  echo '<a href="search.php?m=books&User_Input='.$keyword2.'" class="underthesea7 lists custom_color">Books</a>&emsp;&nbsp;';
}
echo '<a href="#" id="mydown" onclick="document.getElementById(\'myDropdown\').style.display=\'block\'; document.getElementById(\'mydown\').style.display=\'none\';  document.getElementById(\'myup\').style.display=\'inline\'">Settings <i class="fa fa-sort-down shadow" aria-hidden="true"></i></a>';
echo '<a href="#" id="myup" onclick="document.getElementById(\'myDropdown\').style.display=\'none\'; document.getElementById(\'mydown\').style.display=\'inline\'; document.getElementById(\'myup\').style.display=\'none\'" style="display:none">Settings <i class="fa fa-sort-up shadow" aria-hidden="true"></i></a>';
echo '</div>';

echo '<div id="myDropdown" class="dropdown-content"><br>';
  echo '&nbsp;<a href="#" onclick="geoupdate()" class="shadow">Location</a>&emsp;&nbsp;'; 
  echo "<input type='text' placeholder=' City' class='classcity w3-border w3-".$pagecolor."' id='mycity' name='mycity' value='".$city."' style='display:inline'>&nbsp;<input type='text' placeholder=' State' class='classstate w3-border w3-".$pagecolor."' id='mystate' name='mystate' value='".$state."' style='display:inline'>";
echo '</div>';
?>
</form>
</div>
</p><hr class="w3-<?php echo $footercolor ?>" style="height: 3px; border: 0;">
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
if ($DB > $Total_DB){
  echo "<div class=\"row\"><div class=\"column column100\">\n"; 
  echo "<div class='lists'><center><b>The search \"$keyword\" did not match any documents</center></b></div>\n"; 
  echo "<br>\n";
  exit;
}else{
  include "";
}

?>

<div class="w3-container">

<!--Search-->

<?php

  if(!isMobile()){echo '<div class="w3-container w3-padding w3-threequarter w3-margin-left" style="width:75%">';}else{echo '<div class="w3-container w3-padding w3-half" style="width:100%">';}

  //SET DB
  if(!$DB){$DB = 1;}

  if($m == "web"){echo '<style>.underthesea1{text-decoration:underline;}</style>'; }
  if($m == "image"){echo '<style>.underthesea2{text-decoration:underline;}</style>'; $subsearch = "jpg"; include "search2.php";}
  if($m == "music"){echo '<style>.underthesea3{text-decoration:underline;}</style>'; $subsearch = "mp3"; include "search2.php";}
  if($m == "video"){echo '<style>.underthesea4{text-decoration:underline;}</style>'; $subsearch = "mp4"; include "search2.php";}
  if($m == "news"){echo '<style>.underthesea5{text-decoration:underline;}</style>'; include "search2.php";}
  if($m == "estate"){echo '<style>.underthesea6{text-decoration:underline;}</style>'; include "search2.php";}
  if($m == "books"){echo '<style>.underthesea7{text-decoration:underline;}</style>'; include "search2.php";}

  if ($word_count > 1){$SplitKeyword=explode(" ",$keyword); $NewKeyword = $SplitKeyword[$word_count - 1]; $NewKeyword2 = $SplitKeyword[$word_count - 2];}

//Search2.php?User_Input=reset&m=reset&pw=@1234
//Search2.php?User_Input=reset&m=reset&pw=@1234&DB=2
if ($m === "reset"){include "sky-password.php";

 if($_GET['pw'] == $your_password){

  $table = "beta/database".$DB.".txt"; 
  if (!file_exists($table)){echo "<div class='lists'>$table Not Found: Skyline Search</div>"; exit;}
  $filename = fopen ($table, "r");

  //writing
  $db = substr($table, 0, -4);
  $writing = fopen($db.'.tmp', 'w');

    while (!feof ($filename)){
      $buffer = fgets($filename, 4096); 
      $buffer = str_replace("\r\n", "", $buffer);
      $site = explode("|", $buffer);

        if (strpos($buffer, "|") !== false){

          if (strpos($site[1], ".") !== false){
            $uplink = $site[0].'|'.$site[1];
          }else{
            $uplink = $site[0].'|'.$site[1].'|'.$site[2];
          }

          //REC
          fputs($writing, $uplink."\r\n");

        }else{

          $uplink = $buffer; 
          fputs($writing, $uplink."\r\n");

        }
  
       //Add Extra Time
       set_time_limit(30); 

    }

    //Delete Logfile
    unlink("Search2Rank.txt");

    //Reset & Overwrite
    fclose($filename); fclose($writing);
    rename($db.'.tmp', $db.'.txt'); echo "User Ratings Deleted"; exit;

 }

}


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

   //(DP) Dual Processor - Regular Search
   $i = $_GET['i']; if(!$i){$i = 0;}

  //Database Select
  if($DB == 1){$handle = fopen("myfiles/widgets/User.txt", 'a+'); fwrite($handle, $keyword."\r\n"); fclose($handle);

    $Output1 = "beta/database1.txt"; if (file_exists("beta/betabase".$DB.".txt")){$Output1 = "beta/betabase".$DB.".txt";}

    $table = $Output1; 

  }else{$table = "beta/database".$DB.".txt"; if (file_exists("beta/betabase".$DB.".txt")){$table = "beta/betabase".$DB.".txt";}}


  //Check table
  if (!file_exists($table)){$table = str_replace(".txt",".csv",$table); $csv = "on"; echo "<table>"; }


  $filename = fopen ($table, "r");

    //(PRS) PRE Search System
    while (!feof ($filename)){$count++;
      $buffer = fgets($filename, 4096); 

      if($count >= $i){

         if ($word_count > 1){
           if (strpos(strtolower($buffer), strtolower($NewKeyword)) !== false){
            if (strpos(strtolower($buffer), strtolower($NewKeyword2)) !== false){$match++;

              if($csv == "off"){ 

                $site = explode("|", $buffer); $dim = count($site);
                $Cut_URL = substr($site[1], 0, 60);

                //Bold Contents & Cut URL
                $patterns = "$NewKeyword"; $replacements = "<b>$NewKeyword</b>";
                $patterns2 = "$NewKeyword2"; $replacements2 = "<b>$NewKeyword2</b>";
                $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                $site[0] = str_ireplace($patterns2, $replacements2, $site[0]);
                $Cut_URL = substr($site[1], 0, 60);

                //Show URL  
                if (strpos($site[1], ".") !== false){
                  echo "<div class='lists'><a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                  $uplink = $site[0].'|'.$site[1];
                }else{
                  echo "<div class='lists'><a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                  $uplink = $site[0].'|'.$site[1].'|'.$site[2];
                }

               if(($Rank == "on") && ($dim > 1)){
                 $ip = $_SERVER['REMOTE_ADDR'];
                 $uplink = strip_tags($uplink);
                 if (preg_match("/[a-z]/i", $site[$dim-2])){$up = 0;}else{$up = $site[$dim-2];}
                 if (preg_match("/[a-z]/i", $site[$dim-1])){$down = 0;}else{$down = $site[$dim-1];}
                 $nup = $up + 1; $ndown = $down + 1;
                 echo '<br><a href="Search2Rank.php?r='.$uplink.'|'.$nup.'|'.$down.'&db='.$table.'&ip='.$ip.'" title="I like this"><FONT COLOR="blue"><i class="fa fa-thumbs-up"></i>&nbsp;'.$up.'</a></font>&nbsp;<a href="Search2Rank.php?r='.$uplink.'|'.$up.'|'.$ndown.'&db='.$table.'&ip='.$ip.'" title="I dislike this"><FONT COLOR="blue"><i class="fa fa-thumbs-down"></i>&nbsp;'.$down.'</a></FONT>';
               }
 
                echo "</div><br>\n";  

              }else{

                //CSV MODE
                $site = str_replace(",","</th><th>",$buffer);
                echo "<tr>";
                echo "<th>".$site."</th>";
                echo "</tr>";

              }

              if ($match >= 15){$i = $count; $i++; echo "</div><br>\n"; break;}

            }

           }else{

             if (strpos($buffer, $keyword) !== false){$match++;

               if($csv == "off"){ 

                 $site = explode("|", $buffer); $dim = count($site);
                 $Cut_URL = substr($site[1], 0, 60);

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                 $Cut_URL = substr($site[1], 0, 60);

                 //Show URL  
                 if (strpos($site[1], ".") !== false){
                   echo "<div class='lists'><a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                   $uplink = $site[0].'|'.$site[1];
                 }else{
                   echo "<div class='lists'><a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                   $uplink = $site[0].'|'.$site[1].'|'.$site[2];
                 }

                 if(($Rank == "on") && ($dim > 1)){
                   $ip = $_SERVER['REMOTE_ADDR'];
                   $uplink = strip_tags($uplink);
                   if (preg_match("/[a-z]/i", $site[$dim-2])){$up = 0;}else{$up = $site[$dim-2];}
                   if (preg_match("/[a-z]/i", $site[$dim-1])){$down = 0;}else{$down = $site[$dim-1];}
                   $nup = $up + 1; $ndown = $down + 1;
                   echo '<br><a href="Search2Rank.php?r='.$uplink.'|'.$nup.'|'.$down.'&db='.$table.'&ip='.$ip.'" title="I like this"><FONT COLOR="blue"><i class="fa fa-thumbs-up"></i>&nbsp;'.$up.'</a></font>&nbsp;<a href="Search2Rank.php?r='.$uplink.'|'.$up.'|'.$ndown.'&db='.$table.'&ip='.$ip.'" title="I dislike this"><FONT COLOR="blue"><i class="fa fa-thumbs-down"></i>&nbsp;'.$down.'</a></FONT>';
                 }
 
                 echo "</div><br>\n";  

               }else{

                 //CSV MODE
                 $site = str_replace(",","</th><th>",$buffer);
                 echo "<tr>";
                 echo "<th>".$site."</th>";
                 echo "</tr>";

               }

	       if ($match >= 15){$i = $count; $i++; echo "</div><br>\n"; break;}

             }

           }

         }else{

           if (strpos(strtolower($buffer), strtolower($keyword)) !== false){$match++;

             if($csv == "off"){ 

               $site = explode("|", $buffer); $dim = count($site);
               $Cut_URL = substr($site[1], 0, 60);

               //Bold Contents & Cut URL
               $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
               $site[0] = str_ireplace($patterns, $replacements, $site[0]);
               $Cut_URL = substr($site[1], 0, 60);

               //Show URL  
               if (strpos($site[1], ".") !== false){
                 echo "<div class='lists'><a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                 $uplink = $site[0].'|'.$site[1];
               }else{
                 echo "<div class='lists'><a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                 $uplink = $site[0].'|'.$site[1].'|'.$site[2];
               }

               if(($Rank == "on") && ($dim > 1)){
                 $ip = $_SERVER['REMOTE_ADDR'];
                 $uplink = strip_tags($uplink);
                 if (preg_match("/[a-z]/i", $site[$dim-2])){$up = 0;}else{$up = $site[$dim-2];}
                 if (preg_match("/[a-z]/i", $site[$dim-1])){$down = 0;}else{$down = $site[$dim-1];}
                 $nup = $up + 1; $ndown = $down + 1;
                 echo '<br><a href="Search2Rank.php?r='.$uplink.'|'.$nup.'|'.$down.'&db='.$table.'&ip='.$ip.'" title="I like this"><FONT COLOR="blue"><i class="fa fa-thumbs-up"></i>&nbsp;'.$up.'</a></font>&nbsp;<a href="Search2Rank.php?r='.$uplink.'|'.$up.'|'.$ndown.'&db='.$table.'&ip='.$ip.'" title="I dislike this"><FONT COLOR="blue"><i class="fa fa-thumbs-down"></i>&nbsp;'.$down.'</a></FONT>';
               }
 
               echo "</div><br>\n";  

             }else{

               //CSV MODE
               $site = str_replace(",","</th><th>",$buffer);
               echo "<tr>";
               echo "<th>".$site."</th>";
               echo "</tr>";

             }

             if ($match >= 15){$i = $count; $i++; echo "</div><br>\n"; break;}

           }

         }
      }


    }fclose ($filename);

    if($csv == "on"){
      echo "</table>";
      echo "<style>";
      echo "table {";
      echo "font-family: arial, sans-serif;";
      echo "border-collapse: collapse;";
      echo "background-color: white;";
      echo "border-radius:7px;";
      echo "-moz-border-radius:7px;";
      echo "width: 100%;";
      echo "}";
      echo "td, th {";
      echo "text-align: left;";
      echo "padding: 7px;";
      echo "}";
      echo "tr:nth-child(even) {";
      echo "background-color: #dddddd;";
      echo "}";
      echo "</style>";
    }

}

  //Internal Web Search
  if($m == "web"){if ($search_feed == "Internal Pages"){$m == "txt"; include "search3.php";}

    //SupremeSearch Feed
    if ($search_feed == "ON"){$match++; 
      if(ismobile()){
        echo '<iframe id="myIframe" onload="window.parent.parent.scrollTo(0,0)" onmouseover="scrollit()" onmouseout="hideit()" src="https://www.supremesearch.net/Search.php?User_Input='.$keyword2.'&sk=on&txt='.$footercolor.'&city='.$city.'&state='.$state.'" marginheight="8" marginwidth="8" frameborder="0" width="100%" height="1500px"></iframe>';
        //echo '<br><br><button onclick="myFunction()" class="w3-'.$footercolor.'">More</button><button onclick="myFunction2()" class="w3-'.$footercolor.'">Less</button><br><br>';
        //echo '<script>';
        //echo 'var dheight = 1500; function myFunction() {dheight=(dheight+750); document.getElementById("myIframe").height = dheight+"px";}';
        //echo 'var dheight = 1500; function myFunction2() {dheight=(dheight-750); document.getElementById("myIframe").height = dheight+"px";}';
        //echo '</script>';
      }else{


  
//echo '<iframe src="https://www.supremesearch.net/Search.php?User_Input='.$keyword.'&sk=on" onload="this.insertAdjacentHTML(\'afterend\', (this.contentDocument.body||this.contentDocument).innerHTML);this.remove()"></iframe>';
        echo '<iframe id="myIframe" onload="window.parent.parent.scrollTo(0,0)" onmouseover="scrollit()" onmouseout="hideit()" src="https://www.supremesearch.net/Search.php?User_Input='.$keyword2.'&sk=on&txt='.$footercolor.'&city='.$city.'&state='.$state.'" marginheight="8" marginwidth="8" frameborder="0" width="1280px"height="1000px"></iframe>';
   

      }
    }


 
    //Include API
    if ((file_exists("myfiles/api.php")) && ($api_switch == "ON")){
      echo "<div class='lists'>";
        include "myfiles/api.php"; $match++;
      echo "</div>";
    }

  }

?>
<!--#include virtual="https://www.supremesearch.net" -->


</div>
<!--Search-->

 <?php

  //Next Database
  $table = str_replace(".txt","base",$table); $table = str_replace("beta2/","",$table);
  if ($match < 15){$i = 0; $DB++;}
  if (($match == 0) && ($match2 == 0)){echo "<h1><b>Searching Database $DB ...</b></h1>"; $i = 0; $DB++;}
 
 ?>


  <?php 

    if(!isMobile()){echo '<div class="w3-container w3-rest w3-padding mysidebar">';}else{echo '<div class="w3-container w3-padding">';}


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
echo '<br><div class="w3-card-4">';
echo '<header class="w3-container w3-';if ($login == "on"){echo $user_color;}else{echo $footercolor;}echo '">';
echo '<big class="custom_tc">Advertisement</big>';
echo '</header>';
echo '<div class="w3-container w3-'.$panelcolor.'">';
echo '<center>'.$ads_code.'</center>';
echo '</div>';
echo '</div><br>';
}

         

?>

  </div>

</div>


<script language="JavaScript">
 var match = <?php echo $match ?>;
 var match2 = <?php echo $match2 ?>;
   if ((match == 0) && (match2 == 0)){Next();} //Auto Search Next Database
     function Next(){if("<?php echo $api_switch ?>" == "ON"){top.location.href='search_api.php?m=<?php echo $m ?>&User_Input=<?php echo $keyword?>&i=<?php echo $i?>&si=<?php echo $si?>&DB=<?php echo $DB?>&p=<?php echo $Page ?>';}else{top.location.href='search.php?m=<?php echo $m ?>&User_Input=<?php echo $keyword?>&i=<?php echo $i?>&si=<?php echo $si?>&DB=<?php echo $DB?>&p=<?php echo $Page ?>';}}

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
    <?php if (($search_feed == "OFF") || ($search_feed == "Internal Pages")){echo $Page.") ".$table."&#8195;".number_format(microtime(true) - $time_start, 2)." sec";} ?>
    </headtext2>
   </p>
  </div>
  <div class="w3-container w3-half">
   <p class="w3-right">

   <?php
   if (($search_feed == "OFF") || ($search_feed == "Internal Pages")){
    echo '<FORM>';
       echo '<INPUT class="w3-button w3-'.$footercolor.'" TYPE="BUTTON" VALUE="< Back" ONCLICK="history.go(-1)">';
       echo '<INPUT class="w3-button w3-'.$footercolor.'" TYPE="BUTTON" VALUE="Top" ONCLICK="top.location.href=\'#Top\';">';
       echo '<input class="w3-button w3-'.$footercolor.'" type="button" VALUE="Next >" OnClick="Next()"> ';
     echo '</FORM>';
   }
   ?>

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