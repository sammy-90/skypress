
<style>
.share {
  padding: 8px;
  font-size: 30px;
  width: 60px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 10px;
}
.fa:hover {
    opacity: 0.7;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}
.fa-pinterest {
  background: #cb2027;
  color: white;
}
.fa-reddit {
  background: #ff5700;
  color: white;
}
.fa-vk {
  background: #3B5998;
  color: white;
}
</style>

<center>
<a href="https://facebook.com/sharer/sharer.php?u=<?php echo $_SERVER['SERVER_NAME']; ?>" target="_blank" rel="nofollow" class="w3-circle share fa fa-facebook"></a>
<a href="https://twitter.com/intent/tweet/?text=&amp;url=<?php echo $_SERVER['SERVER_NAME']; ?>" target="_blank" rel="nofollow" class="w3-circle share fa fa-twitter"></a><br>
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $_SERVER['SERVER_NAME']; ?>" target="_blank" rel="nofollow" class="w3-circle share fa fa-linkedin"></a>
<a href="https://pinterest.com/pin/create/button/?url=<?php echo $_SERVER['SERVER_NAME']; ?>;media=&amp;description=" target="_blank" rel="nofollow" class="w3-circle share fa fa-pinterest"></a><br>
<a href="https://reddit.com/submit/?url=<?php echo $_SERVER['SERVER_NAME']; ?>&amp;title=" target="_blank" rel="nofollow" class="w3-circle share fa fa-reddit"></a>
<a href="http://vk.com/share.php?url=<?php echo $_SERVER['SERVER_NAME']; ?>" target="_blank" rel="nofollow" class="w3-circle share fa fa-vk"></a>
</center>

