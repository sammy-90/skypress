<!DOCTYPE html>
<html lang="en">
<head>

  <?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
   $footercolor = str_replace("w3-", "", $footercolor); $footercolor = str_replace("-", "", $footercolor);
   $pagecolor = str_replace("w3-", "", $pagecolor); $pagecolor = str_replace("-", "", $pagecolor);
   if ($pagecolor == "white"){echo '<style>.shadow_man {color:black;}</style>';}
  ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title ?></title>
  <meta name="description" content="<?php echo $subtitle ?>">
  <meta name="keywords" content="<?php echo $keywords ?>">
  <meta name="author" content="<?php echo $author ?>">

  <link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="sky-admin/ajax/bootstrap.min.css">
  <link rel="stylesheet" href="sky-admin/w3.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="sky-admin/ajax/jquery-3.5.1.min.js"></script>
  <script src="sky-admin/ajax/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: <?php echo $pagecolor ?>; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: <?php echo $footercolor ?>; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: <?php echo $pagecolor ?>; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: <?php echo $footercolor ?>; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }

  html { scroll-behavior: smooth; } 

  <?php

    if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
    if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
    if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

  ?>

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><?php echo $title ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#about" onclick="document.getElementById('id01').style.display='block'">About</a></li>
      <li><a href="#bio" onclick="document.getElementById('id01').style.display='block'">Bio</a></li>
      <li><a href="#contact" onclick="document.getElementById('id02').style.display='block'">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center"><h3 class="shadow_man">
  <img src="myfiles/header.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Header" width="350" height="350">
  <h3 class="shadow_man"><?php echo $subtitle ?></h3>
</div>

  <!-- Menu Section -->
  <div class="w3-row" id="blogs">

    <?php include "sky-engine.php"; ?>

  </div>

<?php
 
 if ($type !== "main") {
  if (($type !== "radio") && ($type !== "tv") && ($type !== "shop")) {
    echo '<div class="w3-container w3-center">';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom w3-'.$lightbox.'" ONCLICK="history.go(-1)"><b>< Back</b></button>';
    echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom w3-'.$lightbox.'" OnClick="Next()"><b>Next ></b></button>';
    echo '</div>';
  }
  if (isset($_GET['page'])) {
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog17.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog17.php?i='.$i.'";}</script>';
  }
 }

?>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">

  <h3 class="margin" id="about">About</h3>
  <p><?php echo $about ?></p><br>
  <a href="sky-search.php" class="btn btn-default btn-lg">
    <i class="fa fa-search"></i> Search
  </a>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    

  <div class="row">
    <div class="col-sm-6"> 
      <h3 class="margin" id="bio">Bio</h3>
      <img src="myfiles/header2.jpg" class="img-responsive margin" style="width:100%" alt="header2">
      <p><?php echo $bio ?></p>
    </div>
    <div class="col-sm-6"> 
      <h3 class="margin" id="contact">Contact</h3>
      <img src="myfiles/header3.jpg" class="img-responsive margin" style="width:100%" alt="header3">
      <p><?php if($address){echo $address."<br>";} if($phone_number){echo $phone_number."<br>";}   if($hours){echo $hours;}?></p>
    </div>
  </div>

</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
    <p>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official custom_color"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram custom_color"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat custom_color"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p custom_color"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter custom_color"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin custom_color"></i></a>
    <?php include "sky-links.php"; ?>
    </p>
  <p class="custom_tc">&#169; <?php echo date("Y"); echo " ".$footertext ?></p>
</footer>

</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>