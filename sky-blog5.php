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
  $darkbox = "theme-dark";
}else{
  $darkbox = $footercolor;
}
?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
  <h1 class="w3-xxxlarge w3-text-theme">Side Navigation</h1>
  <button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
  <?php include "sky-menu.php"; ?>
</nav>

<!-- Header -->
<header class="w3-container w3-theme w3-padding w3-<?php echo $footercolor ?>" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme custom_tc"></i> 

<?php
  include "myfiles/settings-menu.php"; 
  if($menut1){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut1.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$footercolor.'">';
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
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$footercolor.'">';
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
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$footercolor.'">';
    if($link22){echo '<a href="'.$link22.'" class="w3-bar-item w3-button">'.$link21.'</a>';}
    if($link24){echo '<a href="'.$link24.'" class="w3-bar-item w3-button">'.$link23.'</a>';}
    if($link26){echo '<a href="'.$link26.'" class="w3-bar-item w3-button">'.$link25.'</a>';}
    if($link28){echo '<a href="'.$link28.'" class="w3-bar-item w3-button">'.$link27.'</a>';}
    if($link30){echo '<a href="'.$link30.'" class="w3-bar-item w3-button">'.$link29.'</a>';}
    echo '</div>';
    echo '</div>';
  }

  if (($type == "shop") || ($_GET['page'] == "shop")){
    echo '<a href="#home" class="w3-padding w3-button" onclick="mychart(); document.getElementById(\'mychart\').style.display=\'block\'">My Cart</a>';
  }

?>

  <div class="w3-center">
  <h4 class="w3-hide-small"><?php echo $title ?></h4>
  <h1 class="w3-xxxlarge w3-animate-bottom"><?php echo $subtitle ?></h1>
    <div class="w3-padding-32">
      <button class="w3-btn w3-xlarge w3-hover-light-grey w3-<?php echo $footercolor ?>" style="font-weight:900;"><a href="#link">View More</a></button>
    </div>
  </div>
</header>

<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-rest" id="link">
      <?php include "sky-engine.php"; ?>
</div>
</div>

<div class="w3-container">
<hr>

<?php
  if (($type !== "radio") && ($type !== "tv") && ($type !== "shop")) {
    echo '<div class="w3-container w3-center">';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
    echo '</div><hr>';
  } 
  if (isset($_GET['page'])) {
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog5.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog5.php?i='.$i.'";}</script>';
  }

?>

</div>

<!-- Footer -->
<footer class="w3-container w3-<?php echo $darkbox ?> w3-padding-16">
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

<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
// Side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "100%";
  x.style.fontSize = "40px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}


</script>

</body>
</html>

<style> 

html { scroll-behavior: smooth; } 

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

</style>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>