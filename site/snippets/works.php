<div class="container">
    <?php foreach($pages->find('/works')->children()->visible() as $work): ?>
        <?php if($work->home() == 'ja'): ?>
            <div class="work">   
                <?php $image = $work->images()->first(); ?>
                <a href="<?php echo $image->url() ?>" data-lightbox="<?php echo $work->title() ?>">
                    <img src="<?php echo thumb($image, array('width' => 300), false) ?>" alt="<?php echo $work->title() ?>">
                </a>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>