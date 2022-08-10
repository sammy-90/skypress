<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<?php if (file_exists("myfiles/settings-portal.php")){include "myfiles/settings-portal.php";}else{echo "Please 'Publish' Your portal... Admin > Application Settings > Portal > Publish"; exit; }
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $panelcolor = "theme-l5";
  $lightbox = "theme-l5";
}
?>
<?php include "sky-url.php"; ?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<?php 

  if(isset($_GET['logout'])){include "sky-logout.php";}
  if(isset($_GET['color'])){$footercolor = $_GET['color'];}
  echo '<body onload="startTime()" class="w3-'.$pagecolor.'">';

?>

<style>

body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

/* The content */
.overlay-content {
  position: relative;
  top: 46%;
  text-align: center;
  margin-top: 30px;
  margin: auto;
}

/* Style the search field */
.overlay input[type=text] {
  padding: 7px;
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
  padding: 7px;
  background: <?php echo str_replace('-', '', $pagecolor).';'."\r\n" ?>
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.overlay button:hover {
  background: <?php echo str_replace('-', '', $footercolor).';'."\r\n" ?>
}

@media screen and (max-width: 800px) {
  .mytopbar, .popular_bar, .ads {
    visibility: hidden;
    display: none;
  }
}

</style>


<script>
  var d = new Date();
  var date = d.getUTCDate();
  var year = d.getUTCFullYear();
  var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
</script>


<style>

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; }

</style>

<body>

<?php if ($login == "on"){echo '<div class="w3-bar w3-'.$color.' mytopbar">';}else{echo '<div class="w3-bar w3-'.$footercolor.' mytopbar">';} ?>
 <div class="w3-row">
  <div class="w3-container w3-quarter">
    <?php if (file_exists("myfiles/logo.jpg")){echo "<img src='myfiles/logo.jpg' height='64px' border='0'/>";}else{echo "<h2>".$title."</h2>";} ?>
  </div>

  <div class="w3-container w3-margin-top w3-right">

 <div class="w3-cell w3-container">
   <center>
    <img src="sky-admin/images/email.png" width="24px" height="24px">
    <a href="<?php $mail = explode('@', $paypal); echo 'http://mail.'.$mail[1]; ?>" target="blank">
      <div class="w3-container">
        Mail
      </a>
     </center>
  </div>

 <div class="w3-cell w3-container">
   <center>
    <img src="sky-admin/images/z.money.png" width="24px" height="24px">
    <a href="search.php?User_Input=money">
      <div class="w3-container">
        Money
      </a>
     </center>
  </div>

 <div class="w3-cell w3-container">
   <center>
    <img src="sky-admin/images/ball.png" width="24px" height="24px">
    <a href="search.php?User_Input=sports">
      <div class="w3-container">
        Sports
      </a>
     </center>
  </div>

 <div class="w3-cell w3-container">
   <center>
    <img src="sky-admin/images/z.weather.png" width="24px" height="24px">
    <a href="#weather">
      <div class="w3-container">
        Weather
      </a>
     </center>
  </div>

 <div class="w3-cell w3-container">
   <center>
    <img src="sky-admin/images/jpg.png" width="24px" height="24px">
    <a href="sky-tv.php">
      <div class="w3-container">
        TV
      </a>
     </center>
  </div>

 <div class="w3-cell w3-container">
   <center>
    <img src="sky-admin/images/mp4.png" width="24px" height="24px">
    <a href="search.php?User_Input=movies">
      <div class="w3-container">
        Movies
      </a>
     </center>
  </div>

  </div>
 </div>     
</div>  
<div class="w3-bar w3-<?php if ($login == "on"){echo $color;}else{echo $footercolor;} ?>">
 <div class="w3-row">
  <div class="w3-third w3-container">


  <?php
  if(!isMobile()){
    if ($login == "on"){echo '<div class="w3-dropdown-hover w3-'.$color.'">';}else{echo '<div class="w3-dropdown-hover w3-'.$footercolor.'">';}
    echo '<i class="fa fa-bars w3-large w3-hover-opacity"></i>';
  }else{
    if ($login == "on"){echo '<div class="w3-dropdown-click w3-'.$color.'">';}else{echo '<div class="w3-dropdown-click w3-'.$footercolor.'">';}
    echo '<i class="fa fa-bars w3-large w3-hover-opacity" onclick="myFunction()"></i>';
  }
  ?>
    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border <?php echo 'w3-'.$pagecolor ?> w3-animate-zoom">
      <?php include "sky-menu.php"; ?>
    </div>
  </div></font>&nbsp;


    <?php
    if ($login == "on"){ 
      echo "<a href=\"#\" onclick=\"document.getElementById('my_account').style.display='block'\">Hello, ".$name."</a>";
    }else{
      echo "<a href=\"#\" onclick=\"Robocop(); document.getElementById('join_now').style.display='block'\">Join Now</a>&emsp;&nbsp;";
      echo "<a href=\"#\" onclick=\"Robocop(); document.getElementById('login').style.display='block'\">Sign In</a>";
    }
    ?>
  </div>
  <div class="w3-third w3-container mytopbar">
   <center>
    <a href="#" onclick="document.getElementById('linktous').style.display='block'">Link To Us</a>&emsp;&nbsp;
    <a href="#" onclick="Robocop(); document.getElementById('submiturl').style.display='block'">Submit URL</a>&emsp;&nbsp;
    <a href="#" onclick="document.getElementById('color_change').style.display='block'">Colors & Themes</a>&emsp;&nbsp;
   </center>
  </div>
  <div class="w3-rest w3-container w3-right mytopbar">
    <a href="#" onclick="document.getElementById('email').style.display='block'">Email</a>&emsp;&nbsp;
    <?php
    if ($login == "on"){ 
      echo "<a href=\"sky-portal.php?logout=out\">Log-Out</a>&emsp;&nbsp;";
      echo "<a href=\"sky-portal-login.php?requiredemail=".$email."\">Advertise</a>";
    }else{
      echo "<a href=\"#\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Advertise</a>";
    }
    ?>
  </div>
