<?php // app/views/articles/search.ctp  ?> 
<div class="article">
    <h2>Article search</h2> 
    <?php
    echo $this->Form->create("Article", array('action' => 'search'));
    echo $this->Form->input("q", array('label' => ''));
    echo $this->Form->end("Search");
    ?>  
    <table width="400px"> 
        <tr> 
            <th width="200px">Title</th> 
            <th width="70px"">Action</th> 
            <th >Created</th> 
        </tr> 

        <!-- Here's where we loop through our $results array, printing out article info --> 

        <?php foreach ($results as $article): ?> 
            <tr> 
                <td align="center"> 
                    <?php echo $this->Html->link($article['Article']['title'], '/articles/view/' . $article['Article']['id']); ?> 
                </td>
                <td> 
                    <?php
                    echo $this->Html->link(
                            'Delete', "/articles/delete/{$article['Article']['id']}", null, 'Are you sure?'
                    )
                    ?> 
                    <?php echo $this->Html->link('Edit', '/articles/edit/' . $article['Article']['id']); ?> 
                </td> 
                <td><?php echo $article['Article']['created']; ?></td> 
            </tr> 
        <?php endforeach; ?> 
    </table> 
</div>