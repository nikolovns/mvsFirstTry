<form action="<?php //echo $this->adminUrl('home', 'add') ; ?>" method="post">

    <label for="title" class="label label-info">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="<?php echo $this->escape($this->title) ;?>">

    <label for="label" class="label label-info">Label</label>
    <input type="text" class="form-control" name="label" id="label" value="<?php echo $this->label ;?>">

    <label for="slug" class="label label-info">slug</label>
    <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $this->slug ;?>">

    <label for="body" class="label label-info">Body</label>
    <textarea name="body" class="form-control" id="body" cols="30" rows="10"><?php echo $this->body ;?></textarea>

    <input type="submit" name="edit-page" value="Edit Page" class="btn-info">
    
    <input type="hidden" name="name" value="<?php echo $this->id ;?></textarea>">

</form>
<p>
    <a href="<?php echo $this->adminUrl('home', 'addLogin') ;?>">Add Login form</a>
</p>
