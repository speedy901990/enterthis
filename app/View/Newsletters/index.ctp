<!-- File: /app/View/Newsletter/index.ctp -->
<?php ?>
<div class="article">
    <!--h2>Blog posts</span></h2><div class="clr"></div-->    
    <div class="users form">
        <h1><center>Newsletter</center></h1>
		<?php echo $this->Form->create('Newsletter'); ?>
			<fieldset>
				  <legend><?php echo __('Enter your e-mail'); ?></legend>
				<center><?php echo $this->Form->input('email', array('rows'=>'1', 'cols'=>'70')); ?></center>
			</fieldset>
		<?php echo $this->Form->end(__('Sign in')); ?>
	</div>
    <p><center><td><img src="/cake/app/webroot/img/newsletter.jpg" height="220" width="60%" style="border: none"></img></center></p>
</div>