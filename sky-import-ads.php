<?php

//Ad Feed
$maxsize = 5000000;
if (filesize('myfiles/portal-members/ppc.txt') <= $maxsize){
  $stable = file('myfiles/portal-members/ppc.txt');
}else{
  $stable = array(); 
  $filename = fopen('myfiles/portal-members/ppc.txt', "r");
  while (!feof ($filename)){$count++;
    $stable[] = fgets($filename); 
  }fclose ($filename);
}

?>

<div class="w3-container">

<div class="w3-card-4 w3-half w3-margin">
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Ads By <?php echo $title ?></big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">

<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>		

</div>
</div>

<?php if(isMobile()){echo '<div class="w3-card-4 w3-half w3-margin">';}else{echo '<div class="w3-card-4 w3-rest w3-margin">';} ?>
<header class="w3-container  w3-<?php if ($login == "on"){echo $user_color;}else{echo $footercolor;} ?>">
<big class="custom_tc">Ads By <?php echo $title ?></big>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">

<?php

//Ad Setup
$matchit = 0;
$bypass = "@@";
$random = rand(0, count($stable)-1);
if (!is_file('myfiles/portal-members/ppc.txt')){$random = $maxsize + $maxsize;}

//Show Ads
for ($x = $random; $x <= count($stable); $x++) {

 $site = explode("|", $stable[$random]);
 $adwords =  substr($site[4], 0, -7);

  if ($adwords == $bypass){$balance = 0;}else{include "myfiles/portal-members/".$adwords.".php";}
                                                                         			
  if ($balance > 0){$matchit++;
      echo '<div class="w3-container">';
      echo '<a href="sky-portal-tracker.php?URL='.$site[2].'&ref=clk&u='.$adwords.'&b='.$site[0].'&c='.$balance.'" class="custom_color" target="blank">Ad- '.$site[3].'<br>'.$site[2].'</a>';
      echo "</div>";
      $ref = "imp"; $URL = $site[2]; include "sky-portal-tracker.php";
      break;

  }else{$random = $x; $bypass = $adwords;}

}

//If No Ads
if ($matchit == 0){
  echo '<div class="w3-container">';
  echo "<a href=\"#\" class=\"custom_color\" onclick=\"Robocop(); document.getElementById('advertiser').style.display='block'\">Your Ad Here</a>";
  echo "</div>";
}

?>	

</div>
</div>

</div>