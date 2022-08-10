<!DOCTYPE html>
<html lang="en">
<title><?php echo $title ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "myfiles/settings-custom-links.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $lightbox = "theme-l5";
}
?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>
<style>
html{scroll-behavior: smooth;}
body {font-family: "Lato", sans-serif;}
.mySlides {display: none}
<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>
</style>
<?php echo '<body class="w3-'.$pagecolor.'">' ?>

<!-- Navbar -->
<div class="<?php echo $effects ?> w3-top <?php echo 'w3-'.$footercolor.'' ?>">
  <div class="w3-padding-large w3-bar  w3-card">
    <a href="https://supremesearch.net/skypress.php" target="blank" class="w3-bar-item w3-button w3-white w3-round w3-large"><b>Broadcast</b></a>
      <div class="w3-right w3-dropdown-hover w3-dropdown-click <?php echo 'w3-'.$footercolor ?>">
        <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity"></i></a>
        <div id="Demo" class="w3-dropdown-content w3-bar-block <?php echo 'w3-'.$footercolor ?> w3-animate-zoom w3-margin-right" style="right:-15px"><?php include "sky-menu.php"; ?></div>
      </div>
  </div>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">

  <!-- Automatic Slideshow Images -->
  <div class="w3-display-container w3-center">
    <img src="myfiles/header.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>

<?php
  include "myfiles/settings-menu.php"; 
  echo '&nbsp;<div class="w3-dropdown-hover"></div>';
  if($menut1){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut1.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$pagecolor.'">';
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
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$pagecolor.'">';
    if($link12){echo '<a href="'.$link12.'" class="w3-bar-item w3-button">'.$link11.'</a>';}
    if($link14){echo '<a href="'.$link14.'" class="w3-bar-item w3-button">'.$link13.'</a>';}
    if($link16){echo '<a href="'.$link16.'" class="w3-bar-item w3-button">'.$link15.'</a>';}
    if($link18){echo '<a href="'.$link18.'" class="w3-bar-item w3-button">'.$link17.'</a>';}
    if($link20){echo '<a href="'.$link20.'" class="w3-bar-item w3-button">'.$link19.'</a>';}
    echo '</div>';
    echo '</div>';
  }
  if($menut3){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut3.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$pagecolor.'">';
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

<!-- End Page Content -->
<br></div>

<!-- Footer -->
  <?php
  if(!isMobile()){
  echo '<footer class="w3-container w3-center w3-bottom '.$effects.'  w3-'.$footercolor.'">';}else{echo '<footer class="w3-container w3-center w3-bottom w3-'.$footercolor.'">';}
  ?>
    <center><span id="song"></span><br><audio id="videoPlayer" style="width:100%" class="w3-round w3-round" controlsList="nodownload" autoplay autobuffer controls/></audio></center>
  </footer>

<?php

 //Open Myfiles Dir
 $dh = opendir("./myfiles");

  echo '<script>'."\r\n"; 
  echo 'var m3u = ['."\r\n"; 

  while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".mp3")) !== false){
      echo '"myfiles/'.$file.'",'."\r\n"; 
    }
  }

  echo '""'."\r\n"; 
  closedir($dh);
  echo '];'."\r\n";

   
  echo '</script>'."\r\n"; 

?>

<style>

a {text-decoration: none;} 
a:hover {color: CornflowerBlue ;}

</style>

<?php 

  if($_GET['page'] == "radio"){header('Location: sky-cast.php');}
  if($_GET['page'] == "tv"){header('Location: sky-cast2.php');}

  if (($_GET['page'] !== "radio") && ($_GET['page'] !== "tv") && (isset($_GET['page']))) {  
    include "sky-engine.php";
    echo '<div class="w3-container w3-center">';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom  w3-'.$lightbox.'" ONCLICK="history.go(-1)"><b>< Back</b></button>&nbsp;';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom  w3-'.$lightbox.'" OnClick="Next()"><b>Next ></b></button>';
    echo '</div>';
  } 
  if (isset($_GET['page'])) {
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
  }

?>

