<?php if (!$this->user) : ?>

    <form method="post" action="">
        <input type="text" name="username" />
        <input type="text" name="password" />
        <input type="submit" name="login" value="Loging" />
    </form>

<?php endif; ?>

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