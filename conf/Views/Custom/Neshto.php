<?php /** @var Neshto */
use Repository\User; ?>

<div class="jumbotron col-md-12">
    Require view from User

<?php echo $this->user->getUsername(); ?>
</div>
