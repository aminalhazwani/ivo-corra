<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>

    <div class="credit__container">
        <section class="clients">
            <span class="section__title">selected clients</span>
            <ul class="clients__list">
                <?php foreach(str::split($page->clients()) as $client): ?>
                    <li class="clients__list--item">
                        <?php echo $client ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </section>

        <section class="exhibitions">
            <span class="section__title">Exhibitions</span>
            <ul class="exhibitions__list">
                <?php foreach($pages->find('exhibitions')->children()->visible()->sortBy($sort='date', $direction='desc') as $exhibition): ?> 
                    <li class="exhibitions__list--item exhibition">
                        <h4 class="exhibition__title"><?php echo $exhibition->title() ?> &#8211; <?php echo $exhibition->place() ?></h4>

                        <span class="exhibition__date">
                            <?php if($exhibition->enddate() != ''): ?>
                                <?php echo $exhibition->date('M j') ?> &#8211; <?php echo date('M j, Y', strtotime($exhibition->enddate())) ?>
                            <?php else: ?>
                                <?php echo $exhibition->date('M j, Y') ?>
                            <?php endif ?>
                        </span>

                        <?php if($exhibition->link() != ''): ?>
                            <a class="exhibition__link" href="<?php echo $exhibition->link() ?>">link &#8594;</a>
                        <?php endif ?>

                        <?php if($exhibition->shorttext() != ''): ?>
                            <p class="exhibition__short-description"><?php echo $exhibition->shorttext() ?></p>
                        <?php endif ?>

                        <?php if($exhibition->hasImages()): ?>
                            <figure>
                                <?php foreach($exhibition->images()->sortBy('sort', 'asc') as $image): ?>
                                    <a class="box" href="<?php echo $image->url() ?>" data-lightbox="<?php echo ($exhibition->title()) ?>">
                                        <img src="<?php echo $image->url() ?>" />
                                    </a>
                                <?php endforeach ?>
                            </figure>
                        <?php endif ?>

                        <?php if($exhibition->text() != ''): ?>
                            <div class="work__info">
                                <a class="work__info--button">Description</a>
                                <div class="work__info--description">
                                    <div class="work__info--content">
                                        <h2><?php echo $exhibition->title() ?></h2>
                                        <p><?php echo $exhibition->text() ?></p>
                                    </div>
                                    <div class="work__info--gradient"></div>
                                    <a class="work__info--close"></a>
                                </div>
                            </div>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </section>

        <section class="publications">
            <span class="section__title">publications</span>
            <ul>
                <?php foreach($pages->find('publications')->children()->visible() as $publication): ?>
                    <li class="publication">
                        <?php if($publication->hasImages()): ?>
                        <figure>
                            <?php foreach($publication->images()->sortBy('sort', 'asc') as $image): ?>
                                <a class="box publication__image" href="<?php echo $image->url() ?>" data-lightbox="<?php echo ($publication->title()) ?>">
                                    <img src="<?php echo $image->url() ?>" />
                                </a>
                            <?php endforeach ?>
                        </figure>
                        <?php endif ?>

                        <?php if($publication->title() != ''): ?>
                            <p class="publication__meta"><?php echo $publication->title() ?></p>
                        <?php endif ?>
                        <?php if($publication->date() != ''): ?>
                            <p class="publication__meta"><?php echo $publication->date('M. Y') ?></p>
                        <?php endif ?>
                        <?php if($publication->editor() != ''): ?>
                            <p class="publication__meta"><?php echo $publication->editor() ?></p>
                        <?php endif ?>

                        <?php if($publication->text() != ''): ?>
                            <div class="work__info">
                                <a class="work__info--button">Description</a>
                                <div class="work__info--description">
                                    <div class="work__info--content">
                                        <h2><?php echo $publication->title() ?></h2>
                                        <p><?php echo $publication->text() ?></p>
                                    </div>
                                    <div class="work__info--gradient"></div>
                                    <a class="work__info--close"></a>
                                </div>
                            </div>
                        <?php endif ?>
                    <!-- </li> -->
                <?php endforeach ?>
            </ul>
        </section>

        <div class="dot__container">
            <?php snippet('dotdot') ?>
            <?php snippet('dotdot') ?>
            <?php snippet('dotdot') ?>
            <?php snippet('dotdot') ?>
            <?php snippet('dotdot') ?>
        </div>
    </div>

<?php snippet('arrows') ?>
<?php snippet('scripts') ?>
<?php snippet('contact') ?>
<?php snippet('foot') ?>
