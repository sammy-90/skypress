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
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>
</style>
<?php echo '<body class="w3-'.$panelcolor.'">' ?>

<div class="w3-container w3-<?php echo $panelcolor ?>">

<?php
$action=$_REQUEST['action'];
if ($action==""){
  echo '<form action="" method="POST" enctype="multipart/form-data">';
  echo '<input type="hidden" name="action" value="submit">';
  echo 'Your name:<br>';
  echo '<input name="name" type="text" value="" size="30"/><br>';
  echo 'Your email:<br>';
  echo '<input name="email" type="text" value="" size="30"/><br>';
  echo 'Your message:<br>';
  echo '<textarea name="message" rows="7" cols="30"></textarea><br>';
  echo '<input type="submit" value="Send Message"/>';
  if(strlen($contact_msg)>3){echo "<br>$contact_msg";}
  echo '</form>';
}else{
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $message=$_REQUEST['message'];
  if (($name=="")||($email=="")||($message=="")){
    echo "All fields are required, please fill <a href=\"\"><u>the form</u></a> again.";  
  }else{
   include "sky-antispam.php";
   $subject="Message sent using your contact form";
   mail($paypal, $subject, $message." from ".$email);
   echo "Email sent!";
  }
}
?>

</div>