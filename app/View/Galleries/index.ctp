<!-- File: /app/View/Gallery/index.ctp -->
<?php ?>
<div class="article">
    <h1><center>Gallery</center></h1>
    <?php 
    foreach ($gallery as $image) {
        $thisImg = $image['Gallery']['name'];
        $imgPath = '/cake/app/webroot/img/gallery/';
        //echo "<center>";
        ?>
        <a href="<?php echo $imgPath.$thisImg?>" class="highslide"
        onclick="return hs.expand(this)">
        <img src="<?php echo $imgPath.$thisImg?>" alt="Highslide JS"
        title="Click to enlarge" height="120" width="187" /></a>
        <?php
        //echo "</center>";
    }   
    ?>
</div>
