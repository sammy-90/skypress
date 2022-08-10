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
<?php if (file_exists("myfiles/settings-search.php")){include "myfiles/settings-search.php";}else{echo "Please 'Publish' Your Search Engine... Admin > Application Settings > Search > Publish"; exit; }
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $lightbox = "theme-l5";
  $panelcolor = "theme-l5";
}else{
  $lightbox = $footercolor;
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
select {
    display: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: '';
}

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

#search{width:55%;}
#state{width:75px;}
#Submit{width:75px;}

@media screen and (max-width: 800px) {
  .mytopbar{
    visibility: hidden;
    display: none;
  }
  #state{width:65px;}
  #Submit{width:48px;}
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

<div class="w3-container w3-<?php echo $lightbox ?>" style="position: absolute;left:0;width:100%">

<div class="w3-half">

  <?php
  if(isMobile()){
    echo '<div class="w3-dropdown-hover">';
    if ($background == "Show"){echo '<button class="w3-button"><i class="fa fa-bars w3-large w3-hover-opacity shadow_man"></i></button>';}else{echo '<button class="w3-button w3-'.$lightbox.'"><i class="fa fa-bars w3-large w3-hover-opacity shadow_man"></i></button>';}
  }else{
    echo '<div class="w3-dropdown-click">';
    if ($background == "Show"){echo '<button class="w3-button" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity shadow_man"></i></button>';}else{echo '<button class="w3-button w3-'.$lightbox.'" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity shadow_man"></i></button>';}
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

function updates(stateupdate){var stvalue = stateupdate.value; document.form.mystate.value = stvalue;}

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
top.location.href = "search.php?m=web&mode=dir&User_Input="+User_Input+"&city="+document.form.mycity.value+"&state="+document.form.mystate.value;
return false;
}
</script>
<div id="Center_Me" style="display: block; position: absolute; left: 50%; top: 48%; margin-right: -50%; transform: translate(-50%, -50%); padding: 10px; color:black; width: 100%;">
<center><h1><span class="thin" onclick="location.href='<?php echo $template ?>'" style="cursor: pointer;" title="Go Home"><?php if (file_exists("myfiles/logo.jpg")){echo "<img src='myfiles/logo.jpg' width='200px' border='0'/>";}else{echo $title;} ?></span></h1>
 <div id="myOverlay" class="overlay">
  <div class="overlay-content">
    <form name="form" id="search-form" onSubmit="return searchLinks1()">

<input  type="text" class="w3-border" placeholder="Local Business" name="search" id="search" style="outline: none;display:inline-block;margin:0;border:0px;padding: 17px;"><select onchange="updates(this)" id="state" name="state" class="w3-border" style="display:inline-block;margin:0;border: 0px none;padding: 17px;cursor: pointer;">
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AR">AR</option>	
	<option value="AZ">AZ</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DC">DC</option>
	<option value="DE">DE</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="IA">IA</option>	
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="MA">MA</option>
	<option value="MD">MD</option>
	<option value="ME">ME</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MO">MO</option>	
	<option value="MS">MS</option>
	<option value="MT">MT</option>
	<option value="NC">NC</option>	
	<option value="NE">NE</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>			
	<option value="NV">NV</option>
	<option value="NY">NY</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WI">WI</option>	
	<option value="WV">WV</option>
	<option value="WY">WY</option>
</select><button style="display:inline-block;padding: 17px;" class="w3-border w3-border-<?php echo $footercolor ?> <?php echo 'w3-'.$footercolor.'' ?>" name="Submit" id="Submit" type="submit"><i class="fa fa-search"></i></button>

	<script>geoupdate()</script>

	<!-- GEO Location Boxes -->
	<input type='hidden' placeholder=' City' class='classcity' id='mycity' name='mycity'>
	<input type='hidden' placeholder=' State' class='classstate' id='mystate' name='mystate'>
    </form>
  </div>
</div>
<div class="w3-container w3-center custom_tc custom_color shadow_man"><br><?php echo $subtitle ?></div>
</center>
</div>

<?php  if (isset($_GET['page'])) {echo '<script>document.getElementById("Center_Me").style.display="none";</script>';exit;} ?>

<!-- Footer -->
<footer class="w3-container <?php if ($background !== "Show"){echo 'w3-'.$footercolor;} ?>" style="position:absolute;bottom:0;width:100%">
  <div class="w3-container w3-half">
    <?php include "sky-links.php"; ?>
 </div>
  <div class="w3-container w3-half mytopbar custom_color shadow_man"><p class="w3-right">&#169; <?php echo date("Y"); echo " ".$footertext ?></p></div>
</footer>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>