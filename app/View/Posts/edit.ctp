<!-- File: /app/View/Posts/edit.ctp -->
<?php ?>
<div class="article">
	<h2>Edit Post</h2>
	<?php
	echo $this->Form->create('Post', array('action' => 'edit'));
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '8', 'cols' => '70'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Save Post');
	?>
</div>
