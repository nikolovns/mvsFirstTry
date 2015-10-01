<form action="" method="post">

    <label for="title">Title</label>
    <input type="text" name="title" id="title">

    <label for="label">Label</label>
    <input type="text" name="label" id="label">

    <label for="slug">slug</label>
    <input type="text" name="slug" id="slug">

    <label for="body">Body</label>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>

    <input type="submit" name="add-page" value="Add Page">



</form>
<ul>
    <?php foreach ($this->errors as $key => $value): ?>
    <li>
        <?php echo $value; ?>
    </li>
    <?php endforeach; ?>

</ul>