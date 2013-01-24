<!-- File: /app/View/Newsletter/display_email_list.ctp -->
<?php ?>
<div class="article">
    <h1><center>Newsletter Email List</center></h1>
        <?php foreach (array_reverse($emails) as $email): ?>
        <?php echo $email['Newsletter']['email']; ?>
        <div class="clr"></div>
        <class="spec"> 
            <?php
            echo $this->Html->link(
                    'Delete', array('controller'=>'newsletter', 'action' => 'delete', $email['Newsletter']['id']), array('confirm' => 'Are you sure?'));
            ?>        
            <br/><hr />

     <?php endforeach; ?>              
</div>
