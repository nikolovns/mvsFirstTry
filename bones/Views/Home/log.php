<table>
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
                <a href="<?php echo $this->url('home', 'page', [$value->getSlug()]) ;?>">
                    <?php echo $this->escape($value->getSlug()); ?>
                </a>
            </td>
            <td><a href="">Edit</a></td>
            <td><a href="">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
<tr>

</tr>
</table>

<a href="<?php echo $this->adminUrl('main', 'add') ;?>">Add Page</a>
<?php var_dump($this->adminUrl('main', 'add'));