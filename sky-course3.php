<?php session_start(); ?>
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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<?php if (file_exists("myfiles/settings-course.php")){include "myfiles/settings-course.php"; include "myfiles/course-database.php";}else{echo "Please 'Publish' Your Course... Admin > Application Settings > Course > Publish"; exit; }
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $lightbox = "theme-l5";
  $panelcolor = "theme-l5";
}
?>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<?php

  if(isset($_GET['logout'])){include "sky-logout.php";}  

  //Get Data
  $test_email = $_REQUEST['requiredemail'];
  if(isset($_POST['test_email'])){$test_email = $_POST['requiredemail'];}

  //get password
  $test_pw1 = $_SESSION['requiredpw1'];

  //Login
  if ($test_pw1 != $student_password){echo "&emsp;&nbsp;Login failed (Password Incorrect)"; exit;}
  $student = explode('|', $my_students);

  $match = 0;
  for($j = 0; $j < count($student); next($student), $j++){
    if (strpos(strtolower($student[$j]), strtolower($test_email)) !== false){$match++; break;}
  }

  //Username Failed
  if ($match == 0){echo "&emsp;&nbsp;Login failed (Username Incorrect)"; exit;}

?>

<style>

<?php

  if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
  if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
  if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; }

</style>

<body>

<div class="w3-sidebar w3-collapse w3-<?php echo $pagecolor ?>  w3-animate-left w3-large" style="z-index:3;width:300px;" id="mySidebar">
 <div class="w3-bar w3-black w3-center">
  <a class="w3-bar-item w3-button" style="width:33.33%" href="javascript:void(0)">
  <i class="fa fa-bars w3-xlarge"></i></a>
 </div>

 <div id="nav01" class="w3-bar-block">
  <a class="w3-button w3-hover-teal w3-hide-large w3-large w3-right" href="javascript:void(0)" onclick="w3_close()">X</a>

 <div class="w3-padding w3-<?php echo $footercolor ?>"><?php echo $title; ?></div> 

<?php

  $files = array();
  $dir = opendir('./myfiles/'.$_GET['c']); // open the cwd..also do an err check.
  while(false != ($file = readdir($dir))) {
    if (($file != ".") && ($file != "..")){
      $files[] = $file; // put in array.
    }   
  }natsort($files); // sort.

  // print.
  foreach($files as $file) {$counter++;
      $title = explode(".", $file);
      if (strpos(strtolower($file), strtolower("quiz")) !== false){
        echo '<a class="w3-bar-item w3-button custom_tc" href="?title='.$title[0].'&type=quiz&requiredemail='.$test_email.'&c='.$_GET['c'].'">'.$title[0].'</a>';
      } else if (strpos(strtolower($file), strtolower("links")) !== false){
        echo '<a class="w3-bar-item w3-button custom_tc" href="?title='.$title[0].'&type=links&requiredemail='.$test_email.'&c='.$_GET['c'].'">'.$title[0].'</a>';
      }else{
	echo '<a class="w3-bar-item w3-button custom_tc" href="?title='.$title[0].'&type='.$title[1].'&requiredemail='.$test_email.'&c='.$_GET['c'].'">'.$title[0].'</a>';
      }
  }echo '<a class="w3-bar-item w3-button custom_tc" href="sky-course2.php?requiredemail='.$test_email.'">Back</a>';

  closedir($dh); if($counter == 0){echo "&emsp;&nbsp;No Material Yet...<br><br>";}

?>

 </div>
</div>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;"> 

<div class="w3-top w3-large w3-hide-large">
  <i class="fa fa-bars w3-button <?php echo 'w3-'.$footercolor; ?> w3-xlarge" onclick="w3_open()"></i>
</div>

<header class="w3-<?php echo $footercolor ?> w3-container w3-center">
  <h1 class="w3-xxxlarge w3-padding-16"><?php echo $subtitle ?></h1>
</header>

<div class="w3-container w3-padding-large w3-section w3-<?php echo $pagecolor ?>">
  <p class="w3-xlarge"><?php echo $_GET['title'] ?></p>

  <?php

  $match = 0; $title = $_GET['title']; $type = ".".$_GET['type']; $c = "myfiles/".$_GET['c'];
  if ($_GET['type'] == "mp4") {$match++; echo "<center><video class='txtinput' width='50%' controls/><source src='myfiles/".$_GET['c']."/".$_GET['title'].".mp4' type='video/mp4'></video></center>";}
  if ($_GET['type'] == "mp3") {$match++; echo "<audio class='txtinput' controls/><source src='myfiles/".$_GET['c']."/".$_GET['title']."' type='audio/mp3'/></audio>";}
  if ($_GET['type'] == "quiz") {$match++; echo '<iframe src="sky-quiz.php?quiz='.$c.'/'.$title.'.txt" style="width:100%; height:300px; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">Your browser doesnt support iframes</iframe>';}
  if ($_GET['type'] == "links"){$match++;  
      $lines = file("myfiles/".$_GET['c']."/".$_GET['title'].".txt"); $count = 0;
      foreach($lines as $line){$count++; $pieces = explode("|", $line);
        echo '<div class="w3-border w3-card"><header class="w3-container w3-'.$footercolor.'"><big class="custom_tc">'.$count.')</big></header>';
        echo '<div class="w3-container w3-'.$panelcolor.'">';
        echo '<p><a href="'.$pieces[1].'" class="custom_color" target="blank">'.$pieces[0].' - visit link</a></p>';
        echo '</div></div><br>';
      }
  }
  if (($match == 0) && (strlen($_GET['type']) > 0)){echo 'Download<br><a class="w3-button w3-'.$footercolor.' w3-hover-white" href="'.$c.'/'.$title.$type.'" target="blank">'.$title.$type.'</a>';}

  ?>

  </div><br>

<footer class="w3-container w3-padding-large w3-light-grey w3-justify w3-opacity w3-<?php echo $lightbox ?>">
  <p><nav>
    <a href="<?php echo $fb ?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a><br><br>
  <a href="#" class="custom_tc" onclick="document.getElementById('about').style.display='block'">About</a> |
  <a href="#" class="custom_tc" onclick="document.getElementById('Instructor').style.display='block'">Your Instructor</a> |
  <a href="mailto: <?php echo $paypal ?>" class="custom_tc" >Contact: <?php echo $paypal ?></a> |
  <a href="sky-course.php?logout=out" class="custom_tc"  onclick = "if (! confirm('Are you sure?')) { return false; }">Log-Out</a>
  </nav></p>
</footer>

</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

</script>

</body>
</html> 

<!-- Modal -->
<div id="about" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('about').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>About</h4>
    </header>
    <div class="w3-container"><br>
	<p><?php echo $about ?></p>
    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="Instructor" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('Instructor').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Your Instructor</h4>
    </header>
    <div class="w3-container"><br>
  <p style="text-align: left;">
   <?php 
     if (file_exists("myfiles/bio-database.txt")) {
       $lines =  file("myfiles/bio-database.txt");

       foreach ($lines as $line_num => $line) {
         if(strlen($line) < 5){echo "<br><br>";}else{echo preg_replace('/[\x00-\x1F\x7F-\xFF]/', '',$line);}
       }
   
     }else{echo "Please upload your bio txt file. 'Admin Login' > 'Layout' > 'Photo:' > 'Add Bio'.";}
   ?>
  </p>
    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>