<div class="w3-row">
  <div class="w3-half w3-container">
    <div id="show_playlist"></div><br>
  </div>
  <div class="w3-half w3-container">
    <div class='w3-container'><b>ABOUT</b></div><br>
    <?php echo $about; ?><br><br>
    <div class='w3-container'><b>BIO</b></div><br>
    <?php echo $bio; ?><br><br>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity w3-round w3-xlarge"></i></a>&nbsp;
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity w3-round w3-xlarge"></i></a>&nbsp;
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity w3-round w3-xlarge"></i></a>&nbsp;
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity w3-round w3-xlarge"></i></a>&nbsp;
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity w3-round w3-xlarge"></i></a>&nbsp;
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity w3-round w3-xlarge"></i></a>&nbsp;
    <?php include "sky-links.php"; ?>
    <?php if ($ads_code){echo $ads_code."<br><br>";} if ($advertisers=="Show"){include "sky-import-ads.php";} ?>
  </div>
</div>

<!-- Pre-Footer -->
<footer class="w3-container w3-padding-48"></footer>

<script type="text/javascript">

//Setup
var curVideo = -1;
m3u.pop(); 

//Suffle Array
function randomFunc(myArr) {      
  var l = myArr.length, temp, index;  
  while (l > 0) {  
    index = Math.floor(Math.random() * l);  
    l--;  
    temp = myArr[l];          
    myArr[l] = myArr[index];          
    myArr[index] = temp;      
  }    
  return myArr;    
}        
randomFunc(m3u);  


//Make M3U
var j = -1;
var nextVideo=new Array();
for (var i = 0; i < m3u.length; i++){j++; nextVideo[j] = m3u[i];}

//Make Playlist
var playtable = "<div class='w3-container'><b>NOW PLAYING</b></div><br><table id='playlist'>";
for (var i = 0; i < nextVideo.length; i++) {
    var track = nextVideo[i].replace(".mp3", "");
    var res = track.split("/");  
    var link = res[res.length-1];
    playtable += "<tr><td>&nbsp;<a style='cursor: pointer;' name='track"+i+"' id='track"+i+"' onclick='skip("+i+")'><i class='fa fa-music w3-button w3-round w3-black w3-xlarge' aria-hidden='true'></i>&nbsp;"+link+"</a></td></tr>";
}playtable  += "</table>";  document.getElementById("show_playlist").innerHTML = playtable;

//Skip Button
function skip(input){
  if(curVideo < nextVideo.length){curVideo = input;     		
    videoPlayer.src = nextVideo[input];
    var track = nextVideo[input].replace(".mp3", "");
    var res = track.split("/"); 
    document.getElementById("song").innerHTML= res[res.length-1];
    var scroll_track = "track"+input;  
    document.getElementById(scroll_track).style.color = 'CornflowerBlue';
    location.href = "#"+scroll_track;       
  } 
}

//Forward & Back Button
function forward(input){
  if(input == "ahead"){curVideo++;}
  if(input == "reverse"){curVideo=curVideo-1;}
  if(curVideo < nextVideo.length){    		
    videoPlayer.src = nextVideo[curVideo];
    var track = nextVideo[curVideo].replace(".mp3", "");
    var res = track.split("/"); 
    document.getElementById("song").innerHTML= res[res.length-1];
    var scroll_track = "track"+curVideo;  
    document.getElementById(scroll_track).style.color = 'CornflowerBlue';
    location.href = "#"+scroll_track;     
  } 
}

//Autoplay Next Track
videoPlayer.onended = function(){curVideo++;
  if(curVideo < nextVideo.length){    		
    videoPlayer.src = nextVideo[curVideo];
    var track = nextVideo[curVideo].replace(".mp3", "");
    var res = track.split("/"); 
    document.getElementById("song").innerHTML= res[res.length-1];
    var scroll_track = "track"+curVideo;  
    document.getElementById(scroll_track).style.color = 'CornflowerBlue';
    location.href = "#"+scroll_track;    
  }
}

forward('ahead');

</script>

</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>