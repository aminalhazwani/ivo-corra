<?php snippet('head') ?>
<?php snippet('controls') ?>
<h1 class="site__title"><a href="/ivo-corra">Ivo Corrà</a></h1>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

<div class="container">
    <?php foreach($pages->find('works')->children()->visible() as $work): ?>
        <?php if($work->home() == 'ja'): ?>
            <div class="work">   
                <?php foreach($work->images() as $image): ?>
                    <a href="<?php echo $image->url() ?>" data-lightbox="<?php echo $work->title() ?>">
                        <img class="lazy" src="<?php echo thumb($image, array('width' => 300), false) ?>" alt="<?php echo $work->title() ?>">
                    </a>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>

<script type="text/javascript">
    $(function() {
        $("img.lazy").lazyload({
            effect : "fadeIn"
        });
    });
</script>

<?php snippet('foot') ?>
