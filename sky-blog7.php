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
<div class="w3-top <?php echo 'w3-'.$lightbox.'' ?> <?php echo $effects ?>" >
  <div class="w3-bar <?php echo 'w3-'.$lightbox.'' ?> w3-card">
    <a href="#home" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="#about" class="w3-bar-item w3-button w3-padding-large">About</a>
    <a href="#bio" class="w3-bar-item w3-button w3-padding-large">Bio</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large">Contact</a>

<?php

  if (($type == "shop") || ($_GET['page'] == "shop")){
    echo '<a href="#"  class="w3-bar-item w3-button w3-padding-large" onclick="mychart(); document.getElementById(\'mychart\').style.display=\'block\'">Cart</a>';
  }

?>

    <a href="sky-search.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
  </div>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px" id="home" >

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="myfiles/header.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="myfiles/header2.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="myfiles/header3.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>

<div class="w3-container" style="position: absolute;left:0">
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
<?php
  include "myfiles/settings-menu.php"; 
  echo '<div class="w3-dropdown-hover"></div>';
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
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
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
  
<!-- End Page Content -->
<br></div>

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
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>