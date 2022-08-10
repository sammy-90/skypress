<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

<?php

  //Get Data
  $my_quiz = $_REQUEST['quiz'];
  $i = $_GET['i']; if(!$i){$i = 0;}
  $points = $_GET['points']; if(!$points){$points = 0;}

  //Check File
  if (!file_exists($my_quiz)){echo "Quiz not found"; exit;}

  //load quiz
  $lines = file($my_quiz);

  //question
  $question = explode("|", $lines[$i]); 
  
  //Number of Answers
  $num_answers = count($question) - 1;

  if($i > $num_answers){

    //Setup Score
    $score = 0;
    
    //Perfect
    if($points == count($lines)){$score = "100";}else{$score = round(((100 / count($lines)) * $points));}

    echo "<center><big>";
    if($score > 74){
      echo '<img src="sky-admin/images/pass.png" border="0"/><br><br>';
      echo '<big>You scored '.$points.'/'.count($lines).' ('.$score.'%)</big><br><br>';
      echo 'You Passed!';
    }else{
      echo '<img src="sky-admin/images/falled.png" border="0"/><br><br>';
      echo '<big>You scored '.$points.'/'.count($lines).' ('.$score.'%)</big><br><br>';
      echo 'You need at least 75% to pass.';
    }
    echo "</center></big>";

    exit;

  }

  //Save Correct Answer
  $correct_answer = "";

  echo '<big><center>'.++$i.'/'.count($lines).'<br><br>';
    echo '<b>'.$question[0].'</b><br><br>';
     echo "<table border='0'>";
      for($d = 1; $d <= $num_answers; $d++){
        if (strpos(strtolower($question[$d]), strtolower("@")) !== false){
          echo '<tr><td><INPUT TYPE="checkbox" NAME="input" VALUE="@">'.str_replace('@', '', $question[$d]).'</td></tr>';
          $correct_answer .= str_replace('@', '', $question[$d])."<br>";
        }else{
          echo '<tr><td><INPUT TYPE="checkbox" NAME="input">'.$question[$d].'</td></tr>';
        }

      }

?>

<tr><td><input type="button" id="answer" value="Submit" onclick="validate()"></tr></td>

</table>
</center>

<div id="answers" style="position:absolute;top:0;display:none"><br><u>Answers:</u><br><?php echo $correct_answer ?><br></div>

</big>

<script>

function validate(){

  var pass = 0;
  var right = 0;
  var points = <?php echo $points ?>;
  var checkboxes = document.getElementsByName("input");

  for(var i = 0; i < checkboxes.length; i++) {
    if(checkboxes[i].checked && (checkboxes[i].value === "@")) {pass++;}
    if(checkboxes[i].checked && (checkboxes[i].value !== "@")) {pass = pass - 1;}
    if(checkboxes[i].value === "@"){right++;}
  }

  if(right === pass){
    points++;
    alert("You answered correctly");
  }else{
    document.getElementById('answers').style.display='block';
    alert("Wrong answer");
  }

  window.location.href='sky-quiz.php?quiz=<?php echo $my_quiz ?>&i=<?php echo $i ?>&points='+points;

}

//document.addEventListener('contextmenu', event => event.preventDefault());

</script>