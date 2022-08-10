<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php 
if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
}
?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<?php 

  if ($background == "Show"){
    echo '<body background="myfiles/header.jpg">';
    echo '<style>';
    echo 'html,';
    echo 'body,div {';
    echo '  font-size: 20px; ';
    echo '  font-weight: bold;';
    echo '  font-family: arial; ';
    echo '  background-size: cover; ';
    echo '}';
    echo '</style>';
  }else{
    echo '<body class="w3-'.$pagecolor.'">';
  }

?>

<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

/* The content */
.overlay-content {
  position: relative;
  top: 46%;
  width: 80%;
  text-align: center;
  margin-top: 30px;
  margin: auto;
}

/* Style the search field */
.overlay input[type=text] {
  padding: 15px;
  font-size: 17px;
  border: none;
  float: left;
  width: 90%;
  background: white;
}

/* Style the submit button */
.overlay button {
  float: left;
  width: 10%;
  padding: 15px;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.overlay button:hover {
  opacity: 0.5;
}

@media screen and (max-width: 800px) {
  .mytopbar{
    visibility: hidden;
    display: none;
  }
}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; }

</style>


<!-- header -->
<header class="w3-container <?php echo 'w3-'.$footercolor; ?>" >

<?php

$page = $_GET['page'];

?>

<div class="w3-container">
<p>
<a href="index.php"><h1><?php echo $page ?></h1></a>
</p>
</div>
</header>
<body>

<div class="w3-container">
<p class="custom_tc">

<?php

include "myfiles/settings-custom-links.php";
if($page == "$link1_title"){echo "$link1_content";}
if($page == "$link2_title"){echo "$link2_content";}
if($page == "$link3_title"){echo "$link3_content";}
if($page == "$link4_title"){echo "$link4_content";}
if($page == "$link5_title"){echo "$link5_content";}
if($page == "$link6_title"){echo "$link6_content";}

?>

</p>
</div>


<?php  

if ($background == "Show"){echo '<style>html, body{color:white;text-shadow:5px 5px 5px black;}</style>';}

?>

<!-- Footer -->
<footer class="w3-container hideme <?php echo 'w3-'.$footercolor; ?>" style="position:absolute;bottom:0;width:100%">
  <div class="w3-container w3-half">
   <?php
    echo '<p>';
    echo '<a href="sky-page.php?page='.$link1_title.'" class="custom_color">'.$link1_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link2_title.'" class="custom_color">'.$link2_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link3_title.'" class="custom_color">'.$link3_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link4_title.'" class="custom_color">'.$link4_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link5_title.'" class="custom_color">'.$link5_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link6_title.'" class="custom_color">'.$link6_title.'</a>&emsp;&nbsp;';
    echo '</p>'; 
   ?>
 </div>
  <div class="w3-container w3-half mytopbar"><p class="w3-right custom_tc">&#169; <?php echo date("Y"); echo " ".$footertext ?></p></div>
</footer>

</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>