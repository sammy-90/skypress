<?php

  //Get Data
  $test_email = $_REQUEST['requiredemail'];

  //Bot Blocker 1
  if(!$test_email){echo "Bot Blocker 1"; exit;}

  //Find Account
  $account_name = explode("@", $test_email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);
  $myprofile = 'myfiles/delivery-members/'.$myinfo.'.php';

  //Check if file exist
  if (file_exists($myprofile)){include $myprofile;}else{echo "User Not Found"; exit;}

  //Send Password
  mail($email,"Forgot Password","Your password is: ".$pw1);
  echo "Password was sent to ".$email."<br><a href='sky-delivery.php'>Go Home</a>";

?>