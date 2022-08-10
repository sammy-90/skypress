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
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );}
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
</style>
<?php echo '<body class="w3-'.$pagecolor.'">' ?>

<div class="w3-container" style="position: absolute;left:0">
  <?php
  if(!isMobile()){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button w3-'.$pagecolor.'"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
  }else{
    echo '<div class="w3-dropdown-click">';
    echo '<button class="w3-button w3-'.$pagecolor.'" onclick="myFunction()"><i class="fa fa-bars w3-large w3-hover-opacity"></i></button>';
  }
  ?>
    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border <?php echo 'w3-'.$pagecolor ?> w3-animate-zoom">
      <?php include "sky-menu.php"; ?>
    </div>
  </div>

<?php
  include "myfiles/settings-menu.php"; 
  echo '<div class="w3-dropdown-hover"></div>';
  if($menut1){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">'.$menut1.'</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$pagecolor.'">';
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
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$pagecolor.'">';
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
    echo '<div class="w3-dropdown-content w3-bar-block w3-border w3-'.$pagecolor.'">';
    if($link22){echo '<a href="'.$link22.'" class="w3-bar-item w3-button">'.$link21.'</a>';}
    if($link24){echo '<a href="'.$link24.'" class="w3-bar-item w3-button">'.$link23.'</a>';}
    if($link26){echo '<a href="'.$link26.'" class="w3-bar-item w3-button">'.$link25.'</a>';}
    if($link28){echo '<a href="'.$link28.'" class="w3-bar-item w3-button">'.$link27.'</a>';}
    if($link30){echo '<a href="'.$link30.'" class="w3-bar-item w3-button">'.$link29.'</a>';}
    echo '</div>';
    echo '</div>';
  }
?>

</div>
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

<?php
 
  if (isset($_GET['page'])) {
    echo '<br><br><div class="w3-row w3-padding w3-border" id="blog">';
    include "sky-engine.php";
    echo '</div><br>';
    if (($type !== "radio") && ($type !== "tv")) {
      echo '<div class="w3-container w3-center">';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>&nbsp;';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
      echo '</div>';
    }
  }
  if (isset($_GET['page'])) {
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
  }else{
    echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
  }

?>
  
<br>
<!-- Header -->
<header class="w3-container w3-center"> 
  <h1>Application for Employment</h1>
  <p class="custom_tc">
    It is our policy to comply with all applicable state and federal laws prohibiting discrimination in employment based on race, age, color, sex, religion, national origin, disability or other protected classifications. Please carefully read and answer all questions. You will not be considered for employment if you fail to completely answer all the questions on this application. All questions must be answered...
  </p>
</header>

<div class="w3-card-4">
<header class="w3-container  w3-<?php echo $footercolor; ?>">
<big class="custom_tc">PERSONAL DATA</big>
</header>
<div class="w3-container w3-<?php echo $lightbox?>">

<form method="post" action="sky-application2.php" enctype="multipart/form-data">
<table class="w3-table">
<tr>
  <th>Name (last, first, middle)</th>
  <th><input type="text" id="name" name="name"  class="txtinput"  maxlength="50" size="50" onkeyup="sync()"></th>
</tr>
<tr>
  <th>Street Address and/or Mailing Addres</th>
  <th><input type="text" id="address" name="address"  class="txtinput"  maxlength="50" size="50"></th>
</tr>
<tr>
  <th>Home Telephone Number</th>
  <th><input type="text" id="h_phone" name="h_phone"  class="txtinput"  maxlength="25" size="50"></th>
</tr>
<tr>
  <th>Work Telephone Number</th>
  <th><input type="text" id="w_phone" name="w_phone"  class="txtinput"  maxlength="25" size="50"></th>
</tr>
<tr>
  <th>Date you can start work</th>
  <th><input type="text" id="start" name="start"  class="txtinput"  maxlength="25" size="50"></th>
</tr>
<tr>
  <th>Salary Desired</th>
  <th><input type="text" id="pay" name="pay"  class="txtinput"  maxlength="25" size="50"></th>
