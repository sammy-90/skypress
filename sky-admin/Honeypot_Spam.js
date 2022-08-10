document.writeln("<br><br><center><big>I'm Not A Robot <input type=\"checkbox\" id=\"myCheck\" onclick=\"captcha()\"></big></center><br><br>"); 

function captcha(){
  if(document.getElementById("category")){ //Check if element exists 
    document.getElementById("category").value="Captcha@";
  }
}

function Honeypot(){

  var chkStatus1 = document.getElementById("myCheck");
  if (chkStatus1.checked == false){
    alert("ARE YOU A ROBOT?"); 
    event.preventDefault();
  }

}