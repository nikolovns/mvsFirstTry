
<section class="col-md-11">
    <section class="col-md-11 ">
        <?php foreach ($this->conference as $key => $value): ?>

            <article>
                <p>Conference name: <?php echo $this->escape($value->getConfName()); ?></p>
                <p>Conference Start: <?php echo $this->escape($value->getStartDate()); ?></p>
                <p>Conference End: <?php echo $this->escape($value->getEndDate()); ?></p>
                <p>Conference Venue: <?php echo $this->escape($value->getName()); ?></p>
                <p>Conference Address: <?php echo $this->escape($value->getAddress()); ?></p>
            </article>
            <hr/>

        <?php endforeach ?>
    </section>
</section>


