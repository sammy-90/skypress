<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" id="bp-doc">
<meta name="viewport" content="initial-scale=1.0"> 
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />
<!-- (c) 2020 Supreme Search -->

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $pagecolor = "theme-l5";
}
?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<?php

 //Open Myfiles Dir
 $dh = opendir("./myfiles");

  echo '<script>'."\r\n"; 
  echo 'var m3u = ['."\r\n"; 

  while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".mp4")) !== false){
      echo '"myfiles/'.$file.'",'."\r\n"; 
    }
  }

  echo '""'."\r\n"; 
  closedir($dh);
  echo '];'."\r\n";

   
  echo '</script>'."\r\n"; 

?>


<style>

audio, #info{
  -moz-border-radius:7px 7px 7px 7px ;
  -webkit-border-radius:7px 7px 7px 7px ;
  border-radius:7px 7px 7px 7px ;
}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

</style>



<?php

  if (isset($_GET['page'])) {

    echo '<div class="w3-container" style="position: absolute;left:1">';

      if(!isMobile()){
        echo '<div class="w3-dropdown-hover">';
        echo '<button class="w3-button w3-'.$pagecolor.'"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
      }else{
       echo '<div class="w3-dropdown-click">';
       echo '<button class="w3-button w3-'.$pagecolor.'" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
      }

      echo '    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border w3-'.$pagecolor.' w3-animate-zoom">';
      include "sky-menu.php";
      echo '    </div>';
      echo '  </div>';
      echo '</div>';
      echo '<script>';
      echo 'function myFunction() {';
      echo '  var x = document.getElementById("Demo");';
      echo '  if (x.className.indexOf("w3-show") == -1) {';
      echo '    x.className += " w3-show";';
      echo '  } else { ';
      echo '    x.className = x.className.replace(" w3-show", "");';
      echo '  }';
      echo '}';
      echo '</script>';
 
    echo '<br><br><div class="w3-row w3-padding w3-border" id="blog">';
    include "sky-engine.php";
    echo '</div><br>';
    if (($type !== "radio") && ($type !== "tv")) {
      echo '<div class="w3-container w3-center">';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>&nbsp;';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
      echo '</div>';
    }

    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>'; exit;
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
  }

?>


<html>

<?php echo '<body class="w3-'.$pagecolor.'">' ?>

<div id="leftbird" class="w3-sidebar w3-bar-block <?php echo 'w3-'.$pagecolor ?>" style="width:25%;overflow: hidden;">
  <div id="show_playlist"></div>
</div>


<div id="rightbird" style="margin-left:25%">

<div class="w3-container" style="position: absolute;left:1">
  <?php
  if(!isMobile()){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button w3-'.$pagecolor.'"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
  }else{
    echo '<div class="w3-dropdown-click">';
    echo '<button class="w3-button w3-'.$pagecolor.'" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
  }
  ?>
    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border <?php echo 'w3-'.$pagecolor ?> w3-animate-zoom">
      <?php include "sky-menu.php"; ?>
    </div>
  </div>
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

<center>
<video id="videoPlayer" id="videoPlayer" style="width:100%;" controlsList="nodownload" autoplay autobuffer controls/></video>

<div id="info">
<table style="width:100%">
<tr>
<td style="width:10%"><a href="#" id="reverse" onclick="forward('reverse')"><i class="fa fa-backward" aria-hidden="true"></i></a></td>
<td style="width:100%"><center><big><a href="#" title="Show Playlist" onclick="Hide_Playlist(2)"><span id="song"></span></a><br><a href="#" title="Hide Playlist" onclick="Hide_Playlist(1)"><span id="artist">&#169; <?php echo date("Y"); echo " ".$footertext ?></span></a></big></center></td>
<td style="width:100%"><a href="#"id="ahead" onclick="forward('ahead')"><i class="fa fa-forward" aria-hidden="true"></i></a></td>
</tr>
</table>
</div>
</center>

</div>

</body>
</html>


<script type="text/javascript">

//Setup
var curVideo = -1; 
m3u.pop(); 
 
var videoPlayer = document.getElementById('videoPlayer'); 

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
for (var i = 0; i < m3u.length; i++) {j++; nextVideo[j] = m3u[i];}

//Make Playlist
var c = 0; var playtable = "";
playtable += '<div class="w3-container">';
for (var i = 0; i < nextVideo.length; i++) {
    var track = nextVideo[i].replace(".mp4", "");
    var res = track.split("/");  
    var link = res[res.length-1]; c = i+1;
    playtable += "<p class='w3-xlarge w3-serif'><i><a href='#' name='track"+i+"' id='track"+i+"' onclick='skip("+i+")'><i class='fa fa-play'></i>&nbsp;"+c+") "+link+"</a></i></p>";
}playtable += "</div>";

//Show Playlist
document.getElementById("show_playlist").innerHTML = playtable;


//Hide-Show Playlist
function Hide_Playlist(x){
  if (x == 1){
    document.getElementById("show_playlist").style.display = "none"; 
  }else{
    document.getElementById("show_playlist").style.display = "block";
  }
}


//Skip Button
function skip(input){
  if(curVideo < nextVideo.length){curVideo = input;    		
    videoPlayer.src = nextVideo[input];
    var track = nextVideo[input].replace(".mp4", "");
    var res = track.split("/"); 
    document.getElementById("song").innerHTML= res[res.length-1].substring(0,25);
    var scroll_track = "track"+input;  
    document.getElementById(scroll_track).style.color = 'cornflowerblue';  
  } 
}


//Forward & Back Button
function forward(input){
  if(input == "ahead"){curVideo++;}
  if(input == "reverse"){curVideo=curVideo-1;}
  if(curVideo < nextVideo.length){    		
    videoPlayer.src = nextVideo[curVideo];
    var track = nextVideo[curVideo].replace(".mp4", "");
    var res = track.split("/"); 
    document.getElementById("song").innerHTML= res[res.length-1].substring(0,25);
    var scroll_track = "track"+curVideo;  
    document.getElementById(scroll_track).style.color = 'cornflowerblue';
    location.href = "#"+scroll_track;     
  } 
}


//Autoplay Next Track
videoPlayer.onended = function(){curVideo++;
  if(curVideo < nextVideo.length){    		
    videoPlayer.src = nextVideo[curVideo];
    var track = nextVideo[curVideo].replace(".mp4", "");
    var res = track.split("/"); 
    document.getElementById("song").innerHTML= res[res.length-1].substring(0,25);
    var scroll_track = "track"+curVideo;  
    document.getElementById(scroll_track).style.color = 'cornflowerblue'; 
  }
}

forward('ahead');

</script>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>