<!-- File: /app/View/Posts/index_own_posts.ctp -->
<?php ?>
<div class="article">
    <!--h2>Blog posts</span></h2><div class="clr"></div-->
    <h1><center>Blog</center></h1>
    <table>
        <tr>
            <td align="center"><input type="submit" value="add post" onClick="parent.location='/cake/posts/add'"/></td>
            <!--td align="center"><input type="submit" value="show own posts" onClick="parent.location='/cake/posts/indexOwnPosts'"/></td-->
            <!--td align="center"><input type="submit" value="manage users" onClick="parent.location='/cake/posts/manageUsers'"/></td-->
            <td align="right"><input type="submit" value="logout" onClick="parent.location='/cake/posts/logout'"/></td>
            <td align="right"></td>
            <?
            
            ?>
        </tr>
        <tr>        
            <td colspan="5"><hr size="3"/></td>
        </tr>
    </table>

    <?php 
    foreach ($posts as $post) { echo $id;?>
        
        <h2><span><?php for($i=0;$i<2;$i++)echo"&nbsp;"?><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?>
            </span></h2><div class="clr"></div>

        Posted by: 
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
        
        // creating short message
        $longMessage = $post['Post']['body'];
        $shortMessageLength = 150;
        for ($i=0 ; $i<$shortMessageLength && $i<strlen($longMessage) ; $i++){
            echo $longMessage[$i];
        }
        if (strlen($longMessage) > $shortMessageLength)
            echo ".......";
        ?>
        
        <br/>

        <class="spec"><?php
        echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?'));
        ?>
        &nbsp;|&nbsp; 
        <class="com"><?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
        <class="date"><small><?php for($i=0;$i<115;$i++)echo"&nbsp;"?><u><i>Created: <?php echo $post['Post']['created']; ?></i></u></small><br/>
        <hr />   
                
<?php } ?>    
</div>
