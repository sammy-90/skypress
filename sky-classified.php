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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "myfiles/settings-os.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
if ($themecolor !== "none"){
  echo '<link rel="stylesheet" href="sky-admin/ajax/'.$themecolor.'.css">';
  $footercolor = "theme";
  $lightbox = "theme-l5";
  $panelcolor = "theme-l5";
}
?>
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

<?php

 //Press Or Classified
 $ps = $_GET['ps']; if($ps == "5097ars5@"){$admin = "on";}else{$admin = "off";}
 $type = $_GET['type']; if(!$type){$type = "class";}
 $mode = $_GET['mode']; //Open Submit form

?>

<big><b><div class="<?php echo 'w3-'.$footercolor.'' ?> w3-padding">

 <ul class="nav"">

  <?php

  if ($type === "class"){

  if(!isMobile()){
    echo '<div class="w3-dropdown-hover w3-'.$footercolor.'">';
    echo '<li><a href="#"><font color="white"><i class="fa fa-bars w3-large w3-hover-opacity w3-'.$footercolor.'"></i></font></a></li>';
  }else{
    echo '<div class="w3-dropdown-click">';
    echo '<li><a href="#" onclick="myFunction()"><font color="white"><i class="fa fa-bars w3-large w3-hover-opacity w3-'.$footercolor.'"></i></font></a></li>';
  }

    echo '<div id="Demo" class="w3-dropdown-content w3-bar-block w3-border w3'.$pagecolor.' w3-animate-zoom">';
      include "sky-menu.php";
    echo '</div>';
  echo '</div>';

    echo "<li><a href=\"index.php\" oncontextmenu=\"location.href='sky-classified_update.php?type=press-release';return false\">&nbsp;<font color=\"white\">Home</font></a></li>";    
    echo "<li><a href=\"sky-classified_search.php\" oncontextmenu=\"location.href='sky-classified_update2.php?type=class';return false\">&nbsp;<font color=\"white\">Search</font></a></li>";
    echo "<li><a href=\"#\" title=\"Start posting ads now, no signup needed!\" oncontextmenu=\"location.href='sky-classified_update3.php?type=class';return false\" onclick=\"document.getElementById('Add').style.display = 'block';\"><font color=\"white\">Post</font></a></li>";
  }else{
    echo "<li><a href=\"index.php\" oncontextmenu=\"location.href='sky-classified_update.php?type=press-release';return false\">&nbsp;<font color=\"white\">Home</font></a></li>";
    echo "<li><a href=\"sky-classified_search.php?type=press-release\" oncontextmenu=\"location.href='sky-classified_update2.php?type=press-release';return false\">&nbsp;<font color=\"white\">Search</font></a></li>";
    echo "<li><a href=\"#\" title=\"Submit Press Release, no signup needed!\" oncontextmenu=\"location.href='sky-classified_update3.php?type=press-release';return false\" onclick=\"document.getElementById('Add').style.display = 'block';\"><font color=\"white\">Submit</font></a></li>";
  }

  $i = $_GET['i']; if(!$i){$i = 0;}
  echo '<li><a href="javascript:history.back()" title="Previous"><font color="white"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
</font></a></li>';

    
  ?>

<script>
function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

  <li><a href="#" onclick="next()" title="Next"><font color="white"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
&nbsp;&nbsp;&nbsp;</font></a></li>
 </ul>
</div></big></b>

