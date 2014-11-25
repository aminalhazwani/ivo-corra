<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>

<div class="about__container">
    <?php echo $page->bio()->kirbytext() ?>

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