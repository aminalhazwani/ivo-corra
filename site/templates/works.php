<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

<!--<?php

$works = $pages->find('works');
$tags = tagcloud($works);

?>

<ul>
    <?php foreach($tags as $tag): ?>
    <li>
        <span><?php echo $tag->name() ?></span>
        
        <?php foreach($page->children()->filterBy('tags', '<?php echo $tag-name() ?>', ',') as $work): ?>
            <figure>
                <img src="<?php echo $work->images()->first()->url() ?>">
                <figcaption><?php echo $work->title() ?></figcaption>
            </figure>
        <?php endforeach  ?>
    </li>
    <?php endforeach ?>
</ul>-->

<div class="works__container">
    <ul class="works__tags--list">
        <li class="tags__list--item">
            <span class="section__title">Art</span>
            <ul class="tag__name--related-works">
                <li class="related-works__item">
                    <figure>
                        <a href="http://placekitten.com/g/200/300" data-lightbox="progetto">
                            <img src="http://placekitten.com/g/200/300" alt="#">
                        </a>
                        <a href="http://placekitten.com/g/400/400" data-lightbox="progetto">
                            <img src="http://placekitten.com/g/400/400" alt="#">
                        </a>
                        <a href="http://placekitten.com/g/400/300" data-lightbox="progetto">
                            <img src="http://placekitten.com/g/400/300" alt="#">
                        </a>
                        <a href="http://placekitten.com/g/500/300" data-lightbox="progetto">
                            <img src="http://placekitten.com/g/500/300" alt="#">
                        </a>
                        <figcaption>Art Title 1</figcaption>
                    </figure>
                </li><!--

                --><li class="related-works__item">
                    <figure>
                        <img src="http://placekitten.com/g/300/200" alt="#">
                        <figcaption>Art Title 2</figcaption>
                    </figure>
                </li><!--

                --><li class="related-works__item">
                    <figure>
                        <img src="http://placekitten.com/g/400/600" alt="#">
                        <figcaption>Art Title 2</figcaption>
                    </figure>
                </li><!--

                --><li class="related-works__item">
                    <figure>
                        <img src="http://placekitten.com/g/800/600" alt="#">
                        <figcaption>Art Title 2</figcaption>
                    </figure>
                </li><!--

                --><li class="related-works__item">
                    <figure>
                        <img src="http://placekitten.com/g/700/400" alt="#">
                        <figcaption>Art Title 2</figcaption>
                    </figure>
                </li><!--

                --><li class="related-works__item">
                    <figure>
                        <img src="http://placekitten.com/g/500/300" alt="#">
                        <figcaption>Art Title 2</figcaption>
                    </figure>
                </li>
            </ul>
        </li>

        <li>
            <span class="section__title">Commercial</span>
        </li>
        <li>
            <span class="section__title">Weddings</span>
        </li>
        <li>
            <span class="section__title">Spaces</span>
        </li>
        <li>
            <span class="section__title">Portraits</span>
        </li>
    </ul>
</div>

<?php snippet('foot') ?>