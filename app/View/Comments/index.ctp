<div class="article">
<div class="comments index">
	<h2><?php echo __('Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0" >
	<tr>
			<!--th><?php echo $this->Paginator->sort('created'); ?></th-->
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('article_id'); ?></th>
			<!--th><?php echo $this->Paginator->sort('user_id'); ?></th-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($comments as $comment): ?>
	<tr>
		<!--td><?php echo h($comment['Comment']['created']); ?>&nbsp;</td-->
		<td><?php echo h($comment['Comment']['message']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comment['Article']['title'], array('controller' => 'articles', 'action' => 'view', $comment['Article']['id'])); ?>
		</td>
		<!--td>
			<?php //echo $this->Html->link($comment['User']['id'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
		</td-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comment['Comment']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $comment['Comment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comment['Comment']['id']), null, __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
        <div style="float: right; color: #524A3E;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}'))); ?>
        </div>
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
