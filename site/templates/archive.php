<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>

<div class="archive__container">
	<ul class="journal__post-list">
	<?php $num = $pages->find('/journal')->numpost(); ?>
	<!--<?php echo $num ?>-->
	<?php foreach($pages->find('/journal')->children()->visible()->sortBy($sort='date', $direction='desc') as $post): ?>
	     <li class="journal__post archive__post">
			<span class="journal__post--date archive__post--date"><?php echo $post->date('M. d, Y') ?></span>
			<div class="archive__preview">
				<a class="archive__preview--link" href="<?php echo $post->url() ?>">
					<h3 class="journal__post--title"><?php echo $post->title() ?></h3>
					<?php echo $post->text()->kirbytext()->excerpt(140) ?>
				</a>
			</div>
	    </li>
	<?php endforeach ?>
	</ul>

	<div class="dot__container">
		<?php snippet('dotdot') ?>
		<?php snippet('dotdot') ?>
		<?php snippet('dotdot') ?>
		<?php snippet('dotdot') ?>
		<?php snippet('dotdot') ?>
	</div>
</div>

<?php snippet('scripts') ?>
<?php snippet('contact') ?>
<?php snippet('foot') ?>