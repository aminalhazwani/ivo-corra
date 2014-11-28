<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php if($page->template() != 'home'): ?>
            <title><?php echo html($site->title()) ?> - <?php echo html($page->title()) ?></title>
        <?php else: ?>
            <title><?php echo html($site->title()) ?></title>
        <?php endif ?>

        <?php if($page->text() != ''): ?>
            <meta name="description" content="<?php echo excerpt($page->text(), 200) ?>" />
        <?php else: ?>
            <meta name="description" content="<?php echo html($site->description()) ?>" />
        <?php endif ?>

        <meta name="keywords" content="<?php echo html($site->keywords()) ?>" />

        <meta property="og:title" content="<?php echo html($site->title()) ?> – <?php echo html($page->title()) ?>" />

        <?php if($page->text() != ''): ?>
        <meta property="og:description" content="<?php echo excerpt($page->text(), 150) ?>" />
        <?php else: ?>
        <meta property="og:description" content="<?php echo html($site->description()) ?>" />
        <?php endif ?>

        <meta property="og:url" content="<?php echo $page->url() ?>" />

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="format-detection" content="telephone=no">

        <link rel="icon" type="image/png" href="<?php echo url() ?>/assets/images/favicon.png">
        <?php echo css('assets/styles/main.min.css') ?>
    </head>
    <body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->