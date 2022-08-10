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

<div id="show_playlist" style="display:blank"></div>

<div>
  <center><h1>Radio</h1>
  <audio id="videoPlayer" controlsList="nodownload" autoplay autobuffer controls/></audio><br>
  <span id="song"></span>
  </center><br>
</div>

<script type="text/javascript">

document.getElementById("show_playlist").style.display = "none";
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