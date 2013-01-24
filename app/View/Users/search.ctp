<?php // app/views/users/search.ctp  ?> 
<div class="article">
    <h2>User search</h2> 
    <?php
    echo $this->Form->create("User", array('action' => 'search'));
    echo $this->Form->input("q", array('label' => ''));
    echo $this->Form->end("Search");
    ?>  
    <table width="400px"> 
        <tr> 
            <th width="200px">Username</th> 
            <th width="70px">Action</th> 
            <th >Created</th> 
        </tr> 

        <!-- Here's where we loop through our $results array, printing out user info --> 

        <?php foreach ($results as $user): ?> 
            <tr> 
                <td align="center"> 
                    <?php echo $user['User']['username']; ?> 
                </td>
                <td> 
                    <?php
                    echo $this->Html->link(
                            'Delete', "/users/delete/{$user['User']['id']}", null, 'Are you sure?'
                    )
                    ?> 
                    <?php echo $this->Html->link('Edit', '/users/edit/' . $user['User']['id']); ?> 
                </td> 
                <td><?php echo $user['User']['created']; ?></td> 
            </tr> 
        <?php endforeach; ?> 
    </table> 
</div>