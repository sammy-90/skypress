<!DOCTYPE html>
<html lang="en">
<title><?php echo $title ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} 
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $lightbox = "theme-l5";
}else{
  $lightbox = $footercolor;
}
?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>
<style>
html{scroll-behavior: smooth;}
body {font-family: "Lato", sans-serif;}
.mySlides {display: none}
<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>
</style>
<?php echo '<body class="w3-'.$pagecolor.'">' ?>

<?php if (file_exists("myfiles/settings-custom-t.php")){include "myfiles/settings-custom-t.php"; echo $txt;}else{echo "Please Publish Your Custom Template... Admin > Application Settings > Custom Template	> Settings
 ";} ?>

</body>
</html>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>