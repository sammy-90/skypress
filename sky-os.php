<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/sky2.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<?php if (file_exists("myfiles/settings-os.php")){include "myfiles/settings-os.php";}else{echo "Please 'Publish' Your desktop... Admin > Application Settings > Desktop > Publish"; exit; }  ?>

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

<?php

  $API = "ON";
  $Uname = $_GET['Uname'];
  $Folder = $_GET['folder'];
  $Split[0] = "sky-admin/Editions/".$wallpaper.".jpg";
  $Split[1] = $deskcolor;
  $Split[2] = $taskcolor;
  $Split[3] = $opacity;
  $Split[4] = $textcolor;
  if (strpos(strtolower($_SERVER['HTTP_REFERER']), strtolower("editions/wp/index.html")) !== false){$AutoSave = "ON";}
  if (strpos(strtolower($_SERVER['HTTP_REFERER']), strtolower("editions/index.html")) !== false){$AutoSave = "ON";}

?>

<script type="text/javascript">

//version
var uname = "<?php echo $uname ?>"; edition = "<?php echo $edition ?>"; shorturl = "SupremeSearch.net";Domain = "http://www."+shorturl+"/"; var mobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));

//Debug Mode
//mobile = true;

//System Info
var today = new Date(); var year = today.getFullYear();
var corp = "Search-Soft Corporation";

</script>

<style> 

myicons {
    color: white;
    text-shadow:5px 5px 5px black;
}

html,
body {
   margin:0;
   height: 100%;
   color: white;
   font-size: 20px; 
   font-weight: bold;
   font-family: arial; 
   background-size: cover;
   scrollbar-base-color: black;
   background-repeat: repeat; cursor: default;
   overflow-x: hidden; overflow-y: hidden;
}

INPUT {
  font-family: arial, verdana, ms sans serif;
  color: black; font-size: 12pt;
}

a {text-decoration: none; color:white} 

@media only screen and (max-width: 800px) {
  .txtinput{width:100%;}.txtinput{max-width:100%;}
  .txtinput2{width:90%;}.txtinput2{max-width:90%;}
}

#RTime, #RTime2, #Usage, SELECT {
   font-family: arial, verdana, ms sans serif;
   color: black; font-weight: bold; font-size: 17pt;
}

#Usage1,#Usage2,#Usage3,#Usage4 {
  width: 2px; height: 100%; padding: 0px; border: transparent;
}

tr.container1,tr.container2,tr.container3 { height: 20px; }

.intro {
    width: 24px;
    height: 4px;
    background-color: white;
    margin: 6px 6px;
    -moz-box-shadow:    1px 1px 1px 1px black;
    -webkit-box-shadow: 1px 1px 1px 1px black;
    box-shadow:         1px 1px 1px 1px black;
}

h1 { text-transform: uppercase; }
h1 ~ span, p { color: #2d2d2d; }
.thin {color:white; font-weight: 500;}
.thick {color:white; font-weight: 1000;}

/*--SearchBar--*/
#search-form {
height: 50px;
border: 1px solid white;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
background-color: #fff;
overflow: hidden;
}

#search-text {
font-size: 21px;
color: black;
border-width: 0;
background: transparent;
}

#search-box input[type="text"]{
width: 90%;
padding: 11px 0 12px 1em;
color: black;
outline: none;
}

#search-button {
position: absolute;
top: 0;
right: 0;
height: 52px;
width: 80px;
font-size: 21px;
color: #fff;
text-align: center;
border-width: 0;
background-color:darkblue;
-webkit-border-radius: 0px 5px 5px 0px;
-moz-border-radius: 0px 5px 5px 0px;
border-radius: 0px 5px 5px 0px;
cursor: pointer;
}

/*--Menu Button--*/
.border-menu {
  position: relative;
  padding-left: 1.25em;
}
/*--Menu Button--*/
.border-menu2 {
  position: relative;
  padding-left: 1.25em;
}
.border-menu:before {
  content: "";
  position: absolute;
  top: 0.25em;
  left: 0;
  width: 1em;
  height: 0.150em;
  border-top: 0.375em double darkblue;
  border-bottom: 0.125em solid darkblue;
}
.border-menu2:before {
  content: "";
  position: absolute;
  top: 0.25em;
  left: 0;
  width: 1em;
  height: 0.150em;
  border-top: 0.375em double white;
  border-bottom: 0.125em solid white;
}

@media only screen and (max-width: 800px) {
  #c-search{width:75%;}
  #search{width:50%;}
  ul {width:75%;}
  html, body {font-size: 16px;}
}

</style>

<script src="sky-admin/ajax/jquery-1.7.2.min.js"></script>
<script src="sky-admin/ajax/jquery-ui.min.js"></script>

<script>var legacy = "off";</script>
<!--[if IE 8]><script>legacy = "on";</script><![endif]-->

<script language="JavaScript">

 //Sounds
 if (legacy != "on"){
   var audio2_loop = 1;
   var audio2 = new Audio('sky-admin/<?php echo $chime ?>');
 }

 //Legacy Mode Hotfix
 if (legacy == "on"){var localStorage = "";}

 //Settings
 var files = 9;
 var file_ct = 0;
 var My_Color = 1;
 var Domain = "http://www.supremesearch.net/";
 var webos = location.search.match(/webos/i);
 var liveos = location.search.match(/liveos/i);
 var demo = location.toString();demo = demo[demo.length -1];

 //taskcolor, deskcolor, textcolor, transparent color
 var WindowColor = "<?php echo $taskcolor ?>";	var DesktopColor = "<?php echo $deskcolor ?>";	var TextColor = "<?php echo $textcolor ?>";  var Color_Mode = <?php echo $opacity ?>;

 //API & AutoSave
 if ("<?php echo $API ?>" == "ON"){var API = "ON";}else{var API = "OFF";}
 if ("<?php echo $AutoSave ?>" == "ON"){var AutoSave = "ON";}else{var AutoSave = "OFF";}
 if (API == "ON"){
   if ("<?php echo $Uname ?>".length >= 2){uname="<?php echo $Uname ?>";}
   if (uname.toLowerCase().indexOf("@") != -1){uname=uname.split('@')[0];}
   var DesktopColor = "<?php echo $Split[1] ?>"; var WindowColor = "<?php echo $Split[2] ?>"; var Color_Mode = "<?php echo $Split[3] ?>";  var TextColor = "<?php echo $Split[4] ?>";
 }

 var weekday=new Array(7); weekday[0]="Sunday"; weekday[1]="Monday"; weekday[2]="Tuesday";
 weekday[3]="Wednesday"; weekday[4]="Thursday"; weekday[5]="Friday"; weekday[6]="Saturday";

 var Today = weekday[today.getDay()];
 var day = today.getDate();
 var month = today.getMonth(); month = (month + 1);

 var suffix="AM"; 
 var hours = today.getHours(); var minutes = today.getMinutes();
 if (hours > 11){suffix="PM";}

 //Debug
 Random = "<?php echo $Split[0] ?>";
 //Random = "Editions/cowins.jpg";

 //Default HomePAge
 //if(!webos){var myrand = Math.floor(Math.random() * 10); if(myrand == 0){Random = "none"; document.body.style.backgroundColor = "#66CCFF";}}

 //Background
 if (Random != "none"){
   if (API == "ON"){
     document.write('<body background="<?php echo $Split[0] ?>">');
   }else{
     document.write('<body background="' + Random + '">');
   }
 }

 if ((API == "ON") && (Random != "none")){
    Random = "Editions/<?php echo $wallpaper ?>.jpg"; 
    if (AutoSave  == "ON"){localStorage.Save = Random+"@"+DesktopColor+"@"+WindowColor+"@"+Color_Mode+"@"+TextColor;}
 }

 //Photo Credits
 var credits = Random.replace("wp/","");
     credits = credits.replace(".jpg","");
     credits = credits.replace(Domain,"");

 //Kiosk Mode
 function OS(link){top.location.href = link;return false;}

 //Local_Storage
 if (typeof(Storage) !== "undefined"){var Local_Storage = "true";}else{var Local_Storage = "false";}

</script>

