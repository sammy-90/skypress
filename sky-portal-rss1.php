<?php if (file_exists("myfiles/settings-portal.php")){include "myfiles/settings-portal.php";}else{echo "Please 'Publish' Your portal... Admin > Application Settings > Portal > Publish"; exit; }  ?>

<div class="content">

 <div style="display:none">
 <form method="post" action="">
  <input type="text" name="feedurl" placeholder="Enter website feed URL">&nbsp;<input type="submit" value="Submit" name="submit">
 </form>
 </div>

 <?php

 $url = $rss1;
 if(isset($_POST['submit'])){
   if($_POST['feedurl'] != ''){
     $url = $_POST['feedurl'];
   }
 }

 $invalidurl = false;
 if(@simplexml_load_file($url)){
  $feeds = simplexml_load_file($url);
 }else{
  $invalidurl = true;
  echo "<h2>Invalid RSS feed URL.</h2>";
 }


 $i=0;
 if(!empty($feeds)){

  $site = $feeds->channel->title;
  $sitelink = $feeds->channel->link;

  echo "<h1>".$site."</h1>";
  foreach ($feeds->channel->item as $item) {

   $title = $item->title;
   $link = $item->link;
   $description = $item->description;
   $postDate = $item->pubDate;
   $pubDate = date('D, d M Y',strtotime($postDate));


   if($i>=5) break;
  ?>
   <div class="post">
     <div class="post-head">
       <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
       <span><?php echo $pubDate; ?></span>
     </div>
     <div class="post-content">
       <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a href="<?php echo $link; ?>">Read more</a>
     </div>
   </div>

   <?php
    $i++;
   }
 }else{
   if(!$invalidurl){
     echo "<h2>No item found</h2>";
   }
 }
 ?>
</div>

<style>

.content{
    width: 60%;
    margin: 0 auto;
}

input[type=text]{
    padding: 5px 10px;
    width: 60%;
    letter-spacing: 1px;
}

input[type=submit]{
    padding: 5px 15px;
    letter-spacing: 1px;
    border: 0;
    background: gold;
    color: white;
    font-weight: bold;
    font-size: 17px;
}

h1{
    border-bottom: 1px solid gray;
}

h2{
    color: black;
}
h2 a{
    color: black;
    text-decoration: none;
}

.post{
    border: 1px solid gray;
    padding: 5px;
    border-radius: 3px;
    margin-top: 15px;
}

.post-head span{
    font-size: 14px;
    color: gray;
    letter-spacing: 1px;
}

.post-content{
    font-size: 18px;
    color: black;
}

</style>