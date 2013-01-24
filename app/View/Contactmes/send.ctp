<!-- File: /app/View/ContactMe/send.ctp -->
<?php ?>
<div class="article">
    <h2><span>Send me</span> e-mail</h2><div class="clr"></div>        
    <div class="users form">
		<?php echo $this->Form->create('Contactme'); ?>
			<fieldset>
				  <legend><?php echo __('Email Form'); ?></legend>
				<?php
					echo $this->Form->input('name', array('rows'=>'1', 'cols'=>'70'));
					echo $this->Form->input('senderEmail', array('rows'=>'1', 'cols'=>'70'));
					echo $this->Form->input('subject', array('rows'=>'1', 'cols'=>'70'));
                    echo $this->Form->input('message', array('rows'=>'18', 'cols'=>'70'));
				?>
			</fieldset>
		<?php echo $this->Form->end(__('Send')); ?>
	</div>
    
</div>