</div> 
</div>  


<?php 

if (isset($_GET['page'])){

echo '<div class="w3-rest w3-padding-small">';

echo '<div class="w3-card-4 ads">';

if ($login == "on"){echo '<header class="w3-container w3-'.$user_color.'"';}else{echo '<header class="w3-container w3-'.$footercolor.'"';}
echo '  <big class="custom_tc">'.$_GET['page'].'</big>';
echo '</header>';

//Grid
echo '<div class="w3-row">';

include "sky-engine.php";
 
  if (isset($_GET['page'])) {
    if (($type !== "radio") && ($type !== "tv")) {
      echo '<div class="w3-container w3-center">';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
      echo '</div>';
    }
    echo '<script language="JavaScript">function Next(){top.location.href="sky-portal.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-portal.php?i='.$i.'";}</script>';
  }

//END GRID
echo '</div><br>';

echo '</div></div>';

}

?>


<div class="w3-padding-small w3-quarter">
<center>
<div class="w3-container">

<?php

//Ad Feed
$maxsize = 5000000;
if (filesize('myfiles/portal-members/ppc.txt') <= $maxsize){
  $stable = file('myfiles/portal-members/ppc.txt');
}else{
  $stable = array(); 
  $filename = fopen('myfiles/portal-members/ppc.txt', "r");
  while (!feof ($filename)){$count++;
    $stable[] = fgets($filename); 
  }fclose ($filename);
}

//Ad Setup
$matchit = 0;
$bypass = "@@";
$ad_type = "text";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
    if (($ad_type == "banner") && (is_file("myfiles/portal-members/".$site[4]))){
      echo '<a href="'.$site[2].'" class="custom_color" target="blank"><img src="myfiles/portal-members/'.$site[4].'" border="0"/></a>';
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }else{
      echo '<div class="w3-card-4 w3-rest">';
      if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
      echo '<big class="custom_tc">Advertisement</big>';
      echo '</header>';
      echo '<div class="w3-container w3-'.$panelcolor.'">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-card-4 w3-rest">';
  if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
  echo '<big class="custom_tc">Advertisement</big>';
  echo '</header>';
  echo '<div class="w3-container w3-'.$panelcolor.'">';
  echo "<a href=\"#\"  class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
  echo "</div>";
}

?>	

</div>
<br>
</center>
</div>


<div class="w3-padding-small w3-half">
<center>
<div class="w3-container">

<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$ad_type = "banner";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
    if (($ad_type == "banner") && (file_exists("myfiles/portal-members/".substr($site[4], 0, -2)))){
      echo '<a href="'.$site[2].'" class="custom_color" target="blank"><img src="myfiles/portal-members/'.$site[4].'" border="0"/></a>';
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }else{
      echo '<div class="w3-card-4 w3-rest">';
      if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
      echo '<big class="custom_tc">Advertisement</big>';
      echo '</header>';
      echo '<div class="w3-container w3-'.$panelcolor.'">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-card-4 w3-rest">';
  if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
  echo '<big class="custom_tc">Advertisement</big>';

  echo '</header>';
  echo '<div class="w3-container w3-'.$panelcolor.'">';
  echo "<a href=\"#\"  class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
  echo "</div>";
}

?>	

</div>
<br>
</center>
</div>

<div class="w3-padding-small w3-rest">
<center>
<div class="w3-container">

<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$ad_type = "text";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
    if (($ad_type == "banner") && (is_file("myfiles/portal-members/".$site[4]))){
      echo '<a href="'.$site[2].'" class="custom_color" target="blank"><img src="myfiles/portal-members/'.$site[4].'" border="0"/></a>';
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }else{
      echo '<div class="w3-card-4 w3-rest">';
      if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
      echo '<big class="custom_tc">Advertisement</big>';
      echo '</header>';
      echo '<div class="w3-container w3-'.$panelcolor.'">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-card-4 w3-rest">';
  if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
  echo '<big class="custom_tc">Advertisement</big>';
  echo '</header>';
  echo '<div class="w3-container w3-'.$panelcolor.'">';
  echo "<a href=\"#\"  class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
  echo "</div>";
}

?>	

</div>
<br>
</center>
</div>

<?php $m = $_GET['m']; if(!$m){$m = 'web';} ?>

<div class="w3-row w3-border-bottom w3-border-top w3-padding-small w3-<?php echo $lightbox ?>">

<div class="w3-container w3-quarter w3-padding w3-<?php echo $panelcolor ?>"><center>Search The Web</center></div>

<div class="w3-container w3-half">
 <div id="myOverlay" class="overlay">
  <div class="overlay-content" >
    <form name="form" id="search-form" onSubmit="return searchLinks1()">
      <input type="text"  style="border-top-left-radius: 5px;border-bottom-left-radius: 5px;" class="w3-border" placeholder="What you looking for?" name="search" list="passed-searches">
      <button name="Submit"  style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;" class="w3-border w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>" type="submit"><i class="fa fa-search custom_tc"></i></button>

 <?php
   $maxsize = 5000000;
   if ((file_exists("myfiles/widgets/User.txt")) && (filesize("myfiles/widgets/User.txt") < $maxsize)){
       echo '<datalist id="passed-searches">';
       $llines = array_reverse(array_unique(file("myfiles/widgets/User.txt")));
       for($i = 0; $i < 50; $i++){
         if (strlen($llines[$i]) > 1){echo '<option value="'.$llines[$i].'">';}
       }
     echo "</datalist>";
   }
  ?>

    </form>
  </div>
 </div>
</div>

<div class="w3-container w3-rest w3-padding w3-<?php echo $panelcolor ?>"><center><a href="http://www.yellowpages.com" class="custom_color" target="blank">Yellow Pages</a> | <a href="http://www.whitepages.com" class="custom_color" target="blank">White Pages</a></center></div>

