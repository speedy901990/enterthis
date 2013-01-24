<style type="text/css">

    body { margin:0; padding:0; width:100%; color:#524a3e; font:normal 12px/1.8em Arial, Helvetica, sans-serif;}

    html, .main { padding:0; margin:0; background:url(http://www.metal.agh.edu.pl/~tnowak/cake/bg.gif);}

    .clr { clear:both; padding:0; margin:0; width:100%; font-size:0px; line-height:0px;}

    .logo { padding:0 0 0 40px; float:left; width:auto;}

    h1 { margin:0; padding:16px 0; color:#9E2424 ; font:bold 40px/1.2em Arial, Helvetica, sans-serif; letter-spacing:-2px;}

    h1 a, h1 a:hover { color:#fff; text-decoration:none;} 

    h1 span { color:#b75024;}

    h1 small { display:block; padding:0; font:normal 13px/1.2em Arial, Helvetica, sans-serif; letter-spacing:normal;}

    h2 { font:normal 24px Arial, Helvetica, sans-serif; padding:8px 0; margin:8px 0; color:#b75024;}

    h3 { font:normal 20px Arial, Helvetica, sans-serif; padding:8px 0; margin:8px 0; color:#b75024;}

    p { margin:8px 0; padding:0 0 8px 0; font:normal 12px/1.8em Arial, Helvetica, sans-serif;}

    a { color:#b75024; text-decoration:underline;}

    a:hover { font-weight: bold;}



    .header, .content, .menu_nav, .fbg, .footer, form, ol, ol li, ul, .content .mainbar, .content .sidebar { margin:0; padding:0;}

    .fbg_resize { margin:0 auto; padding:0 40px; width:890px;}



    /* header */

    .header { background-color:#4d5152;}

    .header_resize { margin:0 auto; padding:0; width:970px; background: #4d5152;}

    .header_resize .logged_in_frame { margin-top: 20px ; float: right; text-align: center; border-style: none; border-radius: 50px;  color:white;}

    .header_resize .logged_in_frame .logged_in_text { margin-left: 10px; margin-right: 10px; color:white;}

    /* content */

    .content_resize { margin:0 auto; padding:0; width:970px; background-color:#e6decb; border-top-left-radius: 15px; border-top-right-radius: 15px}

    .content .mainbar { margin:0; padding:0; float:left; width:670px; background-color: #E6DECB; border-radius: 15px 15px 15px 15px;}

    .content .mainbar img { padding:0px; border:1px solid #b7b7b7; background-color:#fff;}

    .content .mainbar img.fl { margin:4px 16px 4px 0; float:left;}

    .content .mainbar .article { margin:0; padding:16px 24px 24px 40px;}

    .content .sidebar { padding:0; float:right; width:300px;}

    .content .sidebar .gadget { margin:0; padding:16px 16px 24px 40px;}


    /* subpages */

    .content .mainbar .comment { margin:0; padding:16px 0 0 0;}

    .content .mainbar .comment img.userpic { border:1px solid #dedede; margin:10px 16px 0 0; padding:0; float:left;}
</style>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="html; charset=UTF-8" />
        <title>Newsletter</title>
    </head>
    <body>
        <div class="header">
            <div class="header_resize">
                <div class="logo"><h1><a href="http://89.76.245.182/cake"><span>speedy</span> HomePage <small>open for everyone</small></a></h1></div>
            </div>
        </div>
        
        	
        <div class="content">
            <div class="content_resize" >
                <div class="mainbar">
                	<div class="article">
		                <?php
		                $content = explode("\n", $content);

		                foreach ($content as $line):
		                    echo  $line . "\n";
		                endforeach;
		                ?>
		                <!-- Here's where I want my views to be displayed -->
		                <?php echo $this->fetch('content'); ?>
		            	</div>
                </div>
            </div>
        </div>
    </body>
</html>