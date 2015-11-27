<form  method="post"
       xmlns="http://www.w3.org/1999/html">

    <h2>Create Lectures</h2>

    <label class="label label-info" for="name">Lecture name/Theme</label>
    <input type="text" class="form-control" name="name" id="name">

    <label class="label label-info" for="startTime">Start Time</label>
    <input type="time" class="form-control" name="startTime" id="startTime">

    <label class="label label-info" for="endTime">End Time</label>
    <input type="time" class="form-control" name="endTime" id="endTime">

    <label class="label label-info" for="break">Break</label>
    <input type="text" class="form-control" name="break" id="break">

    <label class="label label-info" for="hallName">Hall Name</label>
    <input type="text" class="form-control" name="hallName" id="hallName">

    <label class="label label-info" for="day">Date</label>
    <input type="date" class="form-control" name="day" id="day">

    <input type="hidden" name="idConference" value="<?php echo $_SESSION['conferenceId'] ;?>">

    <input type="submit" name="createlecture" value="Create" class="btn-info">

</form>

<p>
    <a href="<?php echo $this->url('userInfo', 'profile') ;?>">Cancel</a>
</p>