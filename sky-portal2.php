<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<?php include "sky-url.php"; ?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<?php 

  if(isset($_GET['logout'])){include "sky-logout.php";}
  if(isset($_GET['color'])){$footercolor = $_GET['color'];}
  echo '<body onload="startTime()" class="w3-'.$pagecolor.'">';

?>

<style>

body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

/* The content */
.overlay-content {
  position: relative;
  top: 46%;
  text-align: center;
  margin-top: 30px;
  margin: auto;
}

/* Style the search field */
.overlay input[type=text] {
  padding: 7px;
  font-size: 17px;
  border: none;
  float: left;
  width: 90%;
  background: white;
}

/* Style the submit button */
.overlay button {
  float: left;
  width: 10%;
  padding: 7px;
  background: <?php echo str_replace('-', '', $pagecolor).';'."\r\n" ?>
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.overlay button:hover {
  background: <?php echo str_replace('-', '', $footercolor).';'."\r\n" ?>
}

@media screen and (max-width: 800px) {
  .mytopbar, .popular_bar, .ads {
    visibility: hidden;
    display: none;
  }
}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

html { scroll-behavior: smooth; }

</style>


<body>

<!-- Modal -->
<div id="join_now" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="goBack()" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Sign Up</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account.php?link=index&dir=portal-members" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>My Name</td>
        <td><input type="text" name="requiredname" placeholder="name" maxlength="25" class="txtinput" size="40"></td> 
        </tr>
       
        <tr>
        <td>My Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" style="text-transform: lowercase;" maxlength="320" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My City</td>
        <td><input type="text" name="requiredcity" placeholder="city" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My State</td>
        <td><input type="text" name="requiredstate" placeholder="state" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My Country</td>
        <td><input type="text" name="requiredcountry" placeholder="country" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>My Zip</td>
        <td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Your Password</td>
        <td><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="10" class="txtinput" size="40"></td> 
        </tr>


        <tr>
        <td>Verify Password</td>
        <td><input type="password" name="requiredpw2" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="10" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Sign Me Up" onclick="document.getElementById('category').value='Captcha@';"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Clear Details"></td>
        </tr>

        </table>
        </center>

        <span style="display:none;">
        <INPUT type="hidden" class="txtinput" class="txtinput" name="category" id="category" size="50" maxlength="20">
        <INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20">
        <INPUT class="txtinput" name="color" id="color" <?php if(isset($_GET['color'])){echo 'value="'.$_GET['color'].'"';}else{echo 'value="'.$footercolor.'"';} ?> readonly="readonly" size="20">
        </span>
	</form>

    </div>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="advertiser" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="goBack()" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Advertise</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account.php?link=sky-portal-login&dir=portal-members" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="40" class="txtinput" size="40"></td> 
        </tr>
       
        <tr>
        <td>Password</td>
        <td><input type="text" name="requiredpw1" placeholder="*******" maxlength="40" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Login"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Clear Details">&nbsp;<INPUT type="button"  onclick="document.getElementById('advertiser').style.display='none'; document.getElementById('forgot_pass').style.display='block'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Forgot Password"/></td>
        </tr>

        </table>
        </center>
	</form>

    </div>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="forgot_pass" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('forgot_pass').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Forgot Password</h4>
    </header>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-forgot.php?link=index&dir=portal-members" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="40" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Send Password"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear Details"></td>
        </tr>

        </table>
        </center>
	</form>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="submiturl" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <span onclick="goBack()" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-topright">X</span>
      <h4>Submit URL</h4>
    </header>

<form id="form_login" enctype="multipart/form-data" method="post" onSubmit="return checkrequired(this)" action="sky-add-url.php">
<center><br>

  <INPUT class="txtinput" name="requiredWebsite_TITLE" placeholder="Website Title" size="50"><br>
  <INPUT class="txtinput" name="requiredWebsite_URL" placeholder="Your URL" value="http://" size="50"><br>
  <input type="submit" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Submit"/>

</center>
</form>

     <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>


<?php 

  echo "<script> document.getElementById('".$_GET['openn']."').style.display='block';</script>";

?>


<!-- Modal -->
<div id="robot_check" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?> w3-display-container"> 
      <h4>Robot Checker</h4>
    </header>
      <div class="w3-container"  onclick="document.getElementById('myCheck').checked = true;document.getElementById('category').value='Captcha@';document.getElementById('robot_check').style.display='none';">
       <script>
document.writeln("<br><br><center><big>Please Check This Box <input type=\"checkbox\" id=\"myCheck\" onclick=\"captcha(); document.getElementById('robot_check').style.display='none';\"></big></center><br><br>");

function captcha(){
  if(document.getElementById("category")){ //Check if element exists 
    document.getElementById("category").value="Captcha@";
  }
}

function Honeypot(){

  var chkStatus1 = document.getElementById("myCheck");
  if (chkStatus1.checked == false){
    alert("ARE YOU A ROBOT?"); 
    window.location="index.php";
    event.preventDefault();
  }

}
       </script>
      </div>
    <br><footer class="<?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>">&nbsp;</footer>
  </div>
</div>


<script>

function goBack(){window.history.back();}

<!-- Original: wsabstract.com -->
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function checkrequired(which) {

Honeypot();

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

document.getElementById('robot_check').style.display='block';

</script>

</body>
</html>

