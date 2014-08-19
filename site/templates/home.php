<?php snippet('head') ?>
<?php snippet('controls') ?>
  <h1 class="site__title"><a href="/ivo-corra">Ivo Corrà</a></h1>
<?php snippet('menu') ?>
<?php snippet('contact') ?>

<?php
	foreach($pages->visible()->without('about')->without('credit')->without('journal') as $section) {
	  snippet($section->uid(), array('data' => $section));
	}
?>


<script type="text/javascript">
    $(function() {
        $("img.lazy").lazyload({
            effect : "fadeIn"
        });
    });
</script>


<?php snippet('foot') ?>
