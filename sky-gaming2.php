<?php
  //https://portal.wanted5games.com/api/games?category=&audience=&limit=25
  echo "<center>";
  $result = file_get_contents("games2.php");
  $jarray = json_decode($result, true); 
  foreach($jarray as $value) {$match++;
    echo "<a href='".$value['link']."' target='blank'><img src='".$value['thumb']."' loading='lazy' class='w3-round' style='width:120px;height:120px' border='0'/></a>";
  }
  echo "</center>";
?>
















