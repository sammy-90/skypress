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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} 
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $lightbox = "theme-l5";
}else{
  $lightbox = $footercolor;
}
?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<style>
html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif;scroll-behavior: smooth;}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>
</style>
<?php echo '<body class="w3-'.$pagecolor.'">' ?>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-large w3-<?php echo $lightbox ?> <?php echo $effects ?>">
    <div class="w3-col s3">
<div class="w3-container" style="position: absolute;left:0">
  <?php
  if(!isMobile()){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button w3-'.$lightbox.'"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
  }else{
    echo '<div class="w3-dropdown-click">';
    echo '<button class="w3-button w3-'.$lightbox.'" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
  }
  ?>
    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border <?php echo 'w3-'.$pagecolor ?> w3-animate-zoom">

<?php

  if (($type == "shop") || ($_GET['page'] == "shop")){
    echo '<a href="#home" class="w3-bar-item w3-button" style="width:100%;text-align: left;" onclick="mychart(); document.getElementById(\'mychart\').style.display=\'block\'"><big>Cart</big></a>';
  }

  include "sky-menu.php"; 

?>
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
    </div>
    <div class="w3-col s3">
      &nbsp;
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block">About</a>
    </div>
    <div class="w3-col s3">
      <a href="#bio" class="w3-button w3-block">Bio</a>
    </div>
    <div class="w3-col s3">
      <a href="#contact" class="w3-button w3-block">Contact</a>
    </div>
  </div>
</div>

<!-- Content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

  <div class="w3-panel">
    <h1><b><?php echo $title ?></b></h1>
    <p><?php echo $subtitle ?></p>

<?php
  include "myfiles/settings-menu.php"; 
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

  <!-- Slideshow -->
  <div class="w3-container">
    <div class="w3-display-container mySlides">
      <img src="myfiles/header.jpg" style="width:100%">
      <div class="w3-display-topleft w3-container w3-padding-32">
      </div>
    </div>
    <div class="w3-display-container mySlides">
      <img src="myfiles/header2.jpg" style="width:100%">
      <div class="w3-display-middle w3-container w3-padding-32">
      </div>
    </div>
    <div class="w3-display-container mySlides">
      <img src="myfiles/header3.jpg" style="width:100%">
      <div class="w3-display-topright w3-container w3-padding-32">
      </div>
    </div>

    <!-- Slideshow next/previous buttons -->
    <div class="w3-container w3-dark-grey w3-padding w3-xlarge">
      <div class="w3-left" onclick="plusDivs(-1)"><i class="fa fa-arrow-circle-left w3-hover-text-teal"></i></div>
      <div class="w3-right" onclick="plusDivs(1)"><i class="fa fa-arrow-circle-right w3-hover-text-teal"></i></div>
    
      <div class="w3-center">
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
      </div>
    </div>
  </div>

  <!-- Grid --><br>
  <div class="w3-row-padding" id="about">
    <div class="w3-center w3-padding">
      <h3>About</h3>
      <p><?php echo $about ?></p>
    </div>
  </div>

  <!-- Grid --><br>
  <div class="w3-row-padding" id="bio">
    <div class="w3-center w3-padding">
      <h3>Bio</h3>
      <p><?php echo $bio ?></p>
    </div>
  </div>
  

<!-- Grid -->
<br><div class="w3-row">

<?php include "sky-engine.php"; ?>

<?php
  if (($type !== "radio") && ($type !== "tv") && ($type !== "shop")) {
    echo '<div class="w3-container w3-center">';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>&nbsp;';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
    echo '</div>';
  } 
  if (isset($_GET['page'])) {
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog6.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog6.php?i='.$i.'";}</script>';
  }

?>

<!-- END GRID -->
</div><br>

<?php 

  if(($address) || ($hours)){
    echo '<div class="w3-container w3-row w3-padding-32" id="contact">';
    echo '<b>Address</b><br>'.$address.'<br><br>';
    echo '<b>Hours</b><br>'.$hours;
    echo '</div>';
  }

?>        

</div>

<!-- Footer -->
<footer class="w3-container <?php echo 'w3-'.$footercolor.'' ?> w3-padding-32 w3-margin-top">
    <big>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <?php include "sky-links.php"; ?>
    </big>
  <p class="custom_tc">&#169; <?php echo date("Y"); echo " ".$footertext ?></p>
</footer>


<script>
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demodots");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>

</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>