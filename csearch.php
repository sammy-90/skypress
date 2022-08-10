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
<?php 
if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
if (file_exists("myfiles/settings-search.php")){include "myfiles/settings-search.php";}else{echo "Please 'Publish' Your Search Engine... Admin > Application Settings > Search > Publish"; exit; }  
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor2 = $footercolor;
  $footercolor = "theme";
  $lightbox = "theme-l5";
  $lettercolor = $footercolor;
}else{
  $footercolor2 = $footercolor;
  $lightbox = $footercolor;
  $lettercolor = $fontcolor;
}
?>
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
$pagination = "ON";
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
  width: 600px;
  text-align: center;
  margin-top: 60px;
  margin: auto;
}

/* Style the search field */
.overlay input[type=search] {
  padding: 5px;
  font-size: 17px;
  border: none;
  float: left;
  width: 90%;
  background: white; 
  border-top-left-radius: 25px; 
  border-bottom-left-radius: 25px;
}

.overlay input[type=search]:focus {outline: none;}
button{outline: none;box-shadow: none;-webkit-tap-highlight-color: rgba(0,0,0,0);}

/* Style the submit button */
.overlay button {
  text-align: right;
  width:10%;
  padding: 5px;
  font-size: 17px;
  border: none;
  cursor: pointer;
  border-top-right-radius: 25px; 
  border-bottom-right-radius: 25px;
}

.mysidebar2{width:100%;}

@media screen and (max-width: 800px) {
  .mytopbar, .mysidebar{
    visibility: hidden;
    display: none;
  }
  .mysidebar2{width:0px;}
  .overlay input[type=search] {width: 80%;}
  .overlay button {width: 20%;}
  .overlay-content {width: 100%;}
}

input[type="search"]:focus::-webkit-search-cancel-button{
    -webkit-appearance: none;
    cursor: pointer;
    position:relati#ve; right:-15px;
    height: 24px; width: 24px;
    background-image: url("sky-admin/images/delete.png");
    background-repeat: repeat-y;
}

.txtinput{width:50%;}

.mlink{display: none;}
.dlink{display: inline;}
@media only screen and (max-width: 800px) {
  .txtinput{width:100%;}
  .dlink{display: none;}
  .mlink{display: inline;}
}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; scrollbar-width: thin;}

/* Style the search field */
.classcity{
  width: 75px;
  background: white; 
  border-radius: 5px;
}

/* Style the search field */
.classstate {
  width: 75px;
  background: white; 
  border-radius: 5px;
}

.dropdown-content{display:none;}

</style>

<script>

function searchLinks1(){
User_Input = document.form.search.value;
top.location.href = "csearch.php?m=<?php echo $m; ?>&User_Input="+User_Input+"&city="+document.form.mycity.value+"&state="+document.form.mystate.value;
return false;
}

</script>

<a name="Top"></a>
<!-- header -->
<header></header>

<table cellspacing="0" cellpadding="0" style="width:100%;height: 100%;border: none;margin:0;padding:0;table-layout: auto;" class="w3-container">
<tr>
<td class="mysidebar w3-<?php echo $lightbox; ?>"><?php if (file_exists("myfiles/logo.jpg")){echo "<a href='index.php'><img src='myfiles/logo.jpg' class='w3-round' width='125px' border='0'/></a>";} ?></td>
<td class="w3-<?php echo $lightbox; ?>">
 <div id="myOverlay" class="overlay">
  <div class="overlay-content w3-container">
    <form name="form" onSubmit="return searchLinks1()">
      <input type="search" name="search" id="search" onclick="hidefooter()" value="<?php echo $_GET['User_Input']; ?> " class="w3-border-left w3-border-bottom w3-border-top w3-border-<?php echo $footercolor.'' ?> ">
      <button class="w3-white w3-border-<?php echo $footercolor.'' ?> w3-border-right w3-border-bottom w3-border-top" name="Submit" type="submit"><font color="w3-<?php echo $footercolor.'' ?>"><i class="fa fa-search w3-text-<?php echo $footercolor ?>"></i>&nbsp;</button>
  </div>
 </div>
</td>
<td class="mysidebar2 w3-<?php echo $lightbox; ?>">
<div class="w3-right">

