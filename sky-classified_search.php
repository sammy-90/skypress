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

* {
  box-sizing: border-box;
}

#myInput {
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}

body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

/*--Layout--*/
html,body{height:100%; width:100%;}

</style>
<?php echo '<body class="w3-'.$pagecolor.'">' ?>

  <div class="row">
    <div class="column column100" style="text-align:center;height:100%">

	<?php

 	  //Press Or Classified
	  $type = $_GET['type']; if(!$type){$type = "class";}

          if ($type === "class"){

            echo '<h1><a href="index.php" title="Post A Free Ad - Click Here">Classified Ads Search</a></h1>';

          }else{

            echo '<h1><a href="sky-classified.php?type=press-release" title="Post A Free Press Release - Click Here">Press Release Search</a></h1>';

          }

        ?>
        
     </div>
  </div>

  <div class="row">
    <div class="column column75" style="text-align:left; height:100%">

</head>
<body>

<?php

 if ($type === "class"){

 echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Classifieds.." title="Type in a service">';

 echo '<ul id="myUL">';

  if (file_exists("myfiles/widgets/classified.txt")){

   $lines2 = file('myfiles/widgets/classified.txt');  $lines = array_reverse($lines2);

   for($sc = 0; $sc < count($lines); next($lines), $sc++){
     $data = explode("|",$lines[$sc]);
     if (strlen($data[3]) > 2){
       echo "<li><a href=\"http://$data[4]\">$data[0] - $data[2]. Phone: $data[3]</a></li>\n";
     }else{
       echo "<li><a href=\"http://$data[4]\">$data[0] - $data[2]</a></li>\n";
     }
   }

  }

 }else{

 echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Press Release.." title="Type in a service">';

 echo '<ul id="myUL">';

  if (file_exists("myfiles/widgets/press-release.txt")){

   $lines2 = file('myfiles/widgets/press-release.txt');  $lines = array_reverse($lines2);

   for($sc = 0; $sc <= 75; $sc++){
     $data = explode("|",$lines[$sc]);
     if (strlen($data[3]) > 2){
       echo "<li><a href=\"http://$data[4]\">$data[0]<br><br>$data[2]. Phone: $data[3]</a></li>\n";
     }else{
       echo "<li><a href=\"http://$data[4]\">$data[0]<br><br>$$data[2]</a></li>\n";
     }
   }

  }

 }

?>

</ul>

  </div>

</div>

  <?php if ($ads_code){echo "<div class='w3-container w3-center'><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php"; echo "<br>";} ?>

<!-- Footer -->
<footer class="w3-container <?php echo 'w3-'.$footercolor.'' ?> w3-padding-32 w3-margin-top">
    <big>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <?php include "sky-links.php"; ?>
    </big>
  <p class="custom_tc">&#169; <?php echo date("Y"); echo " ".$footertext ?></p>
</footer>

</body>
</html>

<SCRIPT LANGUAGE="JavaScript">

 function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
 }

</SCRIPT>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>