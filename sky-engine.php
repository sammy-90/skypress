<?php

$counter = 0;
$item_counter = 0;
$i = $_GET['i']; if(!$i){$i = 0;}

//Max items per page
if ($content == 1){$max_width = "w3-rest";}
if ($content == 2){$max_width = "w3-half";}
if ($content == 3){$max_width = "w3-third";}
if ($content == 4){$max_width = "w3-quarter";}

//Open Myfiles Dir
$dh = opendir("./myfiles");

//Multi Site Function
if (isset($_GET['page'])) {$type = $_GET['page'];}


 //Show Post
 $Poster = "off";
 if ((isset($_GET['post'])) && ($type == "blog")){$Poster = "on";}
 if ((isset($_GET['post'])) && ($type == "blog2")){$Poster = "on";}
 if ((isset($_GET['post'])) && ($type == "portal")){$Poster = "on";}

 if ($Poster == "on"){

  //Get Path
  $filename = "myfiles/".$_GET['post'].".txt";

  //strip filename
  $file2 = str_replace('.txt', '', $filename);
  $file3 = str_replace('_', ' ', $file2);
  $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; //Convert plain text URLs into HTML hyperlinks

  if (file_exists($filename) === false) {
      echo "The file ".$filename." does not exists"; exit;
  }else{
    //Read $Page_Content
    $filename3 = fopen ($filename, "r");
    while (!feof ($filename3)) {
      $buffer3 = fgets($filename3, 4096);
      $buffer3 = preg_replace('/[\x00-\x1F\x7F]/u', '', $buffer3);
      if (strpos($buffer3, "</a>") === false) {$buffer3 = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $buffer3);}
      $contents3[] = $buffer3;
    }

  //Show Post
  echo'<div class="w3-rest">';
  echo'<!-- Blog entry -->';
  echo'<div class="w3-card-4 w3-margin w3-white">';
    echo '<h1><center>'.str_replace('.txt', '', $_GET['post']).'</center></h1>';
    if (file_exists($file2.".mp4")) {echo "<center><video class='txtinput' width='50%' controls/><source src='".$file2.".mp4' type='video/mp4'></video></center>";}else{if (file_exists($file2.".jpg")) {echo "<center><img class='images txtinput' width='50%' src='".$file2.".jpg'/></center>";}}
    echo'<div class="w3-container">';
      echo '<hr><h5><span class="w3-opacity">Posted on '.date("F d Y h:i",filemtime($filename)).'</span></h5><hr>';
    echo'</div>';

    echo'<div class="w3-container">';
      echo'<div class="w3-row">';

    for($c = 0; $c < count($contents3); next($contents3), $c++){ 
      echo "<br>$contents3[$c]";
    }echo "<br><br>"; if ($ads_code){echo $ads_code."<br><br>";} if ($advertisers=="Show"){include "sky-import-ads.php";}

      echo'</div>';
    echo'</div>';
  echo'</div>';
 echo'</div>';

  }

 }


//List Blogs
if($type == "blog"){

  while (($file = readdir($dh)) !== false){
    if ((strpos(strtolower($file), strtolower(".txt")) !== false) && (strpos(strtolower($file), strtolower("database")) === false)) {$counter++;

      if($counter > $i){$item_counter++; $row++; $i++;
        $file2 = str_replace('.txt', '', $file);
        $file3 = str_replace('_', ' ', $file2);
    
        //Show All Posts
        echo'<div class="'.$max_width.'">';
          echo'<!-- Blog entry -->';
          echo'<div class="w3-card-4 w3-margin w3-white">';

            //Image Based On # OF Columns
            if ($content == 4){if (file_exists("myfiles/".$file2.".jpg")){echo "<img class='images img_adjuster4'  width='100%' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images img_adjuster4' width='100%' src='myfiles/header.jpg'/>";}}
            if ($content == 3){if (file_exists("myfiles/".$file2.".jpg")){echo "<img class='images img_adjuster3'  width='100%' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images img_adjuster3' width='100%' src='myfiles/header.jpg'/>";}}
            if ($content == 2){if (file_exists("myfiles/".$file2.".jpg")){echo "<img class='images img_adjuster2'  width='100%' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images img_adjuster2' width='100%' src='myfiles/header.jpg'/>";}}
            if ($content == 1){if (file_exists("myfiles/".$file2.".jpg")){echo "<img class='images' width='100%' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images' width='100%' src='myfiles/header.jpg'/>";}}

            echo'<div class="w3-container">';
              echo '<big>'.$file3.'</big>';
              echo '<h5><span class="w3-opacity">'.date("F d Y h:i",filemtime("myfiles/".$file)).'</span></h5>';
            echo'</div>';

            echo'<div class="w3-container">';
               echo'<div class="w3-row">';
                 echo'<div class="w3-col m8 s12">';
                  echo'<p><button class="w3-button w3-padding-large w3-white w3-border w3-'.$lightbox.'"><b><a href="?post='.$file2.'&page='.$type.'">READ MORE</a></b></button></p>';
                 echo'</div>';
               echo'</div>';
            echo'</div>';
          echo'</div>';
        echo'</div>';

        //8 Posts Per Page
        if(($item_counter > 7) && ($content != 3)){break;}
        if(($item_counter > 8) && ($content == 3)){break;}
        if($row >= $content){$row = 0; echo "<div class='w3-container w3-center'></div>"."\r\n";}   
   
      }

    }

  }

   closedir($dh); if($counter == 0){echo "&emsp;&nbsp;No Blogs Yet...<br><br>";}

}


