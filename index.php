<?php 

if (file_exists("myfiles/settings.php")){include "myfiles/settings.php";}else{header( "Location: sky-admin/index.php" ); exit;} 
if (file_exists($template)){include $template;}else{$hotfix = explode("?s=", $template); $_GET['s'] = $hotfix[1]; include $hotfix[0];}

?>

