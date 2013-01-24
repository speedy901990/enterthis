<!-- File: /app/View/Posts/add.ctp -->
<?php
?>
<div class='article'>
	<h2>Add Post</h2>
	<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '8', 'cols' => '70'));
	echo $this->Form->end('Save Post');
	?>
</div>