<!-- Hidden Sidebar (reveals when clicked on menu icon)-->
<nav class="w3-sidebar w3-light-gray w3-animate-right w3-large w3-border" style="display:none;padding-top:50px;top:0;right:0;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="closeNav()" class="w3-button  w3-light-gray w3-display-topright" style="padding:0 12px;">
    <i class="fa fa-remove"></i>
  </a>
  <div class="w3-bar-block">
    <?php include "sky-menu.php"; ?>
  </div>
</nav>

<?php

  //Menu icon to open sidebar --
  if (!$_GET['page']){
    echo '<span class="w3-button w3-right w3-xlarge w3-text-grey w3-hover-text-black w3-text-'.$footercolor.'" onclick="openNav()"><i class="fa fa-bars"></i></span>';
  }else{
    echo '<span class="w3-button w3-right w3-xlarge w3-text-grey w3-hover-text-black" onclick="openNav()"><i class="fa fa-bars"></i></span>';
  }

?>
</div>
</td>
</tr>
<tr>
<td class="mysidebar w3-<?php echo $lightbox; ?>"></td>
<td class="w3-<?php echo $lightbox; ?>">
<div class="w3-container <?php if(isMobile()){echo 'w3-center';}?>">
<?php include "GEO_Access.php"; ?>
<a href="csearch.php?m=web&User_Input=<?php echo $keyword2?>&city=<?php echo $city?>&state=<?php echo $state?>" class="underthesea1 lists w3-text-<?php echo $lettercolor ?>">Web</a>&emsp;&nbsp;
<a href="csearch.php?m=image&User_Input=<?php echo $keyword2?>" class="underthesea2 lists w3-text-<?php echo $lettercolor ?>">Images</a>&emsp;&nbsp;
<a href="csearch.php?m=music&User_Input=<?php echo $keyword2?>" class="underthesea3 lists w3-text-<?php echo $lettercolor ?>">Music</a>&emsp;&nbsp;
<a href="csearch.php?m=video&User_Input=<?php echo $keyword2?>" class="underthesea4 lists w3-text-<?php echo $lettercolor ?>">Video</a>&emsp;&nbsp;

<?php

echo '<div class="dlink">';
  echo '<a href="csearch.php?m=news&User_Input='.$keyword2.'" class="underthesea5 lists w3-text-'.$lettercolor.'">News</a>&emsp;&nbsp;';
  echo '<a href="csearch.php?m=estate&User_Input='.$keyword2.'&city='.$city.'&state='.$state.'" class="underthesea6 lists w3-text-'.$lettercolor.'">Real Estate</a>&emsp;&nbsp;';
  echo '<a href="csearch.php?m=books&User_Input='.$keyword2.'" class="underthesea7 lists w3-text-'.$lettercolor.'">Books</a>&emsp;&nbsp;';
echo '</div>';

echo '<a href="#" id="mydown" class="w3-text-'.$lettercolor.'" onclick="document.getElementById(\'myDropdown\').style.display=\'block\'; document.getElementById(\'mydown\').style.display=\'none\';  document.getElementById(\'myup\').style.display=\'inline\'">Settings <i class="fa fa-sort-down w3-text-'.$lettercolor.'" aria-hidden="true"></i></a>';
echo '<a href="#" id="myup" class="w3-text-'.$lettercolor.'" onclick="document.getElementById(\'myDropdown\').style.display=\'none\'; document.getElementById(\'mydown\').style.display=\'inline\'; document.getElementById(\'myup\').style.display=\'none\'" style="display:none">Settings <i class="fa fa-sort-up w3-text-'.$lettercolor.'" aria-hidden="true"></i></a>';

