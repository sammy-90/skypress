<!-- Modal -->
<div id="login2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <center><h4>Welcome To <?php echo $title?></h4></center>
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>" enctype="multipart/form-data">
        <center>
        <table>

        <tr><td colspan="2"><big><center>Login</center></big></td></tr>

        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="320" maxlength="40" class="txtinput w3-input" size="40"></td> 
        </tr>
       
        <tr>
        <td>Password</td>
        <td><input type="password" name="requiredpw1" placeholder="*******" maxlength="40" class="txtinput w3-input" size="40"></td> 
        </tr>

        <tr>
        <td colspan="2"><br><center><input type="submit" onclick="document.getElementById('myCheck').checked = true;document.getElementById('category').value='Captcha@';" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Login"/>&nbsp;<INPUT type="button"  onclick="document.getElementById('login2').style.display='none'; document.getElementById('forgot_pass').style.display='block'" class="w3-button  <?php echo 'w3-'.$footercolor; ?>" value="Forgot Password"/>&nbsp;<INPUT type="button"  onclick="document.getElementById('login2').style.display='none'; document.getElementById('pre_join_now').style.display='block'" class="w3-button  <?php echo 'w3-'.$footercolor; ?>" value="Signup"/></center></td>
        </tr>

        </table>
        </center>
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="pre_join_now" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('pre_join_now').style.display='none'; resignup()" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Account Type</h4>
    </header>
    <div class="w3-container"><br>
    <center>
    <INPUT type="button"  style="width:40%" onclick="document.getElementById('pre_join_now').style.display='none'; document.getElementById('customer').style.display='block'" class="w3-button  <?php echo 'w3-'.$footercolor; ?>" value="Customer Account"/>
    <INPUT type="button"  style="width:40%" onclick="document.getElementById('pre_join_now').style.display='none'; document.getElementById('business').style.display='block'" class="w3-button  <?php echo 'w3-'.$footercolor; ?>" value="Business Account"/>
    </center>
    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="customer" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('customer').style.display='none';document.getElementById('usignup1').innerHTML = '';document.getElementById('usignup2').innerHTML = '';document.getElementById('usignup3').innerHTML = '';resignup()" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Customer Account</h4> <span id="usignup3">
    </header>

    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account-pend.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>" enctype="multipart/form-data">
        <center>
        <table>

        <tr><td colspan="2"><center><?php echo "Customer account monthy fee is $".$vsfee." a month."; ?></center><br></td></tr>

        <tr>
        <td>Name</td>
        <td><input type="text" name="requiredname" placeholder="name" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>
       
        <tr>
        <td>Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="320" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>City</td>
        <td><input type="text" name="requiredcity" placeholder="city" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>State</td>
        <td><input type="text" name="requiredstate" placeholder="state" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Zip</td>
        <td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Country</td>
        <td><input type="text" name="requiredcountry" placeholder="country" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Phone</td>
        <td><input type="text" name="requiredphone" placeholder="XXX-XXX-XXXX" maxlength="25" class="txtinput2 w3-input" size="40" title="phone#"></td> 
        </tr>

        <tr>
        <td>Your Password</td>
        <td><span id="usignup1" name="usignup1"></span><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" placeholder="8 Characters" maxlength="25" class="txtinput3 w3-input" size="20"></td> 
        </tr>


        <tr>
        <td>Verify Password</td>
        <td><span id="usignup2" name="usignup2"></span><input type="password" name="requiredpw2" title="Must Be At Least 8 Characters" placeholder="8 Characters" maxlength="25" class="txtinput3 w3-input" size="20"></td> 
        </tr>

        <tr>
        <td></td>
        <td><br><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" onclick="document.getElementById('myCheck').checked = true;document.getElementById('category101').value='Captcha@';document.getElementById('usignup4').value = document.getElementById('usignup1').innerHTML;" value="Sign Me Up"/>&nbsp;<INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear Details"></td>
        </tr>

        </table>
        </center>

        <span style="display:none;">
        <INPUT class="w3-round" type="hidden" name="color" id="color" value="customer">
        <INPUT class="w3-round" type="hidden" name="usignup4" id="usignup4" size="50" maxlength="20">
        <INPUT class="w3-round" type="hidden" class="txtinput" class="txtinput" name="category101" id="category101" size="50" maxlength="20">
        <INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20">
        </span>
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="business" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('business').style.display='none';document.getElementById('usignup1').innerHTML = '';document.getElementById('usignup2').innerHTML = '';document.getElementById('usignup3').innerHTML = '';resignup()" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Business Account</h4> <span id="usignup3">
    </header>

    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account-pend.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>" enctype="multipart/form-data">
        <center>
        <table>

        <tr><td colspan="2"><center><?php echo "Business account monthy fee is $".$vmfee." a month."; ?></center><br></td></tr>

        <tr>
        <td>Name</td>
        <td><input type="text" name="requiredname" placeholder="name" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>
       
        <tr>
        <td>Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="320" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>City</td>
        <td><input type="text" name="requiredcity" placeholder="city" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>State</td>
        <td><input type="text" name="requiredstate" placeholder="state" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Zip</td>
        <td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Country</td>
        <td><input type="text" name="requiredcountry" placeholder="country" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Phone</td>
        <td><input type="text" name="requiredphone" placeholder="XXX-XXX-XXXX" maxlength="25" class="txtinput2 w3-input" size="40" title="phone#"></td> 
        </tr>

        <tr>
        <td>Your Password</td>
        <td><span id="usignup1" name="usignup1"></span><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" placeholder="8 Characters" maxlength="25" class="txtinput3 w3-input" size="20"></td> 
        </tr>


        <tr>
        <td>Verify Password</td>
        <td><span id="usignup2" name="usignup2"></span><input type="password" name="requiredpw2" title="Must Be At Least 8 Characters" placeholder="8 Characters" maxlength="25" class="txtinput3 w3-input" size="20"></td> 
        </tr>

        <tr>
        <td></td>
        <td><br><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" onclick="document.getElementById('myCheck').checked = true;document.getElementById('category1').value='Captcha@';document.getElementById('usignup4').value = document.getElementById('usignup1').innerHTML;" value="Sign Me Up"/>&nbsp;<INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear Details"></td>
        </tr>

        </table>
        </center>

        <span style="display:none;">
        <INPUT class="w3-round" type="hidden" name="color" id="color" value="business">
        <INPUT class="w3-round" type="hidden" name="usignup4" id="usignup4" size="50" maxlength="20">
        <INPUT class="w3-round" type="hidden" class="txtinput" class="txtinput" name="category1" id="category1" size="50" maxlength="20">
        <INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20">
        </span>
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="join_now" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('join_now').style.display='none';document.getElementById('usignup1').innerHTML = '';document.getElementById('usignup2').innerHTML = '';document.getElementById('usignup3').innerHTML = '';resignup()" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Sign Up</h4> <span id="usignup3">
    </header>
    <div class="w3-container"><br>
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account-pend.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Name</td>
        <td><input type="text" name="requiredname" placeholder="name" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>
       
        <tr>
        <td>Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="320" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>City</td>
        <td><input type="text" name="requiredcity" placeholder="city" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>State</td>
        <td><input type="text" name="requiredstate" placeholder="state" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Zip</td>
        <td><input type="text" name="requiredzip" placeholder="zip" maxlength="15" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Country</td>
        <td><input type="text" name="requiredcountry" placeholder="country" maxlength="25" class="txtinput2 w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>Phone</td>
        <td><input type="text" name="requiredphone" placeholder="XXX-XXX-XXXX" maxlength="25" class="txtinput2 w3-input" size="40" title="phone#"></td> 
        </tr>

        <tr>
        <td>Your Password</td>
        <td><span id="usignup1" name="usignup1"></span><input type="password" name="requiredpw1" title="Must Be At Least 8 Characters" placeholder="8 Characters" maxlength="25" class="txtinput3 w3-input" size="20"></td> 
        </tr>


        <tr>
        <td>Verify Password</td>
        <td><span id="usignup2" name="usignup2"></span><input type="password" name="requiredpw2" title="Must Be At Least 8 Characters" placeholder="8 Characters" maxlength="25" class="txtinput3 w3-input" size="20"></td> 
        </tr>

        <tr>
        <td></td>
        <td><br><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" onclick="document.getElementById('category').value='Captcha@';document.getElementById('usignup4').value = document.getElementById('usignup1').innerHTML;" value="Sign Me Up"/>&nbsp;<INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear Details"></td>
        </tr>

        </table>
        </center>

        <span style="display:none;">
        <INPUT class="w3-round" type="hidden" name="usignup4" id="usignup4" size="50" maxlength="20">
        <INPUT class="w3-round" type="hidden" class="txtinput" class="txtinput" name="category" id="category" size="50" maxlength="20">
        <INPUT class="txtinput" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" readonly="readonly" size="20">
        <INPUT class="txtinput" name="color" id="color" <?php echo 'value="'.$footercolor.'"'; ?> readonly="readonly" size="20">
        </span>
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
	<form method="post" onSubmit="return checkrequired(this)" action="sky-account.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="320" maxlength="40" class="txtinput w3-input" size="40"></td> 
        </tr>
       
        <tr>
        <td>Password</td>
        <td><input type="password" name="requiredpw1" placeholder="*******" maxlength="40" class="txtinput w3-input" size="40"></td> 
        </tr>

        <tr>
        <td colspan="2"><center><br><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Login"/>&nbsp;<INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear <?php if(!isMobile()){echo 'Details';} ?>">&nbsp;<INPUT type="button"  onclick="document.getElementById('login').style.display='none'; Robocop(); document.getElementById('forgot_pass').style.display='block'" class="w3-button <?php if ($login == "on"){echo 'w3-'.$color;}else{echo 'w3-'.$footercolor;} ?>" value="Forgot Password"/></center></td>
        </tr>

        </table>
        </center>
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>


