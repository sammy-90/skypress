<?php

session_start();

//Signup 
if (strlen($_REQUEST['requiredpw2']) > 3){

  //Get Data
  if($_REQUEST['category1'] == "Captcha@"){$Category = $_REQUEST['category1'];}
  if($_REQUEST['category101'] == "Captcha@"){$Category = $_REQUEST['category101'];}
  $ip = $_REQUEST['ip'];
  $pw2 = $_REQUEST['requiredpw2'];

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

  //Bot Blocker 0 - 1
  if($Category != "Captcha@"){echo $Category."Bot Blocker 0"; exit;} 
  if(!$name){echo "Bot Blocker 1"; exit;}
  if(!$email){echo "Bot Blocker 1"; exit;}
  if(!$city){echo "Bot Blocker 1"; exit;}
  if(!$state){echo "Bot Blocker 1"; exit;}
  if(!$country){echo "Bot Blocker 1"; exit;}
  if(!$zip){echo "Bot Blocker 1"; exit;}
  if(!$pw1){echo "Bot Blocker 1"; exit;}
  if(!$pw2){echo "Bot Blocker 1"; exit;}
  if(!$color){echo "Bot Blocker 1"; exit;}

  //Bot Blocker 3
  if (strlen($city)>2){echo " - ";}else{echo "Incorrect Input City"; exit;}
  if (strlen($state)>1){echo " - ";}else{echo "Incorrect Input State"; exit;}
  if (strlen($country)>1){echo " - ";}else{echo "Incorrect Input Country"; exit;}
  if (strlen($zip)>4){echo " - ";}else{echo "Incorrect Input Zip"; exit;}

  //ip check
  if(!$ip){echo "No Ip"; exit;}
  if ($ip != $_SERVER['REMOTE_ADDR']){echo "Ip Changed"; exit;}

  //Bot Blocker 2
  if (strpos(strtolower($email), strtolower("@")) === false){echo "Bot Blocker 2"; exit;}

  //verify password
  if($pw1 != $pw2){echo "Passwords do not match"; exit;}

  //verify password
  if(strlen($pw1) < 8){echo "Password Must be at least 8 characters long..."; exit;}

  //Create Account
  $account_name = explode("@", $email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);

  //Check if file exist
  if (file_exists('myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.php')){echo "Username already exist"; exit;}
  $f=fopen('myfiles/'.$_REQUEST['dir'].'/hold-'.$myinfo.'.php','w');

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
  fwrite($f,'$pw1="'.str_replace('"', "'", $pw1).'";'."\r\n");

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

  //Send Email
  mail($email,"Signup Information","Thank you for signing up! Your Login info is... Username: ".$email." password: ".$pw1);
  include "myfiles/settings.php"; mail($paypal,"New Lead","You have a new lead from ".$email);

  echo "Account has been created and is pending payment & approval from admin, <a href='javascript:window.history.back();'>Go Home</a>."; 
  if($color == "customer"){include "sky-account-pay.php";}else{include "sky-account-pay1.php";}

}else{echo "Error please try again"; exit;}

?>