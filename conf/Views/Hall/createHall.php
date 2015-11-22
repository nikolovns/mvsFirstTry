<form  method="post"
       xmlns="http://www.w3.org/1999/html">

    <h2>Add Hall to Conference</h2>

    <label class="label label-info" for="hallName">Name/Number</label>
    <input type="text" class="form-control" name="hallName" id="hallName" />

    <label class="label label-info" for="seating">Number of Seating</label>
    <input type="text" class="form-control" name="seating" id="seating" />

    <input type="hidden" name="venueId" id="venueId" value="<?php echo $_SESSION['venue_id'] ; ?>" />

    <input type="submit" name="createhall" value="Create Hall" class="btn-info">

</form>

<p>
    <a href="<?php echo $this->url('userInfo', 'profile') ;?>">Cancel</a>
</p>
<p>
    <a href="<?php echo $this->url('lecture', 'createLecture') ;?>">Add Lectures For The Conference</a>
</p>