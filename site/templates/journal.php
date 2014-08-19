<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

<div class="journal__container">
  <ul class="journal__post-list">
    <?php foreach($pages->find('/journal')->children()->visible()->sortBy($sort='date', $direction='desc') as $post): ?>
        <li class="journal__post">
          <span class="journal__post--date"><?php echo $post->date('M. j, Y') ?></span>
          <h3 class="journal__post--title"><?php echo $post->title() ?></h3>
          <p class="journal__post--description"><?php echo $post->text() ?></p>
        </li>
    <?php endforeach ?>
  </ul>
</div>

<script type="text/javascript">
    $('.journal__container').flowtype({
       minimum   : 500,
       maximum   : 1200,
       minFont   : 18,
       maxFont   : 30
    });
</script>

<?php snippet('foot') ?>