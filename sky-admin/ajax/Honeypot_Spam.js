document.writeln("<br><br><center><big>I'm Not A Robot <input type=\"checkbox\" id=\"myCheck\" onclick=\"captcha()\"></big></center><br><br>"); 
document.writeln("<div style=\"display:none;\">"); 
document.writeln("   <label>Required *</label>"); 
document.writeln("   <input type=\"text\" name=\"honeypot\" id=\"honeypot\" />"); 
document.writeln("</div>"); 

function captcha(){
  if(document.getElementById("category")){ //Check if element exists 
    document.getElementById("category").value="Captcha@";
  }
}

function Honeypot(){

  var chkStatus1 = document.getElementById("myCheck");
  if (chkStatus1.checked) {
    //Passed
  }else{
    document.getElementsByName('requiredWebsite_URL')[0].value = "";
    var list = document.getElementsByName('requiredWebsite_URL')[0].value;
    alert("ARE YOU A ROBOT?"); 
    return false;
  }

  // The field is empty, submit the form.
  if(!document.getElementById("honeypot").value) {
    //Passed
  }else{
    document.getElementsByName('requiredWebsite_URL')[0].value = "";
    var list = document.getElementsByName('requiredWebsite_URL')[0].value;
    alert("ARE YOU A ROBOT?"); 
    return false;
  }

}