echo '<div id="myDropdown" class="dropdown-content"><br>';
  echo '<div class="mlink">';
  echo '<a href="csearch.php?m=news&User_Input='.$keyword2.'" class="underthesea5 lists w3-text-'.$lettercolor.'">News</a>&emsp;&nbsp;';
  echo '<a href="csearch.php?m=estate&User_Input='.$keyword2.'&city='.$city.'&state='.$state.'" class="underthesea6 lists  w3-text-'.$lettercolor.'">Real Estate</a>&emsp;&nbsp;';
  echo '<a href="csearch.php?m=books&User_Input='.$keyword2.'" class="underthesea7 lists  w3-text-'.$lettercolor.'">Books</a>&emsp;&nbsp;';  
  echo '<a href="#" class="w3-text-'.$lettercolor.'" onclick="geoupdate()" class="shadow">Location</a>&emsp;&nbsp;';
  echo '<br><br></div>';
  echo '<div class="dlink">';
  echo '<a href="#" class="w3-text-'.$lettercolor.'" onclick="geoupdate()" class="shadow">Location</a>&emsp;&nbsp;';
  echo '</div>';
  echo "<input type='text' placeholder=' City' class='classcity w3-border w3-".$pagecolor."' id='mycity' name='mycity' value='".$city."' style='display:inline'>&nbsp;<input type='text' placeholder=' State' class='classstate w3-border w3-".$pagecolor."' id='mystate' name='mystate' value='".$state."' style='display:inline'>";
echo '<br><br></div>';
?>
</div>

</form>
</div>
</td>
<td class="w3-<?php echo $lightbox; ?>"></td>
</tr>

<tr>
<td class="mysidebar"></td>
<td colspan="2"><br>

<?php 

  //sky engine
  if (isset($_GET['page'])) {
    echo '<div class="w3-row w3-padding w3-border" id="blog">';
    include "sky-engine.php";
    echo '</div><br>';
    if (($type !== "radio") && ($type !== "tv")) {
      echo '<div class="w3-container w3-center">';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>&nbsp;';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
      echo '</div>';
    }
  }
  if (isset($_GET['page'])) {
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
  }

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
}

?>

<div class="w3-container">

<!--Search-->

<?php

  //if(!isMobile()){echo '<div class="w3-container w3-padding w3-threequarter" style="width:75%;">';}else{echo '<div class="w3-container w3-padding w3-half" style="width:100%">';}

  //SET DB
  if(!$DB){$DB = 1;}

  if($m == "web"){echo '<style>.underthesea1{text-decoration:underline;}</style>'; }
  if($m == "image"){echo '<style>.underthesea2{text-decoration:underline;}</style>'; $subsearch = "jpg"; include "csearch2.php";}
  if($m == "music"){echo '<style>.underthesea3{text-decoration:underline;}</style>'; $subsearch = "mp3"; include "csearch2.php";}
  if($m == "video"){echo '<style>.underthesea4{text-decoration:underline;}</style>'; $subsearch = "mp4"; include "csearch2.php";}
  if($m == "news"){echo '<style>.underthesea5{text-decoration:underline;}</style>'; include "csearch2.php";}
  if($m == "estate"){echo '<style>.underthesea6{text-decoration:underline;}</style>'; include "csearch2.php";}
  if($m == "books"){echo '<style>.underthesea7{text-decoration:underline;}</style>'; include "csearch2.php";}

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


