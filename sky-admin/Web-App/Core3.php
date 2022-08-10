<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" id="bp-doc">

<?php

$Mode = $_GET['Mode'];
$Entry = $_GET['Entry'];
$Local_URL = "http://".$_SERVER['HTTP_HOST'];


//Network Status
if($Mode == 0){ 

$Core3_Edition = $Entry."Web-App/Core3.php?Mode=4&Entry=$Entry";

echo "<style>\n"; 
echo "\n"; 
echo "INPUT, SELECT {\n"; 
echo "   color: black;\n"; 
echo "   font-family: arial, verdana, ms sans serif;\n"; 
echo "   font-weight: bold;\n"; 
echo "   font-size: 13pt;\n"; 
echo "}\n"; 

echo "body { \n"; 
echo "   overflow-x: hidden;\n"; 
echo "   overflow-y: hidden;\n"; 
echo "}\n"; 

echo "</style>\n"; 

echo "<div id='Network' style='display: block;\n"; 
echo "border: solid black 0px; padding: 10px; background-color: white;'\">\n"; 
echo "<FORM name=\"isp_speed\">\n"; 
echo "<b><font face='Arial' size='4' color='darkblue'>Network Connection Status</font></b><hr>\n";
echo "<INPUT type=\"text\" style=\"BORDER: white\" name=\"Replace\" size=\"40\" readonly=\"readonly\"><br>\n";  
echo "<INPUT type=\"text\" style=\"BORDER: white\" name=\"Signal\" size=\"40\" readonly=\"readonly\"><hr>\n";
echo "<INPUT type=button value=\"Check Speed Connection\" onClick=\"Check_Speed()\">\n"; 

echo "</FORM></div>\n"; 

echo "<SCRIPT LANGUAGE=\"JavaScript\">\n"; 

echo "//Network Status\n"; 
echo "var timer1=0; \n"; 
echo "var Network_Connection=100;\n"; 
echo "var Domain = \"$Entry\"\n";
echo "var Strength = \"N/A\"\n";
 
echo "//Network Status\n"; 
echo "function Check_Speed() {\n"; 
echo "  test_img=new Image();\n"; 
echo "  timer1=new Date();\n"; 
echo "  timer1=timer1.getTime();\n"; 
echo "  test_img.src=Domain+\"Web-App/Network Test.jpg?test=\"+timer1;\n"; 
echo "  document.isp_speed.Replace.value=\"Checking in progress\";\n"; 
echo "  setTimeout(\"Cal_Speed()\",Network_Connection);\n"; 
echo "}\n"; 

echo "function Cal_Speed() {\n"; 
echo "  if (test_img.complete) {\n"; 
echo "    var isp=\"\";\n"; 
echo "    var File_Size=8192;\n"; 
echo "    var timer2=new Date(); \n"; 
echo "    timer2=timer2.getTime();\n"; 
echo "    var kbps=(File_Size/(timer2-timer1)) * 30.7;\n"; 

echo "    //Connection Type\n"; 
echo "    if (kbps<56){isp=\"Dial-up modem\";}\n"; 
echo "    if ((kbps>56)&&(kbps<3072)){isp=\"DSL Connection\";}\n"; 
echo "    if (kbps>3072){isp=\"DSL2+ or local network\";}\n";

echo "    //Signal Strength\n"; 
echo "    if (kbps<56){Strength=\"Very Low\";}\n"; 
echo "    if ((kbps>56)&&(kbps<200)){Strength=\"Low\";}\n";
echo "    if ((kbps>200)&&(kbps<700)){Strength=\"Good\";}\n";
echo "    if ((kbps>700)&&(kbps<3072)){Strength=\"Very Good\";}\n";
echo "    if (kbps>3072){Strength=\"Excellent\";}\n"; 

echo "    kbps=kbps.toFixed(1)\n"; 
echo "    document.isp_speed.Replace.value= isp+\" (\" + kbps +\" kbps)\";\n";
echo "    document.isp_speed.Signal.value= 'Signal Strength: ' + Strength \n"; 
echo "  }\n"; 
echo "    else \n"; 
echo "  {\n"; 
echo "    setTimeout(\"Cal_Speed()\",Network_Connection)\n"; 
echo "  }	\n"; 
echo "}Check_Speed()\n"; 
 
echo "</SCRIPT>\n"; 
exit;

}


