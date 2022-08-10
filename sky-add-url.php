<?php

    $Website_TITLE = $_REQUEST['requiredWebsite_TITLE'] ;
    $Website_URL = $_REQUEST['requiredWebsite_URL'] ;

    //Anti Spam 2
    if (strlen($Website_URL) < 10){echo "Invaild URL"; exit;}
    if (strlen($Website_URL) < 3){echo "Invaild Title"; exit;}

    //Clean String
    $Website_URL = str_replace('http://', '', $Website_URL); 
    $Website_URL = str_replace('https://', '', $Website_URL); 
    $Remove_Tags = array(" ", "/");

    //Fall Checker
    $fail = 0;
    for($c = 0; $c < count($Remove_Tags); next($Remove_Tags), $c++){
      if (strpos(strtolower($Website_URL), strtolower($Remove_Tags[$c])) !== false){$fail++;} 
    }

    //Open File To Save
    if ($fail === 0){
      $handle = fopen("myfiles/widgets/Submissions.txt", 'a+');
      fwrite($handle, $Website_TITLE."|http://".$Website_URL."\r\n");
    }else{header( "Location: index.php" ); exit;}

    header( "Location: index.php" ); exit;

?>