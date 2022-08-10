<?php

  //Get Data
  $test_email = $_REQUEST['requiredemail'];
  $test_pw1 = $_REQUEST['requiredpw1'];

  //Get Banner
  if(isset($_POST['test_email'])){$test_email = $_POST['requiredemail'];}
  if(isset($_POST['requiredpw1'])){$test_pw1 = $_POST['requiredpw1'];}

  //Bot Blocker 1
  if(!$test_email){echo "Bot Blocker 1"; exit;}
  if(!$test_pw1){echo "Bot Blocker 2"; exit;}

  //Find Account
  $account_name = explode("@", $test_email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);
  $myprofile = 'myfiles/delivery-members/'.$myinfo.'.php';
  $myprofile_tmp = 'myfiles/delivery-members/'.$myinfo.'.tmp';

  //Check if file exist
  if (file_exists($myprofile)){include $myprofile;}else{echo "User Not Found"; exit;}

  //Login
  if ($test_pw1 != $pw1){echo "&emsp;&nbsp;<big>:( Login failed, <a href='sky-delivery.php'>Try again</a></big>"; exit;}

  //Get Data
  $name2 = $_REQUEST['requiredname'];
  $address2 = $_REQUEST['required_address'];
  $city2 = $_REQUEST['requiredcity'];
  $state2 = $_REQUEST['requiredstate'];
  $country2 = $_REQUEST['requiredcountry'];
  $zip2 = $_REQUEST['requiredzip'];
  $phone2 = $_REQUEST['requiredphone']; 
  $alerts2 = $_REQUEST['alerts'];
  $newpw1 = $_REQUEST['newpw1'];
  $newpw2 = $_REQUEST['newpw2'];
  $ip = $_REQUEST['ip'];

  //ip check
  if(!$ip){echo "No Ip"; exit;}
  if ($ip != $_SERVER['REMOTE_ADDR']){echo "Ip Changed"; exit;}

  //verify password
  if($newpw1 != $newpw2){echo "Passwords do not match"; exit;}

  $lines = file($myprofile);

  $handle = fopen($myprofile_tmp, 'w');
  foreach($lines as $line){$match = 0;
    if (strpos($line, "$name")){$match++;    fwrite($handle,'$name="'.str_replace('"', "'", $name2).'";'."\r\n");}
    if (strpos($line, "$address")){$match++; fwrite($handle,'$address="'.str_replace('"', "'", $address2).'";'."\r\n");}
    if (strpos($line, "$city")){$match++;    fwrite($handle,'$city="'.str_replace('"', "'", $city2).'";'."\r\n");}
    if (strpos($line, "$state")){$match++;   fwrite($handle,'$state="'.str_replace('"', "'", $state2).'";'."\r\n");}
    if (strpos($line, "$country")){$match++; fwrite($handle,'$country="'.str_replace('"', "'", $country2).'";'."\r\n");}
    if (strpos($line, "$zip")){$match++;     fwrite($handle,'$zip="'.str_replace('"', "'", $zip2).'";'."\r\n");}
    if (strpos($line, "$phone")){$match++;   fwrite($handle,'$phone="'.str_replace('"', "'", $phone2).'";'."\r\n");}
    if (strpos($line, "$alerts")){$match++;  fwrite($handle,'$alerts="'.str_replace('"', "'", $alerts2).'";'."\r\n");}
    if (strpos($line, "$pw1")){$match++;
      if(strlen($newpw1) >= 8){
         if(strlen($_REQUEST['usignup4']) > 5){fwrite($handle,'$pw1="'.str_replace('"', "'", $_REQUEST['usignup4'].$newpw1).'";'."\r\n");}else{fwrite($handle,'$pw1="'.str_replace('"', "'", $newpw1).'";'."\r\n");}
      }else{
         fwrite($handle,'$pw1="'.str_replace('"', "'", $pw1).'";'."\r\n");
      }
    }
    if ($match == 0){fwrite($handle, $line);}
  }fclose($handle);

  rename($myprofile_tmp, $myprofile);

  include "sky-delivery.php";

?>