</div>


<div class="w3-quarter w3-padding-small"><?php if(!isMobile()){echo "<br>";} ?>


<div class="w3-card-4 ads">

<header class="w3-container w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
   <big class="custom_tc">Sponsor Links</big>
</header>

<div class="w3-container w3-<?php echo $panelcolor ?>">
<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\"  class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>	
</div>
</div><br>

<div class="w3-border w3-card">
  <header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
    <big class="custom_tc">Clock</big>
  </header>

<?php echo '<div class="w3-container w3-'.$panelcolor.'">'; ?>
<center>
<canvas id="canvas" width="200" height="200"
style="background-color:#333">
</canvas>

<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>

</center>
</div>
</div><br>


<div class="w3-card-4">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">World News</big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">
<center>
<!-- noozilla code start -->
<table border="0"><tr><td>
	<script language="JavaScript" charset="utf-8" src="https://www.noozilla.com/iframe.php?cat=world&type=1&bgcolor=FFFFFF&bdcolor=3B5998&lcolor=1B157A&tcolor=FFFFFF&fontsize=8&box=200&window=1&font=1&bold=1&textalign=1">
	</script>
	</td></tr><tr><td align="right">
	<a href="https://www.noozilla.com/user/newsticker.php">
	<img src="https://static.noozilla.com/iframe/images/ifr.png" alt="News widgets" border="0"></a>
	</td></tr></table>
	<!-- noozilla code end -->
</center>	
</div>
</div><br>


<div class="w3-card-4">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Stock Market</big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">
<center>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/stocks-usa/market-movers-gainers/" rel="noopener" target="_blank"><span class="blue-text">Stock Market</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
  {
  "colorTheme": "light",
  "dateRange": "12M",
  "exchange": "US",
  "showChart": true,
  "locale": "en",
  "largeChartUrl": "",
  "isTransparent": false,
  "showSymbolLogo": false,
  "width": "250",
  "height": "500",
  "plotLineColorGrowing": "rgba(33, 150, 243, 1)",
  "plotLineColorFalling": "rgba(33, 150, 243, 1)",
  "gridLineColor": "rgba(240, 243, 250, 1)",
  "scaleFontColor": "rgba(120, 123, 134, 1)",
  "belowLineFillColorGrowing": "rgba(33, 150, 243, 0.12)",
  "belowLineFillColorFalling": "rgba(33, 150, 243, 0.12)",
  "symbolActiveColor": "rgba(33, 150, 243, 0.12)"
}
  </script>
</div>
<!-- TradingView Widget END -->

</center>	
</div>
</div><br>


<div class="w3-border w3-card">
  <header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
    <big class="custom_tc">Popular Links</big>
  </header>

  <div class="w3-container w3-<?php echo $panelcolor ?>">
    <p><a href="https://www.peoplefinder.com/" class="custom_color" target="blank">People Finder</a></p>
    <p><a href="<?php echo $forums_chat ?>" class="custom_color" target="blank">Forums & Chat</a></p>
    <p><a href="sky-radio.php" class="custom_color" target="blank">Listen To The Radio</a></p>
  </div>
</div><br>


<div class="w3-card-4 ads">

<header class="w3-container w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
  <big class="custom_tc">Advertisement</big>
</header>

<div class="w3-container w3-<?php echo $panelcolor ?>">
<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\"  class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>
</div>
</div><br>

<?php
if (file_exists("myfiles/widgets/left.txt")){
$lines = file("myfiles/widgets/left.txt");
  for($i = 0; $i < count($lines); next($lines), $i++){
    if (strlen($lines[$i]) > 5){$pieces = explode("|", $lines[$i]);
      echo '<div class="w3-card-4">';
      if ($login == "on"){echo '<header class="w3-container w3-'.$user_color.'"';}else{echo '<header class="w3-container w3-'.$footercolor.'"';}echo '<big class="custom_tc">'.$pieces[0].'</big></header>';
        echo '<div class="w3-container w3-'.$panelcolor.'">';
          echo '<center>';
            echo $pieces[1];
          echo '</center>';
        echo '</div>';
      echo '</div><br>';
    }
  }
}
?>

<?php
if($rss == "Show"){
echo '<div class="w3-card-4">';
echo '<header class="w3-container w3-'; if ($login == "on"){echo $user_color;}else{echo $footercolor;} echo '"><big class="custom_tc">RSS News 1</big></header>';
echo '<div class="w3-container" >';
if(isMobile()){echo '<center><iframe src="sky-portal-rss1.php" style="border:0;width:100%;height:300px"></iframe></center>';}else{echo '<center><iframe src="sky-portal-rss1.php" style="border:0;width:280px;height:300px"></iframe></center>';}
echo '</div>';
echo '</div><br>';
}
?>

<div class="w3-card-4">

<header class="w3-container w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
  <big class="custom_tc">Sponsor Links</big>
</header>

<div class="w3-container w3-<?php echo $panelcolor ?>">
<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\"  class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>
</div>
</div><br>

</div>


<div class="w3-padding w3-half">

<div class="w3-round w3-padding w3-bar w3-border popular_bar w3-<?php echo $panelcolor ?>">

  <center class="custom_color">Popular Sites&emsp;&nbsp;	
  <a href="http://www.ebay.com" class="custom_color" target="blank">Ebay</a>&emsp;&nbsp;
  <a href="http://www.amazon.com" class="custom_color" target="blank">Amazon</a>&emsp;&nbsp;	
  <a href="http://www.facebook.com" class="custom_color" target="blank">Facebook</a>&emsp;&nbsp;		
  <a href="http://www.twitter.com" class="custom_color" target="blank">Twitter</a>&emsp;&nbsp;		
  <a href="http://www.linkedin.com" class="custom_color" target="blank">Linkedin</a>&emsp;&nbsp;	
  </center>

</div><br>

<div class="w3-card-4">
<header class="w3-container w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
  <big class="custom_tc">Top 10 Searches</big>