<?php
  include "myfiles/settings-menu.php"; 
  echo '<div class="w3-dropdown-hover"></div>';
  if($menut1){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut1.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-'.$footercolor.'">';
    if($link1){echo '<a href="'.$link2.'" class="w3-bar-item w3-button">'.$link1.'</a>';}
    if($link4){echo '<a href="'.$link4.'" class="w3-bar-item w3-button">'.$link3.'</a>';}
    if($link6){echo '<a href="'.$link6.'" class="w3-bar-item w3-button">'.$link5.'</a>';}
    if($link8){echo '<a href="'.$link8.'" class="w3-bar-item w3-button">'.$link7.'</a>';}
    if($link10){echo '<a href="'.$link10.'" class="w3-bar-item w3-button">'.$link9.'</a>';}
    echo '</div>';
    echo '</div>';
  }
  if($menut2){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut2.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-'.$footercolor.'">';
    if($link12){echo '<a href="'.$link12.'" class="w3-bar-item w3-button">'.$link11.'</a>';}
    if($link14){echo '<a href="'.$link14.'" class="w3-bar-item w3-button">'.$link13.'</a>';}
    if($link16){echo '<a href="'.$link16.'" class="w3-bar-item w3-button">'.$link15.'</a>';}
    if($link18){echo '<a href="'.$link18.'" class="w3-bar-item w3-button">'.$link17.'</a>';}
    if($link20){echo '<a href="'.$link20.'" class="w3-bar-item w3-button">'.$link19.'</a>';}
    echo '</div>';
    echo '</div>';
  }
  if($menut3){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut3.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-'.$footercolor.'">';
    if($link22){echo '<a href="'.$link22.'" class="w3-bar-item w3-button">'.$link21.'</a>';}
    if($link24){echo '<a href="'.$link24.'" class="w3-bar-item w3-button">'.$link23.'</a>';}
    if($link26){echo '<a href="'.$link26.'" class="w3-bar-item w3-button">'.$link25.'</a>';}
    if($link28){echo '<a href="'.$link28.'" class="w3-bar-item w3-button">'.$link27.'</a>';}
    if($link30){echo '<a href="'.$link30.'" class="w3-bar-item w3-button">'.$link29.'</a>';}
    echo '</div>';
    echo '</div>';
  }
?>

<div class="w3-container w3-center w3-padding">

 <?php

  if (isset($_GET['page'])) {
    echo '<div class="w3-row w3-padding w3-border" id="blog">';
    include "sky-engine.php";
    echo '</div>';
    if (($type !== "radio") && ($type !== "tv")) {
      echo '<footer class="w3-container" style="padding:32px">';
      echo '<center>';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>Back</b></button>';
      echo '<a href="#" class="w3-button w3-white w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next</b></button>';
      echo '</center>';
      echo '</footer>';
    }
    echo '<script language="JavaScript">function Next(){top.location.href="sky-import.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-import.php?i='.$i.'";}</script>';
  }

