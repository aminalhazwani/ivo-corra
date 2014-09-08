<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

<div class="about__container">
    <?php echo markdown($page->bio()) ?>

    <div class="dot__container"></div>
</div>

<script type="text/javascript">
    $('.about__container').flowtype({
       minimum   : 500,
       maximum   : 1200,
       minFont   : 18,
       maxFont   : 30
    });
</script>

<?php snippet('foot') ?>