//Get User Location
function geoupdate(){
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition); 
  } else { 
    alert('Geolocation is not supported by this browser.');
  }
}

function showPosition(position) {
  document.getElementById('mystate').value = position.coords.latitude.toString().match(/^-?\d+(?:\.\d{0,1})?/)[0]+"@"+position.coords.longitude.toString().match(/^-?\d+(?:\.\d{0,1})?/)[0];
}