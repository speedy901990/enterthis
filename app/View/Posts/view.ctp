<!-- File: /app/View/Posts/view.ctp -->
<?php ?>
<div class="article">
	<h2><?php echo h($post['Post']['title']); ?></h2>

	<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

	<?php echo $post['Post']['body'];  ?>
</div>
