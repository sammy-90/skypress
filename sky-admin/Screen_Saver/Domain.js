function Close_Screen_Saver(){
  window.location = "../../sky-os.php";
}

document.addEventListener('keyup', function (event) {
    if (event.defaultPrevented) {
        return;
    }

    var key = event.key || event.keyCode;

    if (key === 'Escape' || key === 'Esc' || key === 27) {
       Close_Screen_Saver();
    }
});
