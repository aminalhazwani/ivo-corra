<?php snippet('head') ?>
<?php snippet('controls') ?>
<h1 class="site__title"><a href="<?php echo url() ?>">Ivo Corrà</a></h1>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

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
                    <?php 
                        $image = $work->images()->first();
                    ?>
                    <figure>
                        <?php foreach($work->images() as $imageLightbox): ?>
                            <a class="work__thumb" href="<?php echo $imageLightbox->url() ?>" data-lightbox="<?php echo $work->title() ?>" data-title="<?php echo $imageLightbox->caption() ?>">
                                <img src="<?php echo thumb($image, array('height' => 200), false) ?>">
                            </a>
                        <?php endforeach ?>
                        <figcaption><?php echo $work->title() ?></figcaption>
                    </figure>
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
                        <?php 
                            $image = $work->images()->first();
                        ?>
                        <figure>
                            <?php foreach($work->images() as $imageLightbox): ?>
                                <a class="work__thumb" href="<?php echo $imageLightbox->url() ?>" data-lightbox="<?php echo $work->title() ?>" data-title="<?php echo $imageLightbox->caption() ?>">
                                    <img src="<?php echo thumb($image, array('height' => 200), false) ?>">
                                </a>
                            <?php endforeach ?>
                            <figcaption><?php echo $work->title() ?></figcaption>
                        </figure>
                    </li><!--
                --><?php endforeach ?>
                </ul>
            </li>
        <?php endif ?>
        <?php endforeach ?>
    </ul>
</div>

<?php snippet('foot') ?>