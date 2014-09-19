<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>

<div class="journal__container">
  <ul class="journal__post-list">
    <?php foreach($pages->find('/journal')->children()->visible()->sortBy($sort='date', $direction='desc') as $post): ?>
        <li class="journal__post">
          <span class="journal__post--date"><?php echo $post->date('M. j, Y') ?></span>
          <p class="journal__post--title"><?php echo $post->title() ?></p>
          <p class="journal__post--description"><?php echo $post->text() ?></p>
        </li>
    <?php endforeach ?>
  </ul>

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