<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>

<div class="post__container">
  <span class="journal__post--date"><?php echo $page->date('M. d, Y') ?></span>
  <h3 class="journal__post--title"><?php echo $page->title() ?></h3>
  <?php echo $page->text()->kirbytext() ?>

  <div class="dot__container">
    <?php snippet('dotdot') ?>
    <?php snippet('dotdot') ?>
    <?php snippet('dotdot') ?>
    <?php snippet('dotdot') ?>
    <?php snippet('dotdot') ?>
  </div>
</div>

<?php snippet('contact') ?>
<?php snippet('scripts') ?>
<?php snippet('foot') ?>