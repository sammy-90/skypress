<!-- Streaming Engine -->

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
  include "version.php"; include "index-settings.php";
  $version = "Firewall Settings";

  //login
  session_start();
  include "../sky-password.php";
  if ($_SESSION['password'] !== $your_password){echo "Page Not Found"; exit;}

  //Delete Firewall
  if(isset($_GET['delete'])){
 
    if ($_GET['delete'] == 'firewall'){

      //Reset
      unlink('../firewall.txt');

      echo "<script>\n"; 
      echo "alert(\"Firewall Was Reset...\");\n"; 
      echo "</script>\n";

    }

  }
 
  if (file_exists("../firewall.txt")){$fw = file("../firewall.txt");}

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

<div class="container w3-rest">

<form name="form" action="index-custom.php" method="get">
<a href="index.php" class="w3-round w3-button w3-purple">Back</a>
<a href="?delete=firewall"  type="button" class="w3-round w3-button w3-purple" onclick="if (! confirm('Reset Firewall?')) { return false; }" >Reset Firewall</a>

<br><br><center>
  <div id="site_content" class="w3-container w3-border tab" style="display:block">
<table>
<tr>
<td>&emsp;Blocked Ip's&nbsp;</td> 
</td> 
</tr> 

<tr>
<td>
<textarea  class="txtinput" cols="100%" rows="20" readonly="readonly" maxlength="1000">
<?php 

  for ($x = 0; $x <= 10; $x++) {
      echo $fw[$x]."\r\n";
  }

?>
</textarea>
</td>
</tr>

</table>
       
</div>

  </div>

</form>
</center>
</big>