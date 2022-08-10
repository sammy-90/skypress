<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php

  $Remaster = $_GET['Remaster'];
  $Split = explode("@",$_GET['Remaster']);
  if (!$Split[1]){$Split[1] = "black";}
  if (!$Split[2]){$Split[2] = "black";}
  if (!$Split[3]){$Split[3] = 75;}
  if (!$Split[4]){$Split[4] = "white";}

  $DesktopColor = $Split[1]; 
  $WindowColor = $Split[2]; 
  $Color_Mode = $Split[3];  
  $TextColor = $Split[4];
  $Uname = $Split[5];
  $Mode = $_GET['Mode'];

?>

<body style="height: 100%;" bgcolor="<?php echo $DesktopColor ?>">

<style> 

body, html {
  height: 100%;
  overflow: hidden;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("<?php echo '/'.$Split[0] ?>");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

</head>

<html>
<body>

<div class="bg"></div>
<DIV id="Clock" style="position: absolute; top:0; left:0; FONT-SIZE: 50px; COLOR: white; FONT-FAMILY: Verdana;"></DIV>
</center><body onload="Set_Clock()" onclick="Close_Screen_Saver()">

</body>
</html>


<script language="JavaScript">

function Set_Clock(){
 thistime=new Date()
 var hours=thistime.getHours()
 var minutes=thistime.getMinutes()
 var seconds=thistime.getSeconds()
 hours = hours % 12; if (hours == 0){hours = 12;}
 if (minutes < 10){minutes="0"+minutes;}
 if (seconds < 10) {seconds="0"+seconds}
 thistime = "&nbsp;" + hours+":"+minutes+":"+seconds
 Clock.innerHTML=thistime;

 //Updater
 var timer=setTimeout("Set_Clock()",200)
}

</SCRIPT>


<SCRIPT LANGUAGE="JavaScript" SRC="Domain.js"></SCRIPT>
