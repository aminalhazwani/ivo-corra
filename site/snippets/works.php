<div class="container">
    <?php foreach($data->children()->visible() as $work): ?>
		<?php if($work->hasImages()): ?>
        <figure class="work">
			<?php foreach($work->images() as $image): ?>
			    <a class="box" href="<?php echo $image->url() ?>" data-lightbox="<?php echo ($work->title()) ?>">
                    <div class="overlay"></div>
                    <img src="<?php echo $image->url() ?>" alt="<?php echo ($work->title()) ?>" />
                </a>
		    <?php endforeach ?>
        </figure>
		<?php endif ?>
    <?php endforeach ?>
</div>
