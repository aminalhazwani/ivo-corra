<?php snippet('head') ?>

<?php snippet('controls') ?>
<h1 class="site__title"><a href="<?php echo url() ?>">Ivo Corrà</a></h1>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

<?php snippet('spinner') ?>

<div class="container">
    <?php foreach($pages->find('homepage')->children()->visible() as $work): ?>
    <div class="work"> 
        <?php foreach($work->images() as $image): ?>
            <a class="box" href="<?php echo $image->url() ?>" data-lightbox="<?php echo $work->title() ?>">
                <!-- <div class="overlay"></div> -->
                <img src="<?php echo thumb($image, array('width' => 300), false) ?>" alt="<?php echo $work->title() ?>">
            </a>
        <?php endforeach ?>
    </div>
    <?php endforeach ?>
</div>
 
<?php snippet('foot') ?>