</tr>
<tr>
  <th>Do you have a High School Diploma or GED?</th>
  <th>Yes <input type="checkbox" id="gedy" name="gedy" value="yes">&emsp;&nbsp;No <input type="checkbox" id="gedn" name="gedn" value="no"></th>
</tr>
</table>

</div>
</div>


<div class="w3-card-4">
<header class="w3-container  w3-<?php echo $footercolor; ?>">
<big class="custom_tc">POSITION INFORMATION</big>
</header>
<div class="w3-container w3-<?php echo $lightbox?>">

<table class="w3-table class="w3-table w3-striped"">
<tr>
  <th>Position applying for</th>
  <th><input type="text" id="pos" name="pos"  class="txtinput" maxlength="25" size="50"></th>
</tr>
<tr>
  <th>Hours</th>
  <th>Full Time <input type="checkbox" id="f_time" name="f_time" value="yes">&emsp;&nbsp;Part Time <input type="checkbox" id="p_time" name="p_time" value="yes"></th>
<tr>
  <th>Shifts</th>
  <th>1st <input type="checkbox" id="1st" name="1st" value="yes">&emsp;&nbsp;2nd <input type="checkbox" id="2nd" name="2nd" value="yes">&emsp;&nbsp;3rd <input type="checkbox" id="3rd" name="3rd" value="yes">&emsp;&nbsp;4th <input type="checkbox" id="4th" name="4th" value="yes">&emsp;&nbsp;5th <input type="checkbox" id="5th" name="5th" value="yes"></th>
</tr>
<tr>
  <th>Status</th>
  <th>Regular <input type="checkbox" id="regular" name="regular" value="yes">&emsp;&nbsp;Temporary <input type="checkbox" id="temporary" name="temporary" value="yes"></th>
</tr>
<tr>
  <th>Are you authorized to work in the U.S. on an unrestricted basis?</th>
  <th>Yes <input type="checkbox" id="auty" name="auty" value="yes">&emsp;&nbsp;No <input type="checkbox" id="autn" name="autn" value="no"></th>
</tr>
  <th>Have you ever been convicted of a felony? (Convictions will not necessarily disqualify an applicant for employment.)</th>
  <th>Yes <input type="checkbox" id="fely" name="fely" value="yes">&emsp;&nbsp;No <input type="checkbox" id="feln" name="feln" value="no"></th>
</tr>
  <th>Have you been told the essential functions of the job or have you been viewed a copy of the job description listing the essential functions of the job? </th>
  <th>Yes <input type="checkbox" id="funy" name="funy" value="yes">&emsp;&nbsp;No <input type="checkbox" id="funn" name="funn" value="no"></th>
</tr>
  <th>Can you perform these essential functions of the job with or without reasonable accommodation?</th>
    <th>Yes <input type="checkbox" id="pery" name="pery" value="yes">&emsp;&nbsp;No <input type="checkbox" id="pern" name="pern" value="no"></th>
</tr>
</table>

</div>
</div>
 
<div class="w3-card-4">
<header class="w3-container  w3-<?php echo $footercolor; ?>">
<big class="custom_tc">QUALIFICATIONS</big>
</header>
<div class="w3-container w3-<?php echo $lightbox?>">
  <table class="w3-table">
    <tr>
      <th></th>
      <th>School Name</th>
      <th>Degree</th>
      <th>Address/City/State</th>
    </tr>
    <tr>
      <th>School</th>
      <td><input type="text" id="school_name" name="school_name"  class="txtinput" maxlength="25" ></td>
      <td><input type="text" id="school_degree" name="school_degress"  class="txtinput" maxlength="25" ></td>
      <td><input type="text" id="school_address" name="school_address"  class="txtinput" maxlength="25" ></td>
    </tr>
    <tr>
      <th>Other</th>
      <td><input type="text" id="other_name" name="other_name"  class="txtinput" maxlength="25" ></td>
      <td><input type="text" id="other_degree" name="other_degress"  class="txtinput" maxlength="25" ></td>
      <td><input type="text" id="other_address" name="other_address"  class="txtinput" maxlength="25" ></td>
    </tr>
  </table>
</div>
</div>
 