</header>

<div class="w3-container w3-<?php echo $panelcolor ?>">
  <table class="w3-padding custom_color" style="width:100%">

     <?php
       if (count($llines) > 10){
         $top_match = 0;
         for($ii = 0; count($llines); next($llines), $ii++){
           if(strlen($llines[$ii])>60){$llines[$ii] = chunk_split($llines[$ii], 60);};
           echo "<tr><td><a href='search.php?User_Input=".$llines[$ii]."'>".$llines[$ii]."</a></td></tr>"; $top_match++;
           if ($top_match > 9){break;}
         }
       }
     ?>

  </table>
</div>

</div><br>

<div class="w3-container">

<div class="w3-card-4 w3-half w3-margin">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Ads By <?php echo $title ?></big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">

<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>

</div>
</div>

<?php if(isMobile()){echo '<div class="w3-card-4 w3-half w3-margin">';}else{echo '<div class="w3-card-4 w3-rest w3-margin">';} ?>
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Ads By <?php echo $title ?></big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">

<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\" class=\"custom_color\" nclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>

</div>
</div>

</div>



<div class="w3-card-4">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">CBS News</big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">
<center>
<iframe src="https://www.cbsnews.com/live/" frameborder="0" width="100%" height="400"></iframe>
</center>	
</div>
</div><br>


<div class="w3-card-4">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Favorites Links</big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">
<center>
      <a href="<?php echo $favorites1 ?>" class="custom_color" target="blank"><?php echo str_replace('http://', "", $favorites1."\r\n"); ?></a>&emsp;&nbsp;
      <a href="<?php echo $favorites2 ?>" class="custom_color" target="blank"><?php echo str_replace('http://', "", $favorites2."\r\n"); ?></a>&emsp;&nbsp;
      <a href="<?php echo $favorites3 ?>" class="custom_color" target="blank"><?php echo str_replace('http://', "", $favorites3."\r\n"); ?></a>&emsp;&nbsp;
      <a href="<?php echo $favorites4 ?>" class="custom_color" target="blank"><?php echo str_replace('http://', "", $favorites4."\r\n"); ?></a><br>
</center>	
</div>
</div><br>


<div class="w3-card-4">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Euronews</big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">
<iframe sandbox="" src="https://www.euronews.com/embed/timeline" scrolling="no" style="border:none; min-height:300px; width:100%; height:100%;"></iframe>
</div>
</div><br>


<div class="w3-card-4">
  <header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
    <big class="custom_tc">Games</big>
  </header>

<div class="w3-container w3-<?php echo $panelcolor ?>">
<div class="w3-col w3-half"><center>
<table style="margin:0 0 10px 0; width:244px; background:#fff; border:1px solid #ccc;" cellspacing="0" cellpadding="0">
	<tr>
		<td style="font-family:verdana; font-size:11px; color:#000; padding:5px 10px;">
			<a href="https://www.miniclip.com/games/8-ball-pool-multiplayer/en/" style="display:block; text-decoration:none;">
				<img src="https://static.miniclipcdn.com/content/game-icons/small/8ballpoolmultiplayerv6.jpg" width="70" height="59" align="left" style="margin-right:5px; border:0;" alt="Games at Miniclip.com - 8 Ball Pool" />
				<a href="https://www.miniclip.com/games/8-ball-pool-multiplayer/en/" style="font-weight:bold; color:#000; border:none; text-decoration:underline;">8 Ball Pool</a>
				<p style="margin:0; clear:none; text-decoration:none; color:#000;">Play 8 Ball Pool against other players online!</p>
			</a>
		</td>
	</tr>
	<tr>
		<td style="font-family:verdana; font-size:11px; padding:5px 10px; border-top:1px solid #ccc;">
			<a href="https://www.miniclip.com/games/8-ball-pool-multiplayer/en/" title="Games at Miniclip.com">Play this free game now!</a>
		</td>
	</tr>
</table>

<table style="margin:0 0 10px 0; width:244px; background:#fff; border:1px solid #ccc;" cellspacing="0" cellpadding="0">
	<tr>
		<td style="font-family:verdana; font-size:11px; color:#000; padding:5px 10px;">
			<a href="https://www.miniclip.com/games/basketball-stars/en/" style="display:block; text-decoration:none;">
				<img src="https://static.miniclipcdn.com/content/game-icons/small/BasketballStars_70x59.png" width="70" height="59" align="left" style="margin-right:5px; border:0;" alt="Games at Miniclip.com - Basketball Stars" />
				<a href="https://www.miniclip.com/games/basketball-stars/en/" style="font-weight:bold; color:#000; border:none; text-decoration:underline;">Basketball Stars</a>
				<p style="margin:0; clear:none; text-decoration:none; color:#000;">Show your skills, moves and fakes to juke out your opponent and shoot for the basket! </p>
			</a>
		</td>
	</tr>
	<tr>
		<td style="font-family:verdana; font-size:11px; padding:5px 10px; border-top:1px solid #ccc;">
			<a href="https://www.miniclip.com/games/basketball-stars/en/" title="Games at Miniclip.com">Play this free game now!</a>
		</td>
	</tr>
</table></center>

</div>

<div class="w3-col w3-half"><center>
<table style="margin:0 0 10px 0; width:244px; background:#fff; border:1px solid #ccc;" cellspacing="0" cellpadding="0">
	<tr>
		<td style="font-family:verdana; font-size:11px; color:#000; padding:5px 10px;">
			<a href="https://www.miniclip.com/games/sprint-club-nitro/en/" style="display:block; text-decoration:none;">
				<img src="https://static.miniclipcdn.com/content/game-icons/small/Sprint_Club_70x59.jpg" width="70" height="59" align="left" style="margin-right:5px; border:0;" alt="Games at Miniclip.com - Sprint Club Nitro" />
				<a href="https://www.miniclip.com/games/sprint-club-nitro/en/" style="font-weight:bold; color:#000; border:none; text-decoration:underline;">Sprint Club Nitro</a>
				<p style="margin:0; clear:none; text-decoration:none; color:#000;">Compete and win races to upgrade your car and become Sprint Club Nitro Champion!</p>
			</a>
		</td>
	</tr>
	<tr>
		<td style="font-family:verdana; font-size:11px; padding:5px 10px; border-top:1px solid #ccc;">
			<a href="https://www.miniclip.com/games/sprint-club-nitro/en/" title="Games at Miniclip.com">Play this free game now!</a>
		</td>
	</tr>
