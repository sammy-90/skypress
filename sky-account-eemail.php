<?php

  session_start();

  if(isset($_GET['logout'])){include "sky-logout.php";}   

  //Login
  $test_email = strtolower($_REQUEST['requiredemail']);
  $test_email2 = strtolower($_REQUEST['requiredemail_new1']);
  $test_email3 = strtolower($_REQUEST['requiredemail_new2']);
  if(isset($_POST['test_email'])){$test_email = strtolower($_POST['requiredemail']);}

  //get password
  if (isset($_POST['requiredpw1'])){$_SESSION['requiredpw1'] = $_POST['requiredpw1'];}
  if (isset($_GET['requiredpw1'])){$_SESSION['requiredpw1'] = $_REQUEST['requiredpw1'];}
  $test_pw1 = $_SESSION['requiredpw1'];

  //Bot Blocker 1
  if(!$test_email){echo "Bot Blocker 1"; exit;}
  if(!$test_pw1){echo "Bot Blocker 2"; exit;}
  if($test_email2 !== $test_email3){echo "Emails don't match"; exit;}

  //Find Account
  $account_name = explode("@", $test_email);
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);

  $account_name2 = explode("@", $test_email2);
  $myinfo2 = $account_name2[0].substr($account_name2[1], 0, 1);

  $myprofile = 'myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.php';

  //Check if file exist
  if (file_exists($myprofile)){
     include $myprofile;
   }else{

     //admin login
     if(file_exists("sky-password.php")){include "sky-password.php"; if (($test_pw1 == $your_password) && ($test_email == "admin")){$_SESSION['password'] = $your_password; include 'sky-account_members.php'; exit;}}
     echo "User Not Found"; include "sky-logout.php"; echo " <a href='index.php'>Refresh</a>"; exit;

   }

  //Login
  if ($test_pw1 != $pw1){echo "&emsp;&nbsp;Login failed"; include "sky-logout.php"; echo " <a href='index.php'>Refresh</a>"; exit;}

  //backup color
  $user_color = $color;

  //Turn In Login
  $login = "on"; 

  //Update Email
  $f=fopen('myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.php','w');

  fwrite($f,'<?php'."\r\n");

  //account details
  fwrite($f,'$name="'.str_replace('"', "'", $name).'";'."\r\n");
  fwrite($f,'$email="'.str_replace('"', "'", $test_email2).'";'."\r\n");
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

  fwrite($f,'$mrank="'.str_replace('"', "'", $mrank).'";'."\r\n");
  fwrite($f,'$balance="'.str_replace('"', "'", $balance).'";'."\r\n");

  fwrite($f,'?>');
  fclose($f);
     
  if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo.".php")){rename("myfiles/".$_REQUEST['dir']."/".$myinfo.".php","myfiles/".$_REQUEST['dir']."/".$myinfo2.".php");}
  if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo.".jpg")){rename("myfiles/".$_REQUEST['dir']."/".$myinfo.".jpg","myfiles/".$_REQUEST['dir']."/".$myinfo2.".jpg");}
  if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo."_mrank.php")){rename("myfiles/".$_REQUEST['dir']."/".$myinfo."_mrank.php","myfiles/".$_REQUEST['dir']."/".$myinfo2."_mrank.php");}
  if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo."_header.jpg")){rename("myfiles/".$_REQUEST['dir']."/".$myinfo."_header.jpg","myfiles/".$_REQUEST['dir']."/".$myinfo2."_header.jpg");}
  if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo."_review.txt")){rename("myfiles/".$_REQUEST['dir']."/".$myinfo."_review.txt","myfiles/".$_REQUEST['dir']."/".$myinfo2."_review.txt");}

  echo "Email Updated..."; include "sky-logout.php"; echo " <a href='index.php'>Refresh</a>"; exit;

?>