//Net Browser
if($Mode == 1){ 

echo "<style>\n"; 
echo "\n"; 
echo "INPUT, SELECT {\n"; 
echo "   color: black;\n"; 
echo "   font-family: arial, verdana, ms sans serif;\n"; 
echo "   font-weight: bold;\n"; 
echo "   font-size: 13pt;\n"; 
echo "}\n"; 

echo "body { \n"; 
echo "   overflow-x: hidden;\n"; 
echo "   overflow-y: hidden;\n"; 
echo "}\n"; 

echo "</style>\n";

echo "<div id='Net' style='display: block; position: absolute; left: 10px; top: 10px; \n"; 
echo "border: solid black 0px; padding: 10px; background-color: white; width: 280px;'><big>\n"; 
echo "<form name=\"URLframe\" onSubmit=\"return GoToURL()\">\n"; 
echo "<b><font face='Arial' size='4' color='darkblue'>Net Browser 1.0</font></b>\n"; 
echo "<input type=\"text\" size=30 name=\"URL\" value=\"http://\">\n"; 
echo "<input type=\"button\" name=\"Submit\" value=\"Go\" onClick=\"GoToURL()\" ondblclick=\"OS()\">\n"; 
echo "<input type=Reset>\n"; 
echo "</big></form></div>\n"; 

echo "<SCRIPT LANGUAGE=\"JavaScript\">\n";

echo "function OS(){link = document.URLframe.URL.value; top.location.href = link;return false;}\n";
 
echo "function GoToURL(){\n"; 
echo "  URLis = document.URLframe.URL.value\n"; 
echo "  window.open(URLis,'mywindow','menubar=yes,toolbar=yes,scrollbars=yes,resizable=yes,location=yes,width=450,height=400');\n"; 
echo "  return false;\n"; 
echo "}\n"; 

echo "</SCRIPT>\n"; 

exit;

}


//Days Ahead
if($Mode == 2){ 

echo "<!-- Copyright (c) 2011 Supreme Search Team -->\n"; 

echo "<body bgcolor=\"aliceblue\">\n"; 
echo "<center><h1>Calculate Days Ahead</h1>\n";

echo "<style type=\"text/css\">\n"; 

echo "  INPUT, SELECT, Text  {\n"; 
echo "    font-family: arial, verdana, ms sans serif;\n"; 
echo "    font-weight: bold;\n"; 
echo "    font-size: 14pt;\n"; 
echo "  }\n"; 

echo "</style>\n"; 
 
echo "<big><b><SCRIPT>document.write(Date());</SCRIPT></b></big>\n"; 


echo "<form name=\"Form_A\">\n"; 
echo "<TABLE border=1 BGCOLOR=\"white\">\n"; 
echo "<TR>\n"; 
echo "<TD><center><input type=\"button\" value=\"Clear All\" onClick=\"Clear();\"/></TD></center>\n"; 
echo "<TD><DIV ALIGN=CENTER><big>Days Ahead</big></DIV></TD>\n"; 
echo "<TD><DIV ALIGN=CENTER><big>Output</big></DIV></TD>\n"; 
echo "</TR>\n"; 

echo "<TR>\n"; 
echo "<TD><INPUT TYPE=\"button\" VALUE=\"Calculate\" onClick=\"calculate()\"></TD>\n"; 
echo "<TD><center><INPUT TYPE=\"TEXT\" NAME=\"Days_Ahead\" id=\"Days_Ahead\" SIZE=\"5\" /></center></TD>\n"; 
echo "<TD><INPUT TYPE=\"TEXT\" NAME=\"Display\" id=\"Display\" readonly=\"readonly\" SIZE=\"30\" /></TD>\n"; 
echo "</TR>\n"; 

echo "</FORM>\n"; 
echo "</TABLE>\n"; 
echo "</center>\n"; 

echo "<SCRIPT LANGUAGE=\"JAVASCRIPT\">\n"; 

echo "  //Get Days Ahead\n"; 
echo "  function addDays(myDate,days) {\n"; 
echo "    return new Date(myDate.getTime() + days*24*60*60*1000);\n"; 
echo "  }\n"; 

echo "  function calculate(){\n"; 
echo "    var test = Form_A.Days_Ahead.value;\n"; 
echo "    Form_A.Display.value = addDays(new Date(),+test);\n"; 
echo "  }\n"; 

echo "  function Clear() {\n"; 
echo "    if(confirm(\"Are You Sure?\")) { \n"; 
echo "      window.location.reload( true );\n"; 
echo "    }\n"; 
echo "  }\n"; 

echo "</SCRIPT>\n"; 

echo "<br><center><iframe width=\"468\" height=\"60\" src=\"$Local_URL/Banner_Local.php\" marginheight=\"10\" marginwidth=\"0\" frameborder=\"0\"></iframe></center>"; exit;

}


