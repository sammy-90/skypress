<form><input type="button" value="Go back!" onclick="history.back()"></form>

<?php

  //Get Data
  $email = $_REQUEST['requiredemail'];

  //Bot Blocker
  if(!$email){echo "Email Incorrect"; exit;}
  if (strpos(strtolower($email), strtolower(".")) === false){echo "Email Incorrect"; exit;}
  if (strpos(strtolower($email), strtolower("@")) === false){echo "Email Incorrect"; exit;}
  if (strpos(strtolower($email), strtolower("/")) !== false){echo "Email Incorrect"; exit;}
  if (strpos(strtolower($email), strtolower(" ")) !== false){echo "Email Incorrect"; exit;}
  if (strpos(strtolower($email), strtolower('"')) !== false){echo "Email Incorrect"; exit;}
  if (strpos(strtolower($email), strtolower("'")) !== false){echo "Email Incorrect"; exit;}

  //Check if file exist
  if (file_exists('myfiles/widgets/emails.php')){

    include 'myfiles/widgets/emails.php';   if (strpos(strtolower($list), strtolower($email)) !== false){echo "User already exists..."; exit;}
    $f=fopen('myfiles/widgets/emails.php','w');
    $list .= ",".$email;
    fwrite($f,'<?php'."\r\n");
    fwrite($f,'$list="'.$list.'";'."\r\n");
    fwrite($f,'?>');
    fclose($f);

  }else{
  
    $f=fopen('myfiles/widgets/emails.php','w');
    fwrite($f,'<?php'."\r\n");
    fwrite($f,'$list="'.$email.'";'."\r\n");
    fwrite($f,'?>');
    fclose($f);

  }

  //Send Email
  echo "<script>alert('Thank you, for subscribing!');window.location.href = 'sky-squeeze-page.php';</script>"; 

?>