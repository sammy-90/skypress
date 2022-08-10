<?php session_start(); ?>

<!DOCTYPE html>
<!-- downgrades -->

<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<?php if (file_exists("myfiles/settings-delivery.php")){include "myfiles/settings-delivery.php";}else{echo "Please 'Publish' Your Delivery Services... Admin > Application Settings > Delivery Business > Save & Publish"; exit; } 
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

@media only screen and (max-width: 800px) {
  .txtinput2{width:90%;}
  .txtinput3{width:50%;}
}

</style>

<?php

//Signup 
if (strlen($_REQUEST['requiredpw2']) > 3){

  //Get Data
  $Category = $_REQUEST['category'];
  $name = $_REQUEST['requiredname'];
  $email = strtolower($_REQUEST['requiredemail']);
  $address = $_REQUEST['required_address'];
  $city = $_REQUEST['requiredcity'];
  $state = $_REQUEST['requiredstate'];
  $country = $_REQUEST['requiredcountry'];
  $phone = $_REQUEST['requiredphone'];
  $alerts = $_REQUEST['alerts'];
  $zip = $_REQUEST['requiredzip'];
  $pw1 = $_REQUEST['requiredpw1'];
  $pw2 = $_REQUEST['requiredpw2'];
  $ip = $_REQUEST['ip'];

  //Bot Blocker 0 - 1
  if($Category != "Captcha@"){echo $Category."Bot Blocker 0"; exit;} 
  if(!$name){echo "Please Enter Your 'Name' In Signup Form"; exit;}
  if(!$email){echo "Please Enter Your 'Email' address In Signup Form"; exit;}
  if(!$address){echo "Please Enter Your 'Address' In Signup Form"; exit;}
  if(!$city){echo "Please Enter Your 'City' In Signup Form"; exit;}
  if(!$state){echo "Please Enter Your 'State' In Signup Form"; exit;}
  if(!$country){echo "Please Enter Your 'Country' In Signup Form"; exit;}
  if(!$phone){echo "Please Enter Your 'Phone' In Signup Form"; exit;}
  if(!$zip){echo "Please Enter Your 'Zip Code' In Signup Form"; exit;}
  if(!$pw1){echo "Please Enter Your 'Passwords' In Signup Form"; exit;}
  if(!$pw2){echo "Please Enter Your 'Passwords' In Signup Form"; exit;}

  //Bot Blocker 3
  if (strlen($address)>2){echo " - ";}else{echo "Incorrect Input address"; exit;}
  if (strlen($city)>2){echo " - ";}else{echo "Incorrect Input City"; exit;}
  if (strlen($state)>1){echo " - ";}else{echo "Incorrect Input State"; exit;}
  if (strlen($country)>1){echo " - ";}else{echo "Incorrect Input Country"; exit;}
  if (strlen($zip)>4){echo " - ";}else{echo "Incorrect Input Zip"; exit;}
  if (strlen($phone)>9){echo " - ";}else{echo "Incorrect Input Phone#"; exit;}

  //ip check
  if(!$ip){echo "No Ip"; exit;}
  if ($ip != $_SERVER['REMOTE_ADDR']){echo "Ip Changed"; exit;}

  //Bot Blocker 2
  if (strpos(strtolower($email), strtolower("@")) === false){echo "Bot Blocker 2"; exit;}

  //verify password
  if($pw1 != $pw2){echo "Passwords do not match"; exit;}

  //verify password
  if(strlen($pw1) < 8){echo "Password Must be at least 8 characters long..."; exit;}

  //Create Account
  $account_name = explode("@", $email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);

  //Check if file exist
  if (file_exists('myfiles/delivery-members/'.$myinfo.'.php')){echo "Username already exist"; exit;}

  //Put New Vendor & Driver Accounts On Hold  
  if(strlen($_REQUEST['usignup4']) > 5){$f=fopen('myfiles/delivery-members/hold-'.$myinfo.'.txt','w');}else{$f=fopen('myfiles/delivery-members/'.$myinfo.'.php','w');}

  fwrite($f,'<?php'."\r\n");

  //account details
  fwrite($f,'$name="'.str_replace('"', "'", $name).'";'."\r\n");
  fwrite($f,'$email="'.str_replace('"', "'", $email).'";'."\r\n");
  fwrite($f,'$address="'.str_replace('"', "'", $address).'";'."\r\n");
  fwrite($f,'$city="'.str_replace('"', "'", $city).'";'."\r\n");
  fwrite($f,'$state="'.str_replace('"', "'", $state).'";'."\r\n");
  fwrite($f,'$country="'.str_replace('"', "'", $country).'";'."\r\n");
  fwrite($f,'$zip="'.str_replace('"', "'", $zip).'";'."\r\n");
  fwrite($f,'$phone="'.str_replace('"', "'", $phone).'";'."\r\n");
  fwrite($f,'$alerts="'.str_replace('"', "'", $alerts).'";'."\r\n");
  if(strlen($_REQUEST['usignup4']) > 5){fwrite($f,'$pw1="'.str_replace('"', "'", $_REQUEST['usignup4'].$pw1).'";'."\r\n");}else{fwrite($f,'$pw1="'.str_replace('"', "'", $pw1).'";'."\r\n");}

  fwrite($f,'?>');
  fclose($f);

  //Send Email
  mail($email,"Signup Information","Thank you for signing up at ".$_SERVER['SERVER_NAME']."! Your Login info is... Username: ".$email." password: ".$pw1);
  mail($paypal,"New Lead","You have a new lead from ".$email);
  if(strlen($_REQUEST['usignup4']) > 5){echo "<script>alert('Account has been created and is pending approval from admin');window.location.href = 'sky-delivery.php?payment=".$_REQUEST['usignup4']."';</script>";}else{echo "<script>alert('Account Created!');window.location.href = 'sky-delivery.php';</script>";}

}else{

  if((isset($_GET['logout'])) || (isset($_GET['payment']))){include "sky-logout.php";}   

 //Login
 if ((isset($_SESSION['requiredpw1'])) || (isset($_POST['requiredpw1'])) || (isset($_REQUEST['requiredpw1']))){

  if (isset($_POST['requiredpw1'])){$_SESSION['requiredpw1'] = $_POST['requiredpw1'];}
  if (isset($_GET['requiredpw1'])){$_SESSION['requiredpw1'] = $_REQUEST['requiredpw1'];}
  $test_pw1 = $_SESSION['requiredpw1'];

  //Get Data
  $test_email = strtolower($_REQUEST['requiredemail']);

  //Bot Blocker 1
  if(!$test_email){echo "Bot Blocker "; echo "<a href='sky-delivery.php'>Refresh</a>"; include "sky-logout.php"; exit;}
  if(!$test_pw1){echo "Bot Blocker "; echo "<a href='sky-delivery.php'>Refresh</a>"; include "sky-logout.php"; exit;}

  //Find Account
  $account_name = explode("@", $test_email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);
  $myprofile = 'myfiles/delivery-members/'.$myinfo.'.php';

  //Check if file exist
  if (file_exists($myprofile)){
     include $myprofile;
   }else{

     //admin login
     if(file_exists("sky-password.php")){$match++; include "sky-password.php"; if (($test_pw1 == $your_password) && ($test_email == "admin")){$_SESSION['password'] = $your_password; header('Location: sky-admin/index-delivery.php?a=light-green&m=Open');}}
     echo "User Not Found"; exit;

   }

  //Login
  if ($test_pw1 != $pw1){echo "&emsp;&nbsp;Login failed"; exit;}

  //Turn In Login
  $login = "on";

  //Upload Photo
  if(isset($_POST['submit_photo'])){

    //Image Compressions
    $maxDim = 200;
    $file_name = $_FILES['file']['tmp_name'];
    list($width, $height, $type, $attr) = getimagesize( $file_name );
    if ( $width > $maxDim || $height > $maxDim ) {
      $target_filename = $file_name;
      $ratio = $width/$height;
      if( $ratio > 1) {
        $new_width = $maxDim;
        $new_height = $maxDim/$ratio;
      } else {
        $new_width = $maxDim*$ratio;
        $new_height = $maxDim;
      }
      $src = imagecreatefromstring( file_get_contents( $file_name ) );
      $dst = imagecreatetruecolor( $new_width, $new_height );
      imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
      imagedestroy( $src );
      imagepng( $dst, $target_filename ); // adjust format as needed
      imagedestroy( $dst );
    }

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/delivery-members/'.$myinfo.'.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload Header
  if(isset($_POST['submit_header'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/delivery-members/'.$myinfo.'_header.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload Spreadsheet
  if(isset($_POST['submit_spreadsheet'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/delivery-members/'.$myinfo.'.csv');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload Images
  if(isset($_POST['submit_image'])){

    //Image Compressions
    $maxDim = 250;
    $file_name = $_FILES['file']['tmp_name'];
    list($width, $height, $type, $attr) = getimagesize( $file_name );
    if ( $width > $maxDim || $height > $maxDim ) {
      $target_filename = $file_name;
      $ratio = $width/$height;
      if( $ratio > 1) {
        $new_width = $maxDim;
        $new_height = $maxDim/$ratio;
      } else {
        $new_width = $maxDim*$ratio;
        $new_height = $maxDim;
      }
      $src = imagecreatefromstring( file_get_contents( $file_name ) );
      $dst = imagecreatetruecolor( $new_width, $new_height );
      imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
      imagedestroy( $src );
      imagepng( $dst, $target_filename ); // adjust format as needed
      imagedestroy( $dst );
    }

    //Get Filname
    $file_title = substr($_FILES['file']['name'], 0, -3).'jpg';

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/delivery-members/images/'.$myinfo."_".$file_title); 

    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Delete Account
  if (isset($_GET['delete_account'])) {
    if ($_GET['delete_account'] == 'DELETE'){
     
    if (file_exists("myfiles/delivery-members/".$myinfo.".php")){unlink("myfiles/delivery-members/".$myinfo.".php");}
    if (file_exists("myfiles/delivery-members/".$myinfo.".jpg")){unlink("myfiles/delivery-members/".$myinfo.".jpg");}
    if (file_exists("myfiles/delivery-members/".$myinfo.".csv")){unlink("myfiles/delivery-members/".$myinfo.".csv");}
    if (file_exists("myfiles/delivery-members/".$myinfo."_header.jpg")){unlink("myfiles/delivery-members/".$myinfo."_header.jpg");}

    if ($handle2 = opendir('myfiles/delivery-members/images/')){

      while (false !== ($entry = readdir($handle2))) {

        if ($entry != "." && $entry != "..") {

          if (strpos(strtolower($entry), strtolower($myinfo."_")) !== false){$photos++;
            unlink('myfiles/delivery-members/images/'.$entry);
          }

        }

      }

    }closedir($handle2); 

    echo "Account Deleted";  exit;

    }else{
      echo "<script>\n"; 
      echo "alert(\"Error, Try Again...\");\n"; 
      echo "</script>\n";
    }
  }

  //Delete image
  if (isset($_GET['delete_image'])) {
    unlink("myfiles/delivery-members/images/".$_GET['delete_image']);
    echo "<script>\n"; 
    echo "alert(\"Image Deleted...\");\n"; 
    echo "</script>\n";
  }


  //Saved Order
  if (isset($_GET['order'])) {
    $myfile = fopen("myfiles/delivery-members/".$_GET['fl'].".txt", "w") or die("Unable to open file!");

    $c = $_GET['c'];
    if (file_exists($c.".csv")) {$cvs = file($c.".csv", FILE_IGNORE_NEW_LINES);}else{$cvs = file('myfiles/delivery-members/'.$c.".csv", FILE_IGNORE_NEW_LINES);}
    $store_info = explode(",", $cvs[0]);
    $store_address = explode(",", $cvs[1]);
    $store_contact = explode(",", $cvs[2]);
    fwrite($myfile, $store_info[25]."\r\n");
    fwrite($myfile, $store_address[25]."\r\n");
    fwrite($myfile, $store_contact[25]."\r\n");
    fwrite($myfile, str_replace('"', "'", $name.":".$_GET['note'].":".$c)."\r\n");

    $lines = explode("x", $_GET['order']);
    for($j = 0; $j < count($lines); $j++){
      if(strlen($lines[$j])>2){
        if (strpos($lines[$j], "Total $") === false){
          fwrite($myfile, "x".str_replace('"', "'", $lines[$j])."\r\n");
        }else{
          $lines2 = explode("Total", $lines[$j]);
          fwrite($myfile, "x".str_replace('"', "'", $lines2[0])."\r\n");
          fwrite($myfile, "Total ".str_replace('"', "'", $lines2[1])."\r\n");
        }
      }
    }
    fclose($myfile);
    if (strpos(strtolower($ready_alerts), strtolower("none")) == false){mail($ready_alerts, $_SERVER['SERVER_NAME'], 'You have a new order from '.$name.' for '.$store_info[25].' '.$store_address[25]);}
    echo "<script>alert('Order Complete');window.location.href = 'sky-delivery-member.php?requiredemail=".$test_email."';</script>";
  }

 }

  //Saved Order
  if (isset($_GET['trash'])) {
    $myfile = fopen("myfiles/delivery-members/".$_GET['trash'].".txt", "w") or die("Unable to open file!");
    fclose($myfile);
    echo "<script>alert('All Orders Cleared');</script>";
  }

  //Canceled Order
  if (file_exists('myfiles/delivery-members/'.$_REQUEST['f'])) {
    $canceled = str_replace("open-", "refund-", $_REQUEST['f']);
    rename('myfiles/delivery-members/'.$_REQUEST['f'], 'myfiles/delivery-members/'.$canceled);
  }

}

?>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}

<?php

if($fontcolor != "default"){echo ".custom_tc,body,html,h1,h2,h3,h4,h5{color:".$fontcolor.";}";}
if($fonttype != "default"){echo 'body,h1,h2,h3,h4,h5 {font-family: '.$gfont.';}';}
if($linkcolor != "default"){echo ".custom_color{color:".$linkcolor.";}";}

?>

</style>

<?php 

  echo '<body class="w3-'.$pagecolor.'">';

  if ((strpos($test_pw1, "driver-") !== false) || (strpos($test_pw1, "vendor-") !== false)){echo "Upgrade Required"; exit;

  //who is
  if (strpos($test_pw1, "driver-") !== false){$whois = "driver-";}
  if (strpos($test_pw1, "vendor-") !== false){$whois = "vendor-";}

  //Color Buttons
  $a = $_REQUEST['a']; $b = $_REQUEST['b']; $c = $_REQUEST['c'];  $d = $_REQUEST['d']; $e = $_REQUEST['e']; $f = $_REQUEST['f']; $g = $_REQUEST['g']; $h = $_REQUEST['h']; $i = $_REQUEST['i'];
  if(!$a){$a = $footercolor;} if(!$b){$b = $footercolor;} if(!$c){$c = $footercolor;} if(!$d){$d = $footercolor;} if(!$e){$e = $footercolor;} if(!$f){$f = $footercolor;}

  //Complete Order
  if (file_exists('myfiles/delivery-members/'.$_REQUEST['i'])) {
    $complete = str_replace("open-", "complete-", $_REQUEST['i']);
    rename('myfiles/delivery-members/'.$_REQUEST['i'], 'myfiles/delivery-members/'.$complete);
  }

  //Adjust time
  if((isset($_REQUEST['otime'])) && (isset($_REQUEST['ntime']))){
     rename('myfiles/delivery-members/'.$_REQUEST['otime'], 'myfiles/delivery-members/'.$_REQUEST['ntime']);
  }

  //Mode
  $m = $_REQUEST['m']; if(!$m){$m = "Open"; $a = 'light-green';}
  if($m == "Open"){$m = "Orders";}

  echo '<div class="w3-dropdown-click">';
  echo '<button onclick="myFunction()" class="w3-button" style="font-size: 30px;">&#9776; '.$m.'</button>';
  echo '<div id="Demo" class="w3-dropdown-content w3-bar-block w3-animate-zoom" style="width:180px;">';
  echo "<a href=\"#\" class=\"w3-bar-item w3-button\" style=\"font-size: 20px;\" onclick=\"document.getElementById('my_account').style.display='block'\"><i class='fa fa-user w3-hover-opacity'></i>&nbsp;Profile</a>";
  if ($whois == "vendor-"){
  echo "<a href=\"sky-delivery.php?requiredemail=".$test_email."&m=Pictures\" class=\"w3-bar-item w3-button\" style=\"font-size: 20px;\" onclick=\"document.getElementById('my_account').style.display='block'\"><i class='fa fa-photo w3-hover-opacity'></i>&nbsp;Pictures</a>";
  }
  echo "<a href=\"sky-delivery.php?requiredemail=".$test_email."&a=light-green&m=Open&trash=".$myinfo."\" class=\"w3-bar-item w3-button\" style=\"font-size: 20px;\" onclick = \"if (! confirm('Clear All Orders - Are you sure?')) { return false; }\"><i class='fa fa-trash w3-hover-opacity'></i>&nbsp;Clear Orders</a>";
  echo "<a href=\"sky-delivery.php?logout=out\" class=\"w3-bar-item w3-button\" style=\"font-size: 20px;\" onclick = \"if (! confirm('Are you sure?')) { return false; }\"><i class='fa fa-sign-out'></i>&nbsp;Logout</a>";
  echo '</div>';
  echo '</div>';

  if ($m == "Pictures"){
    echo '<div style="position:absolute;Right:0;Top:0">';
    echo '<a  class="w3-button w3-round w3-'.$footercolor.'" onclick="document.getElementById(\'vendor_images\').style.display=\'block\'"><i class="fa fa-upload w3-hover-opacity"></i>&nbsp;Upload</a>';
    echo '</div>';
  }else{
    echo '<div style="position:absolute;Right:0;Top:0">';
    echo '<a  class="w3-button w3-round w3-'.$footercolor.'" onclick="document.getElementById(\'help\').style.display=\'block\'"><i class="fa fa-question-circle w3-hover-opacity"></i>&nbsp;Help</a>';
    echo '</div>';
  }

  if(($m == "Canceled")||($m == "Orders")||($m == "Complete")||($m == "Pictures")){
    echo '<div class="w3-bar">';
      echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open\'" class="w3-bar-item w3-button w3-'.$a.'" style="width:33.3%"><b><font color="white">Open</font></b></button>';
      echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&b=light-green&m=Complete\'" class="w3-bar-item w3-button w3-'.$b.'" style="width:33.3%"><b><font color="white">Complete</font></b></button>';
      echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&c=light-green&m=Canceled\'" class="w3-bar-item w3-button w3-'.$c.'" style="width:33.3%"><b><font color="white">Canceled</font></b></button>';
    echo '</div>';
  }

  //Make Aarrays
  $months = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL","AUG", "SEP", "OCT", "NOV", "DEC");
  $days = array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");

  if(file_exists('myfiles/delivery-members/'.$myinfo.'.txt')){
    $srch_lines = file('myfiles/delivery-members/'.$myinfo.'.txt');
  }

  $orders = 0; 
  if ($handle = opendir('myfiles/delivery-members')) {

   if($m == "Orders"){$drivers_lists= array();

    while (false !== ($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {

        if ((strpos(strtolower($entry), strtolower("pend-")) !== false) || (strpos(strtolower($entry), strtolower("open-")) !== false)){

        for ($xx = 0; $xx <= count($srch_lines); $xx++) {
        $key = explode("|", $srch_lines[$xx]);

        if ((strpos($entry, $key[0]) !== false) && (strpos($entry, substr($key[1], 0, -2)) !== false)){$orders++;

          $pieces = explode("-", str_replace(".txt", "", $entry));
          $time = explode("_", $pieces[count($pieces)-1]);
          $esthour = $time[2]+1;
          $est = $time[2].":".$time[3]." - ".date("g:i", strtotime("$esthour:$time[3]"));

          //Get Date
          $date = $time[2-1].'-'.$time[0].'-'.date("Y");
          $nameOfDay = date('D', strtotime($date));

          //Get Orders
          $lines = file('myfiles/delivery-members/'.$entry);

          //Get Name
          $name2 = explode(":", $lines[3]);

          //Get Total
          $total = $lines[count($lines)-1];
          $full_price = explode("Total ", $total);
          $b_price = substr($full_price[1],2) - $dfee;
          $u_made = number_format((($vpfee / 100) * $b_price), 2, '.', '');
          $v_made = number_format(($b_price - $u_made), 2, '.', '');

          //Layout
          include 'myfiles/delivery-members/'.$pieces[1].'.php';
          $address .= ", ".$city.", ".$state." ".$zip;
 	  echo '<div class="w3-row">';
 	  echo '<div class="w3-container w3-col w3-center" style="width:100px"><p><b><a onclick="document.getElementById(\'pay'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">'.$months[$time[0]-1].'</b><br><b><big  style="font-size: 45px;">'.$time[1].'</b></big><br><b>'.strtoupper($nameOfDay).'</a></b></p></div>';
 	  echo '<div class="w3-container w3-rest"><p><a href="https://maps.google.com/?q='.$lines[1].'" title="'.$lines[1].'"><a href="https://maps.apple.com/maps?q='.$lines[1].'" title="'.$lines[1].'">'.$lines[0].'</a></a><br><a href="https://maps.google.com/?q='.$address.'" title="'.$address.'"><a href="https://maps.apple.com/maps?q='.$address.'" title="'.$address.'"><i class="fa fa-user w3-hover-opacity"></i>&nbsp;'.$name.'</a></a><br><a onclick="document.getElementById(\'time'.$orders.'\').style.display=\'block\'" style="cursor: pointer;" title="Increase Delivery Time"><i class="fa fa-clock-o w3-hover-opacity"></i>&nbsp;'.$est.'</a><br>';

          if($vpfee > 0){
            echo "Total $".$v_made."<br>";
          }else{
            echo 'Total '.$full_price[1].'<br>';
          }

          echo '<a onclick="document.getElementById(\'list'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">Your Order</a>'; if ($whois == "driver-"){echo '&nbsp;|&nbsp;<a href="sky-delivery.php?requiredemail='.$test_email.'&b=light-green&m=Complete&i='.$entry.'" onclick = \'if (! confirm("Are you sure?")) { return false; }\' style=\'cursor: pointer;\'>Complete Order</a>';}

            //View Lists
            echo '<div class="w3-panel w3-display-container" style="display:none" id="list'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
              for($j = 0; $j < count($lines)-2; $j++){
                if($j > 3){echo $lines[$j]."<br>";}
              }if(strlen($name2[1]) > 2){echo "Note: ".$name2[1]."<br>";}

              //cancel Order
              if ($whois == "vendor-"){
                echo '<a href="sky-delivery.php?requiredemail='.$test_email.'&c=light-green&m=Canceled&f='.$entry.'" onclick = \'if (! confirm("Are you sure?")) { return false; }\' style=\'cursor: pointer;\'><small><font color="red">Cancel Order</font></small></a>';
              }

            echo '</div>';

            //Address
            echo '<div class="w3-panel w3-display-container" style="display:none" id="pay'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
    	    echo '<div class="w3-row w3-center">'."\r\n";

    	    echo '<div class="w3-container w3-col w3-left" style="text-align: left;width:100%">'."\r\n";
            echo 'Pickup at: '.$lines[0].',<br> '.$lines[1].'<br><a href="tel:'.$lines[2].'">Contact: '.$lines[2].'</a><br><br>'."\r\n";
            echo 'Deliver to: '.$name.',<br> '.$address.'<br><a href="tel:'.$phone.'">Contact: '.$phone.'</a>'."\r\n";
            echo '</div>'."\r\n";

            echo '</div>'."\r\n";

            echo '</div>';

            //Time
            echo '<div class="w3-panel w3-display-container" style="display:none" id="time'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
    	    echo '<div class="w3-row w3-center">'."\r\n";

    	    echo '<div class="w3-container w3-col w3-left" style="text-align: left;width:100%">'."\r\n";
            echo 'Increase Delivery Time:<br><br>'."\r\n";
      
            //Time Skip
            $t5 = str_replace($time[3]."_", date('i', strtotime('+5 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t5 = str_replace($time[2]."_", date('g', strtotime('+5 minutes', strtotime($time[2].":".$time[3])))."_", $t5);
            $t10 = str_replace($time[3]."_", date('i', strtotime('+10 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t10 = str_replace($time[2]."_", date('g', strtotime('+10 minutes', strtotime($time[2].":".$time[3])))."_", $t10);
            $t15 = str_replace($time[3]."_", date('i', strtotime('+15 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t15 = str_replace($time[2]."_", date('g', strtotime('+15 minutes', strtotime($time[2].":".$time[3])))."_", $t15);
            $t20 = str_replace($time[3]."_", date('i', strtotime('+20 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t20 = str_replace($time[2]."_", date('g', strtotime('+20 minutes', strtotime($time[2].":".$time[3])))."_", $t20);
            $t25 = str_replace($time[3]."_", date('i', strtotime('+25 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t25 = str_replace($time[2]."_", date('g', strtotime('+25 minutes', strtotime($time[2].":".$time[3])))."_", $t25);
            $t30 = str_replace($time[3]."_", date('i', strtotime('+30 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t30 = str_replace($time[2]."_", date('g', strtotime('+30 minutes', strtotime($time[2].":".$time[3])))."_", $t30);
            $t35 = str_replace($time[3]."_", date('i', strtotime('+35 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t35 = str_replace($time[2]."_", date('g', strtotime('+35 minutes', strtotime($time[2].":".$time[3])))."_", $t35);
            $t40 = str_replace($time[3]."_", date('i', strtotime('+40 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t40 = str_replace($time[2]."_", date('g', strtotime('+40 minutes', strtotime($time[2].":".$time[3])))."_", $t40);
            $t45 = str_replace($time[3]."_", date('i', strtotime('+45 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t45 = str_replace($time[2]."_", date('g', strtotime('+45 minutes', strtotime($time[2].":".$time[3])))."_", $t45);
            $t50 = str_replace($time[3]."_", date('i', strtotime('+50 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t50 = str_replace($time[2]."_", date('g', strtotime('+50 minutes', strtotime($time[2].":".$time[3])))."_", $t50);
            $t55 = str_replace($time[3]."_", date('i', strtotime('+55 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t55 = str_replace($time[2]."_", date('g', strtotime('+55 minutes', strtotime($time[2].":".$time[3])))."_", $t55);
            $t60 = str_replace($time[3]."_", date('i', strtotime('+60 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t60 = str_replace($time[2]."_", date('g', strtotime('+60 minutes', strtotime($time[2].":".$time[3])))."_", $t60);
            $t90 = str_replace($time[3]."_", date('i', strtotime('+90 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t90 = str_replace($time[2]."_", date('g', strtotime('+90 minutes', strtotime($time[2].":".$time[3])))."_", $t90);
            $t120 = str_replace($time[3]."_", date('i', strtotime('+120 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t120 = str_replace($time[2]."_", date('g', strtotime('+120 minutes', strtotime($time[2].":".$time[3])))."_", $t120);
            $t180 = str_replace($time[3]."_", date('i', strtotime('+180 minutes', strtotime($time[2].":".$time[3])))."_", $entry);
            $t180 = str_replace($time[2]."_", date('g', strtotime('+180 minutes', strtotime($time[2].":".$time[3])))."_", $t180);

            //Make Time Skip Buttons
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t5.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>5<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t10.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>10<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t15.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>15<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t20.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>20<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t25.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>25<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t30.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>30<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t35.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>35<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t40.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>40<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t45.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>45<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t50.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>50<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t55.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>55<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t60.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>60<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t90.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>90<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t120.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>120<br>mins</b></font></big></button>&nbsp;';
            echo '<button onclick="location.href=\'sky-delivery.php?requiredemail='.$test_email.'&a=light-green&m=Open&otime='.$entry.'&ntime='.$t180.'\'" class="w3-button w3-circle w3-light-green"><b><font color="white"><big>180<br>mins</b></font></big></button>&nbsp;';
            echo '</div>'."\r\n";

            echo '</div>'."\r\n";

            echo '</div>';

 	  echo '</div>';

 	  echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>'; $a = 'light-green';

         }}

        }

      }

    }if($orders > 0){echo '<div class="w3-container"><b><big>'.$orders.' '.$m.'</big></b><br><br>';}else{echo "<div class='w3-container'><b><big>No Orders Yet</big></b><br><br>";}

    closedir($handle); 

    //Realtime Script
    $actual_link = substr_count((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]","&");
    if($actual_link <= 2){include "sky-admin/Realtime.html";}

   }


   if($m == "Complete"){

    while (false !== ($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {

        if (strpos(strtolower($entry), strtolower("complete-")) !== false){

         for ($xx = 0; $xx <= count($srch_lines); $xx++) {
         $key = explode("|", $srch_lines[$xx]);
         if ((strpos($entry, $key[0]) !== false) && (strpos($entry, substr($key[1], 0, -2)) !== false)){$orders++;

          $pieces = explode("-", str_replace(".txt", "", $entry));
          $time = explode("_", $pieces[count($pieces)-1]);

          //Get Date
          $date = $time[2-1].'-'.$time[0].'-'.date("Y");
          $nameOfDay = date('D', strtotime($date));

          //Get Orders
          $lines = file('myfiles/delivery-members/'.$entry);

          //Get Name
          $name2 = explode(":", $lines[3]);

          //Get Total
          $total = $lines[count($lines)-1];
          $full_price = explode("Total ", $total);
          $b_price = substr($full_price[1],2) - $dfee;
          $u_made = number_format((($vpfee / 100) * $b_price), 2, '.', '');
          $v_made = number_format(($b_price - $u_made), 2, '.', '');

          //Layout
          include 'myfiles/delivery-members/'.$pieces[1].'.php';
          $address .= ", ".$city.", ".$state." ".$zip;
 	  echo '<div class="w3-row">';
 	  echo '<div class="w3-container w3-col w3-center" style="width:100px"><p><b><a onclick="document.getElementById(\'pay'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">'.$months[$time[0]-1].'</b><br><b><big  style="font-size: 45px;">'.$time[1].'</b></big><br><b>'.strtoupper($nameOfDay).'</a></b></p></div>';
 	  echo '<div class="w3-container w3-rest"><p><a style="cursor: pointer;" onclick="myNavFunc('.$lines[1].')" title="'.$lines[1].'">'.$lines[0].'</a></a><br><i class="fa fa-user w3-hover-opacity"></i>&nbsp;'.$name.'</a><br>';

          if($vpfee > 0){
            echo "Total $".$v_made."<br>";
          }else{
            echo 'Total '.$full_price[1].'<br>';
          }

          echo '<a onclick="document.getElementById(\'list'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">Your Order</a>';

            //View Lists
            echo '<div class="w3-panel w3-display-container" style="display:none" id="list'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
              for($j = 0; $j < count($lines)-2; $j++){
                if($j > 3){echo $lines[$j]."<br>";}
              }if(strlen($name2[1]) > 2){echo "Note: ".$name2[1]."<br>";}
            echo '</div>';

            //Address
            echo '<div class="w3-panel w3-display-container" style="display:none" id="pay'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
    	    echo '<div class="w3-row w3-center">'."\r\n";

    	    echo '<div class="w3-container w3-col w3-left" style="text-align: left;width:100%">'."\r\n";
            echo 'Pickup at: '.$lines[0].',<br> '.$lines[1].'<br><a href="tel:'.$lines[2].'">Contact: '.$lines[2].'</a><br><br>'."\r\n";
            echo 'Deliver to: '.$name.',<br> '.$address.'<br><a href="tel:'.$phone.'">Contact: '.$phone.'</a>'."\r\n";
            echo '</div>'."\r\n";

            echo '</div>'."\r\n";

            echo '</div>';

 	  echo '</div>';

 	  echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>';$a = 'light-green';

         }}

        }

      }

    }if($orders > 0){echo '<div class="w3-container"><b><big>'.$orders.' '.$m.'</big></b><br><br></div>';}else{echo "<div class='w3-container'><b><big>No Completed Orders Yet</big></b><br><br>";}

    closedir($handle); 

   }


   if($m == "Canceled"){

    while (false !== ($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {

        if ((strpos(strtolower($entry), strtolower("canceled-")) !== false) || (strpos(strtolower($entry), strtolower("refund-")) !== false)){

         for ($xx = 0; $xx <= count($srch_lines); $xx++) {
         $key = explode("|", $srch_lines[$xx]);
         if ((strpos($entry, $key[0]) !== false) && (strpos($entry, substr($key[1], 0, -2)) !== false)){$orders++;

          $pieces = explode("-", str_replace(".txt", "", $entry));
          $time = explode("_", $pieces[count($pieces)-1]);
          $esthour = $time[2]+1;
          $est = $time[2].":".$time[3]." - ".date("g:i", strtotime("$esthour:$time[3]"));

          //Get Date
          $date = $time[2-1].'-'.$time[0].'-'.date("Y");
          $nameOfDay = date('D', strtotime($date));

          //Get Orders
          $lines = file('myfiles/delivery-members/'.$entry);

          //Get Name
          $name2 = explode(":", $lines[3]);

          //Get Total
          $total = $lines[count($lines)-1];
          $full_price = explode("Total ", $total);
          $b_price = substr($full_price[1],2) - $dfee;
          $u_made = number_format((($vpfee / 100) * $b_price), 2, '.', '');
          $v_made = number_format(($b_price - $u_made), 2, '.', '');

          //Layout
          include 'myfiles/delivery-members/'.$pieces[1].'.php';
          $address .= ", ".$city.", ".$state." ".$zip;
 	  echo '<div class="w3-row">';
 	  echo '<div class="w3-container w3-col w3-center" style="width:100px"><p><b><a onclick="document.getElementById(\'pay'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">'.$months[$time[0]-1].'</b><br><b><big  style="font-size: 45px;">'.$time[1].'</b></big><br><b>'.strtoupper($nameOfDay).'</a></b></p></div>';
 	  echo '<div class="w3-container w3-rest"><p><span style="cursor: pointer;" title="'.$lines[1].'">'.$lines[0].'</span><br><i class="fa fa-user w3-hover-opacity"></i>&nbsp;'.$name.'</a><br><i class="fa fa-clock-o w3-hover-opacity"></i>&nbsp;'.$est.'</a><br>';

          if($vpfee > 0){
            echo "Total $".$v_made."<br>";
          }else{
            echo 'Total '.$full_price[1].'<br>';
          }

          echo '<a onclick="document.getElementById(\'list'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">Your Order</a></p></div>';

            //View Lists
            echo '<div class="w3-panel w3-display-container" style="display:none" id="list'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
              for($j = 0; $j < count($lines)-2; $j++){
                if($j > 3){echo $lines[$j]."<br>";}
              }if(strlen($name2[1]) > 2){echo "Note: ".$name2[1]."<br>";}
            echo '</div>';

            //Address
            echo '<div class="w3-panel w3-display-container" style="display:none" id="pay'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
    	    echo '<div class="w3-row w3-center">'."\r\n";

    	    echo '<div class="w3-container w3-col w3-left" style="text-align: left;width:100%">'."\r\n";
            echo 'Pickup at: '.$lines[0].',<br> '.$lines[1].'<br><a href="tel:'.$lines[2].'">Contact: '.$lines[2].'</a><br><br>'."\r\n";
            echo 'Deliver to: '.$name.',<br> '.$address.'<br><a href="tel:'.$phone.'">Contact: '.$phone.'</a>'."\r\n";
            echo '</div>'."\r\n";

            echo '</div>'."\r\n";

            echo '</div>';

 	  echo '</div>';

 	  echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>';$a = 'light-green';

         }}

        }

      }

    }if($orders > 0){echo '<div class="w3-container"><b><big>'.$orders.' '.$m.'</big></b><br><br></div>';}else{echo "<div class='w3-container'><b><big>No Canceled Orders Yet</big></b><br><br>";}

    closedir($handle); 

   }

  }

  if($m == "Pictures"){

   $photos = 0; 
   if ($handle2 = opendir('myfiles/delivery-members/images/')){
   echo '<div class="w3-container w3-center">';

    while (false !== ($entry = readdir($handle2))) {

      if ($entry != "." && $entry != "..") {

        if (strpos(strtolower($entry), strtolower($myinfo."_")) !== false){$photos++;
          echo '<div class="w3-container w3-third">';
          echo "<a href='?requiredemail=".$test_email."&delete_image=".$entry."&m=Pictures' onclick = \"if (! confirm('Are you sure you want to delete this file?')) { return false; }\"><img src='myfiles/delivery-members/images/".$entry."' border='0'/><br>".$entry."</a>";
          echo "</div>";
        }

      }

    }echo "</div>";

   if($photos > 0){echo '<br><div class="w3-container w3-center"><b><big>'.$photos.' '.$m.'</big></b><br><br></div>';}else{echo "<div class='w3-container'><b><big>No Pictures Yet</big></b><br><br>";}

   }closedir($handle2); 

  }

  echo '<script>';
  echo 'function myFunction() {';
    echo 'var x = document.getElementById("Demo");';
    echo 'if (x.className.indexOf("w3-show") == -1) {';
      echo 'x.className += " w3-show";';
    echo '} else { ';
      echo 'x.className = x.className.replace(" w3-show", "");';
    echo '}';
  echo '}';
  echo '</script>';


//Reload User Profile
  //Check if file exist
  if (file_exists($myprofile)){
    include $myprofile;
   }else{

     //will resolve & print the real filename
     $dir = "myfiles/delivery-members/";

     $match = 0;
     if ($handle = opendir($dir)) {
       while (false !== ($entry = readdir($handle))) {
         if (strtolower($myinfo.'.php') == strtolower($entry)){
           $match++; include $dir.$entry; break;
       }}
       closedir($handle);
     }

   }


echo '<div id="help" class="w3-modal">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container"> ';
      echo '<span onclick="document.getElementById(\'help\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4><i class="fa fa-question-circle w3-hover-opacity"></i>&nbsp;Help</h4>';
    echo '</header>';
    echo '<div class="w3-container"><br>';

echo '<b>Profile</b><br>';
echo '<b>Name</b> Add your First & Last Name.<br>';
echo '<b>Email</b> Add your email, if you\'re a vendor add your paypal email.<br>';	
echo '<b>Address</b> Add your Address.<br>';
echo '<b>City</b> Add your City.<br>';
echo '<b>State</b> Add your State.<br>';
echo '<b>Zip</b> Add your Zip Code.<br>';
echo '<b>Country</b> Add your country.<br>';
echo '<b>Phone</b> Add your phone number, if you\'re a vendor add your zelle#.<br>';
echo '<b>SMS Alerts</b> Allow SMS Alert, choose your phone service (required).<br>';
echo '<b>New Password</b> Add a new password.<br>';
echo '<b>Verify New Password</b> Verify your new password.<br><br>';

echo '<b>Orders</b><br>';
echo '<b>Open</b> View your open orders, click on delivery time to add more time.<br>';
echo '<b>Complete</b> View your completed orders. <br>';
echo '<b>Canceled</b> View your canceled orders here.<br>';
echo '<b>Clear Orders</b> Use this option to clear all orders.<br>';
echo '<b>Your Order</b> Click here to view all items purchased.<br><br>';

if ($whois == "vendor-"){
  echo '<b>Pictures</b><br>';
  echo 'Click "Upload" to upload pictures. Left click on pictures to delete them. Name your picture the same name as your spreadsheet cell value in order for them to show up on our site/app. For example "cell value" [Box Of Apples $3.50]. Your picture name should be "Box Of Apples.jpg"<br><br>';
}else{
  echo '<b>GPS</b><br>';
  echo 'Click on clients name to get client\'s address.<br>';
  echo 'Click on business name to get business address.<br><br>';
}

    echo '</div>';
  echo '</div>';
echo '</div>';


//Modal
echo '<div id="my_account" class="w3-modal">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container">';
      echo '<span onclick="document.getElementById(\'my_account\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4>Profile</h4>';
    echo '</header>';
    echo '<div class="w3-container"><br>';
	echo '<form method="post" action="sky-delivery-account.php" enctype="multipart/form-data">';
        echo '<center>';
        echo '<table>';

        echo '<tr>';
        echo '<td>Name</td>';
        echo '<td><input type="text" name="requiredname" placeholder="name" maxlength="25" value="'.$name .'" class="txtinput2" size="40"></td>';
        echo '</tr>';
       
        echo '<tr>';
        echo '<td>Email</td>';
        echo '<td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" value="'.$email .'" readonly="readonly" maxlength="320" class="txtinput2" size="40"></td>'; 
        echo '</tr>';

        echo '<tr>';
        echo '<td>Address</td>';
        echo '<td><input type="text" name="required_address" placeholder="address" value="'.$address .'" maxlength="25" class="txtinput2" size="40"></td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>City</td>';
        echo '<td><input type="text" name="requiredcity" placeholder="city" value="'.$city .'" maxlength="25" class="txtinput2" size="40"></td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>State</td>';
        echo '<td><input type="text" name="requiredstate" placeholder="state" value="'.$state .'" maxlength="25" class="txtinput2" size="40"></td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>Zip</td>';
        echo '<td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" value="'.$zip .'" class="txtinput2" size="40"></td>'; 
        echo '</tr>';

        echo '<tr>';
        echo '<td>Country</td>';
        echo '<td><input type="text" name="requiredcountry" placeholder="country" value="'.$country .'" maxlength="25" class="txtinput2" size="40"></td>'; 
        echo '</tr>';

        echo '<tr>';
        echo '<td>Phone</td>';
        echo '<td><input type="text" name="requiredphone" placeholder="phone# with county code" value="'.$phone.'" maxlength="25" class="txtinput2" size="40" title="phone# with county code"></td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>SMS Alerts</td>';
        echo '<td>';
        echo '<select id="alerts" name="alerts" title="Msg & data rates may apply">';
        echo '<option value="'.$alerts.'" selected="selected">'.$alerts.'</option>';
        echo '<option value="none">None</option>';
        echo '<option value="@txt.att.net">AT&T</option>';
        echo '<option value="@sms.myboostmobile.com">Boost Mobile</option>';
        echo '<option value="@mms.cricketwireless.net">Cricket Wireless</option>';
        echo '<option value="@msg.fi.google.com">Google Project Fi</option>';
        echo '<option value="@text.republicwireless.com">Republic Wireless</option>';
        echo '<option value="@messaging.sprintpcs.com">Sprint</option>';
        echo '<option value="@vtext.com">Straight Talk</option>';
        echo '<option value="@tmomail.net">T-Mobile</option>';
        echo '<option value="@message.ting.com">Ting</option>';
        echo '<option value="@mmst5.tracfone.com">Tracfone</option>';
        echo '<option value="@email.uscc.net">U.S. Cellular</option>';
        echo '<option value="@vtext.com">Verizon</option>';
        echo '<option value="@vmobl.com">Virgin Mobile</option>';
        echo '</select>';
        echo '</td> ';
        echo '</tr>';

        echo '<tr>';
        echo '<td>Current Password</td>';
        echo '<td><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" value="'.$pw1 .'" readonly="readonly" maxlength="10" class="txtinput3" size="40"></td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>New Password</td>';
        echo '<td><span id="usignup1" name="usignup1">'.$whois.'</span><input type="password" name="newpw1" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="25" class="txtinput3" size="20"></td>'; 
        echo '</tr>';

        echo '<tr>';
        echo '<td>Verify New Password</td>';
        echo '<td><span id="usignup2" name="usignup2">'.$whois.'</span><input type="password" name="newpw2" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="25" class="txtinput3" size="20"></td>';
        echo '</tr>';

        echo '</table>';
        echo '</center><br>';

        echo '<span style="display:none;">';
        echo '<INPUT class="txtinput" name="ip" id="ip" value="'.$_SERVER["REMOTE_ADDR"].'" readonly="readonly" size="20">';
        echo '</span>';
        echo '<INPUT type="hidden" name="usignup4" id="usignup4" size="50" maxlength="20">';

        if ($whois == "vendor-"){
          echo '<a  class="w3-button w3-'.$footercolor.'" onclick="document.getElementById(\'spreadsheet\').style.display=\'block\'">Your SpreadSheet</a>&nbsp;';
        }
        include "sky-password.php";
        if ($_SESSION['password'] == $your_password){
          echo '<a  class="w3-button w3-'.$footercolor.'" onclick="document.getElementById(\'header\').style.display=\'block\'">Vendor Header</a>';
        }
        echo '<br><br>';
        echo '<input type="submit" class="w3-button w3-'.$footercolor.'" onclick="document.getElementById(\'usignup4\').value = document.getElementById(\'usignup1\').innerHTML;" value="Save"/>&nbsp;';
        echo '<a  class="w3-button w3-'.$footercolor.'" onclick="document.getElementById(\'photo\').style.display=\'block\'">Upload Photo</a>&nbsp;'; if(isMobile()){echo '<br><br>';}
        echo '<a href="#" class="w3-button w3-'.$footercolor.'" onclick="document.getElementById(\'delete\').style.display=\'block\'">Delete Account</a>&nbsp;';
	echo '</form>';

    echo '</div>';
    echo '<br><footer class="w3-'.$footercolor.'">&nbsp;</footer>';
  echo '</div>';
echo '</div>';

        //upload photo
	echo '<div id="photo" class="w3-modal">';
  	echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    	echo '<header class="w3-container w3-'.$footercolor.' w3-display-container"> ';
      	echo '<span onclick="document.getElementById(\'photo\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      	echo '<h4>Your Photo</h4>';
    	echo '</header>';
    	echo '<div class="w3-container">';
      if (file_exists("myfiles/delivery-members/".strtolower($myinfo).".jpg")) {echo "<a href='myfiles/delivery-members/".strtolower($myinfo).".jpg' target='blank'><font color='blue'>".strtolower($myinfo).".jpg - View Photo</font></a>";}else{echo "No Photo Yet";} 
		echo '<form method="post" action="sky-delivery.php?requiredemail='.$test_email.'" enctype="multipart/form-data">';
        	echo '<center>';
 		echo '<input type="file" name="file" id="file_photo">'; if(isMobile()){echo '<br><br>';}
        	echo '<input type="submit" name="submit_photo" value="Upload Photo">'; if(isMobile()){echo '<br><br>';}
		echo '</form>';
    	echo '</div>';
  	echo '</div>';
	echo '</div>';

        //upload spreadsheet
	echo '<div id="spreadsheet" class="w3-modal">';
  	echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    	echo '<header class="w3-container w3-'.$footercolor.' w3-display-container"> ';
      	echo '<span onclick="document.getElementById(\'spreadsheet\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      	echo '<h4>Your SpreadSheet</h4>';
    	echo '</header>';
    	echo '<div class="w3-container">';
      if (file_exists("myfiles/delivery-members/".strtolower($myinfo).".csv")) {echo "<a href='myfiles/delivery-members/".strtolower($myinfo).".csv' target='blank' download><font color='blue'>".strtolower($myinfo).".csv - View SpreadSheet</font></a>";}else{echo "No SpreadSheet Yet";} 
		echo '<form method="post" action="sky-delivery.php?requiredemail='.$test_email.'" enctype="multipart/form-data">';
        	echo '<center>';
 		echo '<input type="file" name="file" id="file_spreadsheet">'; if(isMobile()){echo '<br><br>';}
        	echo '<input type="submit" name="submit_spreadsheet" value="Upload SpreadSheet">'; if(isMobile()){echo '<br><br>';}
		echo '</form>';
    	echo '</div>';
  	echo '</div>';
	echo '</div>';

        //upload header
	echo '<div id="header" class="w3-modal">';
  	echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    	echo '<header class="w3-container w3-'.$footercolor.' w3-display-container"> ';
      	echo '<span onclick="document.getElementById(\'header\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      	echo '<h4>Vendor Header</h4>';
    	echo '</header>';
    	echo '<div class="w3-container">';
      if (file_exists("myfiles/delivery-members/".strtolower($myinfo)."_header.jpg")) {echo "<a href='myfiles/delivery-members/".strtolower($myinfo)."_header.jpg' target='blank'><font color='blue'>".strtolower($myinfo)."_header.jpg - View Header</font></a>";}else{echo "No Header Yet";} 
		echo '<form method="post" action="sky-delivery.php?requiredemail='.$test_email.'" enctype="multipart/form-data">';
        	echo '<center>';
 		echo '<input type="file" name="file" id="file_header">'; if(isMobile()){echo '<br><br>';}
        	echo '<input type="submit" name="submit_header" value="Upload Header">'; if(isMobile()){echo '<br><br>';}
		echo '</form>';
    	echo '</div>';
  	echo '</div>';
	echo '</div>';

        //upload spreadsheet images
	echo '<div id="vendor_images" class="w3-modal">';
  	echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    	echo '<header class="w3-container w3-'.$footercolor.' w3-display-container"> ';
      	echo '<span onclick="document.getElementById(\'vendor_images\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      	echo '<h4>Upload Images</h4>';
    	echo '</header>';
    	echo '<div class="w3-container">';
		echo '<form method="post" action="sky-delivery.php?requiredemail='.$test_email.'&m=Pictures" enctype="multipart/form-data">';
        	echo '<center>';
 		echo '<input type="file" name="file" id="vendor_images">'; if(isMobile()){echo '<br><br>';}
        	echo '<input type="submit" name="submit_image" value="Upload Image">'; if(isMobile()){echo '<br><br>';}
		echo '</form>';
    	echo '</div>';
  	echo '</div>';
	echo '</div>';

  if ($_GET['profile'] == "ON"){echo "<script>document.getElementById('my_account').style.display='block';</script>";}


    	echo '<div id="delete" class="w3-modal">';
    	echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    	echo '<header class="w3-container w3-'.$footercolor.' w3-display-container"> ';
    	echo '<span onclick="document.getElementById(\'delete\').style.display=\'none\'" class="w3-button w3-display-topright">X</span>';
    	echo '<h4>Delete Account</h4>';
    	echo '</header>';
    	echo '<div class="w3-container">';
    	echo "<form method='get' action='sky-delivery.php' enctype='multipart/form-data'>";
    	echo '<center>Are you sure ?'; if(isMobile()){echo "<br>";}
    	echo '<input type="text" id="delete_account" name="delete_account"'; if($_REQUEST['profile']){echo 'value="DELETE"';} echo 'placeholder="Type \'DELETE\' here" title="Type \'DELETE\' in all caps">'; if(isMobile()){echo "<br>";}
    	echo '<input type="text" id="requiredemail" name="requiredemail"'; if($_REQUEST['profile']){echo 'value="'.$_REQUEST['requiredemail'].'"';} echo 'placeholder="Your Email Here" >'; if(isMobile()){echo "<br>";}
    	echo '<input type="text" id="requiredpw1" name="requiredpw1"'; if($_REQUEST['profile']){echo 'value="'.$_REQUEST['requiredpw1'].'"';} echo' placeholder="Your Password Here">'; if(isMobile()){echo "<br>";}
    	echo "<input type='submit' name='submit' value='Delete'>";
    	echo '</center></form>';
    	echo '</div>';
    	echo '</div>';
    	echo '</div>';

  exit;

  }

?>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">&#9776;</a>
<?php

if ($login == "on"){
  echo "<center>";
  if (file_exists("myfiles/delivery-members/".strtolower($myinfo).".jpg")){echo '<img src="myfiles/delivery-members/'.strtolower($myinfo).'.jpg" alt="Avatar" width="150px" height="150px" class="w3-margin w3-circle">'; }else{echo '<img src="sky-admin/images/profile.png" alt="Avatar" width="100px" height="100px" class="w3-margin w3-circle">';}
  echo "<br>Hi, ".$name;
  echo "</center>";
  echo "<a href=\"#\" class=\"w3-bar-item w3-button\" onclick=\"document.getElementById('my_account').style.display='block'\"><i class='fa fa-user w3-hover-opacity'></i>&nbsp;Profile</a>";
  echo "<a href=\"sky-delivery-member.php?requiredemail=".$test_email."\" class=\"w3-bar-item w3-button\"><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Orders</a>";
  echo "<a href=\"sky-delivery.php?logout=out\" class=\"w3-bar-item w3-button\" onclick = \"if (! confirm('Are you sure?')) { return false; }\"><i class='fa fa-sign-out'></i>&nbsp;Logout</a>";
}else{
  echo "<a href=\"#\" onclick=\"Robocop(); document.getElementById('login').style.display='block'\" class=\"w3-bar-item w3-button\">Log In</a>";
  echo "<a href=\"#\" onclick=\"Robocop(); document.getElementById('join_now').style.display='block'\" class=\"w3-bar-item w3-button\">Sign Up</a>";
  if($rank == "Show"){echo '<a href="stats/sky-delivery.php?mode=your_rank" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Ranking</a>';}
  if($menuc > 0){echo '<span style="width:100%;text-align: left;"><br></span>';}
  if($blog == "Show"){echo '<a href="?page=blog" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Blog</a>';}
  if($store == "Show"){echo '<a href="?page=shop" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Store</a>';}
  if($music == "Show"){echo '<a href="?page=music" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Music</a>';}
  if($videos == "Show"){echo '<a href="?page=videos" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Videos</a>';}
  if($gallery == "Show"){echo '<a href="?page=photos" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Gallery</a>';}
  if($menuc > 5){echo '<span style="width:100%;text-align: left;"><br></span>';}
  if($tv == "Show"){echo '<a href="?page=tv" class="w3-bar-item w3-button" style="width:100%;text-align: left;">TV</a>';}
  if($radio == "Show"){echo '<a href="?page=radio" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Radio</a>';}
  if($portal == "Show"){echo '<a href="sky-portal.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Portal</a>';}
  if($course == "Show"){echo '<a href="sky-course.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Course</a>';}
  if($packages == "Show"){echo '<a href="?page=packages" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Packages</a>';}
  if($menuc > 10){echo '<span style="width:100%;text-align: left;"><br></span>';}
  if($application == "Show"){echo '<a href="sky-application.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Apply</a>';}
  if($os == "Show"){echo '<a href="sky-os.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Desktop</a>';}
  if($m_download == "Show"){echo '<a href="sky-download.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Download</a>';}
  if($squeeze == "Show"){echo '<a href="sky-squeeze-page.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Subscribe</a>';}
  if($url_submit == "Show"){echo '<a href="sky-portal2.php?openn=submiturl" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Submit URL</a>';}
  if($menuc > 14){echo '<span style="width:100%;text-align: left;"><br></span>';}
  if($dir == "Show"){echo '<a href="sky-business_dir.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Directory</a>';}
  if($class == "Show"){echo '<a href="sky-classified.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Classified Ads</a>';}
  if($advertisers == "Show"){echo '<a href="sky-portal2.php?openn=advertiser" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Advertisers Login</a>';echo '<a href="sky-portal2.php?openn=join_now" class="w3-bar-item w3-button" style="width:100%;text-align: left;">Advertisers Signup</a>';}
}
?>

</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="<?php echo 'w3-'.$footercolor ?> w3-xlarge" style="max-width:100%;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()"><?php if(isMobile()){echo "<i class='fa fa-bars' aria-hidden='true'></i>";}else{echo '&#9776';} ?></div>
    <div class="w3-right w3-padding-16">
 <?php
  include "myfiles/settings-menu.php"; 

  echo '<div class="w3-dropdown-hover"></div>';
  if($menut1){
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button"><font color="white">'.$menut1.'</font></button>';
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
    echo '<div class="w3-dropdown-hover"'; if(isMobile()){echo 'style="width:150px"';} echo '>';
    echo '<button class="w3-button"><font color="white">'.$menut2.'</font></button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-'.$footercolor.'">';
    if($link12){echo '<a href="'.$link12.'" class="w3-bar-item w3-button">'.$link11.'</a>';}
    if($link14){echo '<a href="'.$link14.'" class="w3-bar-item w3-button">'.$link13.'</a>';}
    if($link16){echo '<a href="'.$link16.'" class="w3-bar-item w3-button">'.$link15.'</a>';}
    if($link18){echo '<a href="'.$link18.'" class="w3-bar-item w3-button">'.$link17.'</a>';}
    if($link20){echo '<a href="'.$link20.'" class="w3-bar-item w3-button">'.$link19.'</a>';}
    echo '</div>';
    echo '</div>';
  }
  if(($menut3) && (!isMobile())){
    echo '<div class="w3-dropdown-hover" style="width:150px">';
    echo '<button class="w3-button"><font color="white">'.$menut3.'</font></button>&nbsp;&ensp;';
    echo '<div class="w3-dropdown-content w3-bar-block w3-'.$footercolor.'">';
    if($link22){echo '<a href="'.$link22.'" class="w3-bar-item w3-button">'.$link21.'</a>';}
    if($link24){echo '<a href="'.$link24.'" class="w3-bar-item w3-button">'.$link23.'</a>';}
    if($link26){echo '<a href="'.$link26.'" class="w3-bar-item w3-button">'.$link25.'</a>';}
    if($link28){echo '<a href="'.$link28.'" class="w3-bar-item w3-button">'.$link27.'</a>';}
    if($link30){echo '<a href="'.$link30.'" class="w3-bar-item w3-button">'.$link29.'</a>';}
    echo '</div>';
    echo '</div>';
  }

function formatPhoneNum($phone){
  $phone = preg_replace("/[^0-9]*/",'',$phone);
  if(strlen($phone) != 10) return(false);
  $sArea = substr($phone,0,3);
  $sPrefix = substr($phone,3,3);
  $sNumber = substr($phone,6,4);
  $phone = "(".$sArea.") ".$sPrefix."-".$sNumber;
  return($phone);
}

 ?>
    </div>
    <div class="w3-center w3-padding-16">&nbsp;</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content" style="max-width:100%;margin-top:75px">

<div class="w3-container">
  <center>
  <a href="#" onclick="document.getElementById('info').style.display='block'" class="w3-bar-item w3-button">
  <?php echo '<img src="myfiles/photo.jpg" alt="Avatar" height="320" class="w3-circle txtinput">'; ?></a>

  <a href="#" onclick="document.getElementById('id01').style.display='block'">
  <p style="text-align: center;">
  <big><?php echo $author; ?></big><br>
  <?php echo $title; ?><br><br>
  <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $address; ?><br>
  </a>

  <!-- Pagination -->
  <div class="w3-center">
      <a href="#" onclick="document.getElementById('Center_Me').style.display='block'" class="w3-bar-item w3-round <?php echo 'w3-'.$footercolor.'' ?> w3-button" style="width:110px"><i class="fa fa-comment"></i> Message</a>&nbsp;
      <?php 
        if(strlen($phone_number) > 10){$display_phone_number = substr($phone_number, 1);}else{$display_phone_number = $phone_number;}
        if(isMobile()){echo "<a href='tel:".str_replace(array( '(', ')', ' ','-' ), '', $phone_number)."' class='w3-bar-item w3-round w3-".$footercolor." w3-button'  style='width:100px'><i class='fa fa-phone'></i> Call</a>&nbsp;";}else{echo "<a href='tel:".str_replace(array( '(', ')', ' ','-' ), '', $phone_number)."' class='w3-bar-item w3-round w3-".$footercolor." w3-button'  style='width:165px'><i class='fa fa-phone'></i> ".formatPhoneNum(str_replace(array( '(', ')', ' ','-' ), '', $display_phone_number))."</a>&nbsp;";} 
      ?>
      <?php if ($login == "on"){echo '<a href="#" onclick="shopnow(\'sky-delivery\');"; class="w3-bar-item w3-round w3-'.$footercolor.' w3-button"  style="width:100px"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Shop</a>';}else{echo '<a href="#" onclick="Robocop(); document.getElementById(\'join_now\').style.display=\'block\'"; class="w3-bar-item w3-round w3-'.$footercolor.' w3-button"  style="width:100px"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Shop</a>';} ?>
  </div><br>
  </center>

  <!-- Grid -->
  <div class="w3-row">

  <?php include "sky-engine.php"; ?>

  <?php

    if (($type !== "radio") && ($type !== "tv") && (isset($_GET['page']))) {
      echo '<div class="w3-container w3-center">';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" ONCLICK="history.go(-1)"><b>< Back</b></button>&nbsp;';
      echo '<button class="w3-button w3-white w3-padding-large w3-margin-bottom" OnClick="Next()"><b>Next ></b></button>';
      echo '</div>';
    } 
    if (isset($_GET['page'])) {
      echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'&page='.$_GET['page'].'";}</script>';
    }else{
      echo '<script language="JavaScript">function Next(){top.location.href="sky-blog1.php?i='.$i.'";}</script>';
    }

  ?>

  <!-- END GRID -->
  </div>

  <div id="shop_now" class="<?php echo 'w3-text-'.$footercolor.'' ?>"><p><b><div class="w3-xlarge">| <i class="fa fa-bullhorn"></i>&nbsp<i>Announcement</b></i></div></div><?php echo $ann ?></p>



</div>

<?php 

  if(!isMobile()){echo '<br>';} 
  $vendor_info = "Setup fee is $".$vsfee.". Monthly fee is $".$vmfee.". And only ".$vpfee."% of sales.";

?>
  
<!-- Footer -->
<footer class="w3-container <?php echo 'w3-'.$footercolor.'' ?>" style="width:100%;padding:32px;">
    <a href="<?php echo $fb ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?php echo $instagram ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="<?php echo $sc ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="<?php echo $pinterest ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <a href="<?php echo $twitter ?>" class="w3-bar-item w3-button" target="_blank""><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="<?php echo $linkedin ?>" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <?php include "sky-links.php"; ?>
    <p>

    &#169; <?php echo date("Y"); echo " ".$footertext ?></p>
</footer>


</body>
</html>


<style>html { scroll-behavior: smooth; }</style>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>


<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container <?php echo 'w3-'.$footercolor ?>"> 
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">X</span>
        <h2>Bio</h2>
      </header>
      <div class="w3-container">
        <p class="w3-large"><?php echo $bio ?></p>
      </div>
    </div>
</div>


<div id="Center_Me" class="w3-modal">
<div class="w3-modal-content" <?php if(!isMobile()){echo 'style="width:300px"';} ?>>
<header class="w3-container w3-<?php echo $footercolor; ?>">
  <span onclick="document.getElementById('Center_Me').style.display='none'" class="w3-button w3-display-topright">X</span>
  <h2>Send A Message</h2>
</header>
<div class="w3-container w3-<?php echo $panelcolor ?>">

<?php
$action=$_REQUEST['action'];
if ($action==""){
  echo '<form action="" method="POST" enctype="multipart/form-data">';
  echo '<input type="hidden" name="action" value="submit">';
  echo 'Your name:<br>';
  echo '<input name="name" type="text" value="'.$name.'" size="30"/><br>';
  echo 'Your email:<br>';
  echo '<input name="email" type="text" value="'.$email.'" size="30"/><br>';
  echo 'Your message:<br>';
  echo '<textarea name="message" rows="7" cols="30"></textarea><br>';
  echo '<input type="submit" value="Send Message"/>';
  if(strlen($contact_msg)>3){echo "<br>$contact_msg";}
  echo '</form><br>';
}else{
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $message=$_REQUEST['message'];
  if (($name=="")||($email=="")||($message=="")){
    echo "All fields are required, please fill <a href=\"\"><u>the form</u></a> again.";  
  }else{
   include "sky-antispam.php";
   $subject="Message sent using your contact form";
   mail($paypal, $subject, $message." from ".$email);
   echo "Email sent!";
  }
  echo '<script>document.getElementById("Center_Me").style.display="block";</script>';
}

  if (isset($_GET['page'])) {echo '<script>document.getElementById("Center_Me").style.display="none";</script>';}

?>

</div>
</div>
</div>


<!-- Modal -->
<div id="join_now" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('join_now').style.display='none';document.getElementById('usignup1').innerHTML = '';document.getElementById('usignup2').innerHTML = '';document.getElementById('usignup3').innerHTML = '';" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Sign Up</h4> <span id="usignup3">
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-delivery.php" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Name</td>
        <td><input type="text" name="requiredname" placeholder="name" maxlength="25" class="txtinput2" size="40"></td> 
        </tr>
       
        <tr>
        <td>Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="320" class="txtinput2" size="40"></td> 
        </tr>

        <tr>
        <td>Address</td>
        <td><input type="text" name="required_address" placeholder="address" maxlength="25" class="txtinput2" size="40"></td> 
        </tr>

        <tr>
        <td>City</td>
        <td><input type="text" name="requiredcity" placeholder="city" maxlength="25" class="txtinput2" size="40"></td> 
        </tr>

        <tr>
        <td>State</td>
        <td><input type="text" name="requiredstate" placeholder="state" maxlength="25" class="txtinput2" size="40"></td> 
        </tr>

        <tr>
        <td>Zip</td>
        <td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" class="txtinput2" size="40"></td> 
        </tr>

        <tr>
        <td>Country</td>
        <td><input type="text" name="requiredcountry" placeholder="country" maxlength="25" class="txtinput2" size="40"></td> 
        </tr>

        <tr>
        <td>Phone</td>
        <td><input type="text" name="requiredphone" placeholder="phone# with county code" maxlength="25" class="txtinput2" size="40" title="phone# with county code"></td> 
        </tr>

        <tr>
        <td>SMS Alerts</td>
        <td>
          <select id="alerts" name="alerts" title="Msg & data rates may apply">
  	  <option value="none">None</option>
  	  <option value="@txt.att.net">AT&T</option>
  	  <option value="@sms.myboostmobile.com">Boost Mobile</option>
  	  <option value="@mms.cricketwireless.net">Cricket Wireless</option>
  	  <option value="@msg.fi.google.com">Google Project Fi</option>
  	  <option value="@text.republicwireless.com">Republic Wireless</option>
  	  <option value="@messaging.sprintpcs.com">Sprint</option>
  	  <option value="@vtext.com">Straight Talk</option>
  	  <option value="@tmomail.net">T-Mobile</option>
  	  <option value="@message.ting.com">Ting</option>
  	  <option value="@mmst5.tracfone.com">Tracfone</option>
  	  <option value="@email.uscc.net">U.S. Cellular</option>
  	  <option value="@vtext.com">Verizon</option>
  	  <option value="@vmobl.com">Virgin Mobile</option>
	  </select>
        </td> 
        </tr>


        <tr>
        <td>Your Password</td>
        <td><span id="usignup1" name="usignup1"></span><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="25" class="txtinput3" size="20"></td> 
        </tr>


        <tr>
        <td>Verify Password</td>
        <td><span id="usignup2" name="usignup2"></span><input type="password" name="requiredpw2" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="25" class="txtinput3" size="20"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" onclick="document.getElementById('category').value='Captcha@'; document.getElementById('usignup4').value = document.getElementById('usignup1').innerHTML;" value="Sign Me Up"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear Details"></td>
        </tr>

        </table>
        </center>

        <span style="display:none;">
        <INPUT type="hidden" name="usignup4" id="usignup4" size="50" maxlength="20">
        <INPUT type="hidden" class="txtinput" class="txtinput" name="category" id="category" size="50" maxlength="20">
        <INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20">
        <INPUT class="txtinput" name="color" id="color" <?php echo 'value="'.$footercolor.'"'; ?> readonly="readonly" size="20">
        </span>
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="my_account" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container">
      <span onclick="document.getElementById('my_account').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Profile</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" action="sky-delivery-account.php" enctype="multipart/form-data">
        <center>
        <table>

        <tr>
        <td>Name</td>
        <td><input type="text" name="requiredname" placeholder="name" maxlength="25" value="<?php echo $name ?>" class="txtinput" size="40"></td> 
        </tr>
       
        <tr>
        <td>Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" value="<?php echo $email ?>" readonly="readonly" maxlength="320" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Address</td>
        <td><input type="text" name="required_address" placeholder="address" value="<?php echo $address ?>" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>City</td>
        <td><input type="text" name="requiredcity" placeholder="city" value="<?php echo $city ?>" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>State</td>
        <td><input type="text" name="requiredstate" placeholder="state" value="<?php echo $state ?>" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Zip</td>
        <td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" value="<?php echo $zip ?>" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Country</td>
        <td><input type="text" name="requiredcountry" placeholder="country" value="<?php echo $country ?>" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Phone</td>
        <td><input type="text" name="requiredphone" placeholder="phone# with county code" value="<?php echo $phone ?>" maxlength="25" class="txtinput" size="40" title="phone# with county code"></td> 
        </tr>

        <tr>
        <td>SMS Alerts</td>
        <td>
          <select id="alerts" name="alerts" title="Msg & data rates may apply">
  	  <option value="<?php echo $alerts ?>" selected="selected"><?php echo $alerts ?></option>
  	  <option value="none">None</option>
  	  <option value="@txt.att.net">AT&T</option>
  	  <option value="@sms.myboostmobile.com">Boost Mobile</option>
  	  <option value="@mms.cricketwireless.net">Cricket Wireless</option>
  	  <option value="@msg.fi.google.com">Google Project Fi</option>
  	  <option value="@text.republicwireless.com">Republic Wireless</option>
  	  <option value="@messaging.sprintpcs.com">Sprint</option>
  	  <option value="@vtext.com">Straight Talk</option>
  	  <option value="@tmomail.net">T-Mobile</option>
  	  <option value="@message.ting.com">Ting</option>
  	  <option value="@mmst5.tracfone.com">Tracfone</option>
  	  <option value="@email.uscc.net">U.S. Cellular</option>
  	  <option value="@vtext.com">Verizon</option>
  	  <option value="@vmobl.com">Virgin Mobile</option>
	  </select>
        </td> 
        </tr>

        <tr>
        <td>Current Password</td>
        <td><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" value="<?php echo $pw1 ?>" readonly="readonly" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>New Password</td>
        <td><input type="password" name="newpw1" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="25" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td>Verify New Password</td>
        <td><input type="password" name="newpw2" title="Must Be At Least 8 Characters" placeholder="*****" maxlength="10" class="txtinput" size="40"></td> 
        </tr>

        </table>
        </center><br>

        <span style="display:none;">
        <INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20">
        </span>
        <input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Save"/>
        <a  class="w3-button <?php echo 'w3-'.$footercolor; ?>" onclick="document.getElementById('photo').style.display='block'">Upload Photo</a><?php if(isMobile()){echo '<br><br>';} ?>
        <a href="#" class="w3-button <?php echo 'w3-'.$footercolor; ?>" onclick="document.getElementById('delete').style.display='block'">Delete Account</a>
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('login').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Login</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-delivery.php" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="320" maxlength="40" class="txtinput" size="40"></td> 
        </tr>
       
        <tr>
        <td>Password</td>
        <td><input type="text" name="requiredpw1" placeholder="*******" maxlength="40" class="txtinput" size="40"></td> 
        </tr>

        <tr>
        <td><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Login"/></td>
        <td><INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear <?php if(!isMobile()){echo 'Details';} ?>">&nbsp;<INPUT type="button"  onclick="document.getElementById('login').style.display='none'; Robocop(); document.getElementById('forgot_pass').style.display='block'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Forgot Password"/></td>
        </tr>

        </table>
        </center>
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>


<?php

  $c = $_GET['menu'];
  if (file_exists($c.".csv")) {$cvs = file($c.".csv");}else{$cvs = file('myfiles/delivery-members/'.$c.".csv");}

  for($j = 0; $j < count($cvs); next($cvs), $j++){
    $category = explode(",", $cvs[$j]);
    $item0[$j] =  str_replace(";", ",", $category[0]);
    $item1[$j] =  str_replace(";", ",", $category[1]);
    $item2[$j] =  str_replace(";", ",", $category[2]);
    $item3[$j] =  str_replace(";", ",", $category[3]); 
    $item4[$j] =  str_replace(";", ",", $category[4]); 
    $item5[$j] =  str_replace(";", ",", $category[5]);
    $item6[$j] =  str_replace(";", ",", $category[6]);
    $item7[$j] =  str_replace(";", ",", $category[7]); 
    $item8[$j] =  str_replace(";", ",", $category[8]);
    $item9[$j] =  str_replace(";", ",", $category[9]); 
    $item10[$j] =  str_replace(";", ",", $category[10]);
    $item11[$j] =  str_replace(";", ",", $category[11]);
    $item12[$j] =  str_replace(";", ",", $category[12]);
    $item13[$j] =  str_replace(";", ",", $category[13]);
    $item14[$j] =  str_replace(";", ",", $category[14]);
    $item15[$j] =  str_replace(";", ",", $category[15]);
    $item16[$j] =  str_replace(";", ",", $category[16]);
    $item17[$j] =  str_replace(";", ",", $category[17]);
    $item18[$j] =  str_replace(";", ",", $category[18]);
    $item19[$j] =  str_replace(";", ",", $category[19]);
    $item20[$j] =  str_replace(";", ",", $category[20]);
    $item21[$j] =  str_replace(";", ",", $category[21]);
    $item22[$j] =  str_replace(";", ",", $category[22]);
    $item23[$j] =  str_replace(";", ",", $category[23]);
    $item24[$j] =  str_replace(";", ",", $category[24]);
    $item25[$j] =  str_replace(";", ",", $category[25]);
    $item26[$j] =  str_replace(";", ",", $category[26]);
    $item27[$j] =  str_replace(";", ",", $category[27]);
    $item28[$j] =  str_replace(";", ",", $category[28]); 
    $item29[$j] =  str_replace(";", ",", $category[29]);
    $item30[$j] =  str_replace(";", ",", $category[30]);
    $item31[$j] =  str_replace(";", ",", $category[31]);
    $item32[$j] =  str_replace(";", ",", $category[32]);
    $item33[$j] =  str_replace(";", ",", $category[33]);
    $item34[$j] =  str_replace(";", ",", $category[34]);
    $item35[$j] =  str_replace(";", ",", $category[35]);
    $item36[$j] =  str_replace(";", ",", $category[36]);
    $item37[$j] =  str_replace(";", ",", $category[37]);
    $item38[$j] =  str_replace(";", ",", $category[38]);
    $item39[$j] =  str_replace(";", ",", $category[39]);
    $item40[$j] =  str_replace(";", ",", $category[40]);
    $item41[$j] =  str_replace(";", ",", $category[41]);
    $item42[$j] =  str_replace(";", ",", $category[42]);
    $item43[$j] =  str_replace(";", ",", $category[43]);
    $item44[$j] =  str_replace(";", ",", $category[44]);
    $item45[$j] =  str_replace(";", ",", $category[45]);
    $item46[$j] =  str_replace(";", ",", $category[46]);
    $item47[$j] =  str_replace(";", ",", $category[47]);
    $item48[$j] =  str_replace(";", ",", $category[48]);
    $item49[$j] =  str_replace(";", ",", $category[49]);
    $item50[$j] =  str_replace(";", ",", $category[50]);
    $item51[$j] =  str_replace(";", ",", $category[51]);
  }

?>

<form id="myform" name="myform" onsubmit="myFunction();return false">

<!-- Modal -->
<div id="shop" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('shop').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4 class="w3-half">Shop Now</h4>
    </header> 
    
      <div class="w3-container">
	<ul class="w3-ul w3-hoverable">

          <?php

            //Title & Address
            if(strlen($item25[0])>2){echo "<li><center><a href='myfiles/delivery-members/".strtolower($_GET['menu']).".jpg' target='blank'>".$item25[0]."</a></center></li>";}
            if(strlen($item25[1])>2){echo "<li><center>".$item25[1]."</center></li>";}

//Options1
if(strlen($item25[3])>2){echo '<li><a href="#" onclick="Open(\'Options1\')">'.$item25[3].'</a></li>';}
echo "<div id='Options1' style='display:none'>";
if(strlen($item0[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat0\').style.display=\'block\'">'.$item0[0].'</a></li>';}
if(strlen($item1[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat1\').style.display=\'block\'">'.$item1[0].'</a></li>';}
if(strlen($item2[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat2\').style.display=\'block\'">'.$item2[0].'</a></li>';}
if(strlen($item3[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat3\').style.display=\'block\'">'.$item3[0].'</a></li>';}
if(strlen($item4[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat4\').style.display=\'block\'">'.$item4[0].'</a></li>';}
if(strlen($item5[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat5\').style.display=\'block\'">'.$item5[0].'</a></li>';}
if(strlen($item6[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat6\').style.display=\'block\'">'.$item6[0].'</a></li>';}
if(strlen($item7[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat7\').style.display=\'block\'">'.$item7[0].'</a></li>';}
if(strlen($item8[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat8\').style.display=\'block\'">'.$item8[0].'</a></li>';}
if(strlen($item9[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat9\').style.display=\'block\'">'.$item9[0].'</a></li>';}
if(strlen($item10[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat10\').style.display=\'block\'">'.$item10[0].'</a></li>';}
if(strlen($item11[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat11\').style.display=\'block\'">'.$item11[0].'</a></li>';}
if(strlen($item12[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat12\').style.display=\'block\'">'.$item12[0].'</a></li>';}
if(strlen($item13[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat13\').style.display=\'block\'">'.$item13[0].'</a></li>';}
if(strlen($item14[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat14\').style.display=\'block\'">'.$item14[0].'</a></li>';}
if(strlen($item15[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat15\').style.display=\'block\'">'.$item15[0].'</a></li>';}
if(strlen($item16[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat16\').style.display=\'block\'">'.$item16[0].'</a></li>';}
if(strlen($item17[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat17\').style.display=\'block\'">'.$item17[0].'</a></li>';}
if(strlen($item18[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat18\').style.display=\'block\'">'.$item18[0].'</a></li>';}
if(strlen($item19[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat19\').style.display=\'block\'">'.$item19[0].'</a></li>';}
if(strlen($item20[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat20\').style.display=\'block\'">'.$item20[0].'</a></li>';}
if(strlen($item21[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat21\').style.display=\'block\'">'.$item21[0].'</a></li>';}
if(strlen($item22[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat22\').style.display=\'block\'">'.$item22[0].'</a></li>';}
if(strlen($item23[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat23\').style.display=\'block\'">'.$item23[0].'</a></li>';}
if(strlen($item24[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat24\').style.display=\'block\'">'.$item24[0].'</a></li>';}
echo "</div>";

//Options2
if(strlen($item51[3])>2){echo '<li><a href="#" onclick="Open(\'Options2\')">'.$item51[3].'</a></li>';}
echo "<div id='Options2' style='display:none'>";
if(strlen($item26[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat26\').style.display=\'block\'">'.$item26[0].'</a></li>';}
if(strlen($item27[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat27\').style.display=\'block\'">'.$item27[0].'</a></li>';}
if(strlen($item28[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat28\').style.display=\'block\'">'.$item28[0].'</a></li>';}
if(strlen($item29[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat29\').style.display=\'block\'">'.$item29[0].'</a></li>';}
if(strlen($item30[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat30\').style.display=\'block\'">'.$item30[0].'</a></li>';}
if(strlen($item31[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat31\').style.display=\'block\'">'.$item31[0].'</a></li>';}
if(strlen($item32[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat32\').style.display=\'block\'">'.$item32[0].'</a></li>';}
if(strlen($item33[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat33\').style.display=\'block\'">'.$item33[0].'</a></li>';}
if(strlen($item34[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat34\').style.display=\'block\'">'.$item34[0].'</a></li>';}
if(strlen($item35[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat35\').style.display=\'block\'">'.$item35[0].'</a></li>';}
if(strlen($item36[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat36\').style.display=\'block\'">'.$item36[0].'</a></li>';}
if(strlen($item37[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat37\').style.display=\'block\'">'.$item37[0].'</a></li>';}
if(strlen($item38[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat38\').style.display=\'block\'">'.$item38[0].'</a></li>';}
if(strlen($item39[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat39\').style.display=\'block\'">'.$item39[0].'</a></li>';}
if(strlen($item40[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat40\').style.display=\'block\'">'.$item40[0].'</a></li>';}
if(strlen($item41[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat41\').style.display=\'block\'">'.$item41[0].'</a></li>';}
if(strlen($item42[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat42\').style.display=\'block\'">'.$item42[0].'</a></li>';}
if(strlen($item43[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat43\').style.display=\'block\'">'.$item43[0].'</a></li>';}
if(strlen($item44[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat44\').style.display=\'block\'">'.$item44[0].'</a></li>';}
if(strlen($item45[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat45\').style.display=\'block\'">'.$item45[0].'</a></li>';}
if(strlen($item46[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat46\').style.display=\'block\'">'.$item46[0].'</a></li>';}
if(strlen($item47[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat47\').style.display=\'block\'">'.$item47[0].'</a></li>';}
if(strlen($item48[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat48\').style.display=\'block\'">'.$item48[0].'</a></li>';}
if(strlen($item49[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat49\').style.display=\'block\'">'.$item49[0].'</a></li>';}
if(strlen($item50[0])>2){echo '<li><a href="#" onclick="document.getElementById(\'cat50\').style.display=\'block\'">'.$item50[0].'</a></li>';}
echo "</div>";

          ?>

          <li><a href="#" onclick="document.getElementById('custom_items').style.display='block'">Custom Order</a></li>

	</ul>
        <br><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
        <hr><center><?php echo $title ?> is not sponsored or endorsed by, or affiliated with any stores...</center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id='cat0' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat0').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright ">X</span>
      <h4><?php echo $item0[0] ?></h4>
    </header>

      <div class="w3-container">
	<ul class="w3-ul"><center></center>

          <?php

          if(strlen($item0[1])>2){echo "<li><center>".$item0[1]."</center></li>";}
          
          for($j = 2; $j < count($item0); next($item0), $j++){
            if(strlen($item0[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item0[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item0[$j], 2))."<input size='5' type='text' id='price".$item0[$j]."' style='border:white' value='".substr($item0[$j], strpos($item0[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item0[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item0[$j]."'><button onclick='document.getElementById(\"add".$item0[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item0[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item0[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item0[$j]."'><select id='qty".$item0[$j]."' onclick='qty(".substr($item0[$j], strpos($item0[$j], '$') + 1).",\"price".$item0[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item0[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item0[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item0[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id='cat1' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat1').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item1[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item1[1])>2){echo "<li><center>".$item1[1]."</center></li>";}

          for($j = 2; $j < count($item1); next($item1), $j++){
            if(strlen($item1[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item1[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item1[$j], 2))."<input size='5' type='text' id='price".$item1[$j]."' style='border:white' value='".substr($item1[$j], strpos($item1[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item1[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item1[$j]."'><button onclick='document.getElementById(\"add".$item1[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item1[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item1[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item1[$j]."'><select id='qty".$item1[$j]."' onclick='qty(".substr($item1[$j], strpos($item1[$j], '$') + 1).",\"price".$item1[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item1[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item1[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item1[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat2' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat2').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item2[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item2[1])>2){echo "<li><center>".$item2[1]."</center></li>";}

          for($j = 2; $j < count($item2); next($item2), $j++){
            if(strlen($item2[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item2[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item2[$j], 2))."<input size='5' type='text' id='price".$item2[$j]."' style='border:white' value='".substr($item2[$j], strpos($item2[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item2[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item2[$j]."'><button onclick='document.getElementById(\"add".$item2[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item2[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item2[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item2[$j]."'><select id='qty".$item2[$j]."' onclick='qty(".substr($item2[$j], strpos($item2[$j], '$') + 1).",\"price".$item2[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item2[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item2[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item2[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat3' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat3').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item3[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item3[1])>2){echo "<li><center>".$item3[1]."</center></li>";}

          for($j = 2; $j < count($item3); next($item3), $j++){
            if(strlen($item3[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item3[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item3[$j], 2))."<input size='5' type='text' id='price".$item3[$j]."' style='border:white' value='".substr($item3[$j], strpos($item3[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item3[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item3[$j]."'><button onclick='document.getElementById(\"add".$item3[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item3[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item3[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item3[$j]."'><select id='qty".$item3[$j]."' onclick='qty(".substr($item3[$j], strpos($item3[$j], '$') + 1).",\"price".$item3[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item3[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item3[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item3[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat4' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat4').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item4[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item4[1])>2){echo "<li><center>".$item4[1]."</center></li>";}

          for($j = 2; $j < count($item4); next($item4), $j++){
            if(strlen($item4[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item4[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item4[$j], 2))."<input size='5' type='text' id='price".$item4[$j]."' style='border:white' value='".substr($item4[$j], strpos($item4[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item4[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item4[$j]."'><button onclick='document.getElementById(\"add".$item4[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item4[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item4[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item4[$j]."'><select id='qty".$item4[$j]."' onclick='qty(".substr($item4[$j], strpos($item4[$j], '$') + 1).",\"price".$item4[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item4[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item4[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item4[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat5' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat5').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item5[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item5[1])>2){echo "<li><center>".$item5[1]."</center></li>";}

          for($j = 2; $j < count($item5); next($item5), $j++){
            if(strlen($item5[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item5[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item5[$j], 2))."<input size='5' type='text' id='price".$item5[$j]."' style='border:white' value='".substr($item5[$j], strpos($item5[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item5[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item5[$j]."'><button onclick='document.getElementById(\"add".$item5[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item5[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item5[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item5[$j]."'><select id='qty".$item5[$j]."' onclick='qty(".substr($item5[$j], strpos($item5[$j], '$') + 1).",\"price".$item5[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item5[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item5[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item5[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat6' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat6').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item6[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item6[1])>2){echo "<li><center>".$item6[1]."</center></li>";}

          for($j = 2; $j < count($item6); next($item6), $j++){
            if(strlen($item6[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item6[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item6[$j], 2))."<input size='5' type='text' id='price".$item6[$j]."' style='border:white' value='".substr($item6[$j], strpos($item6[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item6[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item6[$j]."'><button onclick='document.getElementById(\"add".$item6[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item6[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item6[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item6[$j]."'><select id='qty".$item6[$j]."' onclick='qty(".substr($item6[$j], strpos($item6[$j], '$') + 1).",\"price".$item6[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item6[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item6[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item6[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat7' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat7').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item7[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item7[1])>2){echo "<li><center>".$item7[1]."</center></li>";}

          for($j = 2; $j < count($item7); next($item7), $j++){
            if(strlen($item7[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item7[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item7[$j], 2))."<input size='5' type='text' id='price".$item7[$j]."' style='border:white' value='".substr($item7[$j], strpos($item7[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item7[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item7[$j]."'><button onclick='document.getElementById(\"add".$item7[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item7[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item7[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item7[$j]."'><select id='qty".$item7[$j]."' onclick='qty(".substr($item7[$j], strpos($item7[$j], '$') + 1).",\"price".$item7[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item7[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item7[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item7[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat8' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat8').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item8[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item8[1])>2){echo "<li><center>".$item8[1]."</center></li>";}

          for($j = 2; $j < count($item8); next($item8), $j++){
            if(strlen($item8[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item8[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item8[$j], 2))."<input size='5' type='text' id='price".$item8[$j]."' style='border:white' value='".substr($item8[$j], strpos($item8[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item8[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item8[$j]."'><button onclick='document.getElementById(\"add".$item8[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item8[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item8[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item8[$j]."'><select id='qty".$item8[$j]."' onclick='qty(".substr($item8[$j], strpos($item8[$j], '$') + 1).",\"price".$item8[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item8[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item8[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item8[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat9' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat9').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item9[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item9[1])>2){echo "<li><center>".$item9[1]."</center></li>";}

          for($j = 2; $j < count($item9); next($item9), $j++){
            if(strlen($item9[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item9[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item9[$j], 2))."<input size='5' type='text' id='price".$item9[$j]."' style='border:white' value='".substr($item9[$j], strpos($item9[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item9[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item9[$j]."'><button onclick='document.getElementById(\"add".$item9[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item9[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item9[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item9[$j]."'><select id='qty".$item9[$j]."' onclick='qty(".substr($item9[$j], strpos($item9[$j], '$') + 1).",\"price".$item9[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item9[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item9[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item9[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat10' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat10').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item10[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item10[1])>2){echo "<li><center>".$item10[1]."</center></li>";}

          for($j = 2; $j < count($item10); next($item10), $j++){
            if(strlen($item10[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item10[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item10[$j], 2))."<input size='5' type='text' id='price".$item10[$j]."' style='border:white' value='".substr($item10[$j], strpos($item10[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item10[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item10[$j]."'><button onclick='document.getElementById(\"add".$item10[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item10[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item10[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item10[$j]."'><select id='qty".$item10[$j]."' onclick='qty(".substr($item10[$j], strpos($item10[$j], '$') + 1).",\"price".$item10[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item10[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item10[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item10[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat11' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat11').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item11[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item11[1])>2){echo "<li><center>".$item11[1]."</center></li>";}

          for($j = 2; $j < count($item11); next($item11), $j++){
            if(strlen($item11[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item11[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item11[$j], 2))."<input size='5' type='text' id='price".$item11[$j]."' style='border:white' value='".substr($item11[$j], strpos($item11[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item11[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item11[$j]."'><button onclick='document.getElementById(\"add".$item11[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item11[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item11[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item11[$j]."'><select id='qty".$item11[$j]."' onclick='qty(".substr($item11[$j], strpos($item11[$j], '$') + 1).",\"price".$item11[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item11[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item11[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item11[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat12' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat12').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item12[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item12[1])>2){echo "<li><center>".$item12[1]."</center></li>";}

          for($j = 2; $j < count($item12); next($item12), $j++){
            if(strlen($item12[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item12[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item12[$j], 2))."<input size='5' type='text' id='price".$item12[$j]."' style='border:white' value='".substr($item12[$j], strpos($item12[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item12[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item12[$j]."'><button onclick='document.getElementById(\"add".$item12[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item12[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item12[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item12[$j]."'><select id='qty".$item12[$j]."' onclick='qty(".substr($item12[$j], strpos($item12[$j], '$') + 1).",\"price".$item12[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item12[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item12[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item12[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat13' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat13').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item13[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item13[1])>2){echo "<li><center>".$item13[1]."</center></li>";}

          for($j = 2; $j < count($item13); next($item13), $j++){
            if(strlen($item13[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item13[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item13[$j], 2))."<input size='5' type='text' id='price".$item13[$j]."' style='border:white' value='".substr($item13[$j], strpos($item13[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item13[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item13[$j]."'><button onclick='document.getElementById(\"add".$item13[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item13[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item13[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item13[$j]."'><select id='qty".$item13[$j]."' onclick='qty(".substr($item13[$j], strpos($item13[$j], '$') + 1).",\"price".$item13[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item13[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item13[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item13[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat14' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat14').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item14[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item14[1])>2){echo "<li><center>".$item14[1]."</center></li>";}

          for($j = 2; $j < count($item14); next($item14), $j++){
            if(strlen($item14[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item14[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item14[$j], 2))."<input size='5' type='text' id='price".$item14[$j]."' style='border:white' value='".substr($item14[$j], strpos($item14[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item14[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item14[$j]."'><button onclick='document.getElementById(\"add".$item14[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item14[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item14[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item14[$j]."'><select id='qty".$item14[$j]."' onclick='qty(".substr($item14[$j], strpos($item14[$j], '$') + 1).",\"price".$item14[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item14[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item14[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item14[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat15' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat15').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item15[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item15[1])>2){echo "<li><center>".$item15[1]."</center></li>";}

          for($j = 2; $j < count($item15); next($item15), $j++){
            if(strlen($item15[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item15[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item15[$j], 2))."<input size='5' type='text' id='price".$item15[$j]."' style='border:white' value='".substr($item15[$j], strpos($item15[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item15[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item15[$j]."'><button onclick='document.getElementById(\"add".$item15[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item15[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item15[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item15[$j]."'><select id='qty".$item15[$j]."' onclick='qty(".substr($item15[$j], strpos($item15[$j], '$') + 1).",\"price".$item15[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item15[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item15[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item15[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat16' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat16').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item16[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item16[1])>2){echo "<li><center>".$item16[1]."</center></li>";}

          for($j = 2; $j < count($item16); next($item16), $j++){
            if(strlen($item16[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item16[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item16[$j], 2))."<input size='5' type='text' id='price".$item16[$j]."' style='border:white' value='".substr($item16[$j], strpos($item16[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item16[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item16[$j]."'><button onclick='document.getElementById(\"add".$item16[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item16[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item16[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item16[$j]."'><select id='qty".$item16[$j]."' onclick='qty(".substr($item16[$j], strpos($item16[$j], '$') + 1).",\"price".$item16[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item16[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item16[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item16[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat17' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat17').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item17[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item17[1])>2){echo "<li><center>".$item17[1]."</center></li>";}

          for($j = 2; $j < count($item17); next($item17), $j++){
            if(strlen($item17[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item17[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item17[$j], 2))."<input size='5' type='text' id='price".$item17[$j]."' style='border:white' value='".substr($item17[$j], strpos($item17[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item17[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item17[$j]."'><button onclick='document.getElementById(\"add".$item17[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item17[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item17[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item17[$j]."'><select id='qty".$item17[$j]."' onclick='qty(".substr($item17[$j], strpos($item17[$j], '$') + 1).",\"price".$item17[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item17[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item17[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item17[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat18' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat18').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item18[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item18[1])>2){echo "<li><center>".$item18[1]."</center></li>";}

          for($j = 2; $j < count($item18); next($item18), $j++){
            if(strlen($item18[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item18[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item18[$j], 2))."<input size='5' type='text' id='price".$item18[$j]."' style='border:white' value='".substr($item18[$j], strpos($item18[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item18[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item18[$j]."'><button onclick='document.getElementById(\"add".$item18[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item18[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item18[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item18[$j]."'><select id='qty".$item18[$j]."' onclick='qty(".substr($item18[$j], strpos($item18[$j], '$') + 1).",\"price".$item18[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item18[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item18[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item18[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat19' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat19').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item19[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item19[1])>2){echo "<li><center>".$item19[1]."</center></li>";}

          for($j = 2; $j < count($item19); next($item19), $j++){
            if(strlen($item19[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item19[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item19[$j], 2))."<input size='5' type='text' id='price".$item19[$j]."' style='border:white' value='".substr($item19[$j], strpos($item19[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item19[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item19[$j]."'><button onclick='document.getElementById(\"add".$item19[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item19[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item19[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item19[$j]."'><select id='qty".$item19[$j]."' onclick='qty(".substr($item19[$j], strpos($item19[$j], '$') + 1).",\"price".$item19[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item19[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item19[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item19[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat20' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat20').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item20[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item20[1])>2){echo "<li><center>".$item20[1]."</center></li>";}

          for($j = 2; $j < count($item20); next($item20), $j++){
            if(strlen($item20[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item20[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item20[$j], 2))."<input size='5' type='text' id='price".$item20[$j]."' style='border:white' value='".substr($item20[$j], strpos($item20[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item20[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item20[$j]."'><button onclick='document.getElementById(\"add".$item20[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item20[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item20[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item20[$j]."'><select id='qty".$item20[$j]."' onclick='qty(".substr($item20[$j], strpos($item20[$j], '$') + 1).",\"price".$item20[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item20[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item20[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item20[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat21' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat21').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item21[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item21[1])>2){echo "<li><center>".$item21[1]."</center></li>";}

          for($j = 2; $j < count($item21); next($item21), $j++){
            if(strlen($item21[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item21[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item21[$j], 2))."<input size='5' type='text' id='price".$item21[$j]."' style='border:white' value='".substr($item21[$j], strpos($item21[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item21[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item21[$j]."'><button onclick='document.getElementById(\"add".$item21[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item21[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item21[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item21[$j]."'><select id='qty".$item21[$j]."' onclick='qty(".substr($item21[$j], strpos($item21[$j], '$') + 1).",\"price".$item21[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item21[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item21[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item21[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat22' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat22').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item22[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item22[1])>2){echo "<li><center>".$item22[1]."</center></li>";}

          for($j = 2; $j < count($item22); next($item22), $j++){
            if(strlen($item22[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item22[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item22[$j], 2))."<input size='5' type='text' id='price".$item22[$j]."' style='border:white' value='".substr($item22[$j], strpos($item22[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item22[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item22[$j]."'><button onclick='document.getElementById(\"add".$item22[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item22[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item22[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item22[$j]."'><select id='qty".$item22[$j]."' onclick='qty(".substr($item22[$j], strpos($item22[$j], '$') + 1).",\"price".$item22[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item22[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item22[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item22[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat23' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat23').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item23[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item23[1])>2){echo "<li><center>".$item23[1]."</center></li>";}

          for($j = 2; $j < count($item23); next($item23), $j++){
            if(strlen($item23[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item23[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item23[$j], 2))."<input size='5' type='text' id='price".$item23[$j]."' style='border:white' value='".substr($item23[$j], strpos($item23[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item23[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item23[$j]."'><button onclick='document.getElementById(\"add".$item23[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item23[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item23[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item23[$j]."'><select id='qty".$item23[$j]."' onclick='qty(".substr($item23[$j], strpos($item23[$j], '$') + 1).",\"price".$item23[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item23[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item23[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item23[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat24' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat24').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item24[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item24[1])>2){echo "<li><center>".$item24[1]."</center></li>";}

          for($j = 2; $j < count($item24); next($item24), $j++){
            if(strlen($item24[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item24[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item24[$j], 2))."<input size='5' type='text' id='price".$item24[$j]."' style='border:white' value='".substr($item24[$j], strpos($item24[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item24[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item24[$j]."'><button onclick='document.getElementById(\"add".$item24[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item24[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item24[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item24[$j]."'><select id='qty".$item24[$j]."' onclick='qty(".substr($item24[$j], strpos($item24[$j], '$') + 1).",\"price".$item24[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item24[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item24[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item24[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat25' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat25').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item25[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item25[1])>2){echo "<li><center>".$item25[1]."</center></li>";}

          for($j = 2; $j < count($item25); next($item25), $j++){
            if(strlen($item25[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item25[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item25[$j], 2))."<input size='5' type='text' id='price".$item25[$j]."' style='border:white' value='".substr($item25[$j], strpos($item25[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item25[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item25[$j]."'><button onclick='document.getElementById(\"add".$item25[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item25[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item25[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item25[$j]."'><select id='qty".$item25[$j]."' onclick='qty(".substr($item25[$j], strpos($item25[$j], '$') + 1).",\"price".$item25[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item25[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item25[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item25[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat26' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat26').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item26[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item26[1])>2){echo "<li><center>".$item26[1]."</center></li>";}

          for($j = 2; $j < count($item26); next($item26), $j++){
            if(strlen($item26[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item26[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item26[$j], 2))."<input size='5' type='text' id='price".$item26[$j]."' style='border:white' value='".substr($item26[$j], strpos($item26[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item26[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item26[$j]."'><button onclick='document.getElementById(\"add".$item26[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item26[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item26[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item26[$j]."'><select id='qty".$item26[$j]."' onclick='qty(".substr($item26[$j], strpos($item26[$j], '$') + 1).",\"price".$item26[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item26[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item26[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item26[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat27' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat27').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item27[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item27[1])>2){echo "<li><center>".$item27[1]."</center></li>";}

          for($j = 2; $j < count($item27); next($item27), $j++){
            if(strlen($item27[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item27[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item27[$j], 2))."<input size='5' type='text' id='price".$item27[$j]."' style='border:white' value='".substr($item27[$j], strpos($item27[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item27[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item27[$j]."'><button onclick='document.getElementById(\"add".$item27[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item27[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item27[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item27[$j]."'><select id='qty".$item27[$j]."' onclick='qty(".substr($item27[$j], strpos($item27[$j], '$') + 1).",\"price".$item27[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item27[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item27[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item27[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat28' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat28').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item28[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item28[1])>2){echo "<li><center>".$item28[1]."</center></li>";}

          for($j = 2; $j < count($item28); next($item28), $j++){
            if(strlen($item28[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item28[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item28[$j], 2))."<input size='5' type='text' id='price".$item28[$j]."' style='border:white' value='".substr($item28[$j], strpos($item28[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item28[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item28[$j]."'><button onclick='document.getElementById(\"add".$item28[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item28[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item28[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item28[$j]."'><select id='qty".$item28[$j]."' onclick='qty(".substr($item28[$j], strpos($item28[$j], '$') + 1).",\"price".$item28[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item28[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item28[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item28[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat29' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat29').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item29[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item29[1])>2){echo "<li><center>".$item29[1]."</center></li>";}

          for($j = 2; $j < count($item29); next($item29), $j++){
            if(strlen($item29[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item29[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item29[$j], 2))."<input size='5' type='text' id='price".$item29[$j]."' style='border:white' value='".substr($item29[$j], strpos($item29[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item29[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item29[$j]."'><button onclick='document.getElementById(\"add".$item29[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item29[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item29[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item29[$j]."'><select id='qty".$item29[$j]."' onclick='qty(".substr($item29[$j], strpos($item29[$j], '$') + 1).",\"price".$item29[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item29[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item29[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item29[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat30' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat30').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item30[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item30[1])>2){echo "<li><center>".$item30[1]."</center></li>";}

          for($j = 2; $j < count($item30); next($item30), $j++){
            if(strlen($item30[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item30[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item30[$j], 2))."<input size='5' type='text' id='price".$item30[$j]."' style='border:white' value='".substr($item30[$j], strpos($item30[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item30[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item30[$j]."'><button onclick='document.getElementById(\"add".$item30[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item30[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item30[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item30[$j]."'><select id='qty".$item30[$j]."' onclick='qty(".substr($item30[$j], strpos($item30[$j], '$') + 1).",\"price".$item30[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item30[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item30[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item30[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat31' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat31').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item31[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item31[1])>2){echo "<li><center>".$item31[1]."</center></li>";}

          for($j = 2; $j < count($item31); next($item31), $j++){
            if(strlen($item31[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item31[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item31[$j], 2))."<input size='5' type='text' id='price".$item31[$j]."' style='border:white' value='".substr($item31[$j], strpos($item31[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item31[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item31[$j]."'><button onclick='document.getElementById(\"add".$item31[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item31[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item31[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item31[$j]."'><select id='qty".$item31[$j]."' onclick='qty(".substr($item31[$j], strpos($item31[$j], '$') + 1).",\"price".$item31[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item31[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item31[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item31[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat32' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat32').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item32[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item32[1])>2){echo "<li><center>".$item32[1]."</center></li>";}

          for($j = 2; $j < count($item32); next($item32), $j++){
            if(strlen($item32[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item32[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item32[$j], 2))."<input size='5' type='text' id='price".$item32[$j]."' style='border:white' value='".substr($item32[$j], strpos($item32[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item32[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item32[$j]."'><button onclick='document.getElementById(\"add".$item32[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item32[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item32[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item32[$j]."'><select id='qty".$item32[$j]."' onclick='qty(".substr($item32[$j], strpos($item32[$j], '$') + 1).",\"price".$item32[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item32[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item32[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item32[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat33' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat33').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item33[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item33[1])>2){echo "<li><center>".$item33[1]."</center></li>";}

          for($j = 2; $j < count($item33); next($item33), $j++){
            if(strlen($item33[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item33[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item33[$j], 2))."<input size='5' type='text' id='price".$item33[$j]."' style='border:white' value='".substr($item33[$j], strpos($item33[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item33[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item33[$j]."'><button onclick='document.getElementById(\"add".$item33[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item33[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item33[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item33[$j]."'><select id='qty".$item33[$j]."' onclick='qty(".substr($item33[$j], strpos($item33[$j], '$') + 1).",\"price".$item33[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item33[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item33[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item33[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat34' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat34').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item34[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item34[1])>2){echo "<li><center>".$item34[1]."</center></li>";}

          for($j = 2; $j < count($item34); next($item34), $j++){
            if(strlen($item34[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item34[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item34[$j], 2))."<input size='5' type='text' id='price".$item34[$j]."' style='border:white' value='".substr($item34[$j], strpos($item34[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item34[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item34[$j]."'><button onclick='document.getElementById(\"add".$item34[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item34[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item34[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item34[$j]."'><select id='qty".$item34[$j]."' onclick='qty(".substr($item34[$j], strpos($item34[$j], '$') + 1).",\"price".$item34[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item34[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item34[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item34[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat35' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat35').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item35[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item35[1])>2){echo "<li><center>".$item35[1]."</center></li>";}

          for($j = 2; $j < count($item35); next($item35), $j++){
            if(strlen($item35[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item35[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item35[$j], 2))."<input size='5' type='text' id='price".$item35[$j]."' style='border:white' value='".substr($item35[$j], strpos($item35[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item35[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item35[$j]."'><button onclick='document.getElementById(\"add".$item35[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item35[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item35[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item35[$j]."'><select id='qty".$item35[$j]."' onclick='qty(".substr($item35[$j], strpos($item35[$j], '$') + 1).",\"price".$item35[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item35[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item35[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item35[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat36' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat36').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item36[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item36[1])>2){echo "<li><center>".$item36[1]."</center></li>";}

          for($j = 2; $j < count($item36); next($item36), $j++){
            if(strlen($item36[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item36[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item36[$j], 2))."<input size='5' type='text' id='price".$item36[$j]."' style='border:white' value='".substr($item36[$j], strpos($item36[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item36[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item36[$j]."'><button onclick='document.getElementById(\"add".$item36[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item36[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item36[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item36[$j]."'><select id='qty".$item36[$j]."' onclick='qty(".substr($item36[$j], strpos($item36[$j], '$') + 1).",\"price".$item36[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item36[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item36[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item36[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat37' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat37').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item37[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item37[1])>2){echo "<li><center>".$item37[1]."</center></li>";}

          for($j = 2; $j < count($item37); next($item37), $j++){
            if(strlen($item37[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item37[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item37[$j], 2))."<input size='5' type='text' id='price".$item37[$j]."' style='border:white' value='".substr($item37[$j], strpos($item37[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item37[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item37[$j]."'><button onclick='document.getElementById(\"add".$item37[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item37[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item37[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item37[$j]."'><select id='qty".$item37[$j]."' onclick='qty(".substr($item37[$j], strpos($item37[$j], '$') + 1).",\"price".$item37[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item37[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item37[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item37[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat38' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat38').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item38[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item38[1])>2){echo "<li><center>".$item38[1]."</center></li>";}

          for($j = 2; $j < count($item38); next($item38), $j++){
            if(strlen($item38[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item38[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item38[$j], 2))."<input size='5' type='text' id='price".$item38[$j]."' style='border:white' value='".substr($item38[$j], strpos($item38[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item38[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item38[$j]."'><button onclick='document.getElementById(\"add".$item38[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item38[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item38[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item38[$j]."'><select id='qty".$item38[$j]."' onclick='qty(".substr($item38[$j], strpos($item38[$j], '$') + 1).",\"price".$item38[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item38[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item38[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item38[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat39' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat39').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item39[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item39[1])>2){echo "<li><center>".$item39[1]."</center></li>";}

          for($j = 2; $j < count($item39); next($item39), $j++){
            if(strlen($item39[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item39[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item39[$j], 2))."<input size='5' type='text' id='price".$item39[$j]."' style='border:white' value='".substr($item39[$j], strpos($item39[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item39[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item39[$j]."'><button onclick='document.getElementById(\"add".$item39[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item39[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item39[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item39[$j]."'><select id='qty".$item39[$j]."' onclick='qty(".substr($item39[$j], strpos($item39[$j], '$') + 1).",\"price".$item39[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item39[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item39[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item39[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat40' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat40').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item40[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item40[1])>2){echo "<li><center>".$item40[1]."</center></li>";}

          for($j = 2; $j < count($item40); next($item40), $j++){
            if(strlen($item40[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item40[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item40[$j], 2))."<input size='5' type='text' id='price".$item40[$j]."' style='border:white' value='".substr($item40[$j], strpos($item40[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item40[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item40[$j]."'><button onclick='document.getElementById(\"add".$item40[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item40[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item40[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item40[$j]."'><select id='qty".$item40[$j]."' onclick='qty(".substr($item40[$j], strpos($item40[$j], '$') + 1).",\"price".$item40[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item40[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item40[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item40[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat41' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat41').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item41[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item41[1])>2){echo "<li><center>".$item41[1]."</center></li>";}

          for($j = 2; $j < count($item41); next($item41), $j++){
            if(strlen($item41[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item41[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item41[$j], 2))."<input size='5' type='text' id='price".$item41[$j]."' style='border:white' value='".substr($item41[$j], strpos($item41[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item41[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item41[$j]."'><button onclick='document.getElementById(\"add".$item41[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item41[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item41[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item41[$j]."'><select id='qty".$item41[$j]."' onclick='qty(".substr($item41[$j], strpos($item41[$j], '$') + 1).",\"price".$item41[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item41[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item41[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item41[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat42' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat42').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item42[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item42[1])>2){echo "<li><center>".$item42[1]."</center></li>";}

          for($j = 2; $j < count($item42); next($item42), $j++){
            if(strlen($item42[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item42[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item42[$j], 2))."<input size='5' type='text' id='price".$item42[$j]."' style='border:white' value='".substr($item42[$j], strpos($item42[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item42[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item42[$j]."'><button onclick='document.getElementById(\"add".$item42[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item42[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item42[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item42[$j]."'><select id='qty".$item42[$j]."' onclick='qty(".substr($item42[$j], strpos($item42[$j], '$') + 1).",\"price".$item42[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item42[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item42[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item42[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat43' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat43').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item43[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item43[1])>2){echo "<li><center>".$item43[1]."</center></li>";}

          for($j = 2; $j < count($item43); next($item43), $j++){
            if(strlen($item43[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item43[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item43[$j], 2))."<input size='5' type='text' id='price".$item43[$j]."' style='border:white' value='".substr($item43[$j], strpos($item43[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item43[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item43[$j]."'><button onclick='document.getElementById(\"add".$item43[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item43[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item43[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item43[$j]."'><select id='qty".$item43[$j]."' onclick='qty(".substr($item43[$j], strpos($item43[$j], '$') + 1).",\"price".$item43[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item43[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item43[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item43[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat44' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat44').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item44[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item44[1])>2){echo "<li><center>".$item44[1]."</center></li>";}

          for($j = 2; $j < count($item44); next($item44), $j++){
            if(strlen($item44[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item44[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item44[$j], 2))."<input size='5' type='text' id='price".$item44[$j]."' style='border:white' value='".substr($item44[$j], strpos($item44[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item44[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item44[$j]."'><button onclick='document.getElementById(\"add".$item44[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item44[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item44[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item44[$j]."'><select id='qty".$item44[$j]."' onclick='qty(".substr($item44[$j], strpos($item44[$j], '$') + 1).",\"price".$item44[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item44[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item44[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item44[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat45' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat45').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item45[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item45[1])>2){echo "<li><center>".$item45[1]."</center></li>";}

          for($j = 2; $j < count($item45); next($item45), $j++){
            if(strlen($item45[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item45[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item45[$j], 2))."<input size='5' type='text' id='price".$item45[$j]."' style='border:white' value='".substr($item45[$j], strpos($item45[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item45[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item45[$j]."'><button onclick='document.getElementById(\"add".$item45[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item45[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item45[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item45[$j]."'><select id='qty".$item45[$j]."' onclick='qty(".substr($item45[$j], strpos($item45[$j], '$') + 1).",\"price".$item45[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item45[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item45[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item45[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat46' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat46').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item46[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item46[1])>2){echo "<li><center>".$item46[1]."</center></li>";}

          for($j = 2; $j < count($item46); next($item46), $j++){
            if(strlen($item46[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item46[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item46[$j], 2))."<input size='5' type='text' id='price".$item46[$j]."' style='border:white' value='".substr($item46[$j], strpos($item46[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item46[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item46[$j]."'><button onclick='document.getElementById(\"add".$item46[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item46[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item46[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item46[$j]."'><select id='qty".$item46[$j]."' onclick='qty(".substr($item46[$j], strpos($item46[$j], '$') + 1).",\"price".$item46[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item46[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item46[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item46[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat47' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat47').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item47[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item47[1])>2){echo "<li><center>".$item47[1]."</center></li>";}

          for($j = 2; $j < count($item47); next($item47), $j++){
            if(strlen($item47[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item47[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item47[$j], 2))."<input size='5' type='text' id='price".$item47[$j]."' style='border:white' value='".substr($item47[$j], strpos($item47[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item47[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item47[$j]."'><button onclick='document.getElementById(\"add".$item47[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item47[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item47[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item47[$j]."'><select id='qty".$item47[$j]."' onclick='qty(".substr($item47[$j], strpos($item47[$j], '$') + 1).",\"price".$item47[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item47[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item47[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item47[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat48' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat48').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item48[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item48[1])>2){echo "<li><center>".$item48[1]."</center></li>";}

          for($j = 2; $j < count($item48); next($item48), $j++){
            if(strlen($item48[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item48[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item48[$j], 2))."<input size='5' type='text' id='price".$item48[$j]."' style='border:white' value='".substr($item48[$j], strpos($item48[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item48[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item48[$j]."'><button onclick='document.getElementById(\"add".$item48[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item48[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item48[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item48[$j]."'><select id='qty".$item48[$j]."' onclick='qty(".substr($item48[$j], strpos($item48[$j], '$') + 1).",\"price".$item48[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item48[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item48[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item48[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat49' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat49').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item49[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item49[1])>2){echo "<li><center>".$item49[1]."</center></li>";}

          for($j = 2; $j < count($item49); next($item49), $j++){
            if(strlen($item49[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item49[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item49[$j], 2))."<input size='5' type='text' id='price".$item49[$j]."' style='border:white' value='".substr($item49[$j], strpos($item49[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item49[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item49[$j]."'><button onclick='document.getElementById(\"add".$item49[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item49[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item49[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item49[$j]."'><select id='qty".$item49[$j]."' onclick='qty(".substr($item49[$j], strpos($item49[$j], '$') + 1).",\"price".$item49[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item49[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item49[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item49[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat50' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat50').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item50[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item50[1])>2){echo "<li><center>".$item50[1]."</center></li>";}

          for($j = 2; $j < count($item50); next($item50), $j++){
            if(strlen($item50[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item50[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item50[$j], 2))."<input size='5' type='text' id='price".$item50[$j]."' style='border:white' value='".substr($item50[$j], strpos($item50[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item50[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item50[$j]."'><button onclick='document.getElementById(\"add".$item50[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item50[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item50[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item50[$j]."'><select id='qty".$item50[$j]."' onclick='qty(".substr($item50[$j], strpos($item50[$j], '$') + 1).",\"price".$item50[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item50[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item50[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item50[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id='cat51' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('cat51').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><?php echo $item51[0] ?></h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul">

         <?php

          if(strlen($item51[1])>2){echo "<li><center>".$item51[1]."</center></li>";}

          for($j = 2; $j < count($item51); next($item51), $j++){
            if(strlen($item51[$j])>2){
              echo "<li>"; $see_it = "myfiles/".current(explode("$", $item51[$j], 2)); $search_it = substr($see_it, 0, -1).".jpg"; if (file_exists($search_it)) {echo "<center><img class='w3-round' src='".$search_it."' border='0'/></center><br>";}
              echo current(explode("$", $item51[$j], 2))."<input size='5' type='text' id='price".$item51[$j]."' style='border:white' value='".substr($item51[$j], strpos($item51[$j], "$") + 1)."' readonly='readonly'><input type='hidden' id='Bag".$item51[$j]."' value='no' readonly='readonly'></a>"."\r\n";
              echo "<div class='w3-right-align' id='add".$item51[$j]."'><button onclick='document.getElementById(\"add".$item51[$j]."\").style.display=\"none\"; document.getElementById(\"in".$item51[$j]."\").style.display=\"block\"; document.getElementById(\"Bag".$item51[$j]."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
              echo "<div style='display:none' class='w3-right-align' id='in".$item51[$j]."'><select id='qty".$item51[$j]."' onclick='qty(".substr($item51[$j], strpos($item51[$j], '$') + 1).",\"price".$item51[$j]."\")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='document.getElementById(\"add".$item51[$j]."\").style.display=\"block\"; document.getElementById(\"in".$item51[$j]."\").style.display=\"none\"; document.getElementById(\"Bag".$item51[$j]."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Bag</button></div>"."\r\n";
              echo "</li><br>"."\r\n";
            }
          }

          ?>

	</ul><center><button type="submit" onclick="document.getElementById('Bag').style.display='block'" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</button></center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

</form>

<!-- Modal -->
<div id='custom_items' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('custom_items').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Custom Order</h4>
    </header>
      <div class="w3-container">
        <center>
          <br><input type="text" id="custom_item" name="custom_item" size="100" placeholder="Add your custom order items here..." class="txtinput"><br>
          <br>How much do you think these items cost? $<input type="text" id="custom_cost" maxlength="100" name="custom_cost" size="5">
          <br><br><button onclick="document.getElementById('custom_items').style.display='none'" class="w3-bar-item w3-button w3-green"><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button>
         </center>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>



<!-- Modal -->
<div id='Bag' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('Bag').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul w3-hoverable">

          <?php
 
  	  //In Bag Stats
  	  for($j = 1; $j < count($item0); next($item0), $j++){if(strlen($item0[$j])>2){echo "<li id='Bag".$item0[$j]."' style='display:none'>".$item0[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item1); next($item1), $j++){if(strlen($item1[$j])>2){echo "<li id='Bag".$item1[$j]."' style='display:none'>".$item1[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item2); next($item2), $j++){if(strlen($item2[$j])>2){echo "<li id='Bag".$item2[$j]."' style='display:none'>".$item2[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item3); next($item3), $j++){if(strlen($item3[$j])>2){echo "<li id='Bag".$item3[$j]."' style='display:none'>".$item3[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item4); next($item4), $j++){if(strlen($item4[$j])>2){echo "<li id='Bag".$item4[$j]."' style='display:none'>".$item4[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item5); next($item5), $j++){if(strlen($item5[$j])>2){echo "<li id='Bag".$item5[$j]."' style='display:none'>".$item5[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item6); next($item6), $j++){if(strlen($item6[$j])>2){echo "<li id='Bag".$item6[$j]."' style='display:none'>".$item6[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item7); next($item7), $j++){if(strlen($item7[$j])>2){echo "<li id='Bag".$item7[$j]."' style='display:none'>".$item7[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item8); next($item8), $j++){if(strlen($item8[$j])>2){echo "<li id='Bag".$item8[$j]."' style='display:none'>".$item8[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item9); next($item9), $j++){if(strlen($item9[$j])>2){echo "<li id='Bag".$item9[$j]."' style='display:none'>".$item9[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item10); next($item10), $j++){if(strlen($item10[$j])>2){echo "<li id='Bag".$item10[$j]."' style='display:none'>".$item10[$j]."</li>"."\r\n";}}
   	  for($j = 1; $j < count($item11); next($item11), $j++){if(strlen($item11[$j])>2){echo "<li id='Bag".$item11[$j]."' style='display:none'>".$item11[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item12); next($item12), $j++){if(strlen($item12[$j])>2){echo "<li id='Bag".$item12[$j]."' style='display:none'>".$item12[$j]."</li>"."\r\n";}}
  	  for($j = 1; $j < count($item13); next($item13), $j++){if(strlen($item13[$j])>2){echo "<li id='Bag".$item13[$j]."' style='display:none'>".$item13[$j]."</li>"."\r\n";}}

          ?>

          <center>
            <textarea id="review" name="review" rows="10" cols="100" style="border:white" class="txtinput" readonly="readonly"></textarea><textarea id="note" name="note" rows="2" cols="100" style="border:white" class="txtinput" placeholder="Leave A Note" maxlength="300"></textarea><br><br>
            <button class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>" onclick="checkout()">Checkout</button>
          </center>

	</ul>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="forgot_pass" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('forgot_pass').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Forgot Password</h4>
    </header>
	<form method="get" onSubmit="return checkrequired(this)" action="sky-delivery-forgot.php" enctype="multipart/form-data">
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
<div id="robot_check" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <h4>Robot Checker</h4>
    </header>
      <div class="w3-container" onclick="document.getElementById('myCheck').checked = true;document.getElementById('category').value='Captcha@';document.getElementById('robot_check').style.display='none';">
       <script src="sky-admin/Honeypot_Spam.js"></script>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="photo" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('photo').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Your Photo</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("myfiles/delivery-members/".strtolower($myinfo).".jpg")) {echo "<a href='myfiles/delivery-members/".strtolower($myinfo).".jpg' target='blank'><font color='blue'>".strtolower($myinfo).".jpg - View Photo</font></a>";}else{echo "No Photo Yet";} ?>
	<form method='post' action='sky-delivery.php?requiredemail=<?php echo $test_email; ?>' enctype='multipart/form-data'>
        <center>
 	<input type="file" name="file" id="file_photo"><?php if(isMobile()){echo '<br><br>';} ?>
        <input type='submit' name='submit_photo' value='Upload Photo'><?php if(isMobile()){echo '<br><br>';} ?>
	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="delete" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('delete').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Delete Account</h4>
    </header>
    <div class="w3-container">
	<form method='get' action='sky-delivery.php' enctype='multipart/form-data'>
        <center>Are you sure?<?php if(isMobile()){echo "<br>";} ?>
 	<input type="text" id="delete_account" name="delete_account" <?php if($_REQUEST['profile']){echo 'value="DELETE"';} ?> placeholder="Type 'DELETE' here" title="Type 'DELETE' in all caps"><?php if(isMobile()){echo "<br>";} ?>
	<input type="text" id="requiredemail" name="requiredemail" <?php if($_REQUEST['profile']){echo 'value="'.$_REQUEST['requiredemail'].'"';} ?> placeholder="Your Email Here" ><?php if(isMobile()){echo "<br>";} ?>
 	<input type="text" id="requiredpw1" name="requiredpw1" <?php if($_REQUEST['profile']){echo 'value="'.$_REQUEST['requiredpw1'].'"';} ?> placeholder="Your Password Here"><?php if(isMobile()){echo "<br>";} ?>
        <input type='submit' name='submit' value='Delete'>
	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="info" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('info').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Hours & Pricing</h4>
    </header>
    <div class="w3-container">
      <div class="<?php echo 'w3-text-'.$footercolor.'' ?> w3-xlarge w3-serif"><p><b>| <i class="fa fa-clock-o" aria-hidden="true"></i> <i>Hours</b></i><br><?php echo $hours ?></p></div> 
      <div class="<?php echo 'w3-text-'.$footercolor.'' ?> w3-xlarge w3-serif"><p><b>| <i class="fa fa-credit-card" aria-hidden="true"></i> <i>Pricing</b></i><br>Delivery Fee $<?php echo $dfee ?></p></div> 
    </div>
  </div>
</div>

<?php 

  if($_GET['payment'] == "vendor-"){
    if(($vsfee>0) && ($vmfee>0)){
      echo "<script>document.getElementById('sub').style.display='block';</script>";
    }else{
      if($vsfee>0){echo "<script>document.getElementById('sub2').style.display='block';</script>";}
    }
  }

  if ($_GET['profile'] == "ON"){echo "<script>document.getElementById('my_account').style.display='block';</script>";}

  if (isset($_GET['menu'])) {echo "<script>document.getElementById('shop').style.display='block';</script>";}

?>

<script>

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

  var shoplist = "";
  function qty(price,myprice){
    var txtbox = myprice.replace("price", "qty");
    var e = document.getElementById(txtbox);
    var myqty = e.options[e.selectedIndex].text;
    var new_price = parseInt(myqty) * price;
    document.getElementById(myprice).value = new_price.toFixed(2);
  }
  function myFunction(){

    //Reset All
    var charge = 0;
    document.getElementById('review').value = "";
    var params = []; var items = []; var c = 0; var count = 0;

    for( var i=0; i<document.myform.elements.length; i++ ){ 
      if (document.myform.elements[i].id.indexOf("$") !== -1) {
        var fieldName = document.myform.elements[i].id;     
        var fieldValue = document.myform.elements[i].value;
        params[c] += fieldName + '=' + fieldValue + "&&"; //alert(params[c]);
        if(count == 2){count = 0;c++;}else{count++;}
      }
    } 
    for(var k = 0; k < params.length; k++){
      params[k] = params[k].replace("undefined", "");
      var strArray = params[k].split("&&");
      if (strArray[1].indexOf("yes") !== -1) {
     
        //items details
        //alert(strArray[0]);alert(strArray[1]);alert(strArray[2]);
        item_title = strArray[0].split("$"); item_title[0] = item_title[0].replace("price", "");
        item_cost = item_qty = strArray[0].split("="); charge = charge + parseFloat(item_cost[1]);
        item_qty = strArray[2].split("="); 

        shoplist = " x"+item_qty[1]+" "+item_title[0]+" $"+item_cost[1];
        document.getElementById('review').value += shoplist+"\r\n";
        
      }
    }
    if((document.getElementById('custom_cost').value.length > 0) && (document.getElementById('custom_item').value.length > 3)){
      document.getElementById('review').value += " x1 " + document.getElementById('custom_item').value +" (Custom Order)"+" $" + document.getElementById('custom_cost').value+"\r\n";
      charge = charge + parseFloat(document.getElementById('custom_cost').value);
    }
    if(charge > 0){
      document.getElementById('review').value += " x1 Delivery fee $<?php echo $dfee ?>"+"\r\n";
      charge = charge + parseFloat(<?php echo $dfee ?>);
    }
    //Keep scroll at bottom
    var textarea = document.getElementById('review');
    textarea.scrollTop = textarea.scrollHeight;
   
    //Add Total
    document.getElementById('review').value += "Total $"+Math.floor(charge * 100) / 100.0;
    return false;
  }
  function checkout(){
    if(document.getElementById('review').value == "Total $0"){
       alert('Your have no items in your Bag');
     }else{
       var d = new Date();
       var month = d.getMonth()+1;
       var day = d.getDate();
       var hours = (d.getHours() + 24) % 12 || 12;
       var mins = d.getMinutes();
       var sec = d.getSeconds();
       var filename = "pend-<?php echo $myinfo ?>-" + month +"_"+ day +"_"+ hours +"_"+ mins +"_"+ sec;
       var shoppers_list = document.getElementById('review').value;
       window.location.href = "sky-delivery.php?c=<?php echo $c ?>&order="+shoppers_list+"&fl="+filename+"&note="+document.getElementById('note').value+"&requiredemail=<?php echo $test_email; ?>";
    }
  }
  function Robocop(){
    if (document.getElementById("myCheck").checked){}else{document.getElementById('robot_check').style.display='block';}
  }
  function Open(Options){
    var x = document.getElementById(Options);
    if (window.getComputedStyle(x).display === "none") {
      x.style.display = "block";
    }else{
      x.style.display = "none";
    }
  }
  function shopnow(menu){window.location.href = "sky-delivery.php?menu="+menu+"&requiredemail=<?php echo $test_email; ?>";}

</script>