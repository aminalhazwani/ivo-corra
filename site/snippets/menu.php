<div class="menu__container">
    <ul class="menu__container--list">
        <li class="menu__container--list--item">
            <a href="<?php echo url() ?>works">
                <?php
                    $work = $pages->find('works');
                    echo $work->title();
                ?>
            </a>
        </li>
        
        <li class="menu__container--list--item">
            <a href="<?php echo url() ?>about">
                <?php
                    $about = $pages->find('about');
                    echo $about->title();
                ?>
            </a>
        </li>
        
        <li class="menu__container--list--item">
            <a href="<?php echo url() ?>journal">
                <?php
                    $journal = $pages->find('journal');
                    echo $journal->title();
                ?>
            </a>
        </li>
        
        <li class="menu__container--list--item">
            <a href="<?php echo url() ?>credit">
                <?php
                    $credit = $pages->find('credit');
                    echo $credit->title();
                ?>
            </a>
        </li>
    </ul>
</div>
