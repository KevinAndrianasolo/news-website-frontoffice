<h1 class="display-1 title">Fil d'actualités:</h1>
<?php if(count($news)==0) { ?>
    <div class="alert alert-dark display-4 content" role="alert">
        Pas d'actualité disponible.
    </div>
<?php } ?>
<ul class="display-4 content">
    <?php for($i=0;$i<count($news);$i++){ ?>
    <li><a href="<?php echo base_url().$news[$i]->link; ?>">
    <?php echo $news[$i]->instance['title']; ?></a></li>
    <?php } ?>
</ul>

 
