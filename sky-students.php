<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />
<body>

<?php 

  //save Students
  if (isset($_GET['my_students'])) {
    $my_students = explode("\r\n", $_GET['my_students']);

    //Build Database
    for($j = 0; $j < count($my_students); next($my_students), $j++){
      if($j == 0){
        $students .= $my_students[$j];
      }else{ 
        $students .= '|'.$my_students[$j];
      } 
    }

    //Save Database
    $f=fopen('myfiles/course-database.php','w'); 
    fwrite($f,'<?php'."\r\n");
    fwrite($f,'$my_students="'.str_replace('"', "'", $students).'";'."\r\n");
    fwrite($f,'?>');
    fclose($f);

    echo "<script>\n"; 
    echo "alert(\"Settings Are Saved...\");\n"; 
    echo "</script>\n";
   
  } 

  //login
  session_start();
  include "sky-password.php";
  if ($_SESSION['password'] !== $your_password){echo "Wrong Password"; exit;}

  $get_database = "myfiles/course-database.php"; include $get_database;
  if (file_exists($get_database)){include $get_database;}

?>

<center><big>Add One Student Email Per Line, Followed by common and course #<br><br>Examples student_email@aol.com,1 or student_email@aol.com,1,2,10</big></center>
<form name="form" action="sky-students.php" method="get"> 
<textarea id="my_students" name="my_students" class="txtinput" cols="33" rows="30">
<?php 

  if($my_students){
    $students = explode("|", $my_students);
    for($j = 0; $j < count($students); next($students), $j++){
      echo $students[$j]."\r\n";
    }
  }

?>
</textarea>

  <footer class="w3-container w3-purple">
    <center><b><input type="submit" value="Update Students List"/></b></center>
  </footer>

</form>

</body>
</html>