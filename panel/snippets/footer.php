<?php if(!defined('KIRBY')) die('Direct access is not allowed') ?>

<?php snippet('pages.add') ?>
<?php snippet('pages.delete') ?>

</div>

<script type="text/javascript">
    $(window).load(function() {
        $('.spinner__container').fadeOut(1000);
    });
</script>

</body>

</html>