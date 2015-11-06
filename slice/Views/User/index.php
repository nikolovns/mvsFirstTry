<?php if(!isset($_SESSION['user'])): ?>
<form method="post" action="">
    <h3>Login</h3>
    <label class="label label-info" for="username">Name</label>
    <input type="text" class="form-control" placeholder="нещо" name="username" id="username" />

    <label class="label label-info" for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" />

    <input type="submit" name="index" value="Login" class="btn-info" />

</form>
<?php endif ;?>


<?php if (isset($_SESSION['user'])) : ?>
    <h1>
        <?php echo 'Welcome '; ?>
    </h1>
<?php endif; ?>