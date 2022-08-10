<link rel="stylesheet" href="sky-admin/w3.css">

<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php";}else{echo "Please 'Publish' Your Search Engine... Admin > Application Settings > Search > Publish"; exit; } ?>

<!-- Modal -->
<div id="pre_pay" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('pre_pay').style.display='none'; document.getElementById('London').style.display='block'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Make Payment</h4>
    </header>
    <div class="w3-container"><br>
    <center>
    <INPUT type="button"  style="width:40%" onclick="document.getElementById('pre_pay').style.display='none'; document.getElementById('pre_pay1').style.display='block'" class="w3-button  <?php echo 'w3-'.$footercolor; ?>" value="One Time Payment"/>
    <INPUT type="button"  style="width:40%" onclick="document.getElementById('pre_pay').style.display='none'; document.getElementById('pre_pay2').style.display='block'" class="w3-button  <?php echo 'w3-'.$footercolor; ?>" value="Subscribe"/>
    </center>
    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<script>document.getElementById('pre_pay').style.display='block';</script>

<?php 

if (file_exists("myfiles/settings-ac-members.php")){include "myfiles/settings-ac-members.php";  include "myfiles/settings.php";

echo '<div id="pre_pay1" class="w3-modal">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container">';
      echo '<span onclick="document.getElementById(\'pre_pay\').style.display=\'block\'; document.getElementById(\'pre_pay1\').style.display=\'none\'"; class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4>Make Payment</h4>';
    echo '</header>';
    echo '<div class="w3-container"><br>';
    echo '<center>';

	echo '<div class="w3-row-padding">';

	echo '<div class="w3-rest w3-margin-bottom">';
  	echo '<ul class="w3-ul w3-border w3-center w3-hover-shadow">';
    	echo '<li class="w3-xlarge w3-padding-32 w3-white w3-'.$lightbox.'">Business Account</li>';
    	echo '<li class="w3-padding-16 w3-white">';
      	echo '<h2 class="w3-wide">$'.$vmfee.' a month</h2>';
    	echo '</li>';
    	echo '<li class="w3-white w3-padding-24">';

	echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
	echo '<input type="hidden" name="cmd" value="_xclick">';
	echo '<input type="hidden" name="business" value="'.$paypal.'">';
	echo '<input type="hidden" name="currency_code" value="USD">';
	echo '<input type="hidden" name="item_name" value="PRO Package">';
	echo '<input type="hidden" name="amount" value="'.$vmfee.'">';
	echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
	echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note Pro Package, your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
	echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'Memo: add note Pro Package, your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
	echo '</form>';

    	echo '</li>';
  	echo '</ul>';
	echo '</div>';

    echo '</center>';
    echo '</div>';
    echo '<br><footer class="w3-'.$footercolor.'">&nbsp;</footer>';
  echo '</div>';
echo '</div>';

echo '<div id="pre_pay2" class="w3-modal">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container">';
      echo '<span onclick="document.getElementById(\'pre_pay\').style.display=\'block\'; document.getElementById(\'pre_pay2\').style.display=\'none\'"; class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4>Make Payment</h4>';
    echo '</header>';
    echo '<div class="w3-container"><br>';
    echo '<center>';

	echo '<div class="w3-row-padding">';

	echo '<div class="w3-rest w3-margin-bottom" >';
  	echo '<ul class="w3-ul w3-border w3-center w3-hover-shadow">';
    	echo '<li class="w3-xlarge w3-padding-32 w3-white w3-'.$lightbox.'">Business Account</li>';
    	echo '<li class="w3-padding-16 w3-white">';
      	echo '<h2 class="w3-wide">$'.$vmfee.' a month</h2>';
    	echo '</li>';
    	echo '<li class="w3-white w3-padding-24">';

	echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> ';
	echo '  <input type="hidden" name="cmd" value="_xclick-subscriptions" >';
	echo '  <input type="hidden" name="business" value="'.$paypal.'" >';
	echo '  <input type="hidden" name="item_name" value="PRO Package"> ';
	echo '  <input type="hidden" name="item_number" value="123" >';
	echo '  <input type="hidden" name="no_shipping" value="1" >';
	echo '  <input type="hidden" name="a1" value="'.$vmfee.'" >';
	echo '  <input type="hidden" name="p1" value="1" >';
	echo '  <input type="hidden" name="t1" value="M" >';
	echo '  <input type="hidden" name="a3" value="'.$vmfee.'" >';
	echo '  <input type="hidden" name="p3" value="1" >';
	echo '  <input type="hidden" name="t3" value="M" >';
	echo '  <input type="hidden" name="src" value="1" >';
	echo '  <input type="hidden" name="sra" value="1" >';
	echo '  <input type="hidden" name="no_note" value="1" >';
	echo '  <input type="hidden" name="invoice" value="invoicenumber" >';
	echo '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >';
	echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" >';
	echo '</form> ';

    	echo '</li>';
  	echo '</ul>';
	echo '</div>';

    echo '</center>';
    echo '</div>';
    echo '<br><footer class="w3-'.$footercolor.'">&nbsp;</footer>';
  echo '</div>';
echo '</div>';

  }else{echo "Sky Pay, is not setup..."; exit;}

?>