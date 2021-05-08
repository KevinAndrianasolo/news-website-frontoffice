<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
    <meta name="author" content="<?php echo $author; ?>"/>
    <meta name="keywords" content="<?php echo $keywords; ?>"/>
    <meta name="description" content="<?php echo $description; ?>"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/main.min.css'; ?>"/>
    </head>
<body>
<div class="page">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php if($category=='All') {echo 'active';} ?>" href="<?php echo base_url().'News/All'; ?>"><h4 class="display-4">All</h4></a>
        </li>
        <?php for($i=0; $i<count($category_list);$i++){ ?>
        <li class="nav-item">
            <a class="nav-link <?php if($category==$category_list[$i]['name']) {echo 'active';} ?>" href="<?php echo base_url().'News/'.$category_list[$i]['name'].'/'.$category_list[$i]['id_category']; ?>"><h4 class="display-4"><?php echo $category_list[$i]['name']; ?></h4></a>
        </li>
        <?php } ?>
    </ul>