<?php

  $Order_Details = $_REQUEST['Country']." ".$_REQUEST['Order_Details'] ;

  //Classified
  if ((strpos(strtolower($Order_Details), strtolower("classified")) !== false) || (strpos(strtolower($Order_Details), strtolower("edit")) !== false)){ 
  $Category = $_REQUEST['category']; if($Category != "Captcha@"){echo "Is cereal soup? Why or why not?"; exit;}
  $Ip = $_REQUEST['ip']; if($Ip != $_SERVER['REMOTE_ADDR']){echo "Why did the robot go back to robot school? Because his skills were getting a little rusty!"; exit;}

  $maxsize = 4600000; if(filesize("myfiles/widgets/classified.txt") > $maxsize){echo "Database Full, Please Try Again Later..."; exit;}

  $Ad_Title = $_REQUEST['requiredAd_Title'] ; 		$Ad_Title = str_replace('|', '', $Ad_Title); 
  $Image_URL = $_REQUEST['mypic'] ;			$Image_URL = str_replace('|', '', $Image_URL); 			if (strlen($Image_URL) <= 10){$Image_URL = "na";}
  $Website_URL = $_REQUEST['requiredWebsite_URL'] ;	$Website_URL = str_replace('|', '', $Website_URL); 		$Website_URL = str_replace('http://', '', $Website_URL);	$Website_URL = str_replace('https://', '', $Website_URL); 
  $phone = $_REQUEST['phone'] ;				$phone = str_replace('|', '', $phone);  			if (strlen($phone) <= 10){$phone = "na";}
  $Ad_Content = $_REQUEST['requiredAd_Content'] ;	$Ad_Content = preg_replace( "/(\r|\n)/", "", $Ad_Content);	$Ad_Content = str_replace('|', '', $Ad_Content); 
  $password = $_REQUEST['password']; 

  //Create New Ad
  if ((strlen($country) >= 2) && (strlen($state) >= 2)){
    $new_ad = $Ad_Title."|".$Image_URL."|".$Ad_Content." ".$country.", ".$state." - ".date("M")." ".date("j")."|".$phone."|".$Website_URL."|".$password;
  }else{
    $new_ad = $Ad_Title."|".$Image_URL."|".$Ad_Content." ".date("M")." ".date("j")."|".$phone."|".$Website_URL."|".$password;
  }

  //Clean String
  $Remove_Tags = array("<", "[", "{");

    //Fall Checker
    $fail = 0;
    for($c = 0; $c < count($Remove_Tags); next($Remove_Tags), $c++){
      if (strpos(strtolower($new_ad), strtolower($Remove_Tags[$c])) !== false){$fail++;} 
    }

    //Open File To Save
    if ($fail === 0){
      if (strpos(strtolower($Order_Details), strtolower("classified")) !== false){ 
        $handle = fopen("myfiles/widgets/classified.txt", 'a+');
        fwrite($handle, $new_ad."\r\n");
      }else{
	$reading = fopen('myfiles/widgets/classified.txt', 'r');
	$writing = fopen('myfiles/widgets/classified.tmp', 'w');
	$replaced = false;

	while (!feof($reading)) {
	  $line = fgets($reading);
	  if (stristr($line,$password)) { //find it
	    $line = $new_ad."\n"; //replace it
	    $replaced = true;
	  }
	  fputs($writing, $line);
	}
	fclose($reading); fclose($writing);
	
	if ($replaced){ // might as well not overwrite the file if we didn't replace anything
	  rename('myfiles/widgets/classified.tmp', 'myfiles/widgets/classified.txt');
	} else {
	  unlink('myfiles/widgets/classified.tmp');
	}
      }
    }else{header( "Location: sky-classified.php" ); exit;}

  header( "Location: sky-classified.php" ); exit;
  }


  //press-release
  if ((strpos(strtolower($Order_Details), strtolower("press-release")) !== false) || (strpos(strtolower($Order_Details), strtolower("update")) !== false)){ 
  $Category = $_REQUEST['category']; if($Category != "Captcha@"){echo "Is cereal soup? Why or why not?"; exit;}
  $Ip = $_REQUEST['ip']; if($Ip != $_SERVER['REMOTE_ADDR']){echo "Why did the robot go back to robot school? Because his skills were getting a little rusty!"; exit;}

  $maxsize = 4600000; if(filesize("myfiles/widgets/press-release.txt") > $maxsize){echo "Database Full, Please Try Again Later..."; exit;}

  $Ad_Title = $_REQUEST['requiredAd_Title'] ; 		$Ad_Title = str_replace('|', '', $Ad_Title); 
  $Image_URL = $_REQUEST['mypic'] ;			$Image_URL = str_replace('|', '', $Image_URL); 			if (strlen($Image_URL) <= 10){$Image_URL = "na";}
  $Website_URL = $_REQUEST['requiredWebsite_URL'] ;	$Website_URL = str_replace('|', '', $Website_URL); 		$Website_URL = str_replace('http://', '', $Website_URL);	$Website_URL = str_replace('https://', '', $Website_URL); 
  $phone = $_REQUEST['phone'] ;				$phone = str_replace('|', '', $phone);  			if (strlen($phone) <= 10){$phone = "na";}
  $Ad_Content = $_REQUEST['requiredAd_Content'] ;	$Ad_Content = preg_replace( "/(\r|\n)/", "", $Ad_Content);	$Ad_Content = str_replace('|', '', $Ad_Content); 
  $password = $_REQUEST['password']; 

  //Create New Ad
  if ((strlen($country) >= 2) && (strlen($state) >= 2)){
    $new_ad = $Ad_Title."|".$Image_URL."|".$Ad_Content." ".$country.", ".$state." - ".date("M")." ".date("j")."|".$phone."|".$Website_URL."|".$password;
  }else{
    $new_ad = $Ad_Title."|".$Image_URL."|".$Ad_Content." ".date("M")." ".date("j")."|".$phone."|".$Website_URL."|".$password;
  }

  //Clean String
  $Remove_Tags = array("<", "[", "{");

    //Fall Checker
    $fail = 0;

    //Spam Lock
    if (strlen($Ad_Content) < 875){$fail++;}

    for($c = 0; $c < count($Remove_Tags); next($Remove_Tags), $c++){
      if (strpos(strtolower($new_ad), strtolower($Remove_Tags[$c])) !== false){$fail++;} 
    }

    //Open File To Save
    if ($fail === 0){
      if (strpos(strtolower($Order_Details), strtolower("press-release")) !== false){ 
        $handle = fopen("press-release.txt", 'a+');
        fwrite($handle, $new_ad."\r\n");
      }else{
	$reading = fopen('myfiles/widgets/press-release.txt', 'r');
	$writing = fopen('myfiles/widgets/press-release.tmp', 'w');
	$replaced = false;

	while (!feof($reading)) {
	  $line = fgets($reading);
	  if (stristr($line,$password)) { //find it
	    $line = $new_ad."\n"; //replace it
	    $replaced = true;
	  }
	  fputs($writing, $line);
	}
	fclose($reading); fclose($writing);
	
	if ($replaced){ // might as well not overwrite the file if we didn't replace anything
	  rename('myfiles/widgets/press-release.tmp', 'myfiles/widgets/press-release.txt');
	} else {
	  unlink('myfiles/widgets/press-release.tmp');
	}
      }
    }else{header( "Location: sky-classified.php?type=press-release" ); exit;}

  header( "Location: sky-classified.php?type=press-release" ); exit;
  }

?>