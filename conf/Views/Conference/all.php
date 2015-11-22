
<?php foreach ($this->conference as $key => $value): ?>

    <p>Conference name: <?php echo $this->escape($value->getConfName()) ;?></p>
    <p>Conference Start: <?php echo $this->escape($value->getStartDate()); ?></p>
    <p>Conference End: <?php echo $this->escape($value->getEndDate()); ?></p>
    <p>Conference venue: <?php echo $this->escape($value->getName()); ?></p>
    <p>Conference address: <?php echo $this->escape($value->getAddress()); ?></p>
    <hr/>

<?php endforeach; ?>