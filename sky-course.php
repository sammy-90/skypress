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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<?php if (file_exists("myfiles/settings-course.php")){include "myfiles/settings-course.php";}else{echo "Please 'Publish' Your Course... Admin > Application Settings > Course > Publish"; exit; } 
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $lightbox = "theme-l5";
  $panelcolor = "theme-l5";
}
?>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<style>

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; }

</style>

<body id="myPage" <?php echo 'class="w3-'.$pagecolor.'"' ?>>

<!-- Navbar -->
<div class="<?php echo $effects ?> w3-top">
 <div class="w3-bar <?php echo 'w3-'.$footercolor.'' ?> w3-left-align">
  <a class="w3-bar-item w3-button w3-right w3-hover-white" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button"><big><?php echo $title ?></big></a>
  
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block <?php echo 'w3-'.$footercolor.'' ?> w3-hide" style="overflow-y: scroll;height:500px;">
<a onclick="document.getElementById('login').style.display='block'" class="w3-bar-item w3-button"><big>Login</big></a>
<?php include "sky-menu.php"; ?>

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
  </div>
</div>


<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="myfiles/header.jpg" alt="header" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    <button onclick="document.getElementById('id011').style.display='block'" class="w3-button w3-xlarge w3-round w3-centered <?php echo $effects ?> <?php echo 'w3-'.$footercolor.'' ?>" title="Start Learning Now">Start Learning Now</button>
  </div>
</div>

<!-- Modal -->
<div id="id011" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container <?php echo 'w3-'.$footercolor.'' ?> w3-display-container"> 
      <span onclick="document.getElementById('id011').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor.'' ?> w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Intro Video</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("myfiles/header.mp4")) {echo "<video class='txtinput' width='100%' height='100%' controls/><source src='myfiles/header.mp4' type='video/mp4'></video>";}else{echo "Please upload video named 'header.mp4' or to your 'myfiles' folder using ftp.";} ?>
    </div>
    <footer class="w3-container <?php echo 'w3-'.$footercolor.'' ?>">
      <br>
    </footer>
  </div>
</div>