//Internet Time
if($Mode == 3){ 

echo "<style>\n"; 
echo "body { \n"; 
echo "   overflow-x: hidden;\n"; 
echo "   overflow-y: hidden;\n"; 
echo "}\n"; 
echo "</style>\n"; 

echo "<div id=\"Internet_Time\">\n"; 
echo "\n"; 
echo "<fieldset><legend><b>Synchronize Time</b></legend>\n"; 
echo "<INPUT TYPE=\"CHECKBOX\" NAME=\"CHECK1\" checked/>Automatically synchronize with an Internet time server<br><br>\n"; 
echo "&nbsp;&nbsp; Server: time.supremesearch.net&nbsp; <input type=\"button\" onclick=\"document.getElementById('Internet_Time').innerHTML = 'Synchronize Complete ...';\" value=\"Update Now\" /><br><br>\n"; 
echo "\n"; 
echo "The time has been successfully synchronize with time.supremesearch.net on <SCRIPT>document.write(Date());</SCRIPT><br><br>\n"; 
echo "\n"; 
echo "<center>Synchronize can occur only when your computer is connected to the Internet.</center>\n"; 
echo "\n"; 
echo "<div style='float: right;'><input type=\"button\" id=\"Set\" onclick=\"document.getElementById('Set').disabled='disabled';\" value=\"&nbsp;Set&nbsp;\"></div>\n"; 
echo "\n"; 
echo "</fieldset></div>\n"; 

exit;

}


//Connection Status
if($Mode == 4){

$Core3_Edition = "Core3.php?Mode=0&Entry=$Entry";

echo "<style>\n"; 
echo "\n"; 
echo "INPUT, SELECT {\n"; 
echo "   color: black;\n"; 
echo "   font-family: arial, verdana, ms sans serif;\n"; 
echo "   font-weight: bold;\n"; 
echo "}\n"; 

echo "body { \n"; 
echo "   overflow-x: hidden;\n"; 
echo "   overflow-y: hidden;\n"; 
echo "}\n"; 

echo "</style>\n"; 

echo "<table STYLE='position:absolute;top:5;' border=\"0\"><tr><td>";
echo "<fieldset><legend><b>Connection Status</b></legend>\n"; 
echo "<table border=\"0\">";
echo "<tr><td bgcolor='#DDDDDD'><center><INPUT type=button value=\"Repair\" onClick=\"location.href='$Core3_Edition'\"></center></td><td><img src='$Entry/Icons/Net.png' width='48' height='48' BORDER='0'/></td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>IP ADDRESS:</td><td>" .$_SERVER['REMOTE_ADDR'] ."</td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>GATEWAY INTERFACE:</td><td>" .$_SERVER['GATEWAY_INTERFACE'] ."</td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>SERVER PROTOCOL:</td><td>" .$_SERVER['SERVER_PROTOCOL'] ."</td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>SERVER NAME:</td><td>" .$_SERVER['SERVER_NAME'] ."</td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>HTTP CONNECTION:</td><td>" .$_SERVER['HTTP_CONNECTION'] ."</td></tr>";
echo "</tr>\n"; 
echo "</table>";
exit;
}