</table>

<table style="margin:0 0 10px 0; width:244px; background:#fff; border:1px solid #ccc;" cellspacing="0" cellpadding="0">
	<tr>
		<td style="font-family:verdana; font-size:11px; color:#000; padding:5px 10px;">
			<a href="https://www.miniclip.com/games/turbo-racing-3/en/" style="display:block; text-decoration:none;">
				<img src="https://static.miniclipcdn.com/content/game-icons/small/turboracing3.jpg" width="70" height="59" align="left" style="margin-right:5px; border:0;" alt="Games at Miniclip.com - Turbo Racing 3" />
				<a href="https://www.miniclip.com/games/turbo-racing-3/en/" style="font-weight:bold; color:#000; border:none; text-decoration:underline;">Turbo Racing 3</a>
				<p style="margin:0; clear:none; text-decoration:none; color:#000;">Burn rubber on the streets of Shanghai in Turbo Racing 3!</p>
			</a>
		</td>
	</tr>
	<tr>
		<td style="font-family:verdana; font-size:11px; padding:5px 10px; border-top:1px solid #ccc;">
			<a href="https://www.miniclip.com/games/turbo-racing-3/en/" title="Games at Miniclip.com">Play this free game now!</a>
		</td>
	</tr>
</table></center>

</div>
</div>

</div><br>


<div class="w3-container">

<div class="w3-card-4 w3-half w3-margin">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Ads By <?php echo $title ?></big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">

<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>		

</div>
</div>

<?php if(isMobile()){echo '<div class="w3-card-4 w3-half w3-margin">';}else{echo '<div class="w3-card-4 w3-rest w3-margin">';} ?>
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Ads By <?php echo $title ?></big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">

<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>	

</div>
</div>

</div>

<?php
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
?>

<?php
if (file_exists("myfiles/widgets/center.txt")){
$lines = file("myfiles/widgets/center.txt");
  for($i = 0; $i < count($lines); next($lines), $i++){
    if (strlen($lines[$i]) > 5){$pieces = explode("|", $lines[$i]);
      echo '<div class="w3-card-4 w3-'.$panelcolor.'">';
      if ($login == "on"){echo '<header class="w3-container w3-'.$user_color.'"';}else{echo '<header class="w3-container w3-'.$footercolor.'"';}echo '<big class="custom_tc">'.$pieces[0].'</big></header>';
        echo '<div class="w3-container" >';
          echo '<center>';
            echo $pieces[1];
          echo '</center>';
        echo '</div>';
      echo '</div><br>';
    }
  }
}
?>

<?php
if($rss == "Show"){
echo '<div class="w3-card-4">';
echo '<header class="w3-container w3-'; if ($login == "on"){echo $user_color;}else{echo $footercolor;} echo '"><big class="custom_tc">RSS News 2</big></header>';
echo '<div class="w3-container w3-'.$panelcolor.'">';
echo '<center><iframe src="sky-portal-rss2.php" style="border:0;width:580px;height:280px"></iframe></center>';
echo '</div>';
echo '</div><br>';
}
?>


<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$ad_type = "banner";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
    if (($ad_type == "banner") && (file_exists("myfiles/portal-members/".substr($site[4], 0, -2)))){
      echo '<center><a href="'.$site[2].'" class="custom_color" target="blank"><img src="myfiles/portal-members/'.$site[4].'" border="0"/></a></center>';
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }else{
      echo '<div class="w3-card-4 w3-rest">';
      if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
      echo '<big class="custom_tc">Advertisement</big>';
      echo '</header>';
      echo '<div class="w3-container w3-'.$panelcolor.'">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-card-4 w3-rest">';
  if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
  echo '<big class="custom_tc">Advertisement</big>';
  echo '</header>';
  echo '<div class="w3-container w3-'.$panelcolor.'">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
  echo "</div>";
}

?>	


</div><br>
</div>


<div class="w3-rest w3-padding-small">

<div class="w3-card-4">

<header class="w3-container w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
  <big class="custom_tc">Sponsor Links</big>
</header>

<div class="w3-container w3-<?php echo $panelcolor ?>">
<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container w3-'.$panelcolor.'">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container w3-'.$panelcolor.'">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>
</div>
</div><br>


<div class="w3-card-4">
  <header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
    <big class="custom_tc">What You Think?</big>
  </header>

  <div class="w3-container w3-<?php echo $panelcolor ?>">
  <iframe src="sky-polls.php" frameborder="0"></iframe>
  </div>
</div><br>

<div class="w3-card-4" id="weather" style="display:none">
  <header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
    <big class="custom_tc">Weather</big>
  </header>

  <div class="w3-container w3-<?php echo $panelcolor ?>">
    <br>

<center>
<iframe src="https://www.meteoblue.com/en/weather/widget/daily?geoloc=detect&days=4&tempunit=FAHRENHEIT&windunit=MILE_PER_HOUR&precipunit=INCH&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&winddirection=1&uv=0&humidity=0&precipitation=0&precipitation=1&precipitationprobability=0&precipitationprobability=1&spot=0&spot=1&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 216px; height: 420px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/en/weather/week/index?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank">meteoblue</a></div>
</center>

    <br>
  </div>
</div><br>


