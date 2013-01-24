 <div class="article">
    <div class="comments form">
        <h2>Article: <?php echo $articleTitle['Article']['title']; ?></h2>
        <?php echo $this->Form->create('Comment'); ?>
            <fieldset>
                <legend><?php echo __('Add Comment'); ?></legend>
            <?php
                echo $this->Form->input('message', array('rows'=>'10', 'cols'=>'70'));
            ?>
            </fieldset>
        <?php echo $this->Form->end(__('Comment')); ?>
    </div>
</div>