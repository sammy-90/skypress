<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" id="bp-doc">
<meta name="viewport" content="initial-scale=1.0"> 
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />
<!-- (c) 2020 Supreme Search -->

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
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

html,body,table{
   color: white;
   font-size: 18px;
   font-weight: bold;
   font-family: arial;
   background-attachment: fixed;
   scrollbar-base-color: black;  
}

audio, #info{
  -moz-border-radius:7px 7px 7px 7px ;
  -webkit-border-radius:7px 7px 7px 7px ;
  border-radius:7px 7px 7px 7px ;
}

a {text-decoration: none; outline: 0;} 
a:hover {color: CornflowerBlue ;}

@media (min-width:800px){ 
  #playlist{font-size: 35px;}
}

</style>


<div>

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

<!-- Grid -->
<div class="w3-row">

<?php
 
  if (isset($_GET['page'])) {
    echo '<br><br><div class="w3-row w3-padding w3-border" id="blog">';
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
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>'; exit;
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
  }

?>

<!-- END GRID -->
</div>

<html>
<body bgcolor="<?php echo str_replace('-', '', $pagecolor); ?>">

<?php

if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  echo '<body class="w3-theme">';
}

?>

<center>

<div id="show_playlist" style="position:absolute;overflow:hidden;left:50%;top:50%;transform: translate(-50%, -50%);width:75%;height:65%;"></div>

<div style="position:absolute;left:50%;top:0%;transform: translate(-50%, 20%)"><center>
  <audio id="videoPlayer" controlsList="nodownload" autoplay autobuffer controls/></audio>
</div>

<div id="info" style="position:absolute;opacity: 0.80;padding:5px;left:50%;transform: translate(-50%, -0%);width:95%;bottom:4px;height:75px;background-color: #454545">
<table style="width:100%;">
<tr>
<td style="width:10%"><a href="#" id="reverse" onclick="forward('reverse')"><i class="fa fa-backward" aria-hidden="true"></i></a></td>
<td style="width:100%"><center><a href="#" title="Show Playlist" onclick="Hide_Playlist(2)"><span id="song"></span></a><br><a href="#" title="Hide Playlist" onclick="Hide_Playlist(1)"><span id="artist">&#169; <?php echo date("Y"); echo " ".$footertext ?></span></a></center></td>
<td style="width:100%"><a href="#"id="ahead" onclick="forward('ahead')"><i class="fa fa-forward" aria-hidden="true"></i></a></td>
</tr>
</table>
</div>

</center>
</body>
</html>


<script type="text/javascript">

document.getElementById("show_playlist").style.display = "none"; document.body.style.backgroundImage = "url('myfiles/header.jpg')";

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
var playtable = "<table id='playlist' style='text-shadow:5px 5px 5px black;'>";
for (var i = 0; i < nextVideo.length; i++) {
    var track = nextVideo[i].replace(".mp3", "");
    var res = track.split("/");  
    var link = res[res.length-1].substring(0,15);
    playtable += "<tr><td>&nbsp;<a href='#' name='track"+i+"' id='track"+i+"' onclick='skip("+i+")'><i class='fa fa-music' aria-hidden='true'>&nbsp;</i>"+link+"</a>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>";
}playtable  += "</table>";  document.getElementById("show_playlist").innerHTML = playtable;


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
    var track = nextVideo[input].replace(".mp3", "");
    var res = track.split("/"); 
    document.getElementById("song").innerHTML= res[res.length-1].substring(0,25);
    var scroll_track = "track"+input;  
    document.getElementById(scroll_track).style.color = 'yellow';
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
    document.getElementById("song").innerHTML= res[res.length-1].substring(0,25);
    var scroll_track = "track"+curVideo;  
    document.getElementById(scroll_track).style.color = 'yellow';
    location.href = "#"+scroll_track;     
  } 
}

//Autoplay Next Track
videoPlayer.onended = function(){curVideo++;
  if(curVideo < nextVideo.length){    		
    videoPlayer.src = nextVideo[curVideo];
    var track = nextVideo[curVideo].replace(".mp3", "");
    var res = track.split("/"); 
    document.getElementById("song").innerHTML= res[res.length-1].substring(0,25);
    var scroll_track = "track"+curVideo;  
    document.getElementById(scroll_track).style.color = 'yellow';
    location.href = "#"+scroll_track;    
  }
}

forward('ahead');

</script>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>