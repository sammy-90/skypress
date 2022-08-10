<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<div class="content">

 <center>
 <a href="?url=https://www.espn.com/espn/rss/news">Headlines</a> |
 <a href="?url=https://www.espn.com/espn/rss/nfl/news">NFL</a> |
 <a href="?url=https://www.espn.com/espn/rss/nba/news">NBA</a> |
 <a href="?url=https://www.espn.com/espn/rss/mlb/news">MLB</a> |
 <a href="?url=https://www.espn.com/espn/rss/nhl/news">NHL</a> |
 <a href="?url=https://www.espn.com/espn/rss/soccer/news">Soccer</a> |
 <a href="?url=https://www.espn.com/espn/rss/ncb/news">College Basketball</a> |
 <a href="?url=https://www.espn.com/espn/rss/ncf/news">College Football</a> |
 <a href="?url=https://www.espn.com/espn/rss/rpm/news">Motorsports</a> |
 <a href="?url=https://www.espn.com/espn/rss/poker/master">Poker</a>
 </big>

 <?php

 $url = $_GET['url']; if (!$url){$url = "https://www.espn.com/espn/rss/news";}

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