<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
</head>

<style>

@media screen and (max-width: 800px) {
  .mytopbar {
    visibility: hidden;
    display: none;
  }
  .mytopbar2{width:100%;}
}

</style>

<?php

//get number of ads
$ads = $_GET['ads']; if (!$ads){$ads = 1;}

//Ad Feed
$maxsize = 5000000;
if (filesize('myfiles/portal-members/ppc.txt') <= $maxsize){
  $stable = file('myfiles/portal-members/ppc.txt');
}else{
  $stable = array(); 
  $filename = fopen('myfiles/portal-members/ppc.txt', "r");
  while (!feof ($filename)){$count++;
    $stable[] = fgets($filename); 
    if ($count >= 10000){break;}
  }fclose ($filename);
}

//Number Of Ads
for ($a = 0; $a < $ads; $a++) {

echo '<center>';
if ($ads == 1){echo '<div class="w3-padding-small w3-rest mytopbar2">';}
if ($ads == 2){echo '<div class="w3-padding-small w3-half mytopbar2">';}
if ($ads == 3){echo '<div class="w3-padding-small w3-quarter mytopbar2">';}
if ($ads == 4){echo '<div class="w3-padding-small w3-quarter mytopbar2">';}
echo '<div class="w3-container">';

//Ad Setup
$matchit = 0;
$bypass = "@@";
$ad_type = "banner";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
    if (($ad_type == "banner") && (file_exists("myfiles/portal-members/".substr($site[4], 0, -2)))){
      echo '<a href="'.$site[2].'" class="custom_color" target="blank"><img src="myfiles/portal-members/'.$site[4].'" border="0"/></a>';
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }else{
      if ($a == 0){echo '<div class="w3-card-4 w3-rest">';}else{echo '<div class="w3-card-4 w3-rest mytopbar">';}
      if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
      echo '<big class="custom_tc">Advertisement</big>';
      echo '</header>';
      echo '<div class="w3-container w3-'.$panelcolor.'">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
    }break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  if ($a == 0){echo '<div class="w3-card-4 w3-rest">';}else{echo '<div class="w3-card-4 w3-rest mytopbar">';}
  if ($login == "on"){echo '<header class="w3-container  w3-'.$user_color.'">';}else{echo '<header class="w3-container  w3-'.$footercolor.'">';}
  echo '<big class="custom_tc">Advertisement</big>';

  echo '</header>';
  echo '<div class="w3-container w3-'.$panelcolor.'">';
  echo "<a href=\"#\"  class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
  echo "</div>";
}

echo '</div>';
echo '</div>';
echo '</center>';

}

?>