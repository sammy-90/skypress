<?php 

    $dir = $_GET['dir'];
    $url = $_SERVER['REQUEST_URI']; //returns the current URL
    $parts = explode('/sky-window2.php',$url);

    //Open Myfiles Dir
    $dh = opendir(".".$dir);

    //Get Password
    $admin_mode = "off";
    session_start();
    include "sky-password.php";
    if($_SESSION['password'] == $your_password){
      $admin_mode = "on";

      echo '<script>'."\r\n";
      echo 'function mydelete(link){'."\r\n";
        echo 'var link;'."\r\n";
        echo 'var r = confirm(link);'."\r\n";
        echo 'if (r == true) {'."\r\n";
          echo 'top.location.href = "sky-admin/index.php?delete2="+link';
        echo '}'."\r\n";
      echo '}'."\r\n";
      echo '</script>'."\r\n";

     }

   $file_count = 0;
   while (($file = readdir($dh)) !== false){$file_count++;
    if ($file_count > 2){
      echo '<center><div class="w3-col m6">'."\r\n";
      if($admin_mode == "on"){
        if (strpos(strtolower($file), strtolower(".txt")) !== false) {
          echo '<a href="sky-admin/index.php?copen='.$dir.$file.'" target="_top" oncontextmenu="mydelete(\''.$dir.$file.'\'); return false">';
        }else{
          echo '<a href="'.$parts[0].$dir.$file.'" oncontextmenu="mydelete(\''.$dir.$file.'\'); return false">';
        }
      }
      if (strpos(strtolower($file), strtolower(".txt")) !== false) {echo '<img src="sky-admin/images/txt.png">'."\r\n";}
      if (strpos(strtolower($file), strtolower(".mp3")) !== false) {echo '<img src="sky-admin/images/mp3.png">'."\r\n";}
      if (strpos(strtolower($file), strtolower(".mp4")) !== false) {echo '<img src="sky-admin/images/mp4.png">'."\r\n";}
      if (strpos(strtolower($file), strtolower(".jpg")) !== false) {echo '<img src="sky-admin/images/jpg.png">'."\r\n";}
      echo '<p>'.$file.'</p>'."\r\n";
      echo '</a>'."\r\n";
      echo '</div></center>'."\r\n";

    }
    
   } 

   closedir($dh);


?>
