<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

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
            <?php foreach($pages->find('/exhibitions')->children()->visible() as $exhibition): ?>
                <ul class="exhibitions__list">
                    <li class="exhibitions__list--item exhibition">
                        <h4 class="exhibition__title"><?php echo $exhibition->title() ?></h4>

                        <span class="exhibition__date">
                            <?php if(strtotime($exhibition->enddate()) != ''): ?>
                                <?php echo date('M j', strtotime($exhibition->startdate())) ?> &#8211; <?php echo date('M j, Y', strtotime($exhibition->enddate())) ?>
                            <?php else: ?>
                                <?php echo date('M j, Y', strtotime($exhibition->startdate())) ?>
                            <?php endif ?>
                        </span>

                        <?php if($exhibition->link() != ''): ?>
                        <a class="exhibition__link" href="<?php echo $exhibition->link() ?>">link &#8594;</a>
                        <?php endif ?>
                    </li>
                </ul>
            <?php endforeach ?>
        </section>

        <section class="publications">
            <span class="section__title">publications</span>
            <ul>
                <?php foreach($pages->find('/publications')->children()->visible() as $publication): ?>
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
                <?php endforeach ?>
            </ul>
        </section>
    </div>

    <script type="text/javascript">
    $('.clients__list, .exhibition__title').flowtype({
       minimum   : 500,
       maximum   : 1200,
       minFont   : 18,
       maxFont   : 40,
       fontRatio : 30
    });
    </script>

<?php snippet('foot') ?>
