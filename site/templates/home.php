<?php snippet('head') ?>
<?php snippet('controls') ?>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

<?php
	foreach($pages->visible()->without('about')->without('credit')->without('journal') as $section) {
	  snippet($section->uid(), array('data' => $section));
	}
?>

<?php snippet('foot') ?>
