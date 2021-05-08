<img class="image lg" src="<?php echo base_url().'assets/img/'.$news->instance['image']; ?>" alt="<?php echo $news->instance['title']; ?>" />
<h1 class="display-1 title"><?php echo $news->HTMLInstance['title']; ?></h1>
<h2 class="display-2 subtitle"><?php echo $news->HTMLInstance['subtitle']; ?></h2>
<h3 class="display-3 description"><?php echo $news->HTMLInstance['description']; ?></h3>
<h5  class="display-4 content"><?php echo $news->HTMLInstance['content']; ?></h5>
<h1 class="display-1 title">Suggestions:</h1>
<?php if(count($related_news)==0) { ?>
    <div class="alert alert-dark display-4 content" role="alert">
        Pas de suggestion disponible.
    </div>
<?php } ?>
<ul class="display-4 content">
    <?php for($i=0;$i<count($related_news);$i++){ ?>
    <li><a href="<?php echo base_url().$related_news[$i]->link; ?>">
    <?php echo $related_news[$i]->instance['title']; ?></a></li>
    <?php } ?>
</ul>

