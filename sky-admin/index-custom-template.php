<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<style>

.table {
  border-radius: 25px;
  border: 2px solid purple;
  background-color: white;
  padding: 20px;
  width: 200px;
  height: 150px;
}

table {font-size: 19px; padding: 20px;}

@media only screen and (max-width: 800px) {
  .txtinput,table{width:100%;}
}

INPUT, select option, button {
  font-family: arial, verdana, ms sans serif;
  color: black; font-size: 12pt;
}

</style>

<?php

  include "version.php"; include "index-settings.php"; include "ismobile.php"; 
  $version = "Custom Template Builder";

  //login
  session_start();
  include "../sky-password.php";
  if ($_SESSION['password'] !== $your_password){$demo = "on";}else{

  //save Settings
  if (isset($_GET['txt'])){
    $f=fopen('../myfiles/settings-custom-t.php','w');
    fwrite($f,'<?php'."\r\n");

    //Packages
    fwrite($f,'$txt="'.str_replace('"', "'", $_GET['txt']).'";'."\r\n");

    fwrite($f,'?>');
    fclose($f);
    echo "<script>\n"; 
    echo "alert(\"Settings Are Saved...\");\n"; 
    echo "</script>\n";
  }

  if (file_exists("../myfiles/settings-custom-t.php")){include "../myfiles/settings-custom-t.php";}

  $demo = "off";}

?>

<body>

<!-- Top -->
<div class="w3-top w3-animate-left">
  <div class="w3-row w3-purple w3-padding">
    <div class="w3-half" style="margin:4px 0 6px 0"><a href='<?php echo $domain ?>/skypress.php' target='blank'><big><?php echo $version; ?></big></a></div>
    <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small"><div class="w3-right">THE WORLD'S FASTEST SITE BUILDER</div></div>
  </div>
</div>


<div id="search" class="w3-container" style="display:block">

<br>

<div class="container w3-rest">
<form name="form" action="index-custom-template.php" method="get">

<?php if($demo == "off"){
  echo '<input type="hidden" id="password" name="password" value="'.$_GET['password'].'"/>';
  echo '<a href="index.php?password='.$_GET['password'].'" class="w3-round w3-button w3-purple">Back</a> ';
  echo '<input type="submit" class="w3-round w3-button w3-purple" value="Save & Publish"/> ';
}
?>

<a href="#" onclick="document.getElementById('help').style.display='block'" class="w3-round w3-button w3-purple w3-button">Help</a>

<br><br>

<div class="w3-card-4 w3-half w3-margin">
     <header class="w3-container w3-purple">
      <h5>WYSIWYG Editor</h5>
     </header>

<div class=" w3-center"><br>
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Left" onClick="Add_To_Body(this.form,7);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Center" onClick="Add_To_Body(this.form,8);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Right" onClick="Add_To_Body(this.form,9);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Indent" onClick="Add_To_Body(this.form,10);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Break" onClick="Add_To_Body(this.form,11);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Line" onClick="Add_To_Body(this.form,12);"><?php if(!isMobile()){echo "<br><br>";} ?> 
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Header" onClick="Add_To_Body(this.form,13);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Bold" onClick="Add_To_Body(this.form,1);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Italic" onClick="Add_To_Body(this.form,2);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Underline" onClick="Add_To_Body(this.form,3);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Small" onClick="Add_To_Body(this.form,4);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Big" onClick="Add_To_Body(this.form,5);"><?php if(!isMobile()){echo "<br><br>";} ?> 
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Highlight" onClick="Add_To_Body(this.form,6);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Link" onClick="Add_To_Body(this.form,14);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Embed" onClick="Add_To_Body(this.form,16);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="JS" onClick="Add_To_Body(this.form,18);">
<input type="button" class="w3-round w3-small <?php if(!isMobile()){echo "w3-button w3-purple";} ?>" value="Clear" onClick="Clear_All(this.form);">
<br><br>

<textarea id="txt" name="txt" Rows="10" class="w3-round txtinput" cols="55" placeholder="Code Your Webpage Here..."  maxlength="1150" >
  <?php if(isset($txt)){echo $txt;} ?>
</textarea>

</div><br>

</div>

<div class="w3-card-4 <?php if(!isMobile()){echo "w3-rest";}else{echo "w3-half";} ?> w3-margin">
     <header class="w3-container w3-purple">
      <h5>Page Preview</h5>
     </header>

    <div class="w3-container w3-border" id="real"></div>

</div>

</div>



</big>

<!-- Modal -->
<div id="help" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity">
    <header class="w3-container w3-purple w3-display-container"> 
      <span onclick="document.getElementById('help').style.display='none'" class="w3-button w3-purple w3-display-topright">X</span>
      <h4>Building A Custom Template</h4>
    </header>
    <div class="w3-container"><br>

