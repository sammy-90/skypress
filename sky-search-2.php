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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<?php if (file_exists("myfiles/settings-search.php")){include "myfiles/settings-search.php";}else{echo "Please 'Publish' Your Search Engine... Admin > Application Settings > Search > Publish"; exit; }  ?>
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
    echo '  background-attachment: fixed;';
    echo '}';
    echo '.thin {color: white;text-shadow:5px 5px 5px black;}';
    echo '.shadow_man {color: white;text-shadow:5px 5px 5px black;}';
    echo '</style>';
    $linkcolor = "white";
  }else{
    echo '<body class="w3-'.$pagecolor.'">';
  }

?>


<style>

@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  font-family: 'Open Sans', sans-serif;
}

/* The content */
.overlay-content {
  position: relative;
  top: 46%;
  width: 80%;
  text-align: center;
  margin-top: 60px;
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
  border-top-left-radius: 25px; 
  border-bottom-left-radius: 25px;
}

.overlay input[type=text]:focus {
        outline: none;
    }

/* Style the submit button */
.overlay button {
  float: left;
  width: 10%;
  padding: 15px;
  font-size: 17px;
  border: none;
  cursor: pointer;
  border-top-right-radius: 25px; 
  border-bottom-right-radius: 25px;
}

.overlay button:hover {
  opacity: 0.5;
}

@media screen and (max-width: 800px) {
  .mytopbar, .mysidebar{
    visibility: hidden;
    display: none;
  }
  .overlay input[type=text] {width: 80%;}
  .overlay button {width: 20%;}
}



<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; }

</style>

<!-- header -->
<header class="w3-container">

<div class="w3-container" style="position: absolute;left:0;width:100%">

<div class="w3-half">

  <?php
  if(isMobile()){
    echo '<div class="w3-dropdown-hover">';
    if ($background == "Show"){echo '<button class="w3-button"><i class="fa fa-bars w3-large w3-hover-opacity shadow_man"></i></button>';}else{echo '<button class="w3-button w3-'.$pagecolor.'"><i class="fa fa-bars w3-large w3-hover-opacity shadow_man"></i></button>';}
  }else{
    echo '<div class="w3-dropdown-click">';
    if ($background == "Show"){echo '<button class="w3-button" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity shadow_man"></i></button>';}else{echo '<button class="w3-button w3-'.$pagecolor.'" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity shadow_man"></i></button>';}
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
    echo '<button class="w3-button shadow_man">'.$menut1.'</button>';
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
    echo '<button class="w3-button shadow_man">'.$menut2.'</button>';
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
    echo '<button class="w3-button shadow_man">'.$menut3.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$pagecolor.'">';
    if($link22){echo '<a href="'.$link22.'" class="w3-bar-item w3-button">'.$link21.'</a>';}
    if($link24){echo '<a href="'.$link24.'" class="w3-bar-item w3-button">'.$link23.'</a>';}
    if($link26){echo '<a href="'.$link26.'" class="w3-bar-item w3-button">'.$link25.'</a>';}
    if($link28){echo '<a href="'.$link28.'" class="w3-bar-item w3-button">'.$link27.'</a>';}
    if($link30){echo '<a href="'.$link30.'" class="w3-bar-item w3-button">'.$link29.'</a>';}
    echo '</div>';
    echo '</div>';
  }
  echo '&emsp;&nbsp;';
?>

</div><div class="w3-right w3-hide-small">
<big>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity shadow_man"></i></a>&nbsp;
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity shadow_man"></i></a>&nbsp;
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity shadow_man"></i></a>&nbsp;
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity shadow_man"></i></a>&nbsp;
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity shadow_man"></i></a>&nbsp;
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity shadow_man"></i></a>&nbsp;
</big>&nbsp;
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
</script>

</div>
</header>

<?php

  $m = $_GET['m']; if(!$m){$m = 'web';}
  if($m == "web"){echo '<style>.underthesea1{text-decoration:underline;}</style>';}
  if($m == "image"){echo '<style>.underthesea2{text-decoration:underline;}</style>';}
  if($m == "music"){echo '<style>.underthesea3{text-decoration:underline;}</style>';}
  if($m == "video"){echo '<style>.underthesea4{text-decoration:underline;}</style>';}
  if($m == "news"){echo '<style>.underthesea4{text-decoration:underline;}</style>';}

  if (isset($_GET['page'])) {
    echo '<br><br><div class="w3-row w3-padding w3-border" id="blog">';
    include "sky-engine.php";
    echo '</div><br>';
    if (($type !== "radio") && ($type !== "tv")) {
      echo '<div class="w3-container w3-center">';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>&nbsp;';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
      echo '</div>';
    }
  }
  if (isset($_GET['page'])) {
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
  }

?>

<script src="GEO_Access.js"></script>
<script type="text/javascript">
function searchLinks1(){
User_Input = document.form.search.value;
top.location.href = "search.php?m=<?php echo $m ?>&User_Input="+User_Input+"&city="+document.form.mycity.value+"&state="+document.form.mystate.value;
return false;
}
</script>
<div id="Center_Me" style="display: block; position: absolute; left: 50%; top: 45%; margin-right: -50%; transform: translate(-50%, -50%); padding: 10px; color:black; width: 100%;">

 <center>
  <h1><span class="thin" onclick="location.href='<?php echo $template ?>'" style="cursor: pointer;" title="Go Home"><?php if (file_exists("myfiles/logo.jpg")){echo "<img src='myfiles/logo.jpg' class='w3-round txtinput' width='".$logosize."' border='0'/>";}else{echo $title;} ?></span></h1>
  <a href="sky-search-2.php?m=web" class="underthesea1 custom_color shadow_man">Web</a>&emsp;&nbsp;
  <a href="sky-search-2.php?m=image" class="underthesea2 custom_color shadow_man">Images</a>&emsp;&nbsp;
  <a href="sky-search-2.php?m=music" class="underthesea3 custom_color shadow_man">Music</a>&emsp;&nbsp;
  <a href="sky-search-2.php?m=video" class="underthesea4 custom_color shadow_man">Video</a><br><br>
 </center>

 <div id="myOverlay" class="overlay">
  <div class="overlay-content">
    <form name="form" onSubmit="return searchLinks1()">
      <input class="w3-border" type="text" placeholder="Search.." name="search">
      <button class="w3-border w3-border-<?php echo $footercolor ?> <?php echo 'w3-'.$footercolor.'' ?>" name="Submit" type="submit"><i class="fa fa-search"></i></button>
  </div>
</div>
<div class="w3-container w3-center custom_tc custom_color"><br><?php echo $subtitle ?></div>
</center>
</div>

	<script>geoupdate()</script>

	<!-- GEO Location Boxes -->
	<input type='hidden' placeholder=' City' class='classcity' id='mycity' name='mycity'>
	<input type='hidden' placeholder=' State' class='classstate' id='mystate' name='mystate'>
    </form>

<?php  if (isset($_GET['page'])) {echo '<script>document.getElementById("Center_Me").style.display="none";</script>'; exit;} ?>

<!-- Footer -->
<footer class="w3-container <?php if ($background !== "Show"){echo 'w3-'.$footercolor;} ?>" style="position:absolute;bottom:0;width:100%">

  <div class="w3-container w3-half">
    <?php include "sky-links.php"; ?>
 </div>
  <div class="w3-container w3-half mytopbar custom_color"><p class="w3-right">&#169; <?php echo date("Y"); echo " ".$footertext ?></p></div>
</footer>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>