if ($type === "class"){

 echo "<style>";
 echo "table{table-layout: fixed;float: left; width:20%; border-radius: 25px; margin: 1em; padding:10px;}";
 echo "/*--Mobile Control--*/";
 echo "@media only screen and (max-width: 800px) {";
 echo "  table{table-layout: fixed;float: left; width:90%;}";
 echo "}";
 echo "</style>";

 if (file_exists("myfiles/widgets/classified.txt")){

   $lines2 = file('myfiles/widgets/classified.txt');  $lines = array_reverse($lines2);

   $row_counter = 0;
   $counter = 0;
   for($sc = $i; $sc < count($lines); next($lines), $sc++){$counter++; $row_counter++; $i++;
        echo "<table class='w3-".$footercolor."';\">\n"; 

        //Get Data
        $data = explode("|",$lines[$sc]);
	echo "<tr><td><b>$data[0]</b></td></tr>\n"; 
	if (strlen($data[1]) > 2){echo "<tr><td><center><a href='$data[1]' target='blank'><img src='$data[1]' height='120px' width='120px' border='0'/></a></center></td></tr>\n";}
        if (strlen($data[3]) > 2){
          echo "<tr><td>$data[2]. Phone: $data[3]</td></tr>\n";
        }else{
          echo "<tr><td>$data[2].</td></tr>\n";
        } 
	echo "<tr><td><a href='http://$data[4]' target='blank'><font color='white'>Website</font></a></td></tr>\n";
        if($admin == "on"){echo "<tr><td><a href='sky-classified_delete.php?pw=$data[5]'><font color='white'>Delete</font></a></td></tr>\n";}
	echo "</table>\n";
     if ($counter == 4){echo "<br><br><hr style='clear:both;color:white;background-color:white;border: 0;'>\n"; $counter = 0;} 
     if ($row_counter == 24){if ($ads_code){echo "<div class='w3-container w3-center'><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php"; echo "<br>";}} 
     if ($row_counter == 48){
       if ($ads_code){echo "<div class='w3-container w3-center'><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php"; echo "<br>";}
       break;
     } 
   }

 }

}else{

 echo "<style>";
 echo "table{table-layout: fixed;float: left; width:40%; border-radius: 25px; margin: 1em; padding:10px;}";
 echo "/*--Mobile Control--*/";
 echo "@media only screen and (max-width: 800px) {";
 echo "  table{table-layout: fixed;float: left; width:90%;}";
 echo "}";
 echo "</style>";

 if (file_exists("press-release.txt")){

   $lines2 = file('press-release.txt');  $lines = array_reverse($lines2);

   $i = $_GET['i']; if(!$i){$i = 0;};
   $row_counter = 0;
   $counter = 0;
   for($sc = $i; $sc < count($lines); next($lines), $sc++){$counter++; $row_counter++; $i++;
        echo "<table class='w3-".$footercolor."';\">\n"; 

        //Get Data
        $data = explode("|",$lines[$sc]);
	echo "<tr><td><b>$data[0]</b></td></tr>\n"; 
	if (strlen($data[1]) > 2){echo "<tr><td><center><a href='$data[1]' target='blank'><img src='$data[1]' height='120px' width='120px' border='0'/></a></center></td></tr>\n";}
        if (strlen($data[3]) > 2){
          echo "<tr><td>$data[2]. Phone: $data[3]</td></tr>\n";
        }else{
          echo "<tr><td>$data[2].</td></tr>\n";
        } 
	if ($counter == 2){echo "<tr><td><a href='http://$data[4]' target='blank'><font color='white'>Website</font></a></td></tr>\n";}else{echo "<tr><td><a href='http://$data[4]' target='blank'>Website</a></td></tr>\n";} 
        if($admin == "on"){echo "<tr><td><a href='sky-classified_delete.php?pw=$data[5]'><font color='white'>Delete</font></a></td></tr>\n";}
	echo "</table>\n";
     if ($counter == 2){echo "<br><br><hr style='clear:both;color:white;background-color:white;border: 0;'>\n"; $counter = 0;} 
     if ($row_counter == 24){if ($ads_code){echo "<div class='w3-container w3-center'><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php"; echo "<br>";}}
     if ($row_counter == 48){
       if ($ads_code){echo "<div class='w3-container w3-center'><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php"; echo "<br>";}
       break;
     } 
   }

 }

}
   
 ?>

</div>

<!--Add-->
<div id="Add" style="display:none; background-Color:#D8D8D8;border: 0px; text-align:left; position:absolute; left:0;top:0;width:100%">

<?php

if ($type === "class"){echo '<div style="background-Color:white;padding:10px;width:100%"><br><a href="#" onclick="closeall()"><font color="black"><big><b>My Online Classifieds</b></big></font></a><br><br></div>';}
                  else{echo '<div style="background-Color:white;padding:10px;width:100%"><br><a href="#" onclick="closeall()"><font color="black"><big><b>Submit Press Release</b></big></font></a><br><br></div>';}

?>

<div class="w3-lightgray">

