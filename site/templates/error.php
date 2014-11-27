<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>

<div class="error__container">
    <h1 class="error__title"><?php echo $page->title() ?></h1>
    <?php echo $page->text()->kirbytext() ?>

    <div class="dot__container">
        <?php snippet('dotdot') ?>
        <?php snippet('dotdot') ?>
        <?php snippet('dotdot') ?>
        <?php snippet('dotdot') ?>
        <?php snippet('dotdot') ?>
    </div>
</div>

<?php snippet('scripts') ?>
<?php snippet('contact') ?>
<?php snippet('foot') ?>