<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

    <div class="credit__container">
        <section class="clients">
            <span class="section__title">selected clients</span>
            <ul>
                <?php foreach(str::split($page->clients()) as $client): ?>
                    <li>
                        <?php echo $client ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </section>

        <section class="exhibitions">
            <span class="section__title">Exhibitions</span>
            <?php foreach($pages->find('/exhibitions')->children()->visible() as $exhibition): ?>
                <ul>
                    <li>
                        <span>
                            <?php if(strtotime($exhibition->enddate()) != ''): ?>
                                <?php echo date('M j', strtotime($exhibition->startdate())) ?> &#8211; <?php echo date('M j, Y', strtotime($exhibition->enddate())) ?>
                            <?php else: ?>
                                <?php echo date('M j, Y', strtotime($exhibition->startdate())) ?>
                            <?php endif ?>
                        </span>

                        <span><?php echo $exhibition->title() ?></span>
                    </li>
                </ul>
            <?php endforeach ?>
        </section>

        <section class="publications">
            <span class="section__title">publications</span>
            <?php foreach($pages->find('/publications')->children()->visible() as $publication): ?>
                <ul>
                    <li class="publication">
                        <?php if($publication->hasImages()): ?>
                        <figure class="">
                            <?php foreach($publication->images() as $image): ?>
                                <a class="box" href="<?php echo $image->url() ?>" data-lightbox="<?php echo ($publication->title()) ?>">
                                    <img src="<?php echo $image->url() ?>" alt="<?php echo ($publication->title()) ?>" />
                                </a>
                            <?php endforeach ?>
                        </figure>
                        <?php endif ?>

                        <span><?php echo $publication->title() ?></span>,
                        <span><?php echo $publication->date('M. Y') ?></span>,
                        <span><?php echo $publication->editor() ?></span>
                    </li>
                </ul>
            <?php endforeach ?>
        </section>
    </div>

<?php snippet('foot') ?>
