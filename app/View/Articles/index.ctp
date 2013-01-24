<!-- File: /app/View/Article/index.ctp -->
<?php ?>
<div class="article">
    <div class="searchform">
        <?php  
            echo $this->Form->create("Article",array('action' => 'search')); 
            echo $this->Form->input("q", array('label' => '')); 
            echo $this->Form->end("Search"); 
        ?>
    </div>
    <h1><center>Article</center></h1>
    <?php foreach (array_reverse($articles) as $article) { ?>
        <h2 width="100"><span><?php for ($i = 0; $i < 4; $i++)
        echo"&nbsp;" ?>
                <?php echo $this->Html->link($article['Article']['title'], array('action' => 'view', $article['Article']['id'])); ?>
            </span></h2><div class="clr"></div>

        <?php echo $article['Article']['shortText']; ?>

        <p class="date" align="right"><small><i><u>Created: <?php echo $article['Article']['created']; ?></u></i></small></p>
        <!--hr /-->        
    <?php } ?>   

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