//List Blogs
if($type == "blog2"){

  while (($file = readdir($dh)) !== false){
    if ((strpos(strtolower($file), strtolower(".txt")) !== false) && (strpos(strtolower($file), strtolower("database")) === false)) {$counter++;

      if($counter > $i){$item_counter++; $row++; $i++;
        $file2 = str_replace('.txt', '', $file);
        $file3 = str_replace('_', ' ', $file2);
    
      echo'<div class="'.$max_width.'">';

      echo'<!-- Blog entry -->';
      echo'<div class="w3-container w3-white w3-margin w3-padding-large w3-border">';
        echo'<div class="w3-center">';
         echo'<h3>'.$file3.'</h3>';
         echo'<h5><span class="w3-opacity">'.date("F d Y h:i",filemtime("myfiles/".$file)).'</span></h5>';
           echo'</div>';

            echo'<div class="w3-justify">';
            
              //Image Based On # OF Columns
              if ($content == 4){if (file_exists("myfiles/".$file2.".jpg")){echo "<img class='images img_adjuster4'  width='100%' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images img_adjuster4' width='100%' src='myfiles/header.jpg'/>";}}
              if ($content == 3){if (file_exists("myfiles/".$file2.".jpg")){echo "<img class='images img_adjuster3'  width='100%' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images img_adjuster3' width='100%' src='myfiles/header.jpg'/>";}}
              if ($content == 2){if (file_exists("myfiles/".$file2.".jpg")){echo "<img class='images img_adjuster2'  width='100%' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images img_adjuster2' width='100%' src='myfiles/header.jpg'/>";}}
              if ($content == 1){if (file_exists("myfiles/".$file2.".jpg")){echo "<img class='images' width='100%' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images' width='100%' src='myfiles/header.jpg'/>";}}

             echo'<p><button class="w3-button w3-padding-large w3-white w3-border w3-'.$lightbox.'"><b><a href="sky-blog2.php?post='.$file2.'&page='.$type.'">READ MORE</a></b></button></p>';
            echo'</div>';
      	  echo'</div>';
 	echo'</div>';

        //8 Posts Per Page
        if(($item_counter > 7) && ($content != 3)){break;}
        if(($item_counter > 8) && ($content == 3)){break;}
        if($row >= $content){$row = 0; echo "<div class='w3-container w3-center'></div>"."\r\n";}   
   
      }

    }

  }

   closedir($dh); if($counter == 0){echo "&emsp;&nbsp;No Blogs Yet...<br><br>";}

}


//List News
if($type == "portal"){

  while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".txt")) !== false) {$counter++;

      if($counter > $i){$item_counter++; $row++; $i++;
        $file2 = str_replace('.txt', '', $file);
        $file3 = str_replace('_', ' ', $file2);

        echo '<a href="sky-portal.php?post='.$file2.'&page='.$type.'">';
        echo '<div class="w3-container w3-padding">';
        if (file_exists("myfiles/".$file2.".jpg")) {echo "<img class='images w3-left' width='100px' src='myfiles/".$file2.".jpg'/>";}else{echo "<img class='images w3-left' width='100px' src='myfiles/header.jpg'/>";}
        echo '<p>&emsp;&nbsp;'.$file3.'<br>&emsp;&nbsp;<span class="w3-opacity">Posted on '.date("F d Y h:i",filemtime($filename)).'</span></p>';
        echo '</div>';
        echo '</a>';

        //8 Posts Per Page
        if($item_counter > 6){break;}

      }

    }

  }

   closedir($dh); if($counter == 0){echo "&emsp;&nbsp;No Blogs Yet...<br><br>";}

}


