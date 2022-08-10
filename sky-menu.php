<a href="index.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Home</big></a>
<a href="#" onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>About</big></a>
<a href="sky-search.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Search</big></a>
<a href="#" onclick="document.getElementById('id02').style.display='block'" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Contact</big></a>
<?php
if($rank == "Show"){echo '<a href="stats/index.php?mode=your_rank" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Ranking</big></a>';}
if($menuc > 0){echo '<span style="width:100%;text-align: left;"><br></span>';}
if($blog == "Show"){echo '<a href="?page=blog" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Blog</big></a>';}
if($store == "Show"){echo '<a href="?page=shop" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Store</big></a>';}
if($music == "Show"){echo '<a href="?page=music" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Music</big></a>';}
if($videos == "Show"){echo '<a href="?page=videos" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Videos</big></a>';}
if($gallery == "Show"){echo '<a href="?page=photos" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Gallery</big></a>';}
if($menuc > 5){echo '<span style="width:100%;text-align: left;"><br></span>';}
if($tv == "Show"){echo '<a href="?page=tv" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>TV</big></a>';}
if($radio == "Show"){echo '<a href="?page=radio" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Radio</big></a>';}
if($portal == "Show"){echo '<a href="sky-portal.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Portal</big></a>';}
if($course == "Show"){echo '<a href="sky-course.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Course</big></a>';}
if($packages == "Show"){echo '<a href="?page=packages" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Packages</big></a>';}
if($menuc > 10){echo '<span style="width:100%;text-align: left;"><br></span>';}
if($application == "Show"){echo '<a href="sky-application.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Apply</big></a>';}
if($os == "Show"){echo '<a href="sky-os.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Desktop</big></a>';}
if($m_download == "Show"){echo '<a href="sky-download.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Download</big></a>';}
if($squeeze == "Show"){echo '<a href="sky-squeeze-page.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Subscribe</big></a>';}
if($url_submit == "Show"){echo '<a href="sky-portal2.php?openn=submiturl" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Submit URL</big></a>';}
if($menuc > 14){echo '<span style="width:100%;text-align: left;"><br></span>';}
if($games == "Show"){echo '<a href="?page=games" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Games</big></a>';}
if($delivery == "Show"){echo '<a href="sky-delivery.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Delivery</big></a>';}
if($dir == "Show"){echo '<a href="sky-business_dir.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Directory</big></a>';}
if($class == "Show"){echo '<a href="sky-classified.php" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Classified Ads</big></a>';}
if($advertisers == "Show"){echo '<a href="sky-portal2.php?openn=advertiser" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Advertisers Login</big></a>';echo '<a href="sky-portal2.php?openn=join_now" class="w3-bar-item w3-button" style="width:100%;text-align: left;"><big>Advertisers Signup</big></a>';}
if($shares == "Show"){echo "<br>"; include 'sky-social.php'; echo "<br>";}
?>

<font color="black">
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container <?php echo 'w3-'.$footercolor ?>"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">X</span>
        <h2>About <?php echo $title ?></h2>
      </header>
      <div class="w3-container">
        <p class="w3-large"><?php echo $about ?></p>
      </div>
    </div>
  </div>

  <div id="id02" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container <?php echo 'w3-'.$footercolor ?>"> 
        <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-button w3-display-topright">X</span>
        <h2>Contact Us</h2>
      </header>
      <div class="w3-container">
        <big>
        <p><?php if($address){echo $address;} ?></p>
        <p><?php if($phone_number){echo $phone_number;} ?></p>
        <p><?php if($paypal){echo $paypal;} ?></p>
        <?php 
          if($hours){
            echo '<br><h1>Hours</h1>';
            echo '<p>'.$hours.'</p>';
          } 
        ?>
        </big>
      </div>
    </div>
  </div>