<div class="w3-card-4">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Surfing Waves News</big>
</header>
<center>
<div class="w3-container w3-<?php echo $panelcolor ?>">
<!-- start sw-rss-feed code --> 
<script type="text/javascript"> 
<!-- 
rssfeed_url = new Array(); 
rssfeed_url[0]="https://surfing-waves.com/newsrss.xml";  
rssfeed_frame_width="230"; 
rssfeed_frame_height="260"; 
rssfeed_scroll="on"; 
rssfeed_scroll_step="6"; 
rssfeed_scroll_bar="off"; 
rssfeed_target="_blank"; 
rssfeed_font_size="12"; 
rssfeed_font_face=""; 
rssfeed_border="on"; 
rssfeed_css_url=""; 
rssfeed_title="on"; 
rssfeed_title_name=""; 
rssfeed_title_bgcolor="#3366ff"; 
rssfeed_title_color="#fff"; 
rssfeed_title_bgimage=""; 
rssfeed_footer="off"; 
rssfeed_footer_name="rss feed"; 
rssfeed_footer_bgcolor="#fff"; 
rssfeed_footer_color="#333"; 
rssfeed_footer_bgimage=""; 
rssfeed_item_title_length="50"; 
rssfeed_item_title_color="#666"; 
rssfeed_item_bgcolor="#fff"; 
rssfeed_item_bgimage=""; 
rssfeed_item_border_bottom="on"; 
rssfeed_item_source_icon="off"; 
rssfeed_item_date="off"; 
rssfeed_item_description="on"; 
rssfeed_item_description_length="120"; 
rssfeed_item_description_color="#666"; 
rssfeed_item_description_link_color="#333"; 
rssfeed_item_description_tag="off"; 
rssfeed_no_items="0"; 
rssfeed_cache = "5e7d83b0c3cae78214b43fe5f32c0341"; 
//--> 
</script> 
<script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script> 
<!-- The link below helps keep this service FREE, and helps other people find the SW widget. Please be cool and keep it! Thanks. --> 
<div style="color:#ccc;font-size:10px; text-align:right; width:230px;">powered by <a href="https://surfing-waves.com" rel="noopener" target="_blank" style="color:#ccc;">Surfing Waves</a></div> 
<!-- end sw-rss-feed code --></div></center>
</div><br>




<div class="w3-card-4">
  <header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
    <big class="custom_tc">Market Overview</big>
  </header>

  <div class="w3-container w3-<?php echo $panelcolor ?>">
    <center>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Market Data</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
  {
  "colorTheme": "light",
  "dateRange": "12M",
  "showChart": true,
  "locale": "en",
  "largeChartUrl": "",
  "isTransparent": false,
  "showSymbolLogo": true,
  "width": "250",
  "height": "500",
  "plotLineColorGrowing": "rgba(33, 150, 243, 1)",
  "plotLineColorFalling": "rgba(33, 150, 243, 1)",
  "gridLineColor": "rgba(240, 243, 250, 1)",
  "scaleFontColor": "rgba(120, 123, 134, 1)",
  "belowLineFillColorGrowing": "rgba(33, 150, 243, 0.12)",
  "belowLineFillColorFalling": "rgba(33, 150, 243, 0.12)",
  "symbolActiveColor": "rgba(33, 150, 243, 0.12)",
  "tabs": [
    {
      "title": "Indices",
      "symbols": [
        {
          "s": "FOREXCOM:SPXUSD",
          "d": "S&P 500"
        },
        {
          "s": "FOREXCOM:NSXUSD",
          "d": "Nasdaq 100"
        },
        {
          "s": "FOREXCOM:DJI",
          "d": "Dow 30"
        },
        {
          "s": "INDEX:NKY",
          "d": "Nikkei 225"
        },
        {
          "s": "INDEX:DEU30",
          "d": "DAX Index"
        },
        {
          "s": "FOREXCOM:UKXGBP",
          "d": "FTSE 100"
        }
      ],
      "originalTitle": "Indices"
    },
    {
      "title": "Commodities",
      "symbols": [
        {
          "s": "CME_MINI:ES1!",
          "d": "S&P 500"
        },
        {
          "s": "CME:6E1!",
          "d": "Euro"
        },
        {
          "s": "COMEX:GC1!",
          "d": "Gold"
        },
        {
          "s": "NYMEX:CL1!",
          "d": "Crude Oil"
        },
        {
          "s": "NYMEX:NG1!",
          "d": "Natural Gas"
        },
        {
          "s": "CBOT:ZC1!",
          "d": "Corn"
        }
      ],
      "originalTitle": "Commodities"
    },
    {
      "title": "Bonds",
      "symbols": [
        {
          "s": "CME:GE1!",
          "d": "Eurodollar"
        },
        {
          "s": "CBOT:ZB1!",
          "d": "T-Bond"
        },
        {
          "s": "CBOT:UB1!",
          "d": "Ultra T-Bond"
        },
        {
          "s": "EUREX:FGBL1!",
          "d": "Euro Bund"
        },
        {
          "s": "EUREX:FBTP1!",
          "d": "Euro BTP"
        },
        {
          "s": "EUREX:FGBM1!",
          "d": "Euro BOBL"
        }
      ],
      "originalTitle": "Bonds"
    },
    {
      "title": "Forex",
      "symbols": [
        {
          "s": "FX:EURUSD"
        },
        {
          "s": "FX:GBPUSD"
        },
        {
          "s": "FX:USDJPY"
        },
        {
          "s": "FX:USDCHF"
        },
        {
          "s": "FX:AUDUSD"
        },
        {
          "s": "FX:USDCAD"
        }
      ],
      "originalTitle": "Forex"
    }
  ]
}
  </script>
</div>
<!-- TradingView Widget END -->


    </center>
  </div>
</div><br>


<div class="w3-rest w3-padding-small">

<div class="w3-card-4 ads">

<header class="w3-container w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
  <big class="custom_tc">Advertisement</big>
</header>

<div class="w3-container w3-<?php echo $panelcolor ?>">
<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>
</div>
</div>