<div class="w3-card-4">
<header class="w3-container  w3-<?php echo $footercolor; ?>">
<big class="custom_tc">SPECIAL SKILLS</big>
</header>
<div class="w3-container w3-<?php echo $lightbox?>">
  <table class="w3-table">
    <tr>
<td><center><textarea id="skills" name="skills" class="txtinput" cols="100" rows="6" maxlength="200" ></textarea></center></td>
    </tr>
  </table>
</div>
</div>

<div class="w3-card-4">
<header class="w3-container  w3-<?php echo $footercolor; ?>">
<big class="custom_tc">REFERENCES</big>
</header>
<div class="w3-container w3-<?php echo $lightbox?>">
  <table class="w3-table">
    <tr>
      <th>Name</th>
      <th>Address/City/State</th>
      <th>Phone</th>
      <th>Relationship</th>
    </tr>
    <tr>
      <td><input type="text" id="ref1_name" name="ref1_name"  class="txtinput" maxlength="25" ></td>
      <td><input type="text" id="ref1_address" name="ref1_address"  class="txtinput"  maxlength="25" ></td>
      <td><input type="text" id="ref1_phone" name="ref1_phone"  class="txtinput"  maxlength="25" ></td>
      <td><input type="text" id="ref1_rel" name="ref1_rel"  class="txtinput" maxlength="25" ></td>
    </tr>
    <tr>
      <td><input type="text" id="ref2_name" name="ref2_name"  class="txtinput" maxlength="25" ></td>
      <td><input type="text" id="ref2_address" name="ref2_address"  class="txtinput"  maxlength="25" ></td>
      <td><input type="text" id="ref2_phone" name="ref2_phone"  class="txtinput"  maxlength="25" ></td>
      <td><input type="text" id="ref2_rel" name="ref2_rel"  class="txtinput" maxlength="25" ></td>
    </tr>
    <tr>
      <td><input type="text" id="ref3_name" name="ref3_name"  class="txtinput" maxlength="25" ></td>
      <td><input type="text" id="ref3_address" name="ref3_address"  class="txtinput"  maxlength="25" ></td>
      <td><input type="text" id="ref3_phone" name="ref3_phone"  class="txtinput"  maxlength="25" ></td>
      <td><input type="text" id="ref3_rel" name="ref3_rel"  class="txtinput" maxlength="25" ></td>
    </tr>
  </table>
</div>
</div>
 
