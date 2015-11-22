<form  method="post"
      xmlns="http://www.w3.org/1999/html">

    <h2>Create Conference</h2>

    <label class="label label-info" for="confName">Name/Theme</label>
    <input type="text" class="form-control" name="confName" id="confName">

    <label class="label label-info" for="startDate">Start Date</label>
    <input type="date" class="form-control" name="startDate" id="startDate">

    <label class="label label-info" for="endDate">End Date</label>
    <input type="date" class="form-control" name="endDate" id="endDate">

    <label class="label label-info" for="name">Venue/City</label>
    <input type="text" class="form-control" name="name" id="name">

    <label class="label label-info" for="address">Address</label>
    <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>

    <input type="submit" name="createconference" value="Create" class="btn-info">

</form>

<p>
    <a href="<?php echo $this->url('userInfo', 'profile') ;?>">Cancel</a>
</p>