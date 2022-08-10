<?php session_start(); ?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">

<?php

  //Mode
  $m = $_REQUEST['m']; if(!$m){$m = "Members Lists";}

  //login
  include "sky-password.php"; include "ismobile.php";
  if ($_SESSION['password'] !== $your_password){echo "Page Not Foundd".$_SESSION['password'] ; exit;}

   //Delete Or Keep Pending Members
   if (isset($_GET['keep'])){
     $path = 'myfiles/'.$_GET['dir'].'/';
     $rename = str_replace("hold-", "", $_GET['keep']);
     rename($path.$_GET['keep'],$path.$rename);
   }
   if (isset($_GET['delete'])){
     $path = 'myfiles/'.$_GET['dir'].'/';
     unlink($path.$_GET['delete']); 
   }

  //Save Settings
  if ((isset($_POST['vsfee'])) || (isset($_POST['vmfee']))){
    $f=fopen('myfiles/settings-ac-members.php','w');

    fwrite($f,'<?php'."\r\n");
    fwrite($f,'$vsfee="'.str_replace('"', "'", $_POST['vsfee']).'";'."\r\n");
    fwrite($f,'$vmfee="'.str_replace('"', "'", $_POST['vmfee']).'";'."\r\n");
    fwrite($f,'?>');

    fclose($f);

    echo "<script>\n"; 
    echo "alert(\"Settings Are Saved...\");\n"; 
    echo "</script>\n";
  }

  if (file_exists("myfiles/settings-ac-members.php")){include "myfiles/settings-ac-members.php";}

  echo '<div class="w3-dropdown-click">';
  echo '<button onclick="myFunction()" class="w3-button" style="font-size: 30px;">&#9776; '.$m.'</button>';
  echo '<div id="Demo" class="w3-dropdown-content w3-bar-block w3-animate-zoom w3-border" style="width:230px;">';
  echo '<a href="sky-admin/index.php" class="w3-bar-item w3-button" style="font-size: 20px;"><i class="fa fa-edit" aria-hidden="true"></i> Dashboard</a>';
  echo '<a href="sky-account_members.php?m=Members Lists&link='.$_GET['link'].'&dir='.$_GET['dir'].'" class="w3-bar-item w3-button" style="font-size: 20px;"><i class="fa fa-list" aria-hidden="true"></i> Members Lists</a>';
  echo '<a href="#" onclick="document.getElementById(\'Business\').style.display=\'block\'" class="w3-bar-item w3-button" style="font-size: 20px;"><i class="fa fa-briefcase" aria-hidden="true"></i> Membership Fees</a>';
  echo '<a href="sky-account_members.php?m=Pending&link='.$_GET['link'].'&dir='.$_GET['dir'].'" class="w3-bar-item w3-button" style="font-size: 20px;"><i class="fa fa-home" aria-hidden="true"></i> Pending Members</a>';
  echo "<a href=\"index.php?logout=out\" class=\"w3-bar-item w3-button\" style=\"font-size: 20px;\" onclick = \"if (! confirm('Are you sure?')) { return false; }\"><i class='fa fa-sign-out'></i>&nbsp;Logout</a>";
  echo '</div>';
  echo '</div><big style="display:inline"></big>';

  if ($handle = opendir('myfiles/'.$_GET['dir'])) {

   echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>';

   if($m == "Members Lists"){

    while (false !== ($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {

        if ((strpos(strtolower($entry), strtolower(".php")) !== false) && (strpos(strtolower($entry), strtolower("hold-")) === false)){

          //Layout
          include 'myfiles/'.$_GET['dir'].'/'.$entry;

            if ((strpos(strtolower($entry), strtolower(".php")) !== false) && (strpos(strtolower($entry), strtolower("_mrank")) === false)){$members++;

              //Get the first letter of each word in a string
              $words = explode(" ", $name); $acronym = "";
              foreach ($words as $w) {$acronym .= $w[0];}

 	      echo '<div class="w3-row">';
 	      echo '<div class="w3-container w3-col w3-center" style="width:100px"><p><button class="w3-button w3-circle w3-light-gray"><span style="color:gray"><b>'.strtoupper($acronym).'</b></span></button></p></div>';
 	      echo '<div class="w3-container w3-rest"><p><a href="sky-account.php?link='.$_GET['link'].'&dir='.$_GET['dir'].'&requiredemail='.$email.'&requiredpw1='.$pw1.'&open=my_account&profile=on" target="blank">'.$name.'</a>&nbsp;&nbsp;&nbsp;<a href="mailto:'.$email.'" style="cursor: pointer;" class="fa fa-envelope-square"></i></a><br>';if(strlen($phone) == 10){echo '<a href="tel:+1'.$phone.'">'.$phone.'</a>';}else{echo '<a href="tel:+1'.$phone.'">'.$phone.'</a>';}echo '&nbsp;&nbsp;&nbsp;<a href="sms:+1'.$phone.'"><i class="fa fa-comment"></i></a></p></div>';
              echo '</div>';

 	      echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>';

            }

        }

      }

    }

    closedir($handle); 

    if($members > 0){echo '<div class="w3-container" style="height:100px"><b><big>'.$members.' Total Members</big></b><br><br></div>';}else{echo '<div class="w3-container" style="height:100px"><b><big>No Members Yet</b></big><br><br></div>';}

   }

  }

   if($m == "Pending"){

    while (false !== ($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {

        if ((strpos(strtolower($entry), strtolower(".php")) !== false) && (strpos(strtolower($entry), strtolower("hold-")) !== false)){$members++;

              //Layout
              include 'myfiles/'.$_GET['dir'].'/'.$entry;

              //Get the first letter of each word in a string
              $words = explode(" ", $name); $acronym = "";
              foreach ($words as $w) {$acronym .= $w[0];}

 	      echo '<div class="w3-row">';
 	      echo '<div class="w3-container w3-col w3-center" style="width:100px"><p><button onclick="location.href=\'../myfiles/'.$_GET['dir'].'/'.str_replace(".php", ".jpg", $entry).'\';" title="View Photo" class="w3-button w3-circle w3-light-gray"><span style="color:gray"><b>'.strtoupper($acronym).'</b></span></button></p></div>';
 	      echo '<div class="w3-container w3-rest"><p><a href="sky-account.php?link='.$_GET['link'].'&dir='.$_GET['dir'].'&requiredemail='.$email.'&requiredpw1='.$pw1.'&profile=ON" target="blank">'.$name.'</a><br>';if(strlen($phone) == 10){echo '<a href="tel:+1'.$phone.'">'.'('.substr($phone, 0, 3).') '.substr($phone, 3, 3).'-'.substr($phone,6).'</a>';}else{echo '<a href="tel:+'.$phone.'">'.'('.substr($phone, 1, 3).') '.substr($phone, 4, 3).'-'.substr($phone,7).'</a>';}echo '&nbsp;&nbsp;&nbsp;<a href="sms:+'.$phone.'"><i class="fa fa-comment"></i></a><br>';

              echo '<a href="sky-account_members.php?m=Pending&keep='.$entry.'&link='.$_GET['link'].'&dir='.$_GET['dir'].'" onclick = \'if (! confirm("Are you sure?")) { return false; }\' style=\'cursor: pointer;\'>Approve</a>&nbsp;|&nbsp;<a href="sky-account_members.php?m=Pending&delete='.$entry.'&link='.$_GET['link'].'&dir='.$_GET['dir'].'" onclick = \'if (! confirm("Are you sure?")) { return false; }\' style=\'cursor: pointer;\'>Delete</a>';
              echo '</p></div></div>';

 	      echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>';

        }

      }

    }

    closedir($handle); 

    if($members > 0){echo '<div class="w3-container" style="height:100px"><b><big>'.$members.' '.$m.'</big></b><br><br></div>';}else{echo '<div class="w3-container" style="height:100px"><b><big>No Pending Members Yet</b></big><br><br></div>';}

  }

?>

<!-- Modal -->
<div id='Business' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-light-green w3-display-container"> 
      <span onclick="document.getElementById('Business').style.display='none'" class="w3-button w3-light-green w3-display-topright" style="color:white"><font color="white">X</font></span>
      <h4 style="color:white">Membership Fees</h4>
    </header>
      <div class="w3-container">

<br>
<center>
<form  action="sky-account_members.php?link='<?php echo $_GET['link'] ?>&dir=<?php echo $_GET['dir'] ?>" method="post" enctype="multipart/form-data">

<table>
<tr><td><label>Customer Accounts Monthly Fee</label></td><td>$<input type="text" id="vsfee" name="vsfee" <?php if ($vsfee){echo 'value="'.$vsfee.'"';} ?> maxlength="6" size="3"></td></tr>
<tr><td><label>Business Accounts Monthy Fee</label></td><td>$<input type="text" id="vmfee" name="vmfee" <?php if ($vmfee){echo 'value="'.$vmfee.'"';} ?> maxlength="6" size="3"></td></tr>
</table><br><br>

<button type="submit" class="w3-button w3-light-green" style="color:white"><font color="white">Save & Update</font></button><br><br></form></center>

  </div>
</div>


<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

</style>

<body class="w3-white">


</body>
</html>

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

<style>

html { scroll-behavior: smooth; }

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
}

</style>