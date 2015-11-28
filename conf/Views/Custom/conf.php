<?php /** @var Conf  */?>

    <p>Conference name: <?php echo $this->escape($this->conference['confName']) ;?></p>
    <p>Conference Start Date: <?php echo $this->escape($this->conference['startDate']) ;?></p>
    <p>Conference End Date: <?php echo $this->escape($this->conference['endDate']) ;?></p>

    <p>Venue Name: <?php echo $this->escape($this->venue->getName()) ;?></p>
    <p>Venue Address: <?php echo $this->escape($this->venue->getAddress()) ;?></p>

