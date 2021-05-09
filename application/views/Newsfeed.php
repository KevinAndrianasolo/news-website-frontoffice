<h1 class="display-1 title">Fil d'actualités:</h1>
<?php if(count($news)==0) { ?>
    <div class="alert alert-dark display-4 content" role="alert">
        Pas d'actualité disponible.
    </div>
<?php } ?>
<ul class="display-4 list-group content">
    <?php for($i=0;$i<count($news);$i++){ ?>
    <li class="list-group-item">
        <div class="newsfeed-img">
            <img class="image sm" src="<?php echo $news[$i]->instance['image']; ?>" alt="<?php echo $news[$i]->instance['title']; ?>" />
        </div>
        <a class="newsfeed-title"href="<?php echo base_url().$news[$i]->link; ?>"><?php echo $news[$i]->instance['title']; ?></a>
        <p class="newsfeed-content"><?php echo $news[$i]->instance['description']; ?></p>

    </li>
    <?php } ?>
</ul>

 
