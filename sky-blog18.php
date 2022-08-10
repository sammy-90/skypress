<!DOCTYPE html>
<html lang="en">
<head>

  <?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
   $footercolor = str_replace("w3-", "", $footercolor); $footercolor = str_replace("-", "", $footercolor);
   $pagecolor = str_replace("w3-", "", $pagecolor); $pagecolor = str_replace("-", "", $pagecolor);
   if ($pagecolor == "white"){echo '<style>.shadow_man {color:black;}</style>';}else{echo '<style>.shadow_man {color:white;}</style>';}
   if ($footercolor == "white"){echo '<style>.shadow_man {color:black;}</style>';}else{echo '<style>.shadow_man {color:white;}</style>';}
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
    if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

  ?>

  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: <?php echo $footercolor ?>;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: <?php echo $footercolor ?>;
  }
  .logo-small {
    color: <?php echo $footercolor ?>;
    font-size: 50px;
  }
  .logo {
    color: <?php echo $footercolor ?>;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: <?php echo $footercolor ?>;
  }
  .carousel-indicators li {
    border-color: <?php echo $footercolor ?>;
  }
  .carousel-indicators li.active {
    background-color: <?php echo $footercolor ?>;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid <?php echo $footercolor ?>; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid <?php echo $footercolor ?>;
    background-color: #fff !important;
    color: <?php echo $footercolor ?>;
  }
  .panel-heading {
    color: #fff !important;
    background-color: <?php echo $footercolor ?> !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: <?php echo $footercolor ?>;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: <?php echo $footercolor ?>;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: <?php echo $footercolor ?> !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: <?php echo $footercolor ?>;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  html { scroll-behavior: smooth; } 
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><?php echo $title ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right hide_me">';
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#portfolio">PORTFOLIO</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1><?php echo $title ?></h1> 
  <p><?php echo $subtitle ?></p> 
    <form method="post" onSubmit="return checkrequired(this)" action="sky-squeeze-page2.php" enctype="multipart/form-data">
    <div class="input-group">
      <input type="text" class="form-control" size="50" placeholder="Email Address" id="requiredemail" name="requiredemail">
      <div class="input-group-btn">
        <button class="btn <?php echo "w3-".$footercolor ?>" type="submit">Subscribe</button>
      </div>
    </div>
  </form>
</div>

 <div class="w3-container" id="blogs">

  <?php 

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

<!-- Container (About Section) -->
<div id="about" class="container-fluid hide_me">
  <div class="row">
    <div class="col-sm-12">
     <center>
      <h2>About <?php echo $title ?></h2><br>
      <h4><?php echo $about ?></h4><br>
      <br><button class="btn btn-default btn-lg"><a href="#getintouch">Get in Touch</a></font></button>
     </center>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey hide_me">
  <div class="row">
    <div class="col-sm-12">
      <center>
      <h2 class="shadow_man">BIO</h2>
      <h4 class="shadow_man"><?php echo $bio ?></h4>
      </center>   
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center hide_me">
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

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey hide_me">
  <h2 class="shadow_man">Portfolio</h2><br>
  <h4 class="shadow_man">What we have created</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
        <img src="myfiles/header.jpg" alt="Header" title="Header" width="400" height="300">
    </div>
    <div class="col-sm-4">
        <img src="myfiles/header2.jpg" alt="Header2" title="Header2" width="400" height="300">
    </div>
    <div class="col-sm-4">
        <img src="myfiles/header3.jpg" alt="Header3" title="Header3" width="400" height="300">
    </div>
  </div><br>
  
  <h2 class="shadow_man">What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
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
        <h4 class="shadow_man"><?php echo $notes1 ?></h4>
      </div>
      <div class="item">
        <h4 class="shadow_man"><?php echo $notes2 ?></h4>
      </div>
      <div class="item">
        <h4 class="shadow_man"><?php echo $notes3 ?></h4>
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
</div>

<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid hide_me">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>

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
  </div></div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
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

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <i class="fa fa-angle-up official custom_color"></i>
  </a>
  <p>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official custom_color"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram custom_color"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat custom_color"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p custom_color"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter custom_color"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin custom_color"></i></a>
    </p>
  <p class="custom_tc">&#169; <?php echo date("Y"); echo " ".$footertext ?></p>
</footer>

<script>

<!-- Original: wsabstract.com -->
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function checkrequired(which) {

var pass=true;
if (document.images) {
for (i=0;i<which.length;i++) {
var tempobj=which.elements[i];
if (tempobj.name.substring(0,8)=="required") {
if (((tempobj.type=="text"||tempobj.type=="textarea")&&
tempobj.value=='')||(tempobj.type.toString().charAt(0)=="s"&&
tempobj.selectedIndex==0)) {
pass=false;
break;
         }
      }
   }
}
if (!pass) {
shortFieldName=tempobj.name.substring(8,30).toUpperCase();
alert("Please make sure the "+shortFieldName+" field was properly completed.");
return false;
}
else
return true;
}
//  End -->

$(document).ready(function(){
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
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})

</script>

</body>
</html>
