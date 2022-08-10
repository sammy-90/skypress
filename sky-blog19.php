<!DOCTYPE html>
<html lang="en">
<head>

  <?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
   $footercolor = str_replace("w3-", "", $footercolor); $footercolor = str_replace("-", "", $footercolor);
   $pagecolor = str_replace("w3-", "", $pagecolor); $pagecolor = str_replace("-", "", $pagecolor);
   if ($pagecolor == "white"){echo '<style>.shadow_man {color:black;}</style>';$linkcolor = "black"; $fontcolor = "black";}else{echo '<style>.shadow_man {color:white;}</style>';}
   if ($footercolor == "white"){echo '<style>.shadow_man {color:black;}</style>';$linkcolor = "black"; $fontcolor = "black";}else{echo '<style>.shadow_man {color:white;}</style>';}
   $lightbox = $footercolor;
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

  <?php

    if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
    if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
    if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";echo ".custom_color2{color:".$linkcolor.";}";}

  ?>

  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;      
    font-size: 20px;
    color: #111;
  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {

    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: <?php echo $footercolor ?>;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #555;
  }
  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }
  .modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #777;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }  
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color:<?php echo $footercolor ?>;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  footer {
 
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }
  .panel-heading {
    color: #fff !important;
    background-color: <?php echo $footercolor ?> !important;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><?php echo $title ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right hide_me">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="sky-search.php"><i class="fa fa-search"></i></a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <?php if (file_exists("myfiles/settings-notes.php")){include "myfiles/settings-notes.php";}else{echo "Goto Admin > Application Settings > Notes > Settings > To edit Content below...<br>";} ?>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="myfiles/header.jpg" alt="Header" title="Header" width="1200" height="700">
        <div class="carousel-caption">
          <p><?php echo $notes1 ?></p>
        </div>      
      </div>

      <div class="item">
        <img src="myfiles/header2.jpg" alt="Header2" title="Header2" width="1200" height="700">
        <div class="carousel-caption">
          <p><?php echo $notes2 ?></p>
        </div>      
      </div>
    
      <div class="item">
        <img src="myfiles/header3.jpg" alt="Header3" title="Header3" width="1200" height="700">
        <div class="carousel-caption">
          <p><?php echo $notes3 ?></p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <i class="fa fa-angle-left shadow_man" aria-hidden="true"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <i class="fa fa-angle-right shadow_man" aria-hidden="true"></i>
      <span class="sr-only">Next</span>
    </a>
</div>

  <div class="w3-container" id="blogs">

  <?php 

    if($type != "business"){echo '<br>';} 

    if($type == "shop"){
        echo '<style>.hide_me{display: none;}</style>';
        echo '<div class="w3-row w3-center"><div class="w3-padding w3-button"><a href="#" onclick="mychart(); document.getElementById(\'mychart\').style.display=\'block\'"><i class="fa fa-shopping-cart w3-large w3-hover-opacity"></i> My Cart</a></div></div>';
    }


    if(($type == "radio") || ($type == "tv")){
        echo '<style>.hide_me{display: none;}</style>';
    }

    include "sky-engine.php";

    if(($type == "blog") || ($type == "music") || ($type == "videos") || ($type == "photos") || ($type == "games")){
        echo '<button class="w3-button w3-'.$footercolor.' w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>Back</b></button>&nbsp;';
        echo '<button class="w3-button w3-'.$footercolor.' w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next</b></button>';
        echo '<style>.hide_me{display: none;}</style>';
    } 

    if (isset($_GET['page'])) {
      echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
    }else{
      echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
    }

  ?>

 </div>

<!-- Container (The Band Section) -->
<div id="about" class="container text-center hide_me">
  <h3>ABOUT</h3>
  <p><?php echo $about ?></p>
</div>

<!-- Container (TOUR Section) -->
<div id="services" class="bg-1 hide_me">
  <div class="container">
    <h3 class="text-center">SERVICES</h3>
  </div>
    
  <div class="row text-center">
  <?php if (file_exists("myfiles/settings-custom-links.php")){include "myfiles/settings-custom-links.php";}else{echo "Goto Admin > Custom Links > To edit Content below...<br>";} ?>

  <div class="row slideanim">
    <div class="col-sm-4">
      <i class="fa fa-power-off w3-xxlarge"></i><br>
      <b><?php echo $link1_title ?></b>
      <p><?php echo $link1_content ?>..</p>
    </div>
    <div class="col-sm-4">
      <i class="fa fa-heart w3-xxlarge"></i><br>
      <b><?php echo $link2_title ?></b>
      <p><?php echo $link2_content ?>..</p>
    </div>
    <div class="col-sm-4">
      <i class="fa fa-lock w3-xxlarge"></i><br>
      <b><?php echo $link3_title ?></b>
      <p><?php echo $link3_content ?>..</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <i class="fa fa-leaf w3-xxlarge"></i><br>
      <b><?php echo $link4_title ?></b>
      <p><?php echo $link4_content ?>..</p>
    </div>
    <div class="col-sm-4">
      <i class="fa fa-certificate w3-xxlarge"></i><br>
      <b><?php echo $link5_title ?></b>
      <p><?php echo $link5_content ?>..</p>
    </div>
    <div class="col-sm-4">
      <i class="fa fa-wrench w3-xxlarge"></i><br>
      <b><?php echo $link6_title ?></b>
      <p><?php echo $link6_content ?>..</p>
    </div>
   </div><br><br>


    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <?php if (file_exists("myfiles/settings-custom-links.php")){include "myfiles/settings-custom-links.php";}else{echo "Goto Admin > Custom Links > To edit Content below...<br>";} ?>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <i class="fa fa-power-off w3-xxlarge"></i>
      <h4><?php echo $link1_title ?></h4>
      <p><?php echo $link1_content ?>..</p>
    </div>
    <div class="col-sm-4">
      <i class="fa fa-heart w3-xxlarge"></i>
      <h4><?php echo $link2_title ?></h4>
      <p><?php echo $link2_content ?>..</p>
    </div>
    <div class="col-sm-4">
      <i class="fa fa-lock w3-xxlarge"></i>
      <h4><?php echo $link3_title ?></h4>
      <p><?php echo $link3_content ?>..</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <i class="fa fa-leaf w3-xxlarge"></i>
      <h4><?php echo $link4_title ?></h4>
      <p><?php echo $link4_content ?>..</p>
    </div>
    <div class="col-sm-4">
      <i class="fa fa-certificate w3-xxlarge"></i>
      <h4><?php echo $link5_title ?></h4>
      <p><?php echo $link5_content ?>..</p>
    </div>
    <div class="col-sm-4">
      <i class="fa fa-wrench w3-xxlarge"></i>
      <h4><?php echo $link6_title ?></h4>
      <p><?php echo $link6_content ?>..</p>
    </div>

    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="pricing" class="container hide_me">
  <h3 class="text-center">PRICING</h3>
  <p class="text-center"><em>Choose a payment plan that works for you!</em></p>

  <div class="row">

<?php

//packages
if(file_exists("myfiles/settings-packages.php")){include "myfiles/settings-packages.php";

echo '<div class="w3-row-padding">';

echo '<div class="w3-third w3-margin-bottom">';
  echo '<ul class="w3-ul w3-border w3-center w3-hover-shadow">';
    echo '<li class="w3-xlarge w3-padding-32 panel-heading">Basic</li>';
    echo '<div class="w3-padding-16 w3-white">'.$features1_basic.'</div>';
    echo '<div class="w3-padding-16 w3-white">'.$features2_basic.'</div>';
    echo '<li class="w3-padding-16 w3-white">'.$features3_basic.'</li>';
    echo '<li class="w3-padding-16 w3-white">';
      echo '<h2 class="w3-wide">$'.$features5_basic.'</h2>';
      echo '<span class="w3-opacity">'.$pay.'</span>';
    echo '</li>';
    echo '<li class="w3-white w3-padding-24">';


if($pay == "One Time"){

echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_xclick">';
echo '<input type="hidden" name="business" value="'.$paypal.'">';
echo '<input type="hidden" name="currency_code" value="USD">';
echo '<input type="hidden" name="item_name" value="Basic Package">';
echo '<input type="hidden" name="amount" value="'.$features5_basic.'">';
echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note Basic Package, your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'Memo: add note Basic Package, your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
echo '</form>';

}else{

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> ';
echo '  <input type="hidden" name="cmd" value="_xclick-subscriptions" >';
echo '  <input type="hidden" name="business" value="'.$paypal.'" >';
echo '  <input type="hidden" name="item_name" value="Basic Package"> ';
echo '  <input type="hidden" name="item_number" value="123" >';
echo '  <input type="hidden" name="no_shipping" value="1" >';
echo '  <input type="hidden" name="a1" value="'.$features5_basic.'" >';
echo '  <input type="hidden" name="p1" value="1" >';
echo '  <input type="hidden" name="t1" value="M" >';
echo '  <input type="hidden" name="a3" value="'.$features5_basic.'" >';
echo '  <input type="hidden" name="p3" value="1" >';
echo '  <input type="hidden" name="t3" value="M" >';
echo '  <input type="hidden" name="src" value="1" >';
echo '  <input type="hidden" name="sra" value="1" >';
echo '  <input type="hidden" name="no_note" value="1" >';
echo '  <input type="hidden" name="invoice" value="invoicenumber" >';
echo '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >';
echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" >';
echo '</form> ';

}


    echo '</li>';
  echo '</ul>';
echo '</div>';

echo '<div class="w3-third w3-margin-bottom">';
  
echo '<ul class="w3-ul w3-border w3-center w3-hover-shadow">';
    echo '<li class="w3-xlarge w3-padding-32 panel-heading">Pro</li>';
    echo '<div class="w3-padding-16 w3-white">'.$features1_pro.'</div>';
    echo '<div class="w3-padding-16 w3-white">'.$features2_pro.'</div>';
    echo '<li class="w3-padding-16 w3-white">'.$features3_pro.'</li>';
    echo '<li class="w3-padding-16 w3-white">';
      echo '<h2 class="w3-wide">$'.$features5_pro.'</h2>';
      echo '<span class="w3-opacity">'.$pay.'</span>';
    echo '</li>';
    echo '<li class="w3-white w3-padding-24">';


if($pay == "One Time"){

echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_xclick">';
echo '<input type="hidden" name="business" value="'.$paypal.'">';
echo '<input type="hidden" name="currency_code" value="USD">';
echo '<input type="hidden" name="item_name" value="PRO Package">';
echo '<input type="hidden" name="amount" value="'.$features5_pro.'">';
echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note Pro Package, your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'Memo: add note Pro Package, your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
echo '</form>';

}else{

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> ';
echo '  <input type="hidden" name="cmd" value="_xclick-subscriptions" >';
echo '  <input type="hidden" name="business" value="'.$paypal.'" >';
echo '  <input type="hidden" name="item_name" value="PRO Package"> ';
echo '  <input type="hidden" name="item_number" value="123" >';
echo '  <input type="hidden" name="no_shipping" value="1" >';
echo '  <input type="hidden" name="a1" value="'.$features5_pro.'" >';
echo '  <input type="hidden" name="p1" value="1" >';
echo '  <input type="hidden" name="t1" value="M" >';
echo '  <input type="hidden" name="a3" value="'.$features5_pro.'" >';
echo '  <input type="hidden" name="p3" value="1" >';
echo '  <input type="hidden" name="t3" value="M" >';
echo '  <input type="hidden" name="src" value="1" >';
echo '  <input type="hidden" name="sra" value="1" >';
echo '  <input type="hidden" name="no_note" value="1" >';
echo '  <input type="hidden" name="invoice" value="invoicenumber" >';
echo '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >';
echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" >';
echo '</form> ';

}

    echo '</li>';
  echo '</ul>';
echo '</div>';

echo '<div class="w3-third w3-margin-bottom">';
  echo '<ul class="w3-ul w3-border w3-center w3-hover-shadow">';
    echo '<li class="w3-xlarge w3-padding-32 panel-heading">Premium</li>';
    echo '<div class="w3-padding-16 w3-white">'.$features1_pre.'</div>';
    echo '<div class="w3-padding-16 w3-white">'.$features2_pre.'</div>';
    echo '<li class="w3-padding-16 w3-white">'.$features3_pre.'</li>';
    echo '<li class="w3-padding-16 w3-white">';
      echo '<h2 class="w3-wide">$'.$features5_pre.'</h2>';
      echo '<span class="w3-opacity">'.$pay.'</span>';
    echo '</li>';
    echo '<li class="w3-white w3-padding-24">';

if($pay == "One Time"){

echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_xclick">';
echo '<input type="hidden" name="business" value="'.$paypal.'">';
echo '<input type="hidden" name="currency_code" value="USD">';
echo '<input type="hidden" name="item_name" value="Premium Package">';
echo '<input type="hidden" name="amount" value="'.$features5_pre.'">';
echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note Premium Package, your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'Memo: add note Premium Package, your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
echo '</form>';

}else{

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> ';
echo '  <input type="hidden" name="cmd" value="_xclick-subscriptions" >';
echo '  <input type="hidden" name="business" value="'.$paypal.'" >';
echo '  <input type="hidden" name="item_name" value="Premium Package"> ';
echo '  <input type="hidden" name="item_number" value="123" >';
echo '  <input type="hidden" name="no_shipping" value="1" >';
echo '  <input type="hidden" name="a1" value="'.$features5_pre.'" >';
echo '  <input type="hidden" name="p1" value="1" >';
echo '  <input type="hidden" name="t1" value="M" >';
echo '  <input type="hidden" name="a3" value="'.$features5_pre.'" >';
echo '  <input type="hidden" name="p3" value="1" >';
echo '  <input type="hidden" name="t3" value="M" >';
echo '  <input type="hidden" name="src" value="1" >';
echo '  <input type="hidden" name="sra" value="1" >';
echo '  <input type="hidden" name="no_note" value="1" >';
echo '  <input type="hidden" name="invoice" value="invoicenumber" >';
echo '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >';
echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" >';
echo '</form>';

}

    echo '</li>';
  echo '</ul>';
echo '</div>';

echo '</div>';

}

?>

  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-1">
  <h2 class="text-center shadow_man" id="getintouch">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p class="shadow_man"><?php if(strlen($contact_msg)>3){echo "$contact_msg";} ?></p>
      <p class="shadow_man"><i class="fa fa-map" aria-hidden="true"></i> <?php echo $address ?></p>
      <p class="shadow_man"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $phone_number ?></p>
      <p class="shadow_man"><i class="fa fa-envelope-o" aria-hidden="true"></i></span> <?php echo $paypal ?></p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
<?php
$action=$_REQUEST['action'];
if ($action==""){
  echo '<form action="" method="POST" enctype="multipart/form-data">';
  echo '<input type="hidden" name="action" value="submit">';
  echo '<div class="col-sm-6 form-group">';
  echo '<input name="name" type="text" value="" class="form-control" placeholder="Name"/></div>';
  echo '<div class="col-sm-6 form-group">';
  echo '<input name="email" type="text" value="" class="form-control" placeholder="Email"/></div>';
  echo '</div>';


  echo '<textarea name="message"  class="form-control" rows="5" placeholder="Comment"></textarea><br>';

  echo '<div class="row">';
  echo '<div class="col-sm-12 form-group">';
  echo '<button class="btn btn-default pull-right" type="submit">Send</button>';
  echo '</form>';
  echo '</div>';
  echo '</div>';

}else{
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $message=$_REQUEST['message'];
  if (($name=="")||($email=="")||($message=="")){
    echo "All fields are required, please fill <a href=\"\"><u>the form</u></a> again.";  
  }else{
   include "sky-antispam.php";
   $subject="Message sent using your contact form";
   mail($paypal, $subject, $message." from ".$email);
   echo "Email sent!";
  }
}
?>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center custom_color2">
  <a href="#myPage" title="To Top">
    <i class="fa fa-angle-up official custom_color2"></i>
  </a>
  <p>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official custom_color2"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram custom_color2"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat custom_color2"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p custom_color2"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter custom_color2"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin custom_color2"></i></a>
    </p>
  <p class="custom_tc custom_color2">&#169; <?php echo date("Y"); echo " ".$title ?></p>
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>