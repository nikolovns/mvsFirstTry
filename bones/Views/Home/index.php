<ul>

    <?php //foreach ($this->slug as $key => $value): ?>
        <li> 
            <a href="<?php //echo $this->url('home', 'page', [$value->getSlug()]); ?>">
                <?php //echo $value->getSlug(); ?> 
            </a>
        </li>
    <?php //endforeach; ?>

</ul>

<?php
//echo DIRECTORY_SEPARATOR . $value->getSlug();?>

<?php echo $this->escape($this->slug->getBody()); ?> 