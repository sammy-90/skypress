<?php

session_start();

//Signup 
if (strlen($_REQUEST['requiredpw2']) > 3){

  //Get Data
  $Category = $_REQUEST['category'];
  $ip = $_REQUEST['ip'];
  $pw2 = $_REQUEST['requiredpw2'];

  $name = $_REQUEST['requiredname'];
  $email = strtolower($_REQUEST['requiredemail']);
  $city = $_REQUEST['requiredcity'];
  $state = $_REQUEST['requiredstate'];
  $country = $_REQUEST['requiredcountry'];
  $zip = $_REQUEST['requiredzip'];
  $pw1 = $_REQUEST['requiredpw1'];
  $color = $_REQUEST['color'];
  $address2 = $_REQUEST['required_address'];
  $phone = $_REQUEST['requiredphone']; 

  $mtitle = $_REQUEST['mtitle'];
  $mbday = $_REQUEST['mbday'];
  $gender = $_REQUEST['gender'];
  $bname = $_REQUEST['bname'];
  $desc = $_REQUEST['desc'];
  $mhours = $_REQUEST['mhours'];
  $msite = $_REQUEST['msite'];
  $mfb = $_REQUEST['mfb'];
  $mtwitter = $_REQUEST['mtwitter'];
  $msc = $_REQUEST['msc'];
  $mpinterest = $_REQUEST['mpinterest'];
  $minstagram = $_REQUEST['minstagram'];
  $mlinkedin = $_REQUEST['mlinkedin'];

  //Bot Blocker 0 - 1
  if($Category != "Captcha@"){echo $Category."Bot Blocker 0"; exit;} 
  if(!$name){echo "Bot Blocker 1"; exit;}
  if(!$email){echo "Bot Blocker 1"; exit;}
  if(!$city){echo "Bot Blocker 1"; exit;}
  if(!$state){echo "Bot Blocker 1"; exit;}
  if(!$country){echo "Bot Blocker 1"; exit;}
  if(!$zip){echo "Bot Blocker 1"; exit;}
  if(!$pw1){echo "Bot Blocker 1"; exit;}
  if(!$pw2){echo "Bot Blocker 1"; exit;}
  if(!$color){echo "Bot Blocker 1"; exit;}

  //Bot Blocker 3
  if (strlen($city)>2){echo " - ";}else{echo "Incorrect Input City"; exit;}
  if (strlen($state)>1){echo " - ";}else{echo "Incorrect Input State"; exit;}
  if (strlen($country)>1){echo " - ";}else{echo "Incorrect Input Country"; exit;}
  if (strlen($zip)>4){echo " - ";}else{echo "Incorrect Input Zip"; exit;}

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
  if (file_exists('myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.php')){echo "Username already exist"; exit;}
  $f=fopen('myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.php','w');

  fwrite($f,'<?php'."\r\n");

  //account details
  fwrite($f,'$name="'.str_replace('"', "'", $name).'";'."\r\n");
  fwrite($f,'$email="'.str_replace('"', "'", $email).'";'."\r\n");
  fwrite($f,'$address2="'.str_replace('"', "'", $address2).'";'."\r\n");
  fwrite($f,'$city="'.str_replace('"', "'", $city).'";'."\r\n");
  fwrite($f,'$state="'.str_replace('"', "'", $state).'";'."\r\n");
  fwrite($f,'$country="'.str_replace('"', "'", $country).'";'."\r\n");
  fwrite($f,'$zip="'.str_replace('"', "'", $zip).'";'."\r\n");
  fwrite($f,'$phone="'.str_replace('"', "'", $phone).'";'."\r\n");
  fwrite($f,'$color="'.str_replace('"', "'", $color).'";'."\r\n");
  fwrite($f,'$pw1="'.str_replace('"', "'", $pw1).'";'."\r\n");

  fwrite($f,'$mtitle="'.str_replace('"', "'", $mtitle).'";'."\r\n");
  fwrite($f,'$mbday="'.str_replace('"', "'", $mbday).'";'."\r\n");
  fwrite($f,'$gender="'.str_replace('"', "'", $gender).'";'."\r\n");
  fwrite($f,'$bname="'.str_replace('"', "'", $bname).'";'."\r\n");
  fwrite($f,'$desc="'.str_replace('"', "'", $desc).'";'."\r\n");
  fwrite($f,'$mhours="'.str_replace('"', "'", $mhours).'";'."\r\n");
  fwrite($f,'$msite="'.str_replace('"', "'", $msite).'";'."\r\n");
  fwrite($f,'$mfb="'.str_replace('"', "'", $mfb).'";'."\r\n");
  fwrite($f,'$mtwitter="'.str_replace('"', "'", $mtwitter).'";'."\r\n");
  fwrite($f,'$msc="'.str_replace('"', "'", $msc).'";'."\r\n");
  fwrite($f,'$mpinterest="'.str_replace('"', "'", $mpinterest).'";'."\r\n");
  fwrite($f,'$minstagram="'.str_replace('"', "'", $minstagram).'";'."\r\n");
  fwrite($f,'$mlinkedin="'.str_replace('"', "'", $mlinkedin).'";'."\r\n");

  fwrite($f,'$mrank="No Ranking Yet";'."\r\n");
  fwrite($f,'$balance="0";'."\r\n");

  fwrite($f,'?>');
  fclose($f);

  //Send Email
  mail($email,"Signup Information","Thank you for signing up! Your Login info is... Username: ".$email." password: ".$pw1);
  echo "Account Created!<br><a href='javascript:window.history.back();'>Back</a>"; 

}else{

  if(isset($_GET['logout'])){include "sky-logout.php";}   

  //Login
  $test_email = strtolower($_REQUEST['requiredemail']);
  if(isset($_POST['test_email'])){$test_email = strtolower($_POST['requiredemail']);}

  //get password
  if (isset($_POST['requiredpw1'])){$_SESSION['requiredpw1'] = $_POST['requiredpw1'];}
  if (isset($_GET['requiredpw1'])){$_SESSION['requiredpw1'] = $_REQUEST['requiredpw1'];}
  $test_pw1 = $_SESSION['requiredpw1'];

  //Bot Blocker 1
  if(!$test_email){echo "Bot Blocker 1"; exit;}
  if(!$test_pw1){echo "Bot Blocker 2"; exit;}

  //Find Account
  $account_name = explode("@", $test_email);

  //File Name
  $myinfo = $account_name[0].substr($account_name[1], 0, 1);

  $myprofile = 'myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.php';

  //Check if file exist
  if (file_exists($myprofile)){
     include $myprofile;
   }else{

     //admin login
     if($test_email == "admin"){

       include "sky-password.php";

       if ($test_pw1 == $your_password){if (isset($_SESSION['login_count'])){unset($_SESSION['login_count']);} $_SESSION['password'] = $your_password; include 'sky-account_members.php'; exit;}else{header('Location: sky-admin/index.php'); exit;}

     }

     //No Accounts Found
     echo "User Not Found"; include "sky-logout.php"; echo " <a href='index.php'>Refresh</a>"; exit;

   }

  //Login
  if ($test_pw1 != $pw1){echo "&emsp;&nbsp;Login failed"; include "sky-logout.php"; echo " <a href='index.php'>Refresh</a>"; exit;}

  //backup color
  $user_color = $color;

  //Turn In Login
  $login = "on"; 

  //Delete Account
  if (isset($_POST['delete_account'])) {
    if ($_POST['delete_account'] == 'DELETE'){
     
      if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo.".php")){unlink("myfiles/".$_REQUEST['dir']."/".$myinfo.".php");}
      if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo.".jpg")){unlink("myfiles/".$_REQUEST['dir']."/".$myinfo.".jpg");}
      if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo."_mrank.php")){unlink("myfiles/".$_REQUEST['dir']."/".$myinfo."_mrank.php");}
      if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo."_header.jpg")){unlink("myfiles/".$_REQUEST['dir']."/".$myinfo."_header.jpg");}
      if (file_exists("myfiles/".$_REQUEST['dir']."/".$myinfo."_review.txt")){unlink("myfiles/".$_REQUEST['dir']."/".$myinfo."_review.txt");}
      echo "Account Deleted";  exit;

    }else{
      echo "<script>\n"; 
      echo "alert(\"Error, Try Again...\");\n"; 
      echo "</script>\n";
    }
  }

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
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Upload Header
  if(isset($_POST['submit_header'])){
 
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'myfiles/'.$_REQUEST['dir'].'/'.$myinfo.'_header.jpg');
 
    echo "<script>\n"; 
    echo "alert(\"Upload Successful...\");\n"; 
    echo "</script>\n";

  } 

  //Post Review
  if(isset($_POST['review_it'])){
    $prestar_it = str_replace("#","&#",$_REQUEST['star_it']);
    $premyinfo = str_ireplace( array( '\'', ':', '|' , ';', '<', '>', '}', ']', '#', '/', '$' ), ' ', $myinfo);
    $prereview_it = str_ireplace( array( '\'', ':', '|' , ';', '<', '>', '}', ']', '#', '/', '$' ), ' ', $_REQUEST['review_it']);
    $my_review = $_REQUEST['flink']."|".substr($premyinfo, 0, -1)."|".$prestar_it."|".date('m/d/Y')."|".$prereview_it;

     if($_REQUEST['user'] !== $myinfo){$post_file = "myfiles/".$_REQUEST['dir']."/".$_REQUEST['user']."_review.txt";

      if (file_exists($post_file)){   

        //Recycle Disc Space
        $maxsize = 4600000;
        if(filesize($post_file) > $maxsize){
          $content = file($post_file); 
          $hcount = count($content) / 2;
          $f=fopen($post_file,'w');
	  for($j = $hcount; $j < count($content); next($content), $j++){
            fwrite($f,$content[$j]);
	  }fclose($f);
        }
        if(filesize($post_file) > $maxsize){echo "Database Full, Please Try Again Later..."; exit;}

        //Search & replace old review 
	$reading = fopen($post_file, "r");
	$writing = fopen("myfiles/".$_REQUEST['dir']."/".$_REQUEST['user']."_review.tmp", "w");
	$replaced = false;

	while (!feof($reading)) {
	  $line = fgets($reading);
	  if (stristr($line,"|".substr($premyinfo, 0, -1)."|")) { //find it
	    $line = $my_review."\n"; //replace it
	    $replaced = true;
	  }
	  fputs($writing, $line);
	}
	fclose($reading); fclose($writing);

      }
	
      if ($replaced){ // might as well not overwrite the file if we didn't replace anything
        rename("myfiles/".$_REQUEST['dir']."/".$_REQUEST['user']."_review.tmp", $post_file);
      } else {
        $handle = fopen($post_file, 'a+');
        fwrite($handle, $my_review."\r\n");
        fclose($handle);
	unlink("myfiles/".$_REQUEST['dir']."/".$_REQUEST['user']."_review.tmp");
      }

      //Save Total Ranking
      $total_ranking = 0;
      $total_rank = file("myfiles/".$_REQUEST['dir']."/".$_REQUEST['user']."_review.txt");
      for($sc = 0; $sc <= count($total_rank); next($total_rank), $sc++){
        if (strpos(strtolower($total_rank[$sc]), strtolower("|&#9733;&#9733;&#9733;&#9733;&#9733;|")) !== false){$total_ranking = $total_ranking + 5;}
        if (strpos(strtolower($total_rank[$sc]), strtolower("|&#9733;&#9733;&#9733;&#9733;|")) !== false){$total_ranking = $total_ranking + 4;}
        if (strpos(strtolower($total_rank[$sc]), strtolower("|&#9733;&#9733;&#9733;|")) !== false){$total_ranking = $total_ranking + 3;}
        if (strpos(strtolower($total_rank[$sc]), strtolower("|&#9733;&#9733;|")) !== false){$total_ranking = $total_ranking + 2;}
        if (strpos(strtolower($total_rank[$sc]), strtolower("|&#9733;|")) !== false){$total_ranking = $total_ranking + 1;}
      }
      $myranking = round(($total_ranking/count($total_rank)));
      if($myranking == 1){$mrank = "&#9733;";}
      if($myranking == 2){$mrank = "&#9733;&#9733;";}
      if($myranking == 3){$mrank = "&#9733;&#9733;&#9733;";}
      if($myranking == 4){$mrank = "&#9733;&#9733;&#9733;&#9733;";}
      if($myranking == 5){$mrank = "&#9733;&#9733;&#9733;&#9733;&#9733;";}

      //Check if file exist
      $f=fopen("myfiles/".$_REQUEST['dir']."/".$_REQUEST['user']."_mrank.php","w");

      fwrite($f,'<?php'."\r\n");
      fwrite($f,'$mrank="'.$mrank.'";'."\r\n");
      fwrite($f,'?>');
      fclose($f);

      echo "<script>\n"; 
      echo "alert(\"Thank you, for your review!\");\n"; 
      echo "</script>\n";

   }else{

     echo "<script>\n"; 
     echo "alert(\"You can't review your own business...\");\n"; 
     echo "</script>\n";

   }

  }//End Review 

  include $_REQUEST['link'].".php";

}

?>