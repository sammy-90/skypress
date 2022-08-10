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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} 
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $pagecolor = "theme";
  $lightbox = "theme-l5";
}
?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
html,
body {
   margin:0;
   height: 100%;
   color: white;
   font-size: 20px; 
   font-weight: bold;
   font-family: arial; 
   background-size: cover;
   scrollbar-base-color: black;
   background-repeat: repeat; cursor: default;
   overflow-x: hidden; overflow-y: hidden;
}
img {margin-bottom: -8px;}
.mySlides {display: none;}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>
</style>
<?php echo '<body background="myfiles/header.jpg" class="w3-content w3-black w3-'.$pagecolor.'">' ?>

<!-- Header with Slideshow -->

  <button class="w3-button w3-block w3-green w3-hide-large w3-hide-medium" onclick="document.getElementById('download').style.display='block'"><?php echo $squeeze_title ?> - Sign Up</button>
  <div class="mySlides w3-animate-opacity" style="display:block">
    <div class="w3-display-<?php echo $signup_box ?> w3-padding w3-hide-small" style="width:35%">
      <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
        <h1 class="w3-xlarge"><?php echo $squeeze_title ?></h1>
        <hr class="w3-opacity">
        <p class="custom_tc"><?php echo $squeeze_desc ?></p>
        <p><button class="w3-button w3-block w3-green w3-round" onclick="document.getElementById('download').style.display='block'">Sign Up</button></p>
      </div>
    </div>
  </div>

<!-- Modal -->
<div id="download" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content" style="padding:32px">
    <div class="w3-container w3-white">
      <i onclick="document.getElementById('download').style.display='none'" class="fa fa-remove w3-xlarge w3-button w3-transparent w3-right w3-xlarge"></i>
      <p class="custom_tc">Subscribe Now To Get Started!</p>
      <form method="post" onSubmit="return checkrequired(this)" action="sky-squeeze-page2.php" enctype="multipart/form-data">
      <p><input class="w3-input w3-border" type="text" id="requiredemail" name="requiredemail" placeholder="Enter e-mail"></p>
      <button  class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" type="submit">Sign Up</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>

<script>

<!-- Original: wsabstract.com -->
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function checkrequired(which) {

var pass=true;
if (document.images) {
for (i=0;i<which.length;i++) {
var tempobj=which.elements[i];
if (tempobj.name.substring(0,8)=="required") {
if (((tempobj.type=="text"||tempobj.type=="textarea")&&
tempobj.value=='')||(tempobj.type.toString().charAt(0)=="s"&&
tempobj.selectedIndex==0)) {
pass=false;
break;
         }
      }
   }
}
if (!pass) {
shortFieldName=tempobj.name.substring(8,30).toUpperCase();
alert("Please make sure the "+shortFieldName+" field was properly completed.");
return false;
}
else
return true;
}
//  End -->

function imposeMaxLength(Event, Object, MaxLen)
{
    return (Object.value.length <= MaxLen)||(Event.keyCode == 8 ||Event.keyCode==46||(Event.keyCode>=35&&Event.keyCode<=40))
}


function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML = "Time: "+ 
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
  document.getElementById("month").innerHTML = months[d.getMonth()]+" "+date+" "+year+" ";
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

function Robocop(){
  if (document.getElementById("myCheck").checked){}else{document.getElementById('robot_check').style.display='block';}
}

function searchLinks1(){
User_Input = document.form.search.value;
top.location.href = "search.php?User_Input="+User_Input;
return false;
}

function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>