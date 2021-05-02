<!DOCTYPE html>
<html>
<head>
	<title>Actualités - ETU000876 - TP Avril 2021 - S6</title>
    <meta name="author" content="ANDRIANASOLO LALA Sitrakaharinetsa Kevin, ETU000876"/>
    <meta name="keywords" content="ETU000876, TP Avril 2021, S6"/>
    <meta name="description" content="Fil d'actualité du site NewsWebsite - ETU000876, TP Avril 2021, S6"/>

</head>
<body>
<h1>Toutes les actualités:</h1>
<ul>
    <?php for($i=0;$i<count($news);$i++){ ?>
    <li><a href="<?php echo str_replace("?","",site_url($news[$i]->link)); ?>">
    <?php echo $news[$i]->instance['title']; ?></a></li>
    <?php } ?>
</ul>
</body>
</html>



