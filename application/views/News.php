<!DOCTYPE html>
<html>
<head>
	<title><?php echo $news->instance['title']; ?></title>
    <meta name="author" content="ANDRIANASOLO LALA Sitrakaharinetsa Kevin, ETU000876"/>
    <meta name="keywords" content="<?php echo implode(", ",$news->keywords); ?>"/>
    <meta name="description" content="<?php echo $news->instance['description']; ?>"/>

</head>
<body>

<h1><?php echo $news->HTMLInstance['title']; ?></h1>
<h2><?php echo $news->HTMLInstance['subtitle']; ?></h2>
<h3><?php echo $news->HTMLInstance['description']; ?></h3>
<p><?php echo $news->HTMLInstance['content']; ?></p>
</body>
</html>

