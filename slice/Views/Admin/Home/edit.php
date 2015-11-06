<form action="<?php //echo $this->adminUrl('home', 'add') ; ?>" method="post">

    <label for="title" class="label label-info">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="<?php echo $this->escape($this->title) ;?>">

    <label for="label" class="label label-info">Label</label>
    <input type="text" class="form-control" name="label" id="label" value="<?php echo $this->escape($this->label) ;?>">

    <label for="slug" class="label label-info">slug</label>
    <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $this->escape($this->slug) ;?>">

    <label for="body" class="label label-info">Body</label>
    <textarea name="body" class="form-control" id="body" cols="30" rows="10"><?php echo $this->escape($this->body) ;?></textarea>

    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $this->escape($this->id) ;?>">

    <input type="submit" name="edit" value="Edit Page" class="btn-info">

</form>
