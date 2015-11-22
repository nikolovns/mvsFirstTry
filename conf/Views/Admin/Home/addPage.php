
<form action="<?php echo $this->adminUrl('home', 'addPage') ; ?>" method="post">
    <h2>Add page</h2>

    <label class="label label-info" for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title">

    <label class="label label-info" for="label">Label</label>
    <input type="text" class="form-control" name="label" id="label">

    <label class="label label-info" for="slug">slug</label>
    <input type="text" class="form-control" name="slug" id="slug">

    <label class="label label-info" for="body">Body</label>
    <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>

    <input type="submit" name="addpage" value="Add Page" class="btn-info">

</form>

<p>
    <a href="<?php echo $this->adminUrl('home', 'log') ;?>">Cancel</a>
</p>
