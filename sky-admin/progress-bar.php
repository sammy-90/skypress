<div class="progress-bar" id="myBar" style="display:none"></div>

<style>

.progress-bar {
  height: 7px;
  background: <?php echo $progressbar ?>;
  width: 0%;
  position: fixed;
  top: 0;left:0;
  z-index: 1;
  width: 100%;
}

</style>

<script>
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
  if (document.getElementById("myBar").style.display !== 'block') { document.getElementById("myBar").style.display='block';}
}
</script>