<div class="w3-card-4">
<header class="w3-container  w3-<?php echo $footercolor; ?>">
<big class="custom_tc">WORK HISTORY</big>
</header>
<div class="w3-<?php echo $lightbox?>">
  <table class="w3-table w3-border">
    <tr colspan="4"><td><b>Job Title #1</b></td></tr>
    <tr>
      <td>Company Name</td>
      <td><input type="text" id="cname1" name="cname1" maxlength="25" class="txtinput"></td>
      <td>Address/City/State</td>
      <td><input type="text" id="caddress1" name="caddress1" maxlength="25" class="txtinput"></td>
    </tr>
    <tr>
      <td>Start Date</td>
      <td><input type="text" id="cstart1" name="cstart1" maxlength="25" class="txtinput"></td>
      <td>End Date</td>
      <td><input type="text" id="cend1" name="cend1" maxlength="25" class="txtinput"></td>
    </tr>
    <tr>
      <td>Supervisor's Name</td>
      <td><input type="text" id="csuper1" name="csuper1" maxlength="25" class="txtinput"></td>
      <td>Phone Number</td>
      <td><input type="text" id="cnumber1" name="cnumber1" maxlength="25" class="txtinput"></td>
    </tr>
    <tr>
      <td>Starting Salary</td>
      <td><input type="text" id="cpay1" name="cpay1" maxlength="25" class="txtinput"></td>
      <td>Ending Salary</td>
      <td><input type="text" id="cepay1" name="cepay1" maxlength="25" class="txtinput"></td>
    </tr>
    <tr>
      <td>Reason for Leaving</td>
      <td><input type="text" id="cleave1" name="cleave1" maxlength="25" class="txtinput"></td>
      <td>May we contact your present employer?</td>
      <td>Yes <input type="checkbox" id="contact1y" name="contact1y" value="yes">&emsp;&nbsp;No <input type="checkbox" id="contact1n" name="contact1n" value="no"></td>
    </tr>
    <tr>
      <td>Duties:</td>
      <td colspan="4"><input type="text" id="cduties1" name="cduties1"  class="txtinput"  maxlength="75" size="100%"></td>
    </tr>
  </table>
  <table class="w3-table w3-border">
    <tr colspan="4"><td><b>Job Title #2</b></td></tr>
    <tr>
      <td>Company Name</td>
      <td><input type="text" id="cname2" name="cname2" maxlength="25" class="txtinput"></td>
      <td>Address/City/State</td>
      <td><input type="text" id="caddress2" name="caddress2" maxlength="25" class="txtinput"></td>
    </tr>
    <tr>
      <td>Start Date</td>
      <td><input type="text" id="cstart2" name="cstart2" maxlength="25" class="txtinput"></td>
      <td>End Date</td>
      <td><input type="text" id="cend2" name="cend2" maxlength="25" class="txtinput"></td>
    </tr>
    <tr>
      <td>Supervisor's Name</td>
      <td><input type="text" id="csuper2" name="csuper2" maxlength="25" class="txtinput"></td>
      <td>Phone Number</td>
      <td><input type="text" id="cnumber2" name="cnumber2" maxlength="25" class="txtinput"></td>
    </tr>
    <tr>
      <td>Starting Salary</td>
      <td><input type="text" id="cpay2" name="cpay2" maxlength="25" class="txtinput"></td>
      <td>Ending Salary</td>
      <td><input type="text" id="cepay2" name="cepay2" maxlength="25" class="txtinput"></td>
    </tr>
    <tr>
      <td>Reason for Leaving</td>
      <td><input type="text" id="cleave2" name="cleave2" maxlength="25" class="txtinput"></td>
      <td>May we contact your present employer?</td>
      <td>Yes <input type="checkbox" id="contact2y" name="contact2y" value="yes">&emsp;&nbsp;No <input type="checkbox" id="contact2n" name="contact2n" value="no"></td>
    </tr>
    <tr>
      <td>Duties:</td>
      <td colspan="4"><input type="text" id="cduties2" name="cduties2"  class="txtinput"  maxlength="75" size="100%"></td>
    </tr>
  </table>
  

<div class="w3-card-4">
<header class="w3-container  w3-<?php echo $footercolor; ?>">
<big class="custom_tc">Applicant Signature</big>
</header>
<div class="w3-container">
  <table class="w3-table">
    <tr>
<td colspan="4">
<center>
I certify that the facts set forth in this Application for Employment are true and complete to the best of my knowledge. I understand that if I am employed, false statements, omissions or misrepresentations may result in my dismissal. I authorize the Employer to make an investigation of any of the facts set forth in this application and release the Employer from any liability.  The employer may contact any listed references on this application.I acknowledge and understand that the company is an "at will" employer.  Therefore, any employee (regular, temporary, or other type of category employee) may resign at any time, just as the employer may terminate the employment relationship with any employee at any time, with or without cause, with or without notice to the other party.
</center>
</td>
    <tr>
      <td>Applicant Signature</td>
      <td><input type="text" id="complete_name" name="complete_name"  class="txtinput"></td>
      <td>Date</td>
      <td><input type="text" id="complete_date" name="complete_date"  class="txtinput" readonly="readonly" value="<?php echo date("m-d-Y") ?>"></td>
    </tr>
    <tr>
      <td colspan="4">
        <input type="submit" value="Submit Application"/>
      </td>
    </tr>
    </tr>
  </table>
 </form>
</div>
</div>


</div>
</div>

<?php if ($ads_code){echo "<div class='w3-container w3-center'><br><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php";} ?>
 
<br>

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

<script>
function sync()
{
  var n1 = document.getElementById('name');
  var n2 = document.getElementById('complete_name');
  n2.value = n1.value;
}
</script>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>
<?php if($progressbar !== "none"){include "sky-admin/progress-bar.php";} ?>