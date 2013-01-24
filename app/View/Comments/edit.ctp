<div class="article">
<div class="comments form">
<?php echo $this->Form->create('Comment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('message');
		echo $this->Form->input('article_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
