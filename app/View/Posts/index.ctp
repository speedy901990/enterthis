<!-- File: /app/View/Posts/index.ctp -->
<?php ?>
<div class="article">
    <div class="searchform">
        <?php  
            echo $this->Form->create("Post",array('action' => 'search')); 
            echo $this->Form->input("q", array('label' => '')); 
            echo $this->Form->end("Search"); 
        ?>
    </div>
    <!--h2>Blog posts</span></h2><div class="clr"></div-->
    <h1><center>Blog</center></h1>
    <div style="text-align: right;">
        <input type="submit" value="add post" onClick="parent.location='/cake/posts/add'"/>
    </div>
    <?php 
    foreach (($posts) as $post) { ?>
        <h2><span><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?>
            </span></h2><div class="clr"></div>

        <p>Posted by: 
        <?php
        $userFound = 0;
        foreach ($users as $user) {
            if ($user['User']['id'] == $post['Post']['user_id']) {
                echo "<b>" . $user['User']['username'] . "</b><br/>";
                $userFound = 1;
            }
        }
        
        if ($userFound == 0)
            echo "<b>unknown</b><br/>";
        echo "</p><p>";
        
        // creating short message
        $longMessage = $post['Post']['body'];
        $shortMessageLength = 150;
        for ($i=0 ; $i<$shortMessageLength && $i<strlen($longMessage) ; $i++){
            echo $longMessage[$i];
        }
        if (strlen($longMessage) > $shortMessageLength)
            echo ".......";
        ?>
        </p>
        <!--br/-->

        <class="spec"><?php
        echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?'));
        ?>
        &nbsp;|&nbsp; 
        <class="com"><?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
        <class="date"><small><?php for($i=0;$i<115;$i++)echo"&nbsp;"?><u><i>Created: <?php echo $post['Post']['created']; ?></i></u></small><br/>
        <hr /><br/>   
                
<?php } ?>    
    <div class="paging">
        <div style="float: right; color: #524A3E;">
            <?php echo $this->Paginator->counter(array('format' => __('Post {:page} of {:pages}'))); ?>
        </div>
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
    
</div>
