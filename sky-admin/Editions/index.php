<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">

<style type="text/css">

  INPUT, SELECT, Text  {
    background-color: black;
    color: white;
    font-family: arial, verdana, ms sans serif;
    font-weight: bold;
    font-size: 8pt;
  }

  a {text-decoration: none;color: white;} 
  BODY {background-color: black;background-size: cover; scrollbar-base-color: white;}

  @media only screen and (max-width: 800px) {
    .txtinput{width:100%;}
  }

</style>


<html><body>

<center><a href="#" onclick="goBack()"><b>Back</b></a></center>

<hr style="color:white">

<?php

//File Manager Start
$Filecounter = 0;
$dh = opendir(".");
$URL = $_SERVER['SERVER_NAME'];

while (($file = readdir($dh)) !== false){
 if (strpos(strtolower($file), strtolower("jpg")) !== false){

     //Make Link
     echo "<br><a href=\"#\" onclick=\"Run('sky-admin/Editions/$file@black@black@75@white@webos')\"><img src=\"$file\" width=\"94\" height=\"72\" BORDER=\"0\"><font color=\"white\"><big>&nbsp;$file</big></font></a><br>\n\n";
 }
}

closedir($dh);

?>

</body></html>

<script>

  function Run(P_Code){top.location.href="../../sky-os.php?Remaster="+P_Code;}
  function goBack(){window.history.back();}

</script>