<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<style>

.table {
  border-radius: 25px;
  border: 2px solid purple;
  background-color: white;
  padding: 20px;
  width: 200px;
  height: 150px;
}

table {font-size: 19px; padding: 20px;}

INPUT, select option, button {
  font-family: arial, verdana, ms sans serif;
  color: black; font-size: 12pt;
}

.mobile-mode101 {display:none;}

@media only screen and (max-width: 800px) {
  .txtinput{width:100%;}
  .mobile-mode101 {display:block;}
}

</style>

<?php

  //version
  include "version.php"; include "ismobile.php"; include "index-settings.php"; 
  $version = "Crawler Settings";

  $maxsize = 2000;

  //login
  session_start();
  include "../sky-password.php";
  if ($_SESSION['password'] !== $your_password){echo "Page Not Found"; exit;}

  //save Settings
  if (isset($_GET['crawl'])) {
    $f=fopen('../myfiles/settings-crawl.php','w');
    $mylist = str_replace('>', '', $_GET['crawl']);
    $mylist = str_replace('<', '', $mylist);
    fwrite($f,str_replace('"', "'", $mylist));
    fclose($f);
 
    echo "<script>\n"; 
    echo "alert(\"Saved Successful...\");\n"; 
    echo "</script>\n";

  } 

?>

<body>

<!-- Top -->
<div class="w3-top w3-animate-left">
  <div class="w3-row w3-purple w3-padding">
    <div class="w3-half" style="margin:4px 0 6px 0"><a href='<?php echo $domain ?>/skypress.php' target='blank'><big><?php echo $version; ?></big></a></div>
    <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small"><div class="w3-right">THE WORLD'S FASTEST SITE BUILDER</div></div>
  </div>
</div>


<div id="search" class="w3-container w3-border" style="display:block">

<br>

<div class="container">

<form name="form" action="index-crawling.php" method="get">

<center>
<a href="index.php" class="w3-button w3-purple">Back</a>
<input type="submit" class="w3-button w3-purple" value="Save"  title="Save & Update Crawl lists"/>
<input onclick="window.open('../sky-crawler.php')" type="button" class="w3-button w3-purple" value="Crawl"  title="Run Crawler For Site Lists"/>
<a href="#" onclick="document.getElementById('help').style.display='block'" class="w3-button w3-purple">Help</a>

<center>

</div><big><br>
<center>

<form name="form" action="index-crawling.php" method="get">

Add Your Sites Below To Crawl<br>
<textarea id="crawl" name="crawl" class="txtinput" cols="85" rows="15">
<?php

  //Open API Code
  if(file_exists("../myfiles/settings-crawl.php")){
    $crawl = file_get_contents('../myfiles/settings-crawl.php');
    $data = str_replace("\r\n", "\n", $crawl);
    echo $crawl;
  }

?>
</textarea><br><br>

</center>
</big>
<br>

<!-- Modal -->
<div id="help" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('help').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Crawler Settings</h4>
    </header>
    <div class="w3-container"><br>

<b>Add Sites</b> - Add one site per line, click "Save" when done.<br>
<b>Crawl</b> - Click "Spider lists" to start crawling sites.<br><br>

    </div>
  </div>
</div>

</center>