<!-- Modal -->
<div id="edit_email" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('edit_email').style.display='none'; document.getElementById('London').style.display='block'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Edit Your Email</h4>
    </header>
    <div class="w3-container"><br>
	<form method="post" action="sky-account-eemail.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>" enctype="multipart/form-data">
        <center>
        <table>

        <tr>
        <td>Current Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" value="<?php echo $email ?>" readonly="readonly" maxlength="320" class="txtinput w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>New Email</td>
        <td><input type="text" id="requiredemail" name="requiredemail_new1" placeholder="new email"  maxlength="320" class="txtinput w3-input" size="40"></td> 
        </tr>

        <tr>
        <td>New Email Conform</td>
        <td><input type="text" id="requiredemail" name="requiredemail_new2" placeholder="new email"  maxlength="320" class="txtinput w3-input" size="40"></td> 
        </tr>

        <tr>
        <td colspan="2"><center><br><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Update Email"/>&nbsp;<INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear <?php if(!isMobile()){echo 'Details';} ?>"></center></td>
        </tr>

        </table>
        </center>

        <input type="hidden" name="requiredpw1" title="Must Be At Least 8 Characters" value="<?php echo $pw1 ?>" readonly="readonly" maxlength="25" class="txtinput w3-input" size="40"></td> 
	</form>

    </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<!-- Modal -->
