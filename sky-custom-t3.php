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

<?php if (file_exists("myfiles/settings-custom-t.php")){include "myfiles/settings-custom-t.php";}else{echo "Please Publish Your Custom Template... Admin > Application Settings > Custom Template	> Settings
 ";} ?>

<!-- Navbar (sit on top) -->

<div class="w3-top <?php echo $effects ?>">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
      <a href="sky-blog3.php" class="w3-bar-item w3-button custom_color">Home</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right">
      <a href="#" onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button custom_color">About</a>
      <a href="#" onclick="document.getElementById('id02').style.display='block'" class="w3-bar-item w3-button custom_color">Contact</a>
      <a href="sky-search.php" class="w3-bar-item w3-button custom_color">Search</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="myfiles/header.jpg" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge w3-white"><?php echo $title ?></h1>
  </div>
</header>

<!-- Page content -->
<br><div class="w3-content" style="max-width:1100px">

<?php echo $txt ?>

</div><br>

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

<font color="black">
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container <?php echo 'w3-'.$footercolor ?>"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">X</span>
        <h2>About <?php echo $title ?></h2>
      </header>
      <div class="w3-container">
        <p class="w3-large"><?php echo $about ?></p>
      </div>
    </div>
  </div>

  <div id="id02" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container <?php echo 'w3-'.$footercolor ?>"> 
        <span onclick="document.getElementById('id02').style.display='none'" 
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

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>