if(($m == "web") || ($m == "news")){

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

                //Bold Contents & Cut URL
                $patterns = "$NewKeyword"; $replacements = "<b>$NewKeyword</b>";
                $patterns2 = "$NewKeyword2"; $replacements2 = "<b>$NewKeyword2</b>";
                $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                $site[0] = str_ireplace($patterns2, $replacements2, $site[0]);
                $Cut_URL = substr($site[1], 0, 0); $Cut_URL = $site[1];

                //Show URL  
                if (strpos($site[1], ".") !== false){
                  echo "<div class='txtinput w3-padding w3-round w3-card'>Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                }else{
                  echo "<div class='txtinput w3-padding w3-round w3-card'>Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                }
 
                echo "</div><br>\n";  

                if ($match2 >= 2){$si = $count; $si++; break;}

            }

           }else{

             if (strpos($buffer, $keyword) !== false){$match2++;

                 $site = explode("|", $buffer); $dim = count($site);

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                 $Cut_URL = substr($site[1], 0, 0); $Cut_URL = $site[1];

                 //Show URL  
                 if (strpos($site[1], ".") !== false){
                   echo "<div class='txtinput w3-padding w3-round w3-card'>Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
                 }else{
                   echo "<div class='txtinput w3-padding w3-round w3-card'>Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
                 }

                 echo "</div><br>\n";  

	         if ($match2 >= 2){$si = $count; $si++; break;}

             }

           }

         }else{

           if (strpos(strtolower($buffer), strtolower($keyword)) !== false){$match2++;

               $site = explode("|", $buffer);

               //Bold Contents & Cut URL
               $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
               $site[0] = str_ireplace($patterns, $replacements, $site[0]);
               $Cut_URL = substr($site[1], 0, 0); $Cut_URL = $site[1];

               //Show URL  
               if (strpos($site[1], ".") !== false){
                 echo "<div class='txtinput w3-padding w3-round w3-card'>Ad - <a href='$site[1]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br><FONT COLOR='#008000' class='custom_tc'>$Cut_URL</FONT></a>";    
               }else{
                 echo "<div class='txtinput w3-padding w3-round w3-card'>Ad - <a href='$site[2]' rel='nofollow' target='blank'><big class='custom_color'>$site[0]</big></a><br>$site[1]<br><FONT COLOR='#008000' class='custom_tc'>$site[2]</FONT></a>";
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
                 $Cut_URL = substr($site[1], 0, 60); $Cut_URL = $site[1];

                 //Print Results
                 echo "<div class='txtinput w3-padding w3-round w3-card'>";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad - <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
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
                 $Cut_URL = substr($site[1], 0, 60); $Cut_URL = $site[1];

                 //Print Results
                 echo "<div class='txtinput w3-padding w3-round w3-card'>";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad - <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
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
                 $Cut_URL = substr($site[1], 0, 60); $Cut_URL = $site[1];

                 //Print Results
                 echo "<div class='txtinput w3-padding w3-round w3-card' style='width:100%'>";    
                 echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad - <big class="custom_color">'.$site[3].'</big><br><FONT COLOR="#008000" class="custom_tc">'.$Cut_URL.'</font></a>';
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

                //Bold Contents & Cut URL
                $patterns = "$NewKeyword"; $replacements = "<b>$NewKeyword</b>";
                $patterns2 = "$NewKeyword2"; $replacements2 = "<b>$NewKeyword2</b>";
                $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                $site[0] = str_ireplace($patterns2, $replacements2, $site[0]);
                $Cut_URL = substr($site[1], 0, 60); $Cut_URL = $site[1];

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

                 //Bold Contents & Cut URL
                 $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
                 $site[0] = str_ireplace($patterns, $replacements, $site[0]);
                 $Cut_URL = substr($site[1], 0, 60); $Cut_URL = $site[1];

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

               //Bold Contents & Cut URL
               $patterns = "$keyword"; $replacements = "<b>$keyword</b>";
               $site[0] = str_ireplace($patterns, $replacements, $site[0]);
               $Cut_URL = substr($site[1], 0, 60); $Cut_URL = $site[1];

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
  if(($m == "web") || ($m == "news")){if ($search_feed == "Internal Pages"){$m == "txt"; include "search3.php";}

    //SupremeSearch Feed
    if ($search_feed == "ON"){$match++; 
      if($m == "web"){
        echo '<script>var screentest = (screen.availHeight)-250; document.write(\'<iframe id="myIframe" onload="window.parent.parent.scrollTo(0,0)" src="https://www.supremesearch.net/Search.php?User_Input='.$keyword2.'&sk=on&txt='.$footercolor2.'&city='.$city.'&state='.$state.'" marginheight="8" marginwidth="8" frameborder="0" width="100%" height="\'+ screentest +\'px"></iframe>\');</script>';
      }
    }

    //Include API
    if($m == "web"){
     if ((file_exists("myfiles/api.php")) && ($api_switch == "ON")){
      echo "<div class='lists'>";
        include "myfiles/api.php"; $match++;
      echo "</div>";
     }
    }

    //Include API
    if($m == "news"){
     if ((file_exists("myfiles/api.php")) && ($api_switch == "ON")){
      echo "<div class='lists'>";
        include "myfiles/api_news.php"; $match++;
      echo "</div>";
     }
    }

  }

  if ((strlen($ads_code)>3) && (ismobile())){
   echo '<br><div class="w3-card-4">';
    echo '<header class="w3-container w3-';if ($login == "on"){echo $user_color;}else{echo $footercolor;}echo '">';
    echo '<big class="custom_tc">Advertisement</big>';
    echo '</header>';
    echo '<div class="w3-container w3-'.$panelcolor.'">';
    echo '<center>'.$ads_code.'</center>';
    echo '</div>';
    echo '</div><br><br><br><br>';
  }  

 ?>

</td>

</tr>
</table>

<script language="JavaScript">
 var match = <?php echo $match ?>;
 var match2 = <?php echo $match2 ?>;
   if ((match == 0) && (match2 == 0)){Next();} //Auto Search Next Database
     function Next(){top.location.href='csearch.php?m=<?php echo $m ?>&User_Input=<?php echo $keyword?>&i=<?php echo $i?>&si=<?php echo $si?>&DB=<?php echo $DB?>&p=<?php echo $Page ?>';}
     function Pageup(DB_UP){DB_UP = DB_UP - 1; top.location.href='csearch.php?m=<?php echo $m ?>&User_Input=<?php echo $keyword?>&i=<?php echo $i?>&si=<?php echo $si?>&DB=<?php echo $DB?>&p='+DB_UP;}
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("mySidebar").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidebar").style.display = "none";
}

</script>

  <div class="row">
    <div class="column column100 w3-center">

<style>
.pagination {
  display: inline-block;
}

.pagination a {
  float: center;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  color: white;
}

.pagination a:hover:not(.active) {
  text-shadow:0px 0px 0px white;
  background-color: #ddd;
}
</style>

   <?php
   if (($search_feed == "OFF") || ($search_feed == "Internal Pages")){
     if($pagination == "ON"){$list=3;
       $timer = number_format(microtime(true) - $time_start, 2)." sec";
       echo '<div class="pagination">'."\r\n";                   
       echo '<a href="#" ONCLICK="history.go(-1)" class="w3-circle shadow">&laquo;</a>'."\r\n";
         for ($b = 0; $b <= $list; $b++) { if($Page == ($Page + $b)){echo '<a href="#" OnClick="Pageup('.($Page + $b).')" class="w3-circle active w3-'.$footercolor.'">'.($Page + $b).'</a>'."\r\n";}else{echo '<a href="#" class="w3-circle shadow" OnClick="Pageup('.($Page + $b).')">'.($Page + $b).'</a>'."\r\n";}}
       echo '<a href="#" OnClick="Next()" class="shadow">&raquo;</a><br>'."\r\n";
       if($api_switch == "OFF"){echo '<br><a href="#Top" class="w3-circle shadow" title="'.$table.' '.$msg.' '.$timer.'">Top</a>'."\r\n";}
       echo '</div>'."\r\n";
     }
   }
   ?>

    </div>
  </div>

</div>

<!-- Footer -->
<?php if (($search_feed == "OFF") || ($search_feed == "Internal Pages")){echo '<footer class="w3-container w3-'.$lightbox.' w3-margin-top">';}else{echo '<footer class="w3-container w3-'.$lightbox.' w3-margin-top" style="bottom:0;position:fixed;width:100%">';} ?>
  <div class="w3-container w3-center w3-text-<?php echo $lettercolor; ?>"><br>
    <?php if ((file_exists("myfiles/logo.jpg")) && ($search_feed == "OFF")){echo "<a href='index.php'><img src='myfiles/logo.jpg' class='w3-round' width='125px' border='0'/></a><br><br>";} ?>
    <a href="<?php echo $fb ?>" class="w3-bar-item w3-button w3-circle" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?php echo $instagram ?>" class="w3-bar-item w3-button w3-circle" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" class="w3-bar-item w3-button w3-circle" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" class="w3-bar-item w3-button w3-circle" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" class="w3-bar-item w3-button w3-circle" target="_blank""><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" class="w3-bar-item w3-button w3-circle" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <br>
    <?php if(ismobile()){echo '<div class="w3-center">';}else{echo '<div class="w3-right">';} ?>
      <?php if ($search_feed == "OFF"){include "sky-links.php";} ?>
    </div>
   </div>
</footer>

<?php if ($search_feed == "ON"){echo '<script>hideit();</script>';} ?>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>