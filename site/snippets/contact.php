<div class="contact__container">
  <div class="contact__container--wrapper">
    <div class="contact__container--address">
      <p><?php $about = $pages->find('about'); echo $about->address(); ?></p>
      <p><?php $about = $pages->find('about'); echo $about->city(); ?></p>
      <p><?php $about = $pages->find('about'); echo $about->province(); ?></p>
    </div>

    <div class="contact__container--mail">
      <a href="mailto:<?php $about = $pages->find('about'); echo $about->mail(); ?>">
        <?php $about = $pages->find('about'); echo $about->mail(); ?>
      </a>
    </div>

    <div class="contact__container--fiscal">
      <p>cod.fisc./St.nr. <?php $about = $pages->find('about'); echo $about->fiscal(); ?><p>
      <p>p.iva/Mwst. <?php $about = $pages->find('about'); echo $about->vat(); ?></p>
    </div>

    <div class="contact__container--colophone">
      <a href="http://aminalhzwani.github.io">
        <span class="pile-of-poo">Made with</span><span>in Italy</span>
      </a>
    </div>
  </div>
</div>

<script type="text/javascript">
    $('.contact__container').flowtype({
       minimum   : 500,
       maximum   : 1200,
       minFont   : 18,
       maxFont   : 30
    });
</script>
