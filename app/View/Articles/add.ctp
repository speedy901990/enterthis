<!-- File: /app/View/Article/add.ctp -->
<?php
?>
<div class='article'>
	<div class="users form">
		<?php echo $this->Form->create('Article'); ?>
			<fieldset>
				  <legend><?php echo __('Add Article'); ?></legend>
				<?php
					echo $this->Form->input('title', array('rows'=>'2', 'cols'=>'70'));
                    echo $this->Form->input('source', array('rows'=>'2', 'cols'=>'70'));
                    echo $this->Form->input('author', array('rows'=>'2', 'cols'=>'70'));
                    echo $this->Form->input('shortText', array('rows'=>'5', 'cols'=>'70'));
					echo $this->Form->input('text', array('rows'=>'30', 'cols'=>'70'));          
				?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>