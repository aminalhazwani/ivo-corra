<?php 

// main menu items
$items = $pages->visible()->not('publications')->not('exhibitions');;

// only show the menu if items are available
if($items->count() > 0): 

?>
<nav class="menu__container">>
  <ul class="menu__container--list">
    <li class="menu__container--list--item"><a href="<?php echo url() ?>">startpage</a>
    <?php foreach($items as $item): ?>
    <li class="menu__container--list--item"><a<?php ecco($item->isOpen(), ' class="active"') ?> href="<?php echo $item->url() ?>"><?php echo html($item->title()) ?></a></li>
    <?php endforeach ?>
  </ul>
</nav>
<?php endif ?>
