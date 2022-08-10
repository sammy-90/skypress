<html>
<head>
<script>
function getVote(int) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","sky-polls2.php?vote="+int,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<?php if (file_exists("myfiles/settings-portal.php")){include "myfiles/settings-portal.php";}else{echo "Please 'Publish' Your portal... Admin > Application Settings > Portal > Publish"; exit; }  ?>

<div id="poll">
<h3><?php echo $poll_title?></h3>
<form>
Yes: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
No: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>

</body>
</html> 