<form enctype="multipart/form-data" method="post" onSubmit="return checkrequired(this)" action="sky-Sign_Up.php?mode=classified">
<center>

  <table width="100%" class="txtinput" style="text-align:left;color:black"><tr><td>

  Title of Ad:</td><td>
  
  <?php

  if ($type === "class"){echo '<INPUT class="txtinput" class="txtinput" name="requiredAd_Title" id="requiredAd_Title" size="50" maxlength="25" title="25 Characters Max"></td></tr><tr><td>';}
                   else{echo '<INPUT class="txtinput" class="txtinput" name="requiredAd_Title" id="requiredAd_Title" size="50" maxlength="50" title="50 Characters Max"></td></tr><tr><td>';}

  ?>
  
  Image URL:</td><td>
  <INPUT class="txtinput" class="txtinput" name="mypic" id="mypic" size="50" value="(Optional)" onfocus="this.value=''" title="Please Include: http://, (jpg only)" value="http://" maxlength="100"></td></tr><tr><td>
  
  Website URL:</td><td>
  <INPUT class="txtinput" class="txtinput" name="requiredWebsite_URL" id="requiredWebsite_URL" value="http://" title="Website Or Social Profile Page." size="50" maxlength="100"></td></tr><tr><td>
  
  Phone Number:</td><td>
  <INPUT class="txtinput" class="txtinput" name="phone" id="phone" value="(Optional)" onfocus="this.value=''" title="Must provide a phone number or website." size="50" maxlength="30"></tr><tr><td>

  Country:</td><td>
    <select id="country" name="country">
       <option value=""></option>
       <option value="Afganistan">Afghanistan</option>
       <option value="Albania">Albania</option>
       <option value="Algeria">Algeria</option>
       <option value="American Samoa">American Samoa</option>
       <option value="Andorra">Andorra</option>
       <option value="Angola">Angola</option>
       <option value="Anguilla">Anguilla</option>
       <option value="Antigua & Barbuda">Antigua & Barbuda</option>
       <option value="Argentina">Argentina</option>
       <option value="Armenia">Armenia</option>
       <option value="Aruba">Aruba</option>
       <option value="Australia">Australia</option>
       <option value="Austria">Austria</option>
       <option value="Azerbaijan">Azerbaijan</option>
       <option value="Bahamas">Bahamas</option>
       <option value="Bahrain">Bahrain</option>
       <option value="Bangladesh">Bangladesh</option>
       <option value="Barbados">Barbados</option>
       <option value="Belarus">Belarus</option>
       <option value="Belgium">Belgium</option>
       <option value="Belize">Belize</option>
       <option value="Benin">Benin</option>
       <option value="Bermuda">Bermuda</option>
       <option value="Bhutan">Bhutan</option>
       <option value="Bolivia">Bolivia</option>
       <option value="Bonaire">Bonaire</option>
       <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
       <option value="Botswana">Botswana</option>
       <option value="Brazil">Brazil</option>
       <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
       <option value="Brunei">Brunei</option>
       <option value="Bulgaria">Bulgaria</option>
       <option value="Burkina Faso">Burkina Faso</option>
       <option value="Burundi">Burundi</option>
       <option value="Cambodia">Cambodia</option>
       <option value="Cameroon">Cameroon</option>
       <option value="Canada">Canada</option>
       <option value="Canary Islands">Canary Islands</option>
       <option value="Cape Verde">Cape Verde</option>
       <option value="Cayman Islands">Cayman Islands</option>
       <option value="Central African Republic">Central African Republic</option>
       <option value="Chad">Chad</option>
       <option value="Channel Islands">Channel Islands</option>
       <option value="Chile">Chile</option>
       <option value="China">China</option>
       <option value="Christmas Island">Christmas Island</option>
       <option value="Cocos Island">Cocos Island</option>
       <option value="Colombia">Colombia</option>
       <option value="Comoros">Comoros</option>
       <option value="Congo">Congo</option>
       <option value="Cook Islands">Cook Islands</option>
       <option value="Costa Rica">Costa Rica</option>
       <option value="Cote DIvoire">Cote DIvoire</option>
       <option value="Croatia">Croatia</option>
       <option value="Cuba">Cuba</option>
       <option value="Curaco">Curacao</option>
       <option value="Cyprus">Cyprus</option>
       <option value="Czech Republic">Czech Republic</option>
       <option value="Denmark">Denmark</option>
       <option value="Djibouti">Djibouti</option>
       <option value="Dominica">Dominica</option>
       <option value="Dominican Republic">Dominican Republic</option>
       <option value="East Timor">East Timor</option>
       <option value="Ecuador">Ecuador</option>
       <option value="Egypt">Egypt</option>
       <option value="El Salvador">El Salvador</option>
       <option value="Equatorial Guinea">Equatorial Guinea</option>
       <option value="Eritrea">Eritrea</option>
       <option value="Estonia">Estonia</option>
       <option value="Ethiopia">Ethiopia</option>
       <option value="Falkland Islands">Falkland Islands</option>
       <option value="Faroe Islands">Faroe Islands</option>
       <option value="Fiji">Fiji</option>
       <option value="Finland">Finland</option>
       <option value="France">France</option>
       <option value="French Guiana">French Guiana</option>
       <option value="French Polynesia">French Polynesia</option>
       <option value="French Southern Ter">French Southern Ter</option>
       <option value="Gabon">Gabon</option>
       <option value="Gambia">Gambia</option>
       <option value="Georgia">Georgia</option>
       <option value="Germany">Germany</option>
       <option value="Ghana">Ghana</option>
       <option value="Gibraltar">Gibraltar</option>
       <option value="Great Britain">Great Britain</option>
       <option value="Greece">Greece</option>
       <option value="Greenland">Greenland</option>
       <option value="Grenada">Grenada</option>
       <option value="Guadeloupe">Guadeloupe</option>
       <option value="Guam">Guam</option>
       <option value="Guatemala">Guatemala</option>
       <option value="Guinea">Guinea</option>
       <option value="Guyana">Guyana</option>
       <option value="Haiti">Haiti</option>
       <option value="Hawaii">Hawaii</option>
       <option value="Honduras">Honduras</option>
       <option value="Hong Kong">Hong Kong</option>
       <option value="Hungary">Hungary</option>
       <option value="Iceland">Iceland</option>
       <option value="Indonesia">Indonesia</option>
       <option value="India">India</option>
       <option value="Iran">Iran</option>
       <option value="Iraq">Iraq</option>
       <option value="Ireland">Ireland</option>
       <option value="Isle of Man">Isle of Man</option>
       <option value="Israel">Israel</option>
       <option value="Italy">Italy</option>
       <option value="Jamaica">Jamaica</option>
       <option value="Japan">Japan</option>
       <option value="Jordan">Jordan</option>
       <option value="Kazakhstan">Kazakhstan</option>
       <option value="Kenya">Kenya</option>
       <option value="Kiribati">Kiribati</option>
       <option value="Korea North">Korea North</option>
       <option value="Korea Sout">Korea South</option>
       <option value="Kuwait">Kuwait</option>
       <option value="Kyrgyzstan">Kyrgyzstan</option>
       <option value="Laos">Laos</option>
       <option value="Latvia">Latvia</option>
       <option value="Lebanon">Lebanon</option>
       <option value="Lesotho">Lesotho</option>
       <option value="Liberia">Liberia</option>
       <option value="Libya">Libya</option>
       <option value="Liechtenstein">Liechtenstein</option>
       <option value="Lithuania">Lithuania</option>
       <option value="Luxembourg">Luxembourg</option>
       <option value="Macau">Macau</option>
       <option value="Macedonia">Macedonia</option>
       <option value="Madagascar">Madagascar</option>
       <option value="Malaysia">Malaysia</option>
       <option value="Malawi">Malawi</option>
       <option value="Maldives">Maldives</option>
       <option value="Mali">Mali</option>
       <option value="Malta">Malta</option>
       <option value="Marshall Islands">Marshall Islands</option>
       <option value="Martinique">Martinique</option>
       <option value="Mauritania">Mauritania</option>
       <option value="Mauritius">Mauritius</option>
       <option value="Mayotte">Mayotte</option>
       <option value="Mexico">Mexico</option>
       <option value="Midway Islands">Midway Islands</option>
       <option value="Moldova">Moldova</option>
       <option value="Monaco">Monaco</option>
       <option value="Mongolia">Mongolia</option>
       <option value="Montserrat">Montserrat</option>
       <option value="Morocco">Morocco</option>
       <option value="Mozambique">Mozambique</option>
       <option value="Myanmar">Myanmar</option>
       <option value="Nambia">Nambia</option>
       <option value="Nauru">Nauru</option>
       <option value="Nepal">Nepal</option>
       <option value="Netherland Antilles">Netherland Antilles</option>
       <option value="Netherlands">Netherlands (Holland, Europe)</option>
       <option value="Nevis">Nevis</option>
       <option value="New Caledonia">New Caledonia</option>
       <option value="New Zealand">New Zealand</option>
       <option value="Nicaragua">Nicaragua</option>
       <option value="Niger">Niger</option>
       <option value="Nigeria">Nigeria</option>
       <option value="Niue">Niue</option>
       <option value="Norfolk Island">Norfolk Island</option>
       <option value="Norway">Norway</option>
       <option value="Oman">Oman</option>
       <option value="Pakistan">Pakistan</option>
       <option value="Palau Island">Palau Island</option>
       <option value="Palestine">Palestine</option>
       <option value="Panama">Panama</option>
       <option value="Papua New Guinea">Papua New Guinea</option>
       <option value="Paraguay">Paraguay</option>
       <option value="Peru">Peru</option>
       <option value="Phillipines">Philippines</option>
       <option value="Pitcairn Island">Pitcairn Island</option>
       <option value="Poland">Poland</option>
       <option value="Portugal">Portugal</option>
       <option value="Puerto Rico">Puerto Rico</option>
       <option value="Qatar">Qatar</option>
       <option value="Republic of Montenegro">Republic of Montenegro</option>
       <option value="Republic of Serbia">Republic of Serbia</option>
       <option value="Reunion">Reunion</option>
       <option value="Romania">Romania</option>
       <option value="Russia">Russia</option>
       <option value="Rwanda">Rwanda</option>
       <option value="St Barthelemy">St Barthelemy</option>
       <option value="St Eustatius">St Eustatius</option>
       <option value="St Helena">St Helena</option>
       <option value="St Kitts-Nevis">St Kitts-Nevis</option>
       <option value="St Lucia">St Lucia</option>
       <option value="St Maarten">St Maarten</option>
       <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
       <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
       <option value="Saipan">Saipan</option>
       <option value="Samoa">Samoa</option>
       <option value="Samoa American">Samoa American</option>
       <option value="San Marino">San Marino</option>
       <option value="Sao Tome & Principe">Sao Tome & Principe</option>
       <option value="Saudi Arabia">Saudi Arabia</option>
       <option value="Senegal">Senegal</option>
       <option value="Seychelles">Seychelles</option>
       <option value="Sierra Leone">Sierra Leone</option>
       <option value="Singapore">Singapore</option>
       <option value="Slovakia">Slovakia</option>
       <option value="Slovenia">Slovenia</option>
       <option value="Solomon Islands">Solomon Islands</option>
       <option value="Somalia">Somalia</option>
       <option value="South Africa">South Africa</option>
       <option value="Spain">Spain</option>
       <option value="Sri Lanka">Sri Lanka</option>
       <option value="Sudan">Sudan</option>
       <option value="Suriname">Suriname</option>
       <option value="Swaziland">Swaziland</option>
       <option value="Sweden">Sweden</option>
       <option value="Switzerland">Switzerland</option>
       <option value="Syria">Syria</option>
       <option value="Tahiti">Tahiti</option>
       <option value="Taiwan">Taiwan</option>
       <option value="Tajikistan">Tajikistan</option>
       <option value="Tanzania">Tanzania</option>
       <option value="Thailand">Thailand</option>
       <option value="Togo">Togo</option>
       <option value="Tokelau">Tokelau</option>
       <option value="Tonga">Tonga</option>
       <option value="Trinidad & Tobago">Trinidad & Tobago</option>
       <option value="Tunisia">Tunisia</option>
       <option value="Turkey">Turkey</option>
       <option value="Turkmenistan">Turkmenistan</option>
       <option value="Turks & Caicos Is">Turks & Caicos Is</option>
       <option value="Tuvalu">Tuvalu</option>
       <option value="Uganda">Uganda</option>
       <option value="United Kingdom">United Kingdom</option>
       <option value="Ukraine">Ukraine</option>
       <option value="United Arab Erimates">United Arab Emirates</option>
       <option value="USA">United States of America</option>
       <option value="Uraguay">Uruguay</option>
       <option value="Uzbekistan">Uzbekistan</option>
       <option value="Vanuatu">Vanuatu</option>
       <option value="Vatican City State">Vatican City State</option>
       <option value="Venezuela">Venezuela</option>
       <option value="Vietnam">Vietnam</option>
       <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
       <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
       <option value="Wake Island">Wake Island</option>
       <option value="Wallis & Futana Is">Wallis & Futana Is</option>
       <option value="Yemen">Yemen</option>
       <option value="Zaire">Zaire</option>
       <option value="Zambia">Zambia</option>
       <option value="Zimbabwe">Zimbabwe</option>
    </select></tr><tr><td>

    State:</td><td>
    <select id="state" name="state">
	<option value=""></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AR">AR</option>	
	<option value="AZ">AZ</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DC">DC</option>
	<option value="DE">DE</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="IA">IA</option>	
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="MA">MA</option>
	<option value="MD">MD</option>
	<option value="ME">ME</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MO">MO</option>	
	<option value="MS">MS</option>
	<option value="MT">MT</option>
	<option value="NC">NC</option>	
	<option value="NE">NE</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>			
	<option value="NV">NV</option>
	<option value="NY">NY</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WI">WI</option>	
	<option value="WV">WV</option>
	<option value="WY">WY</option>
	<option value="AS">AS</option>
	<option value="GU">GU</option>
	<option value="MP">MP</option>
	<option value="PR">PR</option>
	<option value="UM">UM</option>
	<option value="VI">VI</option>
	<option value="AA">AA</option>
	<option value="AP">AP</option>
	<option value="AE">AE</option>	
