<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'EnterThis');

$this->Session->read('Auth.User');
$loggedInUser = $this->Session->read('Auth.User.username');
$loggedInUserRole = $this->Session->read('Auth.User.role');
    
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
    <?php 
		echo $this->Html->meta('icon');
        
		echo $this->Html->css('style');
        //echo $this->Html->css('cake.generic');
		echo $this->Html->script('cufon-yui');
		echo $this->Html->script('arial');
		echo $this->Html->script('cuf_run');
        
        // highslide
        echo $this->Html->css('highslide');
        ?>
        <script type="text/javascript" src="/cake/app/webroot/highslide/highslide.js"></script>
        <link rel="stylesheet" type="text/css" href="/cake/app/webroot/highslide/highslide.css" />
        <script type="text/javascript">
            hs.graphicsDir = '/cake/app/webroot/highslide/graphics/';
        </script>
        <?php
        //~!
        
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<!-- Put the following javascript before the closing </head> tag. -->
	<script>
	  (function() {
		var cx = '016054475535872417706:dj99peewuwg';
		var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
		gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
			'//www.google.com/cse/cse.js?cx=' + cx;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
	  })();
	</script>
</head>
<body>
	
	<div class="header">
		<div class="header_resize">
            <div class="logged_in_frame">
                <div class="logged_in_text">
                    <?php 
                    if (empty($loggedInUser)) {
                        $buttonValue = 'login';
                        echo 'Logged out | ';
                    }
                    else{
                        $buttonValue = 'logout';
                        echo 'Logged in as: <b>'.$loggedInUser.'</b> | ';
                    }
                    ?>
                    <input type="submit" value=<?php echo $buttonValue;?> onClick="parent.location='/cake/posts/logout'"/>
                </div>
            </div>
			<div class="logo"><h4><a href="/cake"><span>speedy</span> EnterThis <small>open for everyone</small></a></h4></div>
				<div class="menu_nav"></div>
			<div class="clr"></div>
		</div>
	</div>
	<div class="hbg" style="position: relative;">&nbsp;</div>
	<div class="content">
		<div class="content_resize">
		  <!--div class="mainbar"-->
              <div style="margin-left: 50px; width: 450px; float: center; margin-top: 0px;" >
				<gcse:searchresults></gcse:searchresults>
              </div><div class="mainbar">
                <?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>	
				 				
			</div>
			 <div class="sidebar">
                    <!-- sidebar menu -->
					<div class="gadget" style="margin-top: 50px;"> 
						<h2 class="star" style="margin-left: 30px;">Menu</h2><div class="clr"></div>
						<ul class="sb_menu">
                            <li><a href='/cake/articles'>Article</a></li>
                            <li><a href='/cake/posts'>Blog</a></li>
                            <li><a href='/cake/galleries'>Gallery</a></li>
                            <li><a href='/cake/newsletters'>Newsletter</a></li>
                            <li><a href='/cake/contactmes'>Contact</a></li>
                            <li><a href='http://89.76.245.182:88'>WebCit</a></li>
			    <?php
                            if ($loggedInUserRole === 'admin')
                                echo "<li><a href='/cake/adminpages'>Admin Page</a></li>";
                            ?>
							<div style="margin-left: -30px;">
							<iframe  src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FEnterThis%2F148030918580684%3Fref%3Dhl&amp;width=350&amp;height=200&amp;colorscheme=light&amp;show_faces=false&amp;border_color=orange&amp;stream=false&amp;header=true"
							scrolling="no" frameborder="0"
							style="border:none; width:200px; height:70px"></iframe>
							</div>
					 	</ul>
						<gcse:searchbox></gcse:searchbox>
					</div> 
                    <!-- sidebar menu end -->
			  </div>
		  <div class="clr"></div>
		</div>
	</div>
	<div class="fbg">
	<div class="fbg_resize">
        <?php  
        // test searchForm on all pages
//            echo $this->Form->create($this->name,array('action' => 'search')); 
//            echo $this->Form->input("q", array('label' => '')); 
//            echo $this->Form->end("Search"); 
        ?>
    </div>
		</div>
			<div class="footer">
				<div class="footer_resize">
				  <p class="lf">© Copyright <a target="blank" href="http://www.facebook.com/speedy901990">speedy901990</a>. Layout by [i] <a target="blank" href="http://www.facebook.com/speedy901990">speedy901990</a></p>
				  <div class="clr"></div>
				</div>
			</div> 
	<div id="footer" style="text-align: right;">
		<?php echo $this->Html->link(
				$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
				'http://www.cakephp.org/',
				array('target' => '_blank', 'escape' => false)
			);
		?>
	</div>
</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
