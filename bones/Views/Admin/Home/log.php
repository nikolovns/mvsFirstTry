<table class="table table-striped">
    <thead>
        <tr>
            <th>Label</th>
            <th>Title</th>
            <th>Slug</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->title as $key => $value): ?>
        <tr>
            <td><?php echo $this->escape($value->getLabel()); ?></td>
            <td><?php echo $this->escape($value->getTitle()); ?></td>
            <td>
                <a href="<?php echo $this->url('home', 'index', [$value->getSlug()]) ;?>">
                    <?php echo $this->escape($value->getSlug()); ?>
                </a>
            </td>
            <td><a href="<?php echo $this->adminUrl('home', 'edit', [$value->getSlug()]) ;?>">Edit</a></td>
            <td><a href="<?php echo $this->adminUrl('home', 'delete', [$value->getId()]) ;?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
<tr>

</tr>
</table>

<p>
    <a href="<?php echo $this->adminUrl('home', 'add') ;?>">Add Page</a>
</p>