<h1>Admin area</h1>


<?php if (isset($_SESSION['adminName'])) : ?>
    <p>
        <a href="<?php echo $this->adminUrl('home', 'log'); ?>">Go to list of pages</a>
    </p>
    <p>
        <a href="logout">Logout</a>
    </p>
<?php endif; ?>