<div id="BG_OBJ"></div>
<html style="width: 100%;height: 100%;">
<body style="width: 100%;height: 100%;" bgcolor="black" onclick="CPU_UP(); Hide_Icons();" onmousemove="CPU_UP();" onkeypress="CPU_UP()" oncontextmenu="CPU_UP()">


<!-- Webtop 1 -->
<div id="Desktop1" style="width: 100%;height: 100%;display:block" title="Double Click To Add Bookmarks" ondblclick="document.getElementById('Installer').style.display = 'block'" onclick="playaudio2()">
<input type='file' id="dragdropper" onchange="readURL(this);" style="display:none;position: absolute; top: 0px;left: 0px;opacity:0;height:100%;width:100%"/>
<table cellpadding="3" CELLSPACING="0" style="border-collapse: collapse;width: 100%;height: 100%;">

<!-- Row 1 -->
<tr>
<td>
<div id="settings_menu" style="position: absolute; top: 0px;left: 0px;">
<a href="#" title="Settings" onclick="document.getElementById('Desktop1').style.display = 'none'; document.getElementById('Desktop3').style.display = 'block'" onmouseover="document.getElementById('Desktop1').style.display = 'none'; document.getElementById('Desktop3').style.display = 'block'";>
<div class="intro"></div>
<div class="intro"></div>
<div class="intro"></div>
</a>
</div>
</td>
</tr>

<!-- Row 1 -->

<tr>
<td>
<DIV ID="Icon1"></Div>
</td>

<td>
<DIV ID="Icon4"></Div>
</td>

<td>
<DIV ID="Icon7"></Div>
</td>

<script>if (!mobile){document.writeln('<td width="100%"></td>');}</script>
</tr>

<!-- Row 2 -->

<tr>
<td>
<DIV ID="Icon2"></Div>
</td>

<td>
<DIV ID="Icon5"></Div>
</td>

<td>
<DIV ID="Icon8"></Div>
</td>

<script>if (!mobile){document.writeln('<td width="100%"></td>');}</script>
</tr>

<!-- Row 3 -->

<tr>
<td>
<DIV ID="Icon3"></Div>
</td>

<td>
<DIV ID="Icon6"></Div>
</td>

<td>
<DIV ID="Icon9"></Div>
</td>

<script>if (!mobile){document.writeln('<td width="100%"></td>');}</script>
</tr>

<!-- TASKBAR -->

<tr class="container1" id="container1" style="border:2px solid white;">
<td colspan="4" id="TaskBar1" bgcolor="black" onmouseover="startmenupop()" onmouseout="startmenuend()">

    <div STYLE="float:left">

      <a href="#" oncontextmenu="LivePaper();return false" onclick="document.getElementById('Desktop1').style.display = 'none'; document.getElementById('Desktop2').style.display = 'block'";><table style="border-collapse: collapse;padding:0px;border:0px"><tr><td>&nbsp<img src="sky-admin/Icons/<?php echo $start ?>.png" height="24" width="24" BORDER="0"/></td><td><span id="start1" style="font-family: arial; font-weight: bold; font-size: 18pt; color:white">Start</td></tr></table/></a>
  
    </div><div id="TaskIcons" STYLE="float: right;">

      <center><a href="javascript:popupwindow('sky-admin/Web-App/Core3.php?Mode=0&Entry=<?php echo $_SERVER['SERVER_NAME'] ?>')" title="Network Connection"><img src="sky-admin/Icons/21.png" height="24" width="24" BORDER="0"/></a>&nbsp;&nbsp;<a href="javascript:popupwindow('sky-admin/jsCalendar/2.html')"><SCRIPT>document.write('<input type=\"text\" title=\"'+Today+ ', ' +month+ '/' +day+ '/' +year+'\" style=\"cursor: pointer;background-color: transparent; color: white; BORDER: transparent;\" name=\"RTime\" id=\"RTime\" value=\""+ hours + ":" + minutes + " " + suffix +"\" readonly=\"readonly\" size=\"7\" width=\"100%\" oncontextmenu=\"screenlock();return false\"></a>');</script></center>

    </div>

</td>
</tr>
</table>
</div>


<!-- Webtop 2 -->
<div id="Desktop2" style="width: 100%;height: 100%;display:none">

<table cellpadding="3" CELLSPACING="0" style="border-collapse: collapse;width: 100%;height: 100%;">