</select></tr><tr><td>		

  Your Password:</td><td>
  <INPUT class="txtinput" class="txtinput" name="password" id="password" value="" title="Copy and saved. Is use to edit your post..." readonly="readonly" size="20"></tr><tr><td>

  </td><td style="display:none;"><INPUT class="txtinput" class="txtinput" name="category" id="category" size="50" maxlength="20"><INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20"></tr><tr><td>

  Ad Content:</td><td>

  <?php

  if ($type === "class"){echo '<textarea class="txtinput" rows="4" cols="50" maxlength="100" title="100 Characters Max" id="requiredAd_Content" name="requiredAd_Content"></textarea></tr><tr><td>';}
                    else{echo '<textarea class="txtinput" rows="4" cols="50" maxlength="1750" title="1750 Characters Max, needs atlest 875 charaters..."  id="requiredAd_Content" name="requiredAd_Content"></textarea></tr><tr><td>';}

  ?>

  <SELECT name="Order_Details">
  <?php if ($type === "class"){echo '<OPTION SELECTED>classified';}else{echo '<OPTION SELECTED>press-release';} ?>
  </SELECT></td></tr>
  </table><br><br>

  <input class="button" type="submit" value="Submit Post"/>&nbsp;&nbsp;<input class="button" type="button" onclick="location.href='<?php if ($type === "class"){echo "sky-classified_edit.php";}else{echo "press-release_edit.php";} ?>';" value="Edit Post" />&nbsp;&nbsp;<input class="button" type="button" onclick="location.href='sky-classified_delete.php';" value="Delete Post" />&nbsp;&nbsp;<INPUT class="button" type="button" value="Cancel" onclick="document.getElementById('Add').style.display = 'none';"/>
  <br><br><font color="black">Please copy and save your password, to edit your ad in the future. 

  </form>

  <script src="sky-admin/ajax/Honeypot_Spam.js"></script></font>

