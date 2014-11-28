<?php snippet('head') ?>

<?php snippet('controls') ?>
<h1 class="site__title"><a href="<?php echo url() ?>">Ivo Corrà</a></h1>
<?php snippet('menu') ?>

<?php snippet('spinner') ?>

<div class="container">
    <?php foreach($pages->find('works')->children()->visible() as $work): ?>
    <?php if($work->home() == 'ja'): ?>
        <div class="work"> 
            <?php $img = $work->images()->first(); ?>
            <?php foreach($work->images() as $image): ?>
                <?php if($image->inserisci() == 'ja'): ?>
                    <a class="box" href="<?php echo $image->url() ?>" data-lightbox="<?php echo $work->title() ?>" data-title="<?php echo $image->caption() ?>">
                        <!-- <img src="<?php echo $img->url() ?>" alt="<?php echo $work->title() ?>"> -->
                        <img src="<?php echo thumb($img, array('width' => 400), false) ?>" alt="<?php echo $work->title() ?>">
                    </a>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <?php endforeach ?>
</div>
<?php snippet('arrows') ?>
<?php snippet('scripts') ?>
<?php snippet('contact') ?>
<script src="assets/scripts/home.min.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('.spinner__container').fadeOut(1000);
    });
</script>
<?php snippet('foot') ?>