//List Items
if($type == "shop"){

  if (isset($_POST['post'])) {
    $cost = 0;
    $list1 = "";
    $list2 = "";
    $merchant = $_POST['post'];
    $items = explode("\r\n", $_POST['tworeview']);

   if($merchant == "paypal"){

echo '<div id="mychart2" class="w3-modal" style="display:block">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container">';
      echo '<span onclick="document.getElementById(\'mychart2\').style.display=\'none\';" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4>Pay With '.ucfirst($merchant).'</h4>';
    echo '</header>';
      echo '<div class="w3-container"><br>';

    for ($i = 0; $i < count($items); $i++) {
     if(strlen($items[$i])>1){
      echo $items[$i]."<br>";
      $list1 .= $items[$i].", ";
      $list2 .= $items[$i]."\r\n";
     }else{break;}
    }
    echo "<br>Note: ".$_POST['note']."<br>";
    $total_items = count($items)-2;
    $price = explode("$", $items[$total_items]);

    //Send Email
    if(strlen($list2)>10){mail($paypal,"Skycart - New Order",$list2." "."Note: ".$_POST['note']);}

    echo '<form class="w3-right" name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">'."\r\n";
    echo '<input type="hidden" name="cmd" value="_xclick">'."\r\n";
    echo '<input type="hidden" name="business" value="'.$paypal.'">'."\r\n";
    echo '<input type="hidden" name="currency_code" value="USD">'."\r\n";
    echo '<input type="hidden" name="item_name" value="'.$list1.'">'."\r\n";
    echo '<input type="hidden" name="amount" value="'.$price[1].'">'."\r\n";
    echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!">'."\r\n";
    echo '</form>'."\r\n";

      echo '</div>';
    echo '<br><footer class="w3-'.$footercolor.'">&nbsp;</footer>';
  echo '</div>';
echo '</div>';

    }

    if(($merchant == "zelle") || ($merchant == "cashapp")){

echo '<div id="mychart2" class="w3-modal" style="display:block">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container">';
      echo '<span onclick="document.getElementById(\'mychart2\').style.display=\'none\';" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4>Pay With '.ucfirst($merchant).'</h4>';
    echo '</header>';
      echo '<div class="w3-container"><br>';

      include "sky-shipping.php";

      echo '</div>';
    echo '<br><footer class="w3-'.$footercolor.'">&nbsp;</footer>';
  echo '</div>';
echo '</div>';

    }

  }

  if (isset($_POST['post2'])) {
    $merchant = $_POST['post2'];
    if($merchant == "complete"){

      $buyer_info = $_POST['requiredfirstname'].' '.$_POST['requiredlastname']."\r\n".$_POST['requiredaddress'].' '.$_POST['requiredcity'].' '.$_POST['requiredstate']."\r\n".$_POST['requiredzipcode'].' '.$_POST['requiredcountry']."\r\n"."\r\n".'Zelle: '.$_POST['requiredzelle'].' Cashapp: '.$_POST['requiredcashapp']."\r\n"."\r\n".$_POST['prereview']."\r\n"."\r\n".'Note: '.$_POST['prenote'];
      if(strlen($_POST['prereview'])>30){mail($paypal,"Skycart - New Order",$buyer_info);}
      echo "<script>alert('Order Complete!');</script>";

    }
  }


   //Put All On One Page
   $i = 0;

   while (($file = readdir($dh)) !== false){
    if ((strpos(strtolower($file), strtolower(".jpg")) !== false) && (strpos(strtolower($file), strtolower("-")) !== false)) {$counter++;

      if($counter > $i){$row++; $i++;
        $file2 = str_replace('.txt', '', $file);
    
        //Show All Posts
        echo'<div class="'.$max_width.'">';
          echo'<div class="w3-margin w3-white w3-container">';

            echo "<center>";
            echo '<a style="cursor:pointer" onclick="document.getElementById(\''.$i.'\').style.display=\'block\'">';
            list($width, $height) = getimagesize("myfiles/".$file);
            if(($width > 245) && ($content > 2)){
              echo "<img class='images w3-border w3-round-xxlarge txtinput' width='100%' height='245px' src='myfiles/".$file."'/>";
            }else{
              if(($width > 799) && ($content == 1)){
	         echo "<img class='images w3-border w3-round-xxlarge txtinput' style='width:100%' src='myfiles/".$file."'/>";
              }else{
                 echo "<img class='images w3-border w3-round-xxlarge' height='245px' src='myfiles/".$file."'/>";
              }
            }

            echo'<div class="w3-container">';
            $des = explode("-", $file); $price = str_replace(" ", "", $des[1]); $price = str_replace('.jpg', '', $price);
            echo $des[0]." $".$price;
            echo'</div>';
            echo'</a>';
            echo "</center>";

          echo'</div>';
        echo'</div>';

        if($row >= $content){$row = 0; echo "<div class='w3-container'></div>"."\r\n";} 

echo '<div id="'.$i.'" class="w3-modal">';
  echo '<div class="w3-modal-content w3-card-4 w3-animate-opacity">';
    echo '<header class="w3-container w3-'.$footercolor.' w3-display-container">';
      echo '<span onclick="document.getElementById(\''.$i.'\').style.display=\'none\'" class="w3-button w3-'.$footercolor.' w3-display-topright">X</span>';
      echo '<h4 class="w3-left">'.$des[0].'</h4>';
    echo '</header>';
    echo '<div class="w3-container"><br>';

    if (file_exists("myfiles/".str_replace("jpg","mp4",$file))) {echo "<center><video class='txtinput' width='50%' controls/><source src='myfiles/".str_replace("jpg","mp4",$file)."' type='video/mp4'></video><br>";}else{echo "<center><img class='images w3-border w3-round-xxlarge'  src='myfiles/".$file."'/><br>";}
    echo '$'.$price.'<br>';

    $tfile2 = "_".str_replace(' ', '_', $des[0]);
    echo "<input  id='Bag".$tfile2."' value='no' readonly='readonly' type='hidden'>"."\r\n";
    echo "<div id='add".$tfile2."'><button onclick='qty(".$price.",\"qty".$tfile2."\",".$i."); document.getElementById(\"add".$tfile2."\").style.display=\"none\"; document.getElementById(\"in".$tfile2."\").style.display=\"block\"; document.getElementById(\"Bag".$tfile2."\").value=\"yes\"'; type='button' class='w3-button w3-green'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;Add To Cart</button></div>"."\r\n";
    echo "<div style='display:none' id='in".$tfile2."'><select id='qty".$tfile2."' onmouseout='qty(".$price.",\"qty".$tfile2."\",".$i.")' onclick='qty(".$price.",\"qty".$tfile2."\",".$i.")';><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>&nbsp;<button onclick='qty(0,\"qty".$tfile2."\",".$i."); document.getElementById(\"add".$tfile2."\").style.display=\"block\"; document.getElementById(\"in".$tfile2."\").style.display=\"none\"; document.getElementById(\"Bag".$tfile2."\").value=\"no\"'; type='button' class='w3-button w3-red w3-right-align'>In Cart</button></div>"."\r\n";
    echo "</center><br>"."\r\n";

    echo '</div>';
  echo '</div>';
echo '</div>'; 
 
      }

    }
    
   }


   closedir($dh); if($counter == 0){echo "&emsp;&nbsp;No Items Yet...<br><br>";}

  }


  if($type == "photos"){
   while (($file = readdir($dh)) !== false){
    if ((strpos(strtolower($file), strtolower(".jpg")) !== false) && (strpos(strtolower($file), strtolower("-")) === false)) {$counter++;

      if($counter > $i){$item_counter++; $row++; $i++;
    
        //Show All Posts
        echo'<div class="'.$max_width.'">';
          echo'<div class="w3-margin w3-white w3-container">';

            echo "<center>";
            echo "<a href='myfiles/".$file."'>";

            //Image Based On # OF Columns
            if ($content == 4){echo "<img class='images w3-border w3-round-xxlarge img_adjuster4' width='100%' src='myfiles/".$file."'/>";}
            if ($content == 3){echo "<img class='images w3-border w3-round-xxlarge img_adjuster3' width='100%' src='myfiles/".$file."'/>";}
            if ($content == 2){echo "<img class='images w3-border w3-round-xxlarge img_adjuster2' width='100%' src='myfiles/".$file."'/>";}
            if ($content == 1){echo "<img class='images w3-border w3-round-xxlarge' width='100%' src='myfiles/".$file."'/>";}

            echo'<div class="w3-container">';
            echo '<h5><span class="w3-opacity">'.date("F d Y h:i",filemtime("myfiles/".$file)).'</span></h5>';
            echo'</div>';
            echo'</a>';
            echo "</center>";

          echo'</div>';
        echo'</div>';

        //8 Posts Per Page
        if(($item_counter > 7) && ($content != 3)){break;}
        if(($item_counter > 8) && ($content == 3)){break;}
        if($row >= $content){$row = 0; echo "<div class='w3-container w3-center'></div>"."\r\n";}   
 
      }

    }
    
   }


   closedir($dh); if($counter == 0){echo "&emsp;&nbsp;No Photos Yet...<br><br>";}if ($ads_code){echo "<div class='w3-container w3-center'><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php"; echo "<br>";}

  }



  if($type == "videos"){
   while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".mp4")) !== false) {$counter++;

      if($counter > $i){$item_counter++; $row++; $i++;
    
        //Show All Posts
        echo'<div class="'.$max_width.'">';
          echo'<div class="w3-margin w3-white">';

            echo "<center>";
            echo "<center><video class='txtinput' width='100%' controls/><source src='myfiles/".$file."' type='video/mp4'></video></center>";
            echo'<div class="w3-container">';
            echo '<h5><span class="w3-opacity">'.date("F d Y h:i",filemtime("myfiles/".$file)).'</span></h5>';
            echo'</div>';
            echo "</center>";

          echo'</div>';
        echo'</div>';

        //8 Posts Per Page
        if(($item_counter > 7) && ($content != 3)){break;}
        if(($item_counter > 8) && ($content == 3)){break;}
        if($row >= $content){$row = 0; echo "<div class='w3-container w3-center'></div>"."\r\n";}   
 
      }

    }
    
   }


   closedir($dh); if($counter == 0){echo "&emsp;&nbsp;No Videos Yet...<br><br>";}if ($ads_code){echo "<div class='w3-container w3-center'><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php"; echo "<br>";}

  }



  if($type == "music"){
   while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".mp3")) !== false) {$counter++;

      if($counter > $i){$item_counter++; $row++; $i++;
    
        //Show All Posts
        echo'<div class="'.$max_width.'">';
          echo'<div class="w3-margin w3-white">';

            echo "<center>";
            echo'<div class="w3-container">';
            echo '<h5><span class="w3-opacity">'.str_replace(".mp3", "", $file).'</span></h5>';
            echo'</div>';
            echo "<audio class='txtinput' controls/><source src='myfiles/".$file."' type='audio/mp3'/></audio>";
            echo'<div class="w3-container">';
            echo '<h5><span class="w3-opacity">'.date("F d Y h:i",filemtime("myfiles/".$file)).'</span></h5>';
            echo'</div>';
            echo "</center>";

          echo'</div>';
        echo'</div>';

        //8 Posts Per Page
        if(($item_counter > 7) && ($content != 3)){break;}
        if(($item_counter > 8) && ($content == 3)){break;}
        if($row >= $content){$row = 0; echo "<div class='w3-container w3-center'></div>"."\r\n";}   
 
      }

    }
    
   }

   closedir($dh); if($counter == 0){echo "&emsp;&nbsp;No Mp3's Yet...<br><br>";} if ($ads_code){echo "<div class='w3-container w3-center'><br>".$ads_code."</div><br>";} if ($advertisers=="Show"){include "sky-import-ads.php"; echo "<br>";}

  }


  if($type == "tv"){include "sky-tv2.php";}
  if($type == "radio"){include "sky-radio2.php";}


  //mp4
  if($type == "mp4"){

    //Get Password
    $admin_mode = "off";
    session_start();
    include "sky-password.php";
    if($_SESSION['password'] == $your_password){
      $admin_mode = "on";

      echo '<script>'."\r\n";
      echo 'function mydelete(link){'."\r\n";
        echo "var audio0 = new Audio('sky-admin/Web-App/Delete.mp3');audio0.play();";
        echo 'var link;'."\r\n";
        echo 'var r = confirm(link);'."\r\n";
        echo 'if (r == true) {'."\r\n";
          echo 'top.location.href = "sky-admin/index.php?delete="+link';
        echo '}'."\r\n";
      echo '}'."\r\n";
      echo '</script>'."\r\n";

     }

   while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".mp4")) !== false) {
      echo '<center><div class="w3-col m6">';
      if($admin_mode == "on"){echo '<a href="myfiles/'.$file.'" oncontextmenu="mydelete(\''.$file.'\'); return false">';}else{echo '<a href="myfiles/'.$file.'">'."\r\n";}
      echo '<center><img src="sky-admin/images/mp4.png"></center>';
      echo '<p>'.$file.'</p>';
      echo '</a>';
      echo '</div></center>';

    }
    
   } 

   closedir($dh);

  }


  //mp3
  if($type == "mp3"){

    //Get Password
    $admin_mode = "off";
    session_start();
    include "sky-password.php";
    if($_SESSION['password'] == $your_password){
      $admin_mode = "on";
      echo '<script>'."\r\n";
      echo 'function mydelete(link){'."\r\n";
        echo "var audio0 = new Audio('sky-admin/Web-App/Delete.mp3');audio0.play();";
        echo 'var link;'."\r\n";
        echo 'var r = confirm(link);'."\r\n";
        echo 'if (r == true) {'."\r\n";
          echo 'top.location.href = "sky-admin/index.php?delete="+link';
        echo '}'."\r\n";
      echo '}'."\r\n";
      echo '</script>'."\r\n";

     }

   while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".mp3")) !== false) {
      echo '<center><div class="w3-col m6">';
      if($admin_mode == "on"){echo '<a href="myfiles/'.$file.'" oncontextmenu="mydelete(\''.$file.'\'); return false">';}else{echo '<a href="myfiles/'.$file.'">'."\r\n";}
      echo '<center><img src="sky-admin/images/mp3.png"></center>';
      echo '<p>'.$file.'</p>';
      echo '</a>';
      echo '</div></center>';

    }
    
   } 

   closedir($dh);

  }


  //gaming
  if($type == "games"){
    include "sky-gaming1.php"; echo "<br>";
    include "sky-gaming2.php"; echo "<br>";
  }


  //jpg
  if($type == "jpg"){

    //Get Password
    $admin_mode = "off";
    session_start();
    include "sky-password.php";
    if($_SESSION['password'] == $your_password){
      $admin_mode = "on";

      echo '<script>'."\r\n";
      echo 'function mydelete(link){'."\r\n";
        echo "var audio0 = new Audio('sky-admin/Web-App/Delete.mp3');audio0.play();";
        echo 'var link;'."\r\n";
        echo 'var r = confirm(link);'."\r\n";
        echo 'if (r == true) {'."\r\n";
          echo 'top.location.href = "sky-admin/index.php?delete="+link';
        echo '}'."\r\n";
      echo '}'."\r\n";
      echo '</script>'."\r\n";

     }

   while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".jpg")) !== false) {
      echo '<center><div class="w3-col m6">';
      if($admin_mode == "on"){echo '<a href="myfiles/'.$file.'" oncontextmenu="mydelete(\''.$file.'\'); return false">';}else{echo '<a href="myfiles/'.$file.'">'."\r\n";}
      echo '<img src="sky-admin/images/jpg.png">';
      echo '<p>'.$file.'</p>';
      echo '</a>';
      echo '</div></center>';

    }
    
   } 

   closedir($dh);

  }


  //txt
  if($type == "txt"){

    //Get Password
    $admin_mode = "off";
    session_start();
    include "sky-password.php";
    if($_SESSION['password'] == $your_password){
      $admin_mode = "on";

      echo '<script>'."\r\n";
      echo 'function mydelete(link){'."\r\n";
        echo "var audio0 = new Audio('sky-admin/Web-App/Delete.mp3');audio0.play();";
        echo 'var link;'."\r\n";
        echo 'var r = confirm(link);'."\r\n";
        echo 'if (r == true) {'."\r\n";
          echo 'top.location.href = "sky-admin/index.php?delete="+link';
        echo '}'."\r\n";
      echo '}'."\r\n";
      echo '</script>'."\r\n";

     }

   while (($file = readdir($dh)) !== false){
    if (strpos(strtolower($file), strtolower(".txt")) !== false) {
      echo '<center><div class="w3-col m6">'."\r\n";
      if($admin_mode == "on"){echo '<a href="sky-admin/index.php?open='.$file.'" target="_top" oncontextmenu="mydelete(\''.$file.'\'); return false">';}else{echo '<a href="myfiles/'.$file.'">'."\r\n";}
      echo '<img src="sky-admin/images/txt.png">'."\r\n";
      echo '<p>'.$file.'</p>'."\r\n";
      echo '</a>'."\r\n";
      echo '</div></center>'."\r\n";

    }
    
   } 

   closedir($dh);

  }


  //explorer
  if($type == "explorer"){

    //Get Password
    $admin_mode = "off";
    session_start();
    include "sky-password.php";
    if($_SESSION['password'] == $your_password){
      $admin_mode = "on";

      echo '<script>'."\r\n";
      echo 'function mydelete(link){'."\r\n";
        echo "var audio0 = new Audio('sky-admin/Web-App/Delete.mp3');audio0.play();";
        echo 'var link;'."\r\n";
        echo 'var r = confirm(link);'."\r\n";
        echo 'if (r == true) {'."\r\n";
          echo 'top.location.href = "sky-admin/index.php?delete="+link';
        echo '}'."\r\n";
      echo '}'."\r\n";
      echo '</script>'."\r\n";

     }

   $file_count = 0;
   while (($file = readdir($dh)) !== false){$file_count++;
    if (($file !== "database1.txt") && ($file !== "settings.php") && ($file_count > 2)){
      echo '<center><div class="w3-col m6">'."\r\n";
      if($admin_mode == "on"){echo '<a href="myfiles/'.$file.'" oncontextmenu="mydelete(\''.$file.'\'); return false">';}else{echo '<a href="myfiles/'.$file.'">'."\r\n";}
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

  }


//packages
if(($type == "packages") && (file_exists("myfiles/settings-packages.php"))){include "myfiles/settings-packages.php";

echo '<div class="w3-row-padding">';

echo '<div class="w3-third w3-margin-bottom">';
  echo '<ul class="w3-ul w3-border w3-center w3-hover-shadow">';
    echo '<li class="w3-xlarge w3-padding-32 w3-white w3-'.$lightbox.'">Basic</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features1_basic.'</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features2_basic.'</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features3_basic.'</li>';
    echo '<li class="w3-padding-16 w3-white">';
      echo '<h2 class="w3-wide">$'.$features5_basic.'</h2>';
      echo '<span class="w3-opacity">'.$pay.'</span>';
    echo '</li>';
    echo '<li class="w3-white w3-padding-24">';


if($pay == "One Time"){

echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_xclick">';
echo '<input type="hidden" name="business" value="'.$paypal.'">';
echo '<input type="hidden" name="currency_code" value="USD">';
echo '<input type="hidden" name="item_name" value="Basic Package">';
echo '<input type="hidden" name="amount" value="'.$features5_basic.'">';
echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note Basic Package, your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'Memo: add note Basic Package, your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
echo '</form>';

}else{

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> ';
echo '  <input type="hidden" name="cmd" value="_xclick-subscriptions" >';
echo '  <input type="hidden" name="business" value="'.$paypal.'" >';
echo '  <input type="hidden" name="item_name" value="Basic Package"> ';
echo '  <input type="hidden" name="item_number" value="123" >';
echo '  <input type="hidden" name="no_shipping" value="1" >';
echo '  <input type="hidden" name="a1" value="'.$features5_basic.'" >';
echo '  <input type="hidden" name="p1" value="1" >';
echo '  <input type="hidden" name="t1" value="M" >';
echo '  <input type="hidden" name="a3" value="'.$features5_basic.'" >';
echo '  <input type="hidden" name="p3" value="1" >';
echo '  <input type="hidden" name="t3" value="M" >';
echo '  <input type="hidden" name="src" value="1" >';
echo '  <input type="hidden" name="sra" value="1" >';
echo '  <input type="hidden" name="no_note" value="1" >';
echo '  <input type="hidden" name="invoice" value="invoicenumber" >';
echo '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >';
echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" >';
echo '</form> ';

}


    echo '</li>';
  echo '</ul>';
echo '</div>';

echo '<div class="w3-third w3-margin-bottom">';
  
echo '<ul class="w3-ul w3-border w3-center w3-hover-shadow">';
    echo '<li class="w3-xlarge w3-padding-32 w3-white w3-'.$lightbox.'">Pro</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features1_pro.'</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features2_pro.'</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features3_pro.'</li>';
    echo '<li class="w3-padding-16 w3-white">';
      echo '<h2 class="w3-wide">$'.$features5_pro.'</h2>';
      echo '<span class="w3-opacity">'.$pay.'</span>';
    echo '</li>';
    echo '<li class="w3-white w3-padding-24">';


if($pay == "One Time"){

echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_xclick">';
echo '<input type="hidden" name="business" value="'.$paypal.'">';
echo '<input type="hidden" name="currency_code" value="USD">';
echo '<input type="hidden" name="item_name" value="PRO Package">';
echo '<input type="hidden" name="amount" value="'.$features5_pro.'">';
echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note Pro Package, your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'Memo: add note Pro Package, your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
echo '</form>';

}else{

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> ';
echo '  <input type="hidden" name="cmd" value="_xclick-subscriptions" >';
echo '  <input type="hidden" name="business" value="'.$paypal.'" >';
echo '  <input type="hidden" name="item_name" value="PRO Package"> ';
echo '  <input type="hidden" name="item_number" value="123" >';
echo '  <input type="hidden" name="no_shipping" value="1" >';
echo '  <input type="hidden" name="a1" value="'.$features5_pro.'" >';
echo '  <input type="hidden" name="p1" value="1" >';
echo '  <input type="hidden" name="t1" value="M" >';
echo '  <input type="hidden" name="a3" value="'.$features5_pro.'" >';
echo '  <input type="hidden" name="p3" value="1" >';
echo '  <input type="hidden" name="t3" value="M" >';
echo '  <input type="hidden" name="src" value="1" >';
echo '  <input type="hidden" name="sra" value="1" >';
echo '  <input type="hidden" name="no_note" value="1" >';
echo '  <input type="hidden" name="invoice" value="invoicenumber" >';
echo '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >';
echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" >';
echo '</form> ';

}

    echo '</li>';
  echo '</ul>';
echo '</div>';

echo '<div class="w3-third w3-margin-bottom">';
  echo '<ul class="w3-ul w3-border w3-center w3-hover-shadow">';
    echo '<li class="w3-xlarge w3-padding-32 w3-white w3-'.$lightbox.'">Premium</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features1_pre.'</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features2_pre.'</li>';
    echo '<li class="w3-padding-16 w3-white">'.$features3_pre.'</li>';
    echo '<li class="w3-padding-16 w3-white">';
      echo '<h2 class="w3-wide">$'.$features5_pre.'</h2>';
      echo '<span class="w3-opacity">'.$pay.'</span>';
    echo '</li>';
    echo '<li class="w3-white w3-padding-24">';

if($pay == "One Time"){

echo '<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_xclick">';
echo '<input type="hidden" name="business" value="'.$paypal.'">';
echo '<input type="hidden" name="currency_code" value="USD">';
echo '<input type="hidden" name="item_name" value="Premium Package">';
echo '<input type="hidden" name="amount" value="'.$features5_pre.'">';
echo '<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!"><br><br>';
echo '<a href="#" onClick="alert(\'Send payment to '.$cashapp.'\r\n'.'For: add note Premium Package, your email.\')" title="Cash App Payment"><img src="sky-admin/images/cash-app.png" border="0"/></a>&nbsp;';
echo '<a href="#" onClick="alert(\'Send payment to '.$author.' '.$zelle.'\r\n'.'Memo: add note Premium Package, your email.\')"  title="Zell Payment"><img src="sky-admin/images/zelle.png" border="0"/></a>';
echo '</form>';

}else{

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> ';
echo '  <input type="hidden" name="cmd" value="_xclick-subscriptions" >';
echo '  <input type="hidden" name="business" value="'.$paypal.'" >';
echo '  <input type="hidden" name="item_name" value="Premium Package"> ';
echo '  <input type="hidden" name="item_number" value="123" >';
echo '  <input type="hidden" name="no_shipping" value="1" >';
echo '  <input type="hidden" name="a1" value="'.$features5_pre.'" >';
echo '  <input type="hidden" name="p1" value="1" >';
echo '  <input type="hidden" name="t1" value="M" >';
echo '  <input type="hidden" name="a3" value="'.$features5_pre.'" >';
echo '  <input type="hidden" name="p3" value="1" >';
echo '  <input type="hidden" name="t3" value="M" >';
echo '  <input type="hidden" name="src" value="1" >';
echo '  <input type="hidden" name="sra" value="1" >';
echo '  <input type="hidden" name="no_note" value="1" >';
echo '  <input type="hidden" name="invoice" value="invoicenumber" >';
echo '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >';
echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" >';
echo '</form>';

}

    echo '</li>';
  echo '</ul>';
echo '</div>';

echo '</div>';

}

?>

<style>

@media screen and (min-width: 800px) {
  .img_adjuster2{height:336px;}
  .img_adjuster3{height:257px;}
  .img_adjuster4{height:185px;}
}

</style>

<!-- Modal -->
<div id='mychart' class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container <?php echo 'w3-'.$footercolor; ?> w3-display-container"> 
      <span onclick="document.getElementById('mychart').style.display='none';" class="w3-button <?php echo 'w3-'.$footercolor; ?> w3-display-topright">X</span>
      <h4><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;My Cart</h4>
    </header>
      <div class="w3-container">
	<ul class="w3-ul w3-hoverable">

          <center>
           <form method='post' action='?page=<?php echo $type ?>' enctype='multipart/form-data'>
            <textarea id="tworeview" name="tworeview" rows="10" style="border:white;width:100%" class="txtinput" readonly="readonly"></textarea><textarea id="note" name="note" rows="2" style="border:white;width:100%" class="txtinput" placeholder="Leave A Note" maxlength="300"></textarea><br><br>
            <div id="twocheckout" style="display:block">
            <button type="button" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>" onclick="twocheckout();">Checkout</button>
            <button type="button" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>" onclick="return confirm('Are you sure?')?checkout_canceled(event):'';">Empty Cart</button>
            </div>
            <div id="twoconfirm" style="display:none">
            <input type="hidden" id="post" name="post" value="na" >
            <button class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>" type="submit" onclick="confirmm('paypal')">Paypal</button>
            <button class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>" type="submit" onclick="confirmm('zelle')">Zelle</button>
            <button class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>" type="submit" onclick="confirmm('cashapp')">Cashapp</button>
            <button type="button" class="w3-bar-item w3-button <?php echo 'w3-'.$footercolor.'' ?>" onclick="return confirm('Are you sure?')?checkout_canceled(event):'';">Empty Cart</button>
            </div>
           </form>
          </center>

	</ul>
      </div>
    <br><footer class="<?php echo 'w3-'.$footercolor; ?>">&nbsp;</footer>
  </div>
</div>

<script type="text/javascript">

var total = 0;
var order_id = 0;
var myprice = [];
const myitem = [];
const itemqty = [];

function qty(price,myqty,item){
  title = myqty.replace("qty", "");
  var e = document.getElementById(myqty);
  var mybqty = e.options[e.selectedIndex].text;
  var new_price = parseInt(mybqty) * price; 
  myprice[item]= new_price;
  myitem[item]= title.replace(/_/g, " ");
  itemqty[item]= mybqty;
  //alert(myitem[item]); //Debug
}

function mychart(){
  total = 0;
  var order_Details = 0;
  var arrayLength = myprice.length;
  document.getElementById("tworeview").value = "";
  for (var i = 0; i < arrayLength; i++) {
    if(myprice[i]>0){order_Details++;
     if(order_Details==1){
       var d = new Date();
       var month = d.getMonth()+1;
       var day = d.getDate();
       var year = d.getFullYear();
       var hours = (d.getHours() + 24) % 12 || 12;
       var mins = d.getMinutes();
       var sec = d.getSeconds();
       document.getElementById("tworeview").value += "Date: " + month +"/"+ day +"/"+ year +"\r\n";
       order_id = month +""+ day +""+ hours +""+ mins +""+ sec;
       document.getElementById("tworeview").value += "Order#: "+order_id+"\r\n";
     }
     document.getElementById("tworeview").value += "x"+itemqty[i]+" "+myitem[i]+" $"+myprice[i]+"\r\n"; total = total + myprice[i];
    }
  }
  if(total>0){
    document.getElementById("tworeview").value += "Total: $"+total.toFixed(2)+"\r\n";
  }else{
    document.getElementById("tworeview").value += "You have no items in your cart!";
  }
}

function twocheckout(){
  if(total>0){
    document.getElementById('twocheckout').style.display='none'; document.getElementById('twoconfirm').style.display='block';
  }else{
    document.getElementById('mychart').style.display='none'; alert("You have no items in your cart!");
  }
}

function checkout_canceled(){
 location.reload(); return false;
}

function confirmm(paygate){
     document.getElementById("post").value = paygate; //alert(paygate);
}

</script>