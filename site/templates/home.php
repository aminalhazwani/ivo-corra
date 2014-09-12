<?php snippet('head') ?>

<?php snippet('controls') ?>
<h1 class="site__title"><a href="<?php echo url() ?>">Ivo Corrà</a></h1>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

<?php snippet('spinner') ?>

<div class="container">
    <?php foreach($pages->find('works')->children()->visible() as $work): ?>
    <?php if($work->home() == 'ja'): ?>
        <div class="work"> 
            <?php $img = $work->images()->first(); ?>
            <?php foreach($work->images() as $image): ?>
                <?php if($image->inserisci() != ''): ?>
                    <a class="box" href="<?php echo $img->url() ?>" data-lightbox="<?php echo $work->title() ?>" data-title="<?php echo $image->caption() ?>">
                        <!-- <div class="overlay"></div> -->
                        <img src="<?php echo thumb($img, array('width' => 300), false) ?>" alt="<?php echo $work->title() ?>">
                    </a>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <?php endforeach ?>
</div>

<?php snippet('scripts') ?>

<script type="text/javascript">
    $(window).load(function() {
        $('.spinner__container').fadeOut(1000);
    });
</script>
 
<?php snippet('foot') ?>