</center>
</div>
</div>

</body>
</html>

<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function checkrequired(which) {

Honeypot();

//Cyberspace1
var Ad_Title = document.getElementById("requiredAd_Title").value;
if (Ad_Title.indexOf(" ") == -1){document.getElementById("requiredAd_Content").value+="<";}

//Cyberspace2
var Website_URL = document.getElementById("requiredWebsite_URL").value;
if(Website_URL.length > 7){if (Website_URL.indexOf(".") == -1){document.getElementById("requiredAd_Content").value+="<";}}

//Cyberspace3
var my_pic = document.getElementById("mypic").value;
  if(my_pic.length > 10){
    var lastfour = my_pic.substr(my_pic.length - 4);
    if (lastfour.indexOf(".jpg") == -1){document.getElementById("requiredAd_Content").value+="<";}
  }

//Cyberspace4
var content = document.getElementById("requiredAd_Content").value;
if (content.indexOf("http") != -1){document.getElementById("requiredAd_Content").value+="<";}
if (content.indexOf("www") != -1){document.getElementById("requiredAd_Content").value+="<";}
if (content.indexOf("/") != -1){document.getElementById("requiredAd_Content").value+="<";}

//Cyberspace5
var Phone = document.getElementById("phone").value;
if ((Website_URL.length < 11) && (Phone.length < 11)){document.getElementById("requiredAd_Content").value+="<";}
if (Phone.indexOf('.') > -1){document.getElementById("requiredAd_Content").value+="<";}

var pass=true;
if (document.images) {
for (i=0;i<which.length;i++) {
var tempobj=which.elements[i];
if (tempobj.name.substring(0,8)=="required") {
if (((tempobj.type=="text"||tempobj.type=="textarea")&&
tempobj.value=='')||(tempobj.type.toString().charAt(0)=="s"&&
tempobj.selectedIndex==0)) {
pass=false;
break;
         }
      }
   }
}
if (!pass) {
shortFieldName=tempobj.name.substring(8,30).toUpperCase();
alert("Please make sure the "+shortFieldName+" field was properly completed.");
return false;
}
else
return true;
}
//  End -->

function imposeMaxLength(Event, Object, MaxLen)
{
    return (Object.value.length <= MaxLen)||(Event.keyCode == 8 ||Event.keyCode==46||(Event.keyCode>=35&&Event.keyCode<=40))
}

//Get Month
var d = new Date();
var m = d.getMonth();

//js password generator
function generatepass(plength){
  var temp=''; var keys="abcdefghijklmnopqrstuvwxyz123456789";
    for (i=0;i<plength;i++){
      temp+=keys.charAt(Math.floor(Math.random()*keys.length));
    }
  temp+=m;
  document.getElementById("password").value=temp;
}generatepass(9);


function next(){top.location.href='sky-classified.php?i=<?php echo $i?>&type=<?php echo $type?>&ps=<?php echo $ps?>';}

//Open Submit Form
if ("<?php echo $mode ?>" === "submit"){document.getElementById('Add').style.display = 'block';}

</script>

<!-- Footer -->
<footer class="w3-container <?php echo 'w3-'.$footercolor.'' ?> w3-padding-32 w3-margin-top" style="bottom: 0;">
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

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>