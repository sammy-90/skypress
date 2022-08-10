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

<html>

<div id="show_playlist" style="display:none"></div>

<center>
<?php 
if(!isMobile()){
  echo '<video id="videoPlayer" id="videoPlayer" style="width:50%;"  controlsList="nodownload" autoplay autobuffer controls/></video>';
}else{
  echo '<video id="videoPlayer" id="videoPlayer" style="width:100%;"  controlsList="nodownload" autoplay autobuffer controls/></video>';
}
?>

<div id="info">
<table style="width:100%">
<tr>
<td style="width:100%"><center><big><span id="song"></span></big></center></td>
</tr>
</table>
</div>
</center>
<br>
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