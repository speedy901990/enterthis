<!-- File: /app/View/Article/view.ctp -->
<?php ?>
<div class="article">
	<h2 align="center"><?php echo h($article['Article']['title']); ?></h2>	
    
	<?php echo $article['Article']['text'];  ?>
    
    Source: <?php echo $article['Article']['source'];?>
    <br/>
    Author: <?php echo $article['Article']['author'];?>
    <p align="right"><small><u><i>Created: <?php echo $article['Article']['created']; ?></i></u></small></p>
    <hr/>
    <h3>Comments</h3>
    
    <?php
    foreach ($comments as $comment) {
        //TODO apropriate comments to articles
        if ($comment['Comment']['article_id'] == $article['Article']['id']) {
            ?>
            <div style="border-style: outset; border-radius: 50px; background-color: #EBD4B7; ">
                <div style="margin-left: 30px; margin-right: 30px; margin-top: 5px; margin-bottom: 5px;">
                <?php
                // finding comment autrhor
                foreach ($users as $user){
                    if ($comment['Comment']['user_id'] == $user['User']['id']){
                        $commentAuthor = $user['User']['username'];
                    }
                }
                //~!
                
                echo "<b>$commentAuthor</b> says:<br/>"; 
                echo h($comment['Comment']['message']);

                ?><p align="left"><small><u><i>Created: <?php echo $comment['Comment']['created']; ?></i></u></small></p>
                </div>
            </div><br/>
            <?php
        }
    }?>
    
    <?php $patch = '/cake/comments/add/'.$article['Article']['id']; ?>
    <input type="submit" value="comment" onClick="parent.location='<?php echo $patch?>'"/>
</div>
