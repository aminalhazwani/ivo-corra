<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>

<div class="journal__container">
  <ul class="journal__post-list">
    <?php $num = $pages->find('/journal')->numpost()->toString() ?>
    <?php foreach($pages->find('/journal')->children()->visible()->sortBy($sort='date', $direction='desc')->limit($num) as $post): ?>
      <li class="journal__post">
        <span class="journal__post--date"><?php echo $post->date('M. d, Y') ?></span>
        <h3 class="journal__post--title"><?php echo $post->title() ?></h3>
        <?php echo $post->text()->kirbytext() ?>
      </li>
    <?php endforeach ?>
  </ul>

  <div class="journal__archive">
    <p>Do you like what are you reading? <a href="<?php echo $site->url() ?>/archive">View all posts</a></p>
  </div>

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