<?php

$html = file('test.txt');

for($j = 0; $j < count($html); next($html), $j++){  
  $result = explode(',"title":"',$html[$j]);   
  $result2 = explode('","',$result[0]);   
  echo $result2[0];
}












?>
