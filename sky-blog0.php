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
h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
body {font-family: "Open Sans"}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>
</style>
<?php echo '<body class="w3-'.$pagecolor.'">' ?>

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Image header -->
  <header class="w3-display-container w3-wide">
    <img class="w3-image" src="myfiles/header.jpg" width="1600" height="1060">
    <div class="w3-display-left w3-padding-large">
      <h1 class="w3-text-white"><?php echo $title ?></h1>
      <h1 class="w3-jumbo w3-text-white w3-hide-small"><b><?php echo ucfirst(str_replace('2', '', $type)); ?></b></h1>
      <h6><button class="w3-button w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off"><a href="#home">View More</a></button></h6>
    </div>
  </header>

<div style="position: absolute;top:0;">
<div class="dropdown">
  <span style="color:white;"><i class="fa fa-bars w3-large w3-hover-opacity"style="padding:5px"></i></span>
  <div class="dropdown-content w3-<?php echo $footercolor; ?>">
  <?php include "sky-menu.php"; ?>
  </div>
</div>

<?php
  include "myfiles/settings-menu.php"; 
  echo '<div class="w3-dropdown-hover"></div>';
  if($menut1){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button"><font color="white">'.$menut1.'</font></button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-'.$footercolor.'">';
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
    echo '<button class="w3-button"><font color="white">'.$menut2.'</font></button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-'.$footercolor.'">';
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
    echo '<button class="w3-button"><font color="white">'.$menut3.'</font></button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-'.$footercolor.'">';
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



<!-- Navigation bar with social media icons -->
<div class="w3-bar w3-border-bottom <?php echo 'w3-'.$lightbox ?>"style="padding:16px">
    <a href="sky-import.php" class="w3-bar-item w3-button" >Home</a>
    <a href="#about" class="w3-bar-item w3-button" >About</a>
    <a href="index.php?page=blog" class="w3-bar-item w3-button">Blog</a>
    <a href="#contact" class="w3-bar-item w3-button"">Contact</a>
    <a href="<?php echo 'sky-search.php' ?>" class="w3-bar-item w3-button w3-right"><i class="fa fa-search"></i></a>
</div>
<?php
 
  if (isset($_GET['page'])) {
    echo '<div class="w3-row w3-padding w3-border" id="blog">';
    include "sky-engine.php";
    echo '</div>';
    if (($type !== "radio") && ($type !== "tv")) {
      echo '<footer class="w3-container" style="padding:32px">';
      echo '<center>';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>Back</b></button>';
      echo '<a href="#" class="w3-button w3-white w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next</b></button>';
      echo '</center>';
      echo '</footer>';
    }
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog0.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog0.php?i='.$i.'";}</script>';
  }

if (!isset($_GET['page'])) {
echo '<div class="w3-row w3-padding-64" id="home">';
echo '<center>';
echo $title." ".$subtitle;
echo '</center>';
echo '</div>';
}

if (file_exists("myfiles/header2.jpg")) {
  echo '<!-- Image header -->';
  echo '<header class="w3-display-container w3-wide" id="home">';
    echo '<img class="w3-image" src="myfiles/header2.jpg" width="1600" height="1060">';
    echo '<div class="w3-display-left w3-padding-large">';
      echo '<h1 class="w3-jumbo w3-text-white w3-hide-small"><b>About</b></h1>';
      echo '<h6><button class="w3-button w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off"><a href="#about">View More</a></button></h6>';
    echo '</div>';
  echo '</header>';
}
  echo '<div class="w3-row w3-padding-64" id="about">';
  echo '<center>';
  echo $about;
  echo '</center>';
  echo '</div>';
?>

<?php
if (file_exists("myfiles/header3.jpg")) {
  echo '<!-- Image header -->';
  echo '<header class="w3-display-container w3-wide">';
    echo '<img class="w3-image" src="myfiles/header3.jpg" width="1600" height="1060">';
    echo '<div class="w3-display-left w3-padding-large">';
      echo '<h1 class="w3-jumbo w3-text-white w3-hide-small"><b>Contact</b></h1>';
      echo '<h6><button class="w3-button w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off"><a href="#contact">View More</a></button></h6>';
    echo '</div>';
  echo '</header>';
}
  if(($address) || ($hours)){
    echo '<div class="w3-container w3-row w3-padding-32" id="contact">';
    echo '<b>Address</b><br>'.$address.'<br><br>';
    echo '<b>Hours</b><br>'.$hours.'<br>';
    echo '</div>';
  }
?>


<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container <?php echo 'w3-'.$footercolor.'' ?>" style="padding:32px">
    <a href="<?php echo $fb ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?php echo $instagram ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" class="w3-bar-item w3-button" target="_blank""><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <?php include "sky-links.php"; ?>
    <p>&#169; <?php echo date("Y"); echo " ".$footertext ?></p>
</footer>


</body>
</html>

<style>html { scroll-behavior: smooth; }</style>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>