<div id="forgot_pass" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('forgot_pass').style.display='none'; resignup()" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Forgot Password</h4>
    </header>
	<form method="get" onSubmit="return checkrequired(this)" action="sky-forgot.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>" enctype="multipart/form-data">
        <center>
        <table>
        <tr>
        <td>Username</td>
        <td><input type="text" id="requiredemail" name="requiredemail" placeholder="email" maxlength="40" class="txtinput w3-input" size="40"></td> 
        </tr>

        <tr>
        <td></td>
        <td><br><input type="submit" class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Send Password"/>&nbsp;<INPUT type="RESET"  class="w3-button <?php echo 'w3-'.$footercolor; ?>" value="Clear Details"></td>
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
      <?php if (file_exists("myfiles/".$dir."/".strtolower($myinfo).".jpg")) {echo "<a href='myfiles/".$dir."/".strtolower($myinfo).".jpg' target='blank'><font color='blue'>".strtolower($myinfo).".jpg - View Photo</font></a>";}else{echo "No Photo Yet";} ?>
	<form method='post' action='sky-account.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>&requiredemail=<?php echo $test_email; ?>' enctype='multipart/form-data'>
        <center>
 	<input type="file" name="file" id="file_photo" style="display:inline"><?php if(isMobile()){echo '<br><br>';} ?>
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
	<form method='POST' action='sky-account.php?link=<?php echo $link ?>&dir=<?php echo $dir ?>' enctype='multipart/form-data'>
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
<div id="header" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('header').style.display='none'" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4>Your Header</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("myfiles/".$dir."/".strtolower($myinfo)."_header.jpg")) {echo "<a href='myfiles/".$dir."/".strtolower($myinfo)."_header.jpg' target='blank'><font color='blue'>".strtolower($myinfo)."_header.jpg - View Header</font></a>";}else{echo "No Header Image Yet";} ?>
	<form method='post' action='sky-account.php?requiredemail=<?php echo $test_email; ?>&link=<?php echo $link ?>&dir=<?php echo $dir ?>' enctype='multipart/form-data'>
        <center>
 	<input type="file" name="file" id="file_header" style="display:inline"><?php if(isMobile()){echo '<br><br>';} ?>
        <input type='submit' name='submit_header' value='Upload Header'><?php if(isMobile()){echo '<br><br>';} ?>
	</form>
    </div>
  </div>
