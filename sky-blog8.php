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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "myfiles/settings-custom-links.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
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
<div class="<?php echo 'w3-'.$footercolor.'' ?>">
  <div class="w3-bar <?php echo 'w3-'.$footercolor.'' ?> w3-card">
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large"><?php echo $title ?></a>
      <div class="w3-right w3-dropdown-hover w3-dropdown-click <?php echo 'w3-'.$footercolor ?>">
        <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity"></i></a>
        <div id="Demo" class="w3-dropdown-content w3-bar-block <?php echo 'w3-'.$footercolor ?> w3-animate-zoom w3-margin-right" style="right:-15px">

<?php 

  if (($type == "shop") || ($_GET['page'] == "shop")){
    echo '<a href="#home" class="w3-bar-item w3-button" style="width:100%;text-align: left;" onclick="mychart(); document.getElementById(\'mychart\').style.display=\'block\'"><big>Cart</big></a>';
  }

  include "sky-menu.php"; 

?>

       </div>
      </div>
  </div>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">

  <!-- Automatic Slideshow Images -->
  <div class="w3-display-container w3-center">
    <img src="myfiles/header.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>

<?php
  include "myfiles/settings-menu.php"; 
  echo '&nbsp;<div class="w3-dropdown-hover"></div>';
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
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog8.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog8.php?i='.$i.'";}</script>';

    if($_GET['s'] == 1){
      echo '<div class="w3-row">';
      echo '<div class="w3-half w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-half w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

    if($_GET['s'] == 2){
      echo '<div class="w3-row">';
      echo '<div class="w3-third w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-third w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-third w3-container">';
      echo '<h2>'.$link3_title.'</h2>';
      if($link3_content){echo $link3_content;}else{echo "Custom Links 3 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

    if($_GET['s'] == 3){
      echo '<div class="w3-row">';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link3_title.'</h2>';
      if($link3_content){echo $link3_content;}else{echo "Custom Links 3 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link4_title.'</h2>';
      if($link4_content){echo $link4_content;}else{echo "Custom Links 4 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

    if($_GET['s'] == 4){
      echo '<div class="w3-row">';
      echo '<div class="w3-third w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-twothird w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

    if($_GET['s'] == 5){
      echo '<div class="w3-row">';
      echo '<div class="w3-twothird w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-third w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

    if($_GET['s'] == 6){
      echo '<div class="w3-row">';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-threequarter w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

    if($_GET['s'] == 7){
      echo '<div class="w3-row">';
      echo '<div class="w3-threequarter w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

    if($_GET['s'] == 8){
      echo '<div class="w3-row">';
      echo '<div class="w3-half w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link3_title.'</h2>';
      if($link3_content){echo $link3_content;}else{echo "Custom Links 3 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

    if($_GET['s'] == 9){
      echo '<div class="w3-row">';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link1_title.'</h2>';
      if($link1_content){echo $link1_content;}else{echo "Custom Links 1 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-quarter w3-container">';
      echo '<h2>'.$link2_title.'</h2>';
      if($link2_content){echo $link2_content;}else{echo "Custom Links 2 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '<div class="w3-half w3-container">';
      echo '<h2>'.$link3_title.'</h2>';
      if($link3_content){echo $link3_content;}else{echo "Custom Links 3 - Add Your Content";} echo "<br><br>";
      echo '</div>';
      echo '</div>';
    }

  }

  include "sky-engine.php"; 

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



</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>