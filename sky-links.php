<?php 

  if (file_exists("myfiles/settings-custom-links.php")){include "myfiles/settings-custom-links.php"; 
   if (($link1_title) || ($contact_us == "Show")){
    echo '<p>';
    echo '<a href="sky-page.php?page='.$link1_title.'" class="custom_color">'.$link1_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link2_title.'" class="custom_color">'.$link2_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link3_title.'" class="custom_color">'.$link3_title.'</a>&emsp;&nbsp;';
    if(isMobile()){echo '<br><br>';}
    echo '<a href="sky-page.php?page='.$link4_title.'" class="custom_color">'.$link4_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link5_title.'" class="custom_color">'.$link5_title.'</a>&emsp;&nbsp;';
    echo '<a href="sky-page.php?page='.$link6_title.'" class="custom_color">'.$link6_title.'</a>&emsp;&nbsp;';
    if ($contact_us == "Show"){echo '<a href="sky-contact.php"class="custom_color">Contact Us</a>&emsp;&nbsp;';}
    echo '</p>'; 
   }
  }else{
    echo '<p>';
    if ($contact_us == "Show"){echo '<a href="sky-contact.php"class="custom_color">Contact Us</a>&emsp;&nbsp;';}
    echo '</p>'; 
  } 

?>