<?php // app/views/posts/search.ctp  ?> 
<div class="article">
    <h2>Blog search</h2> 
    <?php
    echo $this->Form->create("Post", array('action' => 'search'));
    echo $this->Form->input("q", array('label' => ''));
    echo $this->Form->end("Search");
    ?>  
    <table width="400px"> 
        <tr> 
            <th width="200px">Title</th> 
            <th width="70px"">Action</th> 
            <th >Created</th> 
        </tr> 

        <!-- Here's where we loop through our $results array, printing out post info --> 

        <?php foreach ($results as $post): ?> 
            <tr> 
                <td align="center"> 
                    <?php echo $this->Html->link($post['Post']['title'], '/posts/view/' . $post['Post']['id']); ?> 
                </td>
                <td> 
                    <?php
                    echo $this->Html->link(
                            'Delete', "/posts/delete/{$post['Post']['id']}", null, 'Are you sure?'
                    )
                    ?> 
                    <?php echo $this->Html->link('Edit', '/posts/edit/' . $post['Post']['id']); ?> 
                </td> 
                <td><?php echo $post['Post']['created']; ?></td> 
            </tr> 
        <?php endforeach; ?> 
    </table> 
</div>