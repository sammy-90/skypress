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
if (file_exists("myfiles/settings-search.php")){include "myfiles/settings-search.php";}else{echo "Please 'Publish' Your Search Engine... Admin > Application Settings > Search > Publish"; exit; }  
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
  width: 580px;
  text-align: center;
  margin-top: 60px;
  margin: auto;
}

/* Style the search field */
.overlay input[type=search] {
  padding: 10px;
  font-size: 17px;
  border: none;
  float: left;
  width: 90%;
  background: white; 
  border-top-left-radius: 25px; 
  border-bottom-left-radius: 25px;
}

.overlay input[type=search]:focus {outline: none;}
button{outline: none;box-shadow: none;-webkit-tap-highlight-color: rgba(0,0,0,0);}

/* Style the submit button */
.overlay button {
  text-align: right;
  width:10%;
  padding: 10px;
  font-size: 17px;
  border: none;
  cursor: pointer;
  border-top-right-radius: 25px; 
  border-bottom-right-radius: 25px;
}

@media screen and (max-width: 800px) {
  .mytopbar, .mysidebar{
    visibility: hidden;
    display: none;
  }
  .overlay input[type=search] {width: 80%;}
  .overlay button {width: 20%;}
  .overlay-content {width: 85%;}
}

input[type="search"]:focus::-webkit-search-cancel-button{
    -webkit-appearance: none;
    cursor: pointer;
    position:relati#ve; right:-15px;
    height: 24px; width: 24px;
    background-image: url("sky-admin/images/delete.png");
    background-repeat: repeat-y;        
    .footer{visibility: hidden;display: none;}
}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; }

</style>

<?php

  if (!$_GET['page']){
    echo '<div class="w3-'.$footercolor.'" style="position: absolute;width:100%;height:2px"></div>';
  }

?>

<!-- Hidden Sidebar (reveals when clicked on menu icon)-->
<nav class="w3-sidebar w3-light-gray w3-animate-right w3-large w3-border" style="display:none;padding-top:50px;right:0;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="closeNav()" class="w3-button  w3-light-gray w3-display-topright" style="padding:0 12px;">
    <i class="fa fa-remove"></i>
  </a>
  <div class="w3-bar-block">
    <?php include "sky-menu.php"; ?>
  </div>
</nav>

<?php

  //Menu icon to open sidebar --
  if (!$_GET['page']){
    echo '<span class="w3-button w3-top w3-xlarge w3-text-grey w3-hover-text-black w3-text-'.$footercolor.'" style="width:auto;right:0;top:2px" onclick="openNav()"><i class="fa fa-bars shadow_man"></i></span>';
  }else{
    echo '<span class="w3-button w3-right w3-xlarge w3-text-grey w3-hover-text-black" onclick="openNav()"><i class="fa fa-bars shadow_man"></i></span>';
  }

  $m = $_GET['m']; if(!$m){$m = 'web';}
  if($m == "web"){echo '<style>.underthesea1{text-decoration:underline;}</style>';}
  if($m == "image"){echo '<style>.underthesea2{text-decoration:underline;}</style>';}
  if($m == "music"){echo '<style>.underthesea3{text-decoration:underline;}</style>';}
  if($m == "video"){echo '<style>.underthesea4{text-decoration:underline;}</style>';}

  if (isset($_GET['page'])) {
    echo '<div class="w3-row w3-padding w3-border" id="blog">';
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

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("mySidebar").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidebar").style.display = "none";
}

function searchLinks1(){
User_Input = document.form.search.value;
top.location.href = "csearch.php?m=<?php echo $m ?>&User_Input="+User_Input+"&city="+document.form.mycity.value+"&state="+document.form.mystate.value;
return false;
}

</script>

<div id="Center_Me" style="display: block; position: absolute; left: 50%; top: 40%; margin-right: -50%; transform: translate(-50%, -50%); padding: 10px; color:black; width: 100%;">
 <center>
  <h1><span class="thin" onclick="location.href='<?php echo $template ?>'" style="cursor: pointer;" title="Go Home"><?php if (file_exists("myfiles/logo.jpg")){echo "<img src='myfiles/logo.jpg' class='w3-round txtinput' width='".$logosize."' border='0'/>";}else{echo $title;} ?></span></h1>


 <div id="myOverlay" class="overlay">
  <div class="overlay-content">
    <form name="form" onSubmit="return searchLinks1()">
      <input type="search" name="search" id="search" onclick="hidefooter()" class="w3-border-<?php echo $footercolor.'' ?> w3-border-left w3-border-bottom w3-border-top">
      <button class="w3-white w3-border-<?php echo $footercolor.'' ?> w3-border-right w3-border-bottom w3-border-top" name="Submit" type="submit"><i class="fa fa-search w3-text-<?php echo $footercolor ?>"></i>&nbsp;</button>
  </div>
 </div>
  <div class="w3-container w3-center"><h4 class="w3-text-gray shadow_man"><?php echo $subtitle ?></h4></div>
 </center>
</div>

	<script>geoupdate()</script>

	<!-- GEO Location Boxes -->
	<input type='hidden' placeholder=' City' class='classcity' id='mycity' name='mycity'>
	<input type='hidden' placeholder=' State' class='classstate' id='mystate' name='mystate'>
    </form>

<?php  

  if (isset($_GET['page'])) {echo '<script>document.getElementById("Center_Me").style.display="none";</script>'; exit;} 

  if(ismobile()){echo '<script>function hidefooter(){document.getElementById("footer").style.display="none";}</script>';}

?>

<!-- Footer -->
<footer id="footer" class="<?php if ($background !== "Show"){echo 'w3-'.$footercolor;} ?>" style="position:absolute;bottom:0;width:100%">
  <?php if(ismobile()){echo '<div class="w3-center">';}else{echo '<div class="w3-right">';} ?>
    <?php include "sky-links.php"; ?>
 </div>
</footer>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>