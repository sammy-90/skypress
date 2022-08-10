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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "myfiles/settings-os.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
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

ul {
    display: flex;
    align-items: stretch; /* Default */
    justify-content: space-between;
    width: 100%;
    margin: 0;
    padding: 0;
}
li {
    display: block;
    flex: 0 1 auto; /* Default */
    list-style-type: none;
}

td{word-wrap: break-word;}

a {text-decoration: none;}
a:hover {text-decoration: underline; text-decoration-color: white;}
html,body {overflow-x: hidden;color:#fff; font:16px 'Arial',sans-serif;background-color:white;}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 7px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

</style>
<?php echo '<body class="w3-'.$pagecolor.'">' ?>


<html>
<body>

<!--Delete-->
<div id="Delete" style="display:block; background-Color:#D8D8D8;border: 0px; text-align:left; position:absolute; left:0;top:0;width:100%">

 <div style="background-Color:white;padding:10px;width:100%"><br><a href="#" onclick="closeall()"><font color="black"><big><b>Delete Your Ad</b></big></font></a><br><br></div>

 <div style="background-Color:#D8D8D8;padding:10px;width:95%">

  <form enctype="multipart/form-data" method="post" onSubmit="return checkrequired(this)" action="sky-classified_delete.php">
  <table width="100%" class="txtinput" style="text-align:left;color:black"><tr><td style="padding:10px;">

  Your Password:</td><td style="padding:10px;">
  <INPUT class="txtinput" class="txtinput" name="pw" id="pw" value="<?php echo $_GET['pw'] ?>" title="Enter your password to delete post..." size="20"></tr><tr><td>

  <input class="button" type="submit" value="Delete Ad"/><br><br><INPUT class="button" type="button" value="Cancel" onclick="location.href='sky-classified.php';"/></tr></td>

  </table>
  </form>

 </div>

</div>

</body>
</html>


<?php

if (isset($_POST['pw'])){
  
 //Get Password
 $pw = $_POST['pw']; 

 if((strlen($pw) > 8) && (strlen($pw) < 12)){

   //Get Files
   $file = "myfiles/widgets/classified.txt";
   $tfile = "myfiles/widgets/classified.tmp";

   //Setup Arrays
   $lines = file($file); $Ads = array(); 

   //Get Ad Desc
   for($c = 0; $c < count($lines); next($lines), $c++){
     $Ad = explode("|",$lines[$c]);
     $Ads[] = $Ad[5];
   }

   //Find & Remove Select Ad
   $handle = fopen($tfile, 'w');
   for($c = 0; $c < count($Ads); next($Ads), $c++){
     if (strpos(strtolower($Ads[$c]), strtolower($pw)) === false){fwrite($handle, $lines[$c]);}
   }
   fclose($handle);

   //Over-write Files 
   rename('myfiles/widgets/classified.tmp', 'myfiles/widgets/classified.txt');
   header('Location: sky-classified.php');  
 }

}

?>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>