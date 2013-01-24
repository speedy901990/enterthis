<!-- File: /app/View/ContactMe/index.ctp -->
<?php ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="article">
    <h1><center>Contact</center></h1>
    <h2><span>Send me</span> e-mail</h2><div class="clr"></div>        
    <p>You can contact me at: <i>enterthiscake@gmail.com</i> <br/>or use button to fill the form
    <input type="submit" value="Send Email" onClick="parent.location='/cake/contactmes/send'"/></p>
    <div style="margin: -75px -350px 0px 0px; align: right;"><center><img src="/cake/app/webroot/img/email.jpeg" height="18%" width="18%" style="border: none"></img></center></div>
	
	
	<div style="margin: -80px 0px 0px 20px; width: 350px">
	<iframe  src="http://www.facebook.com/plugins/like.php?href=http://www.facebook.com/pages/EnterThis/148030918580684?ref=hl"
							scrolling="no" frameborder="0"
							style="border:none; width:300px; height:100px"></iframe>
	</div>
	<h3>Comment and visit <a style="color: red;" href="http://www.facebook.com/pages/EnterThis/148030918580684" target="blank">EnterThis</a> funpage</h3>
	
	<center><div class="fb-comments" data-href="http://www.facebook.com/pages/EnterThis/148030918580684" data-num-posts="2" data-width="470"></div></center>
</div>
