<?php session_start(); ?>

<!DOCTYPE html>
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

<?php

 //Login
 if ((isset($_SESSION['requiredpw1'])) || (isset($_POST['requiredpw1'])) || (isset($_REQUEST['requiredpw1']))){

  if (isset($_POST['requiredpw1'])){$_SESSION['requiredpw1'] = $_POST['requiredpw1'];}
  if (isset($_GET['requiredpw1'])){$_SESSION['requiredpw1'] = $_REQUEST['requiredpw1'];}
  $test_pw1 = $_SESSION['requiredpw1'];

  //Get Data
  $test_email = $_REQUEST['requiredemail'];

  //Bot Blocker 1
  if(!$test_email){echo "Bot Blocker 1"; exit;}
  if(!$test_pw1){echo "Bot Blocker 1"; exit;}

  //Find Account
  $account_name = explode("@", $test_email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);
  $myprofile = 'myfiles/delivery-members/'.$myinfo.'.php';

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

     if($match == 0){echo "User Not Found"; exit;}
   }

  //Login
  if ($test_pw1 != $pw1){echo "&emsp;&nbsp;Login failed"; exit;}

  //Color Buttons
  $a = $_REQUEST['a']; $b = $_REQUEST['b']; $c = $_REQUEST['c'];
  if(!$a){$a = $footercolor;} if(!$b){$b = $footercolor;} if(!$c){$c = $footercolor;}

  //Canceled Order
  if (file_exists('myfiles/delivery-members/'.$_REQUEST['f'])) {
    $canceled = str_replace("pend-", "canceled-", $_REQUEST['f']);
    rename('myfiles/delivery-members/'.$_REQUEST['f'], 'myfiles/delivery-members/'.$canceled);
  }

  //Mode
  $m = $_REQUEST['m']; if(!$m){$m = "Open"; $a = 'light-green';}
  if($m == "Open"){$m = "Orders";}

  echo '<div class="w3-dropdown-click">';
  echo '<button onclick="myFunction()" class="w3-button" style="font-size: 30px;">&#9776; '.$m.'</button>';
  echo '<div id="Demo" class="w3-dropdown-content w3-bar-block w3-animate-zoom w3-'.$lightbox.'">';
  echo '<a href="sky-delivery.php?requiredemail='.$test_email.'" class="w3-bar-item w3-button" style="font-size: 20px;"><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
  echo '<a onclick="document.getElementById(\'help\').style.display=\'block\'"  class="w3-bar-item w3-button" style="font-size: 20px;"><i class="fa fa-question-circle w3-hover-opacity"></i>&nbsp;Help</a>';
  echo '</div>';
  echo '</div>';
  echo '<div class="w3-bar">';
  echo '<button onclick="location.href=\'sky-delivery-member.php?requiredemail='.$test_email.'&a=light-green&m=Open\'" class="w3-bar-item w3-button w3-'.$a.'" style="width:33.3%"><b><font color="white">Open</font></b></button>';
  echo '<button onclick="location.href=\'sky-delivery-member.php?requiredemail='.$test_email.'&b=light-green&m=Complete\'" class="w3-bar-item w3-button w3-'.$b.'" style="width:33.3%"><b><font color="white">Complete</font></b></button>';
  echo '<button onclick="location.href=\'sky-delivery-member.php?requiredemail='.$test_email.'&c=light-green&m=Canceled\'" class="w3-bar-item w3-button w3-'.$c.'" style="width:33.3%"><b><font color="white">Canceled</font></b></button>';
  echo '</div>';

  //Make Aarrays
  $months = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL","AUG", "SEP", "OCT", "NOV", "DEC");
  $days = array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");

  $orders = 0; 
  if ($handle = opendir('myfiles/delivery-members')) {

   if($m == "Orders"){

    while (false !== ($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {

        if ((strpos(strtolower($entry), strtolower("pend-".$myinfo)) !== false) || (strpos(strtolower($entry), strtolower("open-".$myinfo)) !== false)){$orders++;

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
          $name = explode(":", $lines[3]);

          //Get Total
          $total = $lines[count($lines)-1];
          $full_price = explode("Total ", $total);

          //Layout
 	  echo '<div class="w3-row">';
 	  echo '<div class="w3-container w3-col w3-center" style="width:100px"><p><b>'.$months[$time[0]-1].'</b><br><b><big  style="font-size: 45px;">'.$time[1].'</b></big><br><b>'.strtoupper($nameOfDay).'</b></p></div>';
 	  echo '<div class="w3-container w3-rest"><p><span style="cursor: pointer;" title="'.$lines[1].'">'.$lines[0].'</span><br><i class="fa fa-user w3-hover-opacity"></i>&nbsp;'.$name[0].'</a><br><i class="fa fa-clock-o w3-hover-opacity"></i>&nbsp;'.$est.'</a><br>Total '.$full_price[1].'<br><a onclick="document.getElementById(\'list'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">Your Order</a>'; if (strpos(strtolower($entry), strtolower("pend-")) !== false){echo '&nbsp;|&nbsp;<a onclick="document.getElementById(\'pay'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">Pay Here</a></p></div>';}else{echo '&nbsp;|&nbsp;';
            if (strpos($full_price[1], ".") !== false){
              echo '<a href="sky-delivery-member.php?requiredemail='.$test_email.'&cost='.str_replace(" $", "", $full_price[1]).'">Tip</a>';
            }else{
              echo '<a href="sky-delivery-member.php?requiredemail='.$test_email.'&cost='.str_replace(" $", "", $full_price[1]).'.00">Tip</a>';
            }
          }

            //View Lists
            echo '<div class="w3-panel w3-display-container" style="display:none" id="list'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
              for($j = 0; $j < count($lines)-1; $j++){
                if($j > 3){echo $lines[$j]."<br>";}
              }if(strlen($name[1]) > 2){echo "Note: ".$name[1]."<br>";}

              //cancel Order
              if (strpos(strtolower($entry), strtolower("pend-")) !== false){
                echo '<a href="sky-delivery-member.php?requiredemail='.$test_email.'&c=light-green&m=Canceled&f='.$entry.'" onclick = \'if (! confirm("Are you sure?")) { return false; }\' style=\'cursor: pointer;\'><small><font color="red">Cancel Order</font></small></a>';
              }
            echo '</div>';

            //Pay Order
            $full_price[1] = str_replace("$", "", $full_price[1]);
            echo '<div class="w3-panel w3-display-container" style="display:none" id="pay'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 

    	    echo '<div class="w3-row w3-center">'."\r\n";

    	    echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">'."\r\n";
            echo '<input type="hidden" name="cmd" value="_xclick">'."\r\n";
            echo '<input type="hidden" name="business" value="'.$paypal.'">'."\r\n";
            echo '<input type="hidden" name="currency_code" value="USD">'."\r\n";
            echo '<input type="hidden" name="item_name" value="'.$name[0].' Order">'."\r\n";
            echo '<input type="hidden" name="amount" value="'.$full_price[1].'">'."\r\n";
            echo '<input type="image" src="sky-admin/images/paypal.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!">'."\r\n";
            echo '</form>'."\r\n";
            echo '</div>'."\r\n";

            echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note '.$name[0].' Order\')" title="Cash App Payment"><img src="sky-admin/images/cashapp2.png" border="0"/></a>'."\r\n";
            echo '</div>'."\r\n";

            echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'For: add memo '.$name[0].' Order\')" title="Zell Payment"><img src="sky-admin/images/zelle2.png" border="0"/></a>'."\r\n";
            echo '</div>'."\r\n";

            echo '</div>'."\r\n";

            echo '</div>';

 	  echo '</div>';

 	  echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>';

        }

      }

    }if($orders > 0){echo '<div class="w3-container"><b><big>'.$orders.' '.$m.'</big></b><br><br>';}

    closedir($handle); 

   }


   if($m == "Complete"){

    while (false !== ($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {

        if (strpos(strtolower($entry), strtolower("complete-".$myinfo)) !== false){$orders++;

          $pieces = explode("-", str_replace(".txt", "", $entry));
          $time = explode("_", $pieces[count($pieces)-1]);

          //Get Date
          $date = $time[2-1].'-'.$time[0].'-'.date("Y");
          $nameOfDay = date('D', strtotime($date));

          //Get Orders
          $lines = file('myfiles/delivery-members/'.$entry);

          //Get Name
          $name = explode(":", $lines[3]);

          //Get Total
          $total = $lines[count($lines)-1];
          $full_price = explode("Total ", $total);

          //Layout
 	  echo '<div class="w3-row">';
 	  echo '<div class="w3-container w3-col w3-center" style="width:100px"><p><b>'.$months[$time[0]-1].'</b><br><b><big  style="font-size: 45px;">'.$time[1].'</b></big><br><b>'.strtoupper($nameOfDay).'</b></p></div>';
 	  echo '<div class="w3-container w3-rest"><p><span style="cursor: pointer;" title="'.$lines[1].'">'.$lines[0].'</span><br><i class="fa fa-user w3-hover-opacity"></i>&nbsp;'.$name[0].'</a><br>Total '.$full_price[1].'<br><a onclick="document.getElementById(\'list'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">Your Order</a>'; echo '&nbsp;|&nbsp;';

            //send tip
            if (strpos($full_price[1], ".") !== false){
              echo '<a href="sky-delivery-member.php?requiredemail='.$test_email.'&cost='.str_replace(" $", "", $full_price[1]).'">Tip</a>';
            }else{
              echo '<a href="sky-delivery-member.php?requiredemail='.$test_email.'&cost='.str_replace(" $", "", $full_price[1]).'.00">Tip</a>';
            }

            //View Lists
            echo '<div class="w3-panel w3-display-container" style="display:none" id="list'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
              for($j = 0; $j < count($lines)-1; $j++){
                if($j > 3){echo $lines[$j]."<br>";}
              }if(strlen($name[1]) > 2){echo "Note: ".$name[1]."<br>";}
            echo '</div>';

            //Pay Order
            $full_price[1] = str_replace("$", "", $full_price[1]);
            echo '<div class="w3-panel w3-display-container" style="display:none" id="pay'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 

    	    echo '<div class="w3-row w3-center">'."\r\n";

    	    echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">'."\r\n";
            echo '<input type="hidden" name="cmd" value="_xclick">'."\r\n";
            echo '<input type="hidden" name="business" value="'.$paypal.'">'."\r\n";
            echo '<input type="hidden" name="currency_code" value="USD">'."\r\n";
            echo '<input type="hidden" name="item_name" value="'.$name[0].' Order">'."\r\n";
            echo '<input type="hidden" name="amount" value="'.$full_price[1].'">'."\r\n";
            echo '<input type="image" src="sky-admin/images/paypal.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!">'."\r\n";
            echo '</form>'."\r\n";
            echo '</div>'."\r\n";

            echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note '.$name[0].' Order\')" title="Cash App Payment"><img src="sky-admin/images/cashapp2.png" border="0"/></a>'."\r\n";
            echo '</div>'."\r\n";

            echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'For: add memo '.$name[0].' Order\')" title="Zell Payment"><img src="sky-admin/images/zelle2.png" border="0"/></a>'."\r\n";
            echo '</div>'."\r\n";

            echo '</div>'."\r\n";

            echo '</div>';

 	  echo '</div>';

 	  echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>';

        }

      }

    }if($orders > 0){echo '<div class="w3-container"><b><big>'.$orders.' '.$m.'</big></b><br><br>';}

    closedir($handle); 

   }


   if($m == "Canceled"){

    while (false !== ($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {

         if ((strpos(strtolower($entry), strtolower("canceled-")) !== false) || (strpos(strtolower($entry), strtolower("refund-")) !== false)){$orders++;

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
          $name = explode(":", $lines[3]);

          //Get Total
          $total = $lines[count($lines)-1];
          $full_price = explode("Total ", $total);

          //Layout
 	  echo '<div class="w3-row">';
 	  echo '<div class="w3-container w3-col w3-center" style="width:100px"><p><b>'.$months[$time[0]-1].'</b><br><b><big  style="font-size: 45px;">'.$time[1].'</b></big><br><b>'.strtoupper($nameOfDay).'</b></p></div>';
 	  echo '<div class="w3-container w3-rest"><p><span style="cursor: pointer;" title="'.$lines[1].'">'.$lines[0].'</span><br><i class="fa fa-user w3-hover-opacity"></i>&nbsp;'.$name[0].'</a><br><i class="fa fa-clock-o w3-hover-opacity"></i>&nbsp;'.$est.'</a><br>Total '.$full_price[1].'<br><a onclick="document.getElementById(\'list'.$orders.'\').style.display=\'block\'" style="cursor: pointer;">Your Order</a></p></div>';

            //View Lists
            echo '<div class="w3-panel w3-display-container" style="display:none" id="list'.$orders.'"><span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-display-topright">X</span>'; 
              for($j = 0; $j < count($lines)-1; $j++){
                if($j > 3){echo $lines[$j]."<br>";}
              }if(strlen($name[1]) > 2){echo "Note: ".$name[1]."<br>";}
            echo '</div>';

 	  echo '</div>';

 	  echo '<div class="w3-panel w3-border-bottom w3-border-gray"></div>';

        }

      }

    }if($orders > 0){echo '<div class="w3-container"><b><big>'.$orders.' '.$m.'</big></b><br><br>';}

    closedir($handle); 

   }

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

<?php echo '<body class="w3-'.$pagecolor.'">' ?>

</body>
</html>

<!-- Modal -->
<div id="tip" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('tip').style.display='none'" class="w3-button w3-<?php echo $color ?> w3-display-topright">X</span>
      <h4>Tip</h4>
    </header>
    <div class="w3-container">

	<form style="font-size: 24px;" action="javascript:void(calculate())">
	<br><center><span id="tip2"></span>

	<select id="listbox" onclick="selectedVal(this);" onchange="selectedVal(this);">
	<option selected="selected">5%</option>
	<option>10%</option>
	<option>15%</option>
	<option>20%</option>
	<option>25%</option>
	<option>30%</option>
	<option>35%</option>
	<option>40%</option>
	<option>45%</option>
	<option>50%</option>
	</select><br><br></form>

	<?php

    	    echo '<div class="w3-row w3-center"> '."\r\n";

    	    echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<form name="_xclick2" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">'."\r\n";
            echo '<input type="hidden" name="cmd" value="_xclick">'."\r\n";
            echo '<input type="hidden" name="business" value="'.$paypal.'">'."\r\n";
            echo '<input type="hidden" name="currency_code" value="USD">'."\r\n";
            echo '<input type="hidden" name="item_name" value="'.$name[0].' Tip">'."\r\n";
            echo '<input type="hidden" name="amount" id="amount2" value="5.00">'."\r\n";
            echo '<input type="image" src="sky-admin/images/paypal.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!">'."\r\n";
            echo '</form>'."\r\n";
            echo '</div>'."\r\n";

            echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note '.$name[0].' Tip\')" title="Cash App Payment"><img src="sky-admin/images/cashapp2.png" border="0"/></a>'."\r\n";
            echo '</div>'."\r\n";

            echo '<div class="w3-container w3-col" style="width:100px">'."\r\n";
            echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'For: add memo '.$name[0].' Tip\')" title="Zell Payment"><img src="sky-admin/images/zelle2.png" border="0"/></a>'."\r\n";
            echo '</div>'."\r\n";


            echo '</div>'."\r\n";

	?>

	<br>

    </div>
  </div>
</div>

<!-- Modal -->
<div id="help" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('help').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><i class="fa fa-question-circle w3-hover-opacity"></i>&nbsp;Help</h4>
    </header>
    <div class="w3-container"><br>

<b>Profile</b><br>
<b>Name</b> Add your First & Last Name.<br>
<b>Email</b> Add your email.<br>	
<b>Address</b> Add your delivery address.<br>
<b>City</b> Add your delivery city.<br>
<b>State</b> Add your delivery state.<br>
<b>Zip</b> Add your delivery zip code.<br>
<b>Country</b> Add your country.<br>
<b>Phone</b> Add your phone number.<br>
<b>SMS Alerts</b> Allow SMS Alert, choose your phone service (required).<br>
<b>New Password</b> Add a new password.<br>
<b>Verify New Password</b> Verify your new password.<br><br>

<b>Orders</b><br>
<b>Open</b> View your open orders, you can pay, tip or cancel an order here.<br>
<b>Complete</b> View your completed orders, a order is mark complete once it has been delivered to you. You also have an option to leave a tip if you wish.<br>	
<b>Canceled</b> View your canceled orders here.<br>
<b>Your Order</b> Click here to view all items purchased.<br><br>

<b>Home</b> Takes you back to our "Home Page", here you can make orders or edit your profile.<br><br>

    </div>
  </div>
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

var percents = .15;
function selectedVal(list){
  var selection = list.options[list.selectedIndex].text;
  if (selection === "5%"){percents = .05;}    
  if (selection === "10%"){percents = .10;}    
  if (selection === "15%"){percents = .15;}    
  if (selection === "20%"){percents = .20;}    
  if (selection === "25%"){percents = .25;}    
  if (selection === "30%"){percents = .30;}    
  if (selection === "35%"){percents = .35;}    
  if (selection === "40%"){percents = .40;}    
  if (selection === "45%"){percents = .45;}    
  if (selection === "50%"){percents = .50;}    
  var bill = Number(<?php echo $_REQUEST['cost'] ?>);
  var tip = bill * percents;
  var total = bill + tip;
  document.getElementById("tip2").innerHTML= "$"+Number(tip).toFixed(2);
  document.getElementById("amount2").value= Number(tip).toFixed(2);      
} 
function selectedVal2(list){
  var selection = list;
  if (selection === "5%"){percents = .05;}    
  if (selection === "10%"){percents = .10;}    
  if (selection === "15%"){percents = .15;}    
  if (selection === "20%"){percents = .20;}    
  if (selection === "25%"){percents = .25;}    
  if (selection === "30%"){percents = .30;}    
  if (selection === "35%"){percents = .35;}    
  if (selection === "40%"){percents = .40;}    
  if (selection === "45%"){percents = .45;}    
  if (selection === "50%"){percents = .50;}    
  var bill = Number(<?php echo $_REQUEST['cost'] ?>);
  var tip = bill * percents;
  var total = bill + tip;
  document.getElementById("tip2").innerHTML= "$"+Number(tip).toFixed(2);
  document.getElementById("amount2").value= Number(tip).toFixed(2);        
} 

</script>

<?php if (strlen($_REQUEST['cost']) > 3){echo "<script>document.getElementById('tip').style.display='block';selectedVal2('5%');</script>";}  ?>

<style>html { scroll-behavior: smooth; }</style>

<SCRIPT SRC="stats.js"></SCRIPT>
<?php echo $analytics ?>