<!-- Row 1 -->
<tr>
<td>
<div id="drag1">
<?php
if (strlen($title1) > 1){
echo '<center><a href="'.$url1.'" target="blank"><img src="sky-admin/Icons/'.$icon1.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title1.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag2">
<?php
if (strlen($title2) > 1){
echo '<center><a href="'.$url2.'" target="blank"><img src="sky-admin/Icons/'.$icon2.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title2.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag3">
<?php
if (strlen($title3) > 1){
echo '<center><a href="'.$url3.'" target="blank"><img src="sky-admin/Icons/'.$icon3.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title3.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag4">
<?php
if (strlen($title4) > 1){
echo '<center><a href="'.$url4.'" target="blank"><img src="sky-admin/Icons/'.$icon4.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title4.'</a></myicons></center>';
}
?>
</div>
</td>
</tr>

<!-- Row 2 -->

<tr>
<td>
<div id="drag5">
<?php
if (strlen($title5) > 1){
echo '<center><a href="'.$url5.'" target="blank"><img src="sky-admin/Icons/'.$icon5.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title5.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag6">
<?php
if (strlen($title6) > 1){
echo '<center><a href="'.$url6.'" target="blank"><img src="sky-admin/Icons/'.$icon6.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title6.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag7">
<?php
if (strlen($title7) > 1){
echo '<center><a href="'.$url7.'" target="blank"><img src="sky-admin/Icons/'.$icon7.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title7.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag8">
<?php
if (strlen($title8) > 1){
echo '<center><a href="'.$url8.'" target="blank"><img src="sky-admin/Icons/'.$icon8.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title8.'</a></myicons></center>';
}
?>
</div>
</td>
</tr>

<!-- Row 3 -->

<tr>
<td>
<div id="drag9">
<?php
if (strlen($title9) > 1){
echo '<center><a href="'.$url9.'" target="blank"><img src="sky-admin/Icons/'.$icon9.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title9.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag10">
<?php
if (strlen($title10) > 1){
echo '<center><a href="'.$url10.'" target="blank"><img src="sky-admin/Icons/'.$icon10.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title10.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag11">
<?php
if (strlen($title11) > 1){
echo '<center><a href="'.$url11.'" target="blank"><img src="sky-admin/Icons/'.$icon11.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title11.'</a></myicons></center>';
}
?>
</div>
</td>

<td>
<div id="drag12">
<?php
if (strlen($title12) > 1){
echo '<center><a href="'.$url12.'" target="blank"><img src="sky-admin/Icons/'.$icon12.'.png" BORDER=0/></center>';
echo '<center><myicons>'.$title12.'</a></myicons></center>';
}
?>
</div>
</td>
</tr>

<!-- TASKBAR -->

<tr class="container2" id="container2" bgcolor="black" style="border:2px solid white;">
<td colspan="4" id="TaskBar2" bgcolor="black">

    <div id="BarLeft" STYLE="float:left">

      <a href="#" oncontextmenu="LivePaper();return false" onclick="document.getElementById('Desktop2').style.display = 'none'; document.getElementById('Desktop1').style.display = 'block'";><table style="border-collapse: collapse;padding:0px;border:0px"><tr><td>&nbsp<img src="sky-admin/Icons/<?php echo $start ?>.png" height="24" width="24" BORDER="0"/></td><td><span id="start2" style="font-family: arial; font-weight: bold; font-size: 18pt; color:white">Start</td></tr></table/></a>
  
    </div><div id="TaskIcons" STYLE="float: right;">

      <center><a href="javascript:popupwindow('sky-admin/Web-App/Core3.php?Mode=0&Entry=http://www.supremesearch.net/')" title="Network Connection"><img src="sky-admin/Icons/21.png" height="24" width="24" BORDER="0"/></a>&nbsp;&nbsp;<a href="javascript:popupwindow('sky-admin/jsCalendar/2.html')"><SCRIPT>document.write('<input type=\"text\" title=\"<?php echo $uname." v:".$edition ?>\" style=\"cursor: pointer;background-color: transparent; color: white; BORDER: transparent;\" name=\"RTime2\" id=\"RTime2\" value=\"'+ uname +'\" readonly=\"readonly\" size=\"7\" width=\"100%\" oncontextmenu=\"screenlock();return false\"></a>');</script></center>

    </div>

</td>
</tr>

</table>
</div>


<!-- Webtop 3 -->
<div id="Desktop3" style="width: 100%;height: 100%;display:none">

<table cellpadding="3" CELLSPACING="0" style="border-collapse: collapse;width: 100%;height: 100%;">

<!-- Row 1 -->
<tr>
<td>
<center><a href="#" onclick="document.getElementById('DeskColor').style.display = 'block';"><img src="sky-admin/Icons/1.png" BORDER=0/></center>
<center><myicons>Appearance</a></myicons></center>
</td>

<td>
<center><a href="#" onclick="javascript:loadwindow('sky-admin/Web-App/Scientific Calculator2.html')"><img src="sky-admin/Icons/2.png" BORDER=0/></center>
<center><myicons>Calculator</a></myicons></center>
</td>

<td>
<center><a href="#" onclick="document.getElementById('Background_Paper').style.display = 'block'"><img src="sky-admin/Icons/3.png" BORDER=0/></center>
<center><myicons>Screen</a></myicons></center>
</td>

<td>
<center><a href="sky-admin/Screen_Saver/index.html"><img src="sky-admin/Icons/4.png" BORDER=0/></center>
<center><myicons>S-Saver</a></myicons></center>
</td>
</tr>

<!-- Row 2 -->

<tr>
<td>
<center><a href="#" onClick="document.getElementById('Save').style.display = 'block'"><img src="sky-admin/Icons/5.png" BORDER=0/></center>
<center><myicons>Settings</a></myicons></center>
</td>

<td>
<center><a href="#" onclick="document.getElementById('Advanced1').style.display = 'block'"><img src="sky-admin/Icons/6.png" BORDER=0/></center>
<center><myicons>Manager</a></myicons></center>
</td>

<td>
<center><a href="#" onclick="document.getElementById('Desktop1').style.display = 'block'; document.getElementById('System').style.display = 'block'"><img src="sky-admin/Icons/7.png" BORDER=0/></center>
<center><myicons>System</a></myicons></center>
</td>

<td>
<center><a href="sky-admin/Editions/index.php"><img src="sky-admin/Icons/8.png" BORDER=0/></center>
<center><myicons>Editions</a></myicons></center>
</td>
</tr>

<!-- Row 3 -->
<tr>
<td>
<center><a href="#" title="Use notepad to add documents." onclick="Filesystem('docs')"><img src="sky-admin/Icons/10.png" width="48" height="48" BORDER="0"></center>
<center><myicons>Documents</a></myicons></center>
</td>

<td>
<center><a href="#" title="Double Click, swap left or use Apps Menu to add bookmarks." onclick="Filesystem('bookmarks')"><img src="sky-admin/Icons/11.png" width="48" height="48" BORDER="0"></center>
<center><myicons>Bookmarks</a></myicons></center>
</td>

<td>
<center><a href="#" onclick="javascript:loadwindow('sky-admin/Web-App/NotePad2.html')"><img src="sky-admin/Icons/12.png" width="48" height="48" BORDER="0"></center>
<center><myicons>Notepad</a></myicons></center>
</td>

<td>
<center><a href="#" onClick="Backup()"><img src="sky-admin/Icons/13.png" BORDER=0/></center>
<center><myicons>Backup</a></myicons></center>
</td>
</tr>

<!-- TASKBAR -->

<tr class="container3" id="container3" bgcolor="black" style="border:2px solid white;">
<td colspan="4" id="TaskBar3" bgcolor="black">

    <div id="BarLeft" STYLE="float:left">

      <a href="#" oncontextmenu="LivePaper();return false" onclick="document.getElementById('Desktop3').style.display = 'none'; document.getElementById('Desktop1').style.display = 'block'";><table style="border-collapse: collapse;padding:0px;border:0px"><tr><td>&nbsp<img src="sky-admin/Icons/<?php echo $start ?>.png" height="24" width="24" BORDER="0"/></td><td><span id="start3" style="font-family: arial; font-weight: bold; font-size: 18pt; color:white">Start</td></tr></table/></a>

    </div><div id="TaskIcons" STYLE="float: right;">

      <center><a href="javascript:popupwindow('sky-admin/Web-App/Core3.php?Mode=0&Entry=http://www.supremesearch.net/')" title="Network Connection"><img src="sky-admin/Icons/21.png" height="24" width="24" BORDER="0"/></a>&nbsp;<form name="CPU" style="display: inline-block;"><input type="text" style="cursor: context-menu;background-color: transparent; color: white; BORDER: transparent;" size="7" width="100%" ID="Usage" readonly="readonly"><input type="text" size="1" ID="Usage1" readonly="readonly"><input type="text" size="1" ID="Usage2" readonly="readonly"><input type="text" size="1" ID="Usage3" readonly="readonly"><input type="text" size="1" ID="Usage4" readonly="readonly"></form></center>

    </div>
</td>
</tr>

</table>
</div>


<!-- Installer -->
<div id='Installer' style="display: none; position: absolute; left: 0px; top: 0px; padding: 10px; background-color: white; color:black; width: 300px;">
<center>
<big><big>Add Bookmarks</big></big><br><br>
<textarea id="NewFolder_Textarea" placeholder="Add 1 link per-line, starting with http://" rows="9" cols="30">
</textarea><br><br>
<input type="button" name="Submit" value="Save" onClick="save_bookmarks()">
<input type="Reset" onclick="clearInstaller();">
<INPUT type=button value="Close" onClick="document.getElementById('Installer').style.display = 'none' " >
<center></div>


<!-- Background -->
<div id="Background_Paper" style="display: none; position: absolute; left: 0px; top: 0px; padding: 10px; background-color: white; color: black; width: 300px;">
<center>
<form name="WallPaper" onSubmit="return New_WallPaper()">
<big><big>Background</big></big><br><br>
<input type="text" name="URL" value="http://"><input type="button" name="Submit" value="Apply" onClick="New_WallPaper()"><br><br>
<input type="Reset" value="Clear">
<input type="button" onclick="No_Background();" value="None">
<input type="button" title="Wallpaper Credits" onclick="Credits()" value="Credits">
<span style="position: absolute;top:0;left:0"><img src="sky-admin/images/close.gif" title="Close Menu" onClick="document.getElementById('Background_Paper').style.display = 'none' " ></span>
</form></center></div>


<!-- Settings -->
<div id="Save" style="display: none; position: absolute; left: 0px; top: 0px; padding: 10px; background-color: white; color:black; width: 300px;"><center>
<big><big>Settings</big></big><br><br>

<select title="Timer In Sec" class="w3-select w3-light-grey" onchange="SS_Timer(this)" size="1">
  <option selected="selected">Screen Saver Timer
  <option>60
  <option>120
  <option>180
</select><br><br>

<input type="button" onclick="Save()" value="Save">
<input type="button" onclick="Default_Theme()" value="Default Theme">
<input type="button" onclick="Hard_Reset()" value="Hard Reset">
<span style="position: absolute;top:0;left:0"><img src="sky-admin/images/close.gif" title="Close Menu" onClick="document.getElementById('Save').style.display = 'none' " ></span>
</center></div>


<!-- Color -->
<div id='DeskColor' class="DeskColor" style='display: none; position: absolute; left: 0px; top: 0px; padding: 10px; background-color: white; color:black; width: 300px;'>
<center><big><big><font color="darkblue">Color</font></big></big>

<form name="DeskColor">
<select class="w3-select w3-light-grey" name="pco" id="pco" onChange="Taskbar_Change(this.form.pco.value)">
<option value=black>black</option>
<option value=aliceblue>aliceblue</option>
<option value=antiquewhite>antiquewhite</option>
<option value=aqua>aqua</option>
<option value=aquamarine>aquamarine</option>
<option value=azure>azure</option>
<option value=beige>beige</option>
<option value=bisque>bisque</option>
<option value=blanchedalmond>blanchedalmond</option>
<option value=blue>blue</option>
<option value=blueviolet>blueviolet</option>
<option value=brown>brown</option>
<option value=burlywood>burlywood</option>
<option value=cadetblue>cadetblue</option>
<option value=chartreuse>chartreuse</option>
<option value=chocolate>chocolate</option>
<option value=coral>coral</option>
<option value=cornflowerblue>cornflowerblue</option>
<option value=cornsilk>cornsilk</option>
<option value=crimson>crimson</option>
<option value=cyan>cyan</option>
<option value=darkblue>darkblue</option>
<option value=darkcyan>darkcyan</option>
<option value=darkgoldenrod>darkgoldenrod</option>
<option value=darkgray>darkgray</option>
<option value=darkgreen>darkgreen</option>
<option value=darkkhaki>darkkhaki</option>
<option value=darkmagenta>darkmagenta</option>
<option value=darkolivegreen>darkolivegreen</option>
<option value=darkorange>darkorange</option>
<option value=darkorchid>darkorchid</option>
<option value=darkred>darkred</option>
<option value=darksalmon>darksalmon</option>
<option value=darkseagreen>darkseagreen</option>
<option value=darkslateblue>darkslateblue</option>
<option value=darkslategray>darkslategray</option>
<option value=darkturquoise>darkturquoise</option>
<option value=darkviolet>darkviolet</option>
<option value=deeppink>deeppink</option>
<option value=deepskyblue>deepskyblue</option>
<option value=dimgray>dimgray</option>
<option value=dodgerblue>dodgerblue</option>
<option value=firebrick>firebrick</option>
<option value=floralwhite>floralwhite</option>
<option value=forestgreen>forestgreen</option>
<option value=fuchsia>fuchsia</option>
<option value=gainsboro>gainsboro</option>
<option value=ghostwhite>ghostwhite</option>
<option value=gold>gold</option>
<option value=goldenrod>goldenrod</option>
<option value=gray>gray</option>
<option value=green>green</option>
<option value=greenyellow>greenyellow</option>
<option value=honeydew>honeydew</option>
<option value=hotpink>hotpink</option>
<option value=indianred>indianred</option>
<option value=indigo>indigo</option>
<option value=ivory>ivory</option>
<option value=khaki>khaki</option>
<option value=lavender>lavender</option>
<option value=lavenderblush>lavenderblush</option>
<option value=lawngreen>lawngreen</option>
<option value=lemonchiffon>lemonchiffon</option>
<option value=lightblue>lightblue</option>
<option value=lightcoral>lightcoral</option>
<option value=lightcyan>lightcyan</option>
<option value=lightgoldenrodyellow>lightgoldenrodyellow</option>
<option value=lightgreen>lightgreen</option>
<option value=lightgrey>lightgrey</option>
<option value=lightpink>lightpink</option>
<option value=lightsalmon>lightsalmon</option>
<option value=lightseagreen>lightseagreen</option>
<option value=lightskyblue>lightskyblue</option>
<option value=lightslategray>lightslategray</option>
<option value=lightsteelblue>lightsteelblue</option>
<option value=lightyellow>lightyellow</option>
<option value=lime>lime</option>
<option value=limegreen>limegreen</option>
<option value=linen>linen</option>
<option value=magenta>magenta</option>
<option value=maroon>maroon</option>
<option value=mediumaquamarine>mediumaquamarine</option>
<option value=mediumblue>mediumblue</option>
<option value=mediumorchid>mediumorchid</option>
<option value=mediumpurple>mediumpurple</option>
<option value=mediumseagreen>mediumseagreen</option>
<option value=mediumslateblue>mediumslateblue</option>
<option value=mediumspringgreen>mediumspringgreen</option>
<option value=mediumturquoise>mediumturquoise</option>
<option value=mediumvioletred>mediumvioletred</option>
<option value=midnightblue>midnightblue</option>
<option value=mintcream>mintcream</option>
<option value=mistyrose>mistyrose</option>
<option value=moccasin>moccasin</option>
<option value=navajowhite>navajowhite</option>
<option value=navy>navy</option>
<option value=oldlace>oldlace</option>
<option value=olive>olive</option>
<option value=olivedrab>olivedrab</option>
<option value=orange>orange</option>
<option value=orangered>orangered</option>
<option value=orchid>orchid</option>
<option value=palegoldenrod>palegoldenrod</option>
<option value=palegreen>palegreen</option>
<option value=paleturquoise>paleturquoise</option>
<option value=palevioletred>palevioletred</option>
<option value=papayawhip>papayawhip</option>
<option value=peachpuff>peachpuff</option>
<option value=peru>peru</option>
<option value=pink>pink</option>
<option value=plum>plum</option>
<option value=powderblue>powderblue</option>
<option value=purple>purple</option>
<option value=red>red</option>
<option value=rosybrown>rosybrown</option>
<option value=royalblue>royalblue</option>
<option value=saddlebrown>saddlebrown</option>
<option value=salmon>salmon</option>
<option value=sandybrown>sandybrown</option>
<option value=seagreen>seagreen</option>
<option value=seashell>seashell</option>
<option value=sienna>sienna</option>
<option value=silver>silver</option>
<option value=skyblue>skyblue</option>
<option value=slateblue>slateblue</option>
<option value=slategray>slategray</option>
<option value=snow>snow</option>
<option value=springgreen>springgreen</option>
<option value=steelblue>steelblue</option>
<option value=tan>tan</option>
<option value=teal>teal</option>
<option value=thistle>thistle</option>
<option value=tomato>tomato</option>
<option value=turquoise>turquoise</option>
<option value=violet>violet</option>
<option value=wheat>wheat</option>
<option value=white>white</option>
<option value=whitesmoke>whitesmoke</option>
<option value=yellow>yellow</option>
<option value=yellowgreen>yellowgreen</option>
</select><br><br>
<select class="w3-select w3-light-grey" onchange="myFunction(this);" size="1">
  <option selected="selected">Opacity
  <option>0
  <option>0.2
  <option>0.5
  <option>0.75
  <option>0.8
  <option>1
</select><br><br><big>
<input type="radio" name="R1" onclick="D_Color()" checked/>Desktop &nbsp;
<input type="radio" name="R1" onclick="T_Color()"/>Text &nbsp;<br><br>
<input type="radio" name="R1" onclick="W_Color()"/>Taskbar<br><br>
</big></form>
<INPUT type=button value="Close" onClick="document.getElementById('DeskColor').style.display = 'none' " >
</center></div>


<!-- System -->
<div id='System' style='display: none; position: absolute; left: 50%; top: 50%; margin-right: -50%; transform: translate(-50%, -50%); padding: 10px; background-color: white; color:black; width: 75%;'>

<center>
<font color="black"><big><big>System</big></big></font><br><br>

<table cellpadding="3" CELLSPACING="0" width="100%">

<td>
<div>
<center><a href="sky-menu2.php"><img src="sky-admin/Icons/7.png" width="48" height="48" BORDER="0"></center>
<center><font color="black">Navigation</font></center></a>
</div>
</td>

<td>
<div>
<center><a href="#" onclick="Refresh()" onmouseover="Refresh_Talkback()"><img src="sky-admin/Icons/5.png" width="48" height="48" BORDER="0"></center>
<center><font color="black">Refresh</font></center></a>
</div>
</td>

<td>
<div>
<center><a href="javascript: location.href = Domain;" onmouseover="Shutdown_Talkback()"><img src="sky-admin/Icons/9.png" width="48" height="48" BORDER="0"></center>
<center><font color="black">Shutdown</font></center></a>
</div>
</td>

</table>
</center>

<span style="position: absolute;top:0;left:0"><img src="sky-admin/images/close.gif" title="Close Menu" onClick="document.getElementById('System').style.display = 'none' " ></span>
</div>


<!-- Windows -->
<div id="Window1" onmouseup="Effects_ON('Window1')" onmousedown="Effects_OFF('Window1')" style="position:absolute;background-color:transparent;display:none">
<div id="Label1" align="right" style="background-color:black;color:white"><big>Window 1</big>
<img src="sky-admin/images/max.gif" id="maxname1" onClick="maximize1()"><img src="sky-admin/images/close.gif" onClick="Close_Window1()">
<div id="Content1"><iframe id="Main_Frame1" src="" width="95%" height="95%" style="background-color:white;border-width:5px; border-style:solid; border-color:black;"></iframe>
</div></div></div>

<div id="Window2" onmouseup="Effects_ON('Window2')" onmousedown="Effects_OFF('Window2')" style="position:absolute;background-color:transparent;display:none">
<div id="Label2" align="right" style="background-color:black;color:white"><big>Window 2</big>
<img src="sky-admin/images/max.gif" id="maxname2" onClick="maximize2()"><img src="sky-admin/images/close.gif" onClick="Close_Window2()">
<div id="Content2"><iframe id="Main_Frame2" src="" width="95%" height="95%" style="background-color:white;border-width:5px; border-style:solid; border-color:black;"></iframe>
</div></div></div>

<div id="Window3" onmouseup="Effects_ON('Window3')" onmousedown="Effects_OFF('Window3')" style="position:absolute;background-color:transparent;display:none">
<div id="Label3" align="right" style="background-color:black;color:white"><big>Window 3</big>
<img src="sky-admin/images/max.gif" id="maxname3" onClick="maximize3()"><img src="sky-admin/images/close.gif" onClick="Close_Window3()">
<div id="Content3"><iframe id="Main_Frame3" src="" width="95%" height="95%" style="background-color:white;border-width:5px; border-style:solid; border-color:black;"></iframe>
</div></div></div>


<!-- Advanced System Info -->
<script>if(!mobile){var process = "Window";}else{var process = "Win"}</script>
<div id="Advanced1"  onmouseup="Effects_ON('Advanced1')" onmousedown="Effects_OFF('Advanced1')" class="txtinput" style="display:none;position: absolute; left: 0px; top: 0px; background-color:transparent;">
<div id="Advanced2" class="txtinput" align="right" style="background-color:black;"><font color="white"><big><span id="Advanced2label">Task Manager&nbsp;</span></big></font></a>
<a onclick="document.getElementById('Advanced1').style.display = 'none' " ><img src="sky-admin/images/close.gif" title="Close"></a><center>

<div id="Advanced3"  class="txtinput2" align="left" style='display: block; border: solid black 5px; padding: 10px; background-color: white; color:black'>
<big><fieldset><legend>Processes</legend>
<center><table border="0" cellpadding="8">
<tr bgcolor="#dddddd">
<td>Image Name</td>
<td>Action</td>
</tr>
<tr>
<td><script>document.write(process)</script> 1</td>
<td><a href="#" onclick="Close_Window1()"><font color="blue">End</font></a></td>
</tr>
<tr bgcolor="aliceblue">
<td><script>document.write(process)</script> 2</td>
<td><a href="#" onclick="Close_Window2()"><font color="blue">End</font></a></td>
</tr>
<tr>
<td><script>document.write(process)</script> 3</td>
<td><a href="#" onclick="Close_Window3()"><font color="blue">End</font></a></td>
</tr>
</table></center>
</fieldset></big>

</div></div></div>

<!-- Backup -->
<div id='Backup' style='display: none; position: absolute; left: 0px; top: 0px; padding: 10px; background-color: white; width: 300px;'>
<center>
<font color="darkblue"><big>Backup & Restore</big></font><br><br>
<font color="black">
Backup Data<br>
<i>Copy or Click Export</i>
<textarea id="mybackup" rows="4" style="width:100%;" readonly></textarea> 
<br>Restore Data<br>
<i>Paste Then Click Import</i>
<textarea id="myimport" rows="4" style="width:100%;"></textarea> 

<INPUT type=button value="Export txt" onClick="download()" >
<INPUT type=button value="Import" onClick="upload()" >
<INPUT type=button value="Close" onClick="document.getElementById('Backup').style.display = 'none' " >

</font></center></div>

<script language="JavaScript">
if (!mobile && !window.screenTop && !window.screenY){var fullmenu = "ON"}else{var fullmenu = "OFF";}if (legacy == "on"){var fullmenu = "OFF";}
</script>

</div>

<!-- Bottom Right Menu -->
<div id="Bottom_Right" style="display:none;position:absolute;right:-25px;bottom:40px;height:345px;width: 350px;"> 
<iframe id="Bottom_Right_Frame" src="sky-admin/Web-App/Loading.html" width="95%" height="100%" style="background-color:white;border:0px"></iframe>
</div>

</body></html>


<script language="JavaScript">

document.writeln("<!-- Start Menu -->"); 
if (navigator.appVersion.indexOf("Win") != -1){var sheight = (screen.availHeight - 45); sheight += "px";}else{var sheight = "90%";}
document.writeln("<div id=\"Start\" onmouseover=\"startmenupop()\" onmouseout=\"startmenuend()\" style=\"display:none;position:absolute;left:0px;bottom:40px;height:"+sheight+";width: 200px;padding: 20px;border-radius: 25px;background: black;\">"); 
if (fullmenu === "ON"){document.writeln("<iframe id=\"Start_Frame\" src=\"menu.php?Remaster="+Random+"@"+DesktopColor+"@"+WindowColor+"@"+Color_Mode+"@"+TextColor+"&Mode=1\" width=\"95%\" height=\"100%\" style=\"background-color:white;border:0px\"></iframe>");}
document.writeln("</div>");
function startmenupop(){if (fullmenu == "ON"){document.getElementById("Start").style.display = "block";}}
function startmenuend(){if (fullmenu == "ON"){document.getElementById("Start").style.display = "none";}}

  //jquery drag
  $(function() {

   if (mobile == false){
    $( "#Icon1" ).draggable();
    $( "#Icon2" ).draggable();
    $( "#Icon3" ).draggable();
    $( "#Icon4" ).draggable();
    $( "#Icon5" ).draggable();
    $( "#Icon6" ).draggable();
    $( "#Icon7" ).draggable();
    $( "#Icon8" ).draggable();
    $( "#Icon9" ).draggable();
   }
    $( "#drag1" ).draggable();
    $( "#drag2" ).draggable();
    $( "#drag3" ).draggable();
    $( "#drag4" ).draggable();
    $( "#drag5" ).draggable();
    $( "#drag6" ).draggable();
    $( "#drag7" ).draggable();
    $( "#drag8" ).draggable();
    $( "#drag9" ).draggable();
    $( "#drag10" ).draggable();
    $( "#drag11" ).draggable();
    $( "#drag12" ).draggable();
  });

  if (mobile == false){
    $( "#Window1" ).draggable();
    $( "#Window2" ).draggable();
    $( "#Window3" ).draggable();
    $( "#Advanced1" ).draggable();
  }

  //Mobile Plugin
  if (mobile){
    document.getElementById('start1').style.fontSize = "22pt";
    document.getElementById('start2').style.fontSize = "22pt";
    document.getElementById('start3').style.fontSize = "22pt";
    document.getElementById('RTime').style.fontSize = "20pt";
    document.getElementById('RTime2').style.fontSize = "20pt";
    document.getElementById('Usage').style.fontSize = "20pt";
    document.getElementById('RTime').style.width = "125px";
    document.getElementById('RTime2').style.width = "125px";
    document.getElementById('Usage').style.width = "125px";
  }

//Default & IP
function Effects_ON(System1){if(!mobile){document.getElementById(System1).style.opacity = 1;}}
function Effects_OFF(System1){if(!mobile){document.getElementById(System1).style.opacity = .75;}}
function Transparency(Clear){

  //Windows
  document.getElementById("Start").style.opacity = Clear/100;
  document.getElementById("Bottom_Right").style.opacity = 95/100;
  TaskBar1.style.opacity = Clear/10; TaskBar1.style.filter  = "alpha(opacity=" + Clear + ")";
  TaskBar2.style.opacity = Clear/10; TaskBar2.style.filter  = "alpha(opacity=" + Clear + ")";
  TaskBar3.style.opacity = Clear/10; TaskBar3.style.filter  = "alpha(opacity=" + Clear + ")";

  //Netscape
  el.style.opacity = Clear/100;
  el2.style.opacity =  Clear/100;
  el3.style.opacity =  Clear/100;

}

//Talk Back
function Refresh_Talkback(){if (legacy != "on"){var audio0 = new Audio('sky-admin/Web-App/Refresh.mp3');audio0.play();}}
function Shutdown_Talkback(){if (legacy != "on"){var audio1 = new Audio('sky-admin/Web-App/Shutdown.mp3');audio1.play();}}

//Refresh
function Refresh(){window.location.reload( true );}

//Background
function New_WallPaper(){
  var BG = document.WallPaper.URL.value
  document.body.style.backgroundImage = 'url('+BG+')';
  Random = document.WallPaper.URL.value;
}
//Dragdropper File Reader
function readURL(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var fileType = input.files[0].type; 

      reader.onload = function (e) {

        if (fileType.indexOf('image') != -1){   
          document.body.style.backgroundImage = 'url(' + e.target.result + ')';

        }else{loadwindow(e.target.result);}

      };

     reader.readAsDataURL(input.files[0]);
  }
}

//Turn Off Wallpaper
function No_Background(){
  document.body.style.backgroundImage = 'url(none)';
  Random = 'none'; 
}

//Scroll Background
var tim; var moving=1;
var bgOb=eval('document.body');

function scrollRight(obj){ moving++;
  if (screen.width > 800){obj.style.left=moving;}
  else{bgOb.style.backgroundPositionX=moving+"px";}
}
function scrollLeft(obj){ moving=moving-1;
  if (screen.width > 800){obj.style.left=moving;}
    else{bgOb.style.backgroundPositionX=moving+"px";}
}
function scrollDown(obj){ moving++;
  if (screen.width > 800){obj.style.top=moving;}
  else{bgOb.style.backgroundPositionY=moving+"px";}
}
function scrollUp(obj){ moving=moving-1;
  if (screen.width > 800){obj.style.top=moving;}
  else{bgOb.style.backgroundPositionY=moving+"px";}
}


//Change Color
function D_Color(){My_Color = 1;}
function W_Color(){My_Color = 2;}
function T_Color(){My_Color = 3;}
function Taskbar_Change(color){
 if (My_Color == 1){document.bgColor= color; DesktopColor = color;}
 if (My_Color == 2){WindowColor = color; 
    document.getElementById('Start').style.backgroundColor=color;
    document.getElementById('TaskBar1').style.backgroundColor=color;
    document.getElementById('TaskBar2').style.backgroundColor=color;
    document.getElementById('TaskBar3').style.backgroundColor=color;
    document.getElementById("Label1").style.backgroundColor = color;
    document.getElementById("Label2").style.backgroundColor = color;
    document.getElementById("Label3").style.backgroundColor = color;
    document.getElementById('Advanced2').style.backgroundColor = color;
    document.getElementById("Main_Frame1").style.borderColor = color;
    document.getElementById("Main_Frame2").style.borderColor = color;
    document.getElementById("Main_Frame3").style.borderColor = color;
    document.getElementById('Advanced3').style.borderColor = color;
 }
 if (My_Color == 3){TextColor = color;
    document.getElementById('start1').style.color=color;
    document.getElementById('start2').style.color=color;
    document.getElementById('start3').style.color=color;
    document.getElementById('RTime').style.color=color;
    document.getElementById('RTime2').style.color=color;
    document.getElementById('Usage').style.color=color;
    document.getElementById('container2').style.color=color;
    document.getElementById('container3').style.color=color;
    document.getElementById('Label1').style.color= color;
    document.getElementById('Label2').style.color= color;
    document.getElementById('Label3').style.color= color;
    document.getElementById('Advanced2label').style.color=color;
 }
}

//API 
if (API == "ON"){My_Color = 1;Taskbar_Change(DesktopColor); My_Color = 2;Taskbar_Change(WindowColor); My_Color = 3;Taskbar_Change(TextColor);}

//Transparent
var el = document.getElementById("container1");
var el2 = document.getElementById("container2");
var el3 = document.getElementById("container3");
function myFunction(x){
  var opacity = x.options[x.selectedIndex].text;

    //Netscape
    el.style.opacity = opacity;
    el2.style.opacity = opacity;
    el3.style.opacity = opacity;
        
    //Windows
    Color_Mode = opacity*100; 
    document.getElementById("Start").style.opacity = Color_Mode/100;
    document.getElementById("Bottom_Right").style.opacity = 95/100;
    TaskBar1.style.opacity = Color_Mode/10; TaskBar1.style.filter  = "alpha(opacity=" + Color_Mode + ")";
    TaskBar2.style.opacity = Color_Mode/10; TaskBar2.style.filter  = "alpha(opacity=" + Color_Mode + ")";
    TaskBar3.style.opacity = Color_Mode/10; TaskBar3.style.filter  = "alpha(opacity=" + Color_Mode + ")";

}

//Reset Functions
function Save(){localStorage.Save = Random+"@"+DesktopColor+"@"+WindowColor+"@"+Color_Mode+"@"+TextColor; alert('Settings Saved');}
function Home(){top.location.href = "Desktop Search Engine.html";}
function Default_Theme(){localStorage.removeItem('Save'); Home();}
function Hard_Reset(){
  if (confirm("Erase all files and settings?")) {
    clearInstaller(); localStorage.clear(); Home();
  }
}


//Filesystem
function Filesystem(folder){Itimer = 0;
  document.getElementById('Desktop1').style.display = 'block';

  if (folder == "bookmarks"){file_ct = 0;
    var textArea = document.getElementById("NewFolder_Textarea");
    var arrayOfLines = textArea.value.split("\n");
    for (var j = 0; j < files; j++) {
      if(arrayOfLines[j].length > 10){file_ct++;
        IconCount = "Icon"; IconCount+=j+1;
        LinkName = arrayOfLines[j].substr(11, 10);
        var filetype = arrayOfLines[j].substring(arrayOfLines[j].length-3);

        //Select Icon
        if ((filetype.toLowerCase().indexOf("mp3") != -1) || (filetype.toLowerCase().indexOf("wav") != -1)) {Icon = "sky-admin/Icons/14.png";}
        else if ((filetype.toLowerCase().indexOf("txt") != -1) || (filetype.toLowerCase().indexOf("rtf") != -1)) {Icon = "sky-admin/Icons/12.png";}
        else if ((filetype.toLowerCase().indexOf("jpg") != -1) || (filetype.toLowerCase().indexOf("png") != -1)) {Icon = "sky-admin/Icons/15.png";}
        else if ((filetype.toLowerCase().indexOf("avi") != -1) || (filetype.toLowerCase().indexOf("mp4") != -1)) {Icon = "sky-admin/Icons/16.png";}
        else if ((filetype.toLowerCase().indexOf("pdf") != -1) || (filetype.toLowerCase().indexOf("doc") != -1)) {Icon = "sky-admin/Icons/17.png";}
        else if (filetype.toLowerCase().indexOf("zip") != -1){Icon = "sky-admin/Icons/19";}
        else {Icon = "sky-admin/Icons/18.png";}

        //Save & Install
        if(j == 0){localStorage.IconClass = arrayOfLines[j] + "\r\n";}else{localStorage.IconClass += arrayOfLines[j] + "\r\n";} //Save
        document.getElementById(IconCount).style.display = 'block';

          if (arrayOfLines[j].indexOf("|") != -1){
            var custom_link = arrayOfLines[j].split("|");

            if (arrayOfLines[j].toLowerCase().indexOf(shorturl.toLowerCase()) != -1){
              document.getElementById(IconCount).innerHTML = "<center><a href=\"javascript:loadwindow('" + custom_link[0] + "')\" title=\"" + custom_link[0] + "\" oncontextmenu=\"delete_icon('"+arrayOfLines[j]+"')\"><img src=\"" + custom_link[1] + "\" width=\"48\" height=\"48\" BORDER=\"0\"></center><center><myicons>" + custom_link[2] + "</a></myicons></center>";    
            }else{
              document.getElementById(IconCount).innerHTML = "<center><a href=\"" + custom_link[0] + "\" title=\"" + custom_link[0] + "\" target=\"blank\" oncontextmenu=\"delete_icon('"+arrayOfLines[j]+"')\"><img src=\"" + custom_link[1] + "\" width=\"48\" height=\"48\" BORDER=\"0\"></center><center><myicons>" + custom_link[2] + "</a></myicons></center>";   
            }
 
         }else{
            document.getElementById(IconCount).innerHTML = "<center><a href=\"" + arrayOfLines[j] + "\" title=\"" + arrayOfLines[j] + "\" target=\"blank\" oncontextmenu=\"delete_icon('"+arrayOfLines[j]+"')\"><img src=\"" + Icon + "\" width=\"48\" height=\"48\" BORDER=\"0\"></center><center><myicons>" + LinkName + "</a></myicons></center>";      
         }

      }else{
        IconCount = "Icon"; IconCount+=j+1;

        document.getElementById(IconCount).style.display = 'block';
        document.getElementById(IconCount).innerHTML = "<img src=\"sky-admin/Icons/20.PNG\" width=\"48\" height=\"48\" BORDER=\"0\">";      
      }
    }if(file_ct == 0){alert('Empty Folder - double click or swipe left to add files.');}

  }

  if (folder == "docs"){
    var t = -1; var exe = 0; file_ct = 0;
    if((localStorage.Notepad_data != undefined) || (localStorage.Notepad_data != null)){
      var res = localStorage.Notepad_data.split("{fl}");
      for (var j = 0; j < res.length; j++) {t++; exe++;
        if(res[t].length > 3){file_ct++;
          IconCount = "Icon"; IconCount+=j+1;
          LinkName = res[t].substr(0, 10);
          Icon = "sky-admin/Icons/12.png";
          document.getElementById(IconCount).style.display = 'block';
          document.getElementById(IconCount).innerHTML = "<center><a href=\"sky-os.php/Web-App/NotePad2.html?edit=edit" + exe + "\" title=\"" + LinkName + "\"><img src=\"" + Icon + "\" width=\"48\" height=\"48\" BORDER=\"0\"></center><center><myicons>" + LinkName + "</a></myicons></center>";      
        }
      }
    }else{alert('Empty Folder - Use Notepad to add files.');}
  }

}


//Delete Icon
function delete_icon(icon_type){
  var icon_name = icon_type += "\n";
  var t = confirm("Delete " + icon_type);
  if (t == true){
    var textbackup=document.getElementById("NewFolder_Textarea").value; 
    var n=textbackup.replace(icon_name,"");
    var x=n.replace(icon_type,"");
    document.getElementById("NewFolder_Textarea").value=x;
    localStorage.IconClass=x; Hide_Icons();
  }
}

//Clear Bookmarks
function clearInstaller(){
  if (confirm("Delete Bookmarks - Are you sure?") == true) {
    document.getElementById("NewFolder_Textarea").value = "";
  }
}

//Load Bookmarks
function FileBoot(){if((localStorage.IconClass != undefined) || (localStorage.IconClass != null)){document.getElementById("NewFolder_Textarea").value = localStorage.IconClass;}}

//Save Bookmarks
function save_bookmarks(){localStorage.IconClass = document.getElementById("NewFolder_Textarea").value; document.getElementById('Installer').style.display = 'none';}

//Hide Icons
function Hide_Icons(){
  if((file_ct > 0) && (Itimer > 5)){
    for (var j = 0; j < files; j++){IconCount = "Icon"; IconCount+=j+1; document.getElementById(IconCount).style.display = 'none';}
  }

  //Popup Controller
  if (document.getElementById("Bottom_Right").style.display === "block"){
    document.getElementById("Bottom_Right").style.display= "none"; document.getElementById("Bottom_Right_Frame").src='sky-admin/Web-App/Loading.html';
  }else{ 
    document.getElementById("Bottom_Right").style.display = "none"; document.getElementById("Bottom_Right_Frame").src='sky-admin/Web-App/Loading.html';
  }

}


//Real Time
var Itimer = 0;
var currentsecond = 0;
var S_Saver_Timer = 0;
if((localStorage.Stimer != undefined) || (localStorage.Stimer != null)){var Stimer = localStorage.Stimer;}else{var Stimer = 60;}

function RealTime(){S_Saver_Timer++; Itimer++;
  var suffix="AM"; var today = new Date();
  var hours = today.getHours(); var minutes = today.getMinutes();
  if (hours > 11){suffix="PM";} CPU_UP(); 

  //Print Time  
  hours = hours % 12; if (hours == 0){hours = 12;}
  if (minutes < 10){minutes="0"+minutes;}
  RTime.value= hours + ":" + minutes + " " +suffix;

  //Screen Saver Timer
  if(S_Saver_Timer == Stimer){
     if((localStorage.ScreenSaver != undefined) || (localStorage.ScreenSaver != null)){
       if (localStorage.ScreenSaver === "none"){
         //Do Nothing
       }else{ 
         if (localStorage.ScreenSaver === "screenlock.php"){
           screenlock();
         }else{
           window.location=localStorage.ScreenSaver;
         }
       }  
     }
  }

  setTimeout("RealTime()",1000)

}

//Settings
function SS_Timer(x){localStorage.Stimer = x.options[x.selectedIndex].text; Refresh();}

//CPU Usage
currentsecond=document.CPU.Usage.value=2;
function CPU_UP(){if (currentsecond <= 10){currentsecond = currentsecond+2;}}
function CPU_DOWN(){
  if (currentsecond!=1){currentsecond-=1; if (currentsecond <= 8){document.CPU.Usage.value= "CPU " + currentsecond*10 + "%";}}
  setTimeout("CPU_DOWN()",50)
  if (currentsecond >= 8){document.all.CPU.Usage4.style.background='white';document.CPU.Usage.value = "CPU 75" + "%";}else{document.all.CPU.Usage4.style.background='transparent';}
  if (currentsecond >= 6){document.all.CPU.Usage3.style.background='white';}else{document.all.CPU.Usage3.style.background='transparent';}
  if (currentsecond >= 4){document.all.CPU.Usage2.style.background='white';S_Saver_Timer = 0;}else{document.all.CPU.Usage2.style.background='transparent';}
  if (currentsecond >= 2){document.all.CPU.Usage1.style.background='white';}else{document.all.CPU.Usage1.style.background='transparent';}
  if (currentsecond <= 1){document.CPU.Usage.value = "CPU 01" + "%";}
}

//Sounds
function playaudio2(){
  if(audio2_loop > 0){audio2_loop = audio2_loop - 1;
    audio2.play();
  }
}

//All Other Functions
function Credits(){alert('Photo by ' + credits);}
function screenlock(){location.href = "sky-admin/Screen_Saver/screenlock.php?Remaster="+Random+"@"+DesktopColor+"@"+WindowColor+"@"+Color_Mode+"@"+TextColor+"@"+uname+"&Mode=7";}

function Close_All(){
  document.getElementById('Desktop0').style.display = 'none';
  document.getElementById('Desktop1').style.display = 'none';
  document.getElementById('Desktop2').style.display = 'none';
  document.getElementById('Desktop3').style.display = 'none';
}CPU_DOWN(); RealTime(); Transparency(Color_Mode); FileBoot();

  //Live File
  function Live(){
    var backupdata = "<script type='text/javascript'>top.location.href = \""+Domain+"\grid.php?Uname="+uname+"&Remaster="+Random+"@"+DesktopColor+"@"+WindowColor+"@"+Color_Mode+"@"+TextColor+"@webos\";<\/script>";
    document.getElementById('mybackup').value = backupdata; //document.getElementById('Backup').style.display = 'block';
    var text = document.getElementById("mybackup").value;
    text = text.replace(/\n/g, "\r\n"); // To retain the Line breaks.
    var blob = new Blob([text], { type: "text/plain"});
    var anchor = document.createElement("a");
    anchor.download = "S3k_live.html";
    anchor.href = window.URL.createObjectURL(blob);
    anchor.target ="_blank";
    anchor.style.display = "none"; // just to be safe!
    document.body.appendChild(anchor);
    anchor.click();
    document.body.removeChild(anchor);
  }

  //Backup, Download & Upload
  function Backup(){
    var BR = "{BR}";
    var backupdata = localStorage.Save +BR+ localStorage.IconClass +BR+ localStorage.Stimer +BR+ localStorage.ScreenSaver +BR+ 
    localStorage.memo_data +BR+ localStorage.Notepad_data +BR+ localStorage.Spreadsheet_data +BR+ localStorage.sticky +BR+ localStorage.Wordpad_data +BR+ localStorage.Writer_data;
    document.getElementById('mybackup').value = backupdata; document.getElementById('Backup').style.display = 'block';
  }
  function download(){
    var text = document.getElementById("mybackup").value;
    text = text.replace(/\n/g, "\r\n"); // To retain the Line breaks.
    var blob = new Blob([text], { type: "text/plain"});
    var anchor = document.createElement("a");
    anchor.download = "S3k_backup.txt";
    anchor.href = window.URL.createObjectURL(blob);
    anchor.target ="_blank";
    anchor.style.display = "none"; // just to be safe!
    document.body.appendChild(anchor);
    anchor.click();
    document.body.removeChild(anchor);
  }
  function upload(){
    importdata = document.getElementById('myimport').value;
    if(document.getElementById("myimport").value != ''){
      var res = importdata.split("{BR}");  
      localStorage.Save = res[0];
      localStorage.IconClass = res[1]; 
      localStorage.Stimer = res[2];
      localStorage.ScreenSaver = res[3]; 
      localStorage.memo_data = res[4]; 
      localStorage.Notepad_data = res[5]; 
      localStorage.Spreadsheet_data = res[6]; 
      localStorage.sticky = res[7]; 
      localStorage.Wordpad_data = res[8]; 
      localStorage.Writer_data = res[9];
      alert('Backup Restored');
      location.href="?webos=webos";
    }else{alert('Import Error');}
  }


//Window Select
var Win_Select = 0;
function loadwindow(url){

  if (mobile){
  
    location.href = url;

  }else{

    Win_Select++;

    //Window Select
    if (Win_Select == 1){
    document.getElementById("Window1").style.display='';
    document.getElementById("Main_Frame1").src=url;
    maximize1();}

    else if (Win_Select == 2){
    document.getElementById("Window2").style.display='';
    document.getElementById("Main_Frame2").src=url;
    maximize2();}

    else if (Win_Select == 3){
    document.getElementById("Window3").style.display='';
    document.getElementById("Main_Frame3").src=url;
    maximize3(); Win_Select = 0;}

  }

}

//Windows Settings
var Restore1=0; var Restore2=0; var Restore3=0;
var width = 350; var height = 350; var left = 0; var right = 0; var taskbar_height = 65;
function Close_Window1(){document.getElementById('Window1').style.display = 'none';document.getElementById("Main_Frame1").src="sky-admin/Web-App/Loading.html";}
function Close_Window2(){document.getElementById('Window2').style.display = 'none';document.getElementById("Main_Frame2").src="sky-admin/Web-App/Loading.html";}
function Close_Window3(){document.getElementById('Window3').style.display = 'none';document.getElementById("Main_Frame3").src="sky-admin/Web-App/Loading.html";}

function maximize1(){
if (Restore1==0){
Restore1=1 //maximize window
document.getElementById("Window1").style.width=document.getElementById&&!document.all? window.innerWidth+"px" : document.body.clientWidth+"px"
document.getElementById("Window1").style.left=document.getElementById&&!document.all? window.pageXOffset+"px" : document.body.scrollLeft+"px"
document.getElementById("Window1").style.top=document.getElementById&&!document.all? window.pageYOffset+"px" : document.body.scrollTop+"px"
document.getElementById("maxname1").setAttribute("src","sky-admin/images/restore.gif");
document.getElementById("Content1").style.height=document.getElementById&&!document.all? window.innerHeight-taskbar_height+"px" : document.body.clientHeight-taskbar_height+"px"
}
else
{
Restore1=0 //restore window
document.getElementById("Window1").style.width=width+"px";
document.getElementById("Window1").style.left=document.getElementById&&!document.all? window.pageXOffset+left+"px" : document.body.scrollLeft+left+"px"
document.getElementById("Window1").style.top=document.getElementById&&!document.all? window.pageYOffset+right+"px" : document.body.scrollTop+right+"px"
document.getElementById("maxname1").setAttribute("src","sky-admin/images/max.gif");
document.getElementById("Content1").style.height=height+"px";
}
}

function maximize2(){
if (Restore2==0){
Restore2=1 //maximize window
document.getElementById("Window2").style.width=document.getElementById&&!document.all? window.innerWidth+"px" : document.body.clientWidth+"px"
document.getElementById("Window2").style.left=document.getElementById&&!document.all? window.pageXOffset+"px" : document.body.scrollLeft+"px"
document.getElementById("Window2").style.top=document.getElementById&&!document.all? window.pageYOffset+"px" : document.body.scrollTop+"px"
document.getElementById("maxname2").setAttribute("src","sky-admin/images/restore.gif");
document.getElementById("Content2").style.height=document.getElementById&&!document.all? window.innerHeight-taskbar_height+"px" : document.body.clientHeight-taskbar_height+"px"
}
else
{
Restore2=0 //restore window
document.getElementById("Window2").style.width=width+"px";
document.getElementById("Window2").style.left=document.getElementById&&!document.all? window.pageXOffset+left+"px" : document.body.scrollLeft+left+"px"
document.getElementById("Window2").style.top=document.getElementById&&!document.all? window.pageYOffset+right+"px" : document.body.scrollTop+right+"px"
document.getElementById("maxname2").setAttribute("src","sky-admin/images/max.gif");
document.getElementById("Content2").style.height=height+"px";
}
}

function maximize3(){
if (Restore3==0){
Restore3=1 //maximize window
document.getElementById("Window3").style.width=document.getElementById&&!document.all? window.innerWidth+"px" : document.body.clientWidth+"px"
document.getElementById("Window3").style.left=document.getElementById&&!document.all? window.pageXOffset+"px" : document.body.scrollLeft+"px"
document.getElementById("Window3").style.top=document.getElementById&&!document.all? window.pageYOffset+"px" : document.body.scrollTop+"px"
document.getElementById("maxname3").setAttribute("src","sky-admin/images/restore.gif");
document.getElementById("Content3").style.height=document.getElementById&&!document.all? window.innerHeight-taskbar_height+"px" : document.body.clientHeight-taskbar_height+"px"
}
else
{
Restore3=0 //restore window
document.getElementById("Window3").style.width=width+"px";
document.getElementById("Window3").style.left=document.getElementById&&!document.all? window.pageXOffset+left+"px" : document.body.scrollLeft+left+"px"
document.getElementById("Window3").style.top=document.getElementById&&!document.all? window.pageYOffset+right+"px" : document.body.scrollTop+right+"px"
document.getElementById("maxname3").setAttribute("src","sky-admin/images/max.gif");
document.getElementById("Content3").style.height=height+"px";
}
}

//Popup Menu
function popupwindow(url){document.getElementById('Bottom_Right').style.display = 'block';document.getElementById("Bottom_Right_Frame").src=url;}



//Set Focus
if (legacy == "on"){document.getElementById("System").style.left=0;document.getElementById("System").style.top=0;}

//Use OS
if (webos){document.getElementById('Desktop1').style.display = 'block';}else{document.getElementById('Desktop0').style.display = 'block';if(Random == "none"){document.bgColor = "#66CCFF"; DesktopColor = "66CCFF";}else{document.write("<style>.homebtn,.thin,.thick,.shadow {text-shadow:5px 5px 5px black;}</style>");}}

//LivePaper
if (liveos){
document.writeln("<style>");
document.writeln("html,body{");
document.writeln("animation: zoom 50s infinite;");
document.writeln("-webkit-animation: zoom 50s infinite;");
document.writeln("background-position: top;");
document.writeln("}");
document.writeln("@keyframes zoom{");
document.writeln("0% {background-size: 100%;}");
document.writeln("50% {background-size: 110%;}");
document.writeln("100% {background-size: 100%}");
document.writeln("}");
document.writeln("</style>");}
function LivePaper(){
  if (!mobile){
   mywindow = window.location.href; mywindow = mywindow.replace('#', ''); 
    if (mywindow.indexOf('?') > -1){
      location.href=mywindow+"&liveos=liveos";
    }else{
      location.href=mywindow+"?liveos=liveos";
    }
  }
}

</SCRIPT>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>