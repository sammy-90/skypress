<?php session_start(); ?>
<!DOCTYPE html>
<html id="top">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<style>

html {
  scroll-behavior: smooth;
}

select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    padding: 2px 30px 2px 2px;
    border: none;
}

.table {
  border-radius: 25px;
  border: 2px solid purple;
  background-color: white;
  padding: 20px;
  width: 200px;
  height: 150px;
}

table {font-size: 19px; padding: 20px;}

INPUT, select option, button {
  font-family: arial, verdana, ms sans serif;
  color: black; font-size: 12pt;
}

.gfont{width:100%;}

@media only screen and (max-width: 800px) {
  .txtinput,table{width:100%;}
  .select_it{width: 100%;}
}

</style>

<?php

  //version
  include "version.php"; include "ismobile.php"; include "index-settings.php"; $support="solo12121984@yahoo.com";

  //Pro Mode
  if (file_exists("../Search2Rank.php")){$Pro = 2;}else{$Pro = 1;}

  if(isset($_GET['logout'])){
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
  }else{
    session_start();
  }
  
  if(isset($_POST['password'])){ $_SESSION['password'] = $_POST['password'];}

  //save Settings
  if (isset($_GET['password2'])) {
    if($_GET['password'] == $_GET['password2']){
    $f=fopen('../sky-password.php','w');
    fwrite($f,'<?php $'."your_password='".$_GET['password']."' ?>");
    fclose($f);
    }else{echo "Passwords Don't Match";}
  }

  if(!file_exists("../sky-password.php")){
    echo "<br>\n"; 
    echo "<div style='display: block; position: absolute; left: 50%; top: 50%; margin-right: -50%; transform: translate(-50%, -50%);'><center>\n"; 
    echo "<table class=\"table\">\n"; 
    echo "<form action=\"index.php\" method=\"get\">\n"; 
    echo "<tr><td colspan=\"2\" align=\"center\"><img src=\"images/logos.jpg\" class=\"txtinput\"/></td></tr>\n"; 
    echo "<tr><td colspan=\"2\" align=\"center\"><strong>Set A Password</strong></td></tr>\n"; 
    echo "<tr>\n"; 
    echo "<td>* Password</td>\n"; 
    echo "<td><input type=\"password\" name=\"password\" class=\"txtinput\"></td>\n"; 
    echo "</tr>\n"; 
    echo "<tr>\n"; 
    echo "<td>* Retype Password</td>\n"; 
    echo "<td><input type=\"password\" name=\"password2\" class=\"txtinput\"></td>\n"; 
    echo "</tr>\n"; 
    echo "<tr>\n"; 
    echo "<td><input type=\"submit\" value=\"Create Account\"/></td>\n"; 
    echo "<td><INPUT type=\"RESET\" value=\"Clear Details\"></td>\n"; 
    echo "</tr>\n"; 
    echo "</form>\n"; 
    echo "</table>\n"; 
    echo "</div></center>\n";
    exit;
  }else{
    include "../sky-password.php";
  }

  if ($_SESSION['password'] !== $your_password){$logos = rand(0, 1); if ($logos == 1){$screener = "logos";$note = "Login Details";}else{$screener = "logos2";$note = $version;} 

    //Firewall Start
    $fire_mode = 1; include "../sky-firewall.php"; 

    echo "<br>\n"; 
    echo "<div style='display: block; position: absolute; left: 50%; top: 50%; margin-right: -50%; transform: translate(-50%, -50%);'><center>\n"; 
    echo "<table class=\"table w3-animate-left\">\n"; 
    echo "<form action=\"index.php\" method=\"POST\">\n"; 
    echo "<tr><td colspan=\"2\" align=\"center\"><img src=\"images/".$screener.".jpg\" class=\"txtinput w3-round\"/></td></tr>\n"; 
    echo "<tr><td colspan=\"2\" align=\"center\"><strong>".$note."</strong></td></tr>\n"; 
    echo "<tr>\n"; 
    echo "<td class=\"txtinput\">Username</td>\n"; 
    echo "<td><input value=\"Admin\" readonly=\"readonly\" class=\"txtinput\"></td>\n"; 
    echo "</tr>\n"; 
    echo "<tr>\n"; 
    echo "<td class=\"txtinput\">Password</td>\n"; 
    echo "<td><input type=\"password\" name=\"password\" class=\"txtinput\"></td>\n"; 
    echo "</tr>\n"; 
    echo "<tr>\n"; 
    echo "<td><input type=\"submit\" class=\"w3-purple w3-round w3-button\" value=\"Login\"/></td>\n"; 
    echo "<td>\n"; 
    if(!isMobile()){echo "<INPUT type=\"RESET\" class=\"w3-purple w3-round w3-button\" value=\"Reset\">&nbsp;<INPUT type=\"RESET\" class=\"w3-purple w3-round w3-button\" onclick=\"document.getElementById('forgot').style.display='block'\" value=\"Forgot PW\">";}else{echo "<INPUT type=\"RESET\" class=\"w3-purple w3-round w3-button\" value=\"Clear Details\">\n"; }
    echo "</td></tr>\n"; 
    echo "</form>\n"; 
    echo "</table>\n"; 
    echo "</div></center>\n";

    //Forgot Password
    echo '<div id="forgot" class="w3-modal">';
      echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
        echo '<header class="w3-container w3-purple w3-display-container">';
          echo '<span onclick="document.getElementById(\'forgot\').style.display=\'none\'" class="w3-button w3-purple w3-display-topright">X</span>';
          echo '<h4>Forgot Password</h4>';
        echo '</header>';
        echo '<div class="w3-container">';

    	echo "<form action=\"index.php\" class=\"w3-center\" method=\"POST\"><br>\n"; 
    	echo "<input name=\"forgot_pw\" id=\"forgot_pw\" class=\"txtinput\" placeholder=\"Paypal Email\">\n";  if(isMobile()){echo "<br><br>";}
    	echo "<input type=\"submit\" class=\"w3-purple w3-round w3-button\" value=\"Send Password\"/>\n";  
    	echo "</form><br>\n"; 

        echo '</div>';
      echo '</div>';
    echo '</div>';

    //Send Password
    if (isset($_POST['forgot_pw'])) {
     if (file_exists("../myfiles/settings.php")){include "../myfiles/settings.php";
      if (strtolower($_POST['forgot_pw']) == strtolower($paypal)){
        mail($paypal,"Skypress Password", $your_password);
        echo "<script>\n"; 
        echo "alert(\"Password Sent to ".$paypal."\");\n"; 
        echo "</script>\n";
      }else{
        echo "<script>\n"; 
        echo "alert(\"Paypal Email is not setup\");\n"; 
        echo "</script>\n";
      }
     }
    }

    $count=0; $dir = getcwd();
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {$count++;}
        closedir($dh);
      } 
      if ($count > (41+3)){$directory = "encoder2";
        foreach(glob("{$directory}/*") as $file){
          if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
          }else{
            unlink($file);
          }
        }
      }
    }

    exit;

  }else{

    //Firewall Pass
    if (isset($_SESSION['login_count'])){unset($_SESSION['login_count']);}

  }

  //Removal
  $removal  = array('"', '\\');

  //save Settings
  if (isset($_GET['template'])) {
    $skypress = explode("|", $_GET['template']);
    $f=fopen('../myfiles/settings.php','w');
    fwrite($f,'<?php'."\r\n");
    fwrite($f,'$title="'.str_replace($removal, "'", $_GET['title']).'";'."\r\n");
    fwrite($f,'$subtitle="'.str_replace($removal, "'", $_GET['subtitle']).'";'."\r\n");
    fwrite($f,'$author="'.str_replace($removal, "'", $_GET['author']).'";'."\r\n");
    fwrite($f,'$keywords="'.str_replace($removal, "'", $_GET['keywords']).'";'."\r\n");
    fwrite($f,'$fulltemplate="'.$_GET['template'].'";'."\r\n");
    fwrite($f,'$template="'.$skypress[0].'";'."\r\n");
    fwrite($f,'$type="'.$skypress[1].'";'."\r\n");
    fwrite($f,'$effects="'.$_GET['effects'].'";'."\r\n");
    fwrite($f,'$content="'.$_GET['content'].'";'."\r\n");
    fwrite($f,'$pagecolor="'.$_GET['pagecolor'].'";'."\r\n");
    fwrite($f,'$panelcolor="'.$_GET['panelcolor'].'";'."\r\n");
    fwrite($f,'$footercolor="'.str_replace($removal, "'", $_GET['footercolor']).'";'."\r\n");
    fwrite($f,'$fontcolor="'.str_replace($removal, "'", $_GET['fontcolor']).'";'."\r\n");
    fwrite($f,'$linkcolor="'.str_replace($removal, "'", $_GET['linkcolor']).'";'."\r\n");
    fwrite($f,'$themecolor="'.str_replace($removal, "'", $_GET['themecolor']).'";'."\r\n");
    fwrite($f,'$progressbar="'.str_replace($removal, "'", $_GET['progressbar']).'";'."\r\n");
    fwrite($f,'$gfont="'.str_replace($removal, "'", $_GET['gfont']).'";'."\r\n");
    fwrite($f,'$address="'.str_replace($removal, "'", $_GET['address']).'";'."\r\n");
    fwrite($f,'$phone_number="'.str_replace($removal, "'", $_GET['phone_number']).'";'."\r\n");
    fwrite($f,'$zelle="'.str_replace($removal, "'", $_GET['zelle']).'";'."\r\n");
    fwrite($f,'$hours="'.str_replace($removal, "'", $_GET['hours']).'";'."\r\n");
    fwrite($f,'$paypal="'.str_replace($removal, "'", $_GET['paypal']).'";'."\r\n");
    fwrite($f,'$cashapp='."'".str_replace($removal, "'", $_GET['cashapp'])."';"."\r\n");
    fwrite($f,'$fb="'.str_replace($removal, "'", $_GET['fb']).'";'."\r\n");
    fwrite($f,'$twitter="'.str_replace($removal, "'", $_GET['twitter']).'";'."\r\n");
    fwrite($f,'$sc="'.str_replace($removal, "'", $_GET['sc']).'";'."\r\n");
    fwrite($f,'$pinterest="'.str_replace($removal, "'", $_GET['pinterest']).'";'."\r\n");
    fwrite($f,'$instagram="'.str_replace($removal, "'", $_GET['instagram']).'";'."\r\n");
    fwrite($f,'$linkedin="'.str_replace($removal, "'", $_GET['linkedin']).'";'."\r\n");
    fwrite($f,'$background="'.str_replace($removal, "'", $_GET['background']).'";'."\r\n");
    fwrite($f,'$squeeze_title="'.str_replace($removal, "'", $_GET['squeeze_title']).'";'."\r\n");
    fwrite($f,'$squeeze_desc="'.str_replace($removal, "'", $_GET['squeeze_desc']).'";'."\r\n");
    fwrite($f,'$download_title="'.str_replace($removal, "'", $_GET['download_title']).'";'."\r\n");
    fwrite($f,'$download_desc="'.str_replace($removal, "'", $_GET['download_desc']).'";'."\r\n");
    fwrite($f,'$download_link="'.str_replace($removal, "'", $_GET['download_link']).'";'."\r\n");

    //Dropdown Menu
    fwrite($f,'$delivery="'.$_GET['delivery'].'";'."\r\n");
    fwrite($f,'$os="'.$_GET['os'].'";'."\r\n");
    fwrite($f,'$class="'.$_GET['class'].'";'."\r\n");
    fwrite($f,'$blog="'.$_GET['blog'].'";'."\r\n");
    fwrite($f,'$store="'.$_GET['store'].'";'."\r\n");
    fwrite($f,'$music="'.$_GET['music'].'";'."\r\n");
    fwrite($f,'$videos="'.$_GET['videos'].'";'."\r\n");
    fwrite($f,'$gallery="'.$_GET['gallery'].'";'."\r\n");
    fwrite($f,'$games="'.$_GET['games'].'";'."\r\n");
    fwrite($f,'$tv="'.$_GET['tv'].'";'."\r\n");
    fwrite($f,'$radio="'.$_GET['radio'].'";'."\r\n");
    fwrite($f,'$packages="'.$_GET['packages'].'";'."\r\n");
    fwrite($f,'$rank="'.$_GET['rank'].'";'."\r\n");
    fwrite($f,'$course="'.$_GET['course'].'";'."\r\n");
    fwrite($f,'$portal="'.$_GET['portal'].'";'."\r\n");
    fwrite($f,'$advertisers="'.$_GET['advertisers'].'";'."\r\n");
    fwrite($f,'$url_submit="'.$_GET['url_submit'].'";'."\r\n");
    fwrite($f,'$squeeze="'.$_GET['squeeze'].'";'."\r\n");
    fwrite($f,'$m_download="'.$_GET['m_download'].'";'."\r\n");
    fwrite($f,'$application="'.$_GET['application'].'";'."\r\n");
    fwrite($f,'$contact_us="'.$_GET['contact_us'].'";'."\r\n");
    fwrite($f,'$contact_msg="'.$_GET['contact_msg'].'";'."\r\n");
    fwrite($f,'$dir="'.$_GET['dir'].'";'."\r\n");
    fwrite($f,'$menu="'.$_GET['menu'].'";'."\r\n");
    fwrite($f,'$shares="'.$_GET['shares'].'";'."\r\n");

    //Count Menu Items
    $menuc = 0;
    if ($_GET['delivery'] == "Show"){$menuc++;}
    if ($_GET['class'] == "Show"){$menuc++;}
    if ($_GET['os'] == "Show"){$menuc++;}
    if ($_GET['blog'] == "Show"){$menuc++;}
    if ($_GET['store'] == "Show"){$menuc++;} 
    if ($_GET['music'] == "Show"){$menuc++;} 
    if ($_GET['videos'] == "Show"){$menuc++;} 
    if ($_GET['gallery'] == "Show"){$menuc++;}  
    if ($_GET['games'] == "Show"){$menuc++;}  
    if ($_GET['tv'] == "Show"){$menuc++;} 
    if ($_GET['radio'] == "Show"){$menuc++;} 
    if ($_GET['packages'] == "Show"){$menuc++;} 
    if ($_GET['course'] == "Show"){$menuc++;} 
    if ($_GET['portal'] == "Show"){$menuc++;} 
    if ($_GET['advertisers'] == "Show"){$menuc++;} 
    if ($_GET['url_submit'] == "Show"){$menuc++;} 
    if ($_GET['squeeze'] == "Show"){$menuc++;} 
    if ($_GET['m_download'] == "Show"){$menuc++;} 
    if ($_GET['application'] == "Show"){$menuc++;} 
    if ($_GET['dir'] == "Show"){$menuc++;} 
    if ($_GET['shares'] == "Show"){$menuc++;} 
    fwrite($f,'$menuc="'.$menuc.'";'."\r\n");

    //prompt boxes
    fwrite($f,'$signup_box="'.$_GET['signup_box'].'";'."\r\n");
    fwrite($f,'$download_box="'.$_GET['download_box'].'";'."\r\n");
    fwrite($f,"if(file_exists('myfiles/settings-content.php')){include 'myfiles/settings-content.php';}"."\r\n");

    if ($Pro == 2){fwrite($f,'$footertext="'.$_GET['title'].'";'."\r\n");}else{fwrite($f,'$footertext="Built using <a href=\"'.$domain.'/skypress.php\" target=\"_blank\">SkyPress</a>";'."\r\n");}

    fwrite($f,'?>');
    fclose($f);

    //Auto Save
    if ((!$_GET['goto']) && (!$_GET['goto2']) && (!$_GET['goto3']) && (!$_GET['goto4']) && (!$_GET['goto5']) && (!$_GET['goto6']) && (!$_GET['goto7']) && (!$_GET['goto8']) && (!$_GET['goto9']) && (!$_GET['goto10']) && (!$_GET['goto11'])){
      echo "<script>\n"; 
      echo "alert(\"Settings Are Saved...\");\n"; 
      echo "</script>\n";
    }else{
      if ($_GET['goto']){header( "Location: ".$_GET['goto']);   if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto']) === false){echo "<script>window.location.href='".$_GET['goto']."';</script>";}} 
      if ($_GET['goto2']){header( "Location: ".$_GET['goto2']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto2']) === false){echo "<script>window.location.href='".$_GET['goto2']."';</script>";}} 
      if ($_GET['goto3']){header( "Location: ".$_GET['goto3']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto3']) === false){echo "<script>window.location.href='".$_GET['goto3']."';</script>";}} 
      if ($_GET['goto4']){header( "Location: ".$_GET['goto4']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto4']) === false){echo "<script>window.location.href='".$_GET['goto4']."';</script>";}} 
      if ($_GET['goto5']){header( "Location: ".$_GET['goto5']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto5']) === false){echo "<script>window.location.href='".$_GET['goto5']."';</script>";}} 
      if ($_GET['goto6']){header( "Location: ".$_GET['goto6']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto6']) === false){echo "<script>window.location.href='".$_GET['goto6']."';</script>";}} 
      if ($_GET['goto7']){header( "Location: ".$_GET['goto7']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto7']) === false){echo "<script>window.location.href='".$_GET['goto7']."';</script>";}} 
      if ($_GET['goto8']){header( "Location: ".$_GET['goto8']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto8']) === false){echo "<script>window.location.href='".$_GET['goto8']."';</script>";}} 
      if ($_GET['goto9']){header( "Location: ".$_GET['goto9']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto9']) === false){echo "<script>window.location.href='".$_GET['goto9']."';</script>";}} 
      if ($_GET['goto10']){header( "Location: ".$_GET['goto10']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto10']) === false){echo "<script>window.location.href='".$_GET['goto10']."';</script>";}} 
      if ($_GET['goto11']){header( "Location: ".$_GET['goto11']); if (strpos($_SERVER['SCRIPT_FILENAME'], $_GET['goto11']) === false){echo "<script>window.location.href='".$_GET['goto11']."';</script>";}} 
    }
  }


  //Upload Files
  if(isset($_POST['submit'])){
 
    // Count total files
    $countfiles = count($_FILES['file']['name']);

    // Looping all files
    for($i=0;$i<$countfiles;$i++){

      $filename = $_FILES['file']['name'][$i];
 
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'][$i],'..'.$_POST['display_folder'].$filename);
 
    }

    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 


  //Save post
  if (($_GET['Body_Title']) && ($_GET['Body_Text'])){
    $f=fopen('../myfiles/'.str_replace($removal, "", $_GET['Body_Title']).".txt",'w');
    fwrite($f,str_replace($removal, "'", $_GET['Body_Text']));
    fclose($f);

    echo "<script>\n"; 
    echo "alert(\"Post Upload Successful...\");\n"; 
    echo "</script>\n";
  }


  //Save Store Qty
  if (isset($_POST['store_qty'])){
    $f=fopen('../myfiles/settings_store_qty.php','w');
    fwrite($f,'<?php'."\r\n");
    fwrite($f,'$store_qty="'.$_POST['store_qty'].'";'."\r\n");
    fwrite($f,'?>');
    fclose($f);

    echo "<script>\n"; 
    echo "alert(\"Store Qty Updated...\");\n"; 
    echo "</script>\n";
  }

  //Upload Header
  if(isset($_POST['submit_header'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'../myfiles/'.'header.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload Header
  if(isset($_POST['submit_header2'])){
 
    // Upload file
    move_uploaded_file($_FILES['file2']['tmp_name'],'../myfiles/'.'header2.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload Header
  if(isset($_POST['submit_header3'])){
 
    // Upload file
    move_uploaded_file($_FILES['file3']['tmp_name'],'../myfiles/'.'header3.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 


  //Upload Logo
  if(isset($_POST['submit_logo'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'../myfiles/'.'logo.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 


  //Upload Store Items Images
  if(isset($_POST['submit_store_image'])){

    //Image Compressions
    $maxDim = 245;
    $file_name = $_FILES['file']['tmp_name'];
    list($width, $height, $type, $attr) = getimagesize( $file_name );
    if ( $width > $maxDim || $height > $maxDim ) {
      $target_filename = $file_name;
      $ratio = $width/$height;
      if( $ratio > 1) {
        
        $new_height = $maxDim/$ratio;
      } else {
        $new_width = $maxDim*$ratio;
        $new_height = $maxDim;
      }$new_height = $maxDim;$new_width = $maxDim*$ratio;
      $src = imagecreatefromstring( file_get_contents( $file_name ) );
      $dst = imagecreatetruecolor( $new_width, $new_height );
      imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
      imagedestroy( $src );
      imagepng( $dst, $target_filename ); // adjust format as needed
      imagedestroy( $dst );
    }
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'../myfiles/'.pathinfo($_FILES['file']['name'], PATHINFO_FILENAME).'.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Store Item Upload Successful...\");\n"; 
    echo "</script>\n";

  } 


  //Upload Store Items Videos
  if(isset($_POST['submit_store_video'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'../myfiles/'.$_FILES['file']['name']);
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 


  //Upload Photo
  if(isset($_POST['submit_photo'])){

    //Image Compressions
    $maxDim = 320;
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
    move_uploaded_file($_FILES['file']['tmp_name'],'../myfiles/'.'photo.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 


  //Upload Favicon
  if(isset($_POST['submit_Favicon'])){

    //Image Compressions
    $maxDim = 32;
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
    move_uploaded_file($_FILES['file']['tmp_name'],'../myfiles/'.'favicon-32x32.png');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload thumbnail
  if(isset($_POST['submit_thumbnail'])){

    //Image Compressions
    $maxDim = 150;
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
    move_uploaded_file($_FILES['file']['tmp_name'],'../myfiles/'.pathinfo($_FILES['file']['name'], PATHINFO_FILENAME).'.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload CSV Database
  if(isset($_POST['submit_csv'])){

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'../database.csv');
 
    echo "<script>\n"; 
    echo "alert(\"Database Upload Successful...\");\n"; 
    echo "</script>\n";

  }


  //Upload Template
  if(isset($_POST['submit_import'])){

   $dir = "../myfiles/import";
   function deleteDirectory($dir) {
     if (!file_exists($dir)) {
       return true;
     }

     if (!is_dir($dir)) {
       return unlink($dir);
     }

     foreach (scandir($dir) as $item) {
       if ($item == '.' || $item == '..') {
         continue;
       }

       if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
         return false;
       }

     }

     return rmdir($dir);
   }deleteDirectory($dir);
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'../myfiles/'.'import.zip');

    $zip = new ZipArchive;
    $res = $zip->open('../myfiles/'.'import.zip');
    if ($res === TRUE) {
      $zip->extractTo('../myfiles/import');
      $zip->close();
    }

    //Find Images Path
    $save_images = "na";
    for ($x = 0; $x <= 2; $x++) {
      if($x == 1){$dir = '../myfiles/import';}
      if($x == 2){$dir .= "/".$file;}
      $scan = scandir($dir);
      foreach($scan as $file) {
        if (strpos($file, ".") === false){
          if ((strtolower($file) == "images") || (strtolower($file) == "img")){
            $save_images = $dir."/".$file;
            break;
          }else{

            if($x == 2){
	      $scan2 = scandir($dir."/".$file);
                foreach($scan2 as $file2) {
	          if (strpos($file2, ".") === false){
                    if ((strtolower($file2) == "images") || (strtolower($file2) == "img")){
                      $save_images = $dir."/".$file."/".$file2;  
                      break;
                    }
                  }
                }
            }

          }
        }
      }
    }
   
    //save import path
    //echo $save_images; 
    $match = 0;
    $scan3 = scandir($save_images); 
    $home = str_replace("sky-admin\index.php",'', __FILE__); 
    foreach($scan3 as $file3){ list($width, $height) = getimagesize($save_images."/".$file3); 
      if ($width > 1500){
        if (strpos($file3, ".jpg") !== false){
          if ((strpos(strtolower($file3), "header") !== false) || (strpos(strtolower($file3), "background") !== false)){
            $match++;
            rename($save_images."/".$file3, $home.'/myfiles/header.jpg');
          }else{
            $match++;
            if ($match == 1){rename($save_images."/".$file3, $home.'/myfiles/header.jpg');}
            if ($match == 2){rename($save_images."/".$file3, $home.'/myfiles/header2.jpg');}
            if ($match == 3){rename($save_images."/".$file3, $home.'/myfiles/header3.jpg');}
            if ($match == 4){rename($save_images."/".$file3, $home.'/myfiles/header3.jpg');}
          }
         }
       }
    }


    //Adjust Theme Headers
    if ($match < 2){if (file_exists($home.'/myfiles/header2.jpg')){unlink($home.'/myfiles/header2.jpg');}if (file_exists($home.'/myfiles/header3.jpg')){unlink($home.'/myfiles/header3.jpg');}}
    if ($match == 2){if (file_exists($home.'/myfiles/header3.jpg')){unlink($home.'/myfiles/header3.jpg');}}

    //Save Themes
    $save_images = str_replace("../","",$save_images); 
    $f=fopen('../myfiles/import-settings.php','w');
    fwrite($f,'<?php'."\r\n");
    fwrite($f,'$import="'.str_replace($removal, "'", $save_images).'";'."\r\n");
    fwrite($f,'?>');
    fclose($f);
 
    echo "<script>\n"; 
    echo "alert(\"Template Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Delete Template
  if(isset($_POST['template_delete'])){

   $dir = "../myfiles/import";

   function deleteDirectory($dir) {
     if (!file_exists($dir)) {
       return true;
     }

     if (!is_dir($dir)) {
       return unlink($dir);
     }

     foreach (scandir($dir) as $item) {
       if ($item == '.' || $item == '..') {
         continue;
       }

       if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
         return false;
       }

     }

     return rmdir($dir);
   }deleteDirectory($dir); unlink("../myfiles/import.zip");


    echo "<script>\n"; 
    echo "alert(\"Template Deleted Successful...\");\n"; 
    echo "</script>\n";

  } 


  //Password Reset
  if(isset($_GET['password_reset'])){

    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
 
    //Reset
    unlink('../sky-password.php'); header('Location: index.php '); 

    echo "<script>\n"; 
    echo "alert(\"Password Delete...\");\n"; 
    echo "</script>\n";

  } 


  //Hard Reset
  if(isset($_GET['hard_reset'])){
 
    //Reset
    rename("../myfiles", "../backup-".str_replace(':', "_", date('m-d-Y_H:i:s'))); 
    rename("../sky-hardset - Copy", "../myfiles"); 

    echo "<script>\n"; 
    echo "alert(\"Skypress Reset Complete...\");\n"; 
    echo "</script>\n";

  }


  //Undo Reset
  if(isset($_GET['undo_reset'])){
 
    //Reset
    if ($handle = opendir('../')) {

      while (false !== ($entry = readdir($handle))) {

        if (strpos(strtolower($entry), strtolower("backup")) !== false){
          rename("../myfiles", "../backup"); rename("../$entry", "../myfiles"); break;
        }

      }  
      closedir($handle);

    }

    echo "<script>\n"; 
    echo "alert(\"Undo Reset Complete...\");\n"; 
    echo "</script>\n";

  }

  //Backup Site
  if(isset($_GET['backup_site'])){
 
    //Delete Old Backup
    if (file_exists("../backup_site.zip")){unlink("../backup_site.zip");}

    //Build Sotware Zip
    $rootPath = realpath('../');

    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open('../backup_site.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

    // Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($rootPath),
      RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($files as $name => $file){

      //echo $file->getRealPath()."<br>"; //Debug

         //Add Extra Time
         set_time_limit(60); 

        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        if (!$file->isDir()){

          // Add current file to archive
          $zip->addFile($filePath, $relativePath);

        }else{

          $zip->addEmptyDir($relativePath);

        }

    }

    // Zip archive will be created only after closing object
    $zip->close();

    echo "<script>\n"; 
    echo "alert(\"Site Backup Complete...\");\n"; 
    echo "</script>\n";

  }

  //Send ticket
  if (isset($_GET['support_text'])) {
    mail($support,"Skypress Support",$_GET['support_text']);
    echo "<script>\n"; 
    echo "alert(\"Ticket Sent...\");\n"; 
    echo "</script>\n";
  }

 
  //Loading Settings
  if (file_exists("../myfiles/settings.php")){include "../myfiles/settings.php";}
  if (file_exists("../myfiles/settings_store_qty.php")){include "../myfiles/settings_store_qty.php";}


  //Delete File Myfiles
  if(isset($_GET['delete'])){
    unlink("../myfiles/".$_GET['delete']);
    echo '<script>alert("'.$_GET['delete'].' deleted...")</script>';
  }

  //Password Reset
  if(isset($_GET['delete_leads'])){
 
    if ($_GET['delete_leads'] == 'emails.php'){

      //Reset
      unlink('../myfiles/widgets/emails.php');

      echo "<script>\n"; 
      echo "alert(\"Emails Deleted...\");\n"; 
      echo "</script>\n";

    }

  }

  //email_title
  if ((isset($_GET['email_title'])) && (isset($_GET['email_msg'])) && (file_exists('../myfiles/widgets/emails.php'))){
  
      include "../myfiles/widgets/emails.php";
      $pieces = explode("|", $list);
      for ($i = 0; $i < count($pieces); $i++) {
        set_time_limit(60); //Add More Time 
        mail($pieces[$i],$_GET['email_title'],$_GET['email_msg']);
      }

      echo "<script>\n"; 
      echo "alert(\"Emails Sent...\");\n"; 
      echo "</script>\n";

  } 

  //Download
  if(isset($_GET['download'])){
    if ($_GET['download']== "myfiles/widgets/emails.php"){
      if (file_exists('../myfiles/widgets/emails.php')){ include '../myfiles/widgets/emails.php';
  	header('Content-Disposition: attachment; filename="emails.txt"');
        header('Content-type: ' . $list); // concatenation
  	echo $list; exit;
      }
    }
  }


  //repair
  if(isset($_GET['repair'])){
    if ($_GET['repair']== "myfiles/repair.php"){

function smartCopy($source, $dest, $options=array('folderPermission'=>0755,'filePermission'=>0755)){

    $result=false;

    if (is_file($source)) {
        if ($dest[strlen($dest)-1]=='/') {
            if (!file_exists($dest)) {
                cmfcDirectory::makeAll($dest,$options['folderPermission'],true);
            }
            $__dest=$dest."/".basename($source);
        } else {
            $__dest=$dest;
        }
        $result=copy($source, $__dest);
        @chmod($__dest,$options['filePermission']);

    } elseif(is_dir($source)) {
        if ($dest[strlen($dest)-1]=='/') {
            if ($source[strlen($source)-1]=='/') {
                //Copy only contents
            } else {
                //Change parent itself and its contents
                $dest=$dest.basename($source);
                if(!file_exists($dest)) mkdir($dest);
                @chmod($dest,$options['filePermission']);
            }
        } else {
            if ($source[strlen($source)-1]=='/') {
                //Copy parent directory with new name and all its content
                if(!file_exists($dest)) mkdir($dest,$options['folderPermission']);
                @chmod($dest,$options['filePermission']);
            } else {
                //Copy parent directory with new name and all its content
                if(!file_exists($dest)) mkdir($dest,$options['folderPermission']);
                @chmod($dest,$options['filePermission']);
            }
        }

        $dirHandle=opendir($source);
        while($file=readdir($dirHandle))
        {
            if($file!="." && $file!="..")
            {
                 if(!is_dir($source."/".$file)) {
                    $__dest=$dest."/".$file;
                } else {
                    $__dest=$dest."/".$file;
                }
                //echo "$source/$file ||| $__dest<br />";
                $result=smartCopy($source."/".$file, $__dest, $options);
            }
        }
        closedir($dirHandle);

    } else {
        $result=false;
    }
    return $result;
}

smartCopy('encoder2/sky-repair/', 'encoder2/'); 

mail($support,"Skypress Repair",$_SERVER['SERVER_NAME'].' '.$title.' '.$paypal);
echo "<script>\n"; 
echo "alert(\"Repair Complete...\");\n"; 
echo "</script>\n";

    }
  }


  //Delete Classifieds
  if(isset($_GET['delete_ads'])){
    if ($_GET['delete_ads'] == "classified.txt"){
      unlink("../myfiles/widgets/".$_GET['delete_ads']);
      echo "<script>\n"; 
      echo "alert(\"Classifieds Deleted...\");\n"; 
      echo "</script>\n";
    }
  } 


  //Delete Header
  if(isset($_POST['header1'])){
    if($_POST['header1'] == 'Delete'){

      $dir = "../myfiles/header.jpg";
      unlink($dir);

      echo "<script>\n"; 
      echo "alert(\"header 1 Deleted...\");\n"; 
      echo "</script>\n";

    }
  }
  if(isset($_POST['header2'])){
    if($_POST['header2'] == 'Delete'){

      $dir = "../myfiles/header2.jpg";
      unlink($dir);

      echo "<script>\n"; 
      echo "alert(\"header 2 Deleted...\");\n"; 
      echo "</script>\n";

    }
  } 
  if(isset($_POST['header3'])){
    if($_POST['header3'] == 'Delete'){

      $dir = "../myfiles/header3.jpg";
      unlink($dir);

      echo "<script>\n"; 
      echo "alert(\"Header 3 Deleted...\");\n"; 
      echo "</script>\n";

    }
  } 


?>

<body>

<!-- Top -->
<div class="w3-top w3-animate-left">
  <div class="w3-row w3-purple w3-padding">
    <div class="w3-half" style="margin:4px 0 6px 0"><a href='<?php echo $domain ?>/skypress.php' target='blank'><big><?php echo $version; if($Pro==2){echo " PRO";} ?></big></a></div>
    <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small"><div class="w3-right">THE WORLD'S FASTEST SITE BUILDER</div></div>
  </div>
</div>

<div class="w3-row w3-margin">

<div class="container w3-rest">
<form name="form" action="index.php" method="get"> 
<input class="w3-round w3-button w3-purple" type="button" onclick="location.href='?logout=out'" value="Sign Out"/>
<input class="w3-round w3-button w3-purple" type="submit" value="Save"/>
<input class="w3-round w3-button w3-purple" type="button" onclick="window.open('../index.php')" value="My Site"/>
<?php if(isMobile()){echo "<br><br>";} ?>
<input class="w3-round w3-button w3-purple" type="button" onclick="window.open('../stats/index.php?pw=<?php echo $_SESSION['password'];?>')" value="Analytics"/>
<?php if (file_exists("index-custom.php")){echo '<input class="w3-round w3-button w3-purple" type="button" onclick="location.href=\'index-custom.php\'" value="Custom Settings"/>';} ?>
</div>

<br>

<?php 

if(!isMobile()){echo '<div class="w3-container w3-half z-index:3">';}else{echo '<hr><div class="w3-half">';} 

?>

  <div class="w3-bar light-grey">
    <button type="button" class="w3-bar-item w3-button tablink w3-purple" onclick="opentab(event,'layout'); closesubs();"><big>Layout</big></button>
    <button type="button" class="w3-bar-item w3-button tablink" onclick="opentab(event,'business')"><big>Info</big></button>
    <button type="button" class="w3-bar-item w3-button tablink" onclick="opentab(event,'social_links')"><big>Social</big></button>
    <button class="w3-bar-item w3-button tablink" id="goto" name="goto" value="index-content.php"><big>Content</big></button>
    <button class="w3-bar-item w3-button tablink" id="goto2" name="goto2" value="index-custom-links.php"><big>Custom Links</big></button>
    <button type="button" class="w3-bar-item w3-button tablink" onclick="document.getElementById('help').style.display='block'"><big>Help</big></button>
  </div>
  

  <?php if(!isMobile()){echo '<div id="layout" class="w3-container w3-border tab">';}else{echo '<div id="layout" class="tab"><hr>';} ?>
  
<table>
<tr title="Replace Text With Your Own"> 
<td>Title&nbsp;</td> 
<td><input type="text" id="title" name="title"  style="border: 0px none;" placeholder="My SkyPress" maxlength="25" <?php if (!$title){echo 'value="My SkyPress"';}else{echo 'value="'.$title.'"';} ?> class="txtinput" size="40"></td> 
</tr> 
<tr title="Your Description Meta Tag Info"> 
<td>SubTitle&nbsp;</td> 
<td><input type="text" id="subtitle" name="subtitle"  style="border: 0px none;" placeholder="Welcome To My SkyPress Site" maxlength="150" <?php if (!$subtitle){echo 'value="Welcome To My SkyPress Site"';}else{echo 'value="'.$subtitle.'"';} ?> class="txtinput" size="40"></td> 
</tr> 

<tr title="Replace Text With Your Own"> 
<td>Author&nbsp;</td> 
<td><input type="text" id="author" name="author"  style="border: 0px none;" placeholder="Your Name" maxlength="25" <?php if ($author){echo 'value="'.$author.'"';} ?> class="txtinput" size="40"></td> 
</tr> 

<tr title="Your Keywords Meta Tag Info" class="select_it"> 
<td>Keywords&nbsp;</td> 
<td><input type="text" id="keywords" name="keywords"  style="border: 0px none;" placeholder="Your Keywords For Search Engines" maxlength="200" <?php if ($keywords){echo 'value="'.$keywords.'"';} ?> class="txtinput" size="40"></td> 
</tr> 

<tr title="Upload header.jpg"> 
<td>Header&nbsp;</td> 
<td><a href="#" onclick="document.getElementById('header').style.display='block'"><font color="blue">Upload Image</font></a></td> 
</tr> 

<tr title="Upload logo.jpg"> 
<td>Logo&nbsp;</td> 
<td><a href="#" onclick="document.getElementById('logo').style.display='block'"><font color="blue">Upload Image</font></a></td> 
</tr> 

<tr title="Upload Photo.jpg"> 
<td>Photo&nbsp;</td> 
<td><a href="#" style="cursor: pointer;" onclick="document.getElementById('photo').style.display='block'"><font color="blue">Upload Photo</font></a></td> 
</tr> 

<tr title="Upload 32x32 Favicon.png"> 
<td>Favicon&nbsp;</td> 
<td><a href="#" style="cursor: pointer;" onclick="document.getElementById('favicon').style.display='block'"><font color="blue">Upload Favicon</font></a></td> 
</tr> 

<tr title="Upload 150x150 Thumbnails"> 
<td>Thumbnails&nbsp;</td> 
<td><a href="#" style="cursor: pointer;" onclick="document.getElementById('thumbnail').style.display='block'"><font color="blue">Upload Thumbnails</font></a></td> 
</tr>

<tr>
<td>Template&nbsp;</td>
<td>
    <select id="template" name="template" class="select_it" title="Choose your main template" style="border: 0px none;cursor: pointer;" onChange="myFunction()";>
       <?php if ($fulltemplate){echo "<OPTION selected>".$fulltemplate."</option>";} ?>
       <option value="sky-application.php|Application">Application</option>

       <option value="sky-business_dir.php|Business">Business Directory</option>
       <?php if (file_exists("../sky-business_dir2.php")){echo '<option value="sky-business_dir2.php|Business Directory 2">Business Directory 2</option>';} ?>

       <option value="sky-classified.php|Classified">Classified</option>
       <option value="sky-contact.php|Contact Form">Contact Form</option>
       <option value="sky-course.php|Course">Course</option>

       <option value="sky-custom-t.php|Custom Template (Blank)">Custom Template (Blank)</option>
       <option value="sky-custom-t2.php|Custom Template (Header/Footer)">Custom Template (Header/Footer)</option>
       <option value="sky-custom-t3.php|Custom Template (Header/Footer/Background)">Custom Template (Header/Footer/Background)</option>

       <option value="sky-delivery.php|Delivery">Delivery</option>
       <option value="sky-os.php|Desktop">Desktop</option>
       <option value="sky-download.php|Download">Download</option>
       <option value="sky-radio.php|Internet Radio">Internet Radio</option>
       <option value="sky-tv.php|Internet TV">Internet TV</option>

       <option value="sky-packages.php|Packages">Packages</option>
       <option value="sky-portal.php|Portal">Portal</option>
       <option value="sky-portal-2.php|Portal">Portal 2</option>

       <option value="sky-search.php|Search Engine">Search Engine</option>
       <option value="sky-search-2.php|Search Engine">Search Engine 2</option>
       <option value="sky-search-3.php|Search Engine">Search Engine 3</option>
       <?php if (file_exists("../sky-search-4.php")){echo '<option value="sky-search-4.php|CSV Search Engine">CSV Search Engine</option>';} ?>
       <option value="sky-cast.php|Skycast Radio">Skycast Radio</option>
       <option value="sky-cast2.php|Skycast TV">Skycast TV</option>
       <option value="sky-squeeze-page.php|Squeeze Page">Squeeze Page</option>
       <option value="sky-blog0.php|blog">Template 0 - Main</option>

       <option value="sky-blog1.php|blog">Template 1 - Blog</option>
       <option value="sky-blog1.php|shop">Template 1 - Store</option>
       <option value="sky-blog1.php|music">Template 1 - Music</option>
       <option value="sky-blog1.php|videos">Template 1 - Videos</option>
       <option value="sky-blog1.php|photos">Template 1 - Gallery</option>
       <option value="sky-blog1.php|games">Template 1 - Gaming</option>
       <option value="sky-blog1.php|radio">Template 1 - Radio</option>
       <option value="sky-blog1.php|tv">Template 1 - TV</option>

       <option value="sky-blog2.php|blog2">Template 2 - Blog</option>
       <option value="sky-blog2.php|shop">Template 2 - Store</option>
       <option value="sky-blog2.php|music">Template 2 - Music</option>
       <option value="sky-blog2.php|videos">Template 2 - Videos</option>
       <option value="sky-blog2.php|photos">Template 2 - Gallery</option>
       <option value="sky-blog2.php|games">Template 2 - Gaming</option>
       <option value="sky-blog2.php|radio">Template 2 - Radio</option>
       <option value="sky-blog2.php|tv">Template 2 - TV</option>

       <option value="sky-blog3.php|blog">Template 3 - Blog</option>
       <option value="sky-blog3.php|shop">Template 3 - Store</option>
       <option value="sky-blog3.php|music">Template 3 - Music</option>
       <option value="sky-blog3.php|videos">Template 3 - Videos</option>
       <option value="sky-blog3.php|photos">Template 3 - Gallery</option>
       <option value="sky-blog3.php|games">Template 3 - Gaming</option>
       <option value="sky-blog3.php|radio">Template 3 - Radio</option>
       <option value="sky-blog3.php|tv">Template 3 - TV</option>

       <option value="sky-blog4.php|blog">Template 4 - Blog</option>
       <option value="sky-blog4.php|shop">Template 4 - Store</option>
       <option value="sky-blog4.php|music">Template 4 - Music</option>
       <option value="sky-blog4.php|videos">Template 4 - Videos</option>
       <option value="sky-blog4.php|photos">Template 4 - Gallery</option>
       <option value="sky-blog4.php|games">Template 4 - Gaming</option>
       <option value="sky-blog4.php|radio">Template 4 - Radio</option>
       <option value="sky-blog4.php|tv">Template 4 - TV</option>

       <option value="sky-blog5.php|blog">Template 5 - Blog</option>
       <option value="sky-blog5.php|shop">Template 5 - Store</option>
       <option value="sky-blog5.php|music">Template 5 - Music</option>
       <option value="sky-blog5.php|videos">Template 5 - Videos</option>
       <option value="sky-blog5.php|photos">Template 5 - Gallery</option>
       <option value="sky-blog5.php|games">Template 5 - Gaming</option>
       <option value="sky-blog5.php|radio">Template 5 - Radio</option>
       <option value="sky-blog5.php|tv">Template 5 - TV</option>

       <option value="sky-blog6.php|blog">Template 6 - Blog</option>
       <option value="sky-blog6.php|shop">Template 6 - Store</option>
       <option value="sky-blog6.php|music">Template 6 - Music</option>
       <option value="sky-blog6.php|videos">Template 6 - Videos</option>
       <option value="sky-blog6.php|photos">Template 6 - Gallery</option>
       <option value="sky-blog6.php|games">Template 6 - Gaming</option>
       <option value="sky-blog6.php|radio">Template 6 - Radio</option>
       <option value="sky-blog6.php|tv">Template 6 - TV</option>

       <option value="sky-blog7.php|blog">Template 7 - Blog</option>
       <option value="sky-blog7.php|shop">Template 7 - Store</option>
       <option value="sky-blog7.php|music">Template 7 - Music</option>
       <option value="sky-blog7.php|videos">Template 7 - Videos</option>
       <option value="sky-blog7.php|photos">Template 7 - Gallery</option>
       <option value="sky-blog7.php|games">Template 7 - Gaming</option>
       <option value="sky-blog7.php|radio">Template 7 - Radio</option>
       <option value="sky-blog7.php|tv">Template 7 - TV</option>

       <option value="sky-blog8.php?s=1|Template 8">Template 8 - Main</option>
       <option value="sky-blog8.php?s=1|blog">Template 8 - Blog</option>
       <option value="sky-blog8.php?s=1|shop">Template 8 - Store</option>
       <option value="sky-blog8.php?s=1|music">Template 8 - Music</option>
       <option value="sky-blog8.php?s=1|videos">Template 8 - Videos</option>
       <option value="sky-blog8.php?s=1|photos">Template 8 - Gallery</option>
       <option value="sky-blog8.php?s=1|games">Template 8 - Gaming</option>
       <option value="sky-blog8.php?s=1|radio">Template 8 - Radio</option>
       <option value="sky-blog8.php?s=1|tv">Template 8 - TV</option>

       <option value="sky-blog8.php?s=2|Template 9">Template 9 - Main</option>
       <option value="sky-blog8.php?s=2|blog">Template 9 - Blog</option>
       <option value="sky-blog8.php?s=2|shop">Template 9 - Store</option>
       <option value="sky-blog8.php?s=2|music">Template 9 - Music</option>
       <option value="sky-blog8.php?s=2|videos">Template 9 - Videos</option>
       <option value="sky-blog8.php?s=2|photos">Template 9 - Gallery</option>
       <option value="sky-blog8.php?s=2|games">Template 9 - Gaming</option>
       <option value="sky-blog8.php?s=2|radio">Template 9 - Radio</option>
       <option value="sky-blog8.php?s=2|tv">Template 9 - TV</option>

       <option value="sky-blog8.php?s=3|Template 10">Template 10 - Main</option>
       <option value="sky-blog8.php?s=3|blog">Template 10 - Blog</option>
       <option value="sky-blog8.php?s=3|shop">Template 10 - Store</option>
       <option value="sky-blog8.php?s=3|music">Template 10 - Music</option>
       <option value="sky-blog8.php?s=3|videos">Template 10 - Videos</option>
       <option value="sky-blog8.php?s=3|photos">Template 10 - Gallery</option>
       <option value="sky-blog8.php?s=3|games">Template 10 - Gaming</option>
       <option value="sky-blog8.php?s=3|radio">Template 10 - Radio</option>
       <option value="sky-blog8.php?s=3|tv">Template 10 - TV</option>

       <option value="sky-blog8.php?s=4|Template 11">Template 11 - Main</option>
       <option value="sky-blog8.php?s=4|blog">Template 11 - Blog</option>
       <option value="sky-blog8.php?s=4|shop">Template 11 - Store</option>
       <option value="sky-blog8.php?s=4|music">Template 11 - Music</option>
       <option value="sky-blog8.php?s=4|videos">Template 11 - Videos</option>
       <option value="sky-blog8.php?s=4|photos">Template 11 - Gallery</option>
       <option value="sky-blog8.php?s=4|games">Template 11 - Gaming</option>
       <option value="sky-blog8.php?s=4|radio">Template 11 - Radio</option>
       <option value="sky-blog8.php?s=4|tv">Template 11 - TV</option>

       <option value="sky-blog8.php?s=5|Template 12">Template 12 - Main</option>
       <option value="sky-blog8.php?s=5|blog">Template 12 - Blog</option>
       <option value="sky-blog8.php?s=5|shop">Template 12 - Store</option>
       <option value="sky-blog8.php?s=5|music">Template 12 - Music</option>
       <option value="sky-blog8.php?s=5|videos">Template 12 - Videos</option>
       <option value="sky-blog8.php?s=5|photos">Template 12 - Gallery</option>
       <option value="sky-blog8.php?s=5|games">Template 12 - Gaming</option>
       <option value="sky-blog8.php?s=5|radio">Template 12 - Radio</option>
       <option value="sky-blog8.php?s=5|tv">Template 12 - TV</option>

       <option value="sky-blog8.php?s=6|Template 13">Template 13 - Main</option>
       <option value="sky-blog8.php?s=6|blog">Template 13 - Blog</option>
       <option value="sky-blog8.php?s=6|shop">Template 13 - Store</option>
       <option value="sky-blog8.php?s=6|music">Template 13 - Music</option>
       <option value="sky-blog8.php?s=6|videos">Template 13 - Videos</option>
       <option value="sky-blog8.php?s=6|photos">Template 13 - Gallery</option>
       <option value="sky-blog8.php?s=6|games">Template 13 - Gaming</option>
       <option value="sky-blog8.php?s=6|radio">Template 13 - Radio</option>
       <option value="sky-blog8.php?s=6|tv">Template 13 - TV</option>

       <option value="sky-blog8.php?s=7|Template 14">Template 14 - Main</option>
       <option value="sky-blog8.php?s=7|blog">Template 14 - Blog</option>
       <option value="sky-blog8.php?s=7|shop">Template 14 - Store</option>
       <option value="sky-blog8.php?s=7|music">Template 14 - Music</option>
       <option value="sky-blog8.php?s=7|videos">Template 14 - Videos</option>
       <option value="sky-blog8.php?s=7|photos">Template 14 - Gallery</option>
       <option value="sky-blog8.php?s=7|games">Template 14 - Gaming</option>
       <option value="sky-blog8.php?s=7|radio">Template 14 - Radio</option>
       <option value="sky-blog8.php?s=7|tv">Template 14 - TV</option>

       <option value="sky-blog8.php?s=8|Template 15">Template 15 - Main</option>
       <option value="sky-blog8.php?s=8|blog">Template 15 - Blog</option>
       <option value="sky-blog8.php?s=8|shop">Template 15 - Store</option>
       <option value="sky-blog8.php?s=8|music">Template 15 - Music</option>
       <option value="sky-blog8.php?s=8|videos">Template 15 - Videos</option>
       <option value="sky-blog8.php?s=8|photos">Template 15 - Gallery</option>
       <option value="sky-blog8.php?s=8|games">Template 15 - Gaming</option>
       <option value="sky-blog8.php?s=8|radio">Template 15 - Radio</option>
       <option value="sky-blog8.php?s=8|tv">Template 15 - TV</option>

       <option value="sky-blog8.php?s=9|Template 16">Template 16 - Main</option>
       <option value="sky-blog8.php?s=9|blog">Template 16 - Blog</option>
       <option value="sky-blog8.php?s=9|shop">Template 16 - Store</option>
       <option value="sky-blog8.php?s=9|music">Template 16 - Music</option>
       <option value="sky-blog8.php?s=9|videos">Template 16 - Videos</option>
       <option value="sky-blog8.php?s=9|photos">Template 16 - Gallery</option>
       <option value="sky-blog8.php?s=9|games">Template 16 - Gaming</option>
       <option value="sky-blog8.php?s=9|radio">Template 16 - Radio</option>
       <option value="sky-blog8.php?s=9|tv">Template 16 - TV</option>

       <option value="sky-blog17.php|main">Template 17 - Main</option>
       <option value="sky-blog17.php|blog">Template 17 - Blog</option>
       <option value="sky-blog17.php|shop">Template 17 - Store</option>
       <option value="sky-blog17.php|music">Template 17 - Music</option>
       <option value="sky-blog17.php|videos">Template 17 - Videos</option>
       <option value="sky-blog17.php|photos">Template 17 - Gallery</option>
       <option value="sky-blog17.php|games">Template 17 - Gaming</option>
       <option value="sky-blog17.php|radio">Template 17 - Radio</option>
       <option value="sky-blog17.php|tv">Template 17 - TV</option>

       <option value="sky-blog18.php|business">Template 18 - Business</option>
       <option value="sky-blog18.php|blog">Template 18 - Blog</option>
       <option value="sky-blog18.php|shop">Template 18 - Store</option>
       <option value="sky-blog18.php|music">Template 18 - Music</option>
       <option value="sky-blog18.php|videos">Template 18 - Videos</option>
       <option value="sky-blog18.php|photos">Template 18 - Gallery</option>
       <option value="sky-blog18.php|games">Template 18 - Gaming</option>
       <option value="sky-blog18.php|radio">Template 18 - Radio</option>
       <option value="sky-blog18.php|tv">Template 18 - TV</option>

       <option value="sky-blog19.php|business">Template 19 - Business</option>
       <option value="sky-blog19.php|blog">Template 19 - Blog</option>
       <option value="sky-blog19.php|shop">Template 19 - Store</option>
       <option value="sky-blog19.php|music">Template 19 - Music</option>
       <option value="sky-blog19.php|videos">Template 19 - Videos</option>
       <option value="sky-blog19.php|photos">Template 19 - Gallery</option>
       <option value="sky-blog19.php|games">Template 19 - Gaming</option>
       <option value="sky-blog19.php|radio">Template 19 - Radio</option>
       <option value="sky-blog19.php|tv">Template 19 - TV</option>

       <option value="sky-blog20.php|business">Template 20 - Business</option>
       <option value="sky-blog20.php|blog">Template 20 - Blog</option>
       <option value="sky-blog20.php|shop">Template 20 - Store</option>
       <option value="sky-blog20.php|music">Template 20 - Music</option>
       <option value="sky-blog20.php|videos">Template 20 - Videos</option>
       <option value="sky-blog20.php|photos">Template 20 - Gallery</option>
       <option value="sky-blog20.php|games">Template 20 - Gaming</option>
       <option value="sky-blog20.php|radio">Template 20 - Radio</option>
       <option value="sky-blog20.php|tv">Template 20 - TV</option>

     </select>
</td>
</tr>

<tr>
<td>Effects&nbsp;</td>
<td>
    <select id="effects" name="effects" class="select_it" style="border: 0px none;cursor: pointer;" >
       <?php if ($effects){echo "<OPTION selected>".$effects."</option>";} ?>
       <option value="none">none</option>
       <option value="w3-opacity-min">opacity-min</option>
       <option value="w3-opacity">opacity-med</option>
       <option value="w3-opacity-max">opacity-max</option>
       <option value="w3-grayscale-min">grayscale-min</option>
       <option value="w3-grayscale">grayscale-med</option>
       <option value="w3-grayscale-max">grayscale-max</option>
       <option value="w3-sepia-min">sepia-min</option>
       <option value="w3-sepia">sepia-med</option>
       <option value="w3-sepia-max">sepia-max</option>
       <option value="w3-hover-sepia">hover-sepia</option>
       <option value="w3-hover-opacity">hover-opacity</option>
       <option value="w3-hover-grayscale">hover-grayscale</option>
     </select> 
</td>
</tr>

<tr>
<td>Content&nbsp;</td>
<td>
    <select id="content" name="content" class="select_it" style="border: 0px none;cursor: pointer;" >
       <?php if ($content){echo "<OPTION selected>".$content."</option>";} ?>
       <option value="4">4 Column</option>
       <option value="3">3 Column</option>
       <option value="2">2 Column</option>
       <option value="1">1 Column</option>   
     </select> 
</td>
</tr>

<TR><TD>Font Type&nbsp;<TD>
<SELECT  class='gfont select_it' name='gfont' style='border: 0px none;cursor: pointer;'>
<?php if ($gfont){echo '<OPTION selected>'.$gfont;} ?>
<OPTION>default
<OPTION>Georgia, serif
<OPTION>'Palatino Linotype', 'Book Antiqua', Palatino, serif
<OPTION>'Times New Roman', Times, serif
<OPTION>Arial, Helvetica, sans-serif
<OPTION>'Arial Black', Gadget, sans-serif
<OPTION>'Comic Sans MS', cursive, sans-serif
<OPTION>Impact, Charcoal, sans-serif
<OPTION>'Lucida Sans Unicode', 'Lucida Grande', sans-serif
<OPTION>Tahoma, Geneva, sans-serif
<OPTION>'Trebuchet MS', Helvetica, sans-serif
<OPTION>Verdana, Geneva, sans-serif
<OPTION>'Courier New', Courier, monospace
<OPTION>'Lucida Console', Monaco, monospace
</select>
</td>
</tr>

<TR><TD title="LimeGreen Recommended" style="cursor: pointer;">Progress Bar&nbsp;<TD>
<SELECT  class="progressbar select_it" name="progressbar" style="border: 0px none;cursor: pointer;" >
<?php if ($progressbar){echo "<OPTION selected>".$progressbar;} ?>
<OPTION>none
<OPTION> aliceblue
<OPTION> antiquewhite
<OPTION> aqua
<OPTION> aquamarine
<OPTION> azure
<OPTION> beige
<OPTION> bisque
<OPTION> black
<OPTION> blanchedalmond
<OPTION> blue
<OPTION> blueviolet
<OPTION> brown
<OPTION> burlywood
<OPTION> cadetblue
<OPTION> chartreuse
<OPTION> chocolate
<OPTION> coral
<OPTION> cornflowerblue
<OPTION> cornsilk
<OPTION> crimson
<OPTION> cyan
<OPTION> darkblue
<OPTION> darkcyan
<OPTION> darkgoldenrod
<OPTION> darkgray
<OPTION> darkgreen
<OPTION> darkkhaki
<OPTION> darkmagenta
<OPTION> darkolivegreen
<OPTION> darkorange
<OPTION> darkorchid
<OPTION> darkred
<OPTION> darksalmon
<OPTION> darkseagreen
<OPTION> darkslateblue
<OPTION> darkslategray
<OPTION> darkturquoise
<OPTION> darkviolet
<OPTION> deeppink
<OPTION> deepskyblue
<OPTION> dimgray
<OPTION> dodgerblue
<OPTION> firebrick
<OPTION> floralwhite
<OPTION> forestgreen
<OPTION> fuchsia
<OPTION> gainsboro
<OPTION> ghostwhite
<OPTION> gold
<OPTION> goldenrod
<OPTION> gray
<OPTION> green
<OPTION> greenyellow
<OPTION> honeydew
<OPTION> hotpink
<OPTION> indianred
<OPTION> indigo
<OPTION> ivory
<OPTION> khaki
<OPTION> lavender
<OPTION> lavenderblush
<OPTION> lawngreen
<OPTION> lemonchiffon
<OPTION> lightblue
<OPTION> lightcoral
<OPTION> lightcyan
<OPTION> lightgoldenrodyellow
<OPTION> lightgreen
<OPTION> lightgrey
<OPTION> lightpink
<OPTION> lightsalmon
<OPTION> lightseagreen
<OPTION> lightskyblue
<OPTION> lightslategray
<OPTION> lightsteelblue
<OPTION> lightpurple
<OPTION> lightyellow
<OPTION> lime
<OPTION> limegreen
<OPTION> linen
<OPTION> magenta
<OPTION> maroon
<OPTION> mediumaquamarine
<OPTION> mediumblue
<OPTION> mediumorchid
<OPTION> mediumpurple
<OPTION> mediumseagreen
<OPTION> mediumslateblue
<OPTION> mediumspringgreen
<OPTION> mediumturquoise
<OPTION> mediumvioletred
<OPTION> midnightblue
<OPTION> mintcream
<OPTION> mistyrose
<OPTION> moccasin
<OPTION> navajowhite
<OPTION> navy
<OPTION> oldlace
<OPTION> olive
<OPTION> olivedrab
<OPTION> orange
<OPTION> orangered
<OPTION> orchid
<OPTION> palegoldenrod
<OPTION> palegreen
<OPTION> paleturquoise
<OPTION> palevioletred
<OPTION> papayawhip
<OPTION> peachpuff
<OPTION> peru
<OPTION> pink
<OPTION> plum
<OPTION> powderblue
<OPTION> purple
<OPTION> red
<OPTION> rosybrown
<OPTION> royalblue
<OPTION> saddlebrown
<OPTION> salmon
<OPTION> sandybrown
<OPTION> seagreen
<OPTION> seashell
<OPTION> sienna
<OPTION> silver
<OPTION> skyblue
<OPTION> slateblue
<OPTION> slategray
<OPTION> snow
<OPTION> springgreen
<OPTION> steelblue
<OPTION> tan
<OPTION> teal
<OPTION> thistle
<OPTION> tomato
<OPTION> turquoise
<OPTION> violet
<OPTION> wheat
<OPTION> white
<OPTION> whitesmoke
<OPTION> yellow
<OPTION> yellowgreen
</select>
</td>
</tr>

<TR><TD>Link Color&nbsp;<TD>
<SELECT  class="linkcolor select_it" name="linkcolor" style="border: 0px none;cursor: pointer;" >
<?php if ($linkcolor){echo "<OPTION selected>".$linkcolor;} ?>
<OPTION>default
<OPTION> aliceblue
<OPTION> antiquewhite
<OPTION> aqua
<OPTION> aquamarine
<OPTION> azure
<OPTION> beige
<OPTION> bisque
<OPTION> black
<OPTION> blanchedalmond
<OPTION> blue
<OPTION> blueviolet
<OPTION> brown
<OPTION> burlywood
<OPTION> cadetblue
<OPTION> chartreuse
<OPTION> chocolate
<OPTION> coral
<OPTION> cornflowerblue
<OPTION> cornsilk
<OPTION> crimson
<OPTION> cyan
<OPTION> darkblue
<OPTION> darkcyan
<OPTION> darkgoldenrod
<OPTION> darkgray
<OPTION> darkgreen
<OPTION> darkkhaki
<OPTION> darkmagenta
<OPTION> darkolivegreen
<OPTION> darkorange
<OPTION> darkorchid
<OPTION> darkred
<OPTION> darksalmon
<OPTION> darkseagreen
<OPTION> darkslateblue
<OPTION> darkslategray
<OPTION> darkturquoise
<OPTION> darkviolet
<OPTION> deeppink
<OPTION> deepskyblue
<OPTION> dimgray
<OPTION> dodgerblue
<OPTION> firebrick
<OPTION> floralwhite
<OPTION> forestgreen
<OPTION> fuchsia
<OPTION> gainsboro
<OPTION> ghostwhite
<OPTION> gold
<OPTION> goldenrod
<OPTION> gray
<OPTION> green
<OPTION> greenyellow
<OPTION> honeydew
<OPTION> hotpink
<OPTION> indianred
<OPTION> indigo
<OPTION> ivory
<OPTION> khaki
<OPTION> lavender
<OPTION> lavenderblush
<OPTION> lawngreen
<OPTION> lemonchiffon
<OPTION> lightblue
<OPTION> lightcoral
<OPTION> lightcyan
<OPTION> lightgoldenrodyellow
<OPTION> lightgreen
<OPTION> lightgrey
<OPTION> lightpink
<OPTION> lightsalmon
<OPTION> lightseagreen
<OPTION> lightskyblue
<OPTION> lightslategray
<OPTION> lightsteelblue
<OPTION> lightpurple
<OPTION> lightyellow
<OPTION> lime
<OPTION> limegreen
<OPTION> linen
<OPTION> magenta
<OPTION> maroon
<OPTION> mediumaquamarine
<OPTION> mediumblue
<OPTION> mediumorchid
<OPTION> mediumpurple
<OPTION> mediumseagreen
<OPTION> mediumslateblue
<OPTION> mediumspringgreen
<OPTION> mediumturquoise
<OPTION> mediumvioletred
<OPTION> midnightblue
<OPTION> mintcream
<OPTION> mistyrose
<OPTION> moccasin
<OPTION> navajowhite
<OPTION> navy
<OPTION> oldlace
<OPTION> olive
<OPTION> olivedrab
<OPTION> orange
<OPTION> orangered
<OPTION> orchid
<OPTION> palegoldenrod
<OPTION> palegreen
<OPTION> paleturquoise
<OPTION> palevioletred
<OPTION> papayawhip
<OPTION> peachpuff
<OPTION> peru
<OPTION> pink
<OPTION> plum
<OPTION> powderblue
<OPTION> purple
<OPTION> red
<OPTION> rosybrown
<OPTION> royalblue
<OPTION> saddlebrown
<OPTION> salmon
<OPTION> sandybrown
<OPTION> seagreen
<OPTION> seashell
<OPTION> sienna
<OPTION> silver
<OPTION> skyblue
<OPTION> slateblue
<OPTION> slategray
<OPTION> snow
<OPTION> springgreen
<OPTION> steelblue
<OPTION> tan
<OPTION> teal
<OPTION> thistle
<OPTION> tomato
<OPTION> turquoise
<OPTION> violet
<OPTION> wheat
<OPTION> white
<OPTION> whitesmoke
<OPTION> yellow
<OPTION> yellowgreen
</select>
</td>
</tr>

<TR><TD>Font Color&nbsp;<TD>
<SELECT  class="fontcolor select_it" name="fontcolor" style="border: 0px none;cursor: pointer;" >
<?php if ($fontcolor){echo "<OPTION selected>".$fontcolor;} ?>
<OPTION>default
<OPTION> aliceblue
<OPTION> antiquewhite
<OPTION> aqua
<OPTION> aquamarine
<OPTION> azure
<OPTION> beige
<OPTION> bisque
<OPTION> black
<OPTION> blanchedalmond
<OPTION> blue
<OPTION> blueviolet
<OPTION> brown
<OPTION> burlywood
<OPTION> cadetblue
<OPTION> chartreuse
<OPTION> chocolate
<OPTION> coral
<OPTION> cornflowerblue
<OPTION> cornsilk
<OPTION> crimson
<OPTION> cyan
<OPTION> darkblue
<OPTION> darkcyan
<OPTION> darkgoldenrod
<OPTION> darkgray
<OPTION> darkgreen
<OPTION> darkkhaki
<OPTION> darkmagenta
<OPTION> darkolivegreen
<OPTION> darkorange
<OPTION> darkorchid
<OPTION> darkred
<OPTION> darksalmon
<OPTION> darkseagreen
<OPTION> darkslateblue
<OPTION> darkslategray
<OPTION> darkturquoise
<OPTION> darkviolet
<OPTION> deeppink
<OPTION> deepskyblue
<OPTION> dimgray
<OPTION> dodgerblue
<OPTION> firebrick
<OPTION> floralwhite
<OPTION> forestgreen
<OPTION> fuchsia
<OPTION> gainsboro
<OPTION> ghostwhite
<OPTION> gold
<OPTION> goldenrod
<OPTION> gray
<OPTION> green
<OPTION> greenyellow
<OPTION> honeydew
<OPTION> hotpink
<OPTION> indianred
<OPTION> indigo
<OPTION> ivory
<OPTION> khaki
<OPTION> lavender
<OPTION> lavenderblush
<OPTION> lawngreen
<OPTION> lemonchiffon
<OPTION> lightblue
<OPTION> lightcoral
<OPTION> lightcyan
<OPTION> lightgoldenrodyellow
<OPTION> lightgreen
<OPTION> lightgrey
<OPTION> lightpink
<OPTION> lightsalmon
<OPTION> lightseagreen
<OPTION> lightskyblue
<OPTION> lightslategray
<OPTION> lightsteelblue
<OPTION> lightpurple
<OPTION> lightyellow
<OPTION> lime
<OPTION> limegreen
<OPTION> linen
<OPTION> magenta
<OPTION> maroon
<OPTION> mediumaquamarine
<OPTION> mediumblue
<OPTION> mediumorchid
<OPTION> mediumpurple
<OPTION> mediumseagreen
<OPTION> mediumslateblue
<OPTION> mediumspringgreen
<OPTION> mediumturquoise
<OPTION> mediumvioletred
<OPTION> midnightblue
<OPTION> mintcream
<OPTION> mistyrose
<OPTION> moccasin
<OPTION> navajowhite
<OPTION> navy
<OPTION> oldlace
<OPTION> olive
<OPTION> olivedrab
<OPTION> orange
<OPTION> orangered
<OPTION> orchid
<OPTION> palegoldenrod
<OPTION> palegreen
<OPTION> paleturquoise
<OPTION> palevioletred
<OPTION> papayawhip
<OPTION> peachpuff
<OPTION> peru
<OPTION> pink
<OPTION> plum
<OPTION> powderblue
<OPTION> purple
<OPTION> red
<OPTION> rosybrown
<OPTION> royalblue
<OPTION> saddlebrown
<OPTION> salmon
<OPTION> sandybrown
<OPTION> seagreen
<OPTION> seashell
<OPTION> sienna
<OPTION> silver
<OPTION> skyblue
<OPTION> slateblue
<OPTION> slategray
<OPTION> snow
<OPTION> springgreen
<OPTION> steelblue
<OPTION> tan
<OPTION> teal
<OPTION> thistle
<OPTION> tomato
<OPTION> turquoise
<OPTION> violet
<OPTION> wheat
<OPTION> white
<OPTION> whitesmoke
<OPTION> yellow
<OPTION> yellowgreen
</select>
</td>
</tr>


<TR><TD>Page<font color="white">_</font>Color&nbsp;<TD>
<SELECT  class="pagecolor select_it" name="pagecolor" style="border: 0px none;cursor: pointer;" >
<?php if ($pagecolor){echo "<OPTION selected>".$pagecolor;} ?>
<OPTION class="w3-light-gray">light-gray
<OPTION class="w3-aqua">aqua
<OPTION class="w3-amber">amber
<OPTION class="w3-black">black
<OPTION class="w3-blue">blue
<OPTION class="w3-blue-gray">blue-gray
<OPTION class="w3-brown">brown
<OPTION class="w3-cyan">cyan
<OPTION class="w3-dark-gray">dark-gray
<OPTION class="w3-deep-orange">deep-orange
<OPTION class="w3-deep-purple">deep-purple
<OPTION class="w3-gray">gray
<OPTION class="w3-green">green
<OPTION class="w3-indigo">indigo
<OPTION class="w3-khaki">khaki
<OPTION class="w3-light-blue">light-blue
<OPTION class="w3-light-gray">light-gray
<OPTION class="w3-light-green">light-green
<OPTION class="w3-lime">lime
<OPTION class="w3-orange">orange
<OPTION class="w3-pale-blue">pale-blue
<OPTION class="w3-pale-green">pale-green
<OPTION class="w3-pale-red">pale-red
<OPTION class="w3-pale-yellow">pale-yellow
<OPTION class="w3-pink">pink
<OPTION class="w3-purple">purple
<OPTION class="w3-red">red
<OPTION class="w3-sand">sand
<OPTION class="w3-teal">teal
<OPTION class="w3-white">white
<OPTION class="w3-yellow">yellow
</select>
</td>
</tr>


<TR><TD>Panel<font color="white">_</font>Color&nbsp;<TD>
<SELECT  class="panelcolor select_it" name="panelcolor" style="border: 0px none;cursor: pointer;" >
<?php if ($pagecolor){echo "<OPTION selected>".$panelcolor;} ?>
<OPTION class="<?php echo $pagecolor; ?>">default
<OPTION class="w3-light-gray">light-gray
<OPTION class="w3-aqua">aqua
<OPTION class="w3-amber">amber
<OPTION class="w3-black">black
<OPTION class="w3-blue">blue
<OPTION class="w3-blue-gray">blue-gray
<OPTION class="w3-brown">brown
<OPTION class="w3-cyan">cyan
<OPTION class="w3-dark-gray">dark-gray
<OPTION class="w3-deep-orange">deep-orange
<OPTION class="w3-deep-purple">deep-purple
<OPTION class="w3-gray">gray
<OPTION class="w3-green">green
<OPTION class="w3-indigo">indigo
<OPTION class="w3-khaki">khaki
<OPTION class="w3-light-blue">light-blue
<OPTION class="w3-light-gray">light-gray
<OPTION class="w3-light-green">light-green
<OPTION class="w3-lime">lime
<OPTION class="w3-orange">orange
<OPTION class="w3-pale-blue">pale-blue
<OPTION class="w3-pale-green">pale-green
<OPTION class="w3-pale-red">pale-red
<OPTION class="w3-pale-yellow">pale-yellow
<OPTION class="w3-pink">pink
<OPTION class="w3-purple">purple
<OPTION class="w3-red">red
<OPTION class="w3-sand">sand
<OPTION class="w3-teal">teal
<OPTION class="w3-white">white
<OPTION class="w3-yellow">yellow
</select>
</td>
</tr>

<TR><TD title="Overwrites other custom colors">Theme Color&nbsp;<TD>
<SELECT  class="themecolor select_it" name="themecolor" style="border: 0px none;cursor: pointer;" >
<?php if ($themecolor){echo "<OPTION selected>".$themecolor;} ?>
<OPTION>none
<OPTION class="w3-text-amber">w3-theme-amber
<OPTION class="w3-text-black">w3-theme-black
<OPTION class="w3-text-blue">w3-theme-blue
<OPTION class="w3-text-blue-grey">w3-theme-blue-grey
<OPTION class="w3-text-brown">w3-theme-brown
<OPTION class="w3-text-cyan">w3-theme-cyan
<OPTION class="w3-text-dark-grey">w3-theme-dark-grey
<OPTION class="w3-text-deep-orange">w3-theme-deep-orange
<OPTION class="w3-text-deep-purple">w3-theme-deep-purple
<OPTION class="w3-text-green">w3-theme-green
<OPTION class="w3-text-grey">w3-theme-grey
<OPTION class="w3-text-indigo">w3-theme-indigo
<OPTION class="w3-text-khaki">w3-theme-khaki
<OPTION class="w3-text-light-blue">w3-theme-light-blue
<OPTION class="w3-text-light-green">w3-theme-light-green
<OPTION class="w3-text-lime">w3-theme-lime
<OPTION class="w3-text-orange">w3-theme-orange
<OPTION class="w3-text-pink">w3-theme-pink
<OPTION class="w3-text-purple">w3-theme-purple
<OPTION class="w3-text-red">w3-theme-red
<OPTION class="w3-text-teal">w3-theme-teal
<OPTION class="w3-text-yellow">w3-theme-yellow
</select>
</td>
</tr>

<TR><TD>Footer<font color="white">_</font>Color&nbsp;<TD>
<SELECT  class="footercolor select_it" name="footercolor" style="border: 0px none;cursor: pointer;" >
<?php if ($footercolor){echo "<OPTION selected>".$footercolor;} ?>
<OPTION class="w3-dark-gray">dark-gray
<OPTION class="w3-aqua">aqua
<OPTION class="w3-amber">amber
<OPTION class="w3-black">black
<OPTION class="w3-blue">blue
<OPTION class="w3-blue-gray">blue-gray
<OPTION class="w3-brown">brown
<OPTION class="w3-cyan">cyan
<OPTION class="w3-dark-gray">dark-gray
<OPTION class="w3-deep-orange">deep-orange
<OPTION class="w3-deep-purple">deep-purple
<OPTION class="w3-gray">gray
<OPTION class="w3-green">green
<OPTION class="w3-indigo">indigo
<OPTION class="w3-khaki">khaki
<OPTION class="w3-light-blue">light-blue
<OPTION class="w3-light-gray">light-gray
<OPTION class="w3-light-green">light-green
<OPTION class="w3-lime">lime
<OPTION class="w3-orange">orange
<OPTION class="w3-pale-blue">pale-blue
<OPTION class="w3-pale-green">pale-green
<OPTION class="w3-pale-red">pale-red
<OPTION class="w3-pale-yellow">pale-yellow
<OPTION class="w3-pink">pink
<OPTION class="w3-purple">purple
<OPTION class="w3-red">red
<OPTION class="w3-sand">sand
<OPTION class="w3-teal">teal
<OPTION class="w3-white">white
<OPTION class="w3-yellow">yellow
</select>
</td>
</tr>

</table><br>

<!-- DropDown Menu -->
<?php if(!isMobile()){echo '<div class="w3-card-4">';} ?>
<header class="w3-container w3-purple">      
<big>Application Settings</big>
</header>

<table>

<tr class="w3-light-gray">
<td>App&nbsp;</td>
<td title="Show/Hide In Drop Down Menu">Menu</td>
<td>Options&nbsp;</td>
</tr>

<tr>
<td><a href="../sky-tv.php" target="iFrameID"><font color="blue">TV&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="tv" name="tv" title="Show/Hide In Drop Down Menu">
       <?php if ($tv){echo "<OPTION selected>".$tv."</option>";} ?>
       <option value="Show">Show</option>
       <option value="Hide" <?php if (!$tv){echo 'selected="selected"';}; ?>>Hide</option> 
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('tv2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../<?php echo $template ?>?page=blog" target="iFrameID" title="Click For Preview"><font color="blue">Blogs&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="blog" name="blog" title="Show/Hide In Drop Down Menu">
       <?php if ($blog){echo "<OPTION selected>".$blog."</option>";} ?>
       <option value="Show">Show</option>
       <option value="Hide" <?php if (!$template){echo 'selected="selected"';}; ?>>Hide</option> 
     </select> 
</td><td>&emsp;&nbsp;<a href="#" title="New Post" onclick="document.getElementById('post').style.display='block'"><small><font color="blue"><u>Post</u></font></small></a></td>
</tr>

<tr>
<td><a href="../<?php echo $template ?>?page=music" target="iFrameID" title="Click For Preview"><font color="blue">Music&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="music" name="music" title="Show/Hide In Drop Down Menu">
       <?php if ($music){echo "<OPTION selected>".$music."</option>";} ?>
       <option value="Show">Show</option>
       <option value="Hide" <?php if (!$music){echo 'selected="selected"';}; ?>>Hide</option> 
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('music2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-radio.php" target="iFrameID"><font color="blue">Radio&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="radio" name="radio" title="Show/Hide In Drop Down Menu">
       <?php if ($radio){echo "<OPTION selected>".$radio."</option>";} ?>
       <option value="Show">Show</option>
       <option value="Hide" <?php if (!$radio){echo 'selected="selected"';}; ?>>Hide</option> 
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('radio2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../<?php echo $template ?>?page=videos" target="iFrameID" title="Click For Preview"><font color="blue">Videos&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="videos" name="videos" title="Show/Hide In Drop Down Menu">
       <?php if ($videos){echo "<OPTION selected>".$videos."</option>";} ?>
       <option value="Show">Show</option>
       <option value="Hide" <?php if (!$videos){echo 'selected="selected"';}; ?>>Hide</option> 
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('video2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>
<tr>
<td><a href="../<?php echo $template ?>?page=photos" target="iFrameID" title="Click For Preview"><font color="blue">Gallery&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="gallery" name="gallery" title="Show/Hide In Drop Down Menu">
       <?php if ($gallery){echo "<OPTION selected>".$gallery."</option>";} ?>
       <option value="Show">Show</option>
       <option value="Hide" <?php if (!$gallery){echo 'selected="selected"';}; ?>>Hide</option> 
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('gallery2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../<?php echo $template ?>?page=games" target="iFrameID" title="Click For Preview"><font color="blue">Gaming&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="games" name="games" title="Show/Hide In Drop Down Menu">
       <?php if ($games){echo "<OPTION selected>".$games."</option>";} ?>
       <option value="Show">Show</option>
       <option value="Hide" <?php if (!$games){echo 'selected="selected"';}; ?>>Hide</option> 
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('games2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../stats/index.php?mode=your_rank" target="iFrameID"><font color="blue">Ranking&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="rank" name="rank" title="Show/Hide In Drop Down Menu">
       <?php if ($rank){echo "<OPTION selected>".$rank."</option>";} ?>
       <option value="Hide" <?php if (!$rank){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
   </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('rank2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-application.php" target="iFrameID"><font color="blue">Application&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="application" name="application" title="Show/Hide In Drop Down Menu">
       <?php if ($application){echo "<OPTION selected>".$application."</option>";} ?>
       <option value="Hide" <?php if (!$application){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('application2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-ads-preview.php" target="blank" title="Get your ads code"><font color="blue">Advertisers&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="advertisers" name="advertisers" title="Show/Hide In Drop Down Menu">
       <?php if ($advertisers){echo "<OPTION selected>".$advertisers."</option>";} ?>
       <option value="Hide" <?php if (!$advertisers){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
   </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('advertisers2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../myfiles/widgets/Submissions.txt" target="iFrameID"><font color="blue">Submit<font color="white">_</font>URL</b></a>&nbsp;</font></td>
<td>
    <select style="cursor: pointer;" id="url_submit" name="url_submit" title="Show/Hide In Drop Down Menu">
       <?php if ($url_submit){echo "<OPTION selected>".$url_submit."</option>";} ?>
       <option value="Hide" <?php if (!$url_submit){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
   </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('url_submit2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-business_dir.php" target="iFrameID" title="Business Directory"><font color="blue">Business<font color="white">_</font>Dir</b></a>&nbsp;</font></td>
<td>
    <select style="cursor: pointer;" id="dir" name="dir" title="Show/Hide In Drop Down Menu">
       <?php if ($dir){echo "<OPTION selected>".$dir."</option>";} ?>
       <option value="Hide" <?php if (!$dir){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
   </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('dir2').style.display='block'"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><font color="blue">Social<font color="white">-</font>Shares&nbsp;</font></td>
<td>
    <select style="cursor: pointer;" id="shares" name="shares" title="Show/Hide In Drop Down Menu">
       <?php if ($shares){echo "<OPTION selected>".$shares."</option>";} ?>
       <option value="Hide" <?php if (!$shares){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('shares2').style.display='block';"><small><font color="blue"><u>Help</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-portal.php" target="iFrameID"><font color="blue">Portal&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="portal" name="portal" title="Show/Hide In Drop Down Menu">
       <?php if ($portal){echo "<OPTION selected>".$portal."</option>";} ?>
       <option value="Hide" <?php if (!$portal){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<button style="padding:0" class="w3-button" id="goto3" name="goto3" value="index-portal.php"><font color="blue"><u>Settings</u></font></button></td>
</tr>               

<tr>
<td><font color="blue">Menu&nbsp;</font></td>
<td>
    <select style="cursor: pointer;" id="menu" name="menu" title="Show/Hide In Drop Down Menu">
       <?php if ($menu){echo "<OPTION selected>".$menu."</option>";} ?>
       <option value="Hide" <?php if (!$menu){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<button style="padding:0" class="w3-button" id="goto7" name="goto7" value="index-menu.php"><font color="blue"><u>Settings</u></font></button></td>
</tr>

<tr>
<td><a href="../sky-course.php" target="iFrameID"><font color="blue">Course&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="course" name="course" title="Show/Hide In Drop Down Menu">
       <?php if ($course){echo "<OPTION selected>".$course."</option>";} ?>
       <option value="Hide" <?php if (!$course){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<a href="index-course.php"><small><font color="blue"><u>Settings</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-delivery.php" target="iFrameID"><font color="blue">Delivery&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="delivery" name="delivery" title="Show/Hide In Drop Down Menu">
       <?php if ($delivery){echo "<OPTION selected>".$delivery."</option>";} ?>
       <option value="Hide" <?php if (!$delivery){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<button style="padding:0" class="w3-button" id="goto8" name="goto8" value="index-delivery.php"><font color="blue"><u>Settings</u></font></button></td>
</tr>

<tr>
<td><a href="../sky-os.php" target="iFrameID"><font color="blue">Desktop&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="os" name="os" title="Show/Hide In Drop Down Menu">
       <?php if ($os){echo "<OPTION selected>".$os."</option>";} ?>
       <option value="Hide" <?php if (!$os){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<button style="padding:0" class="w3-button" id="goto5" name="goto5" value="index-os.php"><font color="blue"><u>Settings</u></font></button></td>
</tr>

<tr>
<td><a href="../<?php echo $template ?>?page=packages" target="iFrameID"><font color="blue">Packages&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="packages" name="packages" title="Show/Hide In Drop Down Menu">
       <?php if ($packages){echo "<OPTION selected>".$packages."</option>";} ?>
       <option value="Hide" <?php if (!$packages){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<button style="padding:0" class="w3-button" id="goto6" name="goto6" value="index-packages.php"><font color="blue"><u>Settings</u></font></button></td>
</tr>

<tr>
<td><a href="../sky-download.php" target="iFrameID"><font color="blue">Download&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="m_download" name="m_download" title="Show/Hide In Drop Down Menu">
       <?php if ($m_download){echo "<OPTION selected>".$m_download."</option>";} ?>
       <option value="Hide" <?php if (!$m_download){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<a href="#top" onclick="closeall(); document.getElementById('download2').style.display='block';"><small><font color="blue"><u>Settings</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-contact.php" target="iFrameID"><font color="blue">Contact Us&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="contact_us" name="contact_us" title="Show/Hide Bottom Of Screen">
       <?php if ($contact_us){echo "<OPTION selected>".$contact_us."</option>";} ?>
       <option value="Hide" <?php if (!$contact_us){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<a href="#top" style="cursor: pointer;" onclick="closeall(); document.getElementById('contact_us2').style.display='block'"><small><font color="blue"><u>Settings</u></font></small></a></td>
</tr>

<tr>
<td><a href="../<?php echo $template ?>?page=shop" target="iFrameID" title="Click For Preview"><font color="blue">Online&nbsp;Store&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="store" name="store" title="Show/Hide In Drop Down Menu">
       <?php if ($store){echo "<OPTION selected>".$store."</option>";} ?>
       <option value="Show">Show</option>
       <option value="Hide" <?php if (!$store){echo 'selected="selected"';}; ?>>Hide</option> 
     </select> 
</td><td>&emsp;&nbsp;<a style="cursor: pointer;" onclick="document.getElementById('store2').style.display='block'"><small><font color="blue"><u>Settings</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-squeeze-page.php" target="iFrameID"><font color="blue">Squeeze<font color="white">-</font>Page&nbsp;</font></a></td>
<td>
    <select style="cursor: pointer;" id="squeeze" name="squeeze" title="Show/Hide In Drop Down Menu">
       <?php if ($squeeze){echo "<OPTION selected>".$squeeze."</option>";} ?>
       <option value="Hide" <?php if (!$squeeze){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
     </select> 
</td><td>&emsp;&nbsp;<a href="#top" onclick="closeall(); document.getElementById('squeeze2').style.display='block';"><small><font color="blue"><u>Settings</u></font></small></a></td>
</tr>

<tr>
<td><a href="../sky-Classified.php" target="iFrameID"><font color="blue">Classified<font color="white">_</font>Ads</b></a>&nbsp;</font></td>
<td>
    <select style="cursor: pointer;" id="class" name="class" title="Show/Hide In Drop Down Menu">
       <?php if ($class){echo "<OPTION selected>".$class."</option>";} ?>
       <option value="Hide" <?php if (!$class){echo 'selected="selected"';}; ?>>Hide</option> 
       <option value="Show">Show</option>
   </select> 
</td><td>&emsp;&nbsp;<a href="#top" style="cursor: pointer;" onclick="closeall(); document.getElementById('class2').style.display='block'"><small><font color="blue"><u>Settings</u></font></small></a></td>
</tr>

<tr>
<td colspan="3">&nbsp;</td>
</tr>

<tr class="w3-light-gray">
<td>App&nbsp;</td>
<td colspan="2"><center>Options</center></td>
</tr>

<tr>
<td><font color="blue">Notes&nbsp;</font></td>
<td colspan="2"><center><button style="padding:0" class="w3-button" id="goto11" name="goto11" value="index-notes.php"><font color="blue"><u>Settings</u></font></button></center></td>
</tr>

<tr>
<td><a href="../sky-search.php" target="iFrameID"><font color="blue">Search&nbsp;</font></a></td>
<td colspan="2"><center><button style="padding:0" class="w3-button" id="goto4" name="goto4" value="index-search.php"><font color="blue"><u>Settings</u></font></button></center></td>
</tr>

<tr>
<td><a href="../sky-blog0.php" target="iFrameID"><font color="blue">Import&nbsp;</font></a></td>
<td colspan="2"><center><a style="cursor: pointer;" onclick="document.getElementById('import').style.display='block'"><small><font color="blue"><u>Settings</u></font></small></a></center></td>
</tr>

<tr>
<td><a href="../firewall.txt" target="iFrameID"><font color="blue">Firewall</a></td>
<td colspan="2"><center><button style="padding:0" class="w3-button" id="goto9" name="goto9" value="index-firewall.php"><font color="blue"><u>Settings</u></font></button></center></td>
</tr>

<tr>
<td><a href="../database.csv" target="iFrameID"><font color="blue">CSV<font color="white">-</font>Database&nbsp;</font></a></td>
<td colspan="2"><center><a href="#top" onclick="document.getElementById('csv').style.display='block';"><small><font color="blue"><u>Settings</u></font></small></a></center></td>
</tr>

<tr>
<td><a href="../sky-custom-t.php" target="iFrameID"><font color="blue">Custom Template</a></td>
<td colspan="2"><center><button style="padding:0" class="w3-button" id="goto10" name="goto10" value="index-custom-template.php"><font color="blue"><u>Settings</u></font></button></center></td>
</tr>

</table>
</div>
<br>

  </div>


  <div id="business" class="w3-container w3-border tab" style="display:none">
<table>
<tr title="Optional">
<td>&emsp;Your<font color="white">_</font>Address&nbsp;</td> 
<td><input type="text" id="address" name="address" class="txtinput" placeholder="Atlanta, GA"  maxlength="50"  <?php if (!$address){echo 'placeholder="address or city & state" value=""';}else{echo 'value="'.$address.'"';} ?> size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Your<font color="white">_</font>Phone#&nbsp;</td> 
<td><input type="text" id="phone_number" name="phone_number" class="txtinput" placeholder="(435) 454-4270"  maxlength="25"  <?php if (!$phone_number){echo 'value=""';}else{echo 'value="'.$phone_number.'"';} ?> size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Zelle<font color="white">_</font>Phone#&nbsp;</td> 
<td><input type="text" id="zelle" name="zelle" class="txtinput" placeholder="(435) 454-4270"  maxlength="25"  <?php if (!$zelle){echo 'value=""';}else{echo 'value="'.$zelle.'"';} ?> size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Business<font color="white">_</font>Hours&nbsp;</td> 
<td><input type="text" id="hours" name="hours" class="txtinput" placeholder="Mon - Fri (9am - 5pm)"  maxlength="50"  <?php if (!$hours){echo 'value=""';}else{echo 'value="'.$hours.'"';} ?> size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;PayPal<font color="white">_</font>Email&nbsp;</td> 
<td><input type="text" id="paypal" name="paypal" class="txtinput"  placeholder="paypal_email@aol.com"  maxlength="50"  <?php if (!$paypal){echo 'value=""';}else{echo 'value="'.$paypal.'"';} ?> size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Cash<font color="white">_</font>App<font color="white">_</font>ID&nbsp;</td> 
<td><input type="text" id="cashapp" name="cashapp" class="txtinput"  placeholder="$cashapp_ID"  maxlength="50"  <?php if (!$cashapp){echo 'value=""';}else{echo 'value="'.$cashapp.'"';} ?> size="40"></td> 
</tr>
</table>
  </div>


<div id="social_links" class="w3-container w3-border tab" style="display:none">
<table>
<tr title="Optional">
<td>&emsp;Facebook&nbsp;</td> 
<td><input type="text" id="fb" name="fb" class="txtinput" placeholder="http://facebook.com/my_page" maxlength="50" <?php if (!$fb){echo 'value="http://facebook.com"';}else{echo 'value="'.$fb.'"';} ?> size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Twitter&nbsp;</td> 
<td><input type="text" id="twitter" name="twitter" placeholder="http://twitter.com/my_page" maxlength="50" <?php if (!$twitter){echo 'value="http://twitter.com"';}else{echo 'value="'.$twitter.'"';} ?> class="txtinput" size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Snap<font color="white">_</font>Chat&nbsp;</td> 
<td><input type="text" id="sc" name="sc"  placeholder="http://snapchat.com/my_page" maxlength="50" <?php if (!$sc){echo 'value="http://snapechat.com"';}else{echo 'value="'.$sc.'"';} ?> class="txtinput" size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Pinterest&nbsp;</td> 
<td><input type="text" id="pinterest" name="pinterest"  placeholder="http://pinterest.com/my_page" maxlength="50" <?php if (!$pinterest){echo 'value="http://pinterest.com"';}else{echo 'value="'.$pinterest.'"';} ?> class="txtinput" size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Instagram&nbsp;</td> 
<td><input type="text" id="instagram" name="instagram"  placeholder="http://instagram.com/my_page" maxlength="50" <?php if (!$instagram){echo 'value="http://instagram.com"';}else{echo 'value="'.$instagram.'"';} ?> value="http://instagram.com" class="txtinput" size="40"></td> 
</tr> 
<tr title="Optional">
<td>&emsp;Linkedin&nbsp;</td> 
<td><input type="text" id="linkedin" name="linkedin"  placeholder="http://linkedin.com/my_page" maxlength="50" <?php if (!$linkedin){echo 'value="http://linkedin.com"';}else{echo 'value="'.$linkedin.'"';} ?> class="txtinput" size="40"></td> 
</tr> 
</table>
</div>

<br><?php if(isMobile()){echo "<br><br><br><br>";} ?>

<!-- squeeze2 -->
<div id="squeeze2" class="w3-card-4 w3-border tab" style="display:none">
<header class="w3-container w3-purple">      
<big>Squeeze Page</big>
</header>

<table>
<tr>
<td>&emsp;Title</td> 
<td><input type="text" id="squeeze_title" name="squeeze_title" class="txtinput" placeholder="Squeeze Page Title"  maxlength="25"  <?php if (!$squeeze_title){echo 'placeholder="Squeeze Page Title" value=""';}else{echo 'value="'.$squeeze_title.'"';} ?> size="35"></td> 
</tr> 

<tr>
<td>&emsp;Description</td> 
<td><input type="text" id="squeeze_desc" name="squeeze_desc" class="txtinput" placeholder="Squeeze Page Description"  maxlength="50"  <?php if (!$squeeze_desc){echo 'value="Squeeze Page Description"';}else{echo 'value="'.$squeeze_desc.'"';} ?> size="35"></td> 
</tr> 

<tr>
<td>&emsp;Signup<font color="white">_</font>Box</td>
<td>
    <select style="cursor: pointer;" id="signup_box" name="signup_box">
       <?php if ($signup_box){echo "<OPTION selected>".$signup_box."</option>";} ?>
       <option value="left">left</option> 
       <option value="right">right</option>
     </select> 
</td>
</tr>

</table>
&emsp;&nbsp;<a href="#" title="Download leads" onclick="location.href='index.php?download=myfiles/widgets/emails.php'" class="w3-button w3-purple w3-button">Download</a>
<?php echo '&nbsp;<a href="?delete_leads=emails.php" title="Delete Leads" onclick="if (! confirm(\'Delete Email Leads?\')) { return false; }" class="w3-button w3-purple w3-button">Delete</a>&nbsp;'; ?>
&nbsp;<a href="#" title="Mail everyone on your lists" onclick="document.getElementById('mail_leads').style.display='block'" class="w3-button w3-purple w3-button">Send Mail</a>
<?php if(isMobile()){echo "<br><br>";} ?>
&nbsp;<a href="#" title="Need help building your squeeze page?" onclick="document.getElementById('squeeze_help').style.display='block'" class="w3-button w3-purple w3-button">Help</a><br><br>
</div>


<!-- download2 -->
<div id="download2" class="w3-card-4 w3-border tab" style="display:none">
<header class="w3-container w3-purple">      
<big>Download Page</big>
</header>

<table>
<tr>
<td>&emsp;Title</td> 
<td><input type="text" id="download_title" name="download_title" class="txtinput" placeholder="Download Page Title"  maxlength="25"  <?php if (!$download_title){echo 'placeholder="Download Page Title" value=""';}else{echo 'value="'.$download_title.'"';} ?> size="35"></td> 
</tr> 

<tr>
<td>&emsp;Description</td> 
<td><input type="text" id="download_desc" name="download_desc" class="txtinput" placeholder="Download Page Description"  maxlength="50"  <?php if (!$download_desc){echo 'value="Download Page Description"';}else{echo 'value="'.$download_desc.'"';} ?> size="35"></td> 
</tr> 

<tr>
<td>&emsp;Link</td> 
<td><input type="text" id="download_link" name="download_link" class="txtinput" placeholder="Download Page link"  maxlength="100"  <?php if (!$download_link){echo 'value="Download Page Link"';}else{echo 'value="'.$download_link.'"';} ?> size="35"></td> 
</tr> 

<tr>
<td>&emsp;Download<font color="white">_</font>Box</td>
<td>
    <select style="cursor: pointer;" id="download_box" name="download_box">
       <?php if ($download_box){echo "<OPTION selected>".$download_box."</option>";} ?>
       <option value="left">left</option> 
       <option value="right">right</option>
     </select> 
</td>
</tr>

</table>
&emsp;<a href="#" title="Need help building your download page?" onclick="document.getElementById('download_help').style.display='block'" class="w3-button w3-purple w3-button">Help</a><br><br>
</div>


<!-- Classifieds Ads -->
<div id="class2" class="w3-card-4 w3-border" style="display:none">
<header class="w3-container w3-purple">      
<big>Classifieds Ads Settings</big>
</header><br>

<div class="w3-container"> 
<b>Classifieds Ads</b> Allows visitors to post free classified ads on your site. <br><br>
<b>Removing Spam</b> You can remove spam and duplicate listings by right clicking on the following links, Home, Search & Post. <br><br>
<b>Database Full</b> If your database is full and cannot hold anymore ads, click "Delete All Ads" to delete all ads & reset the classified ads system.<br><br>
<b>Database Protect (Optional)</b> If you wish to protect your classified ads password database, add the following code to your ".htaccess" file.<br>
<xmp><Files "classified.txt"><br>
Order Allow,Deny<br>
Deny from all<br>
</Files></xmp><br>
<?php echo '&nbsp;<a href="?delete_ads=classified.txt" title="Reset Classifieds" onclick="if (! confirm(\'Delete All Classified Ads?\')) { return false; }" class="w3-button w3-purple w3-button">Delete All Ads</a>&nbsp;'; ?><br><br>
</div>
</div>


<!-- contact_us2 -->
<div id="contact_us2" class="w3-card-4 w3-border tab" style="display:none">
<header class="w3-container w3-purple">      
<big>Contact Us Form Settings</big>
</header>

<table>

<tr>
<td>&emsp;Add an message (optional)</td>
<td><input type="text" id="contact_msg" name="contact_msg" class="txtinput"  maxlength="100"  <?php if ($contact_msg){echo 'value="'.$contact_msg.'"';} ?> size="35"></td>  
</tr>

</table>
</div>


<?php if(isMobile()){echo "<br>";} ?>

</div>

<!-- Right Side -->
<div class="w3-container w3-half w3-animate-bottom">

     <header class="w3-container w3-purple">
      <h5><big><center>
        <a href="../sky-window.php?page=explorer" target="iFrameID">Myfiles</a>&emsp;&nbsp;
        <a href="../sky-window.php?page=mp4" target="iFrameID">Videos</a>&emsp;&nbsp;
        <a href="../sky-window.php?page=mp3" target="iFrameID">Music</a>&emsp;&nbsp;
        <a href="../sky-window.php?page=jpg" target="iFrameID">Photos</a>&emsp;&nbsp;
        <a href="../sky-window.php?page=txt" target="iFrameID">Blogs</a>
     </h5></big></center>
    </header>

    <div id="preview" class="w3-container w3-border" style="width:100%; height:1350px;">
      <?php if (file_exists("../myfiles/settings.php")){echo '<iframe src="../'.$template.'" title="preview" name="iFrameID" id="iFrameID" width="100%" height="100%"></iframe>';} ?>
    </div>

    <footer class="w3-container w3-purple">
      <h5>
        <center>
        <a href="../index.php" target="iFrameID">Home Page</a>&emsp;&nbsp;
        </center>
     </h5>
    </footer>
   </form>

<br>

<div class="w3-card-4 w3-margin">
     <header class="w3-container w3-purple">
      <h5>Upload</h5>
     </header>

    <div id="preview" class="w3-container w3-border">
	<form method='post' action='index.php' enctype='multipart/form-data'>
        <center>
 	<br><input type="file" name="file[]" id="file" multiple>
        <hr>
        <input type="reset">
 	<input type='submit' name='submit' value='Upload To'>
        <input type="text" id="display_folder" name="display_folder" value="/myfiles/" radonly="readonly" size="20"><br><br>
        </center>
	</form>
    </div>
</div>

<br>

<div class="w3-card-4 w3-rest w3-margin">
     <header class="w3-container w3-purple">
      <h5>Support</h5>
     </header>

    <div id="preview" class="w3-container w3-border w3-center">
          <input type="button" value="Update"  onclick="window.open('<?php echo $domain ?>/skypress.php?page=upgrade')">
          <input type="button" value="Tutorials" onclick="window.open('<?php echo $domain ?>/skypress_tutorials.php')">
          <input type="button" value="Troubleshoot" onclick="window.open('<?php echo $domain ?>/skypress_tutorials.php')">
          <input type="button" value="Support" onclick="document.getElementById('support').style.display='block'">
    </div>
</div>

<br>

<div class="w3-card-4 w3-rest w3-margin">
     <header class="w3-container w3-purple">
      <h5>Password Settings</h5>
     </header>

    <div id="preview" class="w3-container w3-border">
          <form action="index.php" method="get" style="display: inline-block;"><input type="hidden" id="password_reset" name="password_reset" value="password_reset" ><input type="submit" value="Change Password" onclick="return confirm('Password Reset - Are you sure?')" ></form>
    </div>
</div>

 </div>
</div>

<div class="w3-container">

<div class="w3-card-4 w3-half w3-margin">
     <header class="w3-container w3-purple">
      <h5>Hard Reset With Backup</h5>
     </header>

     <div id="preview" class="w3-container w3-border">
	<form action="index.php" method="get" style="display: inline-block;">
 	  <input type="hidden" id="hard_reset" name="hard_reset" value="password_reset" >
          <input type="submit" value="Reset Skypress" onclick="return confirm('Reset Skypress - Are you sure?')" >
        </form> 

	<form action="index.php" method="get" style="display: inline-block;">
 	  <input type="hidden" id="undo_reset" name="undo_reset" value="password_reset" >
          <input type="submit" value="Undo" onclick="return confirm('Undo Hard Reset - Are you sure?')" >
          <input type="button" value="Repair" onclick="if (confirm('Repair Skypress - Are you sure?')) location.href='index.php?repair=myfiles/repair.php'">
        </form> 


          
     </div>
</div>

<div class="w3-card-4 <?php if(!isMobile()){echo "w3-rest";}else{echo "w3-half";} ?> w3-margin">
     <header class="w3-container w3-purple">
      <h5>Backup Site</h5>
     </header>

    <div id="preview" class="w3-container w3-border">
	<form action="index.php" method="get" style="display: inline-block;">
 	  <input type="hidden" id="backup_site" name="backup_site">
          <input type="submit" value="Backup Site" onclick="return confirm('Backup Site?')" >
          <input type="button" value="Download Backup" onclick="window.open('../backup_site.zip')">
        </form> 
    </div>
</div>

</div><br>

<center>
<?php echo $version." (c) ".date("Y"); ?> - Supreme Search - <a href="#" onclick="document.getElementById('terms').style.display='block'">Terms Of Agreement</a>
</center>

</center>
</div><br>

<!-- Modal -->
<div id="header" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('header').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Your Site Header</h4>
    </header>
    <div class="w3-container">
      <center>
      <?php if (file_exists("../myfiles/header.jpg")) {echo "<a href='../myfiles/header.jpg' target='blank'><font color='blue'>../myfiles/header.jpg - View Header 1</font></a>";}else{echo "No Header Yet";} ?>
	<form method='post' action='index.php' enctype='multipart/form-data'>
 	<input type="file" name="file" id="file_header"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class="w3-round w3-button w3-purple" name='submit_header' value='Upload Header 1'>
        <input type='submit' class="w3-round w3-button w3-purple" name='header1' onclick="return confirm('Delete Header 1 - Are you sure?')" value='Delete'>
	</form>
      <hr>
      <?php if (file_exists("../myfiles/header2.jpg")) {echo "<a href='../myfiles/header2.jpg' target='blank'><font color='blue'>../myfiles/header2.jpg - View Header 2</font></a>";}else{echo "No Header Yet";} ?>
	<form method='post' action='index.php' enctype='multipart/form-data'>
 	<input type="file" name="file2" id="file_header2"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class="w3-round w3-button w3-purple" name='submit_header2' value='Upload Header 2'>
        <input type='submit' class="w3-round w3-button w3-purple" name='header2' onclick="return confirm('Delete Header 2 - Are you sure?')" value='Delete'>
	</form>
      <hr>
      <?php if (file_exists("../myfiles/header3.jpg")) {echo "<a href='../myfiles/header3.jpg' target='blank'><font color='blue'>../myfiles/header3.jpg - View Header 3</font></a>";}else{echo "No Header Yet";} ?>
	<form method='post' action='index.php' enctype='multipart/form-data'>
 	<input type="file" name="file3" id="file_header3"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class="w3-round w3-button w3-purple" name='submit_header3' value='Upload Header 3'>
        <input type='submit' class="w3-round w3-button w3-purple" name='header3' onclick="return confirm('Delete Header 3 - Are you sure?')" value='Delete'>
	</form><br>
        </center>
      <hr>
      <?php echo "<center><a href='".$domain."/Downloads/headers.zip' target='blank' class='w3-round w3-button w3-purple'>Download Headers</a></center><br>"; ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="logo" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-left">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('logo').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Your Site Logo</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("../myfiles/logo.jpg")) {echo "<a href='../myfiles/logo.jpg' target='blank'><font color='blue'>../myfiles/logo.jpg - View Logo</font></a>";}else{echo "No Logo Yet";} ?>
	<form method='post' action='index.php' enctype='multipart/form-data'>
        <center>
 	<input type="file" name="file" id="file_header"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class='w3-round w3-button w3-purple' name='submit_logo' value='Upload Logo'><br><br>
        </center>
	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="photo" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('photo').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Your Photo</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("../myfiles/photo.jpg")) {echo "<a href='../myfiles/photo.jpg' target='blank'><font color='blue'>../myfiles/photo.jpg - View Photo</font></a>";}else{echo "No Photo Yet";} ?>
	<form method='post' action='index.php' enctype='multipart/form-data'>
        <center>
 	<input type="file" name="file" id="file_photo"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class='w3-round w3-button w3-purple' name='submit_photo' value='Upload Photo'><br><br>
        </center>
	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="favicon" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('favicon').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Your Favicon</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("../myfiles/favicon-32x32.png")) {echo "<a href='../myfiles/favicon-32x32.png' target='blank'><font color='blue'>../myfiles/favicon-32x32.png - View Favicon</font></a>";}else{echo "No Favicon Yet";} ?>
	<form method='post' action='index.php' enctype='multipart/form-data'>
        <center>
 	<input type="file" name="file" id="file_Favicon"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class='w3-round w3-button w3-purple' name='submit_Favicon' value='Upload 32x32 png favicon'><br><br>
        </center>
	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="thumbnail" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('thumbnail').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Upload Thumbnail</h4>
    </header>
    <div class="w3-container">
	<form method='post' action='index.php' enctype='multipart/form-data'>
        <center><br>
 	<input type="file" name="file" id="file_thumbnail"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class='w3-round w3-button w3-purple' name='submit_thumbnail' value='Upload 150x150 Thumbnail'><br><br>
        </center>
	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="import" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('import').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Import Template</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("../myfiles/import")) {echo "<a href='../myfiles/import' target='blank'><font color='blue'>../myfiles/import - View Template</font></a>";}else{echo "No Import Template";} ?>
	<form method='post' action='index.php' enctype='multipart/form-data'>
        <center>
 	<input type="file" name="file" id="file_import"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' name='template_delete' value='Delete Template'>
        <input type='submit' name='submit_import' value='Upload Template'>
	</form>
 
        <br><br>This 2.7 update feature allows you to import wpress templates. The actual template does not import. However, a similar template is created. Make sure you import templates that use royalty free images or you have permission from the template developer before importing.<br><br>
        </center>

    </div>
  </div>
</div>

<!-- Modal -->
<div id="csv" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('csv').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>CSV Database</h4>
    </header>
    <div class="w3-container">
      <?php if (file_exists("../database.csv")) {echo "<a href='../database.csv' target='blank'><font color='blue'>../database.csv - View Template</font></a>";}else{echo "No CSV Database";} ?>
	<form method='post' action='index.php' enctype='multipart/form-data'>
        <center>
 	<input type="file" name="file" id="file_csv"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' name='submit_csv' value='Upload Database'>
	</form>
 
        <br><br>This option is us to import csv(comma delimited) database. CSV database is save in site root. Do not include "," in database fields use ";" instead.<br><br>
        </center>

    </div>
  </div>
</div>

<!-- Modal -->
<div id="store2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('store2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Online Store</h4>
    </header>
    <div class="w3-container"><br>

      <center>
	<form method='post' action='index.php' enctype='multipart/form-data'>
 	<input type="file" name="file" id="file_store_image"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class="w3-round w3-button w3-purple" name='submit_store_image' value='Upload Store Item (Image)'>
	</form>
        Upload your store items in jpg format & include a dash before your price within the filename. Example: "Red Table Lamp - 50.jpg" Skypress will set this item price at $50.00
      <hr>
	<form method='post' action='index.php' enctype='multipart/form-data'>
 	<input type="file" name="file" id="file_store_video"><?php if(isMobile()){echo "<br><br>";} ?>
        <input type='submit' class="w3-round w3-button w3-purple" name='submit_store_video' value='Upload Store Item (Video)'>
	</form>
        Upload your store item's videos in mp4 format. Using the same name as your item filename. Example: "Red Table Lamp - 50.mp4" Your video will show along with your item's image.
      <hr>
        <form method='post' action='index.php' enctype='multipart/form-data'>
        All Store Items Qty:
    	<select style="cursor: pointer;text-decoration: underline;" id="store_qty" name="store_qty" title="Select Qty For All Items In Your Store">
       		<?php if ($store_qty){echo "<OPTION selected>".$store_qty."</option>";} ?>
       		<option value="10">10</option>
       		<option value="9">9</option>
       		<option value="8">8</option>
       		<option value="7">7</option>
       		<option value="6">6</option>
       		<option value="5">5</option>
       		<option value="4">4</option>
       		<option value="3">3</option>
       		<option value="2">2</option>
       		<option value="1">1</option>
     	</select><input type='submit' class="w3-round w3-button w3-purple" value='Update Qty'> 
	</form>
      <br>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="advertisers2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('advertisers2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Advertisers</h4>
    </header>
    <div class="w3-container">
Allows visitors to sign up and advertise on your site. You can also display your ads on other sites by clicking on "Advertisers" to get your ad codes. 
    </div>
  </div>
</div>

<!-- Modal -->
<div id="music2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('music2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Music Site/Page</h4>
    </header>
    <div class="w3-container">
Setup your music site/page - Upload your music in mp3 format. Skypress will automatically build your site/page... You can also upload using ftp to your myfiles folder...
    </div>
  </div>
</div>

<!-- Modal -->
<div id="video2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('video2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Video Site/Page</h4>
    </header>
    <div class="w3-container">
Setup your video site/page - Upload your videos in mp4 format. Skypress will automatically build your site/page... You can also upload using ftp to your myfiles folder...
    </div>
  </div>
</div>

<!-- Modal -->
<div id="gallery2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('gallery2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Gallery Site/Page</h4>
    </header>
    <div class="w3-container">
Setup your gallery site/page - Upload your pictures in jpg format. Skypress will automatically build your site/page... You can also upload using ftp to your myfiles folder...
    </div>
  </div>
</div>

<!-- Modal -->
<div id="gaming2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('gaming2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Gaming Site/Page</h4>
    </header>
    <div class="w3-container">
Allows you to create a gaming site or page...
    </div>
  </div>
</div>

<!-- Modal -->
<div id="tv2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('tv2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Internet TV</h4>
    </header>
    <div class="w3-container">
Setup your internet tv site/page - Upload your videos in mp4 format. Skypress will automatically build your site/page... You can also upload using ftp to your myfiles folder...
    </div>
  </div>
</div>

<!-- Modal -->
<div id="radio2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('radio2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Internet Radio</h4>
    </header>
    <div class="w3-container">
Setup your internet radio site/page - Upload your music in mp3 format. Skypress will automatically build your site/page... You can also upload using ftp to your myfiles folder...
    </div>
  </div>
</div>

<!-- Modal -->
<div id="rank2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('rank2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Your Website Ranking</h4>
    </header>
    <div class="w3-container">
Supreme Stats comes with traffic statistics and ranking software that is approve by Supreme Search. Our ranking algorithm works in real time, using your sites traffic logs.
You can choose to display your site ranking if you wish by selecting "show". If you do not wish to show your ranking select "hide".
    </div>
  </div>
</div>

<!-- Modal -->
<div id="url_submit2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('url_submit2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Submit URL - For Search Engine Templates</h4>
    </header>
    <div class="w3-container">
Allows visitors to submit their URL to your search engine. URL's are not added to your database immediately. They are listed in your submission file and have to be added manually to your search engine's database under "Search" > "Settings".
    </div>
  </div>
</div>

<!-- Modal -->
<div id="application2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('application2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Are you hiring, or looking for candidates?</h4>
    </header>
    <div class="w3-container">
Allows visitors to apply for a job, to work for you or your organization. 
    </div>
  </div>
</div>

<!-- Modal -->
<div id="post" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity"style="width:600px">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('post').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Blog Post</h4>
    </header>
    <div class="w3-container w3-purple">
<center>
<form name="form" action="index.php" method="get"> 
<input type="text" id="Body_Title" name="Body_Title" class="w3-round txtinput w3-border-white" placeholder="Enter Title Here" <?php if(isset($_GET['open'])){echo 'readonly="readonly" value="'.str_replace('.txt', "", $_GET['open']).'"';} ?>size="64"  onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));">
<br><br>
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Left" onClick="Add_To_Body(this.form,7);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Center" onClick="Add_To_Body(this.form,8);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Right" onClick="Add_To_Body(this.form,9);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Indent" onClick="Add_To_Body(this.form,10);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Break" onClick="Add_To_Body(this.form,11);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Line" onClick="Add_To_Body(this.form,12);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Header" onClick="Add_To_Body(this.form,13);"><?php if(!isMobile()){echo "<br><br>";} ?> 
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Bold" onClick="Add_To_Body(this.form,1);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Italic" onClick="Add_To_Body(this.form,2);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Underline" onClick="Add_To_Body(this.form,3);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Small" onClick="Add_To_Body(this.form,4);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Big" onClick="Add_To_Body(this.form,5);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Highlight" onClick="Add_To_Body(this.form,6);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Link" onClick="Add_To_Body(this.form,14);"><?php if(!isMobile()){echo "<br><br>";} ?> 
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Embed" onClick="Add_To_Body(this.form,16);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="JS" onClick="Add_To_Body(this.form,18);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Preview" onClick="Preview(this.form);">
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Clear" onClick="Clear_All(this.form);">
<input type="submit" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Publish" onclick="return confirm('Publish Post?')"/>
<input type="button" class="w3-round <?php if(!isMobile()){echo "w3-button w3-white";} ?>" value="Help"  onclick="document.getElementById('post2').style.display='block'">
<br><br>

<textarea id="Body_Text" name="Body_Text" Rows="10" class="w3-round txtinput" cols="55" placeholder="Enter Post Here"><?php if(isset($_GET['open'])){echo file_get_contents('../myfiles/'.$_GET['open']);} ?></textarea>

</form>
</center>
    </div>
  </div>
</div>


<?php if(isset($_GET['open'])){echo "<script>document.getElementById('post').style.display='block';</script>";} ?>

<!-- Modal -->
<div id="post2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('post2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Posting Blogs</h4>
    </header>
    <div class="w3-container">

<b>Publish A Post</b><br>
When you publish a post, it is save as an txt file into your "myfiles" folder".<br><br>

<b>Edit A Post</b><br>
To edit your blog scroll the top of screen & click on blogs. Then click the blog you wish to edit. Your blog will then appear in the New Post area. Edit your blog then click "Publish" to save your updated blog".<br><br>

<b>Delete A Blog</b><br>
To delete a blog or file scroll the top of screen & select from one of the following Explorer, Videos, Music, Photos or Blogs. Then left click on the file you wish to delete. You we be prompt to confirm before deletion".<br><br>

<b>Auto Sync</b><br>
Your pages will automatically sync files together with similar filenames. Example: The Post "Build A Car" will contain "Build A Car.txt", "Build A Car.jpg" & "Build A Car.mp4". Upload your files though ftp to your myfiles folder. Acceptable file types are txt, jpg, mp3, & mp4.<br><br>

<b>Bulk Upload Blogs</b><br>
You can bulk upload all of your blogs though ftp to your "myfiles" folder". Upload your blogs in txt format. Save filename as blog title. Ex: "My Trip To Paris.txt"<br><br>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="support" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('support').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Send Support Ticket</h4>
    </header>
    <div class="w3-container">
	<form method='get' action='index.php' enctype='multipart/form-data'>
        <center>
<textarea id="support_text" name="support_text" class="txtinput" cols="70" rows="10" maxlength="500">
<?php echo "Your Name: ".$author."\r\n" ?>
<?php echo "Email: ".$paypal."\r\n" ?>
<?php echo "Type Your Message Below:"."\r\n" ?>
</textarea><br>
        <input type='submit' name='submit' value='Submit'>
	</form>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="mail_leads" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('mail_leads').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Email Your Lists</h4>
    </header>
    <div class="w3-container">
	<form method='get' action='index.php' enctype='multipart/form-data'>
        <center>
	<input id='email_title' name='email_title' style="border: 0px none;" placeholder='Your Email Title' size="76" maxlength="100" class='txtinput'><br>
	<textarea id="email_msg" name="email_msg" class="txtinput" cols="70" rows="10" maxlength="1000"></textarea><br>
        <input type='submit' name='submit' value='Send Email'>
        </center>
	</form>
    </div>
  </div>
</div>



<!-- Modal -->
<div id="squeeze_help" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('squeeze_help').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Squeeze Page Help</h4>
    </header>
    <div class="w3-container"><br>

<b>Title</b> Enter the title of your squeeze page. <br>
<b>Description</b> Enter a short description of your squeeze page. <br>
<b>Signup Box</b> Choose whether your signup box is left or righthand side of screen. <br>
<b>Download</b> Download your email leads.<br>
<b>Delete</b> Delete your email leads. <br>
<b>Send Mail</b> Send an email to your leads lists.<br><br>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="download_help" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('download_help').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Download Page Help</h4>
    </header>
    <div class="w3-container"><br>

<b>Title</b> Enter the title of your download page. <br>
<b>Description</b> Enter a short description of your download page. <br>
<b>Link</b> Enter a link for your download page..<br><br>

    </div>
  </div>
</div>


<!-- Modal -->
<div id="terms" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('terms').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Terms Of <a href="encoder/encode.php" target="blank">Agreement</a></h4>
    </header>
    <div class="w3-container">
      <?php echo nl2br(file_get_contents("../License.txt"))."<br><br>"; ?>
   </div>
  </div>
</div>


<!-- Modal -->
<div id="dir2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('dir2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Add Business Directory</h4>
    </header>
    <div class="w3-container">
Add a business directory to your site.
    </div>
  </div>
</div>

<!-- Modal -->
<div id="shares2" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('shares2').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Social Shares</h4>
    </header>
    <div class="w3-container">
Enable Social Shares for traffic boost for your site.
    </div>
  </div>
</div>

<!-- Modal -->
<div id="help" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('help').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Getting Started With Skypress</h4>
    </header>
    <div class="w3-container"><br>

<b>Setup Your Layout</b><br>
<b>Title</b> Enter your title will show in your site's header. <br>
<b>SubTitle</b> Is a short description of your website. <br>
<b>Author</b> Enter your name as author of your site & content. <br>
<b>Keywords</b> Search engines will use these words when indexing your site. <br>
<b>Header</b> (optional) Should be a full size image. You can get free images at <a href="https://pixabay.com/" target="blank"><font color="blue">Pixabay.com</font></a>.<br>
<b>Logo</b> (optional) Will appear in certain templates that use logos. <br>
<b>Photo</b> (optional) Your photo will appear in certain templates that includes photos. <br>
<b>Template</b> Choose a template for your site. A mobile preview will appear to the left. <br>	
<b>Content</b> Select how many blogs or images you wish to appear in a row. <br>	
<b>Page_Color</b> Choose a color for your site's page.<br>	
<b>Footer_Color</b> Choose a color for your site's footer located at the bottom of page.<br>	
<b>Font Color</b> Choose a color for your words on your pages.<br> 	
<b>Font Type</b> Choose a font for your site.<br>
<b>Link Color</b> Choose a color for your links within your pages. <br><br>

<b>Info</b><br>
<b>Your Address</b> (optional) Enter your business address. <br>	
<b>Your Phone#</b> (optional) Enter your business phone number. <br>
<b>Your Zelle#</b> (optional) Enter Zelle phone number for payments. <br>	
<b>Business Hours</b> (optional) Enter your business hours. Helpful for your visitors.<br>  	
<b>PayPal Email</b> (optional) Enter your Paypal Email. This will be use for taking payments.<br>
<b>Cash App ID</b> (optional) Enter your Cash App ID. This will be use for taking payments.<br><br>

<b>Social</b><br>
Enter your profile's link, so visitors may follow you or learn more about you.<br><br>

<b>Content</b><br>
<b>About</b> (optional) Describe yourself, skills, hobbies & more. <br>	
<b>Ads Code</b> (optional) Enter a code from displaying ads on your site.<br><br>
<b>Your Bio</b> Add your bio, your bio will be included on certain sites that use your bio info.<br><br>

<b>Custom Links</b><br>
Appears at the bottom of your site's page. You can have up to 5 custom links.<br><br>

<b>Save</b><br>
Once you're done editing/setting up your site. Click "Save" to save all changes.<br><br> 

<b>My Site</b><br>
View you site's homepage in new tab.<br><br>	

<b>Analytics</b><br>
Will display detailed stats & traffic to your site.<br><br>

<b>File Explorer</b><br>
File Explorer is located on the leftside of the screen. You can click on Myfiles, Videos, Music, Photos, Blogs to view files.
Left click on files to view or edit them. Right click on files to delete them.<br><br>

<b>Application Settings</b><br>
<b>Post</b> Select "Post" to post a new blog.<br>
<b>Settings</b> Allows you to edit certain functions for templates/applications.<br>
<b>Menu</b> Select "Show" to include these subpages in your site's popup menu or select "hide" to not include them in your site's popup menu. This option allows you have a multi-functional website and include more than just one template.<br><br> 

<b>Upload</b><br>
You can upload your content here or through ftp into your "myfiles" folder. Skypress supports txt, jpg, mp3 & mp4 files. All files are saved in your "myfiles" folder.<br><br>

<b>Hard Reset With Backup</b><br>
<b>Reset Skypress</b> Used this option to reset Skypress. Your files will backed up in a backup directory with time stamp.<br>
<b>Undo</b> Used this option undo to Hard Reset.<br>
<b>Repair</b> Used this option to Repair Skypress Core Files.<br><br>

<b>Backup Site</b><br>
<b>Backup Site</b> Use this option to backup your entire site.<br>
<b>Download Backup</b> Used this option to download your entire site.<br><br>

<b>Support</b><br>
<b>Update</b> Check for updates.<br>
<b>Tutorials</b> Watch Skypress tutorial videos.<br>
<b>Support</b> Contact support or send support ticket.<br><br>

<b>Password Reset</b><br>
<b>Change Password</b> Used this option to change your password. You will be prompted to enter your new pasword. Then click "Create Account" your current account will not be effected. This option only change your password.
If you need to recover your password, you can do so by downloading sky-password.php from your server. Then open the file with a text editor.<br><br>

    </div>
  </div>
</div>

<script type="text/javascript">

function Add_To_Body(form, Action){
  var AddTo_Body="";
  var txt="";

  if(Action==1) {  
    txt=prompt("BOLD Text:","Text");     
    if(txt!=null)           
    AddTo_Body = "<b>"+txt+"</b>";        
  }

  if(Action==2) {  
    txt=prompt("Italicized Text:","Text");     
    if(txt!=null)           
    AddTo_Body = "<i>"+txt+"</i>";        
  }

  if(Action==3) {  
    txt=prompt("Underlined Text:","Text");     
    if(txt!=null)           
    AddTo_Body = "<u>"+txt+"</u>";        
  }

  if(Action==4) {  
    txt=prompt("Small Text:","Text");     
    if(txt!=null)           
    AddTo_Body = "<small>"+txt+"</small>";        
  }

  if(Action==5) {  
    txt=prompt("Big Text:","Text");     
    if(txt!=null)           
    AddTo_Body = "<big>"+txt+"</big>";        
  }

  if(Action==6) {  
    txt=prompt("Highlight Text:","Text");     
    if(txt!=null)           
    AddTo_Body = '<span style="background-color: #FFFF00">'+txt+'</span>';        
  }

  if(Action==7) {  
    txt=prompt("Left Align Text:","Text");     
    if(txt!=null)           
    AddTo_Body = '<DIV align="left">'+txt+'</div>';        
  }

  if(Action==8) {  
    txt=prompt("Center Align Text:","Text");     
    if(txt!=null)           
    AddTo_Body = "<center>"+txt+"</center>";        
  }

  if(Action==9) {  
    txt=prompt("Right Align Text:","Text");     
    if(txt!=null)           
    AddTo_Body = '<DIV align="Right">'+txt+'</div>';        
  }

  if(Action==10) {  
    txt=prompt("Indent Text:","Text");     
    if(txt!=null)           
    AddTo_Body = "&nbsp;&nbsp;"+txt;        
  }

  if(Action==11) {AddTo_Body = "<BR>\r\n";}

  if(Action==12) {AddTo_Body = "<hr>\r\n";}

  if(Action==13){  
    txt=prompt("Text Header","Text");      
    if(txt!=null)           
    AddTo_Body = "<h1>"+txt+"</h1>\r\n";  
  }

  if(Action==14) {
    txt=prompt("Add a link.","http://");
      if(txt!=null){          
        AddTo_Body = "<a href=\""+txt+"\">";              
        txt=prompt("Text to be show for the link","Text");              
        AddTo_Body+=txt+"</a>\r\n";         
      }
  }

  if(Action==16) { 
    txt=prompt("Enter Embed Video Code","<Code>");    
    if(txt!=null)           
    AddTo_Body = txt; 
  }


  if(Action==18) { 
    txt=prompt("Enter js file name","file.js");    
    if(txt!=null)           
    AddTo_Body = '<SCRIPT SRC="'+txt+'"><\/SCRIPT>\r\n'; 
  }

  form.Body_Text.value+=AddTo_Body;
}


function Clear_All(form) {
  if(confirm("Are You Sure?")) { 
    form.Body_Text.value="";     
   }
}


function Preview(form) {
  msg=open("","DisplayWindow","status=yes,scrollbars=yes,menubar=yes");
  msg.document.write(form.Body_Text.value);
}

function closeall(){
  document.getElementById("layout").style.display = "none";
  document.getElementById("business").style.display = "none";
  document.getElementById("social_links").style.display = "none";
}

function closesubs(){
  document.getElementById("squeeze2").style.display = "none";
  document.getElementById("class2").style.display = "none";
  document.getElementById("contact_us2").style.display = "none";
  document.getElementById("download2").style.display = "none";
}

function opentab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-purple", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " w3-purple";
}

//Number only for prices
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function myFunction(){

 var x = document.getElementById("template").value; var resx = x.split("|");
 if (resx[0] === "sky-blog0.php"){document.getElementById('iFrameID').src = "images/template0.png";alert('Note: Add 3 headers for best performance... header.jpg, header2.jpg & header3.jpg');}
 if (resx[0] === "sky-blog1.php"){document.getElementById('iFrameID').src = "images/template1.png";}
 if (resx[0] === "sky-blog2.php"){document.getElementById('iFrameID').src = "images/template2.png";}
 if (resx[0] === "sky-blog3.php"){document.getElementById('iFrameID').src = "images/template3.png"; alert('Note: This template is only available in the color white...');}
 if (resx[0] === "sky-blog4.php"){document.getElementById('iFrameID').src = "images/template4.png"; alert('Note: Max columns for this template is 2 ...');}
 if (resx[0] === "sky-blog5.php"){document.getElementById('iFrameID').src = "images/template5.png"; alert('Note: This template is only available in the color white...');}
 if (resx[0] === "sky-blog6.php"){document.getElementById('iFrameID').src = "images/template6.png"; alert('Note: This template uses 3 headers... header.jpg, header2.jpg & header3.jpg');}
 if (resx[0] === "sky-blog7.php"){document.getElementById('iFrameID').src = "images/template7.png"; alert('Note: This template uses 3 headers... header.jpg, header2.jpg & header3.jpg');}

 if (resx[0] === "sky-blog8.php?s=1"){document.getElementById('iFrameID').src = "images/t8.png";}
 if (resx[0] === "sky-blog8.php?s=2"){document.getElementById('iFrameID').src = "images/t9.png";}
 if (resx[0] === "sky-blog8.php?s=3"){document.getElementById('iFrameID').src = "images/t10.png";}
 if (resx[0] === "sky-blog8.php?s=4"){document.getElementById('iFrameID').src = "images/t11.png";}
 if (resx[0] === "sky-blog8.php?s=5"){document.getElementById('iFrameID').src = "images/t12.png";}
 if (resx[0] === "sky-blog8.php?s=6"){document.getElementById('iFrameID').src = "images/t13.png";}
 if (resx[0] === "sky-blog8.php?s=7"){document.getElementById('iFrameID').src = "images/t14.png";}
 if (resx[0] === "sky-blog8.php?s=8"){document.getElementById('iFrameID').src = "images/t15.png";}
 if (resx[0] === "sky-blog8.php?s=9"){document.getElementById('iFrameID').src = "images/t16.png";}
 if (resx[0] === "sky-custom-t.php"){document.getElementById('iFrameID').src = "<?php echo $domain ?>/skypress/sky-custom-t.php";}
 if (resx[0] === "sky-custom-t2.php"){document.getElementById('iFrameID').src = "<?php echo $domain ?>/skypress/sky-custom-t2.php";}
 if (resx[0] === "sky-custom-t3.php"){document.getElementById('iFrameID').src = "<?php echo $domain ?>/skypress/sky-custom-t3.php";}
 if (resx[0] === "sky-blog17.php"){document.getElementById('iFrameID').src = "<?php echo $domain ?>/skypress/sky-blog17.php";}
 if (resx[0] === "sky-blog18.php"){document.getElementById('iFrameID').src = "<?php echo $domain ?>/skypress/sky-blog18.php";}
 if (resx[0] === "sky-blog19.php"){document.getElementById('iFrameID').src = "<?php echo $domain ?>/skypress/sky-blog19.php";}
 if (resx[0] === "sky-blog20.php"){document.getElementById('iFrameID').src = "<?php echo $domain ?>/skypress/sky-blog20.php";}

 if (resx[0] === "sky-application.php"){document.getElementById('iFrameID').src = "../sky-application.php";}
 if (resx[0] === "sky-classified.php"){document.getElementById('iFrameID').src = "images/class.png";}
 if (resx[0] === "sky-contact.php"){document.getElementById('iFrameID').src = "../sky-contact.php";}
 if (resx[0] === "sky-course.php"){document.getElementById('iFrameID').src = "images/course.png";}
 if (resx[0] === "sky-os.php"){document.getElementById('iFrameID').src = "images/os.png";}
 if (resx[0] === "sky-download.php"){document.getElementById('iFrameID').src = "images/download.png";}
 if (resx[0] === "sky-radio.php"){document.getElementById('iFrameID').src = "images/radiop.png";}
 if (resx[0] === "sky-tv.php"){document.getElementById('iFrameID').src = "images/tvp.png";}
 if (resx[0] === "sky-packages.php"){document.getElementById('iFrameID').src = "images/package.png";}
 if (resx[0] === "sky-portal.php"){document.getElementById('iFrameID').src = "images/portal.png";}
 if (resx[0] === "sky-portal-2.php"){document.getElementById('iFrameID').src = "images/portal2.png";}
 if (resx[0] === "sky-search.php"){document.getElementById('iFrameID').src = "images/search.png";}
 if (resx[0] === "sky-search-2.php"){document.getElementById('iFrameID').src = "images/search2.png";}
 if (resx[0] === "sky-search-3.php"){document.getElementById('iFrameID').src = "<?php echo $domain ?>/skypress/sky-search-3.php";}
 if (resx[0] === "sky-squeeze-page.php"){document.getElementById('iFrameID').src = "images/squeeze.png";}
 if (resx[0] === "sky-business_dir.php"){document.getElementById('iFrameID').src = "images/business.png";}
 if (resx[0] === "sky-delivery.php"){document.getElementById('iFrameID').src = "images/delivery.png";}
 if (resx[0] === "sky-cast.php"){document.getElementById('iFrameID').src = "images/skycast_radio.jpg";}
 if (resx[0] === "sky-cast2.php"){document.getElementById('iFrameID').src = "images/skycast_tv.jpg";}

}

</script>
