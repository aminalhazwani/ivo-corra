<?php snippet('head') ?>
<?php snippet('controls') ?>
<h1 class="site__title"><a href="<?php echo url() ?>">Ivo Corrà</a></h1>
<?php snippet('menu') ?>

<?php
    $works = $pages->find('works');
    $tags = tagcloud($works);
?>

<div class="works__new">
    <?php foreach($tags as $tag): ?>
        <?php if($tag->name() == 'new'): ?>
            <span class="section__title"><?php echo $tag->name() ?></span>
            <ul class="tag__name--related-works">
            <?php 
            $tagname = $tag->name();
            foreach($works->children()->filterBy('tags', $tagname, ',') as $work): ?>
                <li class="related-works__item">
                    <?php $image = $work->images()->first(); ?>
                    <figure class="work__element">
                        <?php foreach($work->images() as $imageLightbox): ?>
                            <a class="work__thumb" href="<?php echo $imageLightbox->url() ?>" data-lightbox="<?php echo $work->title() ?>" data-title="<?php echo $imageLightbox->caption() ?>">
                                <img src="<?php echo thumb($image, array('height' => 180), false) ?>">
                            </a>
                        <?php endforeach ?>
                        <figcaption><?php echo $work->title() ?></figcaption>
                    </figure>
                    <?php if($work->text() != ''): ?>
                        <div class="work__info">
                            <a class="work__info--button" href="#">i</a>
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
</div>

<div class="works__container">
    <ul class="works__tags--list">
        <?php foreach($tags as $tag): ?>
            <?php if($tag->name() != 'new'): ?>
            <li class="tags__list--item">
                <span class="section__title"><?php echo $tag->name() ?></span>
                <ul class="tag__name--related-works">
                <?php 
                $tagname = $tag->name();
                foreach($works->children()->filterBy('tags', $tagname, ',') as $work): ?>
                    <li class="related-works__item">
                        <?php $image = $work->images()->first(); ?>
                        <figure class="work__element">
                            <?php foreach($work->images() as $imageLightbox): ?>
                                <a class="work__thumb" href="<?php echo $imageLightbox->url() ?>" data-lightbox="<?php echo $work->title() ?>" data-title="<?php echo $imageLightbox->caption() ?>">
                                    <img src="<?php echo thumb($image, array('height' => 180), false) ?>">
                                </a>
                            <?php endforeach ?>
                            <figcaption><?php echo $work->title() ?></figcaption>
                        </figure>
                        <?php if($work->text() != ''): ?>
                            <div class="work__info">
                                <a class="work__info--button" href="#">i</a>
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

<?php snippet('scripts') ?>

<?php snippet('contact') ?>

<script type="text/javascript">
    $('.work__info--description').flowtype({
       minimum   : 300,
       maximum   : 1000,
       minFont   : 16,
       maxFont   : 20
    });
</script>

<?php snippet('foot') ?>