//Drive Tools
if($Mode == 5){

$Letter = $_GET['Letter'];

echo "<style>\n"; 
echo "body { \n"; 
echo "   overflow-x: hidden;\n"; 
echo "   overflow-y: hidden;\n"; 
echo "}\n"; 
echo "</style>\n"; 

echo "<fieldset><legend><b>&nbsp;Local Disk $Letter:&nbsp;</b></legend>\n"; 
echo "<div id=\"Check3\" name=\"Check3\" style=\"float: left\"></div>\n"; 
echo "<div id=\"Status3\" name=\"Status3\" style=\"float: right\"><button onclick=\"Format(); this.disabled=true;\">Format</button></div>\n"; 
echo "</fieldset><br>\n"; 

echo "<fieldset><legend><b>&nbsp;Error-Checking&nbsp;</b></legend><br>\n"; 
echo "&nbsp;<img src=\"$Local_URL/icons/Hard disk.png\" width=\"24\" height=\"24\" BORDER=\"0\">\n"; 
echo "&nbsp;This option will check the volume for errors.<br><br>\n"; 
echo "<div id=\"Check\" name=\"Check\" style=\"float: left\"></div>\n"; 
echo "<div id=\"Status1\" name=\"Status1\" style=\"float: right\"><button onclick=\"Check_Now(); this.disabled=true;\">Check Now</button></div>\n"; 
echo "</fieldset><br>\n"; 
echo "\n"; 
echo "<fieldset><legend><b>&nbsp;Defragmention&nbsp;</b></legend><br>\n"; 
echo "&nbsp;<img src=\"$Local_URL/icons/process.png\" width=\"24\" height=\"24\" BORDER=\"0\">\n"; 
echo "&nbsp;This option will defragment files on the volume.<br><br>\n"; 
echo "<div id=\"Check2\" name=\"Check2\" style=\"float: left\"></div>\n"; 
echo "<div id=\"Status2\" name=\"Status2\" style=\"float: right\"><button onclick=\"Defragment(); this.disabled=true;\">Defragment Now</button></div>\n"; 
echo "</fieldset><br>\n"; 
echo "\n"; 
echo "<script> \n"; 
echo " \n"; 
echo "var i=0;\n"; 
echo "var j=0;\n"; 
echo "var k=0;\n"; 
echo "var splashmessage2=new Array();\n"; 
echo "\n"; 
echo "if (navigator.appName == \"Netscape\"){\n"; 
echo "  var openingtags2='<font face=\"Arial\" color=\"blue\" size=\"4\">';\n"; 
echo "  splashmessage2[0]=\"|\";\n"; 
echo "  splashmessage2[1]=\"||\";\n"; 
echo "  splashmessage2[2]=\"|||\";\n"; 
echo "  splashmessage2[3]=\"||||\";\n"; 
echo "  splashmessage2[4]=\"|||||\";\n"; 
echo "  splashmessage2[5]=\"||||||\";\n"; 
echo "  splashmessage2[6]=\"||||||||\";\n"; 
echo "  splashmessage2[7]=\"|||||||||\";\n"; 
echo "  splashmessage2[8]=\"||||||||||\";\n"; 
echo "  splashmessage2[9]=\"|||||||||||\";\n"; 
echo "  splashmessage2[10]=\"|||||||||||\";\n"; 
echo "}else{\n"; 
echo "  var openingtags2='<font face=\"wingdings\" color=\"blue\" size=\"4\">';\n"; 
echo "  splashmessage2[0]=\"n\";\n"; 
echo "  splashmessage2[1]=\"nn\";\n"; 
echo "  splashmessage2[2]=\"nnn\";\n"; 
echo "  splashmessage2[3]=\"nnnn\";\n"; 
echo "  splashmessage2[4]=\"nnnnn\";\n"; 
echo "  splashmessage2[5]=\"nnnnnn\";\n"; 
echo "  splashmessage2[6]=\"nnnnnnn\";\n"; 
echo "  splashmessage2[7]=\"nnnnnnnn\";\n"; 
echo "  splashmessage2[8]=\"nnnnnnnnn\";\n"; 
echo "  splashmessage2[9]=\"nnnnnnnnnn\";\n"; 
echo "  splashmessage2[10]=\"nnnnnnnnnn\";\n"; 
echo "}var closingtags='</font>';\n"; 
echo "\n"; 
echo " var Drive = \"$Letter\";\n"; 
echo "\n"; 
echo "function Check_Now(){\n"; 
echo "  if (Drive == \"D\"){Check.innerHTML='Unable To Format.';}\n"; 
echo "    else{\n"; 
echo "      if (i<splashmessage2.length){\n"; 
echo "        Check.innerHTML='&nbsp;'+openingtags2+splashmessage2[i]+closingtags+'</b>'; i++;\n"; 
echo "      }else{\n"; 
echo "        Check.innerHTML='<b><font color=\"black\">100% Complete No Errors.</font></b>';\n"; 
echo "      }\n"; 
echo "      setTimeout(\"Check_Now()\",5500)\n"; 
echo "  }\n"; 
echo "}\n"; 
echo "\n"; 
echo "function Defragment(){\n"; 
echo "  if (Drive == \"D\"){Check2.innerHTML='Cannot Lock Current Drive.';}\n"; 
echo "  else{\n"; 
echo "      if (j<splashmessage2.length){\n"; 
echo "        Check2.innerHTML='&nbsp;'+openingtags2+splashmessage2[j]+closingtags+'</b>'; j++;\n"; 
echo "      }else{\n"; 
echo "        Check2.innerHTML='<b><font color=\"black\">100% Complete</font></b>';\n"; 
echo "      }\n"; 
echo "      setTimeout(\"Defragment()\",25500)\n"; 
echo "  }\n"; 
echo "}\n"; 
echo "\n"; 
echo "function Format(){\n"; 
echo "  if (Drive == \"D\"){Check3.innerHTML='Format Failed.';}\n"; 
echo "  else{\n"; 
echo "      if (k<splashmessage2.length){\n"; 
echo "        Check3.innerHTML='&nbsp;'+openingtags2+splashmessage2[k]+closingtags+'</b>'; k++;\n"; 
echo "      }else{\n"; 
echo "        Check3.innerHTML='<b><font color=\"black\">100% Complete</font></b>';\n"; 
echo "      }\n"; 
echo "      setTimeout(\"Format()\",4500)\n"; 
echo "  }\n"; 
echo "}\n"; 
echo "\n"; 
echo "</script>\n"; 
exit;
}