</div>

<?php

  if ($login == "on"){

echo '<div id="post_review" class="w3-modal">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container">';
      echo '<span onclick="document.getElementById(\'post_review\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4>Post Review</h4>';
    echo '</header>';
    	echo '<div class="w3-container">';
    	echo "<form method='post' action='sky-account.php?requiredemail=".$test_email."&link=".$link."&dir=".$dir."&user=".$_REQUEST['user']."&flink=".$photo_link."' enctype='multipart/form-data'>";
        echo '<select class="w3-select w3-text-yellow" name="star_it" id="star_it">';
        echo '<option value="#9733;#9733;#9733;#9733;#9733;">&#9733;&#9733;&#9733;&#9733;&#9733;</option>';
        echo '<option value="#9733;#9733;#9733;#9733;">&#9733;&#9733;&#9733;&#9733;</option>';
        echo '<option value="#9733;#9733;#9733;">&#9733;&#9733;&#9733;</option>';
        echo '<option value="#9733;#9733;">&#9733;&#9733;</option>';
        echo '<option value="#9733;">&#9733;</option>';
        echo '</select>';

    	echo '<center>';
        echo '<textarea id="review_it" name="review_it" class="txtinput" style="width:100%" placeholder="Share details of your own experience at this place..." rows="6" maxlength="300"></textarea>';
    	echo "<input type='submit' name='submit' value='Post Review'>";
    	echo '</center></form><br>';
    echo '</div>';
  echo '</div>';
echo '</div>';

  }else{

echo '<div id="post_review" class="w3-modal">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container">';
      echo '<span onclick="document.getElementById(\'post_review\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4>Post Review</h4>';
    echo '</header>';
    	echo '<div class="w3-container">';
    	echo '<br>Login to post a review...<br><br>';
    echo '</div>';
  echo '</div>';
echo '</div>';

  }

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

function resignup(){if(mode == 2){document.getElementById('login2').style.display='block';}}
function Robocop(){if (document.getElementById("myCheck").checked){}else{document.getElementById('robot_check').style.display='block';}}

</script>