<b>WYSIWYG Editor</b> - Add your page code inside.<br>
<b>Page Preview</b> - Preview your webpage.<br><br>

<b>Adding CMS Varibales</b> - You may use these php cms variables within your html/css code.
<pre>
$title - Displays your site's title.
$subtitle - Displays your site's short title.
$author - Displays your site's author.
$keywords - Displays your site's keywords.
$effects - Displays your site's css effect.
$pagecolor - Displays your site's css pagecolor.
$panelcolor - Displays your site's css panelcolor.
$footercolor - Displays your site's css footercolor.
$fontcolor - Displays your site's font color.
$linkcolor - Displays your site's link color.
$themecolor - Displays your site's css theme color.
$gfont - Displays your site's font type.
$address - Displays your site's address.
$phone_number - Displays your site's phone number.
$zelle - Displays your site's zelle phone number.
$hours - Displays your site's business hours.
$paypal - Displays your site's paypal email.
$cashapp - Displays your site's cashapp id.
$fb - Displays your site's facebook link.
$twitter - Displays your site's twitter link.
$sc - Displays your site's Snapchat link.
$pinterest - Displays your site's Pinterest link.
$instagram - Displays your site's Instagram link.
$linkedin - Displays your site's Linkedin link.
$background.".jpg" - Displays your site's Header Image
$squeeze_title - Displays your site's squeezepage title.
$squeeze_desc - Displays your site's squeezepage description.
$download_title - Displays your site's downloadpage title.
$download_desc - Displays your site's downpage description.
$download_link - Displays your site's downloadpage link.
</pre>

    </div>
  </div>
</div>

<script src="ajax/jquery-1.8.min.js"></script>

<script>
$(document).ready(function(){
    $('#txt').keyup(function(){
        $('#real').html($(this).val());
    });
});
//https://stackoverflow.com/questions/24849724/how-to-create-a-real-time-html-editor/24849771

function Add_To_Body(form, Action){
  var AddTo_Body="";
  var txt2="";

  if(Action==1) {  
    txt2=prompt("BOLD Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = "<b>"+txt2+"</b>";        
  }

  if(Action==2) {  
    txt2=prompt("Italicized Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = "<i>"+txt2+"</i>";        
  }

  if(Action==3) {  
    txt2=prompt("Underlined Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = "<u>"+txt2+"</u>";        
  }

  if(Action==4) {  
    txt2=prompt("Small Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = "<small>"+txt2+"</small>";        
  }

  if(Action==5) {  
    txt2=prompt("Big Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = "<big>"+txt2+"</big>";        
  }

  if(Action==6) {  
    txt2=prompt("Highlight Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = '<span style="background-color: #FFFF00">'+txt2+'</span>';        
  }

  if(Action==7) {  
    txt2=prompt("Left Align Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = '<DIV align="left">'+txt2+'</div>';        
  }

  if(Action==8) {  
    txt2=prompt("Center Align Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = "<center>"+txt2+"</center>";        
  }

  if(Action==9) {  
    txt2=prompt("Right Align Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = '<DIV align="Right">'+txt2+'</div>';        
  }

  if(Action==10) {  
    txt2=prompt("Indent Text:","Text");     
    if(txt2!=null)           
    AddTo_Body = "&nbsp;&nbsp;"+txt2;        
  }

  if(Action==11) {AddTo_Body = "<BR>\r\n";}

  if(Action==12) {AddTo_Body = "<hr>\r\n";}

  if(Action==13){  
    txt2=prompt("Text Header","Text");      
    if(txt2!=null)           
    AddTo_Body = "<h1>"+txt2+"</h1>\r\n";  
  }

  if(Action==14) {
    txt2=prompt("Add a link.","http://");
      if(txt2!=null){          
        AddTo_Body = "<a href=\""+txt2+"\">";              
        txt2=prompt("Text to be show for the link","Text");              
        AddTo_Body+=txt2+"</a>\r\n";         
      }
  }

  if(Action==16) { 
    txt2=prompt("Enter Embed Video Code","<Code>");    
    if(txt2!=null)           
    AddTo_Body = txt2; 
  }


  if(Action==18) { 
    txt2=prompt("Enter js file name","file.js");    
    if(txt2!=null)           
    AddTo_Body = '<SCRIPT SRC="'+txt2+'"><\/SCRIPT>\r\n'; 
  }

  txt.value+=AddTo_Body;
}


function Clear_All(form) {
  if(confirm("Are You Sure?")) { 
    txt.value="";     
   }
}

</script>