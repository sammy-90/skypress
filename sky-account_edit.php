<?php

  session_start();

  //Login
  $test_email = strtolower($_REQUEST['requiredemail']);
  if(isset($_POST['test_email'])){$test_email = strtolower($_POST['requiredemail']);}
  $test_pw1 = $_REQUEST['requiredpw1'];

  //get password
  if (isset($_POST['requiredpw1'])){$_SESSION['requiredpw1'] = $_POST['requiredpw1'];}
  if (isset($_GET['requiredpw1'])){$_SESSION['requiredpw1'] = $_REQUEST['requiredpw1'];}
  $test_pw1 = $_SESSION['requiredpw1'];

  //Bot Blocker 1
  if(!$test_email){echo "Bot Blocker 1"; exit;}
  if(!$test_pw1){echo "Bot Blocker 1"; exit;}

  //Find Account
  $account_name = explode("@", $test_email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);
  $myprofile = 'myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.php';
  $myprofile_tmp = 'myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.tmp';

  //Check if file exist
  if (file_exists($myprofile)){include $myprofile;}else{echo "User Not Found"; exit;}

  //Login
  if ($test_pw1 != $_REQUEST['requiredpw1']){echo "&emsp;&nbsp;<big>:( Login failed, <a href='".$_REQUEST['link'].".php'>Try again</a></big>"; exit;}

  $ip = $_REQUEST['ip'];
  $newpw1 = $_REQUEST['newpw1'];
  $newpw2 = $_REQUEST['newpw2'];

  $name = $_REQUEST['requiredname'];
  $email = strtolower($_REQUEST['requiredemail']);
  $city = $_REQUEST['requiredcity'];
  $state = $_REQUEST['requiredstate'];
  $country = $_REQUEST['requiredcountry'];
  $zip = $_REQUEST['requiredzip'];
  $pw1 = $_REQUEST['requiredpw1'];
  $color = $_REQUEST['color'];
  $address2 = $_REQUEST['required_address'];
  $phone = $_REQUEST['requiredphone']; 

  $mtitle = $_REQUEST['mtitle'];
  $mbday = $_REQUEST['mbday'];
  $gender = $_REQUEST['gender'];
  $bname = $_REQUEST['bname'];
  $desc = $_REQUEST['desc'];
  $mhours = $_REQUEST['mhours'];
  $msite = $_REQUEST['msite'];
  $mfb = $_REQUEST['mfb'];
  $mtwitter = $_REQUEST['mtwitter'];
  $msc = $_REQUEST['msc'];
  $mpinterest = $_REQUEST['mpinterest'];
  $minstagram = $_REQUEST['minstagram'];
  $mlinkedin = $_REQUEST['mlinkedin'];

  //ip check
  if(!$ip){echo "No Ip"; exit;}
  if ($ip != $_SERVER['REMOTE_ADDR']){echo "Ip Changed"; exit;}

  //verify password
  if($newpw1 != $newpw2){echo "Passwords do not match"; exit;}

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);

  //Check if file exist
  $f=fopen('myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.php','w');

  fwrite($f,'<?php'."\r\n");

  //account details
  fwrite($f,'$name="'.str_replace('"', "'", $name).'";'."\r\n");
  fwrite($f,'$email="'.str_replace('"', "'", $email).'";'."\r\n");
  fwrite($f,'$address2="'.str_replace('"', "'", $address2).'";'."\r\n");
  fwrite($f,'$city="'.str_replace('"', "'", $city).'";'."\r\n");
  fwrite($f,'$state="'.str_replace('"', "'", $state).'";'."\r\n");
  fwrite($f,'$country="'.str_replace('"', "'", $country).'";'."\r\n");
  fwrite($f,'$zip="'.str_replace('"', "'", $zip).'";'."\r\n");
  fwrite($f,'$phone="'.str_replace('"', "'", $phone).'";'."\r\n");
  fwrite($f,'$color="'.str_replace('"', "'", $color).'";'."\r\n");
  if(strlen($newpw1) > 7){fwrite($f,'$pw1="'.str_replace('"', "'", $newpw1).'";'."\r\n");}else{fwrite($f,'$pw1="'.str_replace('"', "'", $pw1).'";'."\r\n");}

  fwrite($f,'$mtitle="'.str_replace('"', "'", $mtitle).'";'."\r\n");
  fwrite($f,'$mbday="'.str_replace('"', "'", $mbday).'";'."\r\n");
  fwrite($f,'$gender="'.str_replace('"', "'", $gender).'";'."\r\n");
  fwrite($f,'$bname="'.str_replace('"', "'", $bname).'";'."\r\n");
  fwrite($f,'$desc="'.str_replace('"', "'", $desc).'";'."\r\n");
  fwrite($f,'$mhours="'.str_replace('"', "'", $mhours).'";'."\r\n");
  fwrite($f,'$msite="'.str_replace('"', "'", $msite).'";'."\r\n");
  fwrite($f,'$mfb="'.str_replace('"', "'", $mfb).'";'."\r\n");
  fwrite($f,'$mtwitter="'.str_replace('"', "'", $mtwitter).'";'."\r\n");
  fwrite($f,'$msc="'.str_replace('"', "'", $msc).'";'."\r\n");
  fwrite($f,'$mpinterest="'.str_replace('"', "'", $mpinterest).'";'."\r\n");
  fwrite($f,'$minstagram="'.str_replace('"', "'", $minstagram).'";'."\r\n");
  fwrite($f,'$mlinkedin="'.str_replace('"', "'", $mlinkedin).'";'."\r\n");

  fwrite($f,'$mrank="No Ranking Yet";'."\r\n");
  fwrite($f,'$balance="0";'."\r\n");

  fwrite($f,'?>');
  fclose($f);

  //Check if file exist
  if (file_exists($myprofile)){
     include $myprofile;
   }else{
     echo "User Not Found"; include "sky-logout.php"; exit;
   }

  //backup color
  $user_color = $color;

  //Turn In Login
  $login = "on"; 

  include $_REQUEST['link'].".php";

?>