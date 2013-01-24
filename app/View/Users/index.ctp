<!-- File: /app/View/Users/index.ctp -->
<?php ?>
<div class="article">
    <div class="searchform">
        <?php  
            echo $this->Form->create("User",array('action' => 'search')); 
            echo $this->Form->input("q", array('label' => '')); 
            echo $this->Form->end("Search"); 
        ?>
    </div>
    <h1><center>Manage users</center></h1>
    <div align="right">
    <input type="submit" value="add user" onClick="parent.location='/cake/users/add'"/>
    </div>
        <?php foreach (($users) as $user): ?>
        <h2><span>
                <?php echo $user['User']['username']; ?>
            </span></h2><div class="clr"></div>
        <span class="com"><?php echo "Role: ".$user['User']['role']; ?></span> &nbsp;&nbsp; |&nbsp;&nbsp;
        <span class="com"><?php echo "Created: ".$user['User']['created']; ?></span> &nbsp;&nbsp;|&nbsp;&nbsp;

        <class="spec"> 
            <?php
            echo $this->Html->link(
                    'Delete', array('action' => 'delete', $user['User']['id']), array('confirm' => 'Are you sure?'));
            ?>
            &nbsp;|&nbsp;
        <class="com">
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?>
                <br/><hr /><p/>

     <?php endforeach; ?>                    

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
