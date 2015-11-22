<?php if (isset($_SESSION['user'])) : ?>
    <h3>
        <?php echo 'Welcome ' . $this->escape($this->content->getFirstName()); ?>
    </h3>

    <form>
        <p>First name: <?php echo $this->escape($this->content->getFirstName()) ;?></p>
        <p>Last name: <?php echo $this->escape($this->content->getLastName()); ?></p>
        <p>Email: <?php echo $this->escape($this->content->getEmail()); ?></p>
        <p>Gender: <?php echo $this->escape($this->content->getGender()); ?></p>
    </form>

    <h3>My Conferences</h3>
    <form>
        <?php foreach ($this->conference as $key => $value): ?>

            <p>Conference name: <?php echo $this->escape($value->getConfName()) ;?></p>
            <p>Conference Start: <?php echo $this->escape($value->getStartDate()); ?></p>
            <p>Conference End: <?php echo $this->escape($value->getEndDate()); ?></p>
            <p>Conference venue: <?php echo $this->escape($value->getName()); ?></p>
            <p>Conference address: <?php echo $this->escape($value->getAddress()); ?></p>
            <hr/>

        <?php endforeach; ?>
    </form>


<?php endif; ?>
    <a href="<?php echo $this->url('conference', 'createConference') ;?>">Create Conference</a>
<?php