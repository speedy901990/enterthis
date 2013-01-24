<div class="article">
<div class="comments view">
<h2><?php  echo __('Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comment['Comment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($comment['Comment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($comment['Comment']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comment['Article']['title'], array('controller' => 'articles', 'action' => 'view', $comment['Article']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comment['User']['id'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>

</div>
</div>
