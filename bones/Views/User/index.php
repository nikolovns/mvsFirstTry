<form method="post" action="">
    <h3>Login</h3>
    <label class="label label-info" for="username">Name</label>
    <input type="text" class="form-control" name="username" id="username" />

    <label class="label label-info" for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" />

    <input type="submit" name="login" value="Loging" class="btn-info" />

</form>




<?php if ($this->user) : ?>
    <h1>
        <?php
        if (isset($_POST['login']) || isset($_SESSION['user'])) {
            echo 'Welcome ' . $this->user;
        }
        ?>

    </h1>
    <a href="logout">Logout</a>
<?php endif; ?>