</div><br>

<?php
if (file_exists("myfiles/widgets/right.txt")){
$lines = file("myfiles/widgets/right.txt");
  for($i = 0; $i < count($lines); next($lines), $i++){
    if (strlen($lines[$i]) > 5){$pieces = explode("|", $lines[$i]);
      echo '<div class="w3-card-4 w3-'.$panelcolor.'">';
      if ($login == "on"){echo '<header class="w3-container w3-'.$user_color.'"';}else{echo '<header class="w3-container w3-'.$footercolor.'"';}echo '<big class="custom_tc">'.$pieces[0].'</big></header>';
        echo '<div class="w3-container" >';
          echo '<center>';
            echo $pieces[1];
          echo '</center>';
        echo '</div>';
      echo '</div><br>';
    }
  }
}
?>

<?php
if($rss == "Show"){
echo '<div class="w3-card-4">';
echo '<header class="w3-container w3-'; if ($login == "on"){echo $user_color;}else{echo $footercolor;} echo '"><big class="custom_tc">RSS News 3</big></header>';
echo '<div class="w3-container" >';
if(isMobile()){echo '<center><iframe src="sky-portal-rss3.php" style="border:0;width:100%;height:300px"></iframe></center>';}else{echo '<center><iframe src="sky-portal-rss3.php" style="border:0;width:280px;height:300px"></iframe></center>';}
echo '</div>';
echo '</div><br>';
}
?>



<div class="w3-card-4">

<header class="w3-container w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
  <big class="custom_tc">Sponsor Links</big>
</header>

<div class="w3-container w3-<?php echo $panelcolor ?>">
<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>
</div>
</div><br>


</div><br><br>


<?php 

if ($login == "on"){include $myprofile;} 

?>

<!-- Footer -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<footer class="w3-container <?php echo 'w3-'.$pagecolor.'' ?> w3-margin-top">
    <big>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <?php include "sky-links.php"; ?>
    </big>
  <p>&#169; <?php echo date("Y"); echo " ".$footertext ?></p>
</footer>

</body>
</html>

<!-- Modal -->
<div id="my_account" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('my_account').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>My Account</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" action="sky-account_edit.php?link=sky-portal&dir=portal-members" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>My Name</td>
        <td><input type="text" name="requiredname" placeholder="name" maxlength="25" value="<?php echo $name ?>" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" value="<?php echo $email ?>" readonly="readonly" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My City</td>
        <td><input type="text" name="requiredcity" placeholder="city" maxlength="25" value="<?php echo $city ?>" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My State</td>
        <td><input type="text" name="requiredstate" placeholder="state" maxlength="25" value="<?php echo $state ?>" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My Country</td>
        <td><input type="text" name="requiredcountry" placeholder="country" maxlength="25" value="<?php echo $country ?>" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My Zip</td>
        <td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" value="<?php echo $zip ?>" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Current Password</td>
        <td><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" value="<?php echo $pw1 ?>" readonly="readonly" maxlength="10" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>New Password</td>
        <td><input type="password" name="newpw1" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="10" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Verify New Password</td>
        <td><input type="password" name="newpw2" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="10" class="txtinput" size="40"></td> 
        </tr>

        </table>
        </center>

        <span style="display:none;">
        <INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20">
        <INPUT class="txtinput" name="color" id="color" value="<?php if (isset($_GET['color'])){echo $_GET['color'];}else{echo $color;} ?>" readonly="readonly" size="20">
        </span>
        <input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Save"/>
	</form>

    </div>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="join_now" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('join_now').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Sign Up</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account.php?link=sky-portal&dir=portal-members" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>My Name</td>
        <td><input type="text" name="requiredname" placeholder="name" maxlength="25" class="txtinput" size="40"></td> 
        </tr>
       
        <tr>
        <td>My Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" style="text-transform: lowercase;" maxlength="320" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My City</td>
        <td><input type="text" name="requiredcity" placeholder="city" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My State</td>
        <td><input type="text" name="requiredstate" placeholder="state" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My Country</td>
        <td><input type="text" name="requiredcountry" placeholder="country" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My Zip</td>
        <td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Your Password</td>
        <td><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="10" class="txtinput" size="40"></td> 
        </tr>


        <tr>
        <td>Verify Password</td>
        <td><input type="password" name="requiredpw2" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="10" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Sign Me Up" onclick="document.getElementById('category').value='Captcha@';"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Clear Details"></td>
        </tr>

        </table>
        </center>

        <span style="display:none;">
        <INPUT type="hidden" class="txtinput" class="txtinput" name="category" id="category" size="50" maxlength="20">
        <INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20">
        <INPUT class="txtinput" name="color" id="color" <?php if(isset($_GET['color'])){echo 'value="'.$_GET['color'].'"';}else{echo 'value="'.$footercolor.'"';} ?> readonly="readonly" size="20">
        </span>
	</form>

    </div>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="advertiser" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('advertiser').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Advertise</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account.php?link=sky-portal-login&dir=portal-members" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="40" class="txtinput" size="40"></td> 
        </tr>
       
        <tr>
        <td>Password</td>
        <td><input type="text" name="requiredpw1" placeholder="*******" maxlength="40" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Login"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Clear Details">&nbsp;<INPUT type="button"  onclick="document.getElementById('advertiser').style.display='none'; Robocop(); document.getElementById('forgot_pass').style.display='block'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Forgot Password"/></td>
        </tr>

        </table>
        </center>
	</form>

    </div>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="submiturl" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('submiturl').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Submit URL</h4>
    </header>

<form id="form_login" enctype="multipart/form-data" method="post" onSubmit="return checkrequired(this)" action="sky-add-url.php">
<center><br>

  <INPUT class="txtinput" name="requiredWebsite_TITLE" placeholder="Website Title" size="50"><br>
  <INPUT class="txtinput" name="requiredWebsite_URL" placeholder="Your URL" value="http://" size="50"><br>
  <input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Submit"/>

