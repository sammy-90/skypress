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
  <link rel="stylesheet" href="sky-admin/w3.css">

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="sky-admin/ajax/bootstrap.7.0.4.css" rel="stylesheet" />
    </head>
    <body id="myPage">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 w3-white" style="color:black" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top" style="color:black"><?php echo $title ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 hide_me">
        <li class="nav-item"><a class="nav-link" style="color:black" href="#about">ABOUT</a></li>
        <li class="nav-item"><a class="nav-link" style="color:black" href="#services">SERVICES</a></li>
        <li class="nav-item"><a class="nav-link" style="color:black" href="#pricing">PRICING</a></li>
        <li class="nav-item"><a class="nav-link" style="color:black" href="#contact">CONTACT</a></li>
        <li class="nav-item"><a class="nav-link" style="color:black" href="sky-search.php"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold"><?php echo $subtitle ?></h1>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <a class="btn w3-<?php echo $footercolor ?> btn-xl" href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>


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


        <!-- About-->
        <section class="page-section w3-<?php echo $footercolor ?> hide_me" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">About</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4"><?php echo $about ?></p>
                        <a class="btn btn-light btn-xl" href="#services">Get Started!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section hide_me" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">At Your Service</h2>
                <hr class="divider w3-<?php echo $footercolor ?>" />
                <div class="row gx-4 gx-lg-5">
                  <?php if (file_exists("myfiles/settings-custom-links.php")){include "myfiles/settings-custom-links.php";}else{echo "Goto Admin > Custom Links > To edit Content below...<br>";} ?>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
      				<h3 class="h4 mb-2"><?php echo $link1_title ?></h3>
      				<p><?php echo $link1_content ?>..</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
      				<h3 class="h4 mb-2"><?php echo $link2_title ?></h3>
      				<p><?php echo $link2_content ?>..</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
      				<h3 class="h4 mb-2"><?php echo $link3_title ?></h3>
      				<p><?php echo $link3_content ?>..</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
      				<h3 class="h4 mb-2"><?php echo $link4_title ?></h3>
      				<p><?php echo $link4_content ?>..</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to action-->
        <section class="page-section w3-<?php echo $footercolor ?> text-white hide_me">
            <div class="container px-4 px-lg-5 text-center" id="pricing">
                <h2 class="mb-4">Pricing</h2>
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
            </div>
        </section>


        <!-- Contact-->
        <section class="page-section" id="contact">
	    <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider w3-<?php echo $footercolor ?>" />
                        <p class="text-muted mb-5"><?php if(strlen($contact_msg)>3){echo "$contact_msg";} ?></p>
                    </div>
                </div>
            
  <div class="row">
    <div class="col-sm-5">
      <p><i class="fa fa-map" aria-hidden="true"></i> <?php echo $address ?></p>
      <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $phone_number ?></p>
      <p><i class="fa fa-envelope-o" aria-hidden="true"></i></span> <?php echo $paypal ?></p>
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
  echo '<button class="btn btn-default pull-right w3-'.$footercolor.'" type="submit">Send</button>';
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
  </div>

        </section>
        <!-- Footer-->
        <footer class="w3-<?php echo $footercolor ?> sa py-5">
            <div class="px-4 px-lg-5"><div class="small text-center text-muted">

  <a href="#myPage" title="To Top">
    <i class="fa fa-angle-up official shadow_man"></i>
  </a>
  <p>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official shadow_man"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram shadow_man"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat shadow_man"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p shadow_man"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter shadow_man"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin shadow_man"></i></a>
    </p>
  <p class="shadow_man">&#169; <?php echo date("Y"); echo " ".$title ?></p>

            </div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="sky-admin/ajax/bootstrap.5.1.0.js"></script>

    </body>
</html>
