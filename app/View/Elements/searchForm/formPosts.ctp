<div class='search' style="margin:10px;">
    <fieldset>
        <h2> Search <?php echo$this->params['controller'] ?></h2><hr/><center>
            <?php echo $this->Form->create(array('action' => 'index', 'type' => 'GET')); ?>
            <?php
            $name = isset($this->params['url']['name']) ? $this->params['url']['name'] : null;
            //echo $this->Form->input('id', array( 'label'=>'ID','type'=>'text'));
            echo $this->Form->input('title', array('label' => 'Title', 'value' => $name, 'type' => 'text')); // 'rows'=>2,'cols'=> 50));
            //echo $this->Form->input('body', array('type'=>'text'));  
            echo $this->Form->input('created', array('type' => 'date'));

            echo $this->Form->submit('Search', array('class' => 'button'));
            ?>

            <?php echo $this->Form->end(); ?>
    </fieldset>
</div>
<br/></center>