//Drive Properties
if($Mode == 6){

$Letter = $_GET['Letter'];

//Get Capacity
$System = "NTFS";
$Capacity = "250 Gb";
$Capacity_Bytes = 268435456000;

function getSymbolByQuantity($bytes){ 
  $symbols = array('B', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb', 'Eb', 'Zb', 'Yb'); 
  $exp = floor(log($bytes)/log(1024)); 
  return sprintf("%.2f " . $symbols[$exp], ($bytes/pow(1024, floor($exp)))); 
} 

//Add Used Size
$Used_Size = 107374182400; //Bytes
$Used = getSymbolByQuantity($Used_Size);

function getSymbolByQuantity2($bytes){ 
  $symbols = array('B', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb', 'Eb', 'Zb', 'Yb'); 
  $exp = floor(log($bytes)/log(1024)); 
  return sprintf("%.2f " . $symbols[$exp], ($bytes/pow(1024, floor($exp)))); 
} 

//Get Free Space
$FreeSpace_In_Bytes = ($Capacity_Bytes - $Used_Size);
$FreeSpace = (getSymbolByQuantity2($FreeSpace_In_Bytes));
$Mem_Block = "209715200"; //200megs

for($c = 0; $c <= 10; $c++){ 
  if ($Used_Size >= ($Mem_Block*$c)){
   $Percent = ($c*4);
  }
}

if($Letter == "D"){echo "<script language=\"JavaScript\">alert('Drive $Letter: Properties Unkown')</script>";
$System=0; $Capacity=0; $Capacity_Bytes=0; $Used_Size =0; 
$Used=0; $FreeSpace_In_Bytes =0; $FreeSpace=0; $Percent=0; }

echo "\n"; 
echo "<style>\n"; 
echo "    .graph { \n"; 
echo "        position: relative; /* IE is dumb */\n"; 
echo "        width: 400px; \n"; 
echo "        border: 1px solid #DDDDDD; \n"; 
echo "        padding: 4px; \n"; 
echo "        text-align: left\n"; 
echo "    }\n"; 
echo "    .graph .bar { \n"; 
echo "        display: block;\n"; 
echo "        position: relative;\n"; 
echo "        background: #DDDDDD; \n"; 
echo "        text-align: Right; \n"; 
echo "        color: #333; \n"; 
echo "        height: 1em; \n"; 
echo "        line-height: 1em;\n"; 
echo "        padding: 4px;     \n"; 
echo "    }\n"; 
echo "    .graph .bar span { position: absolute; left: 1em; }\n"; 
echo "    }\n"; 
echo "   body { \n"; 
echo "     overflow-x: hidden;\n"; 
echo "     overflow-y: hidden;\n"; 
echo "   }\n"; 
echo "</style>\n"; 
echo "\n"; 
echo "<TABLE cellpadding=\"5\" BGCOLOR=\"white\"><TR>\n"; 
echo "\n"; 
echo "<TR>\n"; 
echo "<TD bgcolor=\"00EEEE\"><b>Drive $Letter:</b></TD>\n"; 
echo "<TD bgcolor=\"00EEEE\" COLSPAN=\"2\"><b>Properties</b></TD>\n"; 
echo "</TR>\n"; 
echo "\n"; 
echo "<TD bgcolor=\"#DDDDDD\">Type:</TD>\n"; 
echo "<TD>Local Disk</TD>\n"; 
echo "</TR>\n"; 
echo "\n"; 
echo "<TR>\n"; 
echo "<TD bgcolor=\"#DDDDDD\">File System:</TD>\n"; 
echo "<TD>$System</TD>\n"; 
echo "</TR>\n"; 
echo "\n"; 
echo "<TR>\n"; 
echo "<TD bgcolor=\"#DDDDDD\">Used Space:</TD>\n"; 
echo "<TD>".number_format($Used_Size)." Bytes</TD>\n"; 
echo "<TD><font color=\"white\">_______</font>$Used<font color=\"white\">__</font></TD>\n"; 
echo "</TR>\n"; 
echo "\n"; 
echo "<TR>\n"; 
echo "<TD bgcolor=\"#DDDDDD\">Free Space:</TD>\n"; 
echo "<TD>".number_format($FreeSpace_In_Bytes)." Bytes</TD>\n"; 
echo "<TD><font color=\"white\">_______</font>$FreeSpace<font color=\"white\">__</font></TD>\n"; 
echo "</TR></\n"; 
echo "\n"; 
echo "<TR>\n"; 
echo "<TD bgcolor=\"#DDDDDD\">Capacity:</TD>\n"; 
echo "<TD>".number_format($Capacity_Bytes)." Bytes</TD>\n"; 
echo "<TD><font color=\"white\">_______</font>$Capacity<font color=\"white\">__</font></TD>\n"; 
echo "</TR></TABLE><hr>\n"; 
echo "\n"; 
echo "<div class=\"graph\">\n"; 
echo "<strong class=\"bar\" style=\"width: $Percent%;\"><strong>\n"; 
echo "</div></center>\n"; 
echo "\n";
exit;
} 


//My Network Places
if($Mode == 7){ 

echo "<style>\n"; 
echo "\n"; 
echo "INPUT, SELECT {\n"; 
echo "   color: black;\n"; 
echo "   font-family: arial, verdana, ms sans serif;\n"; 
echo "   font-weight: bold;\n"; 
echo "   font-size: 13pt;\n"; 
echo "}\n"; 

echo "body { \n"; 
echo "   overflow-x: hidden;\n"; 
echo "   overflow-y: hidden;\n"; 
echo "}\n"; 

echo "</style>\n";

echo "<div id='Net' style='display: block; position: absolute; left: 10px; top: 10px; \n"; 
echo "border: solid black 0px; padding: 10px; background-color: white;'><big>\n"; 
echo "<form name=\"URLframe\" onSubmit=\"return GoToURL()\">\n"; 
echo "<b><font face='Arial' size='4' color='darkblue'>My Network Places</font></b>\n"; 
echo "<input type=\"text\" style=\"width:100%\" name=\"URL\" value=\"ftp://\">\n"; 
echo "<input type=\"button\" name=\"Submit\" value=\"Go\" onClick=\"GoToURL()\" ondblclick=\"OS()\">\n"; 
echo "<input type=Reset>\n"; 
echo "<INPUT Type='button' VALUE='Back' onClick='history.go(-1);return true;'>\n"; 
echo "</big></form></div>\n"; 

echo "<SCRIPT LANGUAGE=\"JavaScript\">\n";

echo "function OS(){link = document.URLframe.URL.value; top.location.href = link;return false;}\n";
 
echo "function GoToURL(){\n"; 
echo "  URLis = document.URLframe.URL.value\n"; 
echo "  window.open(URLis,'mywindow','menubar=yes,toolbar=yes,scrollbars=yes,resizable=yes,location=yes,width=450,height=400');\n"; 
echo "  return false;\n"; 
echo "}\n"; 

echo "</SCRIPT>\n"; 

exit;

}


//Income Calculator
if($Mode == 8){ 

echo "<!-- Copyright (c) 2010 Supreme Search Team -->\n"; 

echo "<body bgcolor=\"aliceblue\">\n"; 
echo "<center><form name=\"data\">\n"; 
echo "<TABLE border=1 BGCOLOR=\"white\">\n"; 
echo "<TR>\n"; 
echo "<TD><input type=\"text\" name=\"original\" size=\"20\"></TD>\n"; 
echo "<TD><select size=\"1\" name=\"units\">\n"; 
echo "<option value=\"Hourly\">Hourly Pay</option>\n"; 
echo "<option value=\"Monthly\">Monthly Pay</option>\n"; 
echo "<option value=\"Yearly\">Yearly Pay</option>\n"; 
echo "</select></TD>\n"; 
echo "</TR>\n"; 

echo "<TR>\n"; 
echo "<TD><input type=\"text\" name=\"hours\" size=\"20\"></TD>\n"; 
echo "<TD>Hours per Week</TD>\n"; 
echo "</TR>\n"; 

echo "<TR>\n"; 
echo "<TD><input type=\"button\" value=\"Calculate\" name=\"B1\" name=\"id\" onClick=\"calculate()\"></TD>\n"; 
echo "<TD><input type=\"button\" value=\"Clear All\" onClick=\"Clear();\"/></TD>\n"; 
echo "</TR>\n"; 

echo "</form>\n"; 
echo "</TABLE>\n"; 

echo "<br><textarea name=\"Display\" id=\"Display\" readonly=\"readonly\" rows=\"6\" cols=\"45\"></textarea></center>\n"; 

echo "<script>\n"; 

echo "function calculate(){\n"; 
echo "  var Weekly = 0;\n"; 
echo "  var bi_Weekly = 0;\n"; 
echo "  var Monthly = 0;\n"; 
echo "  var Year = 0;\n"; 
echo "  var hours=document.data.hours.value\n"; 
echo "  var Input=document.data.original.value\n"; 
echo "  var selectunit=document.data.units.options[document.data.units.selectedIndex].value\n"; 

echo "  if (selectunit==\"Hourly\"){\n"; 
echo "    Weekly = (Input * hours);\n"; 
echo "    bi_Weekly = (Weekly * 2);\n"; 
echo "    Monthly = (bi_Weekly * 2);\n"; 
echo "    Year = (Monthly * 12);\n"; 
echo "  }\n"; 

echo "  if (selectunit==\"Monthly\"){\n"; 
echo "    Monthly = eval(Input);\n"; 
echo "    Year = (Monthly * 12);\n"; 
echo "    bi_Weekly = (Monthly / 2);\n"; 
echo "    Weekly = (bi_Weekly / 2);\n"; 
echo "  }\n"; 
echo "  \n"; 
echo "  if (selectunit==\"Yearly\"){\n"; 
echo "    Year = eval(Input);\n"; 
echo "    Monthly = (Year / 12);\n"; 
echo "    bi_Weekly = (Monthly / 2);\n"; 
echo "    Weekly = (bi_Weekly / 2);\n"; 
echo "  }\n"; 

echo '  Display.value = ("Total Weekly: $" +Weekly.toFixed(2)+"\n"';
echo '    +"Total bi-weekly: $" +bi_Weekly.toFixed(2)+"\n"';  
echo '    +"Total Monthly: $" +Monthly.toFixed(2)+"\n"';
echo '    +"Total Gross per year: $" +Year.toFixed(2)+"\n"'; 
echo "  );\n"; 

echo "}\n"; 

echo "  function Clear() {\n"; 
echo "    if(confirm(\"Are You Sure?\")) { \n"; 
echo "      window.location.reload( true );\n"; 
echo "    }\n"; 
echo "  }\n"; 

echo "</script>\n"; 

echo "<style type=\"text/css\">\n"; 

echo "  INPUT {\n"; 
echo "    color: black;\n"; 
echo "    font-family: arial, verdana, ms sans serif;\n"; 
echo "    font-weight: bold;\n"; 
echo "    font-size: 12pt;\n"; 
echo "  }\n"; 

echo "textarea {\n"; 
echo "	border-color: lightblue;\n"; 
echo "	border-style: solid;\n"; 
echo "	border-width: thin;\n"; 
echo "	padding: 10px;\n"; 
echo "        font-size:20px; \n"; 
echo "}\n"; 

echo "  SELECT {\n"; 
echo "    background-color: aliceblue;\n"; 
echo "  }\n"; 

echo "</style>\n"; 

echo "<br><center><iframe width=\"468\" height=\"60\" src=\"$Local_URL/Banner_Local.php\" marginheight=\"10\" marginwidth=\"0\" frameborder=\"0\"></iframe></center>"; exit;

}

//Network Status Mobile X-com
if($Mode == 9){ 
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.2//EN\" \"http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd\">\n"; 
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\" id=\"bp-doc\">\n"; 

$Core3_Edition = $Entry."Web-App/Core3.php?Mode=10&Entry=$Entry";

echo "<style>\n"; 
echo "\n"; 
echo "INPUT, SELECT {\n"; 
echo "   color: black;\n"; 
echo "   font-family: arial, verdana, ms sans serif;\n"; 
echo "   font-weight: bold;\n"; 
echo "   font-size: 13pt;\n"; 
echo "}\n"; 

echo "body { \n"; 
echo "   overflow-x: hidden;\n"; 
echo "   overflow-y: hidden;\n"; 
echo "}\n"; 

echo "</style>\n"; 

echo "<FORM style=\"width: 100%;\" name=\"isp_speed\">\n"; 
echo "<center><b><font face='Arial' color='darkblue'>Network Connection Status</font></b><hr>\n";
echo "<INPUT type=\"text\" style=\"BORDER: white\" name=\"Replace\" style=\"width: 100%;\" readonly=\"readonly\">\n";  
echo "<INPUT type=\"text\" style=\"BORDER: white\" name=\"Signal\" style=\"width: 100%;\" readonly=\"readonly\"><hr>\n";
echo "<INPUT type=button value=\"Check Speed Connection\" onClick=\"Check_Speed()\">\n"; 

echo "</FORM></center>\n"; 

echo "<SCRIPT LANGUAGE=\"JavaScript\">\n"; 

echo "//Network Status\n"; 
echo "var timer1=0; \n"; 
echo "var Network_Connection=100;\n"; 
echo "var Domain = \"$Entry\"\n";
echo "var Strength = \"N/A\"\n";
 
echo "//Network Status\n"; 
echo "function Check_Speed() {\n"; 
echo "  test_img=new Image();\n"; 
echo "  timer1=new Date();\n"; 
echo "  timer1=timer1.getTime();\n"; 
echo "  test_img.src=Domain+\"Web-App/Network Test.jpg?test=\"+timer1;\n"; 
echo "  document.isp_speed.Replace.value=\"Checking in progress\";\n"; 
echo "  setTimeout(\"Cal_Speed()\",Network_Connection);\n"; 
echo "}\n"; 

echo "function Cal_Speed() {\n"; 
echo "  if (test_img.complete) {\n"; 
echo "    var isp=\"\";\n"; 
echo "    var File_Size=8192;\n"; 
echo "    var timer2=new Date(); \n"; 
echo "    timer2=timer2.getTime();\n"; 
echo "    var kbps=(File_Size/(timer2-timer1)) * 30.7;\n"; 

echo "    //Connection Type\n"; 
echo "    if (kbps<56){isp=\"Dial-up modem\";}\n"; 
echo "    if ((kbps>56)&&(kbps<3072)){isp=\"DSL Connection\";}\n"; 
echo "    if (kbps>3072){isp=\"DSL2+ or local network\";}\n";

echo "    //Signal Strength\n"; 
echo "    if (kbps<56){Strength=\"Very Low\";}\n"; 
echo "    if ((kbps>56)&&(kbps<200)){Strength=\"Low\";}\n";
echo "    if ((kbps>200)&&(kbps<700)){Strength=\"Good\";}\n";
echo "    if ((kbps>700)&&(kbps<3072)){Strength=\"Very Good\";}\n";
echo "    if (kbps>3072){Strength=\"Excellent\";}\n"; 

echo "    kbps=kbps.toFixed(1)\n"; 
echo "    document.isp_speed.Replace.value= isp+\" (\" + kbps +\" kbps)\";\n";
echo "    document.isp_speed.Signal.value= 'Signal Strength: ' + Strength \n"; 
echo "  }\n"; 
echo "    else \n"; 
echo "  {\n"; 
echo "    setTimeout(\"Cal_Speed()\",Network_Connection)\n"; 
echo "  }	\n"; 
echo "}Check_Speed()\n"; 
 
echo "</SCRIPT>\n"; 

exit;

}


//Connection Status
if($Mode == 10){
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.2//EN\" \"http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd\">\n"; 
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\" id=\"bp-doc\">\n"; 

$Core3_Edition = $Entry."Core3.php?Mode=9&Entry=$Entry";

echo "<style>\n"; 
echo "\n"; 
echo "INPUT, SELECT {\n"; 
echo "   color: black;\n"; 
echo "   font-family: arial, verdana, ms sans serif;\n"; 
echo "   font-weight: bold;\n"; 
echo "}\n"; 

echo "body { \n"; 
echo "   overflow-x: hidden;\n"; 
echo "   overflow-y: hidden;\n"; 
echo "}\n"; 
echo "</style>\n"; 

echo "<fieldset><legend><b>Connection Status</b></legend>\n"; 
echo "<table border=\"0\">";
echo "<tr><td bgcolor='#DDDDDD'><center><img src='$EntryIcons/Net.png' width='48' height='48' BORDER='0'/></center></td><td><center><INPUT type=button value=\"Repair\" onClick=\"location='$Core3_Edition'\"></center></td></tr>\n"; 
echo "<tr><td bgcolor='#DDDDDD'>IP ADDRESS:</td><td>" .$_SERVER['REMOTE_ADDR'] ."</td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>GATEWAY INTERFACE:</td><td>" .$_SERVER['GATEWAY_INTERFACE'] ."</td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>SERVER PROTOCOL:</td><td>" .$_SERVER['SERVER_PROTOCOL'] ."</td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>SERVER NAME:</td><td>" .$_SERVER['SERVER_NAME'] ."</td></tr>";
echo "<tr><td bgcolor='#DDDDDD'>HTTP CONNECTION:</td><td>" .$_SERVER['HTTP_CONNECTION'] ."</td></tr>";
echo "</table>\n";
echo "</fieldset>\n";
exit;
}

?>