<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $lightbox = "theme-l5";
}
?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<style>
body {font-family: "Times New Roman", Georgia, Serif;}

h1{
  font-family: "Playfair Display";
  letter-spacing: 5px;
}

html { scroll-behavior: smooth; }

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

</style>


<?php 

  //Multi Site Function
  if (isset($_GET['page'])) {$type = $_GET['page'];}

  //This template only works in white
  $pagecolor = "white";

  echo '<body class="w3-'.$pagecolor.'">' 

?>

<!-- Navbar (sit on top) -->

<div class="w3-top <?php echo $effects ?>">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
      <a href="#home" class="w3-bar-item w3-button custom_color">Home</a>
<?php
  if (($type == "shop") || ($_GET['page'] == "shop")){
    echo '<a href="#home" class="w3-padding w3-button" onclick="mychart(); document.getElementById(\'mychart\').style.display=\'block\'">My Cart <i class="fa fa-shopping-cart w3-large w3-hover-opacity"></i></a>';
  }
?>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button custom_color">About</a>
      <a href="#blogs" class="w3-bar-item w3-button custom_color"><?php echo ucfirst($type); ?></a>
      <a href="#contact" class="w3-bar-item w3-button custom_color">Contact</a>
      <a href="sky-search.php" class="w3-bar-item w3-button custom_color">Search</a>
    </div>
  </div>
</div>

<!-- Header -->
<header id="home" class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="myfiles/header.jpg" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge w3-white"><?php echo $title ?></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px"><br><br>

<div class="w3-container">
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
<script>
function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script><br>

  <!-- About Section -->
  
    <div class="w3-container w3-half" id="about">
    <?php if (file_exists("myfiles/header.mp4")) {echo "<video class='txtinput' width='100%' height='100%' controls/><source src='myfiles/header.mp4' type='video/mp4'></video>";}else{if (file_exists("myfiles/header.jpg")) {echo "<img class='w3-round w3-image w3-opacity-min' src='myfiles/header.jpg' width='100%' height='100%'/>";}} ?>
    </div>

    <div class="w3-container w3-rest">
      <h1 class="w3-center">About <?php echo $title ?></h1>
      <p class="w3-large custom_tc"><?php echo $about ?></p>
    </div><br><br>
  
  
  <!-- Menu Section -->
  <div class="w3-row" id="blogs"><h1><center><?php if($type != "radio"){echo ucfirst($type);} ?></center></h1>

    <?php include "sky-engine.php"; ?>

  </div>

<?php
 
  if (($type !== "radio") && ($type !== "tv") && ($type !== "shop")) {
    echo '<div class="w3-container w3-center">';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom w3-'.$lightbox.'" ONCLICK="history.go(-1)"><b>< Back</b></button>';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom w3-'.$lightbox.'" OnClick="Next()"><b>Next ></b></button>';
    echo '</div>';
  }
  if (isset($_GET['page'])) {
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog3.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog3.php?i='.$i.'";}</script>';
  }

?>

<hr style="border-top: 1px solid <?php echo str_replace('-', '', $footercolor) ?>">

<?php 

  if(($address) || ($hours)){
    echo '<div class="w3-container w3-row w3-padding-32" id="contact">';
    echo '<b>Address</b><br>'.$address.'<br><br>';
    echo '<b>Hours</b><br>'.$hours.'<br>';
    echo '</div>';
  }

?>

<br><br>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center <?php echo "w3-".$footercolor ?> w3-padding-32">
    <big>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    </big>
    <br>
    <?php
    echo "<big>";
    include "sky-links.php";
    echo "</big>";
    ?>
  <p class="custom_tc">&#169; <?php echo date("Y"); echo " ".$footertext ?></p>
</footer>

</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>