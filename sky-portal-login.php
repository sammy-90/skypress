<?php session_start(); ?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<style>

table {font-size: 19px; padding: 20px;}

@media only screen and (max-width: 800px) {
  .txtinput,table{width:100%;}
}

INPUT, select option, button {
  font-family: arial, verdana, ms sans serif;
  color: black; font-size: 12pt;
}

<?php

if(isset($_GET['logout'])){include "sky-logout.php"; header('Location: index.php');}  
include 'myfiles/settings.php';
if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; }

</style>

<?php

  if(isset($_GET['logout'])){include "sky-logout.php";}else{session_start();}  

  //Get Data
  $test_email = strtolower($_REQUEST['requiredemail']);
  if(isset($_POST['test_email'])){$test_email = strtolower($_POST['requiredemail']);}

  //get password
  if (isset($_POST['requiredpw1'])){$_SESSION['requiredpw1'] = $_POST['requiredpw1'];}
  if (isset($_GET['requiredpw1'])){$_SESSION['requiredpw1'] = $_REQUEST['requiredpw1'];}
  $test_pw1 = $_SESSION['requiredpw1'];

  //Bot Blocker 1
  if(!$test_email){echo "Bot Blocker "; echo "<a href='sky-delivery.php'>Refresh</a>"; include "sky-logout.php"; exit;}
  if(!$test_pw1){echo "Bot Blocker "; echo "<a href='sky-delivery.php'>Refresh</a>"; include "sky-logout.php"; exit;}

  //Find Account
  $account_name = explode("@", $test_email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);
  $myprofile = 'myfiles/portal-members/'.$myinfo.'.php';


  //Check if file exist
  if (file_exists($myprofile)){
    include $myprofile;
   }else{
     echo "User Not Found"; exit;
   }

  //Login
  if ($test_pw1 != $pw1){echo "&emsp;&nbsp;Login failed"; exit;}

  //Time
  $Day = date("l");
  $Month = date("F");
  $date = date("j");
  $Year = date("Y");

  //save Settings
  if (isset($_GET['support_text'])) {
    mail($paypal,"Ad Manager Support Request",$_GET['support_text']);
    echo "<script>\n"; 
    echo "alert(\"Ticket Sent...\");\n"; 
    echo "</script>\n";
  }


  //save Settings
  if (isset($_GET['site1_c1'])) {

  $f=fopen('myfiles/portal-members/'.$myinfo.'.php','w');
  fwrite($f,'<?php'."\r\n");

  //account details
  fwrite($f,'$name="'.str_replace('"', "'", $name).'";'."\r\n");
  fwrite($f,'$email="'.str_replace('"', "'", $email).'";'."\r\n");
  fwrite($f,'$city="'.str_replace('"', "'", $city).'";'."\r\n");
  fwrite($f,'$state="'.str_replace('"', "'", $state).'";'."\r\n");
  fwrite($f,'$country="'.str_replace('"', "'", $country).'";'."\r\n");
  fwrite($f,'$zip="'.str_replace('"', "'", $zip).'";'."\r\n");
  fwrite($f,'$color="'.str_replace('"', "'", $color).'";'."\r\n");
  fwrite($f,'$pw1="'.str_replace('"', "'", $pw1).'";'."\r\n");
  fwrite($f,'$balance="'.str_replace('"', "'", $balance).'";'."\r\n");

  //ads title
  fwrite($f,'$site1_c1="'.str_replace('"', "'", $_GET['site1_c1']).'";'."\r\n");
  fwrite($f,'$site1_c2="'.str_replace('"', "'", $_GET['site1_c2']).'";'."\r\n");
  fwrite($f,'$site1_c3="'.str_replace('"', "'", $_GET['site1_c3']).'";'."\r\n");

  //ads description
  fwrite($f,'$site1_text_c1="'.str_replace('"', "'", $_GET['site1_text_c1']).'";'."\r\n");
  fwrite($f,'$site1_text_c2="'.str_replace('"', "'", $_GET['site1_text_c2']).'";'."\r\n");
  fwrite($f,'$site1_text_c3="'.str_replace('"', "'", $_GET['site1_text_c3']).'";'."\r\n");

  fwrite($f,'$keyword1_c1="'.str_replace('"', "'", $_GET['keyword1_c1']).'";'."\r\n");
  fwrite($f,'$keyword2_c1="'.str_replace('"', "'", $_GET['keyword2_c1']).'";'."\r\n");
  fwrite($f,'$keyword3_c1="'.str_replace('"', "'", $_GET['keyword3_c1']).'";'."\r\n");
  fwrite($f,'$keyword4_c1="'.str_replace('"', "'", $_GET['keyword4_c1']).'";'."\r\n");
  fwrite($f,'$keyword5_c1="'.str_replace('"', "'", $_GET['keyword5_c1']).'";'."\r\n");
  fwrite($f,'$keyword6_c1="'.str_replace('"', "'", $_GET['keyword6_c1']).'";'."\r\n");
  fwrite($f,'$keyword7_c1="'.str_replace('"', "'", $_GET['keyword7_c1']).'";'."\r\n");
  fwrite($f,'$keyword8_c1="'.str_replace('"', "'", $_GET['keyword8_c1']).'";'."\r\n");
  fwrite($f,'$keyword9_c1="'.str_replace('"', "'", $_GET['keyword9_c1']).'";'."\r\n");
  fwrite($f,'$keyword10_c1="'.str_replace('"', "'", $_GET['keyword10_c1']).'";'."\r\n");

  fwrite($f,'$bid1_c1="'.str_replace('"', "'", $_GET['bid1_c1']).'";'."\r\n");
  fwrite($f,'$bid2_c1="'.str_replace('"', "'", $_GET['bid2_c1']).'";'."\r\n");
  fwrite($f,'$bid3_c1="'.str_replace('"', "'", $_GET['bid3_c1']).'";'."\r\n");
  fwrite($f,'$bid4_c1="'.str_replace('"', "'", $_GET['bid4_c1']).'";'."\r\n");
  fwrite($f,'$bid5_c1="'.str_replace('"', "'", $_GET['bid5_c1']).'";'."\r\n");
  fwrite($f,'$bid6_c1="'.str_replace('"', "'", $_GET['bid6_c1']).'";'."\r\n");
  fwrite($f,'$bid7_c1="'.str_replace('"', "'", $_GET['bid7_c1']).'";'."\r\n");
  fwrite($f,'$bid8_c1="'.str_replace('"', "'", $_GET['bid8_c1']).'";'."\r\n");
  fwrite($f,'$bid9_c1="'.str_replace('"', "'", $_GET['bid9_c1']).'";'."\r\n");
  fwrite($f,'$bid10_c1="'.str_replace('"', "'", $_GET['bid10_c1']).'";'."\r\n");

  fwrite($f,'$keyword1_c2="'.str_replace('"', "'", $_GET['keyword1_c2']).'";'."\r\n");
  fwrite($f,'$keyword2_c2="'.str_replace('"', "'", $_GET['keyword2_c2']).'";'."\r\n");
  fwrite($f,'$keyword3_c2="'.str_replace('"', "'", $_GET['keyword3_c2']).'";'."\r\n");
  fwrite($f,'$keyword4_c2="'.str_replace('"', "'", $_GET['keyword4_c2']).'";'."\r\n");
  fwrite($f,'$keyword5_c2="'.str_replace('"', "'", $_GET['keyword5_c2']).'";'."\r\n");
  fwrite($f,'$keyword6_c2="'.str_replace('"', "'", $_GET['keyword6_c2']).'";'."\r\n");
  fwrite($f,'$keyword7_c2="'.str_replace('"', "'", $_GET['keyword7_c2']).'";'."\r\n");
  fwrite($f,'$keyword8_c2="'.str_replace('"', "'", $_GET['keyword8_c2']).'";'."\r\n");
  fwrite($f,'$keyword9_c2="'.str_replace('"', "'", $_GET['keyword9_c2']).'";'."\r\n");
  fwrite($f,'$keyword10_c2="'.str_replace('"', "'", $_GET['keyword10_c2']).'";'."\r\n");

  fwrite($f,'$bid1_c2="'.str_replace('"', "'", $_GET['bid1_c2']).'";'."\r\n");
  fwrite($f,'$bid2_c2="'.str_replace('"', "'", $_GET['bid2_c2']).'";'."\r\n");
  fwrite($f,'$bid3_c2="'.str_replace('"', "'", $_GET['bid3_c2']).'";'."\r\n");
  fwrite($f,'$bid4_c2="'.str_replace('"', "'", $_GET['bid4_c2']).'";'."\r\n");
  fwrite($f,'$bid5_c2="'.str_replace('"', "'", $_GET['bid5_c2']).'";'."\r\n");
  fwrite($f,'$bid6_c2="'.str_replace('"', "'", $_GET['bid6_c2']).'";'."\r\n");
  fwrite($f,'$bid7_c2="'.str_replace('"', "'", $_GET['bid7_c2']).'";'."\r\n");
  fwrite($f,'$bid8_c2="'.str_replace('"', "'", $_GET['bid8_c2']).'";'."\r\n");
  fwrite($f,'$bid9_c2="'.str_replace('"', "'", $_GET['bid9_c2']).'";'."\r\n");
  fwrite($f,'$bid10_c2="'.str_replace('"', "'", $_GET['bid10_c2']).'";'."\r\n");

  fwrite($f,'$keyword1_c3="'.str_replace('"', "'", $_GET['keyword1_c3']).'";'."\r\n");
  fwrite($f,'$keyword2_c3="'.str_replace('"', "'", $_GET['keyword2_c3']).'";'."\r\n");
  fwrite($f,'$keyword3_c3="'.str_replace('"', "'", $_GET['keyword3_c3']).'";'."\r\n");
  fwrite($f,'$keyword4_c3="'.str_replace('"', "'", $_GET['keyword4_c3']).'";'."\r\n");
  fwrite($f,'$keyword5_c3="'.str_replace('"', "'", $_GET['keyword5_c3']).'";'."\r\n");
  fwrite($f,'$keyword6_c3="'.str_replace('"', "'", $_GET['keyword6_c3']).'";'."\r\n");
  fwrite($f,'$keyword7_c3="'.str_replace('"', "'", $_GET['keyword7_c3']).'";'."\r\n");
  fwrite($f,'$keyword8_c3="'.str_replace('"', "'", $_GET['keyword8_c3']).'";'."\r\n");
  fwrite($f,'$keyword9_c3="'.str_replace('"', "'", $_GET['keyword9_c3']).'";'."\r\n");
  fwrite($f,'$keyword10_c3="'.str_replace('"', "'", $_GET['keyword10_c3']).'";'."\r\n");

  fwrite($f,'$bid1_c3="'.str_replace('"', "'", $_GET['bid1_c3']).'";'."\r\n");
  fwrite($f,'$bid2_c3="'.str_replace('"', "'", $_GET['bid2_c3']).'";'."\r\n");
  fwrite($f,'$bid3_c3="'.str_replace('"', "'", $_GET['bid3_c3']).'";'."\r\n");
  fwrite($f,'$bid4_c3="'.str_replace('"', "'", $_GET['bid4_c3']).'";'."\r\n");
  fwrite($f,'$bid5_c3="'.str_replace('"', "'", $_GET['bid5_c3']).'";'."\r\n");
  fwrite($f,'$bid6_c3="'.str_replace('"', "'", $_GET['bid6_c3']).'";'."\r\n");
  fwrite($f,'$bid7_c3="'.str_replace('"', "'", $_GET['bid7_c3']).'";'."\r\n");
  fwrite($f,'$bid8_c3="'.str_replace('"', "'", $_GET['bid8_c3']).'";'."\r\n");
  fwrite($f,'$bid9_c3="'.str_replace('"', "'", $_GET['bid9_c3']).'";'."\r\n");
  fwrite($f,'$bid10_c3="'.str_replace('"', "'", $_GET['bid10_c3']).'";'."\r\n");

  fwrite($f,'?>');
  fclose($f);

  //Build Database
  $f=fopen('myfiles/portal-members/'.$myinfo.'.txt','w');
  if ($bid1_c1 && $keyword1_c1){fwrite($f,$bid1_c1."|".$keyword1_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid2_c1 && $keyword2_c1){fwrite($f,$bid2_c1."|".$keyword2_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid3_c1 && $keyword3_c1){fwrite($f,$bid3_c1."|".$keyword3_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid4_c1 && $keyword4_c1){fwrite($f,$bid4_c1."|".$keyword4_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid5_c1 && $keyword5_c1){fwrite($f,$bid5_c1."|".$keyword5_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid6_c1 && $keyword6_c1){fwrite($f,$bid6_c1."|".$keyword6_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid7_c1 && $keyword7_c1){fwrite($f,$bid7_c1."|".$keyword7_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid8_c1 && $keyword8_c1){fwrite($f,$bid8_c1."|".$keyword8_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid9_c1 && $keyword9_c1){fwrite($f,$bid9_c1."|".$keyword9_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}
  if ($bid10_c1 && $keyword10_c1){fwrite($f,$bid10_c1."|".$keyword10_c1."|".$site1_c1."|".$site1_text_c1."|".$myinfo.'1.jpg'."\r\n");}

  if ($bid1_c2 && $keyword1_c2){fwrite($f,$bid1_c2."|".$keyword1_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid2_c2 && $keyword2_c2){fwrite($f,$bid2_c2."|".$keyword2_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid3_c2 && $keyword3_c2){fwrite($f,$bid3_c2."|".$keyword3_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid4_c2 && $keyword4_c2){fwrite($f,$bid4_c2."|".$keyword4_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid5_c2 && $keyword5_c2){fwrite($f,$bid5_c2."|".$keyword5_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid6_c2 && $keyword6_c2){fwrite($f,$bid6_c2."|".$keyword6_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid7_c2 && $keyword7_c2){fwrite($f,$bid7_c2."|".$keyword7_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid8_c2 && $keyword8_c2){fwrite($f,$bid8_c2."|".$keyword8_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid9_c2 && $keyword9_c2){fwrite($f,$bid9_c2."|".$keyword9_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}
  if ($bid10_c2 && $keyword10_c2){fwrite($f,$bid10_c2."|".$keyword10_c2."|".$site1_c2."|".$site1_text_c2."|".$myinfo.'2.jpg'."\r\n");}

  if ($bid1_c3 && $keyword1_c3){fwrite($f,$bid1_c3."|".$keyword1_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid2_c3 && $keyword2_c3){fwrite($f,$bid2_c3."|".$keyword2_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid3_c3 && $keyword3_c3){fwrite($f,$bid3_c3."|".$keyword3_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid4_c3 && $keyword4_c3){fwrite($f,$bid4_c3."|".$keyword4_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid5_c3 && $keyword5_c3){fwrite($f,$bid5_c3."|".$keyword5_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid6_c3 && $keyword6_c3){fwrite($f,$bid6_c3."|".$keyword6_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid7_c3 && $keyword7_c3){fwrite($f,$bid7_c3."|".$keyword7_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid8_c3 && $keyword8_c3){fwrite($f,$bid8_c3."|".$keyword8_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid9_c3 && $keyword9_c3){fwrite($f,$bid9_c3."|".$keyword9_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}
  if ($bid10_c3 && $keyword10_c3){fwrite($f,$bid10_c3."|".$keyword10_c3."|".$site1_c3."|".$site1_text_c3."|".$myinfo.'3.jpg'."\r\n");}

  fclose($f);

  //Build PPC Database
  $Dir = "myfiles/portal-members";
  $files = scandir ($Dir);
  $out = fopen("myfiles/portal-members/ppc.txt", "w");
  foreach($files as $file){
    if ((strpos(strtolower($file), strtolower(".txt")) !== false) &&  (strpos(strtolower($file), strtolower("ppc.txt")) === false)){
      $filename = fopen($Dir."/".$file, "r");
      while (!feof ($filename)){
        $buffer = fgets($filename, 4096); 
        fwrite($out,$buffer);
      }fclose ($filename);
    }
  }
  fclose($out);

  //Sort PPC Database
  $maxsize = 5000000;
  if (filesize("myfiles/portal-members/ppc.txt") <= $maxsize){
    $data = file("myfiles/portal-members/ppc.txt");
    rsort($data);
    file_put_contents("myfiles/portal-members/ppc.txt", $data);
  }

  echo "<script>\n"; 
  echo "alert(\"Ads Updated...\");\n"; 
  echo "</script>\n";

  }

  //Upload Header
  if(isset($_POST['submit_banner1_c1'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/portal-members/'.$myinfo.'1.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload Header
  if(isset($_POST['submit_banner1_c2'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/portal-members/'.$myinfo.'2.jpg');

    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload Header
  if(isset($_POST['submit_banner1_c3'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/portal-members/'.$myinfo.'3.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 


  //save Settings
  if (isset($_GET['deposit'])) {
    if ($_GET['deposit'] >= 10){

  $checkout = "document.getElementById('balance2').style.display='none'";
  echo '<div id="balance2" class="w3-modal" style="display:block">';
    echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
      echo '<header class="w3-container w3-light-gray w3-display-container">';
        echo '<span onclick="'.$checkout.'"; class="w3-button  w3-light-gray w3-display-topright">X</span>';
        echo '<h4>Checkout</h4>';
      echo '</header>';
      echo '<div class="w3-container"><br>';

if($_GET['pay'] == "One Time"){echo "$".$_GET['deposit']." PPC Deposit<br><br>";

echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_xclick">';
echo '<input type="hidden" name="business" value="'.$paypal.'">';
echo '<input type="hidden" name="currency_code" value="USD">';
echo '<input type="hidden" name="item_name" value="'.$myinfo.' PPC Deposit">';
echo '<input type="hidden" name="amount" value="'.$_GET['deposit'].'">';
echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!">';
echo '</form>';

}else{echo "$".$_GET['deposit']." PPC Deposit<br><br>";

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> ';
echo '  <input type="hidden" name="cmd" value="_xclick-subscriptions" >';
echo '  <input type="hidden" name="business" value="'.$paypal.'" >';
echo '  <input type="hidden" name="item_name" value="'.$myinfo.' PPC Deposit">';
echo '  <input type="hidden" name="item_number" value="123" >';
echo '  <input type="hidden" name="no_shipping" value="1" >';
echo '  <input type="hidden" name="a1" value="'.$_GET['deposit'].'" >';
echo '  <input type="hidden" name="p1" value="1" >';
echo '  <input type="hidden" name="t1" value="M" >';
echo '  <input type="hidden" name="a3" value="'.$_GET['deposit'].'" >';
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
   

      echo '</div>';
    echo '</div>';
  echo '</div>';

    }else{
      echo "<script>\n"; 
      echo "alert(\"Please deposit $10.00 Or More...\");\n"; 
      echo "</script>\n";
    }

  }

  //Check if file exist
  if (file_exists($myprofile)){
    include $myprofile;
   }else{

     //will resolve & print the real filename
     $dir = "myfiles/portal-members/";

     $match = 0;
     if ($handle = opendir($dir)) {
       while (false !== ($entry = readdir($handle))) {
         if (strtolower($myinfo.'.php') == strtolower($entry)){
           $match++; include $dir.$entry; break;
       }}
       closedir($handle);
     }

     if($match == 0){echo "User Not Found"; exit;}
   }


  //Delete Account
  if (isset($_GET['delete_account'])) {
    if ($_GET['delete_account'] == 'DELETE'){

      if($balance <= 0){
     
        if (file_exists("myfiles/portal-members/".$myinfo.".php")){unlink("myfiles/portal-members/".$myinfo.".php");}
        if (file_exists("myfiles/portal-members/".$myinfo.".txt")){unlink("myfiles/portal-members/".$myinfo.".txt");}
        if (file_exists("myfiles/portal-members/".$myinfo."1.jpg")){unlink("myfiles/portal-members/".$myinfo."1.jpg");}
        if (file_exists("myfiles/portal-members/".$myinfo."2.jpg")){unlink("myfiles/portal-members/".$myinfo."2.jpg");}
        if (file_exists("myfiles/portal-members/".$myinfo."3.jpg")){unlink("myfiles/portal-members/".$myinfo."3.jpg");}

        echo "<script>\n"; 
        echo "alert(\"We're sorry to see you go :(\");\n"; 
        echo "</script>\n";
        header('Location: sky-portal.php ');

      }else{

        echo "<script>\n"; 
        echo "alert(\"Please contact support, for refund on your current account balance before completing deletion...\");\n"; 
        echo "</script>\n";

      }

    }else{
      echo "<script>\n"; 
      echo "alert(\"Error, Try Again...\");\n"; 
      echo "</script>\n";
    }

  }

?>

<body>

<!-- Top -->
<div class="w3-top w3-animate-left">
  <div class="w3-row w3-<?php echo $color ?> w3-padding">
    <div class="w3-half" style="margin:4px 0 6px 0"><big>Ad Manager</big></div>
    <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small"><div class="w3-right">
    <?php echo '<a href="sky-account.php?link=index&dir=portal-members&requiredemail='.$email.'">Home</a>'; ?>
   &emsp;&nbsp;<a href="?logout=out" onclick = "if (! confirm('Are you sure?')) { return false; }">Log-out</a>&emsp;&nbsp;
<a href="#" onclick="document.getElementById('balance').style.display='block'">Balance: $<?php echo $balance ?></a></div></div>
  </div>
</div>


<div id="search" class="w3-container w3-border" style="display:block">

<br>


<div>

<div class="container w3-rest">

<form name="form" action="sky-portal-login.php" method="get">
<input type="hidden" id="requiredpw1" name="requiredpw1" value="<?php echo $test_pw1; ?>" >
<input type="hidden" id="requiredemail" name="requiredemail" value="<?php echo $test_email; ?>" >
<input type="submit" class="w3-button w3-<?php echo $color ?>" value="Save"/>

</div>

<big><br>

<div class="w3-container">

  <div class="w3-row">
    <a href="javascript:void(0)" id="demo" onclick="openSettings(event, 'cam1');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Campaign 1</div>
    </a>
    <a href="javascript:void(0)" onclick="openSettings(event, 'cam2');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Campaign 2</div>
    </a>
    <a href="javascript:void(0)" id="demo" onclick="openSettings(event, 'cam3');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Campaign 3</div>
    </a>
  </div><br>

  <div id="cam1" class="w3-container settings" style="display:block">

<div class="container w3-half">

<table>

<tr title="Include http://"> 
<td>Ad URL:</td> 
<td><input type="text" id="site1_c1" name="site1_c1" placeholder="http://" maxlength="100" <?php if ($site1_c1){echo 'value="'.$site1_c1.'"';} ?> class="txtinput" size="40"></td> 
</tr>
<tr title="Ad 1 Text"> 
<td>Ad Text:</td> 
<td><input type="text" id="site1_text_c1" name="site1_text_c1" onkeypress="return (event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" placeholder="Your Ad Text" maxlength="90" <?php if ($site1_text_c1){echo 'value="'.$site1_text_c1.'"';} ?> class="txtinput" size="40"></td> 
</tr>

<tr> 
<td>Banner:</td> 
<td><a href="#" onclick="document.getElementById('banner1_c1').style.display='block'" style="color:blue" title="Optional">Upload (468 X 60)</a></td> 
</tr>

</table>


<?php

  //Setup Varibles
  $imp1 = 0;
  $imp2 = 0;
  $imp3 = 0;

  $click1 = 0;
  $click2 = 0;
  $click3 = 0;

  //Read file into array
  $imp = file("myfiles/widgets/imp.txt");
  $click = file("myfiles/widgets/clicks.txt");

  //Count imp
  for($c = 0; $c < count($imp); next($imp), $c++){
    if (strpos(strtolower($imp[$c]), strtolower($site1_c1)) !== false){$imp1++; $imp1_ip[] = $imp[$c];}
    if (strpos(strtolower($imp[$c]), strtolower($site1_c2)) !== false){$imp2++; $imp2_ip[] = $imp[$c];}
    if (strpos(strtolower($imp[$c]), strtolower($site1_c3)) !== false){$imp3++; $imp3_ip[] = $imp[$c];}
  }

  //Count click
  for($c = 0; $c < count($click); next($click), $c++){
    if (strpos(strtolower($click[$c]), strtolower($site1_c1)) !== false){$click1++; $click1_ip[] = $click[$c];}
    if (strpos(strtolower($click[$c]), strtolower($site1_c2)) !== false){$click2++; $click2_ip[] = $click[$c];}
    if (strpos(strtolower($click[$c]), strtolower($site1_c3)) !== false){$click3++; $click3_ip[] = $click[$c];}
  }

  $imp1_lines = array_unique($imp1_ip);
  $imp2_lines = array_unique($imp2_ip);
  $imp3_lines = array_unique($imp3_ip);
  $click1_lines = array_unique($click1_ip);
  $click2_lines = array_unique($click2_ip);
  $click3_lines = array_unique($click3_ip);

?>


<table>

<tr> 
<td colspan="2">Detail Report:</td> 
</tr>
<tr>
<td class="w3-light-gray">&nbsp;Impression&nbsp;</td>
<td class="w3-light-gray">&nbsp;Clicks&nbsp;</td> 
</tr>
<tr> 
<td><a href="#" onclick="document.getElementById('imp1_ip').style.display='block'"><?php echo $imp1 ?></a></td> 
<td><a href="#" onclick="document.getElementById('click1_ip').style.display='block'"><?php echo $click1 ?></a></td> 
</tr>

</table>


</div>


<div class="container w3-half">

<table>

<tr> 
<td>Keyword 1</td> 
<td><input type="text" id="keyword1_c1" name="keyword1_c1" maxlength="27" <?php if ($keyword1_c1){echo 'value="'.$keyword1_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid1_c1" onkeypress="return isNumber(event)" name="bid1_c1" maxlength="4" <?php if ($bid1_c1){echo 'value="'.$bid1_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 2</td> 
<td><input type="text" id="keyword2_c1" name="keyword2_c1" maxlength="27" <?php if ($keyword2_c1){echo 'value="'.$keyword2_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid2_c1" onkeypress="return isNumber(event)" name="bid2_c1" maxlength="4" <?php if ($bid2_c1){echo 'value="'.$bid2_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 3</td> 
<td><input type="text" id="keyword3_c1" name="keyword3_c1" maxlength="27" <?php if ($keyword3_c1){echo 'value="'.$keyword3_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid3_c1" onkeypress="return isNumber(event)" name="bid3_c1" maxlength="4" <?php if ($bid3_c1){echo 'value="'.$bid3_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 4</td> 
<td><input type="text" id="keyword4_c1" name="keyword4_c1" maxlength="27" <?php if ($keyword4_c1){echo 'value="'.$keyword4_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid4_c1" onkeypress="return isNumber(event)" name="bid4_c1" maxlength="4" <?php if ($bid4_c1){echo 'value="'.$bid4_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 5</td> 
<td><input type="text" id="keyword5_c1" name="keyword5_c1" maxlength="27" <?php if ($keyword5_c1){echo 'value="'.$keyword5_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid5_c1" onkeypress="return isNumber(event)" name="bid5_c1" maxlength="4" <?php if ($bid5_c1){echo 'value="'.$bid5_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 6</td> 
<td><input type="text" id="keyword6_c1" name="keyword6_c1" maxlength="27" <?php if ($keyword6_c1){echo 'value="'.$keyword6_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid6_c1" onkeypress="return isNumber(event)" name="bid6_c1" maxlength="4" <?php if ($bid6_c1){echo 'value="'.$bid6_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 7</td> 
<td><input type="text" id="keyword7_c1" name="keyword7_c1" maxlength="27" <?php if ($keyword7_c1){echo 'value="'.$keyword7_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid7_c1" onkeypress="return isNumber(event)" name="bid7_c1" maxlength="4" <?php if ($bid7_c1){echo 'value="'.$bid7_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 8</td> 
<td><input type="text" id="keyword8_c1" name="keyword8_c1" maxlength="27" <?php if ($keyword8_c1){echo 'value="'.$keyword8_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid8_c1" onkeypress="return isNumber(event)" name="bid8_c1" maxlength="4" <?php if ($bid8_c1){echo 'value="'.$bid8_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 9</td> 
<td><input type="text" id="keyword9_c1" name="keyword9_c1" maxlength="27" <?php if ($keyword9_c1){echo 'value="'.$keyword9_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid9_c1" onkeypress="return isNumber(event)" name="bid9_c1" maxlength="4" <?php if ($bid9_c1){echo 'value="'.$bid9_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 10</td> 
<td><input type="text" id="keyword10_c1" name="keyword10_c1" maxlength="27" <?php if ($keyword10_c1){echo 'value="'.$keyword10_c1.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid10_c1" onkeypress="return isNumber(event)" name="bid10_c1" maxlength="4" <?php if ($bid10_c1){echo 'value="'.$bid10_c1.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

</table>

</div>

  </div>

  <div id="cam2" class="w3-container settings" style="display:block">

<div class="container w3-half">

<table>

<tr title="Include http://"> 
<td>Ad URL:</td> 
<td><input type="text" id="site1_c2" name="site1_c2" placeholder="http://" maxlength="100" <?php if ($site1_c2){echo 'value="'.$site1_c2.'"';} ?> class="txtinput" size="40"></td> 
</tr>
<tr title="Ad 1 Text"> 
<td>Ad Text:</td> 
<td><input type="text" id="site1_text_c2" name="site1_text_c2"  onkeypress="return (event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" placeholder="Your Ad Text" maxlength="90" <?php if ($site1_text_c2){echo 'value="'.$site1_text_c2.'"';} ?> class="txtinput" size="40"></td> 
</tr>

<tr> 
<td>Banner:</td> 
<td><a href="#" onclick="document.getElementById('banner1_c2').style.display='block'" style="color:blue" title="Optional">Upload (468 X 60)</a></td> 
</tr>
</table>

<table>

<tr> 
<td colspan="2">Detail Report:</td> 
</tr>
<tr>
<td class="w3-light-gray">&nbsp;Impression&nbsp;</td>
<td class="w3-light-gray">&nbsp;Clicks&nbsp;</td> 
</tr>
<tr> 
<td><a href="#" onclick="document.getElementById('imp2_ip').style.display='block'"><?php echo $imp2 ?></a></td> 
<td><a href="#" onclick="document.getElementById('click2_ip').style.display='block'"><?php echo $click2 ?></a></td> 
</tr>

</table>

</div>


<div class="container w3-half">

<table>

<tr> 
<td>Keyword 1</td> 
<td><input type="text" id="keyword1_c2" name="keyword1_c2" maxlength="27" <?php if ($keyword1_c2){echo 'value="'.$keyword1_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid1_c2" onkeypress="return isNumber(event)" name="bid1_c2" maxlength="4" <?php if ($bid1_c2){echo 'value="'.$bid1_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 2</td> 
<td><input type="text" id="keyword2_c2" name="keyword2_c2" maxlength="27" <?php if ($keyword2_c2){echo 'value="'.$keyword2_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid2_c2" onkeypress="return isNumber(event)" name="bid2_c2" maxlength="4" <?php if ($bid2_c2){echo 'value="'.$bid2_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 3</td> 
<td><input type="text" id="keyword3_c2" name="keyword3_c2" maxlength="27" <?php if ($keyword3_c2){echo 'value="'.$keyword3_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid3_c2" onkeypress="return isNumber(event)" name="bid3_c2" maxlength="4" <?php if ($bid3_c2){echo 'value="'.$bid3_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 4</td> 
<td><input type="text" id="keyword4_c2" name="keyword4_c2" maxlength="27" <?php if ($keyword4_c2){echo 'value="'.$keyword4_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid4_c2" onkeypress="return isNumber(event)" name="bid4_c2" maxlength="4" <?php if ($bid4_c2){echo 'value="'.$bid4_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 5</td> 
<td><input type="text" id="keyword5_c2" name="keyword5_c2" maxlength="27" <?php if ($keyword5_c2){echo 'value="'.$keyword5_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid5_c2" onkeypress="return isNumber(event)" name="bid5_c2" maxlength="4" <?php if ($bid5_c2){echo 'value="'.$bid5_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 6</td> 
<td><input type="text" id="keyword6_c2" name="keyword6_c2" maxlength="27" <?php if ($keyword6_c2){echo 'value="'.$keyword6_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid6_c2" onkeypress="return isNumber(event)" name="bid6_c2" maxlength="4" <?php if ($bid6_c2){echo 'value="'.$bid6_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 7</td> 
<td><input type="text" id="keyword7_c2" name="keyword7_c2" maxlength="27" <?php if ($keyword7_c2){echo 'value="'.$keyword7_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid7_c2" onkeypress="return isNumber(event)" name="bid7_c2" maxlength="4" <?php if ($bid7_c2){echo 'value="'.$bid7_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 8</td> 
<td><input type="text" id="keyword8_c2" name="keyword8_c2" maxlength="27" <?php if ($keyword8_c2){echo 'value="'.$keyword8_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid8_c2" onkeypress="return isNumber(event)" name="bid8_c2" maxlength="4" <?php if ($bid8_c2){echo 'value="'.$bid8_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 9</td> 
<td><input type="text" id="keyword9_c2" name="keyword9_c2" maxlength="27" <?php if ($keyword9_c2){echo 'value="'.$keyword9_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid9_c2" onkeypress="return isNumber(event)" name="bid9_c2" maxlength="4" <?php if ($bid9_c2){echo 'value="'.$bid9_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 10</td> 
<td><input type="text" id="keyword10_c2" name="keyword10_c2" maxlength="27" <?php if ($keyword10_c2){echo 'value="'.$keyword10_c2.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid10_c2" onkeypress="return isNumber(event)" name="bid10_c2" maxlength="4" <?php if ($bid10_c2){echo 'value="'.$bid10_c2.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

</table>

</div>

  </div>

  <div id="cam3" class="w3-container settings" style="display:block">

<div class="container w3-half">

<table>

<tr title="Include http://"> 
<td>Ad URL:</td> 
<td><input type="text" id="site1_c3" name="site1_c3" placeholder="http://" maxlength="100" <?php if ($site1_c3){echo 'value="'.$site1_c3.'"';} ?> class="txtinput" size="40"></td> 
</tr>
<tr title="Ad 1 Text"> 
<td>Ad Text:</td> 
<td><input type="text" id="site1_text_c3" name="site1_text_c3"  onkeypress="return (event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" placeholder="Your Ad Text" maxlength="90" <?php if ($site1_text_c3){echo 'value="'.$site1_text_c3.'"';} ?> class="txtinput" size="40"></td> 
</tr>

<tr> 
<td>Banner:</td> 
<td><a href="#" onclick="document.getElementById('banner1_c3').style.display='block'" style="color:blue" title="Optional">Upload (468 X 60)</a></td> 
</tr>
</table>

<table>

<tr> 
<td colspan="2">Detail Report:</td> 
</tr>
<tr>
<td class="w3-light-gray">&nbsp;Impression&nbsp;</td>
<td class="w3-light-gray">&nbsp;Clicks&nbsp;</td> 
</tr>
<tr> 
<td><a href="#" onclick="document.getElementById('imp3_ip').style.display='block'"><?php echo $imp3 ?></a></td> 
<td><a href="#" onclick="document.getElementById('click3_ip').style.display='block'"><?php echo $click3 ?></a></td>  
</tr>

</table>


</div>



<div class="container w3-half">

<table>

<tr> 
<td>Keyword 1</td> 
<td><input type="text" id="keyword1_c3" name="keyword1_c3" maxlength="27" <?php if ($keyword1_c3){echo 'value="'.$keyword1_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid1_c3" onkeypress="return isNumber(event)" name="bid1_c3" maxlength="4" <?php if ($bid1_c3){echo 'value="'.$bid1_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 2</td> 
<td><input type="text" id="keyword2_c3" name="keyword2_c3" maxlength="27" <?php if ($keyword2_c3){echo 'value="'.$keyword2_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid2_c3" onkeypress="return isNumber(event)" name="bid2_c3" maxlength="4" <?php if ($bid2_c3){echo 'value="'.$bid2_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 3</td> 
<td><input type="text" id="keyword3_c3" name="keyword3_c3" maxlength="27" <?php if ($keyword3_c3){echo 'value="'.$keyword3_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid3_c3" onkeypress="return isNumber(event)" name="bid3_c3" maxlength="4" <?php if ($bid3_c3){echo 'value="'.$bid3_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 4</td> 
<td><input type="text" id="keyword4_c3" name="keyword4_c3" maxlength="27" <?php if ($keyword4_c3){echo 'value="'.$keyword4_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid4_c3" onkeypress="return isNumber(event)" name="bid4_c3" maxlength="4" <?php if ($bid4_c3){echo 'value="'.$bid4_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 5</td> 
<td><input type="text" id="keyword5_c3" name="keyword5_c3" maxlength="27" <?php if ($keyword5_c3){echo 'value="'.$keyword5_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid5_c3" onkeypress="return isNumber(event)" name="bid5_c3" maxlength="4" <?php if ($bid5_c3){echo 'value="'.$bid5_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 6</td> 
<td><input type="text" id="keyword6_c3" name="keyword6_c3" maxlength="27" <?php if ($keyword6_c3){echo 'value="'.$keyword6_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid6_c3" onkeypress="return isNumber(event)" name="bid6_c3" maxlength="4" <?php if ($bid6_c3){echo 'value="'.$bid6_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 7</td> 
<td><input type="text" id="keyword7_c3" name="keyword7_c3" maxlength="27" <?php if ($keyword7_c3){echo 'value="'.$keyword7_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid7_c3" onkeypress="return isNumber(event)" name="bid7_c3" maxlength="4" <?php if ($bid7_c3){echo 'value="'.$bid7_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 8</td> 
<td><input type="text" id="keyword8_c3" name="keyword8_c3" maxlength="27" <?php if ($keyword8_c3){echo 'value="'.$keyword8_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid8_c3" onkeypress="return isNumber(event)" name="bid8_c3" maxlength="4" <?php if ($bid8_c3){echo 'value="'.$bid8_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 9</td> 
<td><input type="text" id="keyword9_c3" name="keyword9_c3" maxlength="27" <?php if ($keyword9_c3){echo 'value="'.$keyword9_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid9_c3" onkeypress="return isNumber(event)" name="bid9_c3" maxlength="4" <?php if ($bid9_c3){echo 'value="'.$bid9_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

<tr> 
<td>Keyword 10</td> 
<td><input type="text" id="keyword10_c3" name="keyword10_c3" maxlength="27" <?php if ($keyword10_c3){echo 'value="'.$keyword10_c3.'"';} ?> class="txtinput" size="20"></td> 

<td>&emsp;&nbsp;Bid:</td> 
<td><input type="text" id="bid10_c3" onkeypress="return isNumber(event)" name="bid10_c3" maxlength="4" <?php if ($bid10_c3){echo 'value="'.$bid10_c3.'"';}else{echo 'value="0.01"';} ?> class="txtinput" size="5" placeholder="0.05"></td> 
</tr>

</table>

</div>

  </div>



</div>

</form>
</big>

</div></div>


<!-- Modal -->
<div id="balance" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('balance').style.display='none'" class="w3-button  w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Add Money</h4>
    </header>
    <div class="w3-container"><br>
   
<center>
<table>
<form method='get' action='sky-portal-login.php' enctype='multipart/form-data'>

<tr> 
<td>Balance</td> 
<td>$<?php echo $balance ?></td> 
</tr>

<tr title="Please Deposit $10 Or More...">
<td>Deposit</td> 
<td><input type="text" id="deposit" onkeypress="return isNumber(event)" name="deposit" maxlength="7" class="txtinput" size="5" placeholder="10.00"></td> 
</tr>

<tr>
<td>Occurrence</td>
<td>
<select id="pay" name="pay">
       <option value="One Time">One Time</option>
       <option value="Per Month">Per Month</option>
     </select> 
</td>
</tr>

<tr>
<td colspan="2">
<center>
<input type="hidden" id="requiredpw1" name="requiredpw1" value="<?php echo $test_pw1 ?>" >
<input type="hidden" id="requiredemail" name="requiredemail" value="<?php echo $email;?>" >
<input type="submit" class="w3-button w3-<?php echo $color ?>" value="Continue"/><br><br>
<a href="#" onclick="document.getElementById('cash_app').style.display='block'" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>
<a href="#" onclick="document.getElementById('zelle').style.display='block'" title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>
</center>
</td>
</tr>

</form>
</table>
</center>

    </div>
    <br><footer class="<?php echo 'w3-'.$color.'' ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="banner1_c1" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('banner1_c1').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Your Ad Banner</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("myfiles/portal-members/".$myinfo."1.jpg")) {echo "<a href='myfiles/portal-members/".$myinfo."1.jpg' target='blank'><font color='blue'>View Banner</font></a>";echo ' - <a href="?requiredpw1='.$test_pw1.'&requiredemail='.$email.'&delete='.$myinfo.'1.jpg"'; ?> onclick="return confirm('Are you sure?')" <?php echo 'target="blank"><font color="blue">Delete Banner</font></a>';}else{echo "No Banner Yet";} ?>
	<form method='post' action='sky-portal-login.php' enctype='multipart/form-data'>
        <center>
        <input type='submit' name='submit_banner1_c1' value='Upload Banner'>
 	<input type="file" name="file" id="file_banner1_c1">
 	<input type="hidden" id="requiredpw1" name="requiredpw1" value="<?php echo $test_pw1 ?>" >
 	<input type="hidden" id="requiredemail" name="requiredemail" value="<?php echo $email;?>" >
	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="banner1_c2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('banner1_c2').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Your Ad Banner</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("myfiles/portal-members/".$myinfo."2.jpg")) {echo "<a href='myfiles/portal-members/".$myinfo."2.jpg' target='blank'><font color='blue'>View Banner</font></a>";echo ' - <a href="?requiredpw1='.$test_pw1.'&requiredemail='.$email.'&delete='.$myinfo.'1.jpg"'; ?> onclick="return confirm('Are you sure?')" <?php echo 'target="blank"><font color="blue">Delete Banner</font></a>';}else{echo "No Banner Yet";} ?>
	<form method='post' action='sky-portal-login.php' enctype='multipart/form-data'>
        <center>
        <input type='submit' name='submit_banner1_c2' value='Upload Banner'>
 	<input type="file" name="file" id="file_banner1_c2">
 	<input type="hidden" id="requiredpw1" name="requiredpw1" value="<?php echo $test_pw1?>" >
 	<input type="hidden" id="requiredemail" name="requiredemail" value="<?php echo $email;?>" >
	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="banner1_c3" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('banner1_c3').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Your Ad Banner</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("myfiles/portal-members/".$myinfo."3.jpg")) {echo "<a href='myfiles/portal-members/".$myinfo."3.jpg' target='blank'><font color='blue'>View Banner</font></a>";echo ' - <a href="?requiredpw1='.$test_pw1.'&requiredemail='.$email.'&delete='.$myinfo.'1.jpg"'; ?> onclick="return confirm('Are you sure?')" <?php echo 'target="blank"><font color="blue">Delete Banner</font></a>';}else{echo "No Banner Yet";} ?>
	<form method='post' action='sky-portal-login.php' enctype='multipart/form-data'>
        <center>
        <input type='submit' name='submit_banner1_c3' value='Upload Banner'>
 	<input type="file" name="file" id="file_banner1_c3">
 	<input type="hidden" id="requiredpw1" name="requiredpw1" value="<?php echo $test_pw1?>" >
 	<input type="hidden" id="requiredemail" name="requiredemail" value="<?php echo $email;?>" >
	</form>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="delete" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('delete').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Delete Account</h4>
    </header>
    <div class="w3-container">
	<form method='get' action='sky-portal-login.php' enctype='multipart/form-data'>
        <center>Are you sure?
 	<input type="text" id="delete_account" name="delete_account" placeholder="Type 'DELETE' here" title="Type 'DELETE' in all caps">
	<input type="text" id="requiredemail" name="requiredemail" placeholder="Your Email Here" >
 	<input type="text" id="requiredpw1" name="requiredpw1" placeholder="Your Password Here">
        <input type='submit' name='submit' value='Delete'>
	</form>
    </div>
  </div>
</div>



<!-- Modal -->
<div id="support" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('support').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Send Support Ticket</h4>
    </header>
    <div class="w3-container">
	<form method='get' action='sky-portal-login.php' enctype='multipart/form-data'>
        <center>
<textarea id="support_text" name="support_text" class="txtinput" cols="70" rows="10" maxlength="500">
<?php echo "Your Name: ".$name."\r\n" ?>
<?php echo "Email: ".$email."\r\n" ?>
<?php echo "UserName: ".$myinfo."\r\n"."\r\n" ?>
<?php echo "Type Your Message Below:"."\r\n" ?>
</textarea><br>
        <input type='submit' name='submit' value='Submit'>
 	<input type="hidden" id="requiredpw1" name="requiredpw1" value="<?php echo $test_pw1; ?>" >
 	<input type="hidden" id="requiredemail" name="requiredemail" value="<?php echo $test_email; ?>" >
	</form>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="imp1_ip" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('imp1_ip').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Impressions IP's</h4>
    </header>
    <div class="w3-container" style="height:400px">

    <?php

      for ($i = 0; $i <= 1000; $i++) {
        echo $imp1_lines[$i]."<br>";
      }

    ?>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="imp2_ip" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('imp2_ip').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Impressions IP's</h4>
    </header>
    <div class="w3-container" style="height:400px">

    <?php

      for ($i = 0; $i <= 1000; $i++) {
        echo $imp2_lines[$i]."<br>";
      }

    ?>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="imp3_ip" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('imp3_ip').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Impressions IP's</h4>
    </header>
    <div class="w3-container" style="height:400px">

    <?php

      for ($i = 0; $i <= 1000; $i++) {
        echo $imp3_lines[$i]."<br>";
      }

    ?>

    </div>
  </div>
</div>

<!-- Modal -->
<div id="click1_ip" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('click1_ip').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Clicks IP's</h4>
    </header>
    <div class="w3-container" style="height:400px">

    <?php

      for ($i = 0; $i <= 1000; $i++) {
        echo $click1_lines[$i]."<br>";
      }

    ?>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="click2_ip" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('click2_ip').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Clicks IP's</h4>
    </header>
    <div class="w3-container" style="height:400px">

    <?php

      for ($i = 0; $i <= 1000; $i++) {
        echo $click2_lines[$i]."<br>";
      }

    ?>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="click3_ip" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('click3_ip').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Clicks IP's</h4>
    </header>
    <div class="w3-container" style="height:400px">

    <?php

      for ($i = 0; $i <= 1000; $i++) {
        echo $click3_lines[$i]."<br>";
      }

    ?>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="cash_app" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('cash_app').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Cash App Payment</h4>
    </header>
    <div class="w3-container">

    Send payment $10 or more to <?php echo $cashapp ?>
    <br> For: add note <?php echo $title ?> PPC <?php echo $email ?>
    <br><br>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="zelle" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-<?php echo $color ?> w3-display-container"> 
      <span onclick="document.getElementById('zelle').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Zelle Payment</h4>
    </header>
    <div class="w3-container">

    Send payment $10 or more to <?php echo $author ?> <?php echo $zelle ?>
    <br> For: add memo <?php echo $title ?> PPC <?php echo $email ?>
    <br><br>

    </div>
  </div>
</div>



<script>
function openSettings(evt, settingsName) {document.getElementById("demo").style.borderColor = "white"; 
  var i, x, tablinks;
  x = document.getElementsByClassName("settings");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-border-<?php echo $color ?>", "");
  }
  document.getElementById(settingsName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-<?php echo $color ?>";
}

//Number only for bids
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
       if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

var mybtn = document.getElementById("demo");
mybtn.click();

</script>


<!-- Footer -->
<footer class="w3-container <?php echo 'w3-'.$color.'' ?> w3-margin-top">
  <div class="w3-container w3-half">
    <big><p><?php echo $Day.", ".$Month." ".$date." ".$Year; ?></p></big>
  </div>
  <div class="w3-container w3-half" style="text-align:right">
    <big><p>
    <a href="#" onclick="document.getElementById('delete').style.display='block'">Delete Account</a>&emsp;&nbsp;
    <a href="#" onclick="document.getElementById('support').style.display='block'">Support</a>&emsp;&nbsp;
    <a href="https://www.keyworddiscovery.com/search.html" target="blank">Keyword Suggestion</a>
    </p></big>
  </div>
</footer>

</body>
</html>