</center>
</form>

     <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('login').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Login</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account.php?link=sky-portal&dir=portal-members" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="40" class="txtinput" size="40"></td> 
        </tr>
       
        <tr>
        <td>Password</td>
        <td><input type="text" name="requiredpw1" placeholder="*******" maxlength="40" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Login"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Clear Details">&nbsp;<INPUT type="button"  onclick="document.getElementById('login').style.display='none'; Robocop(); document.getElementById('forgot_pass').style.display='block'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Forgot Password"/></td>
        </tr>

        </table>
        </center>
	</form>

    </div>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="email" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('email').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>You're Got Mail!</h4>
    </header><br><center>

 <div class="w3-cell w3-container">
  <div class="w3-card">
   <center>
    <img src="sky-admin/images/email.png" width="24px" height="24px">
    <a href="https://mail.aol.com/" class="custom_color" target="blank">
      <div class="w3-container">
        AOL
      </a>
     </center>
    </div>
  </div>

 <div class="w3-cell w3-container">
  <div class="w3-card">
   <center>
    <img src="sky-admin/images/email.png" width="24px" height="24px">
    <a href="https://mail.google.com" class="custom_color" target="blank">
      <div class="w3-container">
        Gmail
      </a>
     </center>
    </div>
  </div>

 <div class="w3-cell w3-container">
  <div class="w3-card">
   <center>
    <img src="sky-admin/images/email.png" width="24px" height="24px">
    <a href="https://www.live.com" class="custom_color" target="blank">
      <div class="w3-container">
        Live
      </a>
     </center>
    </div>
  </div>

 <div class="w3-cell w3-container">
  <div class="w3-card">
   <center>
    <img src="sky-admin/images/email.png" width="24px" height="24px">
    <a href="https://mail.yahoo.com/" class="custom_color" target="blank">
      <div class="w3-container">
        Yahoo
      </a>
     </center>
    </div>
  </div>

    </center><br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="forgot_pass" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('forgot_pass').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Forgot Password</h4>
    </header>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-forgot.php?link=sky-portal&dir=portal-members" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="40" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Send Password"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Clear Details"></td>
        </tr>

        </table>
        </center>
	</form>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="robot_check" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <h4>Robot Checker</h4>
    </header>
      <div class="w3-container" onclick="document.getElementById('myCheck').checked = true;document.getElementById('category').value='Captcha@';document.getElementById('robot_check').style.display='none';">
       <script src="sky-admin/Honeypot_Spam.js"></script>
      </div>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="linktous" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('linktous').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Link To Us</h4>
    </header><br><center>
<textarea cols="50" rows="2"><a href="<?php echo $link; ?>"><?php echo $title ?></a></textarea>
    </center><br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="color_change" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="document.getElementById('color_change').style.display='none'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Change Color</h4>
    </header><br><center>

    <button class="w3-aqua w3-xLarge" onclick="location.href='?color=aqua&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-amber w3-xLarge" onclick="location.href='?color=amber&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-black w3-xLarge" onclick="location.href='?color=black&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-blue w3-xLarge" onclick="location.href='?color=blue&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-blue-gray w3-xLarge" onclick="location.href='?color=blue-gray&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-brown w3-xLarge" onclick="location.href='?color=brown&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-cyan w3-xLarge" onclick="location.href='?color=cyan&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-dark-gray w3-xLarge" onclick="location.href='?color=dark-gray&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-deep-orange w3-xLarge" onclick="location.href='?color=deep-orange&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>

    <button class="w3-deep-purple w3-xLarge" onclick="location.href='?color=deep-purple&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-gray w3-xLarge" onclick="location.href='?color=gray&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-green w3-xLarge" onclick="location.href='?color=green&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-indigo w3-xLarge" onclick="location.href='?color=indigo&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-khaki w3-xLarge" onclick="location.href='?color=khaki&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-light-blue w3-xLarge" onclick="location.href='?color=light-blue&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-light-gray w3-xLarge" onclick="location.href='?color=light-gray&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-light-green w3-xLarge" onclick="location.href='?color=light-green&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-lime w3-xLarge" onclick="location.href='?color=lime&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>

    <button class="w3-orange w3-xLarge" onclick="location.href='?color=orange&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-pale-blue" onclick="location.href='?color=pale-blue&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-pale-green w3-xLarge" onclick="location.href='?color=pale-green&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-pale-red w3-xLarge" onclick="location.href='?color=pale-red&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-pale-yellow w3-xLarge" onclick="location.href='?color=pale-yellow&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-pink w3-xLarge" onclick="location.href='?color=pink&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-purple w3-xLarge" onclick="location.href='?color=purple&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-red w3-xLarge" onclick="location.href='?color=red&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-sand w3-xLarge" onclick="location.href='?color=sand&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>

    <button class="w3-teal w3-xLarge" onclick="location.href='?color=teal&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-white w3-xLarge" onclick="location.href='?color=white&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>
    <button class="w3-yellow w3-xLarge" onclick="location.href='?color=yellow&requiredemail=<?php echo $test_email ?>&link=sky-portal&dir=portal-members';">&nbsp;</button>

    </center><br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>

  <div id="id03" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container <?php echo 'w3-'.$footercolor ?>"> 
        <span onclick="document.getElementById('id03').style.display='none'" 
        class="w3-button w3-display-topright">X</span>
        <h2>Contact Us</h2>
      </header>
      <div class="w3-container">
        <big>
        <p><?php if($address){echo $address;} ?></p>
        <p><?php if($phone_number){echo $phone_number;} ?></p>
        <p><?php if($paypal){echo $paypal;} ?></p>
        <?php 
          if($hours){
            echo '<br><h1>Hours</h1>';
            echo '<p>'.$hours.'</p>';
          } 
        ?>
        </big>
      </div>
    </div>
  </div>


<script>

<!-- Original: wsabstract.com -->
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function checkrequired(which) {

Honeypot();

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

</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>