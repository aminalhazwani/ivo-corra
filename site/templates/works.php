<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>

<?php
    $works = $pages->find('works');
    $tags = tagcloud($works);
?>

<div class="works__container">
    <?php foreach($tags as $tag): ?>
        <?php if($tag->name() == 'new'): ?>
            <span class="section__title flash"><?php echo $tag->name() ?></span>
            <ul class="tag__name--related-works new">
            <?php 
            $tagname = $tag->name();
            foreach($works->children()->filterBy('tags', $tagname, ',') as $work): ?>
                <li class="related-works__item">
                    <?php $image = $work->images()->first(); ?>

                    <?php foreach($work->images() as $imageLightbox): ?>
                    <a class="work__thumb" href="<?php echo $imageLightbox->url() ?>" data-lightbox="<?php echo $work->title() ?>" data-title="<?php echo $imageLightbox->caption() ?>">
                        <figure class="work__element">
                            <div class="work__element--container"><img src="<?php echo thumb($image, array('height' => 260), false) ?>"></div>
                            <figcaption><?php echo $work->title() ?></figcaption>
                        </figure>
                    </a>
                    <?php endforeach ?>
                    
                    <?php if($work->text()->kirbytext() != ''): ?>
                        <div class="work__info">
                            <a class="work__info--button" href="#">Description</a>
                            <div class="work__info--description">
                                <div class="work__info--content">
                                    <h2><?php echo $work->title() ?></h2>
                                    <p><?php echo $work->text() ?></p>
                                </div>
                                <div class="work__info--gradient"></div>
                                <a class="work__info--close" href="#"></a>
                            </div>
                        </div>
                    <?php endif ?>
                </li><!--
            --><?php endforeach ?>
            </ul>
        <?php endif ?>
    <?php endforeach ?>

    <div class="works__about">
        <?php if($works->findmore() != ''): ?>
            <p><?php echo $works->findmore() ?></p>
        <?php endif ?>
        <ul class="works__tags--list">
            <?php foreach($tags as $tag): ?>
                <?php if($tag->name() != 'new'): ?>
                    <li class="tag__list--item"><a href="#<?php echo $tag->name() ?>"><?php echo $tag->name() ?></a></li>
                <?php endif ?>
            <?php endforeach ?>
        </ul>
    </div>

    <ul class="works__tags--list">
        <?php foreach($tags as $tag): ?>
            <?php if($tag->name() != 'new'): ?>
            <li class="tags__list--item" id="<?php echo $tag->name() ?>">
                <span class="section__title"><?php echo $tag->name() ?></span>
                <ul class="tag__name--related-works">
                <?php 
                $tagname = $tag->name();
                foreach($works->children()->filterBy('tags', $tagname, ',') as $work): ?>
                    <li class="related-works__item">
                        <?php $image = $work->images()->first(); ?>
                        
                        <?php foreach($work->images() as $imageLightbox): ?>
                        <a class="work__thumb" href="<?php echo $imageLightbox->url() ?>" data-lightbox="<?php echo $work->title() ?>" data-title="<?php echo $imageLightbox->caption() ?>">
                            <figure class="work__element">
                                <div class="work__element--container"><img src="<?php echo thumb($image, array('height' => 260), false) ?>"></div>
                                <figcaption><?php echo $work->title() ?></figcaption>
                            </figure>
                        </a>
                        <?php endforeach ?>

                        <?php if($work->text() != ''): ?>
                            <div class="work__info">
                                <a class="work__info--button" href="#">Description</a>
                                <div class="work__info--description">
                                    <div class="work__info--content">
                                        <h2><?php echo $work->title() ?></h2>
                                        <p><?php echo $work->text() ?></p>
                                    </div>
                                    <div class="work__info--gradient"></div>
                                    <a class="work__info--close" href="#"></a>
                                </div>
                            </div>
                        <?php endif ?>
                    </li><!--
                --><?php endforeach ?>
                </ul>
            </li>
        <?php endif ?>
        <?php endforeach ?>
    </ul>
</div>

<?php snippet('arrows') ?>
<?php snippet('scripts') ?>
<?php snippet('contact') ?>
<?php snippet('foot') ?>