<?php
  include "myfiles/settings-menu.php"; 
  echo '<div class="w3-dropdown-hover"></div>';
  if($menut1){
    echo '<br><div class="w3-dropdown-hover">';
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

<!-- Team Container -->
<div class="w3-container w3-center" id="team">
  <h2 class="custom_tc"><?php echo $subtitle ?></h2>
  <p class="custom_tc"><?php echo $about ?></p>
</div><br>

<!-- Grid -->
<div class="w3-row">

<?php include "sky-engine.php"; ?>

<?php
 
  if (isset($_GET['page'])) {
    if (($type !== "radio") && ($type !== "tv")) {
      echo '<div class="w3-container w3-center">';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>&nbsp;';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
      echo '</div><br>';
    }
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
  }

?>

<!-- END GRID -->
</div>

<center>

<?php
if(!isMobile()){
  echo '<div class="w3-card-4" style="width:75%;">';
}else{
  echo '<div class="w3-card-4" style="width:100%">';
}
?>

<header class="w3-container w3-light-grey w3-<?php echo $lightbox ?>">
  <h3><?php echo $author ?></h3>
</header>

<div class="w3-container">
  <?php
  if(!isMobile()){
    echo '<img src="myfiles/photo.jpg" alt="Avatar" height="320" class="w3-margin w3-left w3-circle txtinput">';
  }else{
    echo '<img src="myfiles/photo.jpg" alt="Avatar" class="w3-margin w3-circle txtinput">';
  }
  ?>
  <p style="text-align: left;" class="custom_tc">
   <?php echo $bio; ?>
  </p>
</div>

<button class="w3-button w3-block w3-dark-grey w3-<?php echo $lightbox ?>">+ Your Instructor</button>

</div> 
</center>


<!-- Work Row -->
<div class="w3-row-padding" id="work">
<br><center><h2>Courses</h2></center><br>

<?php

  if($ctitle1){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle1.'</h3>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle1.' $'.$student_price1.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="1 - '.$ctitle1.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price1.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price1.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle1.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price1.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle1.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle2){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle2.'</h3>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle2.' $'.$student_price2.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="2 - '.$ctitle2.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price2.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price2.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle2.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price2.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle2.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle3){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle3.'</h3>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle3.' $'.$student_price3.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="3 - '.$ctitle3.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price3.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price3.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle3.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price3.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle3.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle4){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle4.'</h3>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle4.' $'.$student_price4.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="4 - '.$ctitle4.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price4.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price4.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle4.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price4.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle4.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }


  if($ctitle5){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle5.'</h3>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle5.' $'.$student_price5.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="5 - '.$ctitle5.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price5.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price5.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle5.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price5.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle5.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle6){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle6.'</h3>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle6.' $'.$student_price6.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="6 - '.$ctitle6.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price6.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price6.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle6.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price6.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle6.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle7){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle7.'</h3>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle7.' $'.$student_price7.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="7 - '.$ctitle7.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price7.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price7.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle7.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price7.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle7.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle8){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle8.'</h3>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle8.' $'.$student_price8.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="8 - '.$ctitle8.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price8.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price8.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle8.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price8.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle8.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle9){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle9.'</h4>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle9.' $'.$student_price9.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="9 - '.$ctitle9.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price9.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price9.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle9.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price9.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle9.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle10){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle10.'</h4>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle10.' $'.$student_price10.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="10 - '.$ctitle10.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price10.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price10.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle10.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price10.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle10.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle11){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle11.'</h4>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle11.' $'.$student_price11.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="11 - '.$ctitle11.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price11.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price11.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle11.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price11.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle11.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

  if($ctitle12){
    echo '<div class="w3-quarter w3-padding">';
    echo '<div class="w3-card w3-round">';
    echo '<div class="w3-container w3-'.$footercolor.'">';
    echo '<h3>'.$ctitle12.'</h4>';
    echo '</div>';
    echo '</div>';
    echo '<div class="w3-container w3-white">';
    echo '<h4>'.$csubtitle12.' $'.$student_price12.'</h4>';
    echo '<center>';
    echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
    echo '<input type="hidden" name="cmd" value="_xclick">';
    echo '<input type="hidden" name="business" value="'.$paypal.'">';
    echo '<input type="hidden" name="currency_code" value="USD">';
    echo '<input type="hidden" name="item_name" value="12 - '.$ctitle12.'">';
    echo '<input type="hidden" name="amount" value="'.$student_price12.'">';
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price12.' to '.$cashapp.'\r\n'.'For: add note '.$ctitle12.', your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
    echo '<a href="#" onClick="alert(\'Send payment of $'.$student_price12.' to '.$author.' '.$zelle.'\r\n'.'Memo: add note '.$ctitle12.', your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
    echo '</form>';
    echo '</center><br><br>';
    echo '</div>';
    echo '</div>';
  }

?>

</div><br>

<?php if ($ads_code){echo "<div class='w3-container w3-center'>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php";} ?>
 
<!-- Footer -->
<footer class="w3-container w3-padding <?php echo 'w3-'.$footercolor.'' ?> w3-center">
  <h4>Follow Me</h4>

    <a href="<?php echo $fb ?>" class="w3-button w3-large w3-white" target="_blank"><i class="fa fa-facebook-official"></i></a>
    <a href="<?php echo $instagram ?>" class="w3-button w3-large w3-white" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" class="w3-button w3-large w3-white" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" class="w3-button w3-large w3-white" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" class="w3-button w3-large w3-white" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" class="w3-button w3-large w3-white" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>

    <?php include "sky-links.php"; ?>

    <p class="custom_tc">&#169; <?php echo date("Y"); echo " ".$footertext ?></p>

</footer>


<!-- Modal -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('login').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Login</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-course2.php" enctype="multipart/form-data">
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
        <td><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Login"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear Details">&nbsp;<INPUT type="button"  onclick="document.getElementById('login').style.display='none'; Robocop(); document.getElementById('forgot_pass').style.display='block'" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Forgot Password"/></td>
        </tr>

        </table>
        </center>
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<script>

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
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