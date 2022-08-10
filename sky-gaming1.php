<?php
  //https://www.htmlgames.com/rss/games.php?json
  echo "<center>";
  $result = file_get_contents("games1.php");
  $jarray = json_decode($result, true);
  foreach($jarray as $value) {$match++;
    echo "<a href='".$value['url']."' target='blank'><img src='".$value['thumb1']."' loading='lazy'  class='w3-round' style='width:120px;height:120px' border='0'/></a>